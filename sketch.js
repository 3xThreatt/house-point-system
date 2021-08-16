// Create a capturer that exports a WebM video
var capturer = new CCapture({ format: "webm" });

let animationFrames = 600;

let data; //JSON data file
let LBCLogoImg; //LBC logo
var birdImgStr = [];
let birdImg = [];

let max, min; //Minimum and maxiamum bar size
var xPos = 147; //X pos offset
let h = 0;
let barSize = [];
let framePerBar = [];

var TakaheCurrentPoint = "112";
var TiekeCurrentPoint = "65";
var TaraItiCurrentPoint = "95";
var KeaCurrentPoint = "94";
var KokakoCurrentPoint = "70";

let CurrentPointArray = [
  TakaheCurrentPoint,
  TiekeCurrentPoint,
  TaraItiCurrentPoint,
  KeaCurrentPoint,
  KokakoCurrentPoint,
];

//Loads the images and data from github
function preload() {
  LBCLogoImg = loadImage(
    "https://raw.githubusercontent.com/17177/HousePointsSystem/main/LBC-logo.png"
  );
  data = loadJSON(
    "https://raw.githubusercontent.com/17177/HousePointsSystem/main/data.json"
  );
  birdImgStr = [
    "https://raw.githubusercontent.com/17177/HousePointsSystem/main/takehe.png",
    "https://raw.githubusercontent.com/17177/HousePointsSystem/main/tieke.png",
    "https://raw.githubusercontent.com/17177/HousePointsSystem/main/tara%20iti.png",
    "https://raw.githubusercontent.com/17177/HousePointsSystem/main/kea.png",
    "https://raw.githubusercontent.com/17177/HousePointsSystem/main/kokako.png",
  ];

  for (i = 0; i < 5; i++) {
    birdImg[i] = loadImage(birdImgStr[i]);
  }
}

function setup() {
  frameRate(60);
  var myCanvas = createCanvas(600, 600);
  myCanvas.parent("canvas");
  mainScreenDraw();
  barCalc();
}

function draw() {
    if(frameCount === 1) capturer.start();
  h++;
  mainScreenDraw();
  drawBars();
  capturer.capture(document.getElementById('defaultCanvas0'));
  if(frameCount == animationFrames) capturer.stop();
}

function mainScreenDraw() {
  //Sets up the main background of the screen
  background(255);
  rectMode(CORNER).fill(0, 88, 124);
  rect(6, 5, 125.597, 584.629);
  rect(136, 5, 457, 584.629);

  let s = "House Leader Board";
  textAlign(LEFT);
  textFont("Calibri").textStyle(BOLD);
  textSize(35).fill(255);
  text(s, 14, 30, 160, 150);

  let q = "Term 2 Week 10";
  textAlign(LEFT);
  textFont("Calibri").textStyle(BOLD);
  textSize(25).fill(255);
  text(q, 14, 200, 100, 150);

  let r = "Made By Robin N";
  textAlign(LEFT);
  textFont("Calibri").textStyle(ITALIC);
  textSize(8).fill(255);
  text(r, 14, 580, 100, 150);

  image(LBCLogoImg, 10, 412, 120, 147);

  textSize(22);
  textAlign(CENTER);

  let Takahe = "Takahe";
  textAlign(CENTER);
  textSize(22);
  text(Takahe, xPos + 90 * 0, 523, 70, 523);

  let Tieke = "Tïeke";
  textAlign(CENTER);
  textSize(22);
  text(Tieke, xPos + 90 * 1, 523, 70, 523);

  let TaraIti = "Tara Iti";
  textAlign(CENTER);
  textSize(22);
  text(TaraIti, xPos + 90 * 2, 523, 70, 523);

  let Kea = "Kea";
  textAlign(CENTER);
  textSize(22);
  text(Kea, xPos + 90 * 3, 523, 70, 523);

  let Kokako = "Kōkako";
  textAlign(CENTER);
  textSize(22);
  text(Kokako, xPos + 90 * 4, 523, 70, 523);
}

function barCalc() {
  max = Math.max(
    TakaheCurrentPoint,
    TiekeCurrentPoint,
    TaraItiCurrentPoint,
    KeaCurrentPoint,
    KokakoCurrentPoint
  );

  min = Math.min(
    TakaheCurrentPoint,
    TiekeCurrentPoint,
    TaraItiCurrentPoint,
    KeaCurrentPoint,
    KokakoCurrentPoint
  );

  for (b = 0; b < 5; b++)
    barSize[b] = [map(CurrentPointArray[b], min, max, 375, 85)];
  print(barSize);
  mainScreenDraw();
}

function drawBars() {
  if (frameCount < 500) {
    if (frameCount < 100) {
      drawBarPerHouse(0, map(frameCount, 0, 100, 500 - barSize[0], 0));
    }
    if (frameCount < 200) {
      drawBarPerHouse(1, map(frameCount, 0, 200, 500 - barSize[1], 0));
    }
    if (frameCount < 300) {
      drawBarPerHouse(2, map(frameCount, 0, 300, 500 - barSize[2], 0));
    }
    if (frameCount < 400) {
      drawBarPerHouse(3, map(frameCount, 0, 400, 500 - barSize[3], 0));
    }
    if (frameCount < 500) {
      drawBarPerHouse(4, map(frameCount, 0, 500, 500 - barSize[4], 0));
    }
  }

  if (frameCount > 100) {
    drawBarPerHouse(0, 0);
  }
  if (frameCount > 200) {
    drawBarPerHouse(1, 0);
  }
  if (frameCount > 300) {
    drawBarPerHouse(2, 0);
  }
  if (frameCount > 400) {
    drawBarPerHouse(3, 0);
  }
  if (frameCount > 500) {
    drawBarPerHouse(4, 0);
  }

  function drawBarPerHouse(i, z) {
    //Draw Bar rectangle
    rectMode(CORNERS).noStroke().fill(data.houses[i].colour);
    rect(xPos + 90 * i, 510, xPos + 70 + 90 * i, barSize[i] - 5 + z);

    //Draw bird image at top of the bar
    image(birdImg[i], xPos + 90 * i, barSize[i] - 35 + z, 70, 70);

    //Draws text at top of bar
    if (z > 0) {
      fill(255).text(
        Math.floor(map(z, 500, 0, 0, CurrentPointArray[i])),
        35 + xPos + 90 * i,
        barSize[i] - 40 + z
      );
    } else {
      fill(255).text(
        CurrentPointArray[i],
        35 + xPos + 90 * i,
        barSize[i] - 40 + z
      );
    }
  }

  function exportImage() {
    saveCanvas("housePoints" + Date.now(), "png");
  }

  function exportVideo() {
      capturer.save();
  }
}
