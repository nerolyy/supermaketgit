<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Овощи,фрукты,грибы</title>
  <link rel="stylesheet" href="chocolate.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <header>
    <div class="logo">
      <a href="mainpage.php"><img src="img/logo.png" alt="Логотип"></a>
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
        <a href="register.php"><img src="img/user.png" alt="Пользователь"></a>
        <a href="cart.php"><img src="img/buy.png" alt="Корзина"></a>
      </div>
    </nav>
  </header>

  <main class = content>
  <section class="category-section">
  <div class="category-header">Фрукты</div>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/apple.jpg" alt="Яблоки">
      <h3>Яблоки</h3>
      <p>Цена: 180 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Яблоки">
        <input type="hidden" name="price" value="180">
        <input type="hidden" name="image" value="img/foodcatalog/apple.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/banana.jpg" alt="Бананы">
      <h3>Бананы</h3>
      <p>Цена: 130 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Бананы">
        <input type="hidden" name="price" value="130">
        <input type="hidden" name="image" value="img/foodcatalog/banana.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>

<section class="category-section">
  <div class="category-header">Овощи</div>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/tomato.jpg" alt="Помидоры">
      <h3>Помидоры</h3>
      <p>Цена: 220 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Помидоры">
        <input type="hidden" name="price" value="220">
        <input type="hidden" name="image" value="img/foodcatalog/tomato.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/cucumber.jpg" alt="Огурцы">
      <h3>Огурцы</h3>
      <p>Цена: 135 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Огурцы">
        <input type="hidden" name="price" value="135">
        <input type="hidden" name="image" value="img/foodcatalog/cucumber.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>

<section class="category-section">
  <div class="category-header">Грибы</div>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/mushrooms.jpg" alt="Шампиньоны">
      <h3>Шампиньоны</h3>
      <p>Цена: 200 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Шампиньоны">
        <input type="hidden" name="price" value="200">
        <input type="hidden" name="image" value="img/foodcatalog/mushrooms.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/white mushrooms.jpg" alt="Белые грибы">
      <h3>Белые грибы</h3>
      <p>Цена: 380 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Белые грибы">
        <input type="hidden" name="price" value="380">
        <input type="hidden" name="image" value="img/foodcatalog/white mushrooms.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
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
        <a href="tel:+79077097841">+7 907 709 7841</a> – Онлайн поддержка
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

      <h4>Подписка на скидки</h4>
      <div class="subscribe">
        <input type="email" placeholder="Укажите ваш email...">
        <button><i class="fa-regular fa-paper-plane"></i></button>
      </div>
    </div>
  </footer>
</div>
</body>
</html>
