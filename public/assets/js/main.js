let yinyangDuration = 8000;
let hasTwoHexagrams = false;
let currentHexagram = 0;
let canInvert = true;

let clickPressed = false;
let canChange = true;
let firstClick = false;

let isConsulting = false;

const consultArea = document.querySelector(".consultArea");
const slidesArea = document.querySelector(".slidesArea");
const templateLines = document.querySelectorAll(".templateLine");
const changeSelector = document.querySelector("#changeSelector");

const linesArea = document.querySelectorAll(".linesArea");
const infoSpan = document.querySelectorAll("#info span");

hexagrams[0].lineAreas = linesArea[0].querySelectorAll(".lineArea")
hexagrams[1].lineAreas = linesArea[1].querySelectorAll(".lineArea")

drawTemplate();
updateHexagram();


// Add click event on each line
document.querySelectorAll('.lineArea').forEach(line => {

    line.addEventListener('click', (e) => {
        lineChange(e);
    });

});

setControls();
drawTemplate();

slidesArea.style.display = "block";

// Function to change lines
function lineChange(e) {
    // get hexagram index
    const index = e.currentTarget.parentElement.parentElement.getAttribute('data-index');
    // get line position
    const pos = e.currentTarget.getAttribute('data-pos') - 1;
    // verify if is not consulting
    if(!isConsulting) {
        // change the line only in one hexagram or in both
        if(changeSelector.checked === true) {
            if(hexagrams[index].lines[pos] == true) {
                hexagrams[index].lines[pos] = false;
            } else {
                hexagrams[index].lines[pos] = true;
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
    hexagrams[0].setInfo();
    hexagrams[1].setInfo();
    setControls();
    drawTemplate();
    updateHexagram();
}

// Function to update the hexagram
function updateHexagram() {
    document.querySelectorAll('.lineArea').forEach(line => {
        // get hexagram index
        const index = line.parentElement.parentElement.getAttribute('data-index');
        // get line position
        const pos =  (line.getAttribute('data-pos')) - 1;
        // insert yin or yang line HTML
        if(hexagrams[index].lines[pos] === true) {
        line.innerHTML = `<div class="line"><span class="lineNumber">${pos + 1}</span></div>`
        } else {
            line.innerHTML = `<div class="line"><span class="lineNumber">${pos + 1}</span></div><div class="line"></div>`
        }
        // insert an empty line HTML if the value is null
        for( let i = 0; i < 2; i++ ) {
            if(hexagrams[i].lines[pos] === null) {
                line.innerHTML = '<div class="emptyLine">'
            }
        }
    });
    const slidesArea = document.querySelector(".slidesArea");
    // verify if the lines are equals in both hexagrams
    if(JSON.stringify(hexagrams[0].lines) == JSON.stringify(hexagrams[1].lines)) {
        // remove smooth class and show only one hexagram
        slidesArea.classList.remove('smooth');
        if(currentHexagram == 0) {
            slidesArea.style.marginLeft = "-36rem"
            currentHexagram = 1;
        } else if(currentHexagram == 1) {
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
    if(hasTwoHexagrams) {
        // show next or prev control
        if(currentHexagram == 0) {
            document.querySelector('.nextHexagram').style.opacity = 1;
        } else if(currentHexagram == 1) {
            document.querySelector('.prevHexagram').style.opacity = 1;
        }
        // add smooth class
        slidesArea.classList.add('smooth');
    }

    getInfo();
    drawTemplate();
}
getInfo();

// Function to fill values of the hexagrams attributes
function getInfo() {

    if(document.querySelector('.hexagramNumber1').innerHTML != hexagrams[0].getNumber()) {
        document.querySelector('.hexagramNumber1').classList.add('fade');
    }
    if(document.querySelector('.chineseTitle1').innerHTML != hexagrams[0].getHexagram('chinese')) {
        document.querySelector('.chineseTitle1').classList.add('fade');
    }
    if(document.querySelector('.hexagramTitle1').innerHTML != hexagrams[0].getHexagram('title')) {
        document.querySelector('.hexagramTitle1').classList.add('fade');
    }
    if(document.querySelector('.hexagramTitle2').innerHTML != hexagrams[1].getHexagram('title')) {
        document.querySelector('.hexagramTitle2').classList.add('fade');
    }
    if(document.querySelector('.charactere1').innerHTML != hexagrams[0].getCharactere()) {
        document.querySelector('.charactere1').classList.add('fade');
    }
    if(document.querySelector('.charactere2').innerHTML != hexagrams[1].getCharactere()) {
        document.querySelector('.charactere2').classList.add('fade');
    }
    if(document.querySelector('#info .ut1').innerHTML != hexagrams[0].getTrigram("upper")) {
        document.querySelector('#info .ut1').classList.add('fade');
    }
    if(document.querySelector('#info .ut2').innerHTML != hexagrams[1].getTrigram("upper")) {
        document.querySelector('#info .ut2').classList.add('fade');
    }
    if(document.querySelector('#info .bt1').innerHTML != hexagrams[0].getTrigram("bottom")) {
        document.querySelector('#info .bt1').classList.add('fade');
    }
    if(document.querySelector('#info .bt2').innerHTML != hexagrams[1].getTrigram("bottom")) {
        document.querySelector('#info .bt2').classList.add('fade');
    }
    // wait some time to set innerHTML of the elements with the attributes values
    setTimeout(()=>{
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
        if(isConsulting == false) {
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
        if(isConsulting) {
            document.querySelector('.nextHexagram').innerHTML = ">";
            document.querySelector('.prevHexagram').innerHTML = "<";
        } else {
            document.querySelector('.nextHexagram').innerHTML = hexagrams[1].getHexagram('title')+" >";
            document.querySelector('.prevHexagram').innerHTML = "< " + hexagrams[0].getHexagram('title');
        }


    }, 950)
}

// INVERT FUNCTIONS
const invertButtons = document.querySelectorAll(".invertButton");
invertButtons[0].addEventListener("click", () => invertLines());
invertButtons[1].addEventListener("click", () => invertTrigrams());
invertButtons[2].addEventListener("click", () => invertPositions());
// Invert lines
function invertLines() {
    let inversedLines1 = []
    let inversedLines2 = []


    if(canInvert == true) {
        if(changeSelector.checked === true) {
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
        setTimeout(()=>{
            updateHexagram();
            canInvert = true;
        }, yinyangDuration / 2)
    }
    canInvert = true;
    getInfo();
}

// Invert trigrams
function invertTrigrams() {
    if(canInvert == true) {
        if(changeSelector.checked === true) {
        hexagrams[currentHexagram].lines.push(hexagrams[currentHexagram].lines.shift());
        hexagrams[currentHexagram].lines.push(hexagrams[currentHexagram].lines.shift());
        hexagrams[currentHexagram].lines.push(hexagrams[currentHexagram].lines.shift());
        } else {
            for( let i = 0; i < 2; i++ ) {
                hexagrams[i].lines.push(hexagrams[i].lines.shift());
                hexagrams[i].lines.push(hexagrams[i].lines.shift());
                hexagrams[i].lines.push(hexagrams[i].lines.shift());
            }
        }

        YingYangShow();
        canInvert = false;

        hexagrams[0].setInfo();
        hexagrams[1].setInfo();
        setTimeout(()=>{
            updateHexagram();
            canInvert = true;
        }, (yinyangDuration / 2))
    }
}

// Invert positions
function invertPositions() {
    if(canInvert == true) {

        if(changeSelector.checked === true) {
            hexagrams[currentHexagram].lines.reverse();
        } else {
            for( let i = 0; i < 2; i++ ) {
                hexagrams[i].lines.reverse();
            }
        }

        YingYangShow();
        canInvert = false;
        hexagrams[0].setInfo();
        hexagrams[1].setInfo();
        setTimeout(()=>{
            updateHexagram();
            canInvert = true;
        }, yinyangDuration / 2)
    }
}

// CONTROL SETTINGS

function YingYangShow() {

    if(currentHexagram == 0) {
        document.querySelector(".yinyangArea1").classList.add("show");
            setTimeout(()=>{
            document.querySelector(".yinyangArea1").classList.remove("show");
        }, yinyangDuration)
    } else if(currentHexagram == 1) {
        document.querySelector(".yinyangArea2").classList.add("show");
            setTimeout(()=>{
            document.querySelector(".yinyangArea2").classList.remove("show");
        }, yinyangDuration)
    }

}


document.querySelector(".nextHexagram").addEventListener("click", () => {
    slidesArea.style.marginLeft = "-36rem";
    currentHexagram = 1;
    setControls();
});

document.querySelector(".prevHexagram").addEventListener("click", () => {
    slidesArea.style.marginLeft = ".07rem"
    currentHexagram = 0;
    setControls();
})

function setControls() {
    if(hasTwoHexagrams) {
        if(currentHexagram == 0) {
            document.querySelector('.prevHexagram').style.opacity = 0;
            document.querySelector('.nextHexagram').style.opacity = 1;
        } else if(currentHexagram == 1) {
            document.querySelector('.prevHexagram').style.opacity = 1;
            document.querySelector('.nextHexagram').style.opacity = 0;
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

    for(let i = 0; i < templateLines.length; i++) {
        if(hexagrams[0].lines[i] == false && hexagrams[1].lines[i] == false) {
            templateLines[i].innerHTML = '<img src="assets/images/yinLine.png">'
        }
        if(hexagrams[0].lines[i] == true && hexagrams[1].lines[i] == true) {
            templateLines[i].innerHTML = '<img src="assets/images/yangLine.png">'
        }
        if(hexagrams[0].lines[i] == true && hexagrams[1].lines[i] == false) {
            templateLines[i].innerHTML = '<img src="assets/images/oLine.png">'
        }
        if(hexagrams[0].lines[i] == false && hexagrams[1].lines[i] == true) {
            templateLines[i].innerHTML = '<img src="assets/images/xLine.png">'
        }
    }
}

// Function to get the texts about the hexagrams and write on screen
function getAbout() {
    // show about area
    aboutArea = document.querySelector(".aboutArea")
    aboutArea.style.visibility = "visible";

    // set variables as empty
    sentence = "";
    general = "";
    love = "";
    business = "";
    personal  = "";
    overview = "";

    // select the source according to the current language
    aboutLang = [];
    // if(lang == "en") {
    //     aboutLang = about.en;
    // } else if(lang == "pt-br") {
    //     aboutLang = about.pt;
    // }

    // fill the variables with the values of the object about
    aboutLang.forEach(a => {
        if(hexagrams[currentHexagram].number == a.id) {
            sentence = a.sentence;
            general = a.general;
            love = a.love;
            business = a.business;
            personal  = a.personal;
            overview = a.overview;
        }
    })

    // write the texts on the screen
    // document.querySelector("#aboutQuote").innerHTML = sentence;
    // document.querySelector("#aboutTrigrams").innerHTML = <p class="about-title">:<span class="about-content "></span>${hexagrams[currentHexagram].upperTrigram + "sobre"} ` + hexagrams[currentHexagram].bottomTrigram</p>
    // document.querySelector("#aboutGeneral").innerHTML = `<p class="about-title">${(lang == "pt-br") ? ("Geral") : ((lang == "en") ? ("General") : (""))}:<span class="about-content">${general}</span>`
    // document.querySelector("#aboutLove").innerHTML = `<p class="about-title">${(lang == "pt-br") ? ("Amor") : ((lang == "en") ? ("Love") : (""))}:<span class="about-content">${love}</span>`
    // document.querySelector("#aboutBusiness").innerHTML = `<p class="about-title">${(lang == "pt-br") ? ("Negócios") : ((lang == "en") ? ("Business") : (""))}:<span class="about-content">${business}</span>`
    // document.querySelector("#aboutPersonal").innerHTML = `<p class="about-title">${(lang == "pt-br") ? ("Pessoal") : ((lang == "en") ? ("General") : (""))}:<span class="about-content">${personal}</span>`
    // document.querySelector("#aboutOverview").innerHTML = `<p class="about-title">${(lang == "pt-br") ? ("Visão geral") : ((lang == "en") ? ("Overview") : (""))}:<span class="about-content">${overview}</span>`

    aboutArea.style.display = 'block';
    aboutArea.addEventListener('click', () => {
        aboutArea.style.display = 'none';
    });


}
