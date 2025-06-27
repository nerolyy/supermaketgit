<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if (isset($_POST['add'])) {
    $name = trim($_POST['name']);
    if ($name !== '') {
        $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->close();
    }
}

if (isset($_POST['edit'])) {
    $id = (int)$_POST['id'];
    $name = trim($_POST['name']);
    if ($name !== '') {
        $stmt = $conn->prepare("UPDATE categories SET name=? WHERE id=?");
        $stmt->bind_param("si", $name, $id);
        $stmt->execute();
        $stmt->close();
    }
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM categories WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$result = $conn->query("SELECT * FROM categories ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление категориями</title>
    <link rel="stylesheet" href="view_all_categories.css">
</head>
<body>
    <div class="top-links">
        <a href="admin_lk.php" class="btn-nav">Назад в панель</a>
        <a href="mainpage.php" class="btn-nav">На главную</a>
    </div>
    <h1>Управление категориями</h1>

    <form method="post" class="add-form">
        <input type="text" name="name" placeholder="Введите название категории" required>
        <button type="submit" name="add" class="btn-add">Добавить</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td>
                        <form method="post" class="inline-edit">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>
                    </td>
                    <td>
                            <button type="submit" name="edit" class="btn-save">Сохранить</button>
                        </form>

                        <form method="get" style="display:inline;">
                            <input type="hidden" name="delete" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn-delete" onclick="return confirm('Удалить категорию?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
