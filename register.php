<?php
session_start();
require_once('db.php');

$message = '';

$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';
$address = $_POST['address'] ?? '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pass = $_POST['pass'] ?? '';
    $repeatpass = $_POST['repeatpass'] ?? '';
    $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';

    $recaptcha_secret = '6LcmfnArAAAAAHaotlMESSnCnirHNYWpxNhCqEVR';
    $verify_url = 'https://www.google.com/recaptcha/api/siteverify';

    $data = [
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response
    ];

    $ch = curl_init($verify_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $response = curl_exec($ch);
    $curl_error = curl_error($ch);
    curl_close($ch);

    // Отладочная информация
    if ($curl_error) {
        $message = "Ошибка cURL: " . $curl_error;
    } else {
        $captcha_success = json_decode($response, true);
        
        // Отладочная информация (удалить после исправления)
        if (empty($recaptcha_response)) {
            $message = "reCAPTCHA не была пройдена. Ответ: " . $recaptcha_response;
        } elseif (!$captcha_success || !isset($captcha_success['success'])) {
            $message = "Ошибка ответа reCAPTCHA API. Ответ: " . $response;
        } elseif (!$captcha_success['success']) {
            $message = "Подтвердите, что вы не робот. Ошибки: " . implode(', ', $captcha_success['error-codes'] ?? []);
        }
    }
    
    // Проверка полей только если капча прошла успешно
    if (empty($message) && (empty($first_name) || empty($last_name) || empty($phone) || empty($email) || empty($pass) || empty($repeatpass) || empty($address))) {
        $message = "Заполните все поля";
    } elseif (empty($message) && $pass !== $repeatpass) {
        $message = "Пароли не совпадают";
    } elseif (empty($message) && (strlen($pass) < 8 || !preg_match('/\d/', $pass))) {
        $message = "Пароль должен содержать минимум 8 символов и хотя бы одну цифру";
    } elseif (empty($message)) {
        $sql = "INSERT INTO users (first_name, last_name, phone, email, pass, address)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $first_name, $last_name, $phone, $email, $pass, $address);

        if ($stmt->execute()) {
            $_SESSION['user_email'] = $email;
            header("Location: lk.php");
            exit();
        } else {
            $message = "Ошибка: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Регистрация</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="register.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
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
<body>
  <div class="container">
    <div class="left-side">
      <img src="img/registration.jpg" alt="Супермаркет" />
    </div>

    <div class="right-side">
    <form action="register.php" method="POST" class="register-form">
        <h2>Создание нового аккаунта</h2>
        <p class="subtitle">Пожалуйста введите данные</p>

        <?php if (!empty($message)): ?>
          <div class="error-box"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <label>Имя</label>
        <input type="text" name="first_name" value="<?= htmlspecialchars($first_name) ?>" required>

        <label>Фамилия</label>
        <input type="text" name="last_name" value="<?= htmlspecialchars($last_name) ?>" required>

        <label>Номер телефона</label>
        <input type="tel" name="phone" value="<?= htmlspecialchars($phone) ?>" required 
        inputmode="numeric" 
        pattern="\d{11}" 
        maxlength="11" 
        title="Введите ровно 11 цифр"
        oninput="this.value = this.value.replace(/\D/g, '').slice(0,11)">

        <label>Электронная почта</label>
        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

        <label>Пароль</label>
        <input type="password" name="pass" required>

        <label>Повторите пароль</label>
        <input type="password" name="repeatpass" required>

        <label>Адрес</label>
        <input type="text" name="address" value="<?= htmlspecialchars($address) ?>" required>

        <div class="g-recaptcha" data-sitekey="6LcmfnArAAAAAAIs8JjOIdfJSNPW2HbehqisdspN"></div>

        <button type="submit">Зарегестрироваться</button>
        <p class="login-link">Уже есть аккаунт? Войдите <a href="login.php">Войти</a></p>
      </form>
    </div>
  </div>
</body>
</html>
