<?php
session_start();

if (isset($_GET['delete'])) {
    $index = (int)$_GET['delete'];
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
    header("Location: cart.php");
    exit();
}

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Корзина</title>
  <!-- Подключение стилей -->
  <link rel="stylesheet" href="cart.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<!-- Шапка сайта -->
<header>
  <div class="logo">
    <!-- Логотип с ссылкой на главную страницу -->
    <a href="mainpage.php"><img src="img/logo.png" alt=""/></a>
    <div class="store-name">DREAM STORE</div>
  </div>
  <nav>
    <div class="menu-links">
      <!-- Навигационные ссылки -->
      <a href="mainpage.php">Главная</a>
      <a href="catalog.php">Каталог</a>
      <a href="discounts.php">Акции</a>
      <a href="feedback.php">Поддержка</a>
      <a href="lk.php">Ваш профиль</a>
    </div>
    <div class="icons">
      <!-- Иконка пользователя и корзины -->
      <a href="register.php"><img src="img/user.png"/></a>
      <a href="cart.php"><img src="img/buy.png"/></a>
    </div>
  </nav>
</header>

<main>
<div class="cart-container">

  <!-- Если корзина пуста -->
  <?php if (empty($cart)): ?>
    <p class="empty-cart">Корзина пуста</p>
  
  <!-- Если корзина не пуста -->
  <?php else: ?>
  
    <!-- Сообщение о минимальной сумме заказа -->
    <div class="cart-warning">
      <i class="fa-solid fa-circle-exclamation"></i> Минимальная сумма заказа 500 ₽
    </div>

    <!-- Список товаров в корзине -->
    <div class="cart-list">
      <?php foreach ($cart as $index => $item): ?>
        <div class="cart-item">
          <!-- Изображение товара -->
          <img src="<?= htmlspecialchars($item['image']) ?>" alt="Товар">
          
          <div class="item-info">
            <!-- Название товара -->
            <div class="item-name"><?= htmlspecialchars($item['product_name']) ?></div>
            
            <div class="item-controls">
              <!-- Форма изменения количества товара -->
              <form action="update_quantity.php" method="post" class="quantity-form">
                <input type="hidden" name="index" value="<?= $index ?>">
                <button name="action" value="decrease">−</button>
                <span><?= $item['quantity'] ?></span>
                <button name="action" value="increase">+</button>
              </form>

              <!-- Цена за количество -->
              <div class="item-price"><?= $item['price'] * $item['quantity'] ?> <span>₽</span></div>

              <!-- Кнопка удаления товара из корзины -->
              <a class="delete-btn" href="cart.php?delete=<?= $index ?>"><i class="fa-solid fa-trash"></i></a>
            </div>
          </div>
        </div>

        <!-- Подсчёт общей суммы -->
        <?php $total += $item['price'] * $item['quantity']; ?>
      <?php endforeach; ?>
    </div>

    <!-- Нижняя часть корзины: итоговая сумма и кнопки -->
    <div class="cart-footer">
      <!-- Кнопка продолжить покупки -->
      <a href="catalog.php" class="continue-btn">← Продолжить покупки</a>

      <!-- Общая сумма и кнопка оформления заказа -->
      <div class="total-block">
        <span class="total-price"><?= $total ?> ₽</span>
        <a href="order.php" class="order-btn">Оформить заказ</a>
      </div>
    </div>

  <?php endif; ?>
</div>
</main>

</body>
</html>
