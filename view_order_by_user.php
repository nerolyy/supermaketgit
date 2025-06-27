<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$errors = [];

function validate_date($date) {
    return (bool)strtotime($date);
}

$status_options = ['Новый', 'В обработке', 'Отправлен', 'Доставлен', 'Отменён'];

if (isset($_POST['add'])) {
    $user_id = (int)$_POST['user_id'];
    $order_date = trim($_POST['order_date']);
    $status = trim($_POST['status']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $comments = trim($_POST['comments']);

    if ($user_id <= 0) {
        $errors[] = "Выберите пользователя.";
    }
    if (!validate_date($order_date)) {
        $errors[] = "Введите корректную дату.";
    }
    if (!in_array($status, $status_options)) {
        $errors[] = "Выберите корректный статус заказа.";
    }
    if ($address === '') {
        $errors[] = "Введите адрес.";
    }
    if (!preg_match('/^\d{11}$/', preg_replace('/\D/', '', $phone))) {
        $errors[] = "Телефон должен содержать ровно 11 цифр.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO orders (user_id, order_date, status, address, phone, comments) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $user_id, $order_date, $status, $address, $phone, $comments);
        $stmt->execute();
        $stmt->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

if (isset($_POST['edit'])) {
    $id = (int)$_POST['id'];
    $user_id = (int)$_POST['user_id'];
    $order_date = trim($_POST['order_date']);
    $status = trim($_POST['status']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $comments = trim($_POST['comments']);

    if ($user_id <= 0) {
        $errors[] = "Выберите пользователя.";
    }
    if (!validate_date($order_date)) {
        $errors[] = "Введите корректную дату.";
    }
    if (!in_array($status, $status_options)) {
        $errors[] = "Выберите корректный статус заказа.";
    }
    if ($address === '') {
        $errors[] = "Введите адрес.";
    }
    if (!preg_match('/^\d{11}$/', preg_replace('/\D/', '', $phone))) {
        $errors[] = "Телефон должен содержать ровно 11 цифр.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("UPDATE orders SET user_id=?, order_date=?, status=?, address=?, phone=?, comments=? WHERE id=?");
        $stmt->bind_param("isssssi", $user_id, $order_date, $status, $address, $phone, $comments, $id);
        $stmt->execute();
        $stmt->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM orders WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$query = "SELECT * FROM view_orders_by_user ORDER BY id ASC";
$result = $conn->query($query);

$users = [];
$resUsers = $conn->query("SELECT id, first_name, last_name FROM users ORDER BY id ASC");
while ($rowUser = $resUsers->fetch_assoc()) {
    $users[$rowUser['id']] = $rowUser['first_name'] . ' ' . $rowUser['last_name'];
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заказы по пользователям</title>
    <link rel="stylesheet" href="view_order_by_user.css">
</head>
<body>
    <div class="top-links">
        <a href="admin_lk.php" class="btn-nav">← Назад в панель</a>
        <a href="mainpage.php" class="btn-nav">На главную</a>
    </div>

    <h2>Заказы по пользователям</h2>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?=htmlspecialchars($error)?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" class="add-form">
        <select name="user_id" required>
            <option value="" disabled selected>Выберите пользователя</option>
            <?php foreach ($users as $idU => $nameU): ?>
                <option value="<?= $idU ?>" <?= isset($_POST['user_id']) && $_POST['user_id'] == $idU ? 'selected' : '' ?>>
                    <?= htmlspecialchars($nameU) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="date" name="order_date" required value="<?= isset($_POST['order_date']) ? htmlspecialchars($_POST['order_date']) : '' ?>">
        <select name="status" required>
            <option value="" disabled <?= !isset($_POST['status']) ? 'selected' : '' ?>>Статус</option>
            <?php foreach ($status_options as $option): ?>
                <option value="<?= $option ?>" <?= (isset($_POST['status']) && $_POST['status'] === $option) ? 'selected' : '' ?>><?= $option ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="address" placeholder="Адрес" required value="<?= isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '' ?>">
        <input type="tel" name="phone" placeholder="Телефон (11 цифр)" pattern="\d{11}" title="Введите ровно 11 цифр" required
            oninput="this.value=this.value.replace(/[^0-9]/g,'');"
            value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
        <input type="text" name="comments" placeholder="Комментарий" value="<?= isset($_POST['comments']) ? htmlspecialchars($_POST['comments']) : '' ?>">
        <button type="submit" name="add" class="btn-add">Добавить заказ</button>
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
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Email</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <form method="post" class="inline-edit">
                        <td><?= htmlspecialchars($row['id']) ?><input type="hidden" name="id" value="<?= $row['id'] ?>"></td>
                        <td>
                            <select name="user_id" required>
                                <?php foreach ($users as $idU => $nameU): ?>
                                    <option value="<?= $idU ?>" <?= $row['user_id'] == $idU ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($nameU) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                        <input type="date" name="order_date" value="<?= date('Y-m-d', strtotime($row['order_date'])) ?>" required>
                        </td>

                        <td>
                            <select name="status" required>
                                <?php foreach ($status_options as $option): ?>
                                    <option value="<?= $option ?>" <?= $row['status'] === $option ? 'selected' : '' ?>><?= $option ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td><input type="text" name="address" value="<?= htmlspecialchars($row['address']) ?>" required></td>
                        <td><input type="tel" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" pattern="\d{11}" title="Введите ровно 11 цифр" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required></td>
                        <td><input type="text" name="comments" value="<?= htmlspecialchars($row['comments']) ?>"></td>
                        <td><?= htmlspecialchars($row['first_name']) ?></td>
                        <td><?= htmlspecialchars($row['last_name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td>
                            <button type="submit" name="edit" class="btn-save">Сохранить</button>
                    </form>
                    <form method="get" style="display:inline;">
                        <input type="hidden" name="delete" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn-delete" onclick="return confirm('Удалить заказ?')">Удалить</button>
                    </form>
                        </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
