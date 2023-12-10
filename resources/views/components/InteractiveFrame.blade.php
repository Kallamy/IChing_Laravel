<div class="frame">
    {{-- <button type="button" onClick="getAbout()" class="about-button">?</button> --}}
    <div class="slidesArea smooth">
        <div class="slide">
            <div class="chineseTitle1"></div>
            <div class="identification">
                <div class="hexagramNumber1"></div>
                <div class="charactere1"></div>
            </div>
            <div class="hexagramTitle1"></div>

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
            <div class="chineseTitle2"></div>
            <div class="identification">
                <div class="hexagramNumber2"></div>
                <div class="charactere2"></div>
            </div>
            <div class="hexagramTitle2"></div>
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

    <div class="controllersArea">
        <a class="prevHexagram"><</a>
        <a class="nextHexagram" >></a>
    </div>
