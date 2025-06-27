<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_product'])) {
        $category_id = intval($_POST['category_id']);
        $supplier_id = intval($_POST['supplier_id']);
        $name = trim($_POST['name']);
        $weight = floatval($_POST['weight']);
        $original_price = floatval($_POST['original_price']);
        $discount_price = floatval($_POST['discount_price']);
        $discount_percent = floatval($_POST['discount_percent']);
        $image = trim($_POST['image']);
        $expiration_date = $_POST['expiration_date'];

        $stmt = $conn->prepare("INSERT INTO products (category_id, supplier_id, name, weight, original_price, discount_price, discount_percent, image, expiration_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisddddss", $category_id, $supplier_id, $name, $weight, $original_price, $discount_price, $discount_percent, $image, $expiration_date);
        $stmt->execute();
        $stmt->close();
        header("Location: view_all_products.php");
        exit;
    }

    if (isset($_POST['delete_product'])) {
        $id = intval($_POST['id']);
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header("Location: view_all_products.php");
        exit;
    }

    if (isset($_POST['edit_product'])) {
        $id = intval($_POST['id']);
        $category_id = intval($_POST['category_id']);
        $supplier_id = intval($_POST['supplier_id']);
        $name = trim($_POST['name']);
        $weight = floatval($_POST['weight']);
        $original_price = floatval($_POST['original_price']);
        $discount_price = floatval($_POST['discount_price']);
        $discount_percent = floatval($_POST['discount_percent']);
        $image = trim($_POST['image']);
        $expiration_date = $_POST['expiration_date'];

        $stmt = $conn->prepare("UPDATE products SET category_id=?, supplier_id=?, name=?, weight=?, original_price=?, discount_price=?, discount_percent=?, image=?, expiration_date=? WHERE id=?");
        $stmt->bind_param("iisddddssi", $category_id, $supplier_id, $name, $weight, $original_price, $discount_price, $discount_percent, $image, $expiration_date, $id);
        $stmt->execute();
        $stmt->close();
        header("Location: view_all_products.php");
        exit;
    }
}

$edit_id = isset($_GET['edit']) ? intval($_GET['edit']) : null;

$query = "SELECT * FROM view_all_products";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Все товары</title>
    <link rel="stylesheet" href="view_all_products.css">
</head>
<body>
<div class="top-links">
    <a href="admin_lk.php" class="btn-nav">← Назад в панель</a>
    <a href="mainpage.php" class="btn-nav">На главную</a>
</div>

<h2>Все товары</h2>


<form method="post" action="" class = "add-form">
    <input type="number" name="category_id" placeholder="ID категории" required>
    <input type="number" name="supplier_id" placeholder="ID поставщика" required>
    <input type="text" name="name" placeholder="Название" required>
    <input type="text" name="weight" placeholder="Вес" required>
    <input type="text" name="original_price" placeholder="Цена" required>
    <input type="text" name="discount_price" placeholder="Цена со скидкой" required>
    <input type="text" name="discount_percent" placeholder="Скидка (%)" required>
    <input type="text" name="image" placeholder="Путь к картинке (img/example.jpg)" required>
    <input type="date" name="expiration_date" required>
    <button type="submit" name="add_product" class="btn-add">Добавить товар</button>
</form>


<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Категория</th>
        <th>Поставщик</th>
        <th>Название</th>
        <th>Вес</th>
        <th>Цена</th>
        <th>Цена со скидкой</th>
        <th>Скидка %</th>
        <th>Картинка</th>
        <th>Срок годности</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
        <?php if ($edit_id === intval($row['id'])): ?>
            
            <tr>
                <form method="post" action="">
                    <td><?= $row['id'] ?><input type="hidden" name="id" value="<?= $row['id'] ?>"></td>
                    <td><input type="number" name="category_id" value="<?= $row['category_id'] ?>" required></td>
                    <td><input type="number" name="supplier_id" value="<?= $row['supplier_id'] ?>" required></td>
                    <td><input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required></td>
                    <td><input type="text" name="weight" value="<?= $row['weight'] ?>" required></td>
                    <td><input type="text" name="original_price" value="<?= $row['original_price'] ?>" required></td>
                    <td><input type="text" name="discount_price" value="<?= $row['discount_price'] ?>" required></td>
                    <td><input type="text" name="discount_percent" value="<?= $row['discount_percent'] ?>" required></td>
                    <td><input type="text" name="image" value="<?= htmlspecialchars($row['image']) ?>" required></td>
                    <td><input type="date" name="expiration_date" value="<?= $row['expiration_date'] ?>" required></td>
                    <td>
                        <button type="submit" name="edit_product" class="save-btn">Сохранить</button>
                        <a href="view_all_products.php" class="edit-btn">Отмена</a>
                    </td>
                </form>
            </tr>
        <?php else: ?>
            
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['category_id']) ?></td>
                <td><?= htmlspecialchars($row['supplier_id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['weight']) ?></td>
                <td><?= htmlspecialchars($row['original_price']) ?></td>
                <td><?= htmlspecialchars($row['discount_price']) ?></td>
                <td><?= htmlspecialchars($row['discount_percent']) ?></td>
                <td><img src="<?= htmlspecialchars($row['image']) ?>" alt="Фото" class="product-img"></td>
                <td><?= htmlspecialchars($row['expiration_date']) ?></td>
                <td>
                    <a href="?edit=<?= $row['id'] ?>" class="edit-btn">Редактировать</a>
                    <form method="post" class="inline-form" onsubmit="return confirm('Удалить товар?')">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" name="delete_product" class="delete-btn">Удалить</button>
                    </form>
                </td>
            </tr>
        <?php endif; ?>
    <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>
