// Variables declaration
let coins = document.querySelectorAll('.coin');
let coinsResult = [null, null, null];
let result = '';
let playCount = 1;
var coinsSound = new Audio("../../assets/sounds/coin.mp3");
var successSound = new Audio("../../assets/sounds/success.mp3");
let consultMessage = document.querySelector(".consultMessage");
let consultResult = document.querySelectorAll(".consultResult");

let movingLines = [];

const hexagramHeaders = document.querySelectorAll('.hexagramHeader');

function showQuestion() {
    consultMessage.innerHTML = "Sobre o que busca respostas?"
    document.querySelector('.startArea').style.display = 'none';
    document.querySelector('.questionArea').style.display = 'flex';
    document.querySelector('.conclusionArea').style.display = 'none';
    document.querySelector('.consultLines').style.visibility = 'hidden';
}
// Function to show game
function showGame() {
    // show and hide blocks
    document.querySelector('.consultArea').style.display = 'block';
    document.querySelector('.questionArea').style.display = 'none';

    document.querySelector('.gameArea').style.display = 'flex';
    document.querySelector('.startArea').style.display = 'none';
    document.querySelector('.conclusionArea').style.display = 'none';
    document.querySelector('.buttonsArea').style.visibility = 'hidden';
    document.querySelector('.consultLines').style.visibility = 'hidden';

    // document.querySelector('.consultButton').style.visibility = 'hidden';
    // document.querySelector('.aboutArea').style.display = 'none';
    // document.querySelector('.about-button').style.display ='none';
    // document.querySelector('.hintArea').style.display ='none';
    // document.querySelector('.aboutIChing').style.display ='none';

    hexagramHeaders[0].style.opacity = 0;
    hexagramHeaders[1].style.opacity = 0;
    // clear template
    clearTemplate();
    isConsulting = true;

    // set all lines null
    for( let i = 0; i < 2; i++ ) {
        hexagrams[i].lines = [null, null, null, null, null, null];
        updateHexagram();
    }
    // hide coins
    for( let i = 0; i < coins.length; i++ ) {
        coins[i].style.opacity = '0';
    }

    // set consult message in english or in portuguese

     consultMessage.innerHTML = "<strong>Concentre-se no que quer saber e jogue as moedas seis vezes</strong> <div class='consultSentence'>Jogue as moedas para tirar a primeira linha.</div>";


    // document.querySelector(".conclusionArea").style.display = "none";
    // document.querySelector(".gameArea").style.display = "flex";
    playCount = 1;

    // set toss coin button message

        document.querySelector('.coinsButton').innerText = "Jogar moedas";



    }

    // Function to flip the coins
let lastClick = 0;
function flipCoins() {
    let d = new Date();
    let t = d.getTime();
    // check click velocity
    if(t - lastClick  > 400) {
    // reset sound time
    coinsSound.currentTime = 0;
    // set result as null
    coinsResult = [null, null, null];
    // set coins result with a random value zero or one
    coinsResult[0] = Math.random() < 0.5 ? 0 :1;
    coinsResult[1] = Math.random() < 0.5 ? 0 :1;
    coinsResult[2] = Math.random() < 0.5 ? 0 :1;
    // set random coins positions
    marginRange = 25;
    leftM = [Math.floor(Math.random() * marginRange), Math.floor(Math.random() * marginRange), Math.floor(Math.random() * marginRange)];
    rightM = [Math.floor(Math.random() * marginRange), Math.floor(Math.random() * marginRange), Math.floor(Math.random() * marginRange)];
    topM = [Math.floor(Math.random() * marginRange), Math.floor(Math.random() * marginRange), Math.floor(Math.random() * marginRange)];
    bottomM = [Math.floor(Math.random() * marginRange), Math.floor(Math.random() * marginRange), Math.floor(Math.random() * marginRange)];

    angleValue = [(Math.floor(Math.random() * 361)), (Math.floor(Math.random() * 361)), (Math.floor(Math.random() * 361))];

    // reset coins
    resetCoins();

    for( let i = 0; i < coins.length; i++ ) {
        // change the side of the coins based on results
        if (coinsResult[i] == 0) {
            coins[i].classList.add('yin');
            coins[i].style.transform = `rotate(${angleValue[i]}deg) rotateY(180deg)`;
        } else {
            coins[i].classList.add('yang');
            coins[i].style.transform = `rotate(${angleValue[i]}deg)`;
        }

        // apply random margin on the coins
        coins[i].style.marginLeft = `${leftM[i]}px`;
        coins[i].style.marginRight = `${rightM[i]}px`;
        coins[i].style.marginTop = `${topM[i]}px`;
        coins[i].style.marginBottom = `${bottomM[i]}px`;

    }

    // verify count
    if(playCount <= 6) {
        // consultMessage.innerHTML += "<div class='consultSentence'>Esvazie a mente.</div>";
        let consultSentence = document.querySelector('.consultSentence')

        // play the sound of coins when toss
        if(playCount < 6) {
            coinsSound.play();
        }
        // hide the coins
        for( let i = 0; i < coins.length; i++ ) {
            coins[i].style.opacity = '0';
        }
        // wait some time for show the coins
        setTimeout(()=>{
            for( let i = 0; i < coins.length; i++ ) {
                coins[i].style.opacity = '1';
            }
            getResult();
            // increment the count
            playCount ++;
        }, 400);
        switch(playCount) {
            case 1: consultSentence.innerText = "Respire fundo!";
                break;
            case 2: consultSentence.innerText = "Esvazie a mente.";
                break;
            case 3: consultSentence.innerText = "Se concentre no vazio.";
                break;
            case 4: consultSentence.innerText = "Jogue as moedas para tirar a quinta linha.";
                break;
            case 5: consultSentence.innerText = "Jogue as moedas para a última linha.";
                break;
            case 6: consultSentence.innerText = "Revele o resultado!";
                break;
        }
    } else {

    }
    // verify if count is equal 6
    if(playCount == 6) {
        // wait some time for change the button text

        setTimeout(()=>{

            document.querySelector('.coinsButton').innerText = "Revelar";

        }, 700);

    } else {
        // set button text

        document.querySelector('.coinsButton').innerText = "Jogar moedas";

    }

    if(playCount >= 7) {
        // play success sound
        successSound.currentTime = 0;
        successSound.play();


        hexagrams[0].setInfo();
        hexagrams[1].setInfo();
        updateHexagram();

        let hexagramResult = null;
        document.querySelector('.gameArea').style.display = 'none';
        document.querySelector(".conclusionArea").style.display = "flex";

        document.querySelector('.consultLines').style.visibility = 'visible';

        // writeMovingLines();

        hexagramHeaders[0].style.opacity = 1;
        hexagramHeaders[1].style.opacity = 1;

        consultButton = document.querySelectorAll(".consultButton");
        // verify if has one or two hexagrams and change the message with the results in english or portuguese

        consultResult[0].innerText = `<strong>Você tirou o hexagrama: </strong> <em>${hexagrams[0].getHexagram()}</em>`;

        if(hasTwoHexagrams) {
            consultResult[1].innerText = `<strong>Desdobramento: </strong> <em>${hexagrams[1].getHexagram()}</em>`;
        } else {
            consultResult[1].innerText = 'Sem desdobramento.';
        }

        consultMessage.innerHTML = ` <span class="consultResult">${consultResult[0].innerText}</span><br><span class="consultResult">${consultResult[1].innerText}</span>`;


      //  document.querySelector(".gameArea").style.display = "none";

        isConsulting = false;

        // document.querySelector('.hexagramTitle1').innerHTML = "";
        // document.querySelector('.hexagramTitle2').innerHTML = "";
        // document.querySelector('.charactere1').innerHTML = "";
        // document.querySelector('.charactere2').innerHTML = "";

        // remove fade class
        document.querySelector('.hexagramTitle1').classList.remove('fade');
        document.querySelector('.hexagramTitle2').classList.remove('fade');
        document.querySelector('.charactere1').classList.remove('fade');
        document.querySelector('.charactere2').classList.remove('fade');
        document.querySelector('.hexagramNumber1').classList.remove('fade');
        document.querySelector('.hexagramNumber2').classList.remove('fade');

        // show the hexagrams titles on controllers
        document.querySelector('.nextHexagram').innerHTML = cutTitle(hexagrams[1].getHexagram()) + "  >";
        document.querySelector('.prevHexagram').innerHTML = "<  " + cutTitle(hexagrams[0].getHexagram());

        // show buttons area
        document.querySelector('.buttonsArea').style.visibility = 'visible';
        // hide game area
        // document.querySelector('.consultButton').style.visibility = 'hidden';
        // show about button

        document.querySelector('.about-button').style.display ='block';

        }
        lastClick = t;

    }

}



// Function to get coins results
function getResult() {
    // sum the number of coins results
    let resultSum = coinsResult.reduce((a,b)=>a+b);
    // verify the sum and set the line result
    if(resultSum == 1) {
        result = 'yin';
    } else if(resultSum == 2) {
        result = 'yang';
    }
    else if(resultSum == 0) {
        result = 'o';
    }
    else if(resultSum == 3) {
        result = 'x';
    }
    // set the lines according to the result
    if(result == 'yang') {
        hexagrams[0].lines[playCount -1] = true;
        hexagrams[1].lines[playCount -1] = true;
    }
    else if((result == 'yin')) {
        hexagrams[0].lines[playCount -1] = false;
        hexagrams[1].lines[playCount -1] = false;
    }
    else if((result == 'x')) {
        hexagrams[0].lines[playCount -1] = false;
        hexagrams[1].lines[playCount -1] = true;
    }
    else if((result == 'o')) {
        hexagrams[0].lines[playCount -1] = true;
        hexagrams[1].lines[playCount -1] = false;
    }

    updateHexagram();
    setControls();
}

// Function to reset the coins
function resetCoins() {
    // remove yin or yang classes
    for( let i = 0; i < coins.length; i++ ) {
        if(coins[i].classList.contains('yin') ) {
            coins[i].classList.remove('yin')
        }
        if(coins[i].classList.contains('yang') ) {
            coins[i].classList.remove('yang')
        }
    }
}

// Function to clear the template
function clearTemplate() {
    // set all template lines as empty
    for(let i = 0; i < templateLines.length; i++) {
        templateLines[i].innerHTML = ''
    }
}

// Exit game function
function exitGame() {
    // hide and show blocks

    consultMessage.innerHTML = "";
    //document.querySelector('.consultArea').style.display = 'block';
    document.querySelector('.startArea').style.display = 'flex';
    document.querySelector('.gameArea').style.display = 'none';
    document.querySelector('.conclusionArea').style.display = 'none';
    document.querySelector('.consultLines').style.visibility = 'hidden';
    document.querySelector('.buttonsArea').style.visibility = 'visible';
    document.querySelector('.consultButton').style.visibility = 'visible';
    document.querySelector('.about-button').style.display ='block';
    document.querySelector('.hintArea').style.display ='block';
    document.querySelector('.aboutIChing').style.display ='block';
}

// function writeMovingLines() {
//     console.log("Linhas móveis")
//     let consultLines = document.querySelectorAll('.consultLine');
//    document.querySelector('.consultLines').innerHTML = `<span>Linhas Móveis</span>`;
//    movingLines = [];
//     for(let i = 0; i <= consultLines.length; i++) {
//         let stringNumber = ""
//         switch(i) {
//             case 0:
//                 stringNumber = "primeira";
//                 break;
//             case 1:
//                 stringNumber = "segunda";
//                 break;
//             case 2:
//                 stringNumber = "terceira";
//                 break;
//             case 3:
//                 stringNumber = "quarta";
//                 break;
//             case 4:
//                 stringNumber = "quinta";
//                 break;
//             case 5:
//                 stringNumber = "sexta";
//                 break;
//         }

//         if(hexagrams[0].lines[i] == true && hexagrams[1].lines[i] == false) {
//             movingLines.push('Seis na ' + stringNumber + ' posição.');
//             console.log("entrou no seis")
//         }
//         if(hexagrams[0].lines[i] == false && hexagrams[1].lines[i] == true) {
//             movingLines.push('Nove na ' + stringNumber + ' posição.');
//             console.log("entrou no nove")
//         }

//         if(movingLines[i] !== undefined) {
//             document.querySelector('.consultLines').innerHTML += `<span>${movingLines[i]}</span>`
//             //consultLines[i].innerHtml = movingLines[i];
//         }
//         console.log(movingLines);
//         console.log(consultLines);

//     }
// }


// document.querySelector('.coinsButton').addEventListener('click', () => {
//     flipCoins();
// })


