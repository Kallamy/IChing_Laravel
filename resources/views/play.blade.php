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
        <span class="hintMessage">Clique nas linhas para fazer mutações</span>
        <div class="consultArea">
            <div class="messageArea">
                <div class="consultMessage">
                    <span class="consultResult"></span>
                    <br>
                    <span class="consultResult"></span>
                </div>
                <div class="consultLines">
                    <span><strong>Linhas Móveis:</strong></span>
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
            <div class="originalTextArea">
                <x-Button class="originalTextButton" onclick="">Texto original<img width="40.0rem" src="assets/icons/open-book.png"></x-Button>
            </div>
            <div class="conclusionArea">
                <x-Button onclick="showQuestion()">Consultar novamente <img width="40.0rem" src="assets/icons/i-ching.png"></x-Button>
                <x-Button onclick="">Registrar consulta<img width="40.0rem" src="assets/icons/pencil.png"></x-Button>
                <x-Button onclick="exitGame()">Sair</x-Button>

            </div>

        </div>

        </div>
    </section>

</x-layout>
