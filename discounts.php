<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Акции</title>
  <link rel="stylesheet" href="discounts.css" />
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
          <a href="register.php"><img src="img/user.png"/></a>
          <a href="cart.php"><img src="img/buy.png"/></a>
        </div>
      </nav>
    </header>

    <main>
  <section class="discounts-container">
    <h2 class="section-title">Скидки на товары</h2>
    <div class="products-grid">

      <div class="product-card">
        <div class="discount-label">-10%</div>
        <img src="discounts/mars.jpg" alt="" class="product-image">
        <div class="product-title">Шоколадный батончик Mars Max</div>
        <div class="product-weight">81г</div>
        <div class="product-price">
          <s>119₽</s>
          <span>107₽</span>
        </div>
        <form action="add_to_cart.php" method="post" class="add-to-cart-form">
          <input type="hidden" name="product_name" value="Шоколадный батончик Mars Max" />
          <input type="hidden" name="price" value="107" />
          <input type="hidden" name="image" value="discounts/mars.jpg" />
          <button type="submit" class="add-btn">+</button>
        </form>
      </div>

      <div class="product-card">
        <div class="discount-label">-36%</div>
        <img src="discounts/barni.jpg" alt="" class="product-image">
        <div class="product-title">Бисквит Медвежонок Барни,<br>с молочной начинкой</div>
        <div class="product-weight">150 г</div>
        <div class="product-price">
          <s>239 ₽</s>
          <span>173 ₽</span>
        </div>
        <form action="add_to_cart.php" method="post" class="add-to-cart-form">
          <input type="hidden" name="product_name" value="Бисквит Медвежонок Барни, с молочной начинкой" />
          <input type="hidden" name="price" value="173" />
          <input type="hidden" name="image" value="discounts/barni.jpg" />
          <button type="submit" class="add-btn">+</button>
        </form>
      </div>

      <div class="product-card">
        <div class="discount-label">-20%</div>
        <img src="discounts/avocado.jpg" alt="" class="product-image">
        <div class="product-title">Авокадо Хасс спелое,2шт</div>
        <div class="product-weight">2шт</div>
        <div class="product-price">
          <s>249 ₽</s>
          <span>199 ₽</span>
        </div>
        <form action="add_to_cart.php" method="post" class="add-to-cart-form">
          <input type="hidden" name="product_name" value="Авокадо Хасс спелое,2шт" />
          <input type="hidden" name="price" value="199" />
          <input type="hidden" name="image" value="discounts/avocado.jpg" />
          <button type="submit" class="add-btn">+</button>
        </form>
      </div>

      <div class="product-card">
        <div class="discount-label">-30%</div>
        <img src="discounts/oil.jpg" alt="" class="product-image">
        <div class="product-title">Масло оливковое Filippo<br> Berio Extra Virgin</div>
        <div class="product-weight">500мл</div>
        <div class="product-price">
          <s>1149 ₽</s>
          <span>799 ₽</span>
        </div>
        <form action="add_to_cart.php" method="post" class="add-to-cart-form">
          <input type="hidden" name="product_name" value="Масло оливковое Filippo Berio Extra Virgin" />
          <input type="hidden" name="price" value="799" />
          <input type="hidden" name="image" value="discounts/oil.jpg" />
          <button type="submit" class="add-btn">+</button>
        </form>
      </div>

      <div class="product-card">
        <div class="discount-label">-17%</div>
        <img src="discounts/cake.jpg" alt="" class="product-image">
        <div class="product-title">Торт Mirel Карамельный на сгущёнке</div>
        <div class="product-weight">700г</div>
        <div class="product-price">
          <s>619 ₽</s>
          <span>519 ₽</span>
        </div>
        <form action="add_to_cart.php" method="post" class="add-to-cart-form">
          <input type="hidden" name="product_name" value="Торт Mirel Карамельный на сгущёнке" />
          <input type="hidden" name="price" value="519" />
          <input type="hidden" name="image" value="discounts/cake.jpg" />
          <button type="submit" class="add-btn">+</button>
        </form>
      </div>
      <div class="product-card">
        <div class="discount-label">-18%</div>
        <img src="discounts/abrikos.jpg" alt="" class="product-image">
        <div class="product-title">Абрикосы</div>
        <div class="product-weight">500г</div>
        <div class="product-price">
          <s>369 ₽</s>
          <span>299 ₽</span>
        </div>
        <form action="add_to_cart.php" method="post" class="add-to-cart-form">
          <input type="hidden" name="product_name" value="Абрикосы" />
          <input type="hidden" name="price" value="299" />
          <input type="hidden" name="image" value="discounts/abrikos.jpg" />
          <button type="submit" class="add-btn">+</button>
        </form>
      </div>

      <div class="product-card">
        <div class="discount-label">-20%</div>
        <img src="discounts/chips.jpg" alt="" class="product-image">
        <div class="product-title">Чипсы Lay's Рифленые Сметана-Лук<br></div>
        <div class="product-weight">225г</div>
        <div class="product-price">
          <s>299 ₽</s>
          <span>239 ₽</span>
        </div>
        <form action="add_to_cart.php" method="post" class="add-to-cart-form">
          <input type="hidden" name="product_name" value="Чипсы Lay's Рифленые Сметана-Лук" />
          <input type="hidden" name="price" value="239" />
          <input type="hidden" name="image" value="discounts/chips.jpg" />
          <button type="submit" class="add-btn">+</button>
        </form>
      </div>
      <div class="product-card">
        <div class="discount-label">-13%</div>
        <img src="discounts/readyeat.jpg" alt="" class="product-image">
        <div class="product-title">Котлета куриная с картофельным пюре</div>
        <div class="product-weight">260г</div>
        <div class="product-price">
          <s>229 ₽</s>
          <span>199 ₽</span>
        </div>

        <form action="add_to_cart.php" method="post" class="add-to-cart-form">
          <input type="hidden" name="product_name" value="Котлета куриная с картофельным пюре" />
          <input type="hidden" name="price" value="199" />
          <input type="hidden" name="image" value="discounts/readyeat.jpg" />
          <button type="submit" class="add-btn">+</button>
        </form>
      </div>

      <div class="product-card">
        <div class="discount-label">-35%</div>
        <img src="discounts/suxinichi.jpg" alt="" class="product-image">
        <div class="product-title">Сухиничи Мираторг<br>из куриного филе сушеные</div>
        <div class="product-weight">40г</div>
        <div class="product-price">
          <s>184 ₽</s>
          <span>119 ₽</span>
        </div>
        <form action="add_to_cart.php" method="post" class="add-to-cart-form">
          <input type="hidden" name="product_name" value="Сухиничи Мираторг из куриного филе сушеные," />
          <input type="hidden" name="price" value="119" />
          <input type="hidden" name="image" value="discounts/suxinichi.jpg" />
          <button type="submit" class="add-btn">+</button>
        </form>
      </div>

      <div class="product-card">
        <div class="discount-label">-32%</div>
        <img src="discounts/womanmoment.jpg" alt="" class="product-image">
        <div class="product-title">Тушь Vivienne Sabo Cabaret со<br> сценическим эффектом для ресниц тон 01</div>
        <div class="product-weight">9мл</div>
        <div class="product-price">
          <s>589 ₽</s>
          <span>399 ₽</span>
        </div>
        <form action="add_to_cart.php" method="post" class="add-to-cart-form">
          <input type="hidden" name="product_name" value="Тушь Vivienne Sabo Cabaret со сценическим эффектом для ресниц тон 01" />
          <input type="hidden" name="price" value="399" />
          <input type="hidden" name="image" value="discounts/womanmoment.jpg" />
          <button type="submit" class="add-btn">+</button>
        </form>
      </div>

      <div class="product-card">
        <div class="discount-label">-18%</div>
        <img src="discounts/tunec.jpg" alt="" class="product-image">
        <div class="product-title">Филе Thai Blue тунца желтоперого <br>в собственном соку</div>
        <div class="product-weight">160г</div>
        <div class="product-price">
          <s>239 ₽</s>
          <span>194 ₽</span>
        </div>
        <form action="add_to_cart.php" method="post" class="add-to-cart-form">
          <input type="hidden" name="product_name" value="Филе Thai Blue тунца желтоперого в собственном соку" />
          <input type="hidden" name="price" value="194" />
          <input type="hidden" name="image" value="discounts/tunec.jpg" />
          <button type="submit" class="add-btn">+</button>
        </form>
      </div>

      <div class="product-card">
        <div class="discount-label">-25%</div>
        <img src="discounts/womanmoment1.jpg" alt="" class="product-image">
        <div class="product-title">Крем Missha М Perfect Cover BB EX SPF42 тон 23</div>
        <div class="product-weight">20мл</div>
        <div class="product-price">
          <s>1799 ₽</s>
          <span>1339 ₽</span>
        </div>
        <form action="add_to_cart.php" method="post" class="add-to-cart-form">
          <input type="hidden" name="product_name" value="Крем Missha М Perfect Cover BB EX SPF42 тон 23" />
          <input type="hidden" name="price" value="1339" />
          <input type="hidden" name="image" value="discounts/womanmoment1.jpg" />
          <button type="submit" class="add-btn">+</button>
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
