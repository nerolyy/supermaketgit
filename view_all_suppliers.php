<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_supplier'])) {
        $name  = trim($_POST['name']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);

        if ($name !== '' && $phone !== '' && $email !== '') {
            $stmt = $conn->prepare(
                "INSERT INTO suppliers (name, phone, email) VALUES (?, ?, ?)"
            );
            $stmt->bind_param("sss", $name, $phone, $email);
            $stmt->execute();
            $stmt->close();
        }
        header("Location: view_all_suppliers.php");
        exit;
    }

    if (isset($_POST['delete_supplier'])) {
        $id = intval($_POST['id']);
        if ($id > 0) {
            $stmt = $conn->prepare("DELETE FROM suppliers WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
        header("Location: view_all_suppliers.php");
        exit;
    }

    if (isset($_POST['edit_supplier'])) {
        $id    = intval($_POST['id']);
        $name  = trim($_POST['name']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);

        if ($id > 0 && $name !== '' && $phone !== '' && $email !== '') {
            $stmt = $conn->prepare(
                "UPDATE suppliers SET name = ?, phone = ?, email = ? WHERE id = ?"
            );
            $stmt->bind_param("sssi", $name, $phone, $email, $id);
            $stmt->execute();
            $stmt->close();
        }
        header("Location: view_all_suppliers.php");
        exit;
    }
}

$edit_id = isset($_GET['edit']) ? intval($_GET['edit']) : null;

$result = $conn->query("SELECT * FROM view_all_suppliers");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Все поставщики</title>
    <link rel="stylesheet" href="view_all_suppliers.css">
</head>
<body>
<div class="top-links">
    <a href="admin_lk.php" class="btn-nav">← Назад в панель</a>
    <a href="mainpage.php"   class="btn-nav">На главную</a>
</div>

<h2>Все поставщики</h2>
<div class="form-wrapper">
<form method="post" action="">
    <h3>Добавить поставщика</h3>
    <input type="text"  name="name"  placeholder="Название поставщика"required>
    <input type="text"  name="phone" placeholder="Телефон" required>
    <input type="email" name="email" placeholder="Email"   required>
    <button type="submit" name="add_supplier" class="btn-add">Добавить</button>
</form>
</div>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Телефон</th>
        <th>Email</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
        <?php if ($edit_id === intval($row['id'])): ?>
            <tr>
                <form method="post" action="">
                    <td><?= $row['id'] ?><input type="hidden" name="id" value="<?= $row['id'] ?>"></td>
                    <td><input type="text"  name="name"  value="<?= htmlspecialchars($row['name'])  ?>" required></td>
                    <td><input type="text"  name="phone" value="<?= htmlspecialchars($row['phone']) ?>" required></td>
                    <td><input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required></td>
                    <td>
                        <button type="submit" name="edit_supplier" class="save-btn">Сохранить</button>
                        <a href="view_all_suppliers.php" class="edit-btn">Отмена</a>
                    </td>
                </form>
            </tr>
        <?php else: ?>
            <tr>
                <td><?= htmlspecialchars($row['id'])    ?></td>
                <td><?= htmlspecialchars($row['name'])  ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td>
                    <a href="?edit=<?= $row['id'] ?>" class="edit-btn">Редактировать</a>
                    <form method="post" class="inline-form" onsubmit="return confirm('Удалить поставщика?')">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" name="delete_supplier" class="delete-btn">Удалить</button>
                    </form>
                </td>
            </tr>
        <?php endif; ?>
    <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>
