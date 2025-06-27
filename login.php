<?php
session_start();
require_once 'db.php';

$error = '';

// Восстановление сессии из cookie, если сессия отсутствует
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['first_name'] = $_COOKIE['first_name'];
    $_SESSION['user_email'] = $_COOKIE['user_email'];
    $_SESSION['role'] = $_COOKIE['user_role'] ?? 'user';

    // Перенаправление в зависимости от роли
    if ($_SESSION['role'] === 'admin') {
        header("Location: admin_lk.php");
    } else {
        header("Location: lk.php");
    }
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($email) || empty($password)) {
        $error = "Пожалуйста, заполните все поля.";
    } else {
        
        $query = "SELECT id, first_name, pass, role FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if ($password === $user['pass']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['user_email'] = $email;
                $_SESSION['role'] = $user['role'];

                if (isset($_POST['remember'])) {
                    setcookie('user_id', $user['id'], time() + 86400, "/");
                    setcookie('first_name', $user['first_name'], time() + 86400, "/");
                    setcookie('user_email', $email, time() + 86400, "/");
                    setcookie('user_role', $user['role'], time() + 86400, "/");
                }

            
                if ($user['role'] === 'admin') {
                    header("Location: lk.php");
                } else {
                    header("Location: lk.php");
                }
                exit();
            } else {
                $error = "Неверный пароль!";
            }
        } else {
            $error = "Пользователь с таким email не найден.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Вход в аккаунт</title>
    <link rel="stylesheet" href="login.css" />
</head>
<body>
<header>
    <div class="logo">
        <a href="mainpage.php"><img src="img/logo.png" alt="" /></a>
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
            <a href="register.php"><img src="img/user.png" alt="Регистрация" /></a>
            <a href="cart.php"><img src="img/buy.png" alt="Корзина" /></a>
        </div>
    </nav>
</header>

<div class="container">
    <div class="left-panel">
        <img src="img/registration.jpg" alt="Регистрация" />
    </div>
    <div class="right-panel">
        <form action="login.php" method="POST">
            <h2>Добро пожаловать!</h2>
            <p>Пожалуйста, войдите в свой аккаунт</p>

            <?php if (!empty($error)): ?>
                <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <label for="email">Электронная почта</label>
            <input type="email" id="email" name="email" required placeholder="Введите вашу почту" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">

            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required placeholder="Введите пароль">

            <div class="options">
                <label><input type="checkbox" name="remember"> Запомнить меня</label>
                <a href="#">Забыли пароль?</a>
            </div>

            <button type="submit">Войти</button>

            <p class="switch-link">Нет аккаунта? <a href="register.php">Регистрация</a></p>
        </form>
    </div>
</div>
</body>
</html>
