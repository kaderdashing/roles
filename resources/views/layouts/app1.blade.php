<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <div class="">
    <div class="navigation">
      <ul>
        <li><a href="#">
            <span class="icon"></span>
            <span class="titre">
              <h2>UABT</h2>
            </span>
          </a>
        </li>
        <br>
        <li>
          <a href="{{ url('/home') }}">
            <span class="icon"><i class="bi bi-speedometer2"></i></i></span>
            <span class="titre"><b>tableau de bord</b></span>
          </a>
        </li>
        <br>
        <li>
          <a href="{{ url('/admin/dashbord/membre') }}">
            <span class="icon"><i class="bi bi-person"></i>
            </span>
            <span class="titre"><b>liste admin</b></span>
          </a>
        </li>
        <br>
        <li>
          <a href="{{ url('/admin/dashbord/enseignant') }}">
            <span class="icon"><i class="bi bi-person"></i>
            </span>
            <span class="titre"><b>liste enseignant</b></span>
          </a>
        </li>
        <br>
        <li>

          <a href="{{ route('logout') }}"               onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <span class="icon"><i class="bi bi-box-arrow-left"></i></span>
            <span class="titre"><b>déconnecter</b></span>
          </a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
           </form>
            </span>
          </a>
        </li>
        <br>
      </ul>

    </div>
    <div class="milieu">
      <div class="topbar">
        <div class="toggle" onclick="toggleMenu();"><i class="bi bi-list"></i></div>
        <div class="search">
          <label>
            <input type="text" placeholder="Recherche">
            <i class="bi bi-search"></i>
          </label>

        </div>
        <div class="user"><img src="user.jpg"> </div>
      </div>

      <div class="cadrebox">
        <div class="cadre">
          <div>
            <div class="num">123456789</div>
            <div class="cadreNum">le nombre de vue </div>
          </div>
          <div class="iconVue"><i class="bi bi-eye-fill"></i></div>
        </div>
        <div class="cadre">
          <div>
            <div class="num">123456789</div>
            <div class="cadreNum">nombre de prof</div>
          </div>
          <div class="iconVue"><i class="bi bi-person-bounding-box"></i></div>
        </div>
        <div class="cadre">
          <div>
            <div class="num">123456789</div>
            <div class="cadreNum">nombre d'etudiants </div>
          </div>
          <div class="iconVue"><i class="bi bi-bar-chart-fill"></i></div>
        </div>
      </div>
      <div class="details">
        <!--<h1>eya ana khateni</h1>-->
        @yield('content')
        <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo, necessitatibus. Explicabo laudantium debitis, consectetur maxime dolores nostrum. Non asperiores, assumenda dicta magni eveniet repellendus. Esse quaerat non praesentium iusto ipsa.</p>-->
      </div>


    </div>
  </div>
  <script>
    function toggleMenu() {
      let toggle = document.querySelector('.toggle');
      let navigation = document.querySelector('.navigation');
      let milieu = document.querySelector('.milieu');
      toggle.classList.toggle('active');
      navigation.classList.toggle('active');
      milieu.classList.toggle('active');
    }
    const currentLocation = location.href ;
    const menuItem = document.querySelectorAll('a') ; 
    const menuLenght = menuItem.length 
    for(let i = 0 ; i<menuLenght ; i++) {
      if(menuItem[i].href===currentLocation){
        menuItem[i].className="active"
      }
    }


  </script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      overflow-x: hidden;
    }

    .container {
      position: relative;
      width: 100%;
    }

    /*la barre li tji fiha les onglets */
    .navigation {
      position: fixed;
      width: 300px;
      height: 100%;
      background: #00561b;
      transition: 0.5s;
      overflow: hidden;
    }

    /*hna hna nsegdo le ul wahowa ga3 hadik la partie li fiha tableau de bord ....*/
    .navigation ul {
      position: absolute;
      top: 0;
      left: -30px;
      width: 80%;
    }

    /* whna hna machyen nsegdo dok les champs*/
    .navigation ul li {
      position: relative;
      width: 100%;
      list-style: none;
    }

    /*hadi ta3 la liste champ li nekhtaroh yetbedel fel couleur */
    .navigation ul li:hover {
      background: #011608;
    }

    a.active {
      background: #202e2d;
      color: #f5f5f5
    }

    /*hadi ta3 champ lewel bach mayesrach fih dak effet */
    .navigation ul li:nth-child(1):hover {
      margin-bottom: 20px;
    }

    .navigation ul li:nth-child(1):hover {
      background: transparent;
    }

    /*hada bach negel3o dil la couleur ta3 les liens li par defaut */
    .navigation ul li a {
      position: relative;
      display: block;
      width: 100%;
      display: flex;
      text-decoration: none;
      color: blanchedalmond;
    }

    /* les icons */
    .navigation ul li a .icon {
      position: relative;
      display: block;
      min-width: 60px;
      height: 60px;
      line-height: 60px;
      text-align: center;
    }

    .navigation ul li a .icon .bi {
      color: #fff;
      font-size: 25px;
    }

    /*les titre li jayen gedam icon*/
    .navigation ul li a .titre {
      position: relative;
      display: block;
      padding: 0 10px;
      height: 60px;
      line-height: 60px;
      white-space: nowrap;
    }

    /* le milieu wsm ndiro f lwest*/
    .milieu {
      position: absolute;
      width: calc(100% - 300px);
      left: 300px;
      min-height: 100vh;
      background: #f5f5f5;
      transition: 0.5s;
    }

    .milieu .topbar {
      width: 100%;
      background: #fff;
      height: 60px;
      padding: 0px 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .toggle {
      position: relative;
      width: 60px;
      height: 60px;

      cursor: pointer;
    }

    .toggle .bi {
      /*content: "\F479";
  font-family: fontawesome;*/
      position: absolute;
      width: 100%;
      height: 100%;
      line-height: 60px;
      font-size: 25px;
      text-align: center;
      color: #111;
    }

    /*bach ki na3afso f boutton tetmaska la navigatin */
    .navigation.active {
      width: 60px;
    }

    .milieu.active {
      width: calc(100% - 60px);
      left: 60px;
    }

    /*pour la barre de recherche */
    .search {
      position: relative;
      width: 400px;
      margin: 0px 10px;
    }

    .search label {
      position: relative;
      width: 100%;
    }

    .search label input {
      width: 100%;
      height: 40px;
      border-radius: 40px;

      padding: 5px 20px;
      padding-left: 40px;
      outline: none;
    }

    /*icon search ndekhloha f la recherche*/
    .search label .bi {
      position: absolute;
      left: 15px;
      top: 3.75px;
    }

    /* pour l'image */
    .user {
      position: relative;
      min-width: 50px;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
    }

    .user img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      /*hadii bach image ki nseghrouha matwelich flouuuuuu*/
      object-fit: cover;
    }

    /*hna rana nekherbo b l cadre lekbir*/
    .cadrebox {
      position: relative;
      width: 100%;
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 20px;
    }

    /*w hna hna nekherb f les cadres sghare comme ta3 prof ..num de vue....*/
    .cadrebox .cadre {
      position: relative;
      background: #d0f5dc;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      cursor: pointer;
    }

    .cadrebox .cadre .num {
      position: relative;
      font-size: 2em;
      font-weight: 500;
    }

    .cadrebox .cadre .cadreNum {
      color: #525a55;
    }

    .cadrebox .cadre .iconVue {
      font-size: 2.55em;
      color: #011608;
    }

    .details {
      position: relative;
      width: 100%;
      padding: 20px;
      text-align: center;
    }

    /*hna hna nekhedmo responsive*/
    @media (max-width: 1100px) {
      .navigation {
        left: -300 px;
      }

      .navigation.active {
        left: 15px;
        width: 300px;
      }

      .milieu {
        width: 100%;
        left: 0;
      }

      .milieu.active {
        width: calc(100% - 300px);
        left: 300px;
      }

      .cadrebox {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 496px) {
      .cadrebox {
        grid-template-columns: repeat(1, 1fr);
      }

      .navigation {
        width: 100%;
        left: -100%;
        z-index: 1000;
      }

      .navigation.active {
        width: 100%;
        left: 0;
      }

      .toggle.active {
        position: fixed;
        z-index: 1000;
        right: 0;
        left: initial;
      }

      .toggle.active ::before {
        color: #fff;
      }

      .milieu,
      .milieu.active {
        width: 100%;
        left: 0;
      }
    }
  </style>

</body>

</html>