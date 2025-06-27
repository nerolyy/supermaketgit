<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$errors = [];
$success = '';

if (isset($_POST['add'])) {
    $category_id = $_POST['category_id'] ?? null;
    $supplier_id = $_POST['supplier_id'] ?? null;
    $name = trim($_POST['name'] ?? '');
    $weight = $_POST['weight'] ?? null;
    $original_price = $_POST['original_price'] ?? null;
    $discount_price = $_POST['discount_price'] ?? null;
    $discount_percent = $_POST['discount_percent'] ?? null;
    $image = $_POST['image'] ?? '';
    $expiration_date = $_POST['expiration_date'] ?? '';

    if (!$category_id || !$supplier_id || $name === '' || !$original_price) {
        $errors[] = "Заполните обязательные поля: категория, поставщик, название, цена";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO products 
            (category_id, supplier_id, name, weight, original_price, discount_price, discount_percent, image, expiration_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "iisdiddss",
            $category_id,
            $supplier_id,
            $name,
            $weight,
            $original_price,
            $discount_price,
            $discount_percent,
            $image,
            $expiration_date
        );
        if ($stmt->execute()) {
            $success = "Товар добавлен";
        } else {
            $errors[] = "Ошибка добавления товара: " . $stmt->error;
        }
        $stmt->close();
    }
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'] ?? null;
    $category_id = $_POST['category_id'] ?? null;
    $supplier_id = $_POST['supplier_id'] ?? null;
    $name = trim($_POST['name'] ?? '');
    $weight = $_POST['weight'] ?? null;
    $original_price = $_POST['original_price'] ?? null;
    $discount_price = $_POST['discount_price'] ?? null;
    $discount_percent = $_POST['discount_percent'] ?? null;
    $image = $_POST['image'] ?? '';
    $expiration_date = $_POST['expiration_date'] ?? '';

    if (!$id || !$category_id || !$supplier_id || $name === '' || !$original_price) {
        $errors[] = "Заполните обязательные поля при редактировании";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("UPDATE products SET 
            category_id = ?, supplier_id = ?, name = ?, weight = ?, 
            original_price = ?, discount_price = ?, discount_percent = ?, 
            image = ?, expiration_date = ?
            WHERE id = ?");
        $stmt->bind_param(
            "iisdiddssi",
            $category_id,
            $supplier_id,
            $name,
            $weight,
            $original_price,
            $discount_price,
            $discount_percent,
            $image,
            $expiration_date,
            $id
        );
        if ($stmt->execute()) {
            $success = "Товар обновлен";
        } else {
            $errors[] = "Ошибка обновления товара: " . $stmt->error;
        }
        $stmt->close();
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'] ?? null;
    if ($id) {
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $success = "Товар удалён";
        } else {
            $errors[] = "Ошибка удаления товара: " . $stmt->error;
        }
        $stmt->close();
    }
}

$query = "
    SELECT 
        p.id, 
        p.category_id, 
        c.name AS category_name, 
        p.supplier_id,
        p.name, 
        p.weight, 
        p.original_price, 
        p.discount_price, 
        p.discount_percent, 
        p.image, 
        p.expiration_date
    FROM products p
    LEFT JOIN categories c ON p.category_id = c.id
    ORDER BY p.id DESC
";

$result = $conn->query($query);

$cat_result = $conn->query("SELECT id, name FROM categories ORDER BY name ASC");
$categories = [];
while ($cat = $cat_result->fetch_assoc()) {
    $categories[$cat['id']] = $cat['name'];
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Товары с категориями </title>
    <link rel="stylesheet" href="view_products_with_category.css">
    
</head>
<body>

<div class="top-links">
    <a href="admin_lk.php" class="btn-nav">← Назад в панель</a>
    <a href="mainpage.php" class="btn-nav">На главную</a>
</div>

<h2>Товары с категориями</h2>

<?php if ($errors): ?>
    <div class="message error">
        <?php foreach ($errors as $err) echo "<p>$err</p>"; ?>
    </div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="message success">
        <?= htmlspecialchars($success) ?>
    </div>
<?php endif; ?>

<form method="post" class="add-form">
    <input type="number" name="category_id" placeholder="Категория ID" required list="categories-list" />
    <input type="number" name="supplier_id" placeholder="Поставщик ID" required />
    <input type="text" name="name" placeholder="Название" required />
    <input type="number" step="0.01" name="weight" placeholder="Вес" />
    <input type="number" step="0.01" name="original_price" placeholder="Цена" required />
    <input type="number" step="0.01" name="discount_price" placeholder="Цена со скидкой" />
    <input type="number" step="0.01" name="discount_percent" placeholder="Скидка %" />
    <input type="text" name="image" placeholder="URL Картинки" />
    <input type="date" name="expiration_date" placeholder="Срок годности" />
    <button type="submit" name="add">Добавить товар</button>
</form>

<datalist id="categories-list">
    <?php foreach ($categories as $id => $name): ?>
        <option value="<?= $id ?>"><?= htmlspecialchars($name) ?></option>
    <?php endforeach; ?>
</datalist>

<div class="table-wrapper">
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Категория ID</th>
            <th>Категория</th>
            <th>Поставщик ID</th>
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
        <tr data-id="<?= htmlspecialchars($row['id']) ?>">
            <form method="post" class="inline-form" novalidate>
                <td>
                    <?= htmlspecialchars($row['id']) ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>" />
                </td>
                <td><input type="number" name="category_id" value="<?= htmlspecialchars($row['category_id']) ?>" required list="categories-list" readonly /></td>
                <td><?= htmlspecialchars($row['category_name'] ?? '—') ?></td>
                <td><input type="number" name="supplier_id" value="<?= htmlspecialchars($row['supplier_id']) ?>" required readonly /></td>
                <td><input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required readonly /></td>
                <td><input type="number" step="0.01" name="weight" value="<?= htmlspecialchars($row['weight']) ?>" readonly /></td>
                <td><input type="number" step="0.01" name="original_price" value="<?= htmlspecialchars($row['original_price']) ?>" required readonly /></td>
                <td><input type="number" step="0.01" name="discount_price" value="<?= htmlspecialchars($row['discount_price']) ?>" readonly /></td>
                <td><input type="number" step="0.01" name="discount_percent" value="<?= htmlspecialchars($row['discount_percent']) ?>" readonly /></td>
                <td>
                    <?php if ($row['image']): ?>
                        <img src="<?= htmlspecialchars($row['image']) ?>" alt="Фото товара" class="product-img" /><br />
                    <?php else: ?>
                        Нет изображения<br />
                    <?php endif; ?>
                    <input type="text" name="image" value="<?= htmlspecialchars($row['image']) ?>" placeholder="URL картинки" readonly />
                </td>
                <td><input type="date" name="expiration_date" value="<?= htmlspecialchars($row['expiration_date']) ?>" readonly /></td>
                <td class="actions-cell">
                    <button type="button" class="edit-btn">Редактировать</button>
                    <button type="submit" name="edit" class="save-btn" style="display:none;">Сохранить</button>
                    <button type="button" class="cancel-btn" style="display:none;">Отмена</button>
            </form>
            <form method="post" class="inline-form" onsubmit="return confirm('Удалить этот товар?');" style="display:inline-block; vertical-align: middle;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>" />
                <button type="submit" name="delete" class="delete-btn">Удалить</button>
            </form>
                </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</div>

<script src="view_products.js"></script>

</body>
</html>
