<div class="originalTextHeader">
    @if($page == 'learn' )
    <div class="originalTextPrevButton">
        <img src={{ asset('assets/icons/arrow-left.svg') }} alt="Prev">
    </div>
    <div class="originalTextHexagram selected">
        <div class="originalTextCharactere">
        </div>
        <div class="originalTextName">
        </div>
        <div class="originalTextHexagramArea">
            <div class="originalTextSymbol"></div>
            <div class="originalTextLabels">
                <div class="originalTextUpperLabel">
                </div>
                <div class="originalTextBottomLabel">
                </div>
            </div>
        </div>
    </div>
    <div class="originalTextNextButton">
        <img src={{ asset('assets/icons/arrow-right.svg') }} alt="Next">
    </div>
    @else
    <div class="originalTextHexagram selected">
        <div class="originalTextCharactere">
        </div>
        <div class="originalTextName">
        </div>
        <div class="originalTextHexagramArea">
            <div class="originalTextSymbol"></div>
            <div class="originalTextLabels">
                <div class="originalTextUpperLabel">
                </div>
                <div class="originalTextBottomLabel">
                </div>
            </div>
        </div>
    </div>
    <div class="originalTextHexagram">
        <div class="originalTextCharactere2">
        </div>
        <div class="originalTextName2">
        </div>
        <div class="originalTextHexagramArea">
            <div class="originalTextSymbol2"></div>
            <div class="originalTextLabels">
                <div class="originalTextUpperLabel2">
                </div>
                <div class="originalTextBottomLabel2">
                </div>
            </div>
        </div>
    </div>
    @endIf
    <div class="originalTextCloseButton">
        ✖
    </div>
</div>
<hr>
<div class="originalTextContainer">
    <div class="originalTextContent">
        <h2>Notas do autor</h2>
        <div class="originalTextDescription">

        </div>
        <h2>Julgamento</h2>
        <div class="originalTextJudgment">

        </div>
        <h2>Imagem</h2>
        <div class="originalTextImage">

        </div>
        <h2 id="moving-lines-h2">Linhas móveis</h2>
        <div class="originalTextLines">

        </div>
    </div>
</div>
<div class="originalTextContainer2">
    <div class="originalTextContent2">
        <h2>Notas do autor</h2>
        <div class="originalTextDescription2">

        </div>
        <h2>Julgamento</h2>
        <div class="originalTextJudgment2">

        </div>
        <h2>Imagem</h2>
        <div class="originalTextImage2">

        </div>
        <h2>Linhas móveis</h2>
        <div class="originalTextLines2">

        </div>
    </div>
</div>

<script>
    console.log(document.querySelectorAll('.originalTextHexagram'))
    document.querySelectorAll('.originalTextHexagram').forEach(card => {
        card.addEventListener('click', (e) => {
            if ( !e.currentTarget.classList.contains("selected")) {
                OriginalTextScreen.select();
            }
        })
    })
    document.querySelector('.originalTextCloseButton').addEventListener('click', () => {
        OriginalTextScreen.close();
    })
    document.querySelectorAll('.hexagramItem').forEach(item => {
        item.addEventListener('click', (e) => {
            hexagramNumber = e.currentTarget.getAttribute("data-number");

            OriginalTextScreen.open("learn");
            OriginalTextScreen.write(hexagramNumber);
        })
    })
    document.querySelector('.originalTextNextButton').addEventListener('click', () => {
        OriginalTextScreen.goNext();
    })
    document.querySelector('.originalTextPrevButton').addEventListener('click', () => {
        OriginalTextScreen.goPrev();
    })

</script>
