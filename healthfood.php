<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Здоровье</title>
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
  <h2 class="category-title">Диабетическая продукция</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/granola.jpg" alt="Гранола (Мюсли)">
      <h3>Гранола (Мюсли)</h3>
      <p>Цена: 150 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Гранола (Мюсли)">
        <input type="hidden" name="price" value="150">
        <input type="hidden" name="image" value="img/foodcatalog/granola.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/cikoriy.jpg" alt="Цикорий">
      <h3>Цикорий</h3>
      <p>Цена: 180 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Цикорий">
        <input type="hidden" name="price" value="180">
        <input type="hidden" name="image" value="img/foodcatalog/cikoriy.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>

<section class="category-section">
  <h2 class="category-title">Спортивное питание</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/proteinbar.jpg" alt="Батончик протеиновый">
      <h3>Батончик протеиновый</h3>
      <p>Цена: 120 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Батончик протеиновый">
        <input type="hidden" name="price" value="120">
        <input type="hidden" name="image" value="img/foodcatalog/proteinbar.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/proteinice.jpg" alt="Мороженое протеиновое">
      <h3>Мороженое протеиновое</h3>
      <p>Цена: 110 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Мороженое протеиновое">
        <input type="hidden" name="price" value="110">
        <input type="hidden" name="image" value="img/foodcatalog/proteinice.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>

<section class="category-section">
  <h2 class="category-title">Суперфуд</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/oiltikva.jpg" alt="">
      <h3>Масло тыквенное</h3>
      <p>Цена: 2400 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Масло тыквенное">
        <input type="hidden" name="price" value="2400">
        <input type="hidden" name="image" value="img/foodcatalog/oiltikva.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/semenakonopli.jpg" alt="">
      <h3>Семена конопли</h3>
      <p>Цена: 250 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Семена конопли">
        <input type="hidden" name="price" value="250">
        <input type="hidden" name="image" value="img/foodcatalog/semenakonopli.jpg">
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