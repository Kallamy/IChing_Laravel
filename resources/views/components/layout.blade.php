<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iching View</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="http://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Handlee&family=Hind:wght@300&family=Kaushan+Script&family=Ma+Shan+Zheng&family=Simonetta&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href={{ asset('/assets/css/style.css') }}>
    <script src={{asset('/assets/js/classes/OriginalTextScreen.js')}}></script>

</head>

<body>
    @php
        if (auth()->check()) {
            $user = auth()->user();
        }
    @endphp
    <header>
        <div class="logoArea">
            <div class="logo">I Ching<span>view</span></div>
            <div class="flagsArea">
                <a class="flagButton" href="{{ route('setLang', ['lang' => 'en']) }}"><img src={{ asset('./assets/images/us.png') }}
                        class="flag {{ session('locale') == 'en' ? 'selected' : '' }}"></a>
                <a class="flagButton" href="{{ route('setLang', ['lang' => 'pt']) }}"><img src={{ asset('./assets/images/br.png') }}
                        class="flag {{ session('locale') == 'pt' ? 'selected' : '' }}"></a>
            </div>
        </div>
        <div class="authLinks">
            @if (auth()->check()):
            <span class="userNameLabel">{{$user->name}}</span>
            <a href="{{ route('logout') }}">@lang('auth.logout')</a>
            @else
            <a href="{{ route('signup') }}">@lang('auth.createUser')</a>
            <a href="{{ route('signin') }}">@lang('auth.login')</a>
            @endif
        </div>
    </header>
    <div class="container">
        <nav class="sideMenu">
            <ul>
                <li>
                    <a href="{{ route('learn') }}">
                        <img class="menu_icon {{ $page == 'learn' ? 'active' : '' }}"
                            src={{ asset('assets/icons/open-book.png') }}>
                    </a>
                </li>
                <li>
                    <a href="{{ route('play') }}">
                        <img class="menu_icon {{ $page == 'play' ? 'active' : '' }}"
                            src={{ asset('assets/icons/i-ching.png') }}>
                    </a>
                </li>
                <li>
                    <a href="{{ route('asks') }}">
                        <img class="menu_icon {{ $page == 'asks' ? 'active' : '' }}"
                            src={{ asset('assets/icons/pencil.png') }}>
                    </a>
                </li>
            </ul>
        </nav>

        <div id="content">
            <main>
                {{ $slot }}
            </main>
            <div class="originalTextScreen">
                <x-OriginalTextScreen page={{$page}}/>
            </div>
        </div>
    </div>

    <nav class="mobileMenu">
        <ul>
            <li>
                <a href="{{ route('learn') }}">
                    <img class="menu_icon {{ $page == 'learn' ? 'active' : '' }}"
                        src={{ asset('assets/icons/open-book.png') }}>
                </a>
            </li>
            <li>
                <a href="{{ route('play') }}">
                    <img class="menu_icon {{ $page == 'play' ? 'active' : '' }}"
                        src={{ asset('assets/icons/i-ching.png') }}>
                </a>
            </li>
            <li>
                <a href="{{ route('asks') }}">
                    <img class="menu_icon {{ $page == 'asks' ? 'active' : '' }}"
                        src={{ asset('assets/icons/pencil.png') }}>
                </a>
            </li>
        </ul>
    </nav>

    <footer>
        By Yuri Mallak
    </footer>

    {{-- // <script src={{asset('/assets/js/classes/pairs.js')}}></script>
    // <script src={{asset('/assets/js/classes/Hexagram.js')}}></script>
    // <script src={{asset('/assets/js/main.js')}}></script>
    // <script src={{asset('/assets/js/game.js')}}></script> --}}

    <script id="pairs-js">
        pairs = [
            /*                  céu                                         terra                                                  trovão                                                 água                                      montanha                                                                madeira                       fogo                                 lago               */
            /* céu -----*/
            ["céu", "céu", "Ch'ien - O criativo", "乾", 1],
            ["terra", "céu", "T'ai - Paz", "泰", 11],
            ["trovão", "céu", "Ta Chuang - O Poder do Grande", "大壯", 34],
            ["água", "céu", "Hsu - A Espera", "需", 5],
            ["montanha", "céu", "Ta Ch'u - O Poder de Domar do Grande", "大畜", 26],
            ["madeira", "céu", "Hsiao Ch'u - O Poder de Domar do Pequeno", "	小畜", 9],
            ["fogo", "céu", "Ta Yu - Grandes Posses", "大有", 14],
            ["lago", "céu", "Kuai - Irromper", "夬", 43],
            /* terra ---*/
            ["céu", "terra", "Pi - Estagnação", "否", 12],
            ["terra", "terra", "K'un - O Receptivo", "坤", 2],
            ["trovão", "terra", "Yu - Entusiasmo", "豫", 16],
            ["água", "terra", "Pi - Manter-se Unido", "比", 8],
            ["montanha", "terra", "Po - Desintegração", "剝", 23],
            ["madeira", "terra", "Kuan - Contemplação", "觀", 20],
            ["fogo", "terra", "Chin - Progresso", "晉", 35],
            ["lago", "terra", "Ts'ui - Reunião", "萃", 45],
            /* trovão --*/
            ["céu", "trovão", "Wu Wang - Inocência", "無妄", 25],
            ["terra", "trovão", "Fu - Retorno", "	復", 24],
            ["trovão", "trovão", "Chên - O Incitar", "震", 51],
            ["água", "trovão", "Chun - Dificulade Inicial", "屯", 3],
            ["montanha", "trovão", "I - As Bordas da Boca", "頤", 27],
            ["madeira", "trovão", "I - Aumento", "益", 42],
            ["fogo", "trovão", "Shih Ho - Morder", "噬嗑", 21],
            ["lago", "trovão", "Sui - Seguir", "隨", 17],
            /* água ----*/
            ["céu", "água", "Sung - Conflito", "訟", 6],
            ["terra", "água", "Shih - O Exército", "師", 7],
            ["trovão", "água", "Hsieh - Liberação", "解", 40],
            ["água", "água", "K'an - O Abismal", "坎", 29],
            ["montanha", "água", "Meng - Insensatez Juvenil", "蒙", 4],
            ["madeira", "água", "Huan - Dispersão", "渙", 59],
            ["fogo", "água", "Wei Chi - Antes da Conclusão", "未濟", 64],
            ["lago", "água", "K'un - Opressão", "困", 47],
            /* montanha */
            ["céu", "montanha", "Tun - A Retirada", "遯", 33],
            ["terra", "montanha", "Ch'ien - Modéstia", "謙", 15],
            ["trovão", "montanha", "Hsiao Kuo - A Preponderância do Pequeno", "小過", 62],
            ["água", "montanha", "Chien - Obstrução", "蹇", 39],
            ["montanha", "montanha", "Kên - A Quietude", "艮", 52],
            ["madeira", "montanha", "Chien - Desenvolvimento", "漸", 53],
            ["fogo", "montanha", "Lü - O Viajante", "旅", 56],
            ["lago", "montanha", "Hsien - A Influência", "咸", 31],
            /* madeira -*/
            ["céu", "madeira", "Kou - Vir ao Encontro", "姤", 44],
            ["terra", "madeira", "Chêng - Ascensão", "升", 46],
            ["trovão", "madeira", "Heng - Duração", "恆", 32],
            ["água", "madeira", "Ching - O Poço", "井", 48],
            ["montanha", "madeira", "Ku - Trabalho Sobre o que Se Deteriorou", "蠱", 18],
            ["madeira", "madeira", "Sun - A Suavidade", "巽", 57],
            ["fogo", "madeira", "Ting - O Caldeirão", "鼎", 50],
            ["lago", "madeira", "Ta Kuo - A Preponderâcia do Grande", "大過", 28],
            /* fogo ----*/
            ["céu", "fogo", "Tung Jên - Comunidade com os Homens", "同人", 13],
            ["terra", "fogo", "Ming I - O Obscurecimento da Luz", "明夷", 36],
            ["trovão", "fogo", "Fêng - Abundância", "豐", 55],
            ["água", "fogo", "Chi Chi - Após a Conclusão", "既濟", 63],
            ["montanha", "fogo", "Pi - Graciosidade", "賁", 22],
            ["madeira", "fogo", "Chia Jen - A Família", "家人", 37],
            ["fogo", "fogo", "Li - Aderir", "離", 30],
            ["lago", "fogo", "Ko - Revolução", "革", 49],
            /* lago ----*/
            ["céu", "lago", "Lu - A Conduta", "履", 10],
            ["terra", "lago", "Lin - Aproximação", "臨", 19],
            ["trovão", "lago", "Kuei Mei - A Jovem que se Casa", "歸妹", 54],
            ["água", "lago", "Chieh - Limitação", "節", 60],
            ["montanha", "lago", "Sun - Diminuição", "損", 41],
            ["madeira", "lago", "Chung Fu - Verdade Interior", "中孚", 61],
            ["fogo", "lago", "K'uei - Oposição", "睽", 38],
            ["lago", "lago", "Tui - A Alegria", "兌", 58],
            /*                  heaven                                         earth                                                   thunder                                                 water                                      mountain                                                                               wind                                   fire                                 lake               */
            /* heaven --*/
            ["heaven", "heaven", "Ch'ien - The Creative", "乾", 1],
            ["earth", "heaven", "T'ai - Peace", "泰", 11],
            ["thunder", "heaven", "Ta Chuang - The Power of the Great", "大壯", 34],
            ["water", "heaven", "Hsu - Waiting", "需", 5],
            ["mountain", "heaven", "Ta Ch'u - The Timing Power of the Great", "大畜", 26],
            ["wind", "heaven", "Hsiao Ch'u - The Taming Power of the Small", "	小畜", 9],
            ["fire", "heaven", "Ta Yu - Possession in Great Measure", "大有", 14],
            ["lake", "heaven", "Kuai - Break-through", "夬", 43],
            /* earth ---*/
            ["heaven", "earth", "Pi - Standstill", "否", 12],
            ["earth", "earth", "K'un - The Receptive", "坤", 2],
            ["thunder", "earth", "Yu - Enthusiasm", "豫", 16],
            ["water", "earth", "Pi - Holding Together", "比", 8],
            ["mountain", "earth", "Po - Splitting Apart", "剝", 23],
            ["wind", "earth", "Kuan - Contemplation", "觀", 20],
            ["fire", "earth", "Chin - Progress", "晉", 35],
            ["lake", "earth", "Ts'ui - Gathering Together", "萃", 45],
            /* thunder -*/
            ["heaven", "thunder", "Wu Wang - Innocence", "無妄", 25],
            ["earth", "thunder", "Fu - Return", "	復", 24],
            ["thunder", "thunder", "Chên - The Arousing", "震", 51],
            ["water", "thunder", "Chun - Difficult at the Beginning", "屯", 3],
            ["mountain", "thunder", "I - The Corners of the Mouth", "頤", 27],
            ["wind", "thunder", "I - Increase", "益", 42],
            ["fire", "thunder", "Shih Ho - Biting Through", "噬嗑", 21],
            ["lake", "thunder", "Sui - Following", "隨", 17],
            /* water ---*/
            ["heaven", "water", "Sung - Conflict", "訟", 6],
            ["earth", "water", "Shih - The Army", "師", 7],
            ["thunder", "water", "Hsieh - Deliverance", "解", 40],
            ["water", "water", "K'an - The Abysmal", "坎", 29],
            ["mountain", "water", "Meng - Youthful Folly", "蒙", 4],
            ["wind", "water", "Huan - Dispersion", "渙", 59],
            ["fire", "water", "Wei Chi - Before Completion", "未濟", 64],
            ["lake", "water", "K'un - Oppression", "困", 47],
            /* mountain */
            ["heaven", "mountain", "Tun - Retreat", "遯", 33],
            ["earth", "mountain", "Ch'ien - Modesty", "謙", 15],
            ["thunder", "mountain", "Hsiao Kuo -  Preponderance of the Small", "小過", 62],
            ["water", "mountain", "Chien - Obstruction", "蹇", 39],
            ["mountain", "mountain", "Kên - Keeping Still", "艮", 52],
            ["wind", "mountain", "Chien - Development", "漸", 53],
            ["fire", "mountain", "Lü - The Wanderer", "旅", 56],
            ["lake", "mountain", "Hsien - Influence", "咸", 31],
            /* wind ----*/
            ["heaven", "wind", "Kou - Coming to Meet", "姤", 44],
            ["earth", "wind", "Chêng - Pushing Upward", "升", 46],
            ["thunder", "wind", "Heng - Duration", "恆", 32],
            ["water", "wind", "Ching - The Well", "井", 48],
            ["mountain", "wind", "Ku - Work on What Has Been Spoiled", "蠱", 18],
            ["wind", "wind", "Sun - The Gentle", "巽", 57],
            ["fire", "wind", "Ting - The Caldron", "鼎", 50],
            ["lake", "wind", "Ta Kuo - Preponderance of the Great", "大過", 28],
            /* fire ----*/
            ["heaven", "fire", "Tung Jên - Fellowship with Men", "同人", 13],
            ["earth", "fire", "Ming I - Darkening of the Light", "明夷", 36],
            ["thunder", "fire", "Fêng - Abundance", "豐", 55],
            ["water", "fire", "Chi Chi - After Completion", "既濟", 63],
            ["mountain", "fire", "Pi - Grace", "賁", 22],
            ["wind", "fire", "Chia Jen - The Clan", "家人", 37],
            ["fire", "fire", "Li - The Clinging", "離", 30],
            ["lake", "fire", "Ko - Revolution", "革", 49],
            /* lake ----*/
            ["heaven", "lake", "Lu - Treading", "履", 10],
            ["earth", "lake", "Lin - Approach", "臨", 19],
            ["thunder", "lake", "Kuei Mei - The Marrying Maiden", "歸妹", 54],
            ["water", "lake", "Chieh - Limitation", "節", 60],
            ["mountain", "lake", "Sun - Decrease", "損", 41],
            ["wind", "lake", "Chung Fu - Inner Truth", "中孚", 61],
            ["fire", "lake", "K'uei - Opposition", "睽", 38],
            ["lake", "lake", "Tui - The Joyous", "兌", 58],

        ];

        // Informations about the hexagrams
        about = {
            en: [{
                    id: 1,
                    sentence: "The Creative works sublime success, <br> Furthering through perseverance.",
                    general: "Persistent effort will help you realize your potential for achievement.",
                    love: "You need to behave in a compassionate fashion towards your partner.",
                    business: "Your ideas are sound but you need to take time to throughly plan out your strategy for making them work.",
                    personal: "You need to take time out to relax and enjoy life more.",
                    overview: "<b>Ch'ien</b> is pure yang energy. being pure yang it indicates a time when you are in a good position to achieve your objectives (whatever they may be). However, it is a time of potential as there is a lack of yin influence. So now is the time to make those plans and get ready to put them into action. Plan thoroughly and don't be impatient. Although Ch'ien is an auspicious hexagram, for your plans tom have a lasting effect and value your motives need to be virtuous. Be compassionate when you move forward. If you are arrogant you will only breed complacency or resentment in those around you."
                },
                {
                    id: 2,
                    sentence: "The Receptive brings about sublime success, <br> Furthering through the perseverance of a mare. <br> If the superior man undertakes something and tries to lead, <br> He goes astray; <br> But if he follows, he finds guidance. <br> It is favorable to find friends in the west and south, <br> To forego friends in the east and north. <br> Quiet perseverance brings good fortune.",
                    general: "Be receptive to words of advice or influencefrom those who are worthly of respect. This is a sign of strength, not weakness.",
                    love: "Listen to advice of family and friends.",
                    business: "Listen to advice of experts in your field and take stock of your business.",
                    personal: "Take advice from a counselor you trust.",
                    overview: "<b>K'un</b> is pure yin energy. <b>K'un</b> indicates a time that you will benefit from listening to the advice of others whom you respect and trust. Listening to their advice is the only way you will make progress at this time. If you make the mistake of disregarding the advice or not even bothering to listen in the first place then your plans will come to nothing. There will be no progress.",
                },
                {
                    id: 3,
                    sentence: "Difficulty at the Beginning works supreme success. <br> Furthering through perseverance. <br> Nothing should be undertaken. <br> It furthers one to appoint helpers.",
                    general: "The first step towards true learning is acknowledging your inexperience.",
                    love: "Provided your learn from the problem you have encountered you will get past the current stumbling block.",
                    business: "Assess you business honestly and see how you could do better business.",
                    personal: "If you have hit a setback then make adjustments to your lifestyle and the setback will only be temporary.",
                    overview: "<b>Chun</b> is a reminder that although problems may be encountered they are often only brief - just like a thunderstorm. And like the land that benefits from the extra rain you too can benefit provided you learn from what has happened. Once any obstacle has been surmounted then your project will have the chance to thrive. But you need to be wary of reckless action. Recognize misleading and corrupt influences and forge alliances with those that are trustworthy. You are most at risk if you let your ignorance blind you to how much you have to learn."
                },
                {
                    id: 4,
                    sentence: "Youthful Folly has success. <br> It is not I who seek the young fool; The young fool seeks me. <br> At the first oracle I inform him. <br> If he asks two or three times it is importunity. <br> If he importunes, I give him no information. <br> Perseverance furthers.",
                    general: "Patience and kindness are the keys to learning and teaching.",
                    love: "Let go of any childhood you have about relationships.",
                    business: "Being thoughtful will help strengthen new bussines ideas or procedures.",
                    personal: "Remember the pleasure of childhood and youth and imitate it. You may need to realse any bad habits from that time.",
                    overview: "<b>Meng</b> builds on the theme of inexperience seen in hexagram 3 (<b>Chun</b>). It suggests that youth (like the flowing stream) has a long way to go before it becomes a mighty river. Meng is about teaching, learning and knowledge. Ignorance should not be punished, rather it should be replaced with knowledge. When the learning is fun the student will learn more. It is a reminder that a teacher should be a mentor, setting the scene for the way the student will behave in adulthood."
                },
                {
                    id: 5,
                    sentence: "Waiting. <br> If you are sincere, You have light and success. <br> Perseverance brings good fortune. <br> It furthers one to cross the great water.",
                    general: "Do not doubt that the wait is necessary.",
                    love: "If you are in an existing relationship it will enter a happier time, or if single, your relationship will come in due time.",
                    business: "Start your business or continue it if already started, and know that you will succeed.",
                    personal: "Keep your life in perspective and let some of those worries go.",
                    overview: "<b>Hsu</b> relates to patience and waiting. It is a warning not be hasty and take action that you may later regret, rather you should bide your time and prepare optimally for the changes that are coming. Hone your plans and strategies. <b>Hsu</b> reminds us that periods of waiting are a necessary part of life and that time is not wasted when you are waiting with the confident knowledge that sooner or later the drought will end."
                },
                {
                    id: 6,
                    sentence: "Conflict. You are sincere And are being obstructed. <br> A cautious halt halfway brings good fortune. <br> Going through to the end brings good fortune. <br> It furthers one to see the grat man. <br> It does not further one to cross the great water.",
                    general: "Antagonism and hostility will increase with the space we create between ourselves.",
                    love: "Compassion shold be used to heal ane rifts within your relationship. Listen very carefully to anything your partner has to say.",
                    personal: "Become more flexible in your viewpoint. Face you fears.",
                    overview: "<b>Sung</b> relates to conflict. Usually with those around us but often within ourselves. It talks of the need to resolve these conflicts. Identifying self-righteousness within and dealing with fears and confusion they indicate is paramount. This will prevent escalation of hostilities."
                },
                {
                    id: 7,
                    sentence: "The Army. The army needs perseverance And a strong man. <br> Good Fortune without blame.",
                    general: "Trust is the key to the leadership.",
                    love: "Conflicted can be avoided by using your integrity.",
                    business: "Staying honest and fair will help gain the respect of those that work for you.",
                    personal: "Discipline and honesty should be incorporated into your approach to life.",
                    overview: "<b>Shih</b> relates to dicipline and integrity within all that we do. The IChing likens Shih to an army. A country without an army is vulnerable. A country with an army is still vulnerable if it is undiciplined and poorly led. Mutual rather than personal benefit should be the rule."
                },
                {
                    id: 8,
                    sentence: "Holding Together (Union) brings good fortune. <br> Inquire of the oracle once again <br> Whether you possess sublimity, constancy and perseverance: <br> Then there is no blame. <br> Those who are uncertain gradually join. Whoever come too late Meets with misfortune.",
                    general: "A community bound by goodwill is the most potent force for powerful positive change there is.",
                    love: "Use goodwill and trust to achieve unity within your relationship.",
                    business: "Strenghen networks within your business and ties with networks your businnes is a part of.",
                    personal: "Form or streghen ties with family and friends.",
                    overview: "<b>Pi</b> relates to the need for unity to accomplish positive change. Relationships built on trust and goodwill should be formed and maintained for the benefit of all - not just for personal gain. This applies to not only family and friends but the community around you in general and your business community too."
                },
                {
                    id: 9,
                    sentence: "The Timing Power of the Small has success. <br> Dense clouds, no rain from our western region.",
                    general: "When great changes are not possible then small changes should be undertaken.",
                    love: "Develop your communication skills within your relationship and make sure you have fun.",
                    business: "Assess your business to see if there are any small matters that need to be dealt with.",
                    personal: "Developing your skills and strengths should be your main focus.",
                    overview: "<b>Hsiao Ch'u</b> relates to the need to pay attention to detail. It indicates that this is not a time to undertake big changes within life or business but rather to deal with the smaller matters that may need attention. Examine your own attitudes and those of the people around you to see how things may be improved on a smaller scale."
                },
                {
                    id: 10,
                    sentence: "Treading. <br> Treading upon the tail of the tiger. <br> It does not bite the man. Success.",
                    general: "A successful journey can be assured if one careful step at atime is taken.",
                    love: "Goodwill is the key to solving any relationship issues.",
                    business: "Achieving success within business is the best accomplished treating others with courtesy and respect.",
                    personal: "Focus on ridding yourself of any feelings of envy or jealousy.",
                    overview: "<b>Lu</b> relates to the need to develop your social skills and to make sure that they are sincere and not insincere. It indicates a need to make sure that jealousy ar envy are not present within your life and if they are, to take steps to resolve them. <b>Lu</b> is all about inequality and the need to avoid it."
                },
                {
                    id: 11,
                    sentence: "Peace. The small departs, The great approaches. <br> Good fortune. Success.",
                    general: "Although times are harmonious you should not take them for granted. Try to understand why the harmony is there.",
                    love: "Your relationship should be treated to respect and kindness.",
                    business: "Your current success should be analyzed to see how it came about.",
                    personal: "Do a good deed.",
                    overview: "<b>T'ai</b> relates to harmony. Everything should currently be going well. Dont take it for granted though. Examine all the aspects of your life and see how that harmony come about. Nothing is permanent of course, and this is no less so for T'ai. Enjoy the peace and harmony arround you. <b>T'ai</b> is a very auspicious hexagram and indicates a successful time of life.",
                },
                {
                    id: 12,
                    sentence: "Standstill. <br> Evil people do not further The perseverance of the superior man. <br> The great departs; The small approaches.",
                    general: "Although this is a time of adversity you should remember that all things change and there is always hope.",
                    love: "A lover or potential lover may not be what they seem. Beware of falling in love.",
                    business: "New business ventures may be too good to be true. Examine them carefully.",
                    personal: "Strengthen your moral and ethical senses. Don't be led astray.",
                    overview: "<b>Pi</b> relates to a time of stagnation and to the fragility of life. If the foundations are weak or unstable then a building will eventually fall. This analogy should also be applied to people. <b>Pi</b> often indicates a time when arrogant individuals come to power or occupy positions of authority. Their arrogance will eventually be their downfall. Beware of individuals trying to subvert your sense of ethics or the consequences will be far-reaching for you."
                },
                {
                    id: 13,
                    sentence: "Fellowship with the Men in the open: Success. <br> It furthers one to cross the great water. <br> The perseverance of the superior man furthers.",
                    general: "You can achieve strength in numbers by dispelling mistrust.",
                    love: "To achieve a  is the objective you should work together.",
                    business: "Communication with your staff is the key to dispelling misunderstandings.",
                    personal: "Develop community spirit by organizing workshops particularly for projects.",
                    overview: "<b>Tung Jên</b> relates to organization and fellowship. This hexagram will often appear when it is necessary to organize individuals and/or disorganized groups into an effective and cohesive unity. Although most people can see the advantages of co-operation mistrust will often prevent progress. Suspicion and inwardness undermine community spirit so it is important to be open. Appeal to people's sense of higher common purpose to overcome minor differences. Once the desired end is achieved the smaller disagreements prevalent in the early stages will be forgotten."
                },
                {
                    id: 14,
                    sentence: "Possession in Great Measure. Supreme success.",
                    general: "Those who understand the responsibility that comes with wealth are the ones best fitted to maintain it.",
                    love: "Enjoy the current harmonious period but do not allow yourself to become complacent.",
                    business: "Opportunities for business success will be there if you look for them. Do not allow yourself to become greedy though.",
                    personal: "Take the time to enjoy mental clarity but make sure to watch for any feelings of pride or arrogance or eliminate them if necessary.",
                    overview: "<b>Ta Yu</b> relates a time of abundance when all is going well. Although an auspicious time it carries a warning not to allow yourself to become arrogant or greedy. All obstacles in all aspects of life will have disappered and life should be enjoyed. Do not make the mistake of becoming complacent and believing this period will last forever. It won't. Nothing does. Examine the harmonious circumstances that gave rise your current success and do your best to preserve them. this way you will be able to maintain success as long as possible. Generosity and humility are essentials to this process."
                },
                {
                    id: 15,
                    sentence: "Modesty creates success. <br> The superior man carries things through.",
                    general: "Arrogance is the mortal enemy of true greatness.",
                    love: "Help draw your partner out of their shell.",
                    business: "Do not overlook the quiet achiever in your business. Whether this is a member of staff or an account.",
                    personal: "Don't take things at face value - learn to look beneath the surface.",
                    overview: "<b>Ch'ien</b> is related to pride and humility. Although pride in achievement is only natural (particularly amoung the young) you should not let that blind you. Take pride but in moderation. The most skilled in one field may be totally inadequate in another. Take pride in your achievements but do not think that a skill elevates you above the rest of the world. Learn that our lives are not as comparable as you might think."
                },
                {
                    id: 16,
                    sentence: "Enthusiasm. <br> It furthers one to install helpers and to set armies marching.",
                    general: "Revitalize your spirit through celebration.",
                    love: "Give your partner a pleasant surprise. Suggest an outing or trip.",
                    business: "Take a time to celebrate your business successes.",
                    personal: "Throw a seasonal party to celebrate the cycles of nature.",
                    overview: "<b>Yu</b> is related to rising the energy of not only yourself but of those around you. Just like the thunderstorm <b>Yu</b> suggests our existence and environment can be suddenly changes through celebration. Use your strong leadership to inspire those around you. Don't underestimate the power of shared enthusiasm. It will help increase confidence with will hepl to withstand any future difficulties."
                },
                {
                    id: 17,
                    sentence: "Following has supreme success. <br> Perseverance furthers. <br> No blame.",
                    general: "Balancing the heart and the mind of leadership will help assure steady progress.",
                    love: "Show your partner what you require by example rather than words. be gentle with them.",
                    business: "Hard work needs to be balanced by rest.",
                    personal: "Plan for gradual progress and make sure that hard work is balanced by rest",
                    overview: "<b>Sui</b> indicates that you should lead by example rather than just telling everyone what to do. It indicates a time where gradual progress should be the plan and that work should be balanced with a period of rest. Effective leadership is about serving, not about power and ego. A leader has obligations to all those that work for him and this should not be overlooked. Learn the needs of those that follow you and if some of these needs need correcting then do so by gentle persuasion not by harsh words."
                },
                {
                    id: 18,
                    sentence: "Work on what has been spoiled Has supreme success. <br> It furthers one to cross the great water. <br> Before the starting point three days, <br> after the starting point, three days.",
                    general: "The problems of the past should be addressed so that the future can be approached with confidence.",
                    love: "Any differences of opinion with your partner should be resolved at this time.",
                    business: "Take the time to assess any demage caused by past problems and deal with them. Doing so now will help avoid stagnation in the present and future.",
                    personal: "Bad habits and/or phobias may be holding you back. Now is the time to confront and overcome them.",
                    overview: "<b>Ku</b> tends to appear when progress is being hindered in some way. Usually this is because of past obstacles or problems that were not dealt with at the time and so have continued to eat away at your progress unchecked. <b>Ku</b> indicates a need to examine the past issues without guilt or resentment and to deal with them so that future progress is not hindered in the same way. Be sure to ascertain the cause or the destructive cycle will continue."
                },
                {
                    id: 19,
                    sentence: "Approach has supreme success. <br> Perseverance furthers. <br> When the eighth month comes, There will be misfortune.",
                    general: "To make steady progress and avancement you need to learn to recongnize favorable opportunities.",
                    love: "Take the time to explore the depths of your relationship and deepen your insight into it.",
                    business: "This is a time when expansion and success are possible.",
                    personal: "Listen to those with more wisdom and experience that you.",
                    overview: "<b>Lin</b> indicates that you have the opportunity to listen to and to learn from those with greater wisdom or experience that you. This opportunity should be welcomed and seized gratefully. As with anything circumstances will change so it is critical that the favorable circumstances currently presented are taken full avantage of. Itis a good time to look at any possible future difficulties and try to deal with them preemptively. Success at this time should be shared with those around you."
                },
                {
                    id: 20,
                    sentence: "Contemplation. <br> The ablution has been made, but not yet the offering. <br> Full of trust they look up to him.",
                    general: "Remaining alert to all that affects you and those around you will help you to understand your role in the world.",
                    love: "This could be a time when you are feeling isolated. Make the effort to go out into the community",
                    business: "Refamiliarize yourself  with the needs of your customers and clients. Go out into the community and meet with them.",
                    personal: "Travel is a good way to combat any feelings of isolation.",
                    overview: "<b>Kuan</b> reminds you that although it is always wise to watch out for problems it is possible to become somewhat detached from reality by doing so. When concentrated on to the exclusion of all else there is a danger of the spirit becoming undernourished. Perception may be distorted and dangers go unnoticed. Isolation (meditative or otherwise) should always be balanced by travelling out into the community. Assesssing the world both from afar and close will give you an accurate assessment. If this advice is not followed you will only see a part of the overall picture.",
                },
                {
                    id: 21,
                    sentence: "Bitting Trough has success. <br> It is favorable to let justice be administered",
                    general: "Without justice harmony is unattainable.",
                    love: "Don't let unfair treatment go unanswered. Stand up for yourself.",
                    business: "Watch out for criminal activities being conducted against your business.",
                    personal: "Complex insues can be resolved by receiving insight though meditation.",
                    overview: "<b>Shih Ho</b> is all about injustice. When it forms a barrier between individuals and the community steps must be taken to firmly eradicate it. Action should not be taken lightly trough or further disharmony will result. Action taken must be scrupulously just then it will be effective. Shih Ho often appears when crime is the root cause of the problem but not always. Unjustness can exit in other ways. Whether legal or moral the model of justice employed must be honest and honorable."
                },
                {
                    id: 22,
                    sentence: "Grace has success. <br> In small matters it is favorable to undertake something.",
                    general: "Valuing beauty will enable you to cultivate your taste for harmony in all aspects of your life.",
                    love: "Beauty is only a skin deep - do not be taken in by superficial appearances. Look beneath the surface to see a person's true character.",
                    business: "If a business proposition looks too good to be true then it probably is. Make sure it's exactly what it appears to be.",
                    personal: "Enhance your inner beauty.",
                    overview: "<b>Pi</b> is about observing natural grace and allowing that observation to inspire you to emulate it in life. <b>Pi</b> also is an warning not to be taken in by superficial beauty or appearence. Instead, make sure that what lies underneath the surface is more enduring. To neglect to do so may well lead to errors of judgment. Remember, the more enduring beauty is seen with the heart. Not with the eye."
                },
                {
                    id: 23,
                    sentence: "Splitting Apart. <br> It does not further onr to go anywhere.",
                    general: "Before beginning a new eterprise you should wait for the collapse of the old one.",
                    love: "Your current relationship or an issue within your relationship should be abandoned.",
                    business: "Your current business direction has become difficult and it should be revised at the very least, or abandoned if revision is not possible.",
                    personal: "Serious thought shoud be given to backing away from any situations that are troublesome.",
                    overview: "<b>Po</b> is a reminder that no matter how strongly something was originally built it will eventually desintegrate with time. Once the 'fundations' have been undermined it is only tenuously held together. Such a situation is no longer worth trying to save. Although it is always difficult to give up on a situation do not waste time on formulating a new plan and direction. The disaster implied by <b>Po</b> is not the situation itself but the failure to react to it and regain your balance and direction."
                },
                {
                    id: 24,
                    sentence: "Return. Success. <br> Going out and coming without error. <br> Friends come without blame. <br> To and fro goes the way. <br> On the seventh day comes return. <br> It furthes one to have somewhere to go.",
                    general: "It metters are progressing and showing steady improvement then there is no need to push them.",
                    love: "New romance will be rekindled in your life.",
                    business: "The next few months will show a steady improvement of your business.",
                    personal: "It is a good time to plan for the future.",
                    overview: "<b>Fu</b> relates to a gradual improvement over time. it is a very natural progress and will occur without any effort on your part. In some ways the progress is unstoppable. However, you should not make any attempt to force the issue and hurry it along. Let it take its own course and time. Treat this new beginning with care and do not make the mistake of handling it roughly by trying to force it."
                },
                {
                    id: 25,
                    sentence: "Innocence. Supreme success. <br> Perseverance furthers. <br> If someone is not as he should be he has misfortune, And it does not further him to undertake anything.",
                    general: "To function effectively you must be fully present in each and every moment.",
                    love: "It is time to have fun. Not because you need to but just because you can.",
                    business: "You will find that the simple approach will work the best. Let go of complex issues.",
                    personal: "Enjoy life.",
                    overview: "<b>Wu Wang</b> is about innocence and the childlike joy associated with it. Stop trying to impress others in order to gain their approval. Istead of concentrating on this aspect of life which focuses on an imagined future, focus and honor each aspect of life or work. This way you will remain open and alert. Although planning and thought are still needed, Wu Wang is a reminder that it is never possible to foresee every contingency. Learn to react moment to moment rather than wasting too much energy on things that will probably never happen. Find the balance you need between childlike confidence and the wisdom of experience."
                },
                {
                    id: 26,
                    sentence: "The Taming Power of The Great. <br> Perseverance furthers. <br> Not eating at home brings good fortune. <br> It furthers one to cross the grat water.",
                    general: "Wisdom and resources accumulatd in a diciplined manner will help you in all future endeavors.",
                    love: "Your relationship will not be helped by being frivolous or impulsive.",
                    business: "Be disciplined in your approach and seek wisdom from those with more experience.",
                    personal: "Focus on building your inner resources and/or strength.",
                    overview: "<b>Ta Ch'u</b> is about accumulating resources. It is not, however, about being miserly and hoarding. Your wealth should be put to work for the benefit of all. <b>Ta Ch'u</b> is also a reminder that there are people around you with more wisdom and experience and you should not br afraid, or see it as a sign of weakness, to seek their advice. It is also about moderation. Use your resources but use them wisely so that you can take care of those around you."
                },
                {
                    id: 27,
                    sentence: "The Corners of the Mouth. <br> Perseverance brings good fortune. <br> Pay heed to the providing of nourishment and what a man seeks to fill his own mouth with.",
                    general: "Spiritual discrimination is a important a physical discrimination.",
                    love: "Choose your thoughts and words wisely in your relationship and remember to be tolerant.",
                    business: "Use the right words and you will help sustain and nourish your business.",
                    personal: "Now is a good time to clear out all that is not worthy from your life.",
                    overview: "<b>I</b> relates to nourishment. In the same way that food is used to nourish your body, <b>I</b> suggests that words and ideas be used in the same way. It cautions that as with food your words should be chosen carefully. Just as bad food can upset you or those around you, bad words can do the same. When the body and spirit are both well provided for then you will be at your most powerful and effective."
                },
                {
                    id: 28,
                    sentence: "Preponderance of the Great. <br> The ridgepole sags to the breaking point. <br> It furthers one to have somewhere to go. <br> Success.",
                    general: "Staying alert and then intervening in a timely fashion will help forestall many difficulties.",
                    love: "An unresolved conflict may require you to temporarily leave the situation.",
                    business: "You may need to retreat from a difficult business venture.",
                    personal: "Assess your ambitions for the future by letting go of the present.",
                    overview: "<b>Ta Kuo</b> is very much a warning. It tells you that a current situation has gone beyond your control and this may mean withdrawing from the situation completely. Failure to do so will spell disaster. In some cases the situation may be capable of still being resolved but in most it will not. The demage is already done. However upsetting it may be it is time to cut your losses."
                },
                {
                    id: 29,
                    sentence: "The abysmal repeated. <br> If you are sincere you have success in your heart and whatever you do succeeds.",
                    general: "Only when you learn from danger you will triumph over it.",
                    love: "Do not overreact to a situation. Make sure you do not allow an argument to become violent or depressive. Avoid emotional outbursts.",
                    business: "This is a potentially dangerous time for your business and a calm head will be need to help resolve the insues.",
                    personal: "Use  meditation to help find creative suluctions to your current problems.",
                    overview: "<b>K'an</b> is about danger and is not considered at all auspicious. Any situation that has potential to cause harm in any way must be carefully monitored in order to minimize demage. Resist panic and despair and look an verbal or written threats as a tool to sharpen your awareness. and prepare you for future success encounters. Do not surrender to feelings or helplessness but rather cultivate calmness and a positive outlook. You can acclimatize even to danger if you try.",
                },
                {
                    id: 30,
                    sentence: "The Clinging. <br> Perseverance furthers. It brings success. <br> Care of the cow brings good fortune.",
                    general: "Tending the 'fires' of your mind and spirit will help illuminate your path.",
                    love: "Be enthusiastic about your partner's development and be sure to enjoy this time of inspiration.",
                    business: "Enthusiasm is the key to finding creative solutions to current business problems.",
                    personal: "Enhance your personal criativity by joining in comunal activities.",
                    overview: "<b>Li</b> is about tending your 'inner fires' in an appropriete manner. The key to helping them burning is to fuel them constantly and carefully. It is about learning how best to feed them and how much fuel to use. You don't want it to blaze uncontrollably. Nor do you want it to smolder into non-existence. Your own enthusiasm and that of others can be mutually beneficial to all concerned."
                },
                {
                    id: 31,
                    sentence: "Influence. Success. <br> Perseverance furthers. <br> To take a maiden to wife brings good fortune.",
                    general: "Success is assured when attraction is strengthened by mutual respect and support.",
                    love: "If your partner has shared and complementary qualities then you are well matched.",
                    business: "Seek a partner or partnership that complements your own strengths.",
                    personal: "Cultivate respect and honor toward those around you.",
                    overview: "<b>Hsien</b> is about your perception of those arround you whether family, friends or business partners.You will be most successful in any area when the qualities you an they have are shared and complementary. If one of these aspects is missing then the relationship will be undermined. Although <b>Hsien</b> most often appears for romantics situations it is also a reminder that the same qualities are needed in all aspects of life for a relationship to work."
                },
                {
                    id: 32,
                    sentence: "Duration. Success. No blame. <br> Perseverance furthers. <br> It furthers one to have somewhere to go.",
                    general: "True persistence is a process of constant renewal.",
                    love: "To deepen your relationship you should adapt to changes around you.",
                    business: "You will be rewarded for the effort you have put into your bussiness ventures.",
                    personal: "Focus on self-renewal and make sure you avoid inertia.",
                    overview: "<b>Heng</b> is telling you that only sure constant in life is change. When mistakes are made in a particular strategy the same mistake is often repeated. It does not show strength of character to formulate  the same strategy (even it has worked in the past). Rather it shows a weakness in your refusal to adapt and change. There will always be obstacles in life. Some may be often repeated. If a strategy taht has worked several times in the past does not work now then change your strategy. It is also about inertia and complacency. You should always be focusing on self-renewal and not becoming complacent. Avoid stagnation."
                },
                {
                    id: 33,
                    sentence: "Retreat. Success. <br> In what is small, perseverance furthers.",
                    general: "It is not an admission of defeat to retreat from an unequal fight.",
                    love: "Take the time to strengthen your position when considering engaging in a fight with your partner.",
                    business: "Rethink your position and strategy before reentering negotiations. Do not compromise just because it is quicker to do so.",
                    personal: "Don't ignore issues but formulate an effective strategy before attempting to deal with it. Avoid destructive confrontations.",
                    overview: "<b>Tun</b> is all about retreating from destructive confrontations and it tells you that to do so is not an admission of defeat - just that it is the wisest thing to do in the circumstances. It is not however telling you to forget or ignore the situation. Instead it advises you to formulate an effective strategy before reentering the  'conflict' and dealing with it. <b>Tun</b> signals it is time for a temporary retreat not that is time to run away and hide."
                },
                {
                    id: 34,
                    sentence: "The Power of the Great. <br> Perseverance furthers.",
                    general: "To win an advantage you not only need increase your strength but to accompany it with responsible action.",
                    love: "You will find others have a powerful attractionvto you - use this power wisely.",
                    business: "This is a favorable time for business but do not try and go far. Make sure you protect yourself and those around you.",
                    personal: "Problem issues can be favorably overcome if tackled with honor and compassion.",
                    overview: "<b>Ta Chuang</b> relates to the chance to take advantage of the current situation. Unlike Tun which urges a temporary retreat, Ta Chuan urges you to make the most of it. It carries the warning through, that overconfidence can lead to a downfall. Don't be rash, plan your strategy wisely and minimize demage wherever possible. Feeling empowered is good, but don't be narcissistic about it."
                },
                {
                    id: 35,
                    sentence: "Progress. <br> The powerful prince in honred with horses in large numbers. <br> In a single day he is granted audience three times.",
                    general: "An easily won victory should not be taken for granted or treated lightly.",
                    love: "Do not despise easy progress with your love life. Cherish it instead.",
                    business: "Be thankful for your current success.",
                    personal: "Take the time to consolidate your success and share it with those around you.",
                    overview: "<b>Chin</b> is all about progress. Easy progress and the feeling of dissatisfaction that can sometimes arise from such progress. <b>Chin</b> urges you to adopt the same attitude in victory as you would in adversity. Levelheadedness is required in both situations. <b>Chin</b> also warns that you should not try and take advantage of an easy victory for personal gain but must share the success with others."
                },
                {
                    id: 36,
                    sentence: "Derkening of the light. <br> In adversity, it furthers one to be persevering.",
                    general: "Concealing your light when danger is around is an effective way of avoiding detection.",
                    love: "Detach yourself from the issue and do not reveal your true fellings.",
                    business: "This is not a good time to start any new ventures.",
                    personal: "Use this time to work on your inner strengths until the current obstrtuctions pass.",
                    overview: "<b>Ming I</b> is very about caution and the need to keep a low profile. It is harder to travel by night than it is by day. But is also easier to give yourself away if you show your light. Don't try and make any further progress right now. Now is not the time to issue a challenge or to take anybody on. Keep a low profile and bide your time while strengthening your resources."
                },
                {
                    id: 37,
                    sentence: "The Family. The perseverance of the woman furthers.",
                    general: "Open and respectful communication is the key to making a team work successfully.",
                    love: "Communication must be sincere to benefit your relationship.",
                    business: "Avoid misunderstandingd within your business by ensuring that each individual fully unsderstands his or her role.",
                    personal: "Make sure that you are communicating clearly and effectively with those who are important to you.",
                    overview: "<b>Chia Jen</b> is very much about communication and its effectiveness within a team of any sort. If you do not communicate clearly with those around you then you run the risk of misunderstandings, which can hinder your progress. Whatever level this communication takes place on you need to make sure that you are respectful, sincere, and very clear in what you mean."
                },
                {
                    id: 38,
                    sentence: "Opposition In small matters, good fortune.",
                    general: "Reconcilliation must be a key priority if there is disunity.",
                    love: "Be as tactful as necessary to overcome a potentially divisive issue.",
                    business: "You may find that lack of communication, or refusal to communicate, is causing a period of stagnation. You will need to remedy this before further progress is possible.",
                    personal: "It will be necessary to learn to respect your enemy to resolve any crisis you are currently in.",
                    overview: "<b>K'uei</b> is about communication. Or the lack of it. Being stubborn or indifernt to a situation and not talking it out will lead to progress being brought to a standstill. <b>K'uei</b> tells you that the only way forward is through effective communication and reconciliation. Extreme tact may be required and if so, this is the course you must take. You must learn to ignore emotion at this time no matter how badly others may be behaving. Do not allow yourself to be provoked and they respond with anger. It will be a mistake and you will lose credibility. Your behavior needs to be exemplary."
                },
                {
                    id: 39,
                    sentence: "Obstrtuction. The southwest furthers. <br> The northeast does not further. <br> It furthers one to see the great man. <br> Perseverance brings good fortune.",
                    general: "If outward progress is current imposible then concentrate on cultivation your inner strengths.",
                    love: "It will be necessary to go within to look for clues to building a relationship if love has gone sour.",
                    business: "Do not blame others for current business problems. Instead, consult them for ideas and support in overcoming the issues.",
                    personal: "This is only a temporary setback. Don't start to feel sorry for  yourself. It is not constructive.",
                    overview: "<b>Chien</b> is about Obstrtuctions to progress. Although problems may seem insurmountable, they are not. Although external help may eventually manifest itself it is necessary to use this time to gather your strength and use the help of those around you to try and resolve the problems. Work on resolving any internal flaws or weaknesses. Don't allow yourself to become frustrated. This is only a temporary setback. Once these obstacles have passed you will should start to move forward again. But do so cautiously until you are sure that all danger has passed."
                },
                {
                    id: 40,
                    sentence: "Deliverance. The southwest futhers. <br> If there is no longer anything where one has to go. Return brings good fortune. <br> If there is still something where one has to go. Hastening brings good fortune.",
                    general: "Discard any millstones you may be carrying. Bitterness, grievance and recrimination will only hold you back.",
                    love: "Do not allow guilt and/or recriminations to get in the way of your relationship with your partner.",
                    business: "This is a time to be taking very small steps forward.",
                    personal: "Past issues should be released so that you can start to progress again.",
                    overview: "<b>Hisieh</b> is about starting to progress once more. Recent difficulties have left you in a weakened state and a period of convalescence is necessary. If an athlete twists an ankle on the Monday then it would be a mistake to try and run a marathon on the Tuesday. Adapt to your new circumstances and make sure your release past issues and grievances. Whether these were self-inflicted or the fault of others - let them go. Only then will you be able to start taking the small steps needed to progress once more."
                },
                {
                    id: 41,
                    sentence: "Decrease combined with sincerity Brings about supreme good fortune without blame. <br> One may be persevering in this. <br> It futhers one to undertake something. <br> How is this to be carried out? <br> One may use two small bowls for the sicrifice.",
                    general: "Make sure you use your resources appropriately apportioned or instability will result.",
                    love: "Go back to basics and focus on nourishment and nurturing you relationship.",
                    business: "Direct your resources to fundamental operations only. Be frugal with your money.",
                    personal: "Direct your energy or finances toward basic concerns only and don't be impatient or resentful in having to do so.",
                    overview: "<b>Sun</b> is about the sharing of wealth and resources. If they are shared unequally thorough society then instability can result. <b>Sun</b> tells you that there is a need to balance this situation and that this is a time to be frugal and self-diciplined. It also warns that this will take time and so patience will be needed."
                },
                {
                    id: 42,
                    sentence: "Increase. It furthers one to undertake something. <br> It furthers one to cross the great water.",
                    general: "When accompanied by generosity abundance abundance will endure.",
                    love: "Do not be miserly in sharing your love with your partner.",
                    business: "This is a time for furthering your business and for rewarding your staff generously.",
                    personal: "Take the opportunity to help others and you will achieve great success.",
                    overview: "Whereas Sun related to inequality and the need to redress it, <b>I</b> is the very opposity and relates to the time when the inequalities have been addressed. For the wealthier members of society this may initially mean a loss but in the long-term they will reap the benefits of a strengthened communit. <b>I</b> tells you that this is a time of opportunity and that you should take advange of it. And take advange quickly for no situation is permanent."
                },
                {
                    id: 43,
                    sentence: "Break-through. <br> One must resolutely make the matter known at the court of th king. <br> It must be announced truthfully. Danger. <br> It is necessary to notify one's own city. <br> It does not further to resort to arms. <br> It furthers one to undertake something.",
                    general: "When the unscrupulous reveal their weakness be ready to act.",
                    love: "This is a time when a breakthrough in your relationship will occur. Be sure to handle it honorably.",
                    business: "When an opportunity pressents itself, make sure you use positive strategies to achieve the breakthrough you need.",
                    personal: "Any breakthrough on a personal level must be handled ethically.",
                    overview: "<b>Kuai</b> is about opportunities being presented through the weakness of others and the need to be ready and prepared to act. Once this opportunity has been presented and you have made a breakthrough you must immediately take advantage of it. It is important for you not to let negative forces regain the upper hand. <b>Kuai</b> also carries a warning not to resort to using your opponents tatics and is a reminder that the end does not justify the means. Replace negativity with a positive alternative.",

                },
                {
                    id: 44,
                    sentence: "Comming to meet. The maiden is powerful. <br> One should not marry such a maiden.",
                    general: "Pernicious influences must be resisted the moment you become aware of them.",
                    love: "Do not allow harmful influences to affect your relationship.",
                    business: "Protect your business from corruption and unethical practices. Great harm will result if you do not.",
                    personal: "Unscrupulous and imoral people should be avoided.",
                    overview: "<b>Kou</b> is about how easily virtue can be undermined and the need to prevent this from happening. Although situations you encounter may seen unimportant initially if you do not guard against them they will gather momentum and be extremely difficult to deal with. Don't underestimate how quickly this can happen. If you are tempted into meeting with unscrupulous people, acknowledge your own part in this mistake and remove yourself from their presence and the situation.",
                },
                {
                    id: 45,
                    sentence: "Gathering Together. Success. <br> The king approaches his temple. <br> It furthers one to see the great man. <br> This brings success. Perseverance furthers. <br> To bring great offerings creates good fortune. <br> It furthers one to undertake something.",
                    general: "Social harmony is a prerequisite for prosperous times.",
                    love: "If both of you work towards a common goal then your relationship will thrive.",
                    business: "Large projects need to be handled carefully and respectfully.",
                    personal: "If you are involved with any project involving a large group you should focus on a common goal.",
                    overview: "The I Ching often talks about the power of the group and this is what <b>Ts'ui</b> relates to. Although great things can be achieved when everyone focuses on a common goal, <b>Ts'ui</b> is a reminder that there will always be some who are uninterested in the common good. Arrogance and ignorance mean that these people will pray on those around them. <b>Ts'ui</b> warns that a leader in times such as these must always be vigilant and make use of foresight if the weaker aspects are to be controlled."
                },
                {
                    id: 46,
                    sentence: "Pushing Upward has spreme succes. <br> One must see the great man, fear not. <br> Departure toward the south brings good fortune.",
                    general: "Everything must come to pass in its own time at its own speed.",
                    love: "Patience and quiet nurturing will help your relationship to prosper.",
                    business: "Focus on the success of your business to help the antecipated rewards come about.",
                    personal: "Keep working on your plans and maintain confidence in their success.",
                    overview: "<b>Chêng</b> is about patience and confidence. It is a time when you can't speed things along - they will happen at their own speed. This is very much a time of natural development. Be patient and growth you hope for will come about. Growth is assured, so be patient and let thing happen as they must. Don't keep interfering with what is a very natural progress."
                },
                {
                    id: 47,
                    sentence: "Oppresion. Success. Perseverance. <br> The great man brings about good fortune, no blame. <br> When one has something to say it is not believed.",
                    general: "Your most valuable asset will be a sense of purpose.",
                    love: "Take the time to help rejuvenate your relationship rather than despair over it.",
                    business: "This is not a time to make important business decisions.",
                    personal: "You should focus on rest and recuperation.",
                    overview: "<b>K'un</b> appears when times are difficult as regards to your endeavors. It is a particulary dangerous time as you run the risk of falling into despair or getting depressed no matter how much you yearn for success. This can happen at any time and as issues are hard to deal with at such a time, <b>K'un</b> recommends that in future times like this should be prepared for well in advance. This time you need to realize that what is happening is nothing more than a temporary condition and you should treat it as a period of rest and recuperation. Look after your body and your mind - a positive attitude is a must. Strength and purpose will return and your outlook on life will be renewed."
                },
                {
                    id: 48,
                    sentence: "The Well. <br> The town may be changed but the well cannot be changed. <br> It neither decreases nor increases. <br> They come and go and draw from the well. If one gets down almost to the water and the rope does not go all the way, or the jug breaks, it brings misfortune.",
                    general: "Even though times change the spirit has constant needs.",
                    love: "Nourish the soul to help sustain your relationship.",
                    business: "The basic and constant needs of humanity should be focused on.",
                    personal: "Make sure your basic needs are well provided for and that you nurture your spirit.",
                    overview: "<b>Ching</b> is a reminder that even though everything around us is constantly changing the soul needs constant nourishing and this need does not change. It is a time to ensure that the nourishment needed for body, mind and soul remains available and untained. Ching also emphasizes that you have a responsibility to help provide this nourishment for those who cannot provide it for themselves."
                },
                {
                    id: 49,
                    sentence: "Revolution. <br> On your own day you are believed. <br> Supreme success. Furthering through perseverance. <br> Remorse disappears.",
                    general: "Only when justified by necessity and clear intent should radical change be undertaken.",
                    love: "Your relationship may be in need of a radical change, but first you should plan for all eventualities.",
                    business: "The timing for radical change should be chosen wisely to maximize results.",
                    personal: "Meditation is the key to taking advantage of the opportunity for radical self-transformation.",
                    overview: "<b>Ko</b> appears at the time of potential radical transformation. Although fast, decisive, action is often the best way this is not necessarily so when <b>Ko</b> appears. Timing is crucial. Any action needs to be thoroughly throught out and based on every solid foundations. Action should only be taken when if absolutely necessary. Resist the temptation to act impetuously as that will undermine your efforts and quite possibly have a negative effect.",
                },
                {
                    id: 50,
                    sentence: "The Caldron. <br> Supreme good fortune. <br> Success.",
                    general: "The nourishment of the body, mind, and spirit is the key to a harmonious existence.",
                    love: "Enjoying the harmonious apects of your relationship will help deepen the bounds between you and your partner.",
                    business: "Focus on business that will transform your affairs and make sure that you deal with everything in a sophisticated manner.",
                    personal: "Strengthen the bounds between you and those most important to you by hosting a meal of some sort.",
                    overview: "<b>Ting</b> is very much concerned with the provision of necessities for a comunity to exist harmoniously. Unlike Ching, witch deals with the basics, <b>Ting</b> is about the 'extras'. The sharing of a well-prepared meal is the ritual throughout the world for cultivation the bounds between people. As well as providing for the body <b>Ting</b> reminds you that the spiritual 'extras' should not be overlooked.",
                },
                {
                    id: 51,
                    sentence: "Shock brings success. <br> Shock comes - oh, oh! <br> Laughing words - ha, ha! <br> The shock terrifies for a hundred miles and he does not let fall the sacrificial spoon and calice.",
                    general: "Don't object to the storm that is needed to clear the air. It is a necessity.",
                    love: "Examine your behavior for any destructive habits and rise to the challenge of eradicating them.",
                    business: "If your business is facing an alarming setback you will need strengthen your resolve to prevail.",
                    personal: "You will become a stronger person by learning to face your fears.",
                    overview: "<b>Chên</b> is about fear and appears when there is a need for you to be jolted out of complacency. It encourages you to examine all aspects of life and see where flaws exist or errors have been made etc. and to take steps to deal with them. This examination should be approached conscientiously, which will help you to come through this period a stronger and wiser person provided you do not go back to your old habits. <b>Chên</b> tells you how to react to a crisis. Remember, courage is not the lack of fear, but the willingness to face it."
                },
                {
                    id: 52,
                    sentence: "Keeping Still. <br> Keeping his back still so that he no longer feels his body. <br> He goes into his courtyard and do not see his people. <br> No blame. ",
                    general: "Any and all effective actions must be born out of stillness",
                    love: "In order to see things clearly you must let go of any preconceptions.",
                    business: "Clear your mind before making any important business decisions.",
                    personal: "Learn how to meditate to help achieve a still mind.",
                    overview: "<b>Kên</b> reminds you that if your mind is full of clutter it will not be able to hold new thoughts and ideas. Ken appears when you have to take a break and withdraw from the world for a moment in order to clear out the old in your mind to make way for the new. Meditation is the key to this process. It is not simply a time for rest. It is not an easy task to free your mind from daily worries, but it is necessary to do so, so that you can see and think more objectively than before. Old thoughts hinder your actions, compelling you to make the same mistakes. Clear them out - don't let them trap you."
                },
                {
                    id: 53,
                    sentence: "Development. The maiden is given in marriage. Good fortune. <br> Perseverance furthers.",
                    general: "It is only possible to perfect every detail of advancement when progress is steady and patient.",
                    love: "Deepening your relationship is more likely if you make steady snd unhurried progress.",
                    business: "You should take the time to focus on the big and small details of your business.",
                    personal: "Focus on the particulars of your life in order to appreciate its fullness.",
                    overview: "<b>Chien</b> is all about patience and the need to examine the minutiae of life. Progress at this time is assured so do not be anxious if things are not going as fast as you would like. Instead, use this time as an opportunity to make sure that all your bases are covered. <b>Chien</b> tells you that the smaller details in life are very important and that progress will be slow and steady. You can fly over an area in a matter of seconds, but the man who walks through that area will learn much more. Spending time on the smaller details of life will undoubtedly bring rewards in the future.",
                },
                {
                    id: 54,
                    sentence: "The Marrying Maiden <br> Undertaking bring misfortune. <br> Nothing that would further.",
                    general: "A sense of perspective is the best way to cure disappointment.",
                    love: "There is a word of difference between infatuation and true love. Don't mistake one for the other.",
                    business: "Do not make impetuous business decisions.",
                    personal: "Focus on slow and steady progress when faced with a difficult or a complex situation.",
                    overview: "<b>Kuei Mei</b> is one of the most challenging hexagrams of the I Ching. It appears when the warnings carried by hexagram 53 (<b>Chien</b>) have been ignored. This is a time when you may well fell alienated from those around you and that all respect for you has been lost. Kuei Mei carries a very strong warning that when impetuous action or errors of judgment have resulted in the current bad times then it would be a momentous mistake to act impetuously once again. Great diplomacy and slow progress are the only remedies that will be effective. Avoid anger, avoid self-pity. Approach this time and the coming times with fortitude. All things pass and this period is no exception."
                },
                {
                    id: 55,
                    sentence: "Abundance has success. <br> The King Attains abundance. <br> Be not sad. Be like the sun at midday.",
                    general: "Make sure you provide for the future even though you are at the peak of success.",
                    love: "Enjoy and celebrate the success of your relationship.",
                    business: "Even though you are currently very successful make sure you make plans for the future.",
                    personal: "This is a very successful time for you. Make the most of your success for lasting benefits.",
                    overview: "<b>Fêng</b> appears when everything is currently very successful. It is a remind that although it is fine to enjoy this period you should not make the mistake of thinking this period will last forever. Everything is transient. Success, like adversity is just as transient. Enjoy this period of life by all means but make plans to provide for the future when times may not be so benefical. Celebrationn is appropriate but guard against making foolish decisions. Major success is all too rare to be taken lightly.",
                },
                {
                    id: 56,
                    sentence: "The Wanderer. Success through smallness. <br> Perseverance brings good fortune to the wanderer.",
                    general: "You will travel best when the journey is a quest rather than a holiday or an escape.",
                    love: "Travel will help provide something that is lacking in your relationship provided the journey is not being used as a means of escape.",
                    business: "Travel is necessary to help provide something that is lacking in your business. It is a time tact and diplomacy.",
                    personal: "Travel can be used as a means of gaining knowledge in an area that is lacking.",
                    overview: "<b>Lü</b> represents a time in your life when you feel the need to travel. There is a feeling that something is missing and now is a good time for you to undertake a quest to find out what. <b>Lü</b> is also a reminder that when moving into unfamiliar territory it is wise to tacful and courteous. Just because you do things differently to others doesn't mean you are right and they are wrong. Be aware of differences in customs and behavior and act accordingly. <b>Lü</b> should not be seen as a time to take a trip to escape from difficulties but as a time to gain knowledge."
                },
                {
                    id: 57,
                    sentence: "The Gentle. Success through  what is small. <br> It furthers one to have somewhere to go. <br> It furthers one to see the great man.",
                    general: "Although rapid change may be effected by force, enduring change is best effected by gentle persistence.",
                    love: "Patient, thoughtful, and thorough action is the best way to develop trust in your relationship.",
                    business: "Gentle persistence is by far the best way to further your business plans.",
                    personal: "Gentle persistence is the key to successfully achieving your plans.",
                    overview: "<b>Sun</b> is all about the need to be persistent and gentle in your actions. It does not mean that your plans will be unsuccessful because you are proceeding gently rather than forcefully. Unceasing gentleness, not aggressiveness is the key to progress and success. Persuasion and the birth of trust will be far more enduring than threats and coercion. It is a time to allow your thoughts and ideas to permeate the minds of those you are dealing with at their own speed. Be gently persistent in your approach and you will be successfu. Adapt to each situation and as required. Don't mistake gentleness for docility and don't allow gentleness to become weakness."
                },
                {
                    id: 58,
                    sentence: "The Joyous. Success. Perseverance is favorable",
                    general: "Nothing inspires human spirit more than bliss.",
                    love: "You will experience great joy in your relationship.",
                    business: "All things are possible at this time so do not be afraid to capitalize on your success.",
                    personal: "Enjoy the feeling of bliss in your life and use it as inspiration to advance.",
                    overview: "<b>Tui</b> indicates a time of great success and the feeling of bliss that accompanies it. Anxiety and discord are currently banished to the past and there is a feeling that grater things are possible. <b>Tui</b> relates to the past to this feeling of bliss and holds out the promise that there is more to come. It warns though, that  although celebraion is warranted and fitting at this time you should not let that become a distraction and prevent you from capitalizing on your success."
                },
                {
                    id: 59,
                    sentence: "Dispersion. Success. <br> The king approachs his temple. <br> It furthers one to cross the great water. <br> Perseverance furthers.",
                    general: "In order to advance you will need to eliminate causes of disharmony.",
                    love: "barriers to your relationship can be removed by strengthening comunication.",
                    business: "persistent comunication is the key to progress within your business.",
                    personal: "You shoud move persistently towards unity and integration to aliviate your conserns.",
                    overview: "<b>Huan</b> is about removing barrriers that are currently stalling any progress. It will be necessary to use different means to help remove these blockages. It may not be possible to remove them all yourself. It may be that an outside mediator is required. A calm and persistent approach is required. This is a time when there is likely to be some demage caused by removal of the obstacles and if so, you must try and limit demage to areas not directly linked to the cause of the conflict. Comunication and cooperation are the keys to success.",
                },
                {
                    id: 60,
                    sentence: "Limitation. Success. <br> Galling limitation must not be perserved in.",
                    general: "Although your potential is limitless, your capabilities are not.",
                    love: "Don't try to move too fast in your relationship. Start slowly and build a strong and lasting friendship.",
                    business: "This is a time for quality not quantity. Do not overreach yourself in business.",
                    personal: "Long-term happiness is best achieved slowly.",
                    overview: "<b>Chieh</b> represents the need in your life to have pratical limitations. Whereas your potential is limitless your ability to expand and reach that potential is not. You can only do so much. Only achieve so much. When you attempt to do too much you are threatening your existence and your success. Growth is still possible of course and <b>Chieh</b> does not indicate that growth will stop - just that your growth will not be exponential. In effect Chieh advises moderation. Spending beyond your means, trying to expand beyond you means will not be conductive to future a long-term happiness. It is important to understand that though, to mantain a balance. Metaphorically speaking, spending too little is as bad as spending too much."
                },
                {
                    id: 61,
                    sentence: "Inner Truth. Pigs and fishes. Good Fortune. <br> It furthers one to cross the great water. <br> Perseverance furthers.",
                    general: "To have a deep influence on others you must have a thorough understanting of them.",
                    love: "For your partner to trust you more deeply you must take the time to thoroughly understand them.",
                    business: "Straightforward communication that is honest and sincere will benefit your business partnership immeasurably.",
                    personal: "You need to cultivate a deep and compassionate understanding of the people affecting your life.",
                    overview: "<b>Chung Fu</b> is about communicating and cooperating effectively with those around you. To do this and be successful you will need to take the time to thoroughly understand their natures. Prejudice, preconceptions, or any other factor must be put aside or receptivity will be lessened. Once you thoroughly understand someone you can work on gaining their trust. <b>Chung Fu</b> warns though, that this needs for your mutual benefit. Failure to heed this need for honesty and sincerity will mean that any progress achieved will be undone."
                },
                {
                    id: 62,
                    sentence: "Preponderance of the Small. Success. <br> Preserverance furthers. <br> Small things may be done; great things should not be done. <br> The flying bird brings the message: It is not well to strive upward, It is well to remain below. <br> Great good fortune.",
                    general: "An accumulation of small victories is the best way to achieve greatness at this time.",
                    love: "Strengthen the love in your relationship by attending to the small details.",
                    business: "The smaller details of a project need to be focused on to achieve great success.",
                    personal: "Personal success can be achieved by focusing on the more mundane aspects of life.",
                    overview: "<b>Hsiao Kuo</b> appears when there is a need for you to temporarily from trying to attain a great success in one fell swoop. Instead, you need to concentrate on lots of small successes to achieve the overall great success. <b>Hsiao Kuo</b> is all about strength gained from the smaller aspects of life. Although it is not an auspicious time for very ambitious projects that does not mean that progress cannot be made. Progress is more than possible, but only by taking one small step at a time."
                },
                {
                    id: 63,
                    sentence: "After Completion. Success in small matters. Perseverance furthers. <br> At the beginning good fortune. At the end disorder.",
                    general: "Every triumph brings new challenges.",
                    love: "Your relationship will move into a deeper phase.",
                    business: "celebrate your achievements but sure to consolidate your success.",
                    personal: "Celebrate your success and make plans for entering a new phase of your life.",
                    overview: "<b>Chi Chi</b> relates to successful completion and what comes next. It is now a time that you have achieved great success and have every right to celebrate. <b>Chi Chi</b> reminds your though, that all things change and that you need to be alert for anything that will undermine your current success. Avoid becoming complacent, or arrogant. If you want your success to endure you must immediately take steps to consolidate it. It is important for you to realize that this is the conclusion of a chapter in your life. A new chapter awaits.",
                },
                {
                    id: 64,
                    sentence: "before Completion. Success. <br> But if the little fox, after nearly completing the crossing, <br> gets his tail in the water, There is nothing that would further.",
                    general: "You will need to be especially vigilant in the last few yards to success.",
                    love: "If you wish to achieve your goal within you relationship, you must not allow yourself to be distracted.",
                    business: "Focus on achieving your business goals and do not allow yourself to be distracted.",
                    personal: "Do not allow pride or impatience to get in the way of the success that is so near.",
                    overview: "<b>Wei Chi</b> relates to that sort of period of time that preceds success. When victory is in sight it is easy to take it for granted and not concentrate on your goals. The end of a chapter in your life is approaching and this is an especially dangerous time when all you have achieved can by undone through inattention. <b>Wei Chi</b> is just like the old saying 'don't count your chickens before they're hatched'. Remain alert to danger and stay focused on the tasks at hand. This way <b>Wei Chi</b> will indicate a successful conclusion."
                }
            ],
            pt: [{
                    id: 1,
                    sentence: "O Criativo promove sublime sucesso, <br> Favorecendo através daa perseverança.",
                    general: "O esforço persistente irá ajudá-lo a realizar o seu potencial de realização.",
                    love: "Tem de se comportar de uma forma compassiva para com o seu parceiro.",
                    business: "As suas ideias são sólidas, mas precisa de tempo para planear a sua estratégia de modo a fazê-las funcionar.",
                    personal: "É preciso tirar algum tempo para relaxar e desfrutar mais da vida.",
                    overview: "<b>Ch'ien</b> é energia yang pura. sendo yang puro indica uma altura em que está em boa posição para atingir os seus objetivos (sejam eles quais forem). No entanto, é uma época de potencial, uma vez que há falta de influência yin. Portanto, agora é o momento de fazer esses planos e preparar-se para os pôr em ação. Planeie cuidadosamente e não seja impaciente. Embora Ch'ien seja um hexagrama auspicioso, para os seus planos o tom tem um efeito duradouro, os seus motivos precisam de ser virtuosos. Seja compassivo quando avançar. Se fores arrogante, só criarás complacência ou ressentimento nos que te rodeiam."
                },
                {
                    id: 2,
                    sentence: "O Receptivo traz sublime sucesso, <br> Propiciando através da perseverança de uma égua. <br> Se o homem superior empreender algo e tentar dirigir <br> Ele se desviará; <br> Porém se ele seguir, encontrá orientação. <br> É favorável encontrar amigos a oeste e ao sul, <br> Evitar amigos a leste e ao norte. <br> Uma perseverança tranquila traz boa fortuna.",
                    general: "Seja receptivo a palavras de conselho ou influência de quem vale a pena respeitar. Isto é um sinal de força, não de fraqueza.",
                    love: "Escute os conselhos da família e dos amigos.",
                    business: "Ouça os conselhos de peritos na sua área e faça um balanço do seu negócio.",
                    personal: "Aceite o conselho de um conselheiro em quem confia.",
                    overview: "<b>K'un</b> é energia yin pura. <b>K'un</b> indica um tempo que beneficiará ao ouvir os conselhos de outros que respeita e em quem confia. Ouvir os seus conselhos é a única forma de progredir neste momento. Se cometer o erro de ignorar os conselhos ou nem sequer se preocupar em ouvir em primeiro lugar, então os seus planos não darão em nada. Não haverá progressos.",
                },
                {
                    id: 3,
                    sentence: "Dificuldade Inicial traz sublime sucesso. <br> Favorecendo através da perseverança. <br> Nada deve ser empreendido. <br> É favorável designar ajudantes.",
                    general: "O primeiro passo para uma verdadeira aprendizagem é reconhecer a sua inexperiência.",
                    love: "Desde que aprenda com o problema com que se deparou, irá ultrapassar o atual obstáculo.",
                    business: "Avalie o seu negócio honestamente e veja como poderia fazer melhores negócios.",
                    personal: "Se tiver atingido um revés, então faça ajustamentos ao seu estilo de vida e o revés será apenas temporário.",
                    overview: "<b>Chun</b> é um lembrete de que embora possam ser encontrados problemas, eles são frequentemente apenas breves - tal como uma tempestade de trovoada. E como a terra que beneficia da chuva extra, você também pode beneficiar desde que aprenda com o que aconteceu. Uma vez ultrapassado qualquer obstáculo, então o seu projeto terá a oportunidade de prosperar. Mas é preciso ter cuidado com a ação imprudente. Reconheça influências enganosas e corruptas e forje alianças com aqueles que são dignos de confiança. Estará mais em risco se deixar que a sua ignorância o cegue para o quanto tem de aprender."


                },
                {
                    id: 4,
                    sentence: "A Insensatez Juvenil tem sucesso. <br> Não sou eu quem procura o jovem insensato; É o jovem insensato quem me procura. <br> À primeira consulta eu respondo. <br> Se ele pergunta duas ou três vezes, torna-se importuno. <br> Ao que se torna importuno não dou nenhuma informação. <br> A perseverança é favorável.",
                    general: "A paciência e a bondade são as chaves para aprender e ensinar.",
                    love: "Abandone qualquer noção infantil que tenha sobre relacionamentos.",
                    business: "Ser ponderado ajudará a fortalecer novas ideias ou procedimentos de negócios.",
                    personal: "Recordar o prazer da infância e da juventude e imitá-lo. Pode ser necessário reconhecer quaisquer maus hábitos dessa época.",
                    overview: "<bMeng></b> baseia-se no tema da inexperiência vista no hexagrama 3 (Chun). Sugere que a juventude (como o riacho que corre) tem um longo caminho a percorrer antes de se tornar um rio poderoso. <b>Meng</b> trata de ensino, aprendizagem e conhecimento. A ignorância não deve ser punida, mas sim substituída pelo conhecimento. Quando a aprendizagem é divertida, o estudante aprenderá mais. É um lembrete de que um professor deve ser um mentor, preparando o cenário para a forma como o estudante se comportará na vida adulta."
                },
                {
                    id: 5,
                    sentence: "A Espera. <br> Se você é sincero, tem a luz e o sucesso. <br> A perseverança traz boa fortuna. <br> É favorável atravessar a grande água.",
                    general: "Não duvide de que a espera é necessária.",
                    love: "Se estiver numa relação existente, entrará numa fase mais feliz, ou se estiver solteiro, a sua relação chegará a tempo.",
                    business: "Comece o seu negócio ou continue-o se já começou, e saiba que terá sucesso.",
                    personal: "Mantenha a sua vida em perspectiva e deixe algumas dessas preocupações irem embora.",
                    overview: "<b>Hsu</b> relaciona-se com paciência e espera. É um aviso para não ser apressado e tomar medidas que mais tarde poderá arrepender-se, em vez disso deve esperar o seu tempo e preparar-se de forma adequada para as mudanças que estão a chegar. Aprimore os seus planos e estratégias. <b>Hsu</b> lembra-nos que os períodos de espera são uma parte necessária da vida e que o tempo não é desperdiçado quando se espera com o conhecimento confiante de que mais cedo ou mais tarde a escassez vai acabar."
                },
                {
                    id: 6,
                    sentence: "Conflito. Você é sincero e está sendo impedido. <br> Deter-se cautelosamente no meio do caminho traz boa fortuna. <br> Ir até o fim traz infortúnio. <br> É favorável ver o grande homem. <br> Não é favorável atravessar a grande água.",
                    general: "O antagonismo e a hostilidade irão aumentar com o espaço que criamos entre nós.",
                    love: "A compaixão deve ser usada para curar quaisquer rupturas dentro da sua relação. Escute com muita atenção tudo o que o seu parceiro tem a dizer.",
                    personal: "Torne-se mais flexível no seu ponto de vista. Enfrente os seus medos.",
                    overview: "<b>Sung</b> relaciona-se com conflito. Normalmente com aqueles que nos rodeiam, mas muitas vezes dentro de nós mesmos. Fala da necessidade de resolver estes conflitos. Identificar a consciência de si mesmo e lidar com os medos e a confusão que eles indicam é primordial. Isto evitará uma escalada nas hostilidades."
                },
                {
                    id: 7,
                    sentence: "O Exécito necessita da perseverança de um homem forte. <br> Boa fortuna sem culpa.",
                    general: "A credibilidade é a chave para a liderança.",
                    love: "Conflitos podem ser evitados usando a sua integridade.",
                    business: "Manter-se honesto e justo irá ajudar a ganhar o respeito daqueles que trabalham para você.",
                    personal: "Disciplina e honestidade devem ser incorporadas na sua forma de abordar a vida.",
                    overview: "<b>Shih</b> relaciona-se com disciplina e integridade dentro de tudo o que fazemos. O IChing compara o <b>Shih</b> a um exército. Um país sem um exército é vulnerável. Um país com um exército ainda é vulnerável se ele for indisciplinado e mal dirigido. O benefício mútuo e não pessoal deveria ser a regra."
                },
                {
                    id: 8,
                    sentence: "Manter-se Unido traz boa fortuna. <br> Indague ao oráculo mais uma vez <br> Se você possui elevação, constância e perseverança: <br> Então não há culpa. <br> Os inseguros gradualmente se aproximam. Aquele que chega tarde demais encontra o infortúnio.",
                    general: "Uma comunidade ligada pela boa vontade é a força mais potente para que ocorra uma mudança positiva poderosa.",
                    love: "Use a boa vontade e a confiança para alcançar a unidade na sua relação.",
                    business: "Fortaleça as relações dentro do seu negócio e estabeleça laços com as redes das quais faz parte o seu negócio.",
                    personal: "Formar ou estreitar laços com a família e amigos.",
                    overview: "<b>Pi</b> relaciona-se com a necessidade de unidade para realizar uma mudança positiva. As relações construídas sobre confiança e boa vontade devem ser formadas e mantidas para o benefício de todos - e não apenas para benefício pessoal. Isto aplica-se não só à família e amigos, mas também à comunidade à sua volta em geral e à sua comunidade empresarial também."
                },
                {
                    id: 9,
                    sentence: "O Poder de Domar do Pequeno tem sucesso. <br> Nuvens densas, nenhuma chuva vinda de nossa região oeste.",
                    general: "Quando grandes mudanças não são possíveis, então pequenas mudanças devem ser realizadas.",
                    love: "Desenvolva as suas capacidades de comunicação dentro da sua relação e divirta-se.",
                    business: "Avalie o seu negócio para ver se há pequenos assuntos que precisam de ser tratados.",
                    personal: "O desenvolvimento das suas capacidades e pontos fortes deve ser o seu foco principal.",
                    overview: "<b>Hsiao Ch'u</b> relaciona-se com a necessidade de prestar atenção aos detalhes. Indica que este não é um momento para empreender grandes mudanças na vida ou nos negócios, mas sim para lidar com os assuntos mais pequenos que possam necessitar de atenção. Examine as suas próprias atitudes e as das pessoas à sua volta para ver como as coisas podem ser melhoradas numa escala mais pequena."
                },
                {
                    id: 10,
                    sentence: "A Conduta. <br> Trilhando sobre a cauda do tigre. <br> Ele não morde o homem. Sucesso.",
                    general: "Uma jornada de sucesso pode ser assegurada se for dado um passo cuidadoso de cada vez.",
                    love: "A boa vontade é a chave para resolver qualquer problema de relacionamento.",
                    business: "Alcançar o sucesso nos negócios é o melhor que se consegue tratando os outros com cortesia e respeito.",
                    personal: "Concentre-se em livrar-se de qualquer sentimento de inveja ou ciúme.",
                    overview: "<b>Lu</b> relaciona-se com a necessidade de desenvolver as suas capacidades sociais e de se certificar de que são sinceras e não falsas. Indica a necessidade de garantir que os ciúmes e inveja não estejam presentes na sua vida e, se estiverem, de tomar medidas para os resolver. <b>Lu</b> fala sobre a desigualdade e a necessidade de a evitar."
                },
                {
                    id: 11,
                    sentence: "Paz. O pequeno parte; O grande se aproxima. <br> Boa Fortuna. Sucesso.",
                    general: "Embora os tempos sejam harmoniosos, não se deve tomá-los como garantidos. Tente compreender porque é que a harmonia está presente.",
                    love: "A sua relação deve ser tratada com respeito e gentileza.",
                    business: "O seu sucesso atual deve ser analisado para que se saiba como surgiu.",
                    personal: "Faça uma boa ação.",
                    overview: "<b>T'ai</b> relaciona-se com a harmonia. Tudo deve estar atualmente a correr bem. No entanto, não o tome por garantido. Examine todos os aspectos da sua vida e veja como essa harmonia se realiza. Nada é permanente, claro, e isto não é menos verdade para <b>T'ai</b>. Desfrute da paz e harmonia que o rodeia. <b>T'ai</b> é um hexagrama muito positivo e indica uma época de sucesso na vida.",
                },
                {
                    id: 12,
                    sentence: "Estagnação. <br> Homens maus não favorecem a perseverança do homem superior. <br> O grande parte; O pequeno se aproxima.",
                    general: "Embora este seja um momento de adversidade, deve lembrar-se que todas as coisas mudam e que há sempre esperança.",
                    love: "Um amante ou potencial amante pode não ser o que parece ser. Cuidado ao apaixonar-se.",
                    business: "Novos empreendimentos comerciais podem ser demasiado bons para serem verdadeiros. Examine-os cuidadosamente.",
                    personal: "Fortaleça os seus sentidos morais e éticos. Não se desvie.",
                    overview: "<b>Pi</b> relaciona-se com um tempo de estagnação e com a fragilidade da vida. Se as fundações forem fracas ou instáveis, então um edifício acabará por cair. Esta analogia também deve ser aplicada às pessoas. <b>Pi</b> indica frequentemente uma época em que indivíduos arrogantes chegam ao poder ou ocupam posições de autoridade. A sua arrogância acabará por ser a sua ruína. Cuidado com os indivíduos que tentam subverter o seu sentido de ética ou as consequências serão de grande alcance para si."
                },
                {
                    id: 13,
                    sentence: "Comunidade com os Homens em espaço aberto. Sucesso. <br> É favorável atravessar a grande água. <br> É favorável a perseverança do homem superior.",
                    general: "Pode-se alcançar força em números, eliminando a desconfiança.",
                    love: "",
                    business: "A comunicação com a sua equipe é a chave para dissipar mal-entendidos.",
                    personal: "Desenvolver o espírito comunitário através da organização de seminários, especialmente para projetos.",
                    overview: "<b>Tung Jên</b> relaciona-se com organização e companheirismo. Este hexagrama aparecerá frequentemente quando for necessário organizar indivíduos e/ou grupos desorganizados numa unidade eficaz e coesa. Embora a maioria das pessoas possa ver as vantagens da desconfiança na cooperação, muitas vezes impedirá o progresso. A desconfiança e a agressividade minam o espírito comunitário, pelo que é importante estar aberto. Apelar ao sentido de maior propósito comum das pessoas para superar pequenas diferenças. Uma vez alcançado o fim desejado, as pequenas divergências prevalecentes nas fases iniciais serão esquecidas."
                },
                {
                    id: 14,
                    sentence: "Grandes Posses: Sublime sucesso!",
                    general: "Aqueles que compreendem a responsabilidade que vem com a riqueza são os que melhor se aplicam para a manter.",
                    love: "Aproveite o atual período harmonioso, mas não se deixe levar pela complacência.",
                    business: "As oportunidades de sucesso empresarial existirão se as procurar. No entanto, não se deixe levar pela ganância.",
                    personal: "Tire o tempo necessário para desfrutar da clareza mental, mas certifique-se de estar atento a quaisquer sentimentos de orgulho ou arrogância e eliminá-los, se necessário.",
                    overview: "<b>Ta Yu</b> relata um tempo de abundância quando tudo está a correr bem. Embora seja uma época favorável, traz um aviso para não se deixar tornar arrogante ou ganancioso. Todos os obstáculos em todos os aspectos da vida terão desaparecido e a vida deve ser desfrutada. Não cometa o erro de se tornar complacente e acreditar que este período irá durar para sempre. Não vai durar. Nada o faz. Examine as circunstâncias harmoniosas que deram origem ao seu sucesso atual e faça o seu melhor para as preservar. desta forma poderá manter o sucesso o maior tempo possível. Generosidade e humildade são essenciais a este processo."
                },
                {
                    id: 15,
                    sentence: "A Modéstia cria o sucesso. <br> O homem superior conduz as coisas à conclusão.",
                    general: "A arrogância é o inimigo mortal da verdadeira grandeza.",
                    love: "Ajude a tirar o seu parceiro da sua concha.",
                    business: "Não ignore a tranquilidade do seu negócio. Seja um membro do pessoal ou uma conta.",
                    personal: "Não tome as coisas pelo valor superficial - aprenda a olhar além das aparências.",
                    overview: "<b>Ch'ien</b> está relacionado com orgulho e humildade. Embora o orgulho na realização seja apenas natural (particularmente entre os jovens) não se deve deixar que isso o cegue. Orgulhe-se, mas com moderação. O mais habilidoso em uma área que pode ser totalmente inadequada noutra. Orgulhe-se das suas realizações, mas não pense que uma habilidade o eleva acima do resto do mundo. Aprende que as nossas vidas não são tão comparáveis como você poderia pensar."
                },
                {
                    id: 16,
                    sentence: "Entusiasmo. <br> É favorável designar ajudantes e pôr os exércitos em marcha.",
                    general: "Revitalize o seu espírito através da celebração.",
                    love: "Proporcione ao seu parceiro uma agradável surpresa. Sugira um passeio ou uma viagem.",
                    business: "Reserve um tempo para celebrar os sucessos do seu negócio.",
                    personal: "Organize uma festa sazonal para celebrar os ciclos da natureza.",
                    overview: "<b>Yu</b> está relacionado com o aumento da energia não só de si próprio mas também daqueles que o rodeiam. Tal como a trovoada <b>Yu</b> sugere que a nossa existência e ambiente podem ser subitamente alterados através da celebração. Use a sua forte liderança para inspirar aqueles que o rodeiam. Não subestime o poder do entusiasmo partilhado. Ajudará a aumentar a confiança com a força de vontade para resistir a quaisquer dificuldades futuras."
                },
                {
                    id: 17,
                    sentence: "Seguir tem sublime sucesso. <br> A perseverança é favorável. <br> Nenhuma culpa.",
                    general: "O equilíbrio entre o coração e a mente de liderança ajudará a assegurar um progresso constante.",
                    love: "Mostre ao seu parceiro o que precisa pelo exemplo em vez de palavras. seja gentil com ele.",
                    business: "O trabalho árduo precisa de ser equilibrado pelo descanso.",
                    personal: "Planeje o progresso gradual e assegure que o trabalho árduo seja equilibrado pelo descanso.",
                    overview: "<b>Sui</b> indica que se deve dar o exemplo em vez de se dizer a todos o que fazer. Indica um momento em que o progresso gradual deve ser o plano e que o trabalho deve ser equilibrado com um período de descanso. Uma liderança eficaz tem a ver com servir e não com poder e ego. Um líder tem obrigações para com todos aqueles que trabalham para ele e isto não deve ser negligenciado. Aprenda as necessidades daqueles que o seguem e se algumas dessas necessidades precisarem de ser corrigidas, então faça-o por uma persuasão gentil e não por palavras duras."
                },
                {
                    id: 18,
                    sentence: "Trabalho sobre o que Se Deteriorou tem sublime sucesso. <br> É favorável atravessar a grande água. <br> Antes do ponto de partida, três dias, <br> depois do ponto de partida, três dias.",
                    general: "Os problemas do passado devem ser resolvidos de modo a que o futuro possa ser abordado com confiança.",
                    love: "Quaisquer diferenças de opinião com o seu parceiro devem ser resolvidas neste momento.",
                    business: "Tire o tempo necessário para avaliar qualquer desmoronamento causado por problemas passados e lide com eles. Fazê-lo agora ajudará a evitar a estagnação no presente e no futuro.",
                    personal: "Maus hábitos e/ou fobias podem estar a atrasá-lo. Agora é o momento de os confrontar e superar.",
                    overview: "<b>Ku</b> tende a aparecer quando o progresso está a ser dificultado de alguma forma. Normalmente, isto deve-se a obstáculos ou problemas do passado que não foram resolvidos na altura e que, por isso, continuaram a destruir o seu progresso sem serem controlados.  <b>Ku</b> indica a necessidade de examinar as questões do passado sem culpa ou ressentimento e de lidar com elas para que o progresso futuro não seja impedido da mesma forma. Certifique-se de identificar a causa ou o ciclo destrutivo irá continuar."
                },
                {
                    id: 19,
                    sentence: "Aproximação tem sublime sucesso. <br> A perseverança é favorável. <br> Ao chegar o oitavo mês, haverá infortúnio.",
                    general: "Para progredir e progredir de forma estável é necessário aprender a reconhecer as oportunidades favoráveis.",
                    love: "Tire tempo para explorar as profundezas da sua relação e aprofundar a sua visão da mesma.",
                    business: "Este é um momento em que a expansão e o sucesso são possíveis.",
                    personal: "Ouça aqueles que têm mais sabedoria e experiência que você.",
                    overview: "<b>Lin</b> indica que você tem a oportunidade de ouvir e de aprender com aqueles com maior sabedoria ou experiência que tem. Esta oportunidade deve ser bem-vinda e aproveitada com gratidão. Como com tudo, as circunstâncias mudarão, é fundamental que as circunstâncias favoráveis atualmente apresentadas sejam aproveitadas ao máximo. É uma boa altura para olhar para quaisquer possíveis dificuldades futuras e tentar lidar com elas de forma preventiva. O sucesso neste momento deve ser partilhado com os que o rodeiam."
                },
                {
                    id: 20,
                    sentence: "Contemplação. <br> A ablução já foi realizada, mas ainda não a oferenda. <br> Confiantes, eles erguem o olhar para ele.",
                    general: "Permanecer atento a tudo o que o afecta e àqueles à sua volta irá ajudá-lo a compreender o seu papel no mundo.",
                    love: "Este pode ser um momento em que se sente isolado. Faça o esforço de sair para a comunidade.",
                    business: "Familiarize-se com as necessidades dos seus consumidores e clientes. Saia para a comunidade e encontre-se com eles.",
                    personal: "As viagens são uma boa forma de combater qualquer sentimento de isolamento.",
                    overview: "<b>Kuan</b> lembra-lhe que embora seja sempre sensato estar atento aos problemas, é possível ficar um pouco distante da realidade ao fazê-lo. Quando concentrado na exclusão de tudo o resto, existe o perigo de o espírito se tornar subnutrido. A percepção pode ser distorcida e os perigos passam despercebidos. O isolamento (meditativo ou não) deve ser sempre equilibrado, viajando para fora da comunidade. Avaliar o mundo tanto de longe como de perto permitirá uma avaliação precisa. Se este conselho não for seguido, verá apenas uma parte do quadro geral.",
                },
                {
                    id: 21,
                    sentence: "Morder tem sucesso. <br> É favorável administrar justiça.",
                    general: "Sem justiça a harmonia é inalcançável.",
                    love: "Não deixe que o tratamento injusto fique sem resposta. Defenda-se a si próprio.",
                    business: "Esteja atento às atividades criminosas que estejam a ser conduzidas contra os seus negócios.",
                    personal: "As insuficiências complexas podem ser resolvidas recebendo uma visão através da meditação.",
                    overview: "<b>Shih Ho</b> é todo sobre injustiça. Quando isso forma uma barreira entre os indivíduos e a comunidade, devem ser tomadas medidas para a erradicar firmemente. Não devem ser tomadas medidas de forma leviana ou resultará em mais desarmonia. As medidas tomadas devem ser escrupulosamente tomadas e só então serão eficazes. <b>Shih Ho</b> aparece frequentemente quando o crime é a causa raiz do problema, mas nem sempre. A injustiça pode sair por outras vias. Quer seja legal ou moral, o modelo de justiça utilizado deve ser honesto e honroso."
                },
                {
                    id: 22,
                    sentence: "A Graciosidade tem sucesso. <br> É favorável empreender algo em assuntos menores.",
                    general: "A valorização da beleza permitirá cultivar o seu gosto pela harmonia em todos os aspectos da sua vida.",
                    love: "A beleza é apenas uma casca profunda - não se deixe enganar pelas aparências superficiais. Olhe por baixo da superfície para ver o verdadeiro carácter de uma pessoa.",
                    business: "Se uma proposta de negócio parece demasiado boa para ser verdadeira, então provavelmente é. Certifique-se de que é exatamente o que parece ser.",
                    personal: "Realce a sua beleza interior.",
                    overview: "<b>Pi</b> consiste em observar a graça natural e permitir que essa observação o inspire a imitá-la na vida. <b>Pi</b> é também um aviso para não ser tomado pela beleza superficial ou pela aparência. Em vez disso, certifique-se de que o que está por baixo da superfície é mais duradouro. Negligenciar fazê-lo pode muito bem levar a erros de julgamento. Lembre-se, a beleza mais duradoura é vista com o coração. Não com os olhos."
                },
                {
                    id: 23,
                    sentence: "Desintegração. <br> Não é favorável ir a parte alguma.",
                    general: "Antes de iniciar uma nova atividade, deve esperar pelo colapso da antiga.",
                    love: "A sua relação atual ou um assunto dentro da sua relação deve ser abandonado.",
                    business: "A sua atual direção empresarial tornou-se difícil e deve ser revista no mínimo, ou abandonada se a revisão não for possível.",
                    personal: "Deve-se pensar seriamente em afastar-se de quaisquer situações que sejam problemáticas.",
                    overview: "<b>Po</b> é um lembrete de que não importa quão fortemente algo foi originalmente construído, acabará por se desintegrar com o tempo. Uma vez que as 'fundações' tenham sido minadas, só se mantém tenuamente unido. Uma tal situação já não vale a pena tentar salvar. Embora seja sempre difícil desistir de uma situação, não perca tempo na formulação de um novo plano e direção. O desastre implícito por <b>Po</b> não é a situação em si, mas o fracasso em reagir a ela e recuperar o seu equilíbrio e direção."
                },
                {
                    id: 24,
                    sentence: "Retorno. Sucesso. <br> Saída e entrada sem erro. <br> Amigos chegam sem culpa. <br> Para adiante e para tráz segue o caminho. <br> Ao sétimo dia vem o retorno. <br> É favorável ter aonde ir.",
                    general: "Os indicadores estão a progredir e a mostrar uma melhoria constante, então não há necessidade de os empurrar.",
                    love: "O amor será renovado na sua vida.",
                    business: "Os próximos meses irão mostrar uma melhoria constante do seu negócio.",
                    personal: "É uma boa época para planejar o futuro.",
                    overview: "<b>Fu</b> relaciona-se com uma melhoria gradual ao longo do tempo. é um progresso muito natural e irá ocorrer sem qualquer esforço da sua parte. Em alguns aspectos, o progresso é imparável. No entanto, não deve fazer qualquer tentativa para forçar a questão e apressá-la. Deixe-o seguir o seu próprio curso e tempo. Trate este novo começo com cuidado e não cometa o erro de lidar com ele de forma grosseira, tentando forçá-lo."
                },
                {
                    id: 25,
                    sentence: "Inocência. Supremo sucesso. <br> A perseverança é favorável. <br> Se o homem não é correto, terá infortúnio, e não será favorável empreender coisa alguma.",
                    general: "Para que funcione de forma eficaz, deve estar plenamente presente em cada momento.",
                    love: "É tempo de se divertir. Não porque você precisa, mas apenas porque você pode.",
                    business: "Verá que a abordagem simples funcionará melhor. Solte as questões complexas.",
                    personal: "Aproveite a vida.",
                    overview: "<b>Wu Wang</b> é sobre a inocência e a alegria infantil que lhe está associada. Pare de tentar impressionar os outros a fim de obter a sua aprovação. Em vez de se concentrar neste aspecto da vida que se centra num futuro imaginado, concentre-se e honre cada aspecto da vida ou do trabalho. Desta forma, permanecerá aberto e alerta. Embora o planeamento e o pensamento ainda sejam necessários, <b>Wu Wang</b> é um lembrete de que nunca é possível prever todas as contingências. Aprenda a reagir momento a momento em vez de desperdiçar demasiada energia em coisas que provavelmente nunca irão acontecer. Encontre o equilíbrio necessário entre a confiança infantil e a sabedoria da experiência."
                },
                {
                    id: 26,
                    sentence: "O Poder e Domar do Grande. <br> A perseverança é favorável. <br> Fazer refeições fora de casa traz boa fortuna. <br> É favorável cruzar a grande água.",
                    general: "A sabedoria e os recursos acumulados de uma forma diciplinada irão ajudá-lo em todos os esforços futuros.",
                    love: "A sua relação não se beneficiará sendo frívola ou impulsiva.",
                    business: "Seja disciplinado na sua abordagem e procure a sabedoria dos que têm mais experiência.",
                    personal: "Concentre-se na construção dos seus recursos e forças internos.",
                    overview: "<b>Ta Ch'u</b> é sobre a acumulação de recursos. Não se trata, contudo, de ser mesquinho e acumulador de bens. A sua riqueza deve ser posta a trabalhar para o benefício de todos. <b>Ta Ch'u</b> é também um lembrete de que há pessoas à sua volta com mais sabedoria e experiência e você não deve ter medo, ou encarar isto como um sinal de fraqueza, de procurar os seus conselhos. É também uma questão de moderação. Use os seus recursos mas use-os sabiamente para que possa tomar conta das pessoas à sua volta."
                },
                {
                    id: 27,
                    sentence: "As Bordas da Boca. <br> A perseverança traz boa fortuna. <br> Preste atenção à nutrição e àquilo que o homem procura para encher sua própia boca.",
                    general: "O discernimento espiritual é uma importante distinção física.",
                    love: "Escolha os seus pensamentos e palavras sabiamente na sua relação e lembre-se de ser tolerante.",
                    business: "Use as palavras certas e ajudará a sustentar e alimentar o seu negócio.",
                    personal: "Agora é uma boa época para limpar tudo o que não é digno na sua vida.",
                    overview: "<b>I</b> relaciona-se com a alimentação. Assim como os alimentos são utilizados para alimentar o corpo, I sugere que as palavras e as ideias sejam utilizadas da mesma forma. Adverte que, tal como no caso dos alimentos, as suas palavras devem ser escolhidas cuidadosamente. Tal como a comida má pode perturbá-lo a si ou àqueles que o cercam, as palavras más podem fazer o mesmo. Quando o corpo e o espírito estiverem ambos bem nutridos, então você será mais poderoso e eficaz."
                },
                {
                    id: 28,
                    sentence: "Preponderânia do Grande. <br> A viga-mestra cede a ponto de quebrar. <br> É favorável ter onde ir. <br> Sucesso.",
                    general: "Ficar alerta e depois intervir oportunamente ajudará a prevenir muitas dificuldades.",
                    love: "Um problema não resolvido pode exigir que abandone temporariamente a situação.",
                    business: "Poderá ter de se retirar de um empreendimento comercial difícil.",
                    personal: "Avalie as suas ambições para o futuro, libertando-se do presente.",
                    overview: "<b>Ta Kuo</b> é um grande aviso. Indica que uma situação atual ultrapassou o seu controle e isto pode significar a retirada total da situação. Se não o fizer, isso significará um desastre. Em alguns casos, a situação pode ainda ser capaz de ser resolvida, mas na maioria dos casos não o será. A destruição já está feita. Por mais perturbador que seja, é tempo de reduzir as suas perdas."
                },
                {
                    id: 29,
                    sentence: "O Abismal repetido. <br> Se você é sincero, terá o sucesso em seu coração e tudo o que fizer terá êxito.",
                    general: "Só quando você aprender com o perigo é que poderá superá-lo.",
                    love: "Não exagere na reação a uma situação. Certifique-se de não permitir que uma discussão se torne violenta ou depressiva. Evite explosões emocionais.",
                    business: "Este é um momento potencialmente perigoso para o seu negócio e uma cabeça calma será necessária para ajudar a resolver os problemas.",
                    personal: "Use a meditação para ajudar a encontrar soluções criativas para os seus problemas atuais.",
                    overview: "<b>K'an</b> é sobre o perigo e não é considerado de todo positivo. Qualquer situação que tenha potencial para causar danos de alguma forma deve ser cuidadosamente controlada, a fim de minimizar a destruição. Resistir ao pânico e ao desespero e olhar uma ameaça verbal ou escrita como uma ferramenta para aguçar a sua consciência. e prepará-lo para futuros encontros de sucesso. Não se renda a sentimentos ou desamparo, mas cultive antes a calma e uma perspectiva positiva. Pode adaptar-se até ao perigo, se tentar.",
                },
                {
                    id: 30,
                    sentence: "Aderir. <br> A perseverança é favorável. Ela traz o sucesso. <br> Cuidar da vaca traz boa fortuna.",
                    general: "Cuidar dos 'fogos' da sua mente e do seu espírito ajudará a iluminar o seu caminho.",
                    love: "Seja entusiasmado com o desenvolvimento do seu parceiro e não deixe de desfrutar deste tempo de inspiração.",
                    business: "O entusiasmo é a chave para encontrar soluções criativas para os problemas financeiros atuais.",
                    personal: "Aumente a sua criatividade pessoal, participando de atividades comunitárias.",
                    overview: "<b>Li</b> trata-se de cuidar dos seus 'fogos interiores' de uma forma apropriada. A chave para os ajudar a arder é alimentá-los constante e cuidadosamente. Trata-se de aprender como melhor alimentá-los e quanto combustível utilizar. Não se quer que se incendeie de forma incontrolável. Também não quer que se torne mais inteligente na ausência. O seu próprio entusiasmo e o dos outros pode ser mutuamente benéfico para todos os envolvidos."
                },
                {
                    id: 31,
                    sentence: "Influência. Sucesso. <br> A perseverança é favorável.<br> Tomar uma jovem em casamento traz boa fortuna.",
                    general: "O sucesso é garantido quando a atração é reforçada pelo respeito e apoio mútuo.",
                    love: "Se o seu parceiro tem qualidades comuns e complementares, então você está bem acompanhado.",
                    business: "Procure um parceiro ou uma parceria que complemente os seus próprios pontos fortes.",
                    personal: "Cultive respeito e honra para com aqueles que o cercam.",
                    overview: "<b>Hsien</b> tem a ver com a sua percepção daqueles que o rodeiam, quer sejam familiares, amigos ou parceiros de negócios. Será mais bem sucedido em qualquer área quando as qualidades que possui forem partilhadas e complementares. Se faltar um destes aspectos, a relação será prejudicada. Embora o <b>Hsien</b> apareça mais frequentemente para situações românticas, é também um lembrete de que as mesmas qualidades são necessárias em todos os aspectos da vida para que uma relação funcione."
                },
                {
                    id: 32,
                    sentence: "Duração. Sucesso. Nenhuma culpa. <br> A perseverança é favorável. <br> É aconselhável ter onde ir.",
                    general: "A verdadeira perseverança é um processo de constante renovação.",
                    love: "Para aprofundar o seu relacionamento, deve adaptar-se às mudanças à sua volta.",
                    business: "Será recompensado pelo esforço que investiu nos seus empreendimentos.",
                    personal: "Concentre-se na auto-renovação e procure evitar a inércia.",
                    overview: "<b>Heng</b> está a dizer-lhe que apenas a mudança é certamente constante na vida. Quando se cometem erros numa determinada estratégia, o mesmo erro é frequentemente repetido. Não mostra força de carácter formular a mesma estratégia (mesmo que tenha funcionado no passado). Pelo contrário, mostra uma fraqueza na sua recusa em adaptar-se e mudar. Haverá sempre obstáculos na vida. Alguns podem ser repetidos com frequência. Se uma estratégia que tenha funcionado várias vezes no passado não funcionar agora, então mude a sua estratégia. Trata-se também de inércia e complacência. Deve sempre concentrar-se na auto-renovação e não se tornar complacente. Evite a estagnação."
                },
                {
                    id: 33,
                    sentence: "A Retirada. Sucesso. <br> Em pequenas coisas a perseverança é favorável.",
                    general: "Não é uma admissão de derrota retirar-se de uma luta desigual.",
                    love: "Tome o tempo necessário para reforçar a sua posição ao considerar envolver-se numa luta com o seu parceiro.",
                    business: "Repense a sua posição e estratégia antes de reingressar nas negociações. Não se comprometa apenas porque é mais rápido fazê-lo.",
                    personal: "Não ignore as questões mas formule uma estratégia eficaz antes de tentar lidar com elas. Evite confrontos destrutivos.",
                    overview: "<b>Tun</b> tem tudo a ver com a retirada de confrontos destrutivos e diz-lhe que fazê-lo não é uma admissão de derrota - apenas que é a coisa mais sábia a fazer nas circunstâncias. No entanto, não lhe está a dizer para esquecer ou ignorar a situação. Em vez disso, aconselha-o a formular uma estratégia eficaz antes de reentrar no conflito e lidar com ele. Tun sinaliza que é tempo de um retiro temporário, não que seja tempo de fugir e esconder-se."
                },
                {
                    id: 34,
                    sentence: "O Poder do Grande. <br> A perseverança é favorável.",
                    general: "Para ganhar uma vantagem não só precisa aumentar as suas forças, mas também de acompanhá-la com uma ação responsável.",
                    love: "Encontrará outros com uma poderosa atração por você - use este poder com sabedoria.",
                    business: "Este é um momento favorável para os negócios, mas não tente ir longe. Assegure-se de que se protege a si próprio e às pessoas à sua volta.",
                    personal: "As questões problemáticas podem ser positivamente ultrapassadas se forem abordadas com honra e compaixão.",
                    overview: "<b>Ta Chuang</b> relaciona-se com a oportunidade de tirar partido da situação atual. Ao contrário de Tun, que insta a um retiro temporário, Ta Chuan insiste em aproveitá-lo ao máximo. Faz passar o aviso de que o excesso de confiança pode levar a uma derrocada. Não seja precipitado, planeje a sua estratégia com sabedoria e minimize a queda sempre que possível. Sentir-se capacitado é bom, mas não seja narcisista a esse respeito."
                },
                {
                    id: 35,
                    sentence: "Progresso: <br> O poderoso príncipe é honrado com grande número de cavalos. <br> Num só dia é recebido em audiência três vezes..",
                    general: "Uma vitória facilmente conquistada não deve ser tomada como certa ou tratada de forma leviana.",
                    love: "Não despreze o progresso fácil com a sua vida amorosa. Aprecie-o em vez disso.",
                    business: "Seja grato pelo seu sucesso atual.",
                    personal: "Reserve algum tempo para consolidar o seu sucesso e partilhá-lo com os que o rodeiam.",
                    overview: "<b>Chin</b> é tudo sobre o progresso. O progresso fácil e a sensação de insatisfação que por vezes pode surgir de tal progresso. <b>Chin</b> encoraja-o a adoptar a mesma atitude na vitória que adotaria na adversidade. Em ambas as situações, é necessário ter a cabeça nivelada. <b>Chin</b> adverte também que não deve tentar tirar partido de uma vitória fácil para ganho pessoal, mas deve partilhar o sucesso com outros."
                },
                {
                    id: 36,
                    sentence: "O Obscurecimento da Luz. <br> Durante a adversidade é favorável manter-se perseverante.",
                    general: "Esconder a sua luz quando há perigo é uma forma eficaz de evitar ser detectado.",
                    love: "Afaste-se da questão e não revele as suas verdadeiras quedas.",
                    business: "Esta não é uma boa ocasião para iniciar quaisquer novos empreendimentos.",
                    personal: "Utilize este tempo para trabalhar nas suas forças interiores até que as obstruções atuais sejam ultrapassadas.",
                    overview: "<b>Ming I</b> é sobre a cautela e a necessidade de manter um perfil baixo. É mais difícil viajar de noite do que de dia. Mas também é mais fácil de ser encontrado se mostrar a sua luz. Não tente fazer mais progressos neste momento. Agora não é o momento de lançar um desafio ou de enfrentar alguém. Mantenha-se discreto e aguarde o seu tempo enquanto reforça os seus recursos."
                },
                {
                    id: 37,
                    sentence: "A Família. A perseverança da mulher é favorável.",
                    general: "Uma comunicação aberta e respeitosa é a chave para fazer uma equipe trabalhar com sucesso.",
                    love: "A comunicação deve ser sincera para beneficiar a sua relação.",
                    business: "Evite mal-entendidos dentro do seu negócio, garantindo que cada indivíduo compreenda totalmente o seu papel.",
                    personal: "Certifique-se de que se comunica clara e eficazmente com aqueles que são importantes na sua vida.",
                    overview: "<b>Chia Jen</b> é muito sobre comunicação e a sua eficácia dentro de uma equipa de qualquer tipo. Se não comunicar claramente com os que o rodeiam, corre o risco de mal-entendidos, o que pode dificultar o seu progresso. Qualquer que seja o nível em que esta comunicação se processe, é necessário certificar-se de que é respeitoso, sincero, e muito claro no que quer dizer."
                },
                {
                    id: 38,
                    sentence: "Oposição. Em pequenas coisas, boa fortuna.",
                    general: "A reconciliação deve ser uma prioridade chave se houver desunião.",
                    love: "Seja tão cuidadoso quanto necessário para ultrapassar uma questão potencialmente divisória.",
                    business: "Pode descobrir que a falta de comunicação, ou a recusa em comunicar, está a causar um período de estagnação. Terá de remediar esta situação antes que seja possível um maior progresso.",
                    personal: "Será necessário aprender a respeitar o seu inimigo para resolver qualquer crise em que se encontre atualmente.",
                    overview: "<b>K'uei</b> é sobre comunicação. Ou a falta dela. Ser teimoso ou indiferente a uma situação e não falar sobre ela conduzirá a um impasse no progresso. <b>K'uei</b> diz-lhe que a única forma de avançar é através de uma comunicação e reconciliação eficazes. Poderá ser necessário uma diplomacia extrema e, se assim for, este é o curso que deve adotar. Deve aprender a ignorar a emoção neste momento, por pior que os outros estejam a se comportar. Não se deixe provocar e responder com raiva. Será um erro e perderá a sua credibilidade. O seu comportamento tem de ser exemplar."
                },
                {
                    id: 39,
                    sentence: "Obstrução. O sudoeste é favorável. <br> O nordeste não é favorável. <br> É favorável ver o grande homem. <br> A perseverança traz boa fortuna.",
                    general: "Se o progresso exterior é atualmente impossível, então concentre-se no cultivo das suas forças interiores.",
                    love: "Será necessário se voltar ao interior para procurar pistas de como construir uma relação se o amor se tiver tornado azedo.",
                    business: "Não culpe os outros por problemas comerciais atuais.  Em vez disso, consulte-os para ideias e apoio na superação das questões.",
                    personal: "Isto é apenas um contratempo temporário. Não comece a sentir pena de si próprio. Não é construtivo.",
                    overview: "<b>Chien</b> tem a ver com obstruções ao progresso. Embora os problemas possam parecer intransponíveis, não são. Embora a ajuda externa possa eventualmente manifestar-se, é necessário usar este tempo para reunir as suas forças e usar a ajuda dos que o rodeiam para tentar resolver os problemas. Trabalhar na resolução de quaisquer falhas ou fraquezas internas. Não se deixe frustrar. Isto é apenas um contratempo temporário. Assim que estes obstáculos tiverem passado, deverá começar a avançar novamente. Mas faça-o com cautela até ter a certeza de que todo o perigo já passou."
                },
                {
                    id: 40,
                    sentence: "Liberação. O sudoeste é favorável. <br> Quando não resta nada a que se deva ir, o regresso traz boa fortuna. <br> Se ainda há algo a que se deva ir, apressar-se traz boa fortuna.",
                    general: "Livre-se de qualquer carga que possa estar a transportar. A amargura, o ressentimento e a recriminação apenas o atrasarão.",
                    love: "Não permita que a culpa e/ou recriminações se interponham no caminho da sua relação com o seu parceiro.",
                    business: "Este é um momento para dar passos muito pequenos para a frente.",
                    personal: "As questões do passado devem ser liberadas para que se possa começar a progredir novamente.",
                    overview: "<b>Hisieh</b> é sobre começar a progredir uma vez mais. As dificuldades recentes deixaram-no num estado enfraquecido e é necessário um período de convalescença. Se um atleta torce um tornozelo na segunda-feira, então seria um erro tentar correr uma maratona na terça-feira.  Adapte-se às suas novas circunstâncias e assegure-se de que os seus problemas e queixas do passado sejam liberados. Quer estes tenham sido auto-infligidos ou culpa de outros - deixe-os ir. Só então poderá começar a dar os pequenos passos necessários para progredir uma vez mais."
                },
                {
                    id: 41,
                    sentence: "Diminuição unida à veracidade promove suprema boa fortuna, livre de culpa. <br> Nisso se pode perseverar. <br> É favorável empreender algo. <br> Como leva-lo a cabo? <br> Podem-se utilizar duas pequenas tigelas para o sacrifício.",
                    general: "Certifique-se de que utiliza os seus recursos adequadamente repartidos ou então haverá instabilidade.",
                    love: "Volte ao básico e concentre-se na nutrição e no fortalecimento da sua relação.",
                    business: "Dirija os seus recursos apenas para operações fundamentais. Seja moderado com o seu dinheiro.",
                    personal: "Dirija a sua energia ou finanças apenas para preocupações básicas e não seja impaciente ou ressentido por ter de o fazer.",
                    overview: "Sun é sobre a partilha de riqueza e recursos. Se forem partilhados de forma desigual, pode resultar em instabilidade. Sun mostra-lhe que há necessidade de equilibrar esta situação e que este é um momento para ser moderado e auto-diciplinado. Também adverte que isto levará tempo e por isso será necessária paciência."
                },
                {
                    id: 42,
                    sentence: "Aumento. É favorável empreender algo. <br> É favorável atravessar a grande água.",
                    general: "Quando acompanhada de generosidade, a abundância perdurará.",
                    love: "Não seja mesquinho ao partilhar o seu amor com o seu parceiro.",
                    business: "Este é um momento para promover o seu negócio e para recompensar generosamente a sua equipe.",
                    personal: "Aproveite a oportunidade para ajudar os outros e alcançará grande sucesso",
                    overview: "Enquanto que Sun se relaciona com a desigualdade e a necessidade de a corrigir, <b>I</b> é o oposto e relaciona-se com o tempo em que as desigualdades foram corrigidas. Para os membros mais ricos da sociedade, isto pode inicialmente significar uma perda, mas a longo prazo eles irão colher os benefícios de uma comunidade reforçada. <b>I</b> diz que este é um momento de oportunidades e que se deve aproveitar. E aproveitar rapidamente, pois nenhuma situação é permanente."
                },
                {
                    id: 43,
                    sentence: "Irromper. <br> Deve-se dar a conhecer o assunto na corte do rei com determinação. <br> Deve ser exposto com veracidade. Perigo. <br> É preciso notificar sua própia cidade. <br> Não é favorável recorrer às armas. <br> É favorável empreender algo.",
                    general: "Quando os inescrupulosos revelarem a sua fraqueza, esteja preparado para agir.",
                    love: "Este é um momento em que ocorrerá um avanço na sua relação. Não se esqueça de o tratar respeitosamente.",
                    business: "Quando uma oportunidade se apresenta, certifique-se de utilizar estratégias positivas para alcançar o avanço de que necessita.",
                    personal: "Qualquer avanço a nível pessoal deve ser tratado de forma ética.",
                    overview: "<b>Kuai</b> tem a ver com oportunidades a serem oferecidas através da fraqueza dos outros e com a necessidade de estar pronto e preparado para agir. Uma vez que esta oportunidade tenha sido apresentada e tenha feito um avanço, deve imediatamente aproveitá-la. É importante para si não deixar que as forças negativas recuperem a vantagem. Kuai também traz um aviso para não recorrer às táticas dos seus adversários e é um lembrete de que o fim não justifica os meios. Substitua a negatividade por uma alternativa positiva.",

                },
                {
                    id: 44,
                    sentence: "Vir ao Encontro. A jovem é poderosa. <br> Não se deve desposa-la",
                    general: "As influências perniciosas devem ser resistidas no momento em que se toma consciência delas.",
                    love: "Não permita que influências nocivas afetem a sua relação.",
                    business: "Proteja o seu negócio da corrupção e de práticas antiéticas. Se não o fizer, o seu negócio será muito prejudicado.",
                    personal: "Pessoas inescrupulosas e imorais devem ser evitadas.",
                    overview: "<b>Kou</b> tem a ver com a facilidade com que a virtude pode ser subvertida e com a necessidade de impedir que isso aconteça. Embora as situações com que se depara possam não ter importância no início, se não se precaver contra elas, elas ganharão ímpeto e serão extremamente difíceis de lidar. Não subestime a rapidez com que isto pode acontecer. Se for tentado a encontrar-se com pessoas inescrupulosas, reconheça a sua própria parte neste erro e afaste-se da sua presença e da situação.",
                },
                {
                    id: 45,
                    sentence: "Reunião. Sucesso. <br> O rei se aproxima de seu templo. <br> É favorável ver o grande homem. <br> Isso traz sucesso. A perseverança é favorável. <br> Oferecer grandes sacrifícios traz boa fortuna. <br> É favorável empreender algo.",
                    general: "A harmonia social é um pré-requisito para tempos prósperos.",
                    love: "Se ambos trabalharem para um objetivo comum, então a sua relação irá prosperar.",
                    business: "Os grandes projetos precisam de ser tratados com cuidado e respeito.",
                    personal: "Se estiver envolvido em qualquer projeto que inclua um grande grupo, deve concentrar-se num objetivo comum.",
                    overview: "O I Ching fala frequentemente sobre o poder do grupo e é com isto que <b>Ts'ui</b> se relaciona. Embora grandes coisas possam ser alcançadas quando todos se concentram num objetivo comum, <b>Ts'ui</b> é um lembrete de que haverá sempre alguns que não se interessam pelo bem comum. A arrogância e a ignorância significam que estas pessoas farão as suas orações sobre aqueles que as rodeiam. <b>Ts'ui</b> adverte que um líder em tempos como estes deve estar sempre vigilante e fazer uso da antecipação para que os aspectos mais fracos possam ser controlados."
                },
                {
                    id: 46,
                    sentence: "A Ascensão tem sublime sucesso. <br> É preciso ver o grande homem. Não tema!. <br> A partida rumo ao sul traz boa fortuna.",
                    general: "Tudo deve acontecer no seu próprio tempo, na sua própria velocidade.",
                    love: "A paciência e a tranquila nutrição irão ajudar a seu relacionamento a prosperar.",
                    business: "Foque no sucesso do seu negócio para ajudar a obter as recompensas antecipadas.",
                    personal: "Continue a trabalhar nos seus planos e mantenha a confiança no seu sucesso.",
                    overview: "<b>Chêng</b> é sobre paciência e confiança. É uma fase em que não se pode acelerar as coisas - elas irão acontecer à sua própria velocidade. Este é um momento de desenvolvimento natural. Seja paciente e o crescimento que se espera irá acontecer. O crescimento está assegurado, por isso seja paciente e deixe as coisas acontecerem como elas devem. Não continue a interferir com o que é um progresso muito natural."
                },
                {
                    id: 47,
                    sentence: "Opressão. Sucesso. Perseverança <br> O grande homem promove a boa fortuna. Nenhuma culpa. <br> Quando ele tem algo a dizer, não lhe dão crédito.",
                    general: "O seu bem mais valioso será um sentido de propósito.",
                    love: "Tome o tempo necessário para ajudar a renovar a sua relação em vez de desesperar por ela.",
                    business: "Este não é um momento para tomar decisões empresariais importantes.",
                    personal: "Deve concentrar-se no descanso e na recuperação.",
                    overview: "<b>K'un</b> aparece quando os tempos são difíceis no que diz respeito aos seus esforços. É um momento particularmente perigoso, pois corre o risco de cair em desespero ou de ficar deprimido, por mais que anseie pelo sucesso. Isto pode acontecer em qualquer altura e como as questões são difíceis de tratar em tal altura, <b>K'un</b> recomenda que, em tempos futuros como este, esteja preparado para com bastante antecedência. Desta vez é preciso perceber que o que está a acontecer não é mais do que uma condição temporária e deve tratá-la como um período de descanso e recuperação. Cuide do seu corpo e da sua mente - uma atitude positiva é uma necessidade. A força e o propósito voltarão e a sua visão da vida será renovada."
                },
                {
                    id: 48,
                    sentence: "O Poço. <br> Pode-se mudar uma cidade, mas não se pode mudar um poço. <br> Este não diminui nem aumenta. <br> Eles vão e vem, recolhendo do poço. <br> Qunado se chega próximo ao nível da água mas a corda não vai até o fundo ou o balde se quebra, isso traz infortúnio.",
                    general: "Ainda que os tempos mudem, o espírito tem necessidades constantes.",
                    love: "Alimente a alma para ajudar a sustentar a sua relação.",
                    business: "As necessidades básicas e constantes da humanidade devem ser consideradas.",
                    personal: "Assegure-se de que as suas necessidades básicas estão bem atendidas e que alimenta o seu espírito.",
                    overview: "<b>Ching</b> é um lembrete de que mesmo que tudo à nossa volta esteja constantemente a mudar, a alma precisa de ser constantemente nutrida e esta necessidade não muda. É o momento de assegurar que a alimentação necessária para o corpo, mente e alma permanece disponível e intacta. <b>Ching</b> enfatiza também que tem a responsabilidade de ajudar a fornecer este alimento para aqueles que não o podem fornecer para si próprios."
                },
                {
                    id: 49,
                    sentence: "Revolução. Em seu dia própio, <br> Você verá que lhe darão crédito. <br> Supremo sucesso, propiciado pela perseverança. <br> O arrependimento desaparece.",
                    general: "Só quando justificado pela necessidade e pela intenção clara deve ser realizada uma mudança radical.",
                    love: "A sua relação pode precisar de uma mudança radical, mas primeiro deve planejar para todas as eventualidades.",
                    business: "O momento para a mudança radical deve ser escolhido sabiamente para potencializar os resultados.",
                    personal: "A meditação é a chave para aproveitar a oportunidade de uma autotransformação radical.",
                    overview: "<b>Ko</b> aparece na altura de uma potencial transformação radical. Embora rápida e decisiva, a ação é muitas vezes a melhor forma de o fazer, não necessariamente quando Ko aparece. O momento é crucial. Qualquer ação precisa de ser completamente desenvolvida e baseada em todas as bases sólidas. A ação só deve ser tomada quando for absolutamente necessária. Resista à tentação de agir impulsivamente, pois isso irá comprometer os seus esforços e muito possivelmente produzirá um efeito negativo.",
                },
                {
                    id: 50,
                    sentence: "O Caldeirão. <br> Suprema boa fortuna. <br> Sucesso.",
                    general: "A alimentação do corpo, mente e espírito é a chave para uma existência harmoniosa.",
                    love: "Desfrutar dos aspectos harmoniosos da sua relação ajudará a aprofundar os limites entre você e o seu parceiro.",
                    business: "Concentre-se nos negócios que irão transformar os seus assuntos e certifique-se de que lida com tudo de uma forma sofisticada.",
                    personal: "Fortaleça os limites entre si e aqueles que lhe são mais importantes, organizando uma refeição de algum tipo.",
                    overview: "<b>Ting</b> trata muito da satisfação das necessidades de uma comunidade para que esta exista harmoniosamente. Ao contrário de Ching, que lida com o básico, <b>Ting</b> é sobre os 'extras'. A partilha de uma refeição bem preparada é o ritual em todo o mundo para o cultivo dos limites entre as pessoas. Além de prover ao corpo <b>Ting</b> lembra que os 'extras' espirituais não devem ser negligenciados.",
                },
                {
                    id: 51,
                    sentence: "O Incitar traz sucesso. <br> O choque vem - oh, oh! <br> Expressões de riso - ha, ha! <br> O choque gera pavor num raio de cem milhas e ele não deixa cair a colher do cerimonial de sacrifício, nem o cálice.",
                    general: "Não se oponham à tempestade que é necessária para limpar o ar. É uma necessidade.",
                    love: "Examine o seu comportamento em relação a quaisquer hábitos destrutivos e esteja à altura do desafio de os erradicar.",
                    business: "Se o seu negócio estiver a enfrentar um obstáculo alarmante, terá de reforçar a sua determinação para prevalecer.",
                    personal: "Você se tornará uma pessoa mais forte ao aprender a enfrentar os seus medos.",
                    overview: "<b>Chên</b> tem a ver com o medo e aparece quando há necessidade de ser sacudido da comodidade. Encoraja-o a examinar todos os aspectos da vida e a ver onde existem falhas ou erros. e a tomar medidas para lidar com eles. Este exame deve ser abordado conscienciosamente, o que o ajudará a passar por este período uma pessoa mais forte e sábia, desde que não volte aos seus velhos hábitos. <b>Chên</b> diz-lhe como reagir a uma crise. Lembre-se, a coragem não é a ausência de medo, mas a determinação de o enfrentar."
                },
                {
                    id: 52,
                    sentence: "A Quietude. <br> Mantendo imóveis as costas, ele não mais sente seu corpo. <br> Ele se dirige ao pátio e não vê sua gente. <br> Nenhuma culpa.",
                    general: "Toda e qualquer ação eficaz deve nascer da tranquilidade.",
                    love: "Para ver claramente as coisas, é preciso deixar de lado o preconceito.",
                    business: "Esvazie a sua mente antes de tomar quaisquer decisões comerciais importantes.",
                    personal: "Aprenda a meditar para ajudar a alcançar uma mente tranquila.",
                    overview: "<b>Kên</b> lembra que se a sua mente estiver cheia de confusão, não será capaz de ter novos pensamentos e ideias. <b>Ken</b> aparece quando tem de fazer uma pausa e retirar-se do mundo por um momento, a fim de limpar o velho na sua mente para dar lugar ao novo. A meditação é a chave para este processo. Não é simplesmente um momento de descanso. Não é uma tarefa fácil libertar a sua mente das preocupações diárias, mas é necessário fazê-lo, para que possa ver e pensar com mais objetividade do que antes. Os pensamentos antigos impedem as suas ações, obrigando-o a cometer os mesmos erros. Limpa-os - não os permita que te prendam."
                },
                {
                    id: 53,
                    sentence: "Desenvolvimento. A jovem é dada em casamento. Boa fortuna. <br> A perseverança é favorável.",
                    general: "Só é possível aperfeiçoar cada detalhe do avanço quando o progresso é estável e paciente.",
                    love: "Aprofundar a sua relação é mais provável se fizer progressos estáveis e sem preocupações.",
                    business: "Deve reservar algum tempo para se concentrar nos grandes e pequenos detalhes do seu negócio.",
                    personal: "Concentre-se nos detalhes da sua vida de modo a apreciar a sua plenitude.",
                    overview: "<b>Chien</b> tem tudo a ver com paciência e com a necessidade de examinar as minúcias da vida. O progresso neste momento está assegurado, por isso não esteja ansioso se as coisas não estiverem a ir tão depressa como gostaria. Em vez disso, use este tempo como uma oportunidade para se certificar de que todas as suas bases estão cobertas. <b>Chien</b> diz-lhe que os pequenos detalhes da vida são muito importantes e que o progresso será lento e constante. Pode sobrevoar uma área numa questão de segundos, mas o homem que anda por essa área aprenderá muito mais. Passar tempo nos pormenores mais pequenos da vida trará, sem dúvida, recompensas no futuro.",
                },
                {
                    id: 54,
                    sentence: "A Jovem que se Casa <br> Empreendimentos trazem infortúnio. <br> Nada que seja favorável.",
                    general: "Um senso de perspectiva é a melhor maneira de curar a decepção.",
                    love: "Há uma diferença entre a paixão e o verdadeiro amor. Não confunda um com o outro.",
                    business: "Não tomar decisões empresariais de forma impetuosa.",
                    personal: "Se concentre no progresso lento e constante quando confrontado com uma situação difícil ou complexa.",
                    overview: "<b>Kuei Mei</b> é um dos hexagramas mais desafiadores do I Ching. Surge quando as advertências trazidas pelo hexagrama 53 (Chien) foram ignoradas. Este é um momento em que se pode muito bem ter ficado alienado dos que o rodeiam e que se perdeu todo o respeito por si. <b>Kuei Mei</b> traz um aviso muito forte de que quando uma ação impetuosa ou erros de julgamento resultaram nos maus momentos atuais, então seria um erro momentâneo agir impetuosamente mais uma vez. Grande diplomacia e progresso lento são os únicos remédios que serão eficazes. Evite a raiva, evite a pena de si próprio. Aproxime-se desta vez e dos tempos vindouros com coragem. Todas as coisas passam e este período não é exceção."
                },
                {
                    id: 55,
                    sentence: "A Abundância tem sucesso. <br> O rei atinge a abundância. <br> Não fique triste. Seja como o sol ao meio dia.",
                    general: "Assegure-se de se preparar para o futuro mesmo que esteja no auge do sucesso.",
                    love: "Aprecie e celebre o sucesso da sua relação.",
                    business: "Apesar de ser atualmente muito bem sucedido, certifique-se de fazer planos para o futuro.",
                    personal: "Este é um momento de muito sucesso para si. Tire o máximo proveito do seu sucesso para obter benefícios duradouros.",
                    overview: "<b>Fêng</b> aparece quando tudo é atualmente muito bem sucedido. É um lembrete que embora seja bom desfrutar deste período não se deve cometer o erro de pensar que este período vai durar para sempre. Tudo é transitório. O sucesso, tal como a adversidade, é igualmente transitório. Desfrute deste período da vida por todos os meios, mas faça planos para prever o futuro, quando os tempos podem não ser tão benéficos. A celebração é apropriada, mas cuidado para não tomar decisões tolas. Um grande sucesso é demasiado raro para ser tomado de forma leviana.",
                },
                {
                    id: 56,
                    sentence: "O Viajante. Sucesso através do que é pequeno. <br> A perseverança traz boa fortuna ao viajante.",
                    general: "Viajará melhor quando a viagem é uma busca e não uma viagem de férias ou uma fuga.",
                    love: "A viagem ajudará a proporcionar algo que falta na sua relação, desde que a viagem não seja usada como um meio de fuga.",
                    business: "As viagens são necessárias para ajudar a fornecer algo que falta no seu negócio. É um tempo táctico e diplomático.",
                    personal: "As viagens podem ser utilizadas como um meio de adquirir conhecimentos numa área que não tenha.",
                    overview: "<b>Lü</b> representa um momento da sua vida em que sente a necessidade de viajar. Há a sensação de que falta algo e agora é um bom momento para empreender uma busca para descobrir o quê. <b>Lü</b> é também um lembrete de que quando se desloca para um território desconhecido é sensato ser prudente e cortês. Só porque se faz as coisas de forma diferente dos outros, não significa que se esteja certo e eles estão errados. Esteja ciente das diferenças de costumes e comportamento e aja em conformidade. <b>Lü</b> não deve ser visto como um tempo para fazer uma viagem para fugir das dificuldades, mas como um tempo para ganhar conhecimento."
                },
                {
                    id: 57,
                    sentence: "A Suavidade. Sucesso através do que é pequeno <br> É favorável ter onde ir. <br> É favorável ver o grande homem.",
                    general: "Embora a mudança rápida possa ser efectuada pela força, a melhor forma de efectuar a mudança duradoura é através de uma persistência suave.",
                    love: "A melhor forma de desenvolver a confiança na sua relação é através de uma ação paciente, ponderada e profunda.",
                    business: "A persistência suave é de longe a melhor forma de promover os seus planos de negócios.",
                    personal: "A persistência suave é a chave para alcançar com sucesso os seus planos.",
                    overview: "<b>Sun</b> tem tudo a ver com a necessidade de ser persistente e suave nas suas ações. Isso não significa que os seus planos não serão bem sucedidos porque está a proceder suavemente em vez de forçadamente. A suavidade incessante, não a agressividade é a chave para o progresso e o sucesso. A persuasão e o nascimento da confiança serão muito mais duradouros do que as ameaças e a coerção. É o momento de permitir que os seus pensamentos e ideias penetrem nas mentes daqueles com quem está a lidar à sua própria velocidade. Seja suavemente persistente na sua abordagem e será bem sucedido. Adapte-se a cada situação e conforme necessário. Não confunda suavidade com docilidade e não permita que a suavidade se torne fraqueza."
                },
                {
                    id: 58,
                    sentence: "A Alegria. Sucesso. A perseveranca é favorável",
                    general: "Nada inspira mais o espírito humano do uma bênção.",
                    love: "Vai experimentar uma grande alegria no seu relacionamento.",
                    business: "Tudo é possível neste momento, por isso não tenha medo de aproveitar o seu sucesso.",
                    personal: "Desfrute da sensação de felicidade na sua vida e use-a como inspiração para avançar.",
                    overview: "<b>Tui</b> indica uma época de grande sucesso e o sentimento de felicidade que a acompanha. Ansiedade e discórdia são atualmente deixadas de lado e há uma sensação de que coisas grandiosas são possíveis. <b>Tui</b> relaciona o passado com este sentimento de bênção e mantém a promessa de que há mais para vir. No entanto, adverte que, embora a celebração seja necessária e adequada neste momento, não se deve deixar que isso se torne uma distração e o impeça de aproveitar o seu sucesso."
                },
                {
                    id: 59,
                    sentence: "Dispersão. Sucesso. <br> O rei aproxima-se de seu templo. <br> É favorável atravessar a grande água. <br> A perseverança é favorável.",
                    general: "Para avançar, será necessário eliminar as causas de desarmonia.",
                    love: "as barreiras na sua relação podem ser removidas através do reforço da comunicação.",
                    business: "A comunicação persistente é a chave para o progresso dentro do seu negócio.",
                    personal: "Deve avançar persistentemente em direção à unidade e integração para aliviar os seus preconceitos.",
                    overview: "<b>Huan</b> tem a ver com a remoção de barreiras que estão actualmente a atrasar qualquer progresso. Será necessário utilizar meios diferentes para ajudar a remover estes bloqueios. Pode não ser possível removê-los todos você mesmo. Pode ser que seja necessário um mediador externo. É necessária uma abordagem calma e persistente. Este é um momento em que é provável que haja algum dano causado pela remoção dos obstáculos e, em caso afirmativo, deverá tentar limitar os danos a áreas não diretamente relacionadas com a causa do conflito. A comunicação e a cooperação são as chaves do sucesso.",
                },
                {
                    id: 60,
                    sentence: "Limitação. Sucesso. <br> Não se deve perseverar ao se exercer uma limitação amarga.",
                    general: "Embora o seu potencial seja ilimitado, as suas habilidades não o são.",
                    love: "Não tente mover-se demasiado depressa na sua relação. Comece devagar e construa uma amizade forte e duradoura.",
                    business: "Este é um momento de qualidade e não de quantidade. Não exagere nos negócios.",
                    personal: "A felicidade a longo prazo é melhor alcançada lentamente.",
                    overview: "<b>Chieh</b> representa a necessidade na sua vida de ter limitações práticas. Enquanto que o seu potencial é ilimitado, a sua capacidade de expansão e de atingir esse potencial não é. Não se pode fazer muito mais do que isso. Só se pode progredir até certo ponto. Quando tenta fazer demasiado, está a ameaçar a sua existência e o seu sucesso. O crescimento ainda é possível, claro, e <b>Chieh</b> não indica que o crescimento irá parar - apenas que o seu crescimento não será exponencial. Com efeito, <b>Chieh</b> aconselha moderação. Gastar para além dos seus recursos, tentar expandir-se para além dos seus limites, não será favorável a uma felicidade futura a longo prazo. É importante compreender que, no entanto, para manter um equilíbrio. Metaforicamente falando, gastar pouco é tão mau quanto gastar muito."
                },
                {
                    id: 61,
                    sentence: "Verdade Interior. Porcos e peixes. Boa fortuna!. <br> É favorável atravessar a grande água. <br> A perseverança é favorável.",
                    general: "Para ter uma influência profunda nos outros é preciso ter uma profunda compreensão sobre eles.",
                    love: "Para que o seu parceiro possa confiar mais profundamente em você, deve dedicar algum tempo a compreendê-lo completamente.",
                    business: "Uma comunicação direta, honesta e sincera, beneficiará imensamente a sua parceria empresarial.",
                    personal: "É preciso cultivar uma compreensão profunda e compassiva das pessoas que afetam a sua vida.",
                    overview: "<b>Chung Fu</b> é  sobre  se comunicar e cooperar eficazmente com os que o rodeiam. Para o fazer e ser bem sucedido terá de dedicar algum tempo a compreender completamente a sua natureza. Preconceitos, prejulgamentos ou qualquer outro fator devem ser postos de lado ou a receptividade será diminuída. Uma vez que compreenda bem alguém, poderá trabalhar para ganhar a sua confiança. <b>Chung Fu</b> adverte, no entanto, que isto precisa ser para o seu benefício mútuo. A falta de atenção a esta necessidade de honestidade e sinceridade significará que qualquer progresso alcançado será desfeito."
                },
                {
                    id: 62,
                    sentence: "A Preponderânia do Pequeno. Sucesso <br> A perseverança é favorável. <br> Pequenas coisas podem ser realizadas, grandes coisas não devem ser feitas. <br> O pássaro, voando, traz a mensagem: não é aconselhável o esforço em direção ao alto, é aconselhável pemanecer em baixo. <br> Grande boa fortuna!",
                    general: "Uma acumulação de pequenas vitórias é a melhor forma de alcançar a grandeza neste momento.",
                    love: "Fortaleça o amor na sua relação, atendendo aos pequenos detalhes.",
                    business: "Os pequenos detalhes de um projeto precisam de ser focados para se alcançar um grande sucesso.",
                    personal: "O sucesso pessoal pode ser alcançado concentrando-se nos aspectos mais banais da vida.",
                    overview: "<b>Hsiao Kuo</b> aparece quando há o desejo de se tentar obter temporariamente um grande sucesso de uma só vez. Em vez disso, é preciso concentrar-se em muitos pequenos sucessos para alcançar o grande sucesso global. <b>Hsiao Kuo</b> tem tudo a ver com a força adquirida a partir dos aspectos mais pequenos da vida. Embora não seja um momento propício para projetos muito ambiciosos, isso não significa que não se possa fazer progressos. O progresso é mais do que possível, mas apenas dando um pequeno passo de cada vez."
                },
                {
                    id: 63,
                    sentence: "Após a Conclusão. Sucesso em pequenas coisas. A perseverança é favorável. <br> Ao começo, boa fortuna; ao final desordem.",
                    general: "Cada conquista traz novos desafios.",
                    love: "A sua relação avançará para uma fase mais profunda.",
                    business: "celebre as suas realizações, mas certifique-se de consolidar seu sucesso.",
                    personal: "Celebre o seu sucesso e faça planos para entrar numa nova fase da sua vida.",
                    overview: "<b>Chi Chi</b> relaciona-se com a conclusão bem sucedida e o que vem a seguir. É agora uma altura em que se alcançou um grande sucesso e se tem todo o direito de celebrar. <b>Chi Chi</b> lembra-lhe, no entanto, que todas as coisas mudam e que precisa de estar alerta para tudo o que possa prejudicar o seu sucesso atual. Evite tornar-se complacente, ou arrogante. Se quiser que o seu sucesso perdure, deve tomar imediatamente medidas para o consolidar. É importante que perceba que esta é a conclusão de um capítulo da sua vida. Um novo capítulo o espera.",
                },
                {
                    id: 64,
                    sentence: "Antes da Conclusão. Sucesso. <br> Porém se a pequena raposa quase ao completar a travessia, <br> deixa sua cauda cair na água, nada será favorável.",
                    general: "Terá de estar especialmente vigilante nos últimos metros para alcançar sucesso.",
                    love: "Se deseja atingir o seu objetivo dentro da sua relação, não se deve deixar distrair.",
                    business: "Concentre-se em alcançar os seus objetivos empresariais e não se deixe distrair.",
                    personal: "Não permitir que o orgulho ou a impaciência se interponham no caminho do sucesso que está tão próximo.",
                    overview: "<b>Wei Chi</b> relaciona-se com esse tipo de período de tempo que precede o sucesso. Quando a vitória está à vista, é fácil tomá-la como certa e não se concentrar nos seus objectivos. O fim de um capítulo da sua vida aproxima-se e este é um momento especialmente perigoso, em que tudo o que alcançou pode ser desfeito por desatenção. <b>Wei Chi</b> é exatamente como o velho ditado 'não contem as vossas galinhas antes de nascerem'. Mantenha-se atento ao perigo e concentre-se nas tarefas que tem em mãos. Desta forma, a Wei Chi indicará uma conclusão bem sucedida."
                }
            ]
        }
    </script>
    <script id="hexagram-js">
        class Hexagram {

            constructor(root) {
                this.root = document.querySelector(root)

            }

            title = "";
            name = "";
            chineseTitle = "";
            number = null;
            charactere = "";
            upperTrigram = "";
            bottomTrigram = "";
            lines = [
                true,
                true,
                true,
                false,
                true,
                false
            ];

            lineAreas = null;

            update() {
                this.setInfo()
                if (canPlay) {
                    if (document.querySelector('.hexagramNumber1').innerHTML != this.number) {
                        document.querySelector('.hexagramNumber1').classList.add('fade');
                    }
                    if (document.querySelector('.hexagramNumber2').innerHTML != this.number) {
                        document.querySelector('.hexagramNumber2').classList.add('fade');
                    }
                    if (document.querySelector('.chineseTitle1').innerHTML != this.chineseTitle) {
                        document.querySelector('.chineseTitle1').classList.add('fade');
                    }
                    if (document.querySelector('.chineseTitle2').innerHTML != this.chineseTitle) {
                        document.querySelector('.chineseTitle2').classList.add('fade');
                    }
                    if (document.querySelector('.hexagramTitle1').innerHTML != this.title) {
                        document.querySelector('.hexagramTitle1').classList.add('fade');
                    }
                    if (document.querySelector('.hexagramTitle2').innerHTML != this.title) {
                        document.querySelector('.hexagramTitle2').classList.add('fade');
                    }
                    if (document.querySelector('.charactere1').innerHTML != this.charactere) {
                        document.querySelector('.charactere1').classList.add('fade');
                    }
                    if (document.querySelector('.charactere2').innerHTML != this.charactere) {
                        document.querySelector('.charactere2').classList.add('fade');
                    }
                    if (document.querySelector('#info .ut1').innerHTML != this.upperTrigram) {
                        document.querySelector('#info .ut1').classList.add('fade');
                    }
                    if (document.querySelector('#info .ut2').innerHTML != this.upperTrigram) {
                        document.querySelector('#info .ut2').classList.add('fade');
                    }
                    if (document.querySelector('#info .bt1').innerHTML != this.bottomTrigram) {
                        document.querySelector('#info .bt1').classList.add('fade');
                    }
                    if (document.querySelector('#info .bt2').innerHTML != this.bottomTrigram) {
                        document.querySelector('#info .bt2').classList.add('fade');
                    }
                }

                // wait some time to set innerHTML of the elements with the attributes values
                setTimeout(() => {
                    document.querySelector('.hexagramNumber1').innerHTML = this.number;
                    document.querySelector('.hexagramNumber2').innerHTML = this.number;
                    document.querySelector('.chineseTitle1').innerHTML = this.chineseTitle;
                    document.querySelector('.chineseTitle2').innerHTML = this.chineseTitle;
                    document.querySelector('.hexagramTitle1').innerHTML = this.name;
                    document.querySelector('.hexagramTitle2').innerHTML = this.name;
                    document.querySelector('.charactere1').innerHTML = this.charactere;
                    document.querySelector('.charactere2').innerHTML = this.charactere;
                    document.querySelector('#info .ut1').innerHTML = this.upperTrigram;
                    document.querySelector('#info .bt1').innerHTML = this.bottomTrigram;
                    document.querySelector('#info .ut2').innerHTML = this.upperTrigram;
                    document.querySelector('#info .bt2').innerHTML = this.bottomTrigram;
                    // remove fade class
                    document.querySelector('#info .ut1').classList.remove('fade');
                    document.querySelector('#info .bt1').classList.remove('fade');
                    document.querySelector('#info .ut2').classList.remove('fade');
                    document.querySelector('#info .bt2').classList.remove('fade');

                    // remove fade class if is not consulting
                    if (isConsulting == false) {
                        document.querySelector('.chineseTitle1').classList.remove('fade');
                        document.querySelector('.chineseTitle2').classList.remove('fade');
                        document.querySelector('.hexagramTitle1').classList.remove('fade');
                        document.querySelector('.hexagramTitle2').classList.remove('fade');
                        document.querySelector('.charactere1').classList.remove('fade');
                        document.querySelector('.charactere2').classList.remove('fade');
                        document.querySelector('.hexagramNumber1').classList.remove('fade');
                        document.querySelector('.hexagramNumber2').classList.remove('fade');
                    }
                    // fill next and prev controllers
                    if (isConsulting) {
                        document.querySelector('.nextHexagram').innerHTML = ">";
                        document.querySelector('.prevHexagram').innerHTML = "<";
                    } else {
                        document.querySelector('.nextHexagram').innerHTML = this.name + "  >";
                        document.querySelector('.prevHexagram').innerHTML = "<  " + this.name;
                    }
                }, 950)
            }
            setInfo() {
                this.upperTrigram = this.getTrigram("upper");
                this.bottomTrigram = this.getTrigram("bottom");
                this.title = this.getHexagram();
                this.name = this.getHexagram('title');
                this.chineseTitle = this.getHexagram('chinese');
                this.charactere = this.getCharactere();
                this.number = this.getNumber();

            }

            getHexagram(value) {
                let title = ""
                this.upperTrigram = this.getTrigram("upper");
                this.bottomTrigram = this.getTrigram("bottom");

                pairs.forEach(p => {
                    if (this.upperTrigram == p[0] && this.bottomTrigram == p[1]) {
                        title = p[2]
                    }
                })

                let splitedTitle = title.split(" - ");

                if (value == "title") {
                    return splitedTitle[1];
                } else if (value == "chinese") {
                    return splitedTitle[0];
                }

                return title

            }

            getTrigram(position) {
                let lang = "{{ session('locale') }}"
                let upperTrigram = "";
                let bottomTrigram = "";
                let p1, p2, p3 = null
                if (position == "upper") {
                    p1 = 4;
                    p2 = 5;
                    p3 = 6;

                    if (this.lines[p1 - 1] == true && this.lines[p2 - 1] == true && this.lines[p3 - 1] == true) {
                        upperTrigram = (lang == "pt") ? ("céu") : ((lang == "en") ? ("heaven") : (""))
                    } else if (this.lines[p1 - 1] == false && this.lines[p2 - 1] == false && this.lines[p3 - 1] ==
                        false) {
                        upperTrigram = (lang == "pt") ? ("terra") : ((lang == "en") ? ("earth") : (""));
                    } else if (this.lines[p1 - 1] == true && this.lines[p2 - 1] == false && this.lines[p3 - 1] ==
                        false) {
                        upperTrigram = (lang == "pt") ? ("trovão") : ((lang == "en") ? ("thunder") : (""))
                    } else if (this.lines[p1 - 1] == false && this.lines[p2 - 1] == true && this.lines[p3 - 1] ==
                        false) {
                        upperTrigram = (lang == "pt") ? ("água") : ((lang == "en") ? ("water") : (""));
                    } else if (this.lines[p1 - 1] == false && this.lines[p2 - 1] == false && this.lines[p3 - 1] ==
                        true) {
                        upperTrigram = (lang == "pt") ? ("montanha") : ((lang == "en") ? ("mountain") : (""))
                    } else if (this.lines[p1 - 1] == false && this.lines[p2 - 1] == true && this.lines[p3 - 1] ==
                        true) {
                        upperTrigram = (lang == "pt") ? ("madeira") : ((lang == "en") ? ("wind") : (""));
                    } else if (this.lines[p1 - 1] == true && this.lines[p2 - 1] == false && this.lines[p3 - 1] ==
                        true) {
                        upperTrigram = (lang == "pt") ? ("fogo") : ((lang == "en") ? ("fire") : (""));
                    } else if (this.lines[p1 - 1] == true && this.lines[p2 - 1] == true && this.lines[p3 - 1] ==
                        false) {
                        upperTrigram = (lang == "pt") ? ("lago") : ((lang == "en") ? ("lake") : (""));
                    } else {
                        upperTrigram = '???'
                    }
                    this.upperTrigram = upperTrigram;
                    return this.upperTrigram;
                } else if (position == "bottom") {

                    p1 = 1;
                    p2 = 2;
                    p3 = 3;

                    if (this.lines[p1 - 1] == true && this.lines[p2 - 1] == true && this.lines[p3 - 1] == true) {
                        bottomTrigram = (lang == "pt") ? ("céu") : ((lang == "en") ? ("heaven") : (""))
                    } else if (this.lines[p1 - 1] == false && this.lines[p2 - 1] == false && this.lines[p3 - 1] ==
                        false) {
                        bottomTrigram = (lang == "pt") ? ("terra") : ((lang == "en") ? ("earth") : (""))
                    } else if (this.lines[p1 - 1] == true && this.lines[p2 - 1] == false && this.lines[p3 - 1] ==
                        false) {
                        bottomTrigram = (lang == "pt") ? ("trovão") : ((lang == "en") ? ("thunder") : (""))
                    } else if (this.lines[p1 - 1] == false && this.lines[p2 - 1] == true && this.lines[p3 - 1] ==
                        false) {
                        bottomTrigram = (lang == "pt") ? ("água") : ((lang == "en") ? ("water") : (""))
                    } else if (this.lines[p1 - 1] == false && this.lines[p2 - 1] == false && this.lines[p3 - 1] ==
                        true) {
                        bottomTrigram = (lang == "pt") ? ("montanha") : ((lang == "en") ? ("mountain") : (""));
                    } else if (this.lines[p1 - 1] == false && this.lines[p2 - 1] == true && this.lines[p3 - 1] ==
                        true) {
                        bottomTrigram = (lang == "pt") ? ("madeira") : ((lang == "en") ? ("wind") : (""))
                    } else if (this.lines[p1 - 1] == true && this.lines[p2 - 1] == false && this.lines[p3 - 1] ==
                        true) {
                        bottomTrigram = (lang == "pt") ? ("fogo") : ((lang == "en") ? ("fire") : (""))
                    } else if (this.lines[p1 - 1] == true && this.lines[p2 - 1] == true && this.lines[p3 - 1] ==
                        false) {
                        bottomTrigram = (lang == "pt") ? ("lago") : ((lang == "en") ? ("lake") : (""))
                    } else {
                        bottomTrigram = '???'
                    }

                    this.bottomTrigram = bottomTrigram;
                    return this.bottomTrigram;
                }
            }

            getCharactere() {
                let charactere = "";
                pairs.forEach(p => {
                    if (this.title == p[2]) {
                        charactere = p[3]
                    }
                })
                this.charactere = charactere;
                return charactere;
            }

            getNumber() {
                let number = 0;
                pairs.forEach(p => {
                    if (this.title == p[2]) {
                        number = p[4]
                    }
                })
                this.number = number;
                return number;
            }

            changeLine(pos) {
                // verify if is not consulting
                if (!isConsulting) {
                    // change the line only in one hexagram or in both
                    if (changeSelector.checked === true) {
                        if (this.lines[pos] == true) {
                            this.lines[pos] = false;
                        } else {
                            this.lines[pos] = true;
                        }
                    } else {
                        for (let i = 0; i < 2; i++) {
                            if (hexagrams[i].lines[pos] == true) {
                                hexagrams[i].lines[pos] = false;
                            } else {
                                hexagrams[i].lines[pos] = true;
                            }
                        }
                    }
                }
                this.draw();
                setControlls();
            }
        }

        const firstHexagram = new Hexagram("firstHexagram");
        const secondHexagram = new Hexagram("secondHexagram");
        const hexagrams = [firstHexagram, secondHexagram];
        firstHexagram.setInfo()
        secondHexagram.setInfo()
    </script>
    <script id="main-js">

        window.onload = function() {
            document.querySelector('.frame').style.visibility = 'visible';
            document.querySelector('.buttonsArea').style.visibility = 'visible'
            document.querySelector('.hintMessage').style.visibility = 'visible';
            document.querySelector('.hintMessage').style.visibility = 'visible';
            document.querySelector('.consultArea .btn').style.visibility = 'visible';

            if(sessionStorage.getItem("data")) {
                loadConsultation()
            }
        };

        let yinyangDuration = 4000;
        let hasTwoHexagrams = false;
        let currentHexagram = 0;
        let canInvert = true;

        let clickPressed = false;
        let canChange = true;
        let firstClick = false;

        let isConsulting = false;
        let canPlay = true;

        let colorMode = false;
        let upperColor = "";
        let bottomColor = "";

        const consultArea = document.querySelector(".consultArea");
        const slidesArea = document.querySelector(".slidesArea");
        const templateLines = document.querySelectorAll(".templateLine");
        const colorSelector = document.querySelector(".colorSelector");
        const changeSelector = document.querySelector("#changeSelector");

        const linesArea = document.querySelectorAll(".linesArea");
        const infoSpan = document.querySelectorAll("#info span");

        const saveConsultationButton = document.querySelector('.saveConsultationButton');

        let lang = "{{ session('locale') }}";

        let originalTextScreen = null;

        hexagrams[0].lineAreas = linesArea[0].querySelectorAll(".lineArea")
        hexagrams[1].lineAreas = linesArea[1].querySelectorAll(".lineArea")

        drawTemplate();
        updateHexagram();

        // Add click event on each line
        document.querySelectorAll('.lineArea').forEach(line => {

            line.addEventListener('click', (e) => {
                if (canPlay) {
                    lineChange(e);
                    colorize();
                }
            });

        });

        setControls();
        drawTemplate();

        function openOriginalText(event) {
            event.stopImmediatePropagation();
            if(hexagrams[0].getNumber() != null) {
                OriginalTextScreen.open("play");
                if(hasTwoHexagrams) {
                    OriginalTextScreen.write(hexagrams[0].getNumber(), hexagrams[1].getNumber(), movingLinesPositions);
                } else {
                    OriginalTextScreen.write(hexagrams[0].getNumber());
                }
            }
        }

        slidesArea.style.display = "block";

        // Function to change lines
        function lineChange(e) {
            // get hexagram index
            const index = e.currentTarget.parentElement.parentElement.getAttribute('data-index');
            // get line position
            const pos = e.currentTarget.getAttribute('data-pos') - 1;
            // verify if is not consulting
            if (canPlay) {
                // change the line only in one hexagram or in both
                if (changeSelector.checked === true) {
                    if (hexagrams[index].lines[pos] == true) {
                        hexagrams[index].lines[pos] = false;
                    } else {
                        hexagrams[index].lines[pos] = true;
                    }
                } else {
                    for (let i = 0; i < 2; i++) {
                        if (hexagrams[i].lines[pos] == true) {
                            hexagrams[i].lines[pos] = false;
                        } else {
                            hexagrams[i].lines[pos] = true;
                        }
                    }
                }
            }

            hexagrams[currentHexagram].update();
            setControls();
            drawTemplate();
            updateHexagram();
        }

         // Color mode function
        function colorize() {
            if(isConsulting == false) {
                const linesAreas = document.querySelectorAll('.linesArea')
                for (let i= 0; i < 2; i++) {
                    const lineArea = linesAreas[i];

                    if(colorMode) {
                        if(hexagrams[i].getTrigram("upper") == "heaven" | hexagrams[i].getTrigram("upper") == "céu") {
                            upperColor = 'blue';
                        } else if(hexagrams[i].getTrigram("upper") == "earth" | hexagrams[i].getTrigram("upper") == "terra") {
                            upperColor = 'gold';
                        } else if(hexagrams[i].getTrigram("upper") == "thunder" | hexagrams[i].getTrigram("upper") == "trovão") {
                            upperColor = 'forestgreen';
                        } else if(hexagrams[i].getTrigram("upper") == "water" | hexagrams[i].getTrigram("upper") == "água") {
                            upperColor = 'darkslategrey';
                        } else if(hexagrams[i].getTrigram("upper") == "wind" | hexagrams[i].getTrigram("upper") == "madeira") {
                            upperColor = 'orange';
                        } else if(hexagrams[i].getTrigram("upper") == "fire" | hexagrams[i].getTrigram("upper") == "fogo") {
                            upperColor = 'red';
                        } else if(hexagrams[i].getTrigram("upper") == "mountain" | hexagrams[i].getTrigram("upper") == "montanha") {
                            upperColor = 'violet';
                        } else if(hexagrams[i].getTrigram("upper") == "lake" | hexagrams[i].getTrigram("upper") == "lago") {
                            upperColor = 'turquoise';
                        }

                        if(hexagrams[i].getTrigram("bottom") == "heaven" | hexagrams[i].getTrigram("bottom") == "céu") {
                            bottomColor = 'blue';
                        } else if(hexagrams[i].getTrigram("bottom") == "earth" | hexagrams[i].getTrigram("bottom") == "terra") {
                            bottomColor = 'gold';
                        } else if(hexagrams[i].getTrigram("bottom") == "thunder" | hexagrams[i].getTrigram("bottom") == "trovão") {
                            bottomColor = 'forestgreen';
                        } else if(hexagrams[i].getTrigram("bottom") == "water" | hexagrams[i].getTrigram("bottom") == "água") {
                            bottomColor = 'darkslategrey';
                        } else if(hexagrams[i].getTrigram("bottom") == "wind" | hexagrams[i].getTrigram("bottom") == "madeira") {
                            bottomColor = 'orange';
                        } else if(hexagrams[i].getTrigram("bottom") == "fire" | hexagrams[i].getTrigram("bottom") == "fogo") {
                            bottomColor = 'red';
                        } else if(hexagrams[i].getTrigram("bottom") == "mountain" | hexagrams[i].getTrigram("bottom") == "montanha") {
                            bottomColor = 'violet';
                        } else if(hexagrams[i].getTrigram("bottom") == "lake" | hexagrams[i].getTrigram("bottom") == "lago") {
                            bottomColor = 'turquoise';
                        }

                        lineArea.querySelectorAll('.line').forEach(line => {
                            let position = line.parentElement.getAttribute("data-pos");
                            if(position < 4 ) {
                                line.style.backgroundColor = bottomColor;
                            }
                            if(position > 3 ) {
                                line.style.backgroundColor = upperColor;
                            }
                        })
                    } else {
                        for (let i = 0; i < 6; i ++) {
                            lineArea.querySelectorAll('.line').forEach(line => {
                                line.style.backgroundColor = "black";
                            })
                        }
                    }
                }
            }
        }

        // Function to update the hexagram
        function updateHexagram() {
            document.querySelectorAll('.lineArea').forEach(line => {
                // get hexagram index
                const index = line.parentElement.parentElement.getAttribute('data-index');
                // get line position
                const pos = (line.getAttribute('data-pos')) - 1;
                // insert yin or yang line HTML
                if (hexagrams[index].lines[pos] === true) {
                    line.innerHTML = `<div class="line"><span class="lineNumber">${pos + 1}</span></div>`
                } else {
                    line.innerHTML =
                        `<div class="line"><span class="lineNumber">${pos + 1}</span></div><div class="line"></div>`
                }
                // insert an empty line HTML if the value is null
                for (let i = 0; i < 2; i++) {
                    if (hexagrams[i].lines[pos] === null) {
                        line.innerHTML = '<div class="emptyLine">'
                    }
                }
            });
            const slidesArea = document.querySelector(".slidesArea");
            // verify if the lines are equals in both hexagrams
            if (JSON.stringify(hexagrams[0].lines) == JSON.stringify(hexagrams[1].lines)) {
                // remove smooth class and show only one hexagram
                slidesArea.classList.remove('smooth');
                if (currentHexagram == 0) {
                    slidesArea.style.marginLeft = "-36rem"
                    currentHexagram = 1;
                } else if (currentHexagram == 1) {
                    slidesArea.style.marginLeft = ".07rem";
                    currentHexagram = 0;
                }
                hasTwoHexagrams = false;
                // hide controlers
                document.querySelector('.prevHexagram').style.opacity = 0;
                document.querySelector('.nextHexagram').style.opacity = 0;
                changeSelector.checked = false;

            } else {
                hasTwoHexagrams = true;
            }
            if (hasTwoHexagrams) {
                // show next or prev control
                if (currentHexagram == 0) {
                    document.querySelector('.nextHexagram').style.opacity = 1;
                } else if (currentHexagram == 1) {
                    document.querySelector('.prevHexagram').style.opacity = 1;
                }
                // add smooth class
                slidesArea.classList.add('smooth');
            }

            getInfo();
            drawTemplate();
            colorize();
        }
        getInfo();
        OriginalTextScreen.write();
        // Function to fill values of the hexagrams attributes
        function getInfo() {
            setTimeout(() => {
                document.querySelector('.hexagramNumber1').innerHTML = hexagrams[0].getNumber();
                document.querySelector('.hexagramNumber2').innerHTML = hexagrams[1].getNumber();
                document.querySelector('.chineseTitle1').innerHTML = hexagrams[0].getHexagram('chinese');
                document.querySelector('.chineseTitle2').innerHTML = hexagrams[1].getHexagram('chinese');
                document.querySelector('.hexagramTitle1').innerHTML = hexagrams[0].getHexagram('title');
                document.querySelector('.hexagramTitle2').innerHTML = hexagrams[1].getHexagram('title');
                document.querySelector('.charactere1').innerHTML = hexagrams[0].getCharactere();
                document.querySelector('.charactere2').innerHTML = hexagrams[1].getCharactere();
                document.querySelector('#info .ut1').innerHTML = hexagrams[0].getTrigram("upper");
                document.querySelector('#info .bt1').innerHTML = hexagrams[0].getTrigram("bottom");
                document.querySelector('#info .ut2').innerHTML = hexagrams[1].getTrigram("upper");
                document.querySelector('#info .bt2').innerHTML = hexagrams[1].getTrigram("bottom");
                // remove fade class
                document.querySelector('#info .ut1').classList.remove('fade');
                document.querySelector('#info .bt1').classList.remove('fade');
                document.querySelector('#info .ut2').classList.remove('fade');
                document.querySelector('#info .bt2').classList.remove('fade');

                // remove fade class if is not consulting
                if (isConsulting == false) {
                    document.querySelector('.chineseTitle1').classList.remove('fade');
                    document.querySelector('.chineseTitle2').classList.remove('fade');
                    document.querySelector('.hexagramTitle1').classList.remove('fade');
                    document.querySelector('.hexagramTitle2').classList.remove('fade');
                    document.querySelector('.charactere1').classList.remove('fade');
                    document.querySelector('.charactere2').classList.remove('fade');
                    document.querySelector('.hexagramNumber1').classList.remove('fade');
                    document.querySelector('.hexagramNumber2').classList.remove('fade');
                } else {
                    document.querySelector('.hexagramNumber1').innerHTML = "";
                    document.querySelector('.hexagramNumber2').innerHTML = "";
                    document.querySelector('.chineseTitle1').innerHTML = "";
                    document.querySelector('.chineseTitle2').innerHTML = "";
                    document.querySelector('.hexagramTitle1').innerHTML = "";
                    document.querySelector('.hexagramTitle2').innerHTML = "";
                    document.querySelector('.charactere1').innerHTML = "";
                    document.querySelector('.charactere2').innerHTML = "";
                }
                // fill next and prev controllers
                if (isConsulting) {
                    document.querySelector('.nextHexagram').innerHTML = ">";
                    document.querySelector('.prevHexagram').innerHTML = "<";
                } else {
                    document.querySelector('.nextHexagram').innerHTML = hexagrams[1].getHexagram('title') + " >";
                    document.querySelector('.prevHexagram').innerHTML = "< " + hexagrams[0].getHexagram('title');
                }


            }, 950)
        }

        // INVERT FUNCTIONS
        const invertButtons = document.querySelectorAll(".invertButton");
        invertButtons[0].addEventListener("click", () => {
            if (canInvert) {
                invertLines();
                canInvert = false;
            }
        });
        invertButtons[1].addEventListener("click", () => {
            if (canInvert) {
                invertTrigrams();
                canInvert = false;
            }
        });
        invertButtons[2].addEventListener("click", () => {
            if (canInvert) {
                invertPositions();
                canInvert = false;
            }
        });

        // color button click
        colorSelector.addEventListener("click", () => {
            colorSelector.classList.toggle("selected");
            colorMode = !colorMode;
            colorize();
        })

        // Invert lines
        function invertLines() {
            let inversedLines1 = []
            let inversedLines2 = []


            if (canInvert == true) {
                if (changeSelector.checked === true) {
                    hexagrams[currentHexagram].lines.forEach(l => {
                        l = !l;
                        inversedLines1.push(l)
                    })

                    hexagrams[currentHexagram].lines = inversedLines1;

                } else {
                    hexagrams[0].lines.forEach(l => {
                        l = !l;
                        inversedLines1.push(l)
                    })

                    hexagrams[1].lines.forEach(l => {
                        l = !l;
                        inversedLines2.push(l)
                    })
                    hexagrams[0].lines = inversedLines1;
                    hexagrams[1].lines = inversedLines2;
                }
                YingYangShow();
                canInvert = false;

                hexagrams[0].setInfo();
                hexagrams[1].setInfo();
                hexagrams[currentHexagram].update();

                setTimeout(() => {
                    updateHexagram();
                    colorize();
                    canInvert = true;
                }, yinyangDuration)
            }
            canInvert = true;
            getInfo();
        }

        // Invert trigrams
        function invertTrigrams() {
            if (canInvert == true) {
                if (changeSelector.checked === true) {
                    hexagrams[currentHexagram].lines.push(hexagrams[currentHexagram].lines.shift());
                    hexagrams[currentHexagram].lines.push(hexagrams[currentHexagram].lines.shift());
                    hexagrams[currentHexagram].lines.push(hexagrams[currentHexagram].lines.shift());
                } else {
                    for (let i = 0; i < 2; i++) {
                        hexagrams[i].lines.push(hexagrams[i].lines.shift());
                        hexagrams[i].lines.push(hexagrams[i].lines.shift());
                        hexagrams[i].lines.push(hexagrams[i].lines.shift());
                    }
                }

                YingYangShow();
                canInvert = false;

                hexagrams[0].setInfo();
                hexagrams[1].setInfo();
                hexagrams[currentHexagram].update();

                setTimeout(() => {
                    updateHexagram();
                    colorize();
                    canInvert = true;
                }, (yinyangDuration / 2))
            }
        }

        // Invert positions
        function invertPositions() {
            if (canInvert == true) {

                if (changeSelector.checked === true) {
                    hexagrams[currentHexagram].lines.reverse();
                } else {
                    for (let i = 0; i < 2; i++) {
                        hexagrams[i].lines.reverse();
                    }
                }

                YingYangShow();
                canInvert = false;

                hexagrams[0].setInfo();
                hexagrams[1].setInfo();
                hexagrams[currentHexagram].update();

                setTimeout(() => {
                    updateHexagram();
                    colorize();
                    canInvert = true;
                }, yinyangDuration / 2)
            }
        }

        // CONTROL SETTINGS

        function YingYangShow() {

            if (currentHexagram == 0) {
                document.querySelector(".yinyangArea1").classList.add("show");
                setTimeout(() => {
                    document.querySelector(".yinyangArea1").classList.remove("show");
                }, yinyangDuration)
            } else if (currentHexagram == 1) {
                document.querySelector(".yinyangArea2").classList.add("show");
                setTimeout(() => {
                    document.querySelector(".yinyangArea2").classList.remove("show");
                }, yinyangDuration)
            }

        }


        document.querySelector(".nextHexagram").addEventListener("click", () => {
            slidesArea.style.marginLeft = "-36rem";
            currentHexagram = 1;
            document.querySelector('.about-button').style.opacity = "0";
            setControls();
            setTimeout(() => {
                document.querySelector('.about-button').style.opacity = "1";
            }, 1000);
        });

        document.querySelector(".prevHexagram").addEventListener("click", () => {
            slidesArea.style.marginLeft = ".07rem"
            currentHexagram = 0;
            document.querySelector('.about-button').style.opacity = "0";
            setControls();
            setTimeout(() => {
                document.querySelector('.about-button').style.opacity = "1";
            }, 1000);
        })

        function setControls() {
            if (hasTwoHexagrams) {
                if (currentHexagram == 0) {
                    document.querySelector('.prevHexagram').style.opacity = 0;
                    document.querySelector('.nextHexagram').style.opacity = 1;
                    hexagrams[0].setInfo();
                    hexagrams[1].setInfo();
                } else if (currentHexagram == 1) {
                    document.querySelector('.prevHexagram').style.opacity = 1;
                    document.querySelector('.nextHexagram').style.opacity = 0;
                    hexagrams[0].setInfo();
                    hexagrams[1].setInfo();
                }
            }
            updateHexagram();

        }

        function cutTitle(title) {
            let cuttedTitle = title.split(' - ');
            return cuttedTitle[1];
        }

        // Function to draw the template
        function drawTemplate() {

            for (let i = 0; i < templateLines.length; i++) {
                if (hexagrams[0].lines[i] == false && hexagrams[1].lines[i] == false) {
                    templateLines[i].innerHTML = '<img src="assets/images/yinLine.png">'
                }
                if (hexagrams[0].lines[i] == true && hexagrams[1].lines[i] == true) {
                    templateLines[i].innerHTML = '<img src="assets/images/yangLine.png">'
                }
                if (hexagrams[0].lines[i] == true && hexagrams[1].lines[i] == false) {
                    templateLines[i].innerHTML = '<img src="assets/images/oLine.png">'
                }
                if (hexagrams[0].lines[i] == false && hexagrams[1].lines[i] == true) {
                    templateLines[i].innerHTML = '<img src="assets/images/xLine.png">'
                }
            }
        }

        // Function to get the texts about the hexagrams and write on screen
        function getAbout() {
            // show about area
            aboutArea = document.querySelector(".about-area")
            aboutArea.style.visibility = "visible";

            // set variables as empty
            sentence = "";
            general = "";
            love = "";
            business = "";
            personal = "";
            overview = "";

            // select the source according to the current language
            aboutLang = [];
            if (lang == "en") {
                aboutLang = about.en;
            } else if (lang == "pt") {
                aboutLang = about.pt;
            }

            // fill the variables with the values of the object about
            aboutLang.forEach(a => {
                if (hexagrams[currentHexagram].number == a.id) {
                    sentence = a.sentence;
                    general = a.general;
                    love = a.love;
                    business = a.business;
                    personal = a.personal;
                    overview = a.overview;
                }
            })
            // write the texts on the screen
            document.querySelector("#aboutQuote").innerHTML = sentence;
            document.querySelector("#aboutTrigrams").innerHTML =
                `<p class="about-title">${(lang == "pt") ? ("Formado pelos Trigramas") : ((lang == "en") ? ("Formed by the trigrams") : (""))}:<span class="about-content "><span>${hexagrams[currentHexagram].upperTrigram + ` ${(lang == "pt") ? ("sobre") : ((lang == "en") ? ("over") : (""))} ` + hexagrams[currentHexagram].bottomTrigram}` +
                ".";
            document.querySelector("#aboutGeneral").innerHTML =
                `<p class="about-title">${(lang == "pt") ? ("Geral") : ((lang == "en") ? ("General") : (""))}:<span class="about-content darkText">${general}</span>`
            document.querySelector("#aboutLove").innerHTML =
                `<p class="about-title">${(lang == "pt") ? ("Amor") : ((lang == "en") ? ("Love") : (""))}:<span class="about-content">${love}</span>`
            document.querySelector("#aboutBusiness").innerHTML =
                `<p class="about-title">${(lang == "pt") ? ("Negócios") : ((lang == "en") ? ("Business") : (""))}:<span class="about-content darkText">${business}</span>`
            document.querySelector("#aboutPersonal").innerHTML =
                `<p class="about-title">${(lang == "pt") ? ("Pessoal") : ((lang == "en") ? ("General") : (""))}:<span class="about-content">${personal}</span>`
            document.querySelector("#aboutOverview").innerHTML =
                `<p class="about-title">${(lang == "pt") ? ("Visão geral") : ((lang == "en") ? ("Overview") : (""))}:<span class="about-content darkText">${overview}</span>`

            aboutArea.style.display = 'block';
            aboutArea.addEventListener('click', () => {
                aboutArea.style.visibility = 'hidden';
            });
        }
    </script>
    <script id="game-js">
        // Variables declaration
        let  question = "";

        let coins = document.querySelectorAll('.coin');
        let coinsResult = [null, null, null];
        let result = '';
        let playCount = 1;
        var coinsSound = new Audio("../../assets/sounds/coin.mp3");
        var successSound = new Audio("../../assets/sounds/success.mp3");
        let consultMessage = document.querySelector(".consultMessage");
        let consultResult = document.querySelectorAll(".consultResult");
        let movingLines = [];
        let movingLinesPositions = [];

        const hexagramHeaders = document.querySelectorAll('.hexagramHeader');

        function showQuestion() {
            if(lang == "en") {
                consultMessage.innerHTML = "What is your question?"
            } else if(lang == "pt") {
                consultMessage.innerHTML = "Sobre o que busca respostas?"
            }



            document.querySelector('.startArea').style.display = 'none';
            document.querySelector('.questionBar').style.visibility = 'hidden';
            document.querySelector('.questionArea').style.display = 'flex';
            document.querySelector('.conclusionArea').style.display = 'none';
            document.querySelector('.buttonsArea').style.visibility = 'hidden';
            document.querySelector('.consultLines').style.visibility = 'hidden';
            document.querySelector('.originalTextArea').style.display = "none";
            document.querySelector('.frameArea').classList.add('center');
            document.querySelector('.hint-area').style.display = "block";
            document.querySelector('.hintMessage').style.visibility = 'hidden';
            document.querySelector('#questionInput').value = "";
            document.querySelector('.messageArea').classList.remove('conclusion');
        }
        // Function to show game
        function showGame() {

            question = document.querySelector("#questionInput").value;

            document.querySelector('.questionDate').innerText = "";

            if(question.length == 0) {
                question = "..."
            }

            document.querySelector(".questionText").innerText = question;

            window.scrollTo(0, 0);

            // show and hide blocks
            document.querySelector('.consultArea').style.display = 'block';
            document.querySelector('.questionBar').style.visibility = 'visible';
            document.querySelector('.questionArea').style.display = 'none';
            document.querySelector(".about-area").style.visibility = 'hidden';
            document.querySelector('.hint-area').style.display = "none";
            document.querySelector('.gameArea').style.display = 'flex';
            document.querySelector('.startArea').style.display = 'none';
            document.querySelector('.conclusionArea').style.display = 'none';

            document.querySelector('.consultLines').style.visibility = 'hidden';
            document.querySelector(".about-button").style.display = 'none';
            // document.querySelector('.consultButton').style.visibility = 'hidden';
            // document.querySelector('.about-area').style.display = 'none';
            // document.querySelector('.about-button').style.display ='none';
            // document.querySelector('.hintArea').style.display ='none';
            // document.querySelector('.aboutIChing').style.display ='none';

            hexagramHeaders[0].style.opacity = 0;
            hexagramHeaders[1].style.opacity = 0;
            // clear template
            clearTemplate();
            isConsulting = true;
            canPlay = false;

            // set all lines null
            for (let i = 0; i < 2; i++) {
                hexagrams[i].lines = [null, null, null, null, null, null];
                updateHexagram();
            }
            // hide coins
            for (let i = 0; i < coins.length; i++) {
                coins[i].style.opacity = '0';
            }

            // change trigrams for quetion
            document.querySelector(".ut1").innerText = "???";
            document.querySelector(".bt1").innerText = "???";
            document.querySelector(".ut2").innerText = "???";
            document.querySelector(".bt2").innerText = "???";


            // set consult message in english or in portuguese

            if(lang == "en") {
                consultMessage.innerHTML = "<strong>Think about your question and flip the coins six times</strong> <div class='consultSentence'>Flip the coins to get the first line.</div>";
            } else if(lang == "pt") {
                consultMessage.innerHTML = "<strong>Concentre-se no que quer saber e jogue as moedas seis vezes</strong> <div class='consultSentence'>Jogue as moedas para tirar a primeira linha.</div>";
            }

            // document.querySelector(".conclusionArea").style.display = "none";
            // document.querySelector(".gameArea").style.display = "flex";
            playCount = 1;

            // set toss coin button message

            if(lang == "en") {
                document.querySelector('.coinsButton').innerText = "Toss coins";
            } else if(lang == "pt") {
                document.querySelector('.coinsButton').innerText = "Jogar moedas";
            }


            document.querySelectorAll('.lineArea').forEach(line => {
                line.classList.remove('active')
            })


        }

        // Function to flip the coins
        let lastClick = 0;

        function flipCoins() {
            let d = new Date();
            let t = d.getTime();
            // check click velocity
            if (t - lastClick > 400) {
                // reset sound time
                coinsSound.currentTime = 0;
                // set result as null
                coinsResult = [null, null, null];
                // set coins result with a random value zero or one
                coinsResult[0] = Math.random() < 0.5 ? 0 : 1;
                coinsResult[1] = Math.random() < 0.5 ? 0 : 1;
                coinsResult[2] = Math.random() < 0.5 ? 0 : 1;
                // set random coins positions
                marginRange = 25;
                leftM = [Math.floor(Math.random() * marginRange), Math.floor(Math.random() * marginRange), Math.floor(Math
                    .random() * marginRange)];
                rightM = [Math.floor(Math.random() * marginRange), Math.floor(Math.random() * marginRange), Math.floor(Math
                    .random() * marginRange)];
                topM = [Math.floor(Math.random() * marginRange), Math.floor(Math.random() * marginRange), Math.floor(Math
                    .random() * marginRange)];
                bottomM = [Math.floor(Math.random() * marginRange), Math.floor(Math.random() * marginRange), Math.floor(Math
                    .random() * marginRange)];

                angleValue = [(Math.floor(Math.random() * 361)), (Math.floor(Math.random() * 361)), (Math.floor(Math
                    .random() * 361))];

                // reset coins
                resetCoins();

                for (let i = 0; i < coins.length; i++) {
                    // change the side of the coins based on results
                    if (coinsResult[i] == 0) {
                        coins[i].classList.add('yin');
                        coins[i].style.transform = `rotate(${angleValue[i]}deg) rotateY(180deg)`;
                    } else {
                        coins[i].classList.add('yang');
                        coins[i].style.transform = `rotate(${angleValue[i]}deg)`;
                    }

                    // apply random margin on the coins
                    coins[i].style.marginLeft = `${leftM[i]}px`;
                    coins[i].style.marginRight = `${rightM[i]}px`;
                    coins[i].style.marginTop = `${topM[i]}px`;
                    coins[i].style.marginBottom = `${bottomM[i]}px`;

                }

                // verify count
                if (playCount <= 6) {
                    // consultMessage.innerHTML += "<div class='consultSentence'>Esvazie a mente.</div>";
                    let consultSentence = document.querySelector('.consultSentence')

                    // play the sound of coins when toss
                    if (playCount < 6) {
                        coinsSound.play();
                    }
                    // hide the coins
                    for (let i = 0; i < coins.length; i++) {
                        coins[i].style.opacity = '0';
                    }
                    // wait some time for show the coins
                    setTimeout(() => {
                        for (let i = 0; i < coins.length; i++) {
                            coins[i].style.opacity = '1';
                        }
                        getResult();
                        // increment the count
                        playCount++;
                    }, 400);
                    switch (playCount) {
                        case 1:
                            consultSentence.innerText = (lang == "en") ? "Breathe deeply!" : "Respire fundo!";
                            break;
                        case 2:
                            consultSentence.innerText = (lang == "en") ? "Empty your mind." : "Esvazie a mente.";
                            break;
                        case 3:
                            consultSentence.innerText = (lang == "en") ? "Focus on the void." : "Se concentre no vazio.";
                            break;
                        case 4:
                            consultSentence.innerText = (lang == "en") ? "Flip the coins to get the fifth line." : "Jogue as moedas para tirar a quinta linha.";
                            break;
                        case 5:
                            consultSentence.innerText = (lang == "en") ? "Flip the coins to the last line." : "Jogue as moedas para a última linha.";
                            break;
                        case 6:
                            consultSentence.innerText = (lang == "en") ? "Reveal the result!" : "Revele o resultado!";
                            break;
                    }
                } else {

                }
                // verify if count is equal 6
                if (playCount == 6) {
                    // wait some time for change the button text

                    setTimeout(() => {

                        if(lang == "en") {
                            document.querySelector('.coinsButton').innerText = "Reveal";;
                        } else if(lang == "pt") {
                            document.querySelector('.coinsButton').innerText = "Revelar";;
                        }



                    }, 700);



                } else {
                    // set button text

                    if(lang == "en") {
                        document.querySelector('.coinsButton').innerText = "Toss coins";;
                    } else if(lang == "pt") {
                        document.querySelector('.coinsButton').innerText = "Jogar moedas";
                    }

                }

                if (playCount >= 7) {
                    // play success sound
                    successSound.currentTime = 0;
                    successSound.play();
                    isConsulting = false;
                    hexagrams[currentHexagram].setInfo();
                    colorMode = false;
                    colorSelector.classList.remove("selected");
                    updateHexagram();

                    document.querySelector('.nextHexagram').innerHTML = ">";
                    document.querySelector('.prevHexagram').innerHTML = "<";

                    showResult();
                    //  document.querySelector(".gameArea").style.display = "none";


                    // document.querySelector('.hexagramTitle1').innerHTML = "";
                    // document.querySelector('.hexagramTitle2').innerHTML = "";
                    // document.querySelector('.charactere1').innerHTML = "";
                    // document.querySelector('.charactere2').innerHTML = "";

                    // remove fade class
                    document.querySelector('.hexagramTitle1').classList.remove('fade');
                    document.querySelector('.hexagramTitle2').classList.remove('fade');
                    document.querySelector('.charactere1').classList.remove('fade');
                    document.querySelector('.charactere2').classList.remove('fade');
                    document.querySelector('.hexagramNumber1').classList.remove('fade');
                    document.querySelector('.hexagramNumber2').classList.remove('fade');

                    // show the hexagrams titles on controllers
                    document.querySelector('.nextHexagram').innerHTML = cutTitle(hexagrams[1].getHexagram()) + "  >";
                    document.querySelector('.prevHexagram').innerHTML = "<  " + cutTitle(hexagrams[0].getHexagram());

                    // hide game area
                    // document.querySelector('.consultButton').style.visibility = 'hidden';
                    // show about button

                    document.querySelector('.about-button').style.display = 'block';


                }
                lastClick = t;
            }
        }

        // Function to get coins results
        function getResult() {
            // sum the number of coins results
            let resultSum = coinsResult.reduce((a, b) => a + b);
            // verify the sum and set the line result
            if (resultSum == 1) {
                result = 'yin';
            } else if (resultSum == 2) {
                result = 'yang';
            } else if (resultSum == 0) {
                result = 'o';
            } else if (resultSum == 3) {
                result = 'x';
            }
            // set the lines according to the result
            if (result == 'yang') {
                hexagrams[0].lines[playCount - 1] = true;
                hexagrams[1].lines[playCount - 1] = true;
            } else if ((result == 'yin')) {
                hexagrams[0].lines[playCount - 1] = false;
                hexagrams[1].lines[playCount - 1] = false;
            } else if ((result == 'x')) {
                hexagrams[0].lines[playCount - 1] = false;
                hexagrams[1].lines[playCount - 1] = true;
            } else if ((result == 'o')) {
                hexagrams[0].lines[playCount - 1] = true;
                hexagrams[1].lines[playCount - 1] = false;
            }

            updateHexagram();
            setControls();
        }

        // Function to reset the coins
        function resetCoins() {
            // remove yin or yang classes
            for (let i = 0; i < coins.length; i++) {
                if (coins[i].classList.contains('yin')) {
                    coins[i].classList.remove('yin')
                }
                if (coins[i].classList.contains('yang')) {
                    coins[i].classList.remove('yang')
                }
            }
        }

        // Function to show the rresult
        function showResult() {
            let hexagramResult = null;

                    if(lang == "en") {
                        document.querySelector('.coinsButton').innerText = "Toss coins";
                    } else if(lang == "pt") {
                        document.querySelector('.coinsButton').innerText = "Jogar moedas";
                    }

                    hexagrams[0].setInfo();
                    hexagrams[1].setInfo();

                    document.querySelector('.gameArea').style.display = 'none';
                    document.querySelector(".conclusionArea").style.display = "flex";
                    document.querySelector(".originalTextArea").style.display = "flex";

                    document.querySelector('.consultLines').style.visibility = 'visible';

                    document.querySelector('.messageArea').classList.add('conclusion');
                    document.querySelector('.saveConsultationButton').classList.remove('disabled');
                    @if(!auth()->check())
                        document.querySelector('.saveConsultationButton').classList.add('disabled');
                    @endif();

                    writeMovingLines();

                    hexagramHeaders[0].style.opacity = 1;
                    hexagramHeaders[1].style.opacity = 1;

                    consultButton = document.querySelectorAll(".consultButton");
                    // verify if has one or two hexagrams and change the message with the results in english or portuguese

                    if(lang == "en") {
                        consultResult[0].innerText =
                        `<strong>You received the hexagram: </strong> <em>${hexagrams[0].getHexagram()}</em>`;

                    } else if(lang == "pt") {
                        consultResult[0].innerText =
                        `<strong>Você tirou o hexagrama: </strong> <em>${hexagrams[0].getHexagram()}</em>`;
                    }


                    if (hasTwoHexagrams) {
                        if(lang == "en") {
                            consultResult[1].innerText =
                                `<strong>Related Hexagram: </strong> <em>${hexagrams[1].getHexagram()}</em>`;
                        } else if(lang == "pt") {
                            consultResult[1].innerText =
                                `<strong>Desdobramento: </strong> <em>${hexagrams[1].getHexagram()}</em>`;
                        }
                    } else {
                        if(lang == "en") {
                            consultResult[1].innerText = 'No unfolding.';
                        } else if(lang == "pt") {
                            consultResult[1].innerText = 'Sem desdobramento.';
                        }

                    }

                    consultMessage.innerHTML =
                        ` <span class="consultResult">${consultResult[0].innerText}</span><br><span class="consultResult">${consultResult[1].innerText}</span>`;

        }

        // Function to clear the template
        function clearTemplate() {
            // set all template lines as empty
            for (let i = 0; i < templateLines.length; i++) {
                templateLines[i].innerHTML = ''
            }
        }

        // Exit game function
        function exitGame() {
            // hide and show blocks
            consultMessage.innerHTML = "";
            canPlay = true;

            document.querySelectorAll('.lineArea').forEach(line => {
                line.classList.add('active')
            })

            document.querySelector('.questionDate').innerText = "";
            document.querySelector('.questionBar').style.visibility = 'hidden';
            document.querySelector('.frameArea').classList.remove('center');
            document.querySelector('.hintMessage').style.visibility = 'visible';
            document.querySelector('.originalTextArea').style.display = 'none';
            document.querySelector('.startArea').style.display = 'flex';
            document.querySelector('.gameArea').style.display = 'none';
            document.querySelector('.conclusionArea').style.display = 'none';
            document.querySelector('.consultLines').style.visibility = 'hidden';
            document.querySelector('.buttonsArea').style.visibility = 'visible';
            // show buttons area
            document.querySelector('.consultButton').style.visibility = 'visible';
            document.querySelector('.about-button').style.display = 'block';
            document.querySelector('.hintArea').style.display = 'block';

            document.querySelector('.aboutIChing').style.display = 'block';
            document.querySelector('.messageArea').style.marginLeft = '9.5rem';

            document.querySelector('.messageArea').classList.toggle('conclusion');
        }

        function writeMovingLines() {
            if(lang == "en") {
                document.querySelector('.consultLines').innerHTML = `<span><strong>Moving lines:</strong></span>`;
            } else if(lang == "pt") {
                document.querySelector('.consultLines').innerHTML = `<span><strong>Linhas Móveis:</strong></span>`;
            }

            movingLines = [];
            movingLinesPositions = [];
            for (let i = 0; i <= 6 - 1; i++) {
                let stringNumber = "";

                switch (i) {
                    case 0:
                        stringNumber = (lang == "en") ? "first" : "primeira";
                        break;
                    case 1:
                        stringNumber = (lang == "en") ? "second" : "segunda";
                        break;
                    case 2:
                        stringNumber = (lang == "en") ? "third" : "terceira";;
                        break;
                    case 3:
                        stringNumber = (lang == "en") ? "fourth" : "quarta";;
                        break;
                    case 4:
                        stringNumber = (lang == "en") ? "fifth" : "quinta";;
                        break;
                    case 5:
                        stringNumber = (lang == "en") ? "sixth" : "sexta";;
                        break;
                }
                if (hexagrams[0].lines[i] == true && hexagrams[1].lines[i] == false) {
                    if(lang == "en") {
                        movingLines.push('Nine on ' + stringNumber + " position");
                    } else if(lang == "pt") {
                        movingLines.push('Nove na ' + stringNumber + " posição");
                    }

                    movingLinesPositions.push(i+1);
                }
                if (hexagrams[0].lines[i] == false && hexagrams[1].lines[i] == true) {
                    if(lang == "en") {
                        movingLines.push('Six on ' + stringNumber + " position");
                    } else if(lang == "pt") {
                        movingLines.push('Seis na ' + stringNumber + " posição");
                    }

                    movingLinesPositions.push(i+1);
                }
            }

            for (let i = 0; i <= 5 - 1; i++) {
                if (movingLines[i] !== undefined) {
                    document.querySelector('.consultLines').innerHTML += `<span>${movingLines[i]}</span>`;
                }
            }

            if (movingLines.length == 0) {
                if(lang == "en") {
                    document.querySelector('.consultLines').innerHTML = `<span><strong>No moving lines</strong></span>`;
                } else if(lang == "pt") {
                    document.querySelector('.consultLines').innerHTML = `<span><strong>Nenhuma linha móvel</strong></span>`;
                }
            }
        }

        function saveConsultation () {
            if(!saveConsultationButton.classList.contains('disabled'))
            {
                const questionTxt = document.querySelector('.questionText').innerText;
                const resultNum = hexagrams[0].getNumber();
                const relatedNum = hexagrams[1].getNumber();
                const resultLines = encodeLines(hexagrams[0].lines);
                const relatedLines = encodeLines(hexagrams[1].lines);

                const data = {
                    subject: questionTxt,
                    result: resultNum,
                    related: relatedNum,
                    result_lines: resultLines,
                    related_lines: relatedLines,
                }

                fetch('/save', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                })
                .catch(error => {
                    console.error('Erro:', error);
                });

                document.querySelector('.saveConsultationButton').classList.add('disabled');
                alert("Sua consulta foi registrada com sucesso!");
            }

        }


        function loadConsultation() {
            const data = JSON.parse(sessionStorage.getItem('data'));

            hexagrams[0].lines = decodeLines(data.resultLines);
            hexagrams[1].lines = decodeLines(data.relatedLines);

            hexagrams[0].update();
            hexagrams[1].update();
            updateHexagram();

            document.querySelector('.questionDate').innerText = data.date

            document.querySelector('.frameArea').classList.add('center');

            document.querySelector('.buttonsArea').style.visibility = 'hidden';
            document.querySelector('.hintMessage').style.visibility = 'hidden';

            document.querySelector('.questionBar').style.visibility = 'visible';
            document.querySelector('.questionText').innerText = data.subject;


            document.querySelector(".startArea").style.display = "none";
            document.querySelector(".originalTextArea").style.display = "flex";
            document.querySelector(".conclusionArea").style.display = "flex";

            document.querySelector('.messageArea').classList.add('conclusion');
            consultMessage.style.display = "block";

            canPlay = false;

            showResult();
            document.querySelector('.saveConsultationButton').classList.add('disabled');

            sessionStorage.removeItem("data");
        }

        // function to refresh the screen
        function refreshScreen () {
            document.querySelector(".content").style.display = "none"
        }

        flagButtons = document.querySelectorAll(".flagButton")

        flagButtons.forEach((flagButton) => {
            flagButton.addEventListener('click', () => {
                refreshScreen()
            })
        })

        function decodeLines(str) {
            const arr = str.split(',').map(num => num === '1');
            return arr;
        }
        function encodeLines(arr) {
            const str = arr.map(bool => bool ? '1' : '0').join(',');
            return str;
        }
    </script>

    <x-OriginalTextTemplate />
</body>

</html>
