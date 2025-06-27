<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Морепродукты</title>
  <link rel="stylesheet" href="chocolate.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <header>
    <div class="logo">
      <a href="mainpage.php"><img src="img/logo.png" alt="Логотип" /></a>
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
        <a href="register.php"><img src="img/user.png" alt="Пользователь" /></a>
        <a href="cart.php"><img src="img/buy.png" alt="Корзина" /></a>
      </div>
    </nav>
  </header>

  <main class = content>
  <section class="category-section">
  <div class="category-header">Красная рыба</div>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/losos.jpg" alt="Лосось">
      <h3>Лосось</h3>
      <p>Цена: 980 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Лосось">
        <input type="hidden" name="price" value="980">
        <input type="hidden" name="image" value="img/foodcatalog/losos.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/forel.jpg" alt="Форель">
      <h3>Форель</h3>
      <p>Цена: 890 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Форель">
        <input type="hidden" name="price" value="890">
        <input type="hidden" name="image" value="img/foodcatalog/forel.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>

<section class="category-section">
  <div class="category-header">Белая рыба</div>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/treska.jpg" alt="Треска">
      <h3>Треска</h3>
      <p>Цена: 560 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Треска">
        <input type="hidden" name="price" value="560">
        <input type="hidden" name="image" value="img/foodcatalog/treska.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/piksha.jpg" alt="Пикша">
      <h3>Пикша</h3>
      <p>Цена: 470 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Пикша">
        <input type="hidden" name="price" value="470">
        <input type="hidden" name="image" value="img/foodcatalog/piksha.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>

<section class="category-section">
  <div class="category-header">Консервированная рыба</div>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/tunec.jpg" alt="Тунец в масле">
      <h3>Тунец в масле</h3>
      <p>Цена: 120 ₽/банка</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Тунец в масле">
        <input type="hidden" name="price" value="120">
        <input type="hidden" name="image" value="img/foodcatalog/tunec.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/sardina.jpg" alt="Сардины">
      <h3>Сардины</h3>
      <p>Цена: 85 ₽/банка</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Сардины">
        <input type="hidden" name="price" value="85">
        <input type="hidden" name="image" value="img/foodcatalog/sardina.jpg">
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
        <input type="email" placeholder="Укажите ваш email..." />
        <button><i class="fa-regular fa-paper-plane"></i></button>
      </div>
    </div>
  </footer>
</div>
</body>
</html>
