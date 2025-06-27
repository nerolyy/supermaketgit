<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Супермаркет</title>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="catalog.css">
</head>
<body>
<div class="page-wrapper">
<header>
  <div class="logo">
    <a href="mainpage.php"><img src="img/logo.png" alt=""/></a>
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
      <a href="register.php"><img src="img\user.png"/></a>
      <a href="cart.php"><img src="img/buy.png"/></a>
    </div>
  </nav>
</header>

<main class="catalog-container">
  <div class="categories">
  <a href="seafood.php" class="category category-seafood">
    <span>Морепродукты</span>
    <img src="img\seafood.png" >
  </a>
  <a href="vegatables_fruits.php" class="category category-fruits">
    <span>Овощи, фрукты, грибы</span>
    <img src="img\vege.png">
  </a>
  <a href="chocolate.php" class="category category-sweets">
    <span>Шоколад, конфеты, <br> сладости</span>
    <img src="discounts\fff.png" alt=>
  </a>
  <a href="healthfood.php" class="category category-health">
    <span>Здоровье</span>
    <img src="discounts\healthfood.png" alt=>
  </a>
  <a href="health.php" class="category category-beauty">
    <span>Красота, гигиена, аптека</span>
    <img src="discounts\health.png">
  </a>
  <a href="meat.php" class="category category-meat">
    <span>Мясо,птица,<br>полуфабрикат</span>
    <img src="discounts\meat.png" alt=>
  </a>
  <a href="chips.php" class="category category-snacks">
    <span>Чипсы, снеки, попкорн</span>
    <img src="discounts\chipsiki.png" alt=>
  </a>
  <a href="readyeat.php" class="category category-ready">
    <span>Готовая еда</span>
    <img src="discounts\ready.png">
  </a>
</div>


 <section class="discounts" id="discounts">
  <div class="discounts-header">
    <h2>Скидки</h2>
    <a href="#" class="arrow-link">
      <i class="fas fa-arrow-right"></i>
    </a>
  </div>

  <div class="discount-products-wrapper">
  <div class="product-combo">
    <div class="product">
      <span class="badge">-25%</span>
      <img src="img/saletomato.webp" alt="Томаты Рост Фламенко" />
      <div class="prices">
        <s>279 ₽</s><br />
        <span class="price">209 ₽</span>
      </div>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Томаты Рост Фламенко красные сливовидные">
        <input type="hidden" name="price" value="209.99">
        <input type="hidden" name="image" value="img/saletomato.webp">
        <button type="submit" class="add-to-cart">
          <i class="fas fa-shopping-cart"></i>
        </button>
      </form>
    </div>
    <div class="product-name">Томаты Рост Фламенко<br>красные сливовидные</div>
  </div>

  <div class="product-combo">
    <div class="product">
      <span class="badge">-15%</span>
      <img src="img/potatosale.webp" alt="Картофель ранний" />
      <div class="prices">
        <s>99 ₽</s><br />
        <span class="price">84 ₽</span>
      </div>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Картофель ранний Египет">
        <input type="hidden" name="price" value="84.99">
        <input type="hidden" name="image" value="img/potatosale.webp">
        <button type="submit" class="add-to-cart">
          <i class="fas fa-shopping-cart"></i>
        </button>
      </form>
    </div>
    <div class="product-name">Картофель ранний<br>Египет</div>
  </div>

  <div class="product-combo">
    <div class="product">
      <span class="badge">-16%</span>
      <img src="discounts/broccoli.jpg" alt="" />
      <div class="prices">
        <s>359 ₽</s><br />
        <span class="price">299 ₽</span>
      </div>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_name" value="Капуста брокколи">
        <input type="hidden" name="price" value="229">
        <input type="hidden" name="image" value="discounts/broccoli.jpg">
        <button type="submit" class="add-to-cart">
          <i class="fas fa-shopping-cart"></i>
        </button>
      </form>
    </div>
    <div class="product-name">Капуста брокколи</div>
  </div>
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
  
<script src="main.js"></script>
</body>
</html>
