<?php
// Подключение к базе данных supermarket
$conn = new mysqli("localhost", "root", "", "supermarket");
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Обработка формы обратной связи
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO feedback (email, message) VALUES ('$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Ваше сообщение отправлено! Спасибо за обращение.');</script>";
    } else {
        echo "<script>alert('Ошибка при отправке сообщения. Попробуйте позже.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обратная связь</title>
    <link rel="stylesheet" href="feedback.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
<header>
  <div class="logo">
    <a href="mainpage.php"><img src="img/logo.png" alt=""/></a>
    <div class="store-name">DREAM STORE</div>
  </div>
  <nav>
    <div class="menu-links">
      <a href="mainpage.php">Главная</a>
      <a href="catalog.php">Каталог</a>
      <a href="discounts.php">Акции</a>
      <a href="feedback.php">Поддержка</a>
      <a href="lk.php">Ваш профиль</a>
    </div>
    <div class="icons">
      <a href="register.php"><img src="img/user.png"/></a>
      <a href="cart.php"><img src="img/buy.png"/></a>
    </div>
  </nav>
</header>

<div class="left">
    <img src="img/feedback.jpg">
</div>

<div class="right">
    <div class="form-container">
        <h2>Обратная связь</h2>
        <p>Напиши что тебя волнует, а мы как можно скорее поможем тебе</p>
        <form action="feedback.php" method="POST">
            <label for="email">Email-адрес</label>
            <input type="email" id="email" name="email" placeholder="example@example.com" required>

            <label for="message">Обращение</label>
            <textarea id="message" name="message" placeholder="Ваше сообщение..." required></textarea>

            <button class="submit-btn" type="submit">Отправить</button>
        </form>
    </div>
</div>

</body>
</html>
