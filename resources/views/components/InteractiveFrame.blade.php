<div class="frame">
    <button type="button" onClick="getAbout()" class="about-button">?</button>
    <div class="slidesArea smooth">
        <div class="slide">
            <div class="hexagramHeader">
                <div class="chineseTitle1"></div>
                <div class="identification">
                    <div class="hexagramNumber1"></div>
                    <div class="charactere1"></div>
                </div>
                <div class="hexagramTitle1"></div>
            </div>

            <div class="infoArea">
                <div id="info">
                    <div class="ut1"></div>
                    <span>sobre</span>
                    <div class="bt1"></div>
                </div>

                <div class="hexagramArea" id="firstHexagram" data-index="0">
                    <div class="linesArea">

                        {{-- @foreach (json_decode($lines) as $line)

                        <div class="lineArea" data-pos="6">
                            @if($line)
                                <div class="line"><span class="lineNumber">6</span>
                            @else
                                 <div class="line"><span class="lineNumber">3</span></div><div class="line"></div>
                            @endif
                        </div>
                        @endforeach --}}
                        <div class="lineArea" data-pos="6"><div class="line"><span class="lineNumber">6</span></div></div>
                        <div class="lineArea" data-pos="5"><div class="line"><span class="lineNumber">5</span></div></div>
                        <div class="lineArea" data-pos="4"><div class="line"><span class="lineNumber">4</span></div></div>
                        <div class="lineArea" data-pos="3"><div class="line"><span class="lineNumber">3</span></div><div class="line"></div></div>
                        <div class="lineArea" data-pos="2"><div class="line"><span class="lineNumber">2</span></div><div class="line"></div></div>
                        <div class="lineArea" data-pos="1"><div class="line"><span class="lineNumber">1</span></div></div>
                    </div>
                    <div class="yinyangArea1">
                        <img src="assets/images/yinyang.png">
                    </div>
                </div>

            </div>
        </div>
        <div class="separator"></div>
        <div class="slide">
            <div class="hexagramHeader">
                <div class="chineseTitle2"></div>
                <div class="identification">
                    <div class="hexagramNumber2"></div>
                    <div class="charactere2"></div>
                </div>
                <div class="hexagramTitle2"></div>
            </div>

            <div class="infoArea">
                <div id="info">
                    <div class="ut2"></div>
                    <span>sobre</span>
                    <div class="bt2"></div>
                </div>

                <div class="hexagramArea" id="secondHexagram" data-index="1">
                    <div class="linesArea">

                        <div class="lineArea" data-pos="6"></div>

                        <div class="lineArea" data-pos="5"></div>

                        <div class="lineArea" data-pos="4"></div>

                        <div class="lineArea" data-pos="3"></div>

                        <div class="lineArea" data-pos="2"></div>

                        <div class="lineArea" data-pos="1"></div>
                    </div>
                    <div class="yinyangArea2">
                        <img src="assets/images/yinyang.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="templateArea">
        <div class="templateLine"></div>
        <div class="templateLine"></div>
        <div class="templateLine"></div>
        <div class="templateLine"></div>
        <div class="templateLine"></div>
        <div class="templateLine"></div>
    </div>

    <div class="aboutArea">
        <div class="closeButton">✖</div>
        <div class="aboutContainer">
            <blockquote id="aboutQuote"> Peace. The small departs, The great approaches. <br> Good fortune. Success.</blockquote>
            <div id="aboutTrigrams"><p class="about-title">Formed by the trigrams:</p><p class="about-content">Wind over Heaven</p></div>
            <div id="aboutGeneral"><p class="about-title">General:</p><p class="about-content">Although times are harmonious you should not take them for granted. Try to understand why the harmony is there.</p></div>
            <div id="aboutLove"><p class="about-title">Love:</p><p class="about-content">Your relationship should be treated to respect and kindness.</p></div>
            <div id="aboutBusiness"><p class="about-title">business:</p><p class="about-content">Your current success should be analyzed to see how it came about.</p></div>
            <div id="aboutPersonal"><p class="about-title">Personal:</p><p class="about-content">Do a good deed.</p></div>
            <div id="aboutOverview"><p class="about-title">Overview:</p><p class="about-content">T'ai relates to harmony. Everything should currently be going well. Dont take it for granted though. Examine all the aspects of your life and see how that harmony come about. Nothing is permanent of course, and this is no less so for T'ai. Enjoy the peace and harmony arround you. T'ai is a very auspicious hexagram and indicates a successful time of life.</p></div>
        </div>
    </div>

    <div class="controllersArea">
        <a class="prevHexagram"><</a>
        <a class="nextHexagram" >></a>
    </div>
