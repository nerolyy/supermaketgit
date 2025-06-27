<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_order'])) {
        $user_id = intval($_POST['user_id']);
        $status = trim($_POST['status']);
        $address = trim($_POST['address']);
        $phone = preg_replace('/\D/', '', $_POST['phone']);
        $phone = substr($phone, 0, 11);
        $comments = trim($_POST['comments']);
        if ($user_id > 0 && $status !== '' && $address !== '') {
            $stmt = $conn->prepare("INSERT INTO orders (user_id, order_date, status, address, phone, comments) VALUES (?, NOW(), ?, ?, ?, ?)");
            $stmt->bind_param("issss", $user_id, $status, $address, $phone, $comments);
            $stmt->execute();
            $stmt->close();
            header("Location: view_all_orders.php");
            exit;
        }
    } elseif (isset($_POST['edit_order'])) {
        $id = intval($_POST['id']);
        $status = trim($_POST['status']);
        $address = trim($_POST['address']);
        $phone = preg_replace('/\D/', '', $_POST['phone']);
        $phone = substr($phone, 0, 11);
        $comments = trim($_POST['comments']);
        if ($id > 0 && $status !== '' && $address !== '') {
            $stmt = $conn->prepare("UPDATE orders SET status = ?, address = ?, phone = ?, comments = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $status, $address, $phone, $comments, $id);
            $stmt->execute();
            $stmt->close();
            header("Location: view_all_orders.php");
            exit;
        }
    } elseif (isset($_POST['delete_order'])) {
        $id = intval($_POST['id']);
        if ($id > 0) {
            $stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            header("Location: view_all_orders.php");
            exit;
        }
    }
}

$query = "SELECT * FROM view_all_orders";
$result = $conn->query($query);

$users_query = "SELECT id, first_name, last_name FROM users";
$users_result = $conn->query($users_query);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Все заказы</title>
    <link rel="stylesheet" href="view_all_order.css">
</head>
<body>
    <div class="top-links">
        <a href="admin_lk.php" class="btn-nav">← Назад в панель</a>
        <a href="mainpage.php" class="btn-nav">На главную</a>
    </div>

    <h2>Все заказы</h2>

    <form class="add-form" method="post" action="">
        <select name="user_id" required>
            <option value="">Выберите пользователя</option>
            <?php while ($user = $users_result->fetch_assoc()): ?>
                <option value="<?= $user['id'] ?>">
                    <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>
                </option>
            <?php endwhile; ?>
        </select>
        <select name="status" required>
            <option value="">Выберите статус</option>
            <option value="создан">создан</option>
            <option value="в обработке">в обработке</option>
            <option value="доставляется">доставляется</option>
            <option value="доставлен">доставлен</option>
        </select>
        <input type="text" name="address" placeholder="Адрес" required>
        <input type="tel" name="phone" placeholder="Телефон" pattern="\d{0,11}" maxlength="11" title="Максимум 11 цифр" oninput="this.value = this.value.replace(/\D/g, '').slice(0,11);">
        <input type="text" name="comments" placeholder="Комментарии">
        <button type="submit" name="add_order" class="btn-add">Добавить заказ</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID пользователя</th>
                <th>Дата</th>
                <th>Статус</th>
                <th>Адрес</th>
                <th>Телефон</th>
                <th>Комментарии</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Email</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['user_id']) ?></td>
                    <td>
                        <?php
                        $dt = new DateTime($row['order_date']);
                        echo $dt->format('d.m.Y H:i');
                        ?>
                    </td>
                    <td>
                        <form method="post" action="" class="inline-edit">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <select name="status" required>
                                <option value="создан" <?= $row['status'] === 'создан' ? 'selected' : '' ?>>создан</option>
                                <option value="в обработке" <?= $row['status'] === 'в обработке' ? 'selected' : '' ?>>в обработке</option>
                                <option value="доставляется" <?= $row['status'] === 'доставляется' ? 'selected' : '' ?>>доставляется</option>
                                <option value="доставлен" <?= $row['status'] === 'доставлен' ? 'selected' : '' ?>>доставлен</option>
                            </select>
                    </td>
                    <td>
                            <input type="text" name="address" value="<?= htmlspecialchars($row['address']) ?>" required>
                    </td>
                    <td>
                            <input type="tel" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" pattern="\d{0,11}" maxlength="11" title="Максимум 11 цифр" oninput="this.value = this.value.replace(/\D/g, '').slice(0,11);">
                    </td>
                    <td>
                            <input type="text" name="comments" value="<?= htmlspecialchars($row['comments']) ?>">
                    </td>
                    <td><?= htmlspecialchars($row['first_name']) ?></td>
                    <td><?= htmlspecialchars($row['last_name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td>
                            <button type="submit" name="edit_order" class="btn-save">Сохранить</button>
                        </form>
                        <form method="post" action="" style="display:inline-block; margin-left: 10px;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="delete_order" class="btn-delete" onclick="return confirm('Удалить этот заказ?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
