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

                <x-ChineseLine/>

                <x-InvertButton>Invert Lines</x-InvertButton>
                <x-InvertButton>Invert Trigrams</x-InvertButton>
                <x-InvertButton>Invert Positions</x-InvertButton>

            </div>
        </div>
        </div>
        <div class="consultArea">
            <div class="messageArea">
                <div class="consultMessage">
                    <span class="consultResult"></span>
                    <br>
                    <span class="consultResult"></span>
                </div>
                <div class="consultLines">
                    <span><strong>Linhas Móveis:</strong></span>
                    <span class="consultLine"></span>
                    <span class="consultLine"></span>
                    <span class="consultLine"></span>
                    <span class="consultLine"></span>
                    <span class="consultLine"></span>
                    <span class="consultLine"></span>
                </div>
            </div>

            <div class="startArea">
                <x-Button onclick="showQuestion()">Consultar com moedas <img width="40.0rem" src="assets/icons/i-ching.png"></x-Button>

            </div>
            <div class="questionArea">
                <input id="questionInput" type="text" placeholder="Me fale sobre...">
                <x-Button onclick="showGame()">Consultar<img width="40.0rem" src="assets/icons/i-ching.png"></x-Button>
            </div>
            <div class="gameArea">
                <div class="tableArea">
                    <x-Coin/>
                    <x-Coin/>
                    <x-Coin/>
                </div>
                <button class="coinsButton" onClick="flipCoins()">Jogar Moedas</button>
            </div>
            <div class="conclusionArea">
                <x-Button onclick="showQuestion()">Consultar novamente <img width="40.0rem" src="assets/icons/i-ching.png"></x-Button>
                <x-Button onclick="">Salvar consulta<img width="40.0rem" src="assets/icons/pencil.png"></x-Button>
                <x-Button onclick="exitGame()">Sair</x-Button>

            </div>

        </div>

        </div>
    </section>
    <script src={{asset('assets/js/classes/pairs.js')}}></script>
    <script src={{asset('assets/js/classes/Hexagram.js')}}></script>
    <script src={{asset('assets/js/main.js')}}></script>
    <script src={{asset('assets/js/game.js')}}></script>
</x-layout>
