<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$errors = [];
$success = '';

$status_options = ['Новый', 'В обработке', 'Отправлен', 'Доставлен', 'Отменён'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_order'])) {
        $user_id = intval($_POST['user_id'] ?? 0);
        $order_date = $_POST['order_date'] ?? '';
        $status = $_POST['status'] ?? '';
        $address = trim($_POST['address'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $comments = trim($_POST['comments'] ?? '');

        if ($user_id <= 0) $errors[] = "Введите корректный User ID";
        if (!strtotime($order_date)) $errors[] = "Введите корректную дату";
        if (!in_array($status, $status_options)) $errors[] = "Выберите корректный статус";
        if ($address === '') $errors[] = "Введите адрес";
        if (!preg_match('/^\d{11}$/', $phone)) $errors[] = "Телефон должен содержать ровно 11 цифр";

        if (!$errors) {
            $stmt = $conn->prepare("INSERT INTO orders (user_id, order_date, status, address, phone, comments) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssss", $user_id, $order_date, $status, $address, $phone, $comments);
            if ($stmt->execute()) {
                $success = "Заказ добавлен успешно";
            } else {
                $errors[] = "Ошибка при добавлении заказа: " . $stmt->error;
            }
            $stmt->close();
        }
    }

    if (isset($_POST['edit_order'])) {
        $id = intval($_POST['id'] ?? 0);
        $user_id = intval($_POST['user_id'] ?? 0);
        $order_date = $_POST['order_date'] ?? '';
        $status = $_POST['status'] ?? '';
        $address = trim($_POST['address'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $comments = trim($_POST['comments'] ?? '');

        if ($id <= 0) $errors[] = "Некорректный ID заказа";
        if ($user_id <= 0) $errors[] = "Введите корректный User ID";
        if (!strtotime($order_date)) $errors[] = "Введите корректную дату";
        if (!in_array($status, $status_options)) $errors[] = "Выберите корректный статус";
        if ($address === '') $errors[] = "Введите адрес";
        if (!preg_match('/^\d{11}$/', $phone)) $errors[] = "Телефон должен содержать ровно 11 цифр";

        if (!$errors) {
            $stmt = $conn->prepare("UPDATE orders SET user_id=?, order_date=?, status=?, address=?, phone=?, comments=? WHERE id=?");
            $stmt->bind_param("isssssi", $user_id, $order_date, $status, $address, $phone, $comments, $id);
            if ($stmt->execute()) {
                $success = "Заказ обновлён успешно";
            } else {
                $errors[] = "Ошибка при обновлении заказа: " . $stmt->error;
            }
            $stmt->close();
        }
    }

    if (isset($_POST['delete_order'])) {
        $id = intval($_POST['id'] ?? 0);
        if ($id > 0) {
            $stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $success = "Заказ удалён";
            } else {
                $errors[] = "Ошибка при удалении заказа: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $errors[] = "Некорректный ID для удаления";
        }
    }
}

$query = "SELECT * FROM orders ORDER BY id DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="view_orders_in_period.css">
    <title>Управление заказами</title>
</head>
<body>

<div class="top-links">
    <a href="admin_lk.php" class="btn-nav">← Назад в панель</a>
    <a href="mainpage.php" class="btn-nav">На главную</a>
</div>

<h2>Заказы за период</h2>

<?php if ($errors): ?>
    <div class="error-messages" style="width:90%; max-width:1200px; margin:0 auto 20px; padding:15px; background:#f8d7da; color:#842029; border-radius:8px;">
        <ul style="margin:0; padding-left:20px;">
            <?php foreach($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="success-message" style="width:90%; max-width:1200px; margin:0 auto 20px; padding:15px; background:#d1e7dd; color:#0f5132; border-radius:8px;">
        <?= htmlspecialchars($success) ?>
    </div>
<?php endif; ?>

<form method="post" class="add-form">
    <input type="hidden" name="add_order" value="1" />
    <input type="number" name="user_id" placeholder="User ID" required min="1" />
    <input type="date" name="order_date" required />
    <select name="status" required>
        <option value="" disabled selected>Выберите статус</option>
        <?php foreach ($status_options as $status): ?>
            <option value="<?= htmlspecialchars($status) ?>"><?= htmlspecialchars($status) ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="address" placeholder="Адрес" required />
    <input type="tel" name="phone" placeholder="Телефон (начинайте с 8 )" pattern="\d{11}" title="Введите ровно 11 цифр" required oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
    <input type="text" name="comments" placeholder="Комментарий" />
    <button type="submit" class="btn-add">Добавить</button>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Дата заказа</th>
            <th>Статус</th>
            <th>Адрес</th>
            <th>Телефон</th>
            <th>Комментарий</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= (int)$row['id'] ?></td>
                <td>
                    <form method="post" class="inline-edit" style="margin:0;">
                        <input type="hidden" name="edit_order" value="1" />
                        <input type="hidden" name="id" value="<?= (int)$row['id'] ?>" />
                        <input type="number" name="user_id" value="<?= (int)$row['user_id'] ?>" required min="1" />
                </td>
                <td>
                        <input type="date" name="order_date" value="<?= htmlspecialchars(date('Y-m-d', strtotime($row['order_date']))) ?>" required />

                </td>
                <td>
                        <select name="status" required>
                            <?php foreach ($status_options as $status): ?>
                                <option value="<?= htmlspecialchars($status) ?>" <?= $status === $row['status'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($status) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                </td>
                <td>
                        <input type="text" name="address" value="<?= htmlspecialchars($row['address']) ?>" required />
                </td>
                <td>
                        <input type="tel" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" pattern="\d{11}" title="Введите ровно 11 цифр" required oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                </td>
                <td>
                        <input type="text" name="comments" value="<?= htmlspecialchars($row['comments']) ?>" />
                </td>
                <td>
                        <button type="submit" class="btn-save">Сохранить</button>
                    </form>
                    <form method="post" style="display:inline-block; margin-left:6px;" onsubmit="return confirm('Удалить заказ #<?= (int)$row['id'] ?>?');">
                        <input type="hidden" name="delete_order" value="1" />
                        <input type="hidden" name="id" value="<?= (int)$row['id'] ?>" />
                        <button type="submit" class="btn-delete">Удалить</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
