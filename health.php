<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Красота, гигиена, аптека</title>
  <link rel="stylesheet" href="chocolate.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <div class="wrapper">
    <header>
      <div class="logo">
        <a href="mainpage.php"><img src="img/logo.png" alt="Logo"/></a>
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
          <a href="register.php"><img src="img/user.png" alt="User"/></a>
          <a href="cart.php"><img src="img/buy.png" alt="Cart"/></a>
        </div>
      </nav>
    </header>

    <main class = content>
      <section class="category-section">
  <h2 class="category-title">Аптека</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/vitamins.jpg" alt="Витамин Д3">
      <h3>Витамин Д3</h3>
      <p>Цена: 1500 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Витамин Д3">
        <input type="hidden" name="price" value="1500">
        <input type="hidden" name="image" value="img/foodcatalog/vitamins.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/ascorbin.jpg" alt="Аскорбиновая кислота">
      <h3>Аскорбиновая кислота</h3>
      <p>Цена: 180 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Аскорбиновая кислота">
        <input type="hidden" name="price" value="180">
        <input type="hidden" name="image" value="img/foodcatalog/ascorbin.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>

<section class="category-section">
  <h2 class="category-title">Бумажная и ватная продукция</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/vlajnie.jpg" alt="Салфетки влажные">
      <h3>Салфетки влажные</h3>
      <p>Цена: 120 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Салфетки влажные">
        <input type="hidden" name="price" value="120">
        <input type="hidden" name="image" value="img/foodcatalog/vlajnie.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/salfekipaper.jpg" alt="Салфетки бумажные">
      <h3>Салфетки бумажные</h3>
      <p>Цена: 110 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Салфетки бумажные">
        <input type="hidden" name="price" value="110">
        <input type="hidden" name="image" value="img/foodcatalog/salfekipaper.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>

<section class="category-section">
  <h2 class="category-title">Косметические наборы</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/tush.jpg" alt="Набор для бровей">
      <h3>Набор для бровей</h3>
      <p>Цена: 2000 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Набор для бровей">
        <input type="hidden" name="price" value="2000">
        <input type="hidden" name="image" value="img/foodcatalog/tush.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/nabor.jpg" alt="Набор подарочный">
      <h3>Набор подарочный</h3>
      <p>Цена: 1500 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Набор подарочный">
        <input type="hidden" name="price" value="1500">
        <input type="hidden" name="image" value="img/foodcatalog/nabor.jpg">
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
  </div>
</body>
</html>