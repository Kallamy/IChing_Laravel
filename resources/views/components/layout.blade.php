
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iching View</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="http://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Hind:wght@300&family=Kaushan+Script&family=Ma+Shan+Zheng&family=Simonetta&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{asset("assets/css/style.css")}}>
    <style>
        #wrapper { width: 400px; height: 400px; }
        #wrapper.paisagem { -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); background-color: lightgreen; }
        #wrapper.retrato { background-color: lightblue; }
    </style>

</head>
<body>
    <header>
        <div class="logoArea">
            <div class="logo">I Ching<span>view</span></div>
            <div class="flagsArea">
                <img src={{asset("./assets/images/us.png")}} class="flag selected">
                <img src={{asset("./assets/images/br.png")}} class="flag">
            </div>
        </div>
    </header>
    <div class="container">
        <nav class="sideMenu">
            <ul>
                <li>
                    <a href="{{route('learn')}}">
                        <img class="menu_icon {{$page == 'learn' ? 'active' : ''}}" src={{asset("assets/icons/open-book.png")}}>
                    </a>
                </li>
                <li>
                    <a href="{{route('play')}}">
                        <img class="menu_icon {{$page == 'play' ? 'active' : ''}}" src={{asset("assets/icons/i-ching.png")}}>
                    </a>
                </li>
                <li>
                    <a href="{{route('asks')}}">
                        <img class="menu_icon {{$page == 'asks' ? 'active' : ''}}" src={{asset("assets/icons/pencil.png")}}>
                    </a>
                </li>
            </ul>
        </nav>
        <main>
            {{$slot}}
        </main>
    </div>
    <nav class="mobileMenu">
        <ul>
            <li>
                <a href="{{route('learn')}}">
                    <img class="menu_icon {{$page == 'learn' ? 'active' : ''}}" src={{asset("assets/icons/open-book.png")}}>
                </a>
            </li>
            <li>
                <a href="{{route('play')}}">
                    <img class="menu_icon {{$page == 'play' ? 'active' : ''}}" src={{asset("assets/icons/i-ching.png")}}>
                </a>
            </li>
            <li>
                <a href="{{route('asks')}}">
                    <img class="menu_icon {{$page == 'asks' ? 'active' : ''}}" src={{asset("assets/icons/pencil.png")}}>
                </a>
            </li>
        </ul>
    </nav>
    <footer>
        By Yuri Mallak
    </footer>
    <script>
    </script>
    <script src={{asset('assets/js/classes/pairs.js')}}></script>
    <script src={{asset('assets/js/classes/Hexagram.js')}}></script>
    <script src={{asset('assets/js/main.js')}}></script>
    <script src={{asset('assets/js/game.js')}}></script>
</body>
</html>
