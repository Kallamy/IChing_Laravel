<x-layout page="play">
    <section id="play">
        <div class="interactiveArea">
            <div class="frameArea">
                <x-InteractiveFrame/>
            </div>
            <div class="buttonsArea">
                <div class="changeSelector">
                    <input type="checkbox" name="changeHexagram" id="changeSelector">
                    <label for="changeSelector">fixed change</label>
                </div>
                <img class="chineseLine" src="assets/images/separator_line.png">


                <div class="buttonArea">
                    <button class="invertButton" data-op="lines">Invert Lines</button>
                </div>
                <div class="buttonArea">
                    <button class="invertButton" data-op="trigrams">Invert Trigrams</button>
                </div>
                <div class="buttonArea">
                    <button class="invertButton" data-op="positions">Invert Positions</button>
                </div>
            </div>
        </div>
        </div>
        <div class="consultArea">
            <span class="consultMessage">Area do jogo</span>
        </div>

        <div class="gameArea">
            <div class="tableArea">
                <div class="coin">
                    <div class="yinFace"></div>
                    <div class="yangFace"></div>
                </div>
                <div class="coin" >
                    <div class="yinFace"></div>
                    <div class="yangFace"></div>
                </div>
                <div class="coin">
                    <div class="yinFace"></div>
                    <div class="yangFace"></div>
                </div>
            </div>
            <button class="coinsButton" onClick="flipCoins()">Jogar Moedas</button>
        </div>
        </div>
    </section>
    <script src={{asset('assets/js/classes/pairs.js')}}></script>
    <script src={{asset('assets/js/classes/Hexagram.js')}}></script>
    <script src={{asset('assets/js/main.js')}}></script>
</x-layout>
