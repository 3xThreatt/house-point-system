<!DOCTYPE html>
<html lang="en" style="background-color: #00587c">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Long Bay college house points" />
    <meta name="author" content="Robin Nowlan" />
    <meta name="viewport" content="width=device-width, initial-scale=0.80" />
    <title>Long Bay College House Points</title>
    <script src="CCapture.all.min.js"></script>
    <script src="webm-writer-0.2.0.js"></script>
    <script src="download.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.js"></script>
    <?php ini_set('display_errors', 1);
          ini_set('display_startup_errors', 1);
          error_reporting(E_ALL);
          ?>
    <style>
      html,
      body {
        background-color: rgb(0, 88, 124);
        margin: 5;
      }
      .p5Canvas {
        display: block;
        background-color: rgb(0, 88, 124);
      }
      #canvas {
        width: 600px;
        float: left;
        background-color: rgb(0, 88, 124);
        padding: 0px;
        border-style: none;
        margin: 0px;
      }
      .pointBreakdown {
        display: block;
        margin-left: 605px;
        padding: 0;
        padding-left: 20px;
        font-family: "Calibri";
        height: 600px;
        background-color: rgb(0, 88, 124);
      }

      h1.pointsBreakdown{
        padding-bottom: 10px;
      }

      ul {
        list-style: none;
      }

      li {
        font-size: 17px;
        list-style: none;
      }

      h3{
        margin-bottom: 2px;
      }

      .takahe::before {
        content: "\2022";
        color: rgb(234, 76, 74);
        display: inline-block;
        width: 1em;
        margin-left: -1em;
      }

      .tieke::before {
        content: "\2022";
        color: rgb(252, 145, 62);
        display: inline-block;
        width: 1em;
        margin-left: -1em;
      }

      .tara::before {
        content: "\2022";
        color: rgb(255, 200, 72);
        display: inline-block;
        width: 1em;
        margin-left: -1em;
      }

      .kea::before {
        content: "\2022";
        color: rgb(138, 200, 83);
        display: inline-block;
        width: 1em;
        margin-left: -1em;
      }

      .kokako::before {
        content: "\2022";
        color: rgb(68, 124, 202);
        display: inline-block;
        width: 1em;
        margin-left: -1em;
      }
    </style>
  </head>

  <body>
    <?php include("controllers/datacontroller.php");?>
    <div id="canvas"></div>
    <div class="pointBreakdown">
     <h1>Points Breakdown</h1>
    <h3><u>Bird Art Competition</u></h3>
        <li class="kokako">Avalon Martin - 1st – Kokako – 5 pts</li>
        <li class="tara">Alice Dibble – 2nd - Tara iti – 3 pts</li>
        <li class="tieke">Sahara Brook – 3rd - Tieke – 2pts</li>

    <h3><u>Atawhai Quick Fire House Challenge</u></h3>
        <li class="tara">Tara iti – 1st – 149 challenges submitted – 5pts</li>
        <li class="tieke">Tieke – 2nd – 135 challenges submitted – 4pts</li>
        <li class="takahe">Takahe – 3rd – 116 challenges submitted – 3pts</li>
        <li class="kea">Kea – 4th – 104 challenges submitted – 2pts</li>
        <li class="kokako">Kokako – 5th – 85 challenges submitted – 1pt</li>
        
    <h3><u>Talent Quest</u></h3>
      <h4><i>Performance Category</i></h4>
        <li class="kea">Emily Cuff – 1st Performance Category – Kea - 5pts</li>
        <li class="takahe">Michael Read- Percival – 2nd Performance Category – Takahe - 3 pts</li>
        <li class="kokako">Gabby Dew – 3rd Performance Category – Kokako - 2 pts</li>
        <li>Ella Aguas and Libby Sheleg – Performance – Kea/Tieke – 1pt </li>
        <li>Kristen McCallum and Georgia Breeze – Performance – Takahe/Tara iti – 1pt</li>
        <li class="tieke">Mikayla Robson – Performance – Tieke – 1pt</li>
        <li class="tara">Katy Comar – Performance – Tara iti – 1pt</li>
        <li class="kokako"> Anna Gorbey – Performance – Kokako – 1pt</li>
        <li class="takahe">Daneil Gorbey – Performance – Takahe – 1 pt</li>

      <h4><i>Visual Arts Category</i></h4>
        <li class="kea">Ryo Nishikawa - 1st - Visual Arts Category Kea – 5pts</li>
        <li class="tara">Tia Maitland - 2nd - Visual Art Category – Tara iti - 3 pts</li>
        <li class="takahe">Hiu Kwan Lau - 3rd - Visual Arts Category – Takahe – 2pts</li>
        <li class="kea">Elise Cuff – Visual Arts - Kea – 1pt</li>
        <li class="kokako">Kiara-Jade Baker – Visual Arts – Kokako - 1pt</li>

    
    <h3><u>Cuppa with a Teacha Trivia</u></h3>
      <li class="tara">Mr Field – 1st – Tara iti - 5pts</li>
      <li class="takahe">Mr Parslow - 2nd – Takahe – 3pts</li>
      <li class="kea">Mr O’Leary – 3rd – Kea – 2 pts</li>
    </div>
    <button onclick="exportImage()">Export Image</button>
    <button onclick="exportVideo()">Export Video</button>
    <sub>Refresh the page to watch the animation again</sub>
  </body>
  <script>
    // Create a capturer that exports a WebM video
    const capturer = new CCapture({
      framerate: 60,
      format: "webm",
      name: "animation",
    })

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

    var TakaheCurrentPoint = "<?php echo $hTakahePoint; ?>";
    var TiekeCurrentPoint = "<?php echo $hTiekePoint; ?>";
    var TaraItiCurrentPoint = "<?php echo $hTaraItiPoint; ?>";
    var KeaCurrentPoint = "<?php echo $hKeaPoint; ?>";
    var KokakoCurrentPoint = "<?php echo $hKokakoPoint; ?>";

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
        "https://raw.githubusercontent.com/3xThreatt/house-point-system/main/LBC-logo.png "
      );
      data = loadJSON(
        "https://raw.githubusercontent.com/3xThreatt/house-point-system/main/data.json"
      );
      birdImgStr = [
        "https://raw.githubusercontent.com/3xThreatt/house-point-system/main/takehe.png",
        "https://raw.githubusercontent.com/3xThreatt/house-point-system/main/tieke.png",
        "https://raw.githubusercontent.com/3xThreatt/house-point-system/main/tara%20iti.png",
        "https://raw.githubusercontent.com/3xThreatt/house-point-system/main/kea.png",
        "https://raw.githubusercontent.com/3xThreatt/house-point-system/main/kokako.png",
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
      if (frameCount === 1) capturer.start();
      h++;
      mainScreenDraw();
      drawBars();
      capturer.capture(document.getElementById("defaultCanvas0"));
      if (frameCount == animationFrames) capturer.stop();
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

      let q = "Term 4 Week 3";
      textAlign(LEFT);
      textFont("Calibri").textStyle(BOLD);
      textSize(25).fill(255);
      text(q, 14, 200, 100, 150);

      let r = "Made By Robin N & Jamie D";
      textAlign(LEFT);
      textFont("Calibri").textStyle(ITALIC);
      textSize(8).fill(255);
      text(r, 14, 580, 100, 150);

      image(LBCLogoImg, 10, 412, 120, 147);

      textSize(22);
      textAlign(CENTER);

      let Takahe = "Takahē"; //"<#?php echo $hTakaheName; ?>"; Temporary fix!!!
      textAlign(CENTER);
      textSize(22);
      text(Takahe, xPos + 90 * 0, 523, 70, 523);

      let Tieke = "<?php echo $hTiekeName; ?>";
      textAlign(CENTER);
      textSize(22);
      text(Tieke, xPos + 90 * 1, 523, 70, 523);

      let TaraIti = "<?php echo $hTaraItiName; ?>";
      textAlign(CENTER);
      textSize(22);
      text(TaraIti, xPos + 90 * 2, 523, 70, 523);

      let Kea = "<?php echo $hKeaName; ?>";
      textAlign(CENTER);
      textSize(22);
      text(Kea, xPos + 90 * 3, 523, 70, 523);

      let Kokako = "<?php echo $hKokakoName; ?>";
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
    }

    function exportImage() {
      saveCanvas("housePoints", "png");
    }

    function exportVideo() {
      capturer.save();
    }
  </script>
</html>
