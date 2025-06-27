<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$errors = [];
$success = '';

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
        if (!$stmt->execute()) {
            $errors[] = "Ошибка при добавлении: " . $stmt->error;
        } else {
            $success = "Товар добавлен";
        }
        $stmt->close();
    }

    if (isset($_POST['delete_product'])) {
        $id = intval($_POST['id']);
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            $errors[] = "Ошибка при удалении: " . $stmt->error;
        } else {
            $success = "Товар удалён";
        }
        $stmt->close();
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
        if (!$stmt->execute()) {
            $errors[] = "Ошибка при обновлении: " . $stmt->error;
        } else {
            $success = "Товар обновлён";
        }
        $stmt->close();
    }
}

$edit_id = isset($_GET['edit']) ? intval($_GET['edit']) : null;

$today = date('Y-m-d');
$seven_days_later = date('Y-m-d', strtotime('+7 days'));

$query = "SELECT * FROM products WHERE expiration_date BETWEEN ? AND ? ORDER BY id DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $today, $seven_days_later);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="view_products_expiring_7_days.css">
    <title>Товары с истекающим сроком (7 дней)</title>
</head>
<body>

<div class="top-links">
    <a href="admin_lk.php" class="btn-nav">← Назад в панель</a>
    <a href="mainpage.php" class="btn-nav">На главную</a>
</div>

<h2>Товары с истекающим сроком (7 дней)</h2>

<?php if ($errors): ?>
    <div style="color:red; max-width:1200px; margin: 0 auto 20px;">
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if ($success): ?>
    <div style="color:green; max-width:1200px; margin: 0 auto 20px;"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

<form method="post" class="add-form" action="">
    <input type="number" name="category_id" placeholder="ID категории" required />
    <input type="number" name="supplier_id" placeholder="ID поставщика" required />
    <input type="text" name="name" placeholder="Название" required />
    <input type="number" step="0.01" name="weight" placeholder="Вес" required />
    <input type="number" step="0.01" name="original_price" placeholder="Цена" required />
    <input type="number" step="0.01" name="discount_price" placeholder="Цена со скидкой" required />
    <input type="number" step="0.01" min="0" max="100" name="discount_percent" placeholder="Скидка %" required />
    <input type="text" name="image" placeholder="URL картинки" required />
    <input type="date" name="expiration_date" required />
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
                    <td><input type="number" step="0.01" name="weight" value="<?= $row['weight'] ?>" required></td>
                    <td><input type="number" step="0.01" name="original_price" value="<?= $row['original_price'] ?>" required></td>
                    <td><input type="number" step="0.01" name="discount_price" value="<?= $row['discount_price'] ?>" required></td>
                    <td><input type="number" step="0.01" min="0" max="100" name="discount_percent" value="<?= $row['discount_percent'] ?>" required></td>
                    <td><input type="text" name="image" value="<?= htmlspecialchars($row['image']) ?>" required></td>
                    <td><input type="date" name="expiration_date" value="<?= $row['expiration_date'] ?>" required></td>
                    <td>
                        <button type="submit" name="edit_product" class="save-btn">Сохранить</button>
                        <a href="view_all_products.php" class="cancel-btn">Отмена</a>
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
                <td>
                    <?php if ($row['image']): ?>
                        <img src="<?= htmlspecialchars($row['image']) ?>" alt="Фото товара" class="product-img" />
                    <?php else: ?>
                        Нет изображения
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($row['expiration_date']) ?></td>
                <td>
                    <a href="?edit=<?= $row['id'] ?>" class="edit-btn">Редактировать</a>
                    <form method="post" class="inline-form" onsubmit="return confirm('Удалить товар?')">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>" />
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
