<x-layout page="play">
    <section id="play">
        <div class="content">
            <div class="questionBar">
                Como posso coneguir um emprego?
            </div>
            <div class="interactiveArea">
                <div class="frameArea">
                    <x-InteractiveFrame/>
                </div>
                <div class="buttonsArea">
                    <div class="changeSelector">
                        <input type="checkbox" name="changeHexagram" id="changeSelector">
                        <label for="changeSelector">@lang('messages.fixedOptionLabel')</label>
                    </div>

                    <x-ChineseLine/>

                    <x-InvertButton>@lang('messages.invertButtons.lines')</x-InvertButton>
                    <x-InvertButton>@lang('messages.invertButtons.trigrams')</x-InvertButton>
                    <x-InvertButton>@lang('messages.invertButtons.positions')</x-InvertButton>

                </div>
            </div>
        </div>
        <span class="hintMessage">@lang('messages.hintMessage')</span>
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
                <x-Button onclick="showQuestion()">@lang('messages.consultWithCoins')<img width="40.0rem" src="assets/icons/i-ching.png"></x-Button>

            </div>
            <div class="questionArea">
                <input id="questionInput" type="text" placeholder="@lang('messages.questionPlaceholder')">
                <x-Button onclick="showGame()"><img width="40.0rem" src="assets/icons/i-ching.png"></x-Button>
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
                <x-Button class="originalTextButton" onclick="openOriginalText(event)">@lang('messages.conclusion.originalText')<img width="40.0rem" src="assets/icons/open-book.png"></x-Button>
            </div>
            <div class="conclusionArea">
                <x-Button onclick="showQuestion()">@lang('messages.conclusion.consultAgain') <img width="40.0rem" src="assets/icons/i-ching.png"></x-Button>
                <x-Button onclick="">@lang('messages.conclusion.register')<img width="40.0rem" src="assets/icons/pencil.png"></x-Button>
                <x-Button onclick="exitGame()">@lang('messages.conclusion.exit')</x-Button>

            </div>
        </div>
    </section>

</x-layout>

