class OriginalTextScreen {

    hexagramNumber = null;
    templateIndex = null;
    selectedTemplate = "";
    textContainer = null;
    charactereText = "";
    hexagramNameText = "";
    hexagramSymbolText = "";
    hexagramUpperText = "";
    hexagramBottomText = "";

    descriptionContent = "";
    descriptionContent = "";
    judgmentContent = "";
    imageContent = "";
    linesContent = "";
    originalTextHexagrams = null;
    static open() {
        document.querySelector('.originalTextScreen').style.display = 'block';
    }
    static close() {
        document.querySelector('.originalTextScreen').style.display = 'none';
    }
    static write(hexagramNumber, hexagramNumber2 = 0) {
        this.templateIndex = hexagramNumber;
        this.templateIndex2 = hexagramNumber2;

        this.selectedTemplate = document.querySelector(`.originalTemplateHexagram[data-number~="${this.templateIndex}"`);
        this.selectedTemplate2 = document.querySelector(`.originalTemplateHexagram[data-number~="${this.templateIndex2}"`);


        this.originalTextHexagrams = document.querySelectorAll('.originalTextHexagram');

        document.querySelector('.originalTextContent').scrollTo(0, 0);
        document.querySelector('.originalTextContent2').scrollTo(0, 0);

        if( this.selectedTemplate != null ) {
            this.charactereText = this.selectedTemplate.querySelector('.originalTemplateCharactere').innerText;
            this.hexagramNameText = this.selectedTemplate.querySelector('.originalTemplateName').innerText;
            this.hexagramSymbolText = this.selectedTemplate.querySelector('.originalTemplateSymbol').innerText;
            this.hexagramUpperText = this.selectedTemplate.querySelector('.originalTemplateUpperLabel').innerText;
            this.hexagramBottomText = this.selectedTemplate.querySelector('.originalTemplateBottomLabel').innerText;

            this.descriptionContent = this.selectedTemplate.querySelector('.originalTemplateDescription').innerHTML;
            this.judgmentContent = this.selectedTemplate.querySelector('.originalTemplateJudgment').innerHTML;
            this.imageContent = this.selectedTemplate.querySelector('.originalTemplateImage').innerHTML;
            this.linesContent = this.selectedTemplate.querySelector('.originalTemplateLines').innerHTML;

            document.querySelector('.originalTextCharactere').innerText = this.charactereText;
            document.querySelector('.originalTextName').innerText = this.hexagramNameText;
            document.querySelector('.originalTextSymbol').innerText =  this.hexagramSymbolText;
            document.querySelector('.originalTextUpperLabel').innerHTML = this.hexagramUpperText;
            document.querySelector('.originalTextBottomLabel').innerHTML = this.hexagramBottomText;

            document.querySelector('.originalTextDescription').innerHTML = this.descriptionContent;
            document.querySelector('.originalTextJudgment').innerHTML = this.judgmentContent;
            document.querySelector('.originalTextImage').innerHTML = this.imageContent;
            document.querySelector('.originalTextLines').innerHTML = this.linesContent;
        }

        let hexagramCards = document.querySelectorAll('.originalTextHexagram');
        if( this.selectedTemplate2 != null ) {

            this.originalTextHexagrams[0].classList.add('selected');
            this.originalTextHexagrams[1].classList.remove('selected');
            document.querySelector('.originalTextContainer').style.display = 'block';
            document.querySelector('.originalTextContainer2').style.display = 'none';

            if(hexagramNumber2 != 0) {
                hexagramCards[1].style.display = 'flex';

                this.charactereText = this.selectedTemplate2.querySelector('.originalTemplateCharactere').innerText;
                this.hexagramNameText = this.selectedTemplate2.querySelector('.originalTemplateName').innerText;
                this.hexagramSymbolText = this.selectedTemplate2.querySelector('.originalTemplateSymbol').innerText;
                this.hexagramUpperText = this.selectedTemplate2.querySelector('.originalTemplateUpperLabel').innerText;
                this.hexagramBottomText = this.selectedTemplate2.querySelector('.originalTemplateBottomLabel').innerText;

                this.descriptionContent = this.selectedTemplate2.querySelector('.originalTemplateDescription').innerHTML;
                this.judgmentContent = this.selectedTemplate2.querySelector('.originalTemplateJudgment').innerHTML;
                this.imageContent = this.selectedTemplate2.querySelector('.originalTemplateImage').innerHTML;
                this.linesContent = this.selectedTemplate2.querySelector('.originalTemplateLines').innerHTML;

                document.querySelector('.originalTextCharactere2').innerText = this.charactereText;
                document.querySelector('.originalTextName2').innerText = this.hexagramNameText;
                document.querySelector('.originalTextSymbol2').innerText =  this.hexagramSymbolText;
                document.querySelector('.originalTextUpperLabel2').innerHTML = this.hexagramUpperText;
                document.querySelector('.originalTextBottomLabel2').innerHTML = this.hexagramBottomText;

                document.querySelector('.originalTextDescription2').innerHTML = this.descriptionContent;
                document.querySelector('.originalTextJudgment2').innerHTML = this.judgmentContent;
                document.querySelector('.originalTextImage2').innerHTML = this.imageContent;
                document.querySelector('.originalTextLines2').innerHTML = this.linesContent;
            }
        }
        if(hexagramNumber2 == 0){
            hexagramCards[1].style.display = 'none';
            this.originalTextHexagrams[0].classList.add('selected');
            this.originalTextHexagrams[1].classList.remove('selected');
            document.querySelector('.originalTextContainer').style.display = 'block';
            document.querySelector('.originalTextContainer2').style.display = 'none';
        }
        // document.querySelector('originalTextContainer').scrollTop(0);

    }
    static goNext() {
        this.templateIndex ++;
        if(this.templateIndex > 64) {
            this.templateIndex = 1;
        }
        this.write(this.templateIndex);
    }
    static goPrev() {
        this.templateIndex --;
        if(this.templateIndex < 1) {
            this.templateIndex = 64;
        }
        this.write(this.templateIndex);
    }
    static select() {

        this.originalTextHexagrams[0].classList.toggle('selected');
        this.originalTextHexagrams[1].classList.toggle('selected');

        if(document.querySelector('.originalTextContainer').style.display == 'none') {
            document.querySelector('.originalTextContainer').style.display = 'block';
            document.querySelector('.originalTextContainer2').style.display = 'none';
        } else {
            document.querySelector('.originalTextContainer').style.display = 'none';
            document.querySelector('.originalTextContainer2').style.display = 'block';
        }
    }
}
