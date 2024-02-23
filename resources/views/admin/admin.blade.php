<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AdminPanel</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/admin/style.css')}}">
</head>

<body>
  <header class="header">
    <a href="/admin">
      <img src="{{asset('storage/stocklogo.png')}}" width="140" height="140" alt="logo" class="header__logo me-2" />
    </a>
    <nav>
      <ul class="header__nav">
        <li><a href="/logist">Логистика</a></li>
        <li><a href="#stat">Статистика</a></li>
        <li><a href="/catalog">Каталог</a></li>
        <li><a href="#moder">Для модерации</a></li>
      </ul>
    </nav>
    <div class="header__nav--logout" aria-labelledby="navbarDropdown">
      <i class="ri-logout-box-r-line"></i>
      <a class="text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        {{ __('Выйти') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
  </header>

  <main>
    @yield('content')
    @yield('logistic')
    @yield('catalog')
  </main>


</body>

</html>