<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Готовая еда</title>
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
    <div class="category-header">Готовая еда с курицей</div>
    <div class="product-grid">

      <div class="product-card">
        <img src="img/foodcatalog/sandwich.jpg" alt="Сэндвич с курицей" class="product-image">
        <h3 class="product-title">Сэндвич с курицей</h3>
        <p class="product-price">150 ₽</p>

        <form method="post" action="add_to_cart.php">
          <input type="hidden" name="product_name" value="Сэндвич с курицей">
          <input type="hidden" name="price" value="150">
          <input type="hidden" name="image" value="img/foodcatalog/sandwich.jpg">
          <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
        </form>
      </div>
      <div class="product-card">
      <img src="img/foodcatalog/cesar.jpg" alt="Салат цезарь">
      <h3>Салат цезарь</h3>
      <p>Цена: 270 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Салат цезарь">
        <input type="hidden" name="price" value="270">
        <input type="hidden" name="image" value="img/foodcatalog/cesar.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>

    </div>
  </section>

<section class="category-section">
  <div class="category-header">Готовая еда с говядиной</div>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/gamburger.jpg" alt="Гамбургер">
      <h3>Гамбургер</h3>
      <p>Цена: 120 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Гамбургер">
        <input type="hidden" name="price" value="120">
        <input type="hidden" name="image" value="img/foodcatalog/gamburger.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>

    <div class="product-card">
      <img src="img/foodcatalog/shaurma.jpg" alt="Шаурма с говядиной">
      <h3>Шаурма с говядиной</h3>
      <p>Цена: 230 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Шаурма с говядиной">
        <input type="hidden" name="price" value="230">
        <input type="hidden" name="image" value="img/foodcatalog/shaurma.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>

<section class="category-section">
  <div class="category-header">Готовая еда с рыбой</div>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/sushi.jpg" alt="Суши калифорния (8шт)">
      <h3>Суши калифорния (8шт)</h3>
      <p>Цена: 300 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Суши калифорния (8шт)">
        <input type="hidden" name="price" value="300">
        <input type="hidden" name="image" value="img/foodcatalog/sushi.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>

    <div class="product-card">
      <img src="img/foodcatalog/sandwichtunec.jpg" alt="Сэндвич с тунцом">
      <h3>Сэндвич с тунцом</h3>
      <p>Цена: 170 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Сэндвич с тунцом">
        <input type="hidden" name="price" value="170">
        <input type="hidden" name="image" value="img/foodcatalog/sandwichtunec.jpg">
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
