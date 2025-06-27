<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$errors = [];
$success = '';
$edit_id = null;

if (isset($_POST['add'])) {
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($name === '' || $phone === '' || $email === '') {
        $errors[] = "Заполните все поля для добавления поставщика";
    } else {
        $stmt = $conn->prepare("INSERT INTO suppliers (name, phone, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $phone, $email);
        if ($stmt->execute()) {
            $success = "Поставщик добавлен";
        } else {
            $errors[] = "Ошибка добавления поставщика: " . $stmt->error;
        }
        $stmt->close();
    }
}

if (isset($_POST['edit'])) {
    $edit_id = $_POST['id'] ?? null;
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if (!$edit_id || $name === '' || $phone === '' || $email === '') {
        $errors[] = "Заполните все поля при редактировании";
    } else {
        $stmt = $conn->prepare("UPDATE suppliers SET name = ?, phone = ?, email = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $phone, $email, $edit_id);
        if ($stmt->execute()) {
            $success = "Поставщик обновлён";
            $edit_id = null; 
        } else {
            $errors[] = "Ошибка обновления поставщика: " . $stmt->error;
        }
        $stmt->close();
    }
}

if (isset($_GET['edit_id'])) {
    $edit_id = (int)$_GET['edit_id'];
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'] ?? null;
    if ($id) {
        $stmt = $conn->prepare("DELETE FROM suppliers WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $success = "Поставщик удалён";
            if ($edit_id == $id) {
                $edit_id = null; 
            }
        } else {
            $errors[] = "Ошибка удаления поставщика: " . $stmt->error;
        }
        $stmt->close();
    }
}

$query = "
    SELECT DISTINCT s.id, s.name, s.phone, s.email
    FROM suppliers s
    JOIN products p ON p.supplier_id = s.id
    WHERE p.expiration_date IS NOT NULL
      AND p.expiration_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 3 DAY)
    ORDER BY s.id DESC
";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Поставщики с продуктами, срок годности которых истекает в ближайшие 3 дня</title>
    <link rel="stylesheet" href="view_suppliers_with_expiring_products_3_day.css" />
</head>
<body>

<div class="top-links">
    <a href="admin_lk.php" class="btn-nav">← Назад в панель</a>
    <a href="mainpage.php" class="btn-nav">На главную</a>
</div>

<h2>Поставщики с продуктами, срок годности которых истекает в ближайшие 3 дня</h2>

<?php if ($errors): ?>
    <div class="message error">
        <?php foreach ($errors as $err) echo "<p>$err</p>"; ?>
    </div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="message success"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

<form method="post" class="add-form" novalidate>
    <input type="text" name="name" placeholder="Имя поставщика" required />
    <input type="text" name="phone" placeholder="Телефон" required />
    <input type="email" name="email" placeholder="Email" required />
    <button type="submit" name="add">Добавить поставщика</button>
</form>

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
        <?php if ($edit_id == $row['id']): ?>
            <tr class="edit-row">
                <form method="post" novalidate>
                    <td><?= $row['id'] ?><input type="hidden" name="id" value="<?= $row['id'] ?>" /></td>
                    <td><input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required /></td>
                    <td><input type="text" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" required /></td>
                    <td><input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required /></td>
                    <td class="actions">
                        <button type="submit" name="edit" class="save-btn">Сохранить</button>
                        <a href="?">Отмена</a>
                    </td>
                </form>
            </tr>
        <?php else: ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td class="actions">
                    <a href="?edit_id=<?= $row['id'] ?>" class="edit-btn">Редактировать</a>
                    <form method="post" onsubmit="return confirm('Удалить поставщика?');" style="display:inline-block;">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                        <button type="submit" name="delete" class="delete-btn">Удалить</button>
                    </form>
                </td>
            </tr>
        <?php endif; ?>
    <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
