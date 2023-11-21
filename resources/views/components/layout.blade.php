
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iching View</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="http://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Hind:wght@300&family=Kaushan+Script&family=Ma+Shan+Zheng&family=Simonetta&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div class="logoArea">
            <div class="logo">I Ching<span>view</span></div>
            <div class="flagsArea">
                <img src="./assets/images/us.png" class="flag selected">
                <img src="./assets/images/br.png" class="flag">
            </div>
        </div>
    </header>
    <div class="container">
        <nav class="sideMenu">
            <ul>
                <li>
                    <a href="{{route('learn')}}">
                        <img class="menu_icon {{$page == 'learn' ? 'active' : ''}}" src="assets/icons/open-book.png">
                    </a>
                </li>
                <li>
                    <a href="{{route('play')}}">
                        <img class="menu_icon {{$page == 'play' ? 'active' : ''}}" src="assets/icons/i-ching.png">
                    </a>
                </li>
                <li>
                    <a href="{{route('asks')}}">
                        <img class="menu_icon {{$page == 'asks' ? 'active' : ''}}" src="assets/icons/pencil.png">
                    </a>
                </li>

            </ul>
        </nav>
        <main>
            {{$slot}}
        </main>
    </div>
    <footer>
        By Yuri Mallak
    </footer>
</body>
</html>
