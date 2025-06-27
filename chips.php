<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Чипсы, снэки, попкорн</title>
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

  <main  class = content>
    <section class="category-section">
  <h2 class="category-header">Чипсы</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/chips.jpg" alt="Чипсы сырные Lay's">
      <h3>Чипсы сырные Lay's</h3>
      <p>Цена: 140 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Чипсы сырные Lay's">
        <input type="hidden" name="price" value="140">
        <input type="hidden" name="image" value="img/foodcatalog/chips.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/chips1.jpg" alt="Чипсы рифленные Lay's MAXX">
      <h3>Чипсы рифленные Lay's MAXX "Грибы в сливочном соусе"</h3>
      <p>Цена: 150 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Чипсы Lay's MAXX 'Грибы в сливочном соусе'">
        <input type="hidden" name="price" value="150">
        <input type="hidden" name="image" value="img/foodcatalog/chips1.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>

<section class="category-section">
  <h2 class="category-header">Снэки</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/kuzya.jpg" alt="Сладкая кукуруза Кузя">
      <h3>Сладкая кукуруза "Кузя"</h3>
      <p>Цена: 70 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Сладкая кукуруза Кузя">
        <input type="hidden" name="price" value="70">
        <input type="hidden" name="image" value="img/foodcatalog/kuzya.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/grenki.jpg" alt="Гренки с бужениной">
      <h3>Гренки с бужениной</h3>
      <p>Цена: 75 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Гренки с бужениной">
        <input type="hidden" name="price" value="75">
        <input type="hidden" name="image" value="img/foodcatalog/grenki.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>

<section class="category-section">
  <h2 class="category-header">Попкорн</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/popcornsalt.jpg" alt="Попкорн морская соль">
      <h3>Попкорн "Holy Corn" морская соль</h3>
      <p>Цена: 100 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Попкорн Holy Corn морская соль">
        <input type="hidden" name="price" value="100">
        <input type="hidden" name="image" value="img/foodcatalog/popcornsalt.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/popcorncheese.jpg" alt="Попкорн сыр">
      <h3>Попкорн "Holy Corn" нежный сыр</h3>
      <p>Цена: 100 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Попкорн Holy Corn нежный сыр">
        <input type="hidden" name="price" value="100">
        <input type="hidden" name="image" value="img/foodcatalog/popcorncheese.jpg">
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
