<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Шоколад, конфеты, сладости </title>
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
  <h2 class="category-title">Шоколад</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/milkchocolate.jpg" alt="Молочный шоколад">
      <h3>Молочный шоколад</h3>
      <p>Цена: 150 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Молочный шоколад">
        <input type="hidden" name="price" value="150">
        <input type="hidden" name="image" value="img/foodcatalog/milkchocolate.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/darkchocolate.jpg" alt="Тёмный шоколад">
      <h3>Тёмный шоколад</h3>
      <p>Цена: 180 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Тёмный шоколад">
        <input type="hidden" name="price" value="180">
        <input type="hidden" name="image" value="img/foodcatalog/darkchocolate.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>

<section class="category-section">
  <h2 class="category-title">Конфеты</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/iris.jpg" alt="Ириски">
      <h3>Ириски</h3>
      <p>Цена: 120 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Ириски">
        <input type="hidden" name="price" value="120">
        <input type="hidden" name="image" value="img/foodcatalog/iris.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/chupachups.jpg" alt="Чупа-Чупс">
      <h3>Чупа-Чупс</h3>
      <p>Цена: 110 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Чупа-Чупс">
        <input type="hidden" name="price" value="110">
        <input type="hidden" name="image" value="img/foodcatalog/chupachups.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
  </div>
</section>

<section class="category-section">
  <h2 class="category-title">Сладости</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="img/foodcatalog/cookies.jpg" alt="Печенье">
      <h3>Печенье</h3>
      <p>Цена: 80 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Печенье">
        <input type="hidden" name="price" value="80">
        <input type="hidden" name="image" value="img/foodcatalog/cookies.jpg">
        <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
      </form>
    </div>
    <div class="product-card">
      <img src="img/foodcatalog/maffin.jpg" alt="Маффин">
      <h3>Маффин</h3>
      <p>Цена: 130 ₽</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Маффин">
        <input type="hidden" name="price" value="130">
        <input type="hidden" name="image" value="img/foodcatalog/maffin.jpg">
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