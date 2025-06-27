<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Мясо, птица, полуфабрикат</title>
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
  <div class="category-header">Шашлык</div>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/kebabchicken.jpg" alt="Шашлык куриный в маринаде">
      <h3>Шашлык куриный в маринаде</h3>
      <p>Цена: 980 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Шашлык куриный в маринаде">
        <input type="hidden" name="price" value="980">
        <input type="hidden" name="image" value="img/foodcatalog/kebabchicken.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/kebabcow.jpg" alt="Шашлык по-московски">
      <h3>Шашлык по-московски</h3>
      <p>Цена: 890 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Шашлык по-московски">
        <input type="hidden" name="price" value="890">
        <input type="hidden" name="image" value="img/foodcatalog/kebabcow.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>
<section class="category-section">
  <div class="category-header">Мясо птицы</div>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/chicken.jpg" alt="Филе грудки">
      <h3>Филе грудки</h3>
      <p>Цена: 560 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Филе грудки">
        <input type="hidden" name="price" value="560">
        <input type="hidden" name="image" value="img/foodcatalog/chicken.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/chicken1.jpg" alt="Стейк из грудки">
      <h3>Стейк из грудки</h3>
      <p>Цена: 570 ₽/кг</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Стейк из грудки">
        <input type="hidden" name="price" value="570">
        <input type="hidden" name="image" value="img/foodcatalog/chicken1.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>
<section class="category-section">
  <div class="category-header">Говядины</div>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/stakeribai.jpg" alt="Стейк Рибай">
      <h3>Стейк Рибай</h3>
      <p>Цена: 1200 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Стейк Рибай">
        <input type="hidden" name="price" value="1200">
        <input type="hidden" name="image" value="img/foodcatalog/stakeribai.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/steikdenver.jpg" alt="Стейк Топ Блейд">
      <h3>Стейк Топ Блейд</h3>
      <p>Цена: 1350 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Стейк Топ Блейд">
        <input type="hidden" name="price" value="1350">
        <input type="hidden" name="image" value="img/foodcatalog/steikdenver.jpg">
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
