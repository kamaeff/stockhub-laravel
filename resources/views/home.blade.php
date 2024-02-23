<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./assets/icon.png" type="image/x-icon">

  <title>StockHub12</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css">
  <link rel="stylesheet" href="{{asset('css/landing/style.css')}}" />

  <script src="{{asset('js/landing/app.js')}}"></script>
</head>

<body>
  <div class="container">
    <header class="header">
      <div class="burger" id="burger">
        <i class="ri-menu-3-line"></i>
      </div>
      <div class="header__img-adaptive">
        <img src="{{asset('storage/stocklogo.png')}}" alt="logo" width="200" height="200" />
      </div>
      <nav>
        <ul class="nav">
          <li>
            <a href="https://telegra.ph/Dogovor-oferty-na-okazanie-uslugi-11-27" target="_blank">Договор оферты</a>
          </li>
          <li>
            <a href="mailto:help@stockhub12.ru" target="_blank">Контакты</a>
          </li>

          <li>
            <div class="header__img">
              <img src="{{asset('storage/stocklogo.png')}}" alt="logo" width="200" height="200" />
            </div>
          </li>

          <li>
            <a href="https://t.me/stockhub12bot" target="_blank">Заказать</a>
          </li>
          <li>
            <a href="https://t.me/stockhub12" target="_blank">Телеграм канал</a>
          </li>

        </ul>
      </nav>
    </header>

    <main class="main">
      <div class="main__left-side">
        <h1>Магазин брендовых кроссовок</h1>
        <a href="https://t.me/stockhub12bot" target="_blank">Заказать</a>
      </div>

      <div class="main__right-side">
        <!-- <h2>Статистика</h2> -->
        <p class="main__right-side--value"><i class="ri-user-3-line"></i></span>Пользователи: {{$data}}
        </p>

      </div>

    </main>

    <footer>
      <p>Подпишись на наши новости</p>
      <form class="footer__mail--container">
        <input type="text" class="footer__mail--input" placeholder="Ваш e-mail">
        <button type="submit" class="footer__mail--submit"><i class="ri-arrow-right-double-line"></i></button>
      </form>

      <!-- <p>StockHubTech@2024</p> -->
    </footer>
  </div>
</body>

</html>