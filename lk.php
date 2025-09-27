<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['user_email'])) {
    if (isset($_COOKIE['user_email']) && isset($_COOKIE['user_id']) && isset($_COOKIE['first_name'])) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['first_name'] = $_COOKIE['first_name'];
        $_SESSION['user_email'] = $_COOKIE['user_email'];
    } else {
        header("Location: register.php");
        exit();
    }
}

$email = $_SESSION['user_email'];
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверка на выход из аккаунта
    if (isset($_POST['logout'])) {
        // Очистка сессии
        session_unset();
        session_destroy();
        
        // Очистка куки
        if (isset($_COOKIE['user_email'])) {
            setcookie('user_email', '', time() - 3600, "/");
        }
        if (isset($_COOKIE['user_id'])) {
            setcookie('user_id', '', time() - 3600, "/");
        }
        if (isset($_COOKIE['first_name'])) {
            setcookie('first_name', '', time() - 3600, "/");
        }
        
        header("Location: mainpage.php");
        exit();
    }
    
    // Обновление данных профиля
    $newFirst = $_POST['first_name'];
    $newLast = $_POST['last_name'];
    $newPhone = $_POST['phone'];
    $newAddress = $_POST['address'];

    $updateQuery = "UPDATE users SET first_name=?, last_name=?, phone=?, address=? WHERE email=?";
    $stmt = $conn->prepare($updateQuery);

    if ($stmt) {
        $stmt->bind_param("sssss", $newFirst, $newLast, $newPhone, $newAddress, $email);
        if ($stmt->execute()) {
            $successMessage = "Данные успешно обновлены!";
            $_SESSION['first_name'] = $newFirst;

            if (isset($_COOKIE['user_id'])) {
                setcookie('first_name', $newFirst, time() + 86400, "/");
            }
        }
    }
}

$query = "SELECT first_name, last_name, phone, email, address, role FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "Ошибка: пользователь не найден.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Мой профиль</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="lk.css" />
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
    </div>
    <div class="icons">
      <a href="register.php"><img src="img/user.png" /></a>
      <a href="cart.php"><img src="img/buy.png" /></a>
    </div>
  </nav>
</header>

<main class="profile-container">
  <aside class="sidebar">
    <div class="user-info">
      <img src="img/user.png" alt="avatar" />
      <h3><?= htmlspecialchars($user['first_name']) . " " . htmlspecialchars($user['last_name']); ?></h3>
    </div>
    <ul class="menu">
      <li class="active"><i class="fas fa-user"></i> Персональная информация</li>
      <li><i class="fas fa-shopping-cart"></i> Мои заказы</li>
      <li><i class="fas fa-heart"></i> Избранное</li>
      <li><i class="fas fa-credit-card"></i> Сохраненные карты</li>
      <li><i class="fas fa-bell"></i> Уведомления</li>
      <?php if (!empty($user['role']) && $user['role'] === 'admin'): ?>
        <li class="admin-link"><i class="fas fa-cogs"></i> <a href="admin_lk.php">Админ-панель</a></li>
      <?php endif; ?>
    </ul>
  </aside>

  <section class="profile-main">
    <h2>Моя учетная запись</h2>

    <?php if (!empty($successMessage)) : ?>
      <div class="success-message"><?= htmlspecialchars($successMessage) ?></div>
    <?php endif; ?>

    <form class="profile-form" method="post" id="profileForm">
      <div>
        <label>Имя</label>
        <input type="text" name="first_name" value="<?= htmlspecialchars($user['first_name']) ?>" readonly />
      </div>
      <div>
        <label>Фамилия</label>
        <input type="text" name="last_name" value="<?= htmlspecialchars($user['last_name']) ?>" readonly />
      </div>
      <div>
        <label>Номер телефона</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" readonly />
      </div>
      <div>
        <label>Адрес электронной почты</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" readonly disabled />
      </div>
      <div>
        <label>Ваш адрес</label>
        <input type="text" name="address" value="<?= htmlspecialchars($user['address']) ?>" readonly />
      </div>

      <button type="button" id="editBtn">Изменить данные профиля</button>
      <button type="submit" id="saveBtn" style="display:none;">Сохранить</button>
    </form>
    
    <form method="post" style="margin-top: 20px;">
      <button type="submit" name="logout" value="1" style="background-color: #dc3545; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
        <i class="fas fa-sign-out-alt"></i> Выйти из аккаунта
      </button>
    </form>
  </section>
</main>

<footer class="footer">
  <div class="footer-section">
    <h4>Информация</h4>
    <ul>
      <li><a href="#">Новости</a></li>
      <li><a href="#">Блог</a></li>
      <li><a href="#">О нас</a></li>
    </ul>
  </div>

  <div class="footer-section">
    <h4>Контакты</h4>
    <p><a href="tel:+79077097914">+7 907 709 7914</a> – Служба поддержки</p>
    <p><a href="#">Магазины</a></p>
    <p>
      <a href="tel:+79077097841">+7 907 709 7841</a> – Онлайн служба поддержки
      <i class="fab fa-whatsapp"></i>
      <i class="fab fa-telegram"></i>
    </p>
  </div>

  <div class="footer-section">
    <h4>Следите за нами</h4>
    <div class="social-icons">
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-whatsapp"></i></a>
      <a href="#"><i class="fab fa-telegram"></i></a>
    </div>

    <h4>Подписывайтесь на скидки</h4>
    <div class="subscribe">
      <input type="email" placeholder="Укажите ваш email..." />
      <button><i class="fa-regular fa-paper-plane"></i></button>
    </div>
  </div>
</footer>

<script src="lk.js"></script>
</body>
</html>
