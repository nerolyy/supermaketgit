<?php
session_start();
require_once('db.php'); 

if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['first_name'] = $_COOKIE['first_name'];
    $_SESSION['user_email'] = $_COOKIE['user_email'];
    $_SESSION['role'] = $_COOKIE['user_role'] ?? 'user';
}

if (!isset($_SESSION['user_id'])) {
    header("Location: register.php");
    exit();
}

$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
    header("Location: cart.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$errors = [];
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $address = trim($_POST['address'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $comments = trim($_POST['comments'] ?? '');

    if ($address === '') {
        $errors[] = 'Введите адрес доставки';
    }
    if ($phone === '') {
        $errors[] = 'Введите телефон';
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO orders (user_id, order_date, status, address, phone, comments) VALUES (?, NOW(), 'Новый', ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $address, $phone, $comments);
        if ($stmt->execute()) {
            $order_id = $stmt->insert_id;
            $stmt->close();

            $stmtItems = $conn->prepare("INSERT INTO order_items (order_id, product_name, price, quantity) VALUES (?, ?, ?, ?)");
            foreach ($cart as $item) {
                $stmtItems->bind_param("isdi", $order_id, $item['product_name'], $item['price'], $item['quantity']);
                $stmtItems->execute();
            }
            $stmtItems->close();

            unset($_SESSION['cart']);

            $successMessage = "Заказ успешно оформлен! Спасибо за покупку.";
        } else {
            $errors[] = "Ошибка при сохранении заказа.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<title>Оформление заказа</title>
<link rel="stylesheet" href="order.css" />
</head>
<body>
<header>
  <a href="cart.php" class="styled-link back"> Вернуться в корзину</a>
</header>

<main>
<h1>Оформление заказа</h1>

<?php if ($successMessage): ?>
    <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
    <a href="mainpage.php" class="styled-link home">Вернуться на главную</a>
<?php else: ?>
    <?php if ($errors): ?>
        <ul style="color: red;">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" action="order.php">
        <label for="address">Адрес доставки:<br />
  <input type="text" id="address" name="address" value="<?= htmlspecialchars($_POST['address'] ?? '') ?>" required />
</label><br />

<label for="phone">Номер телефона:<br />
  <input
    type="tel"
    id="phone"
    name="phone"
    required
    pattern="\d{11}"
    maxlength="11"
    inputmode="numeric"
    title="Введите ровно 11 цифр"
    value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>"
    oninput="this.value = this.value.replace(/\D/g, '').slice(0,11)"
  />
</label><br />

<label for="comments">Комментарий к заказу:<br />
  <textarea id="comments" name="comments"><?= htmlspecialchars($_POST['comments'] ?? '') ?></textarea>
</label><br />


        <button type="submit">Подтвердить заказ</button>
    </form>
<?php endif; ?>
</main>
</body>
</html>
