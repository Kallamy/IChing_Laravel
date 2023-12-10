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

    lineAreas = null

    setInfo() {
        this.upperTrigram = this.getTrigram("upper");
        this.bottomTrigram = this.getTrigram("bottom");
        this.title = this.getHexagram();
        this.name = this.getHexagram('title');
        this.chineseTitle = this.getHexagram('chinese');
        this.charactere = this.getCharactere();
        this.number = this.getNumber();

        if(document.querySelector('.hexagramNumber1').innerHTML != this.number) {
            document.querySelector('.hexagramNumber1').classList.add('fade');
        }
        if(document.querySelector('.hexagramNumber2').innerHTML != this.number) {
            document.querySelector('.hexagramNumber2').classList.add('fade');
        }
        if(document.querySelector('.chineseTitle1').innerHTML != this.chineseTitle) {
            document.querySelector('.chineseTitle1').classList.add('fade');
        }
        if(document.querySelector('.chineseTitle2').innerHTML != this.chineseTitle) {
            document.querySelector('.chineseTitle2').classList.add('fade');
        }
        if(document.querySelector('.hexagramTitle1').innerHTML != this.title) {
            document.querySelector('.hexagramTitle1').classList.add('fade');
        }
        if(document.querySelector('.hexagramTitle2').innerHTML != this.title) {
            document.querySelector('.hexagramTitle2').classList.add('fade');
        }
        if(document.querySelector('.charactere1').innerHTML != this.charactere) {
            document.querySelector('.charactere1').classList.add('fade');
        }
        if(document.querySelector('.charactere2').innerHTML != this.charactere) {
            document.querySelector('.charactere2').classList.add('fade');
        }
        if(document.querySelector('#info .ut1').innerHTML != this.upperTrigram) {
            document.querySelector('#info .ut1').classList.add('fade');
        }
        if(document.querySelector('#info .ut2').innerHTML != this.upperTrigram) {
            document.querySelector('#info .ut2').classList.add('fade');
        }
        if(document.querySelector('#info .bt1').innerHTML != this.bottomTrigram) {
            document.querySelector('#info .bt1').classList.add('fade');
        }
        if(document.querySelector('#info .bt2').innerHTML != this.bottomTrigram) {
            document.querySelector('#info .bt2').classList.add('fade');
        }
        // wait some time to set innerHTML of the elements with the attributes values
        setTimeout(()=>{
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
            if(isConsulting == false) {
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
            if(isConsulting) {
                document.querySelector('.nextHexagram').innerHTML = ">";
                document.querySelector('.prevHexagram').innerHTML = "<";
            } else {
                document.querySelector('.nextHexagram').innerHTML = this.name + "  >";
                document.querySelector('.prevHexagram').innerHTML = "<  " + this.name;
            }
        }, 950)
    }

    getHexagram(value) {
        let title = ""
        this.upperTrigram = this.getTrigram("upper");
        this.bottomTrigram = this.getTrigram("bottom");

        pairs.forEach(p => {
            if(this.upperTrigram == p[0] && this.bottomTrigram == p[1]) {
                title = p[2]
            }
        })

        let splitedTitle = title.split(" - ");

        if(value == "title") {
            return splitedTitle[1];
        } else if(value == "chinese") {
            return splitedTitle[0];
        }

        return title

    }

    getTrigram(position) {
        let upperTrigram = "";
        let bottomTrigram = "";
        let p1, p2, p3 = null
        if (position == "upper") {
            p1 = 4;
            p2 = 5;
            p3 = 6;

            if(this.lines[p1 - 1] == true && this.lines[p2  -1] == true && this.lines[p3 - 1] == true) {
                upperTrigram = "céu";
            } else if(this.lines[p1 - 1] == false && this.lines[p2 - 1] == false && this.lines[p3 - 1] == false){
                upperTrigram = "terra";
            } else if(this.lines[p1 - 1] == true && this.lines[p2  - 1] == false && this.lines[p3 - 1] == false){
                upperTrigram = "trovão"
            } else if(this.lines[p1 - 1] == false && this.lines[p2 - 1] == true && this.lines[p3 - 1] == false){
                upperTrigram = "água";
            } else if(this.lines[p1 - 1] == false && this.lines[p2  - 1] == false && this.lines[p3 - 1] == true){
                upperTrigram = "montanha";
            } else if(this.lines[p1 - 1] == false && this.lines[p2  - 1] == true && this.lines[p3 - 1] == true){
                upperTrigram = "madeira";
            } else if(this.lines[p1 - 1] == true && this.lines[p2  - 1] == false && this.lines[p3 - 1] == true){
                upperTrigram = "fogo";
            } else if(this.lines[p1 - 1] == true && this.lines[p2  - 1] == true && this.lines[p3 - 1] == false ){
                upperTrigram = "lago";
            } else {
                upperTrigram = '???'
            }
            this.upperTrigram = upperTrigram;
            return this.upperTrigram;
        } else if(position == "bottom") {
            p1 = 1;
            p2 = 2;
            p3 = 3;

            if(this.lines[p1 - 1] == true && this.lines[p2  -1] == true && this.lines[p3 - 1] == true) {
                bottomTrigram = "céu";
            } else if(this.lines[p1 - 1] == false && this.lines[p2 - 1] == false && this.lines[p3 - 1] == false){
                bottomTrigram = "terra";
            } else if(this.lines[p1 - 1] == true && this.lines[p2  - 1] == false && this.lines[p3 - 1] == false){
                bottomTrigram = "trovão"
            } else if(this.lines[p1 - 1] == false && this.lines[p2 - 1] == true && this.lines[p3 - 1] == false){
                bottomTrigram = "água";
            } else if(this.lines[p1 - 1] == false && this.lines[p2  - 1] == false && this.lines[p3 - 1] == true){
                bottomTrigram = "montanha";
            } else if(this.lines[p1 - 1] == false && this.lines[p2  - 1] == true && this.lines[p3 - 1] == true){
                bottomTrigram = "madeira";
            } else if(this.lines[p1 - 1] == true && this.lines[p2  - 1] == false && this.lines[p3 - 1] == true){
                bottomTrigram = "fogo";
            } else if(this.lines[p1 - 1] == true && this.lines[p2  - 1] == true && this.lines[p3 - 1] == false ){
                bottomTrigram = "lago";
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
            if(this.title == p[2]) {
                charactere = p[3]
            }
        })
        this.charactere = charactere;
        return charactere;
    }

    getNumber() {
        let number = 0;
        pairs.forEach(p => {
            if(this.title == p[2]) {
                number = p[4]
            }
        })
        this.number = number;
        return number;
    }

    changeLine(pos) {
        // verify if is not consulting
        if(!isConsulting) {
            // change the line only in one hexagram or in both
            if(changeSelector.checked === true) {
                if(this.lines[pos] == true) {
                    this.lines[pos] = false;
                } else {
                    this.lines[pos] = true;
                }
            } else {
                for( let i = 0; i < 2; i++ ) {
                    if(hexagrams[i].lines[pos] == true) {
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
