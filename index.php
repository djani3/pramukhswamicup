<!DOCTYPE HTML>
<!--
	Astral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Pramukh Cup 2018</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://www.google.com/jsapi" type="text/javascript"></script>
        <script src="assets/js/google-sheets-html.js" type="text/javascript"></script>
        <script src="assets/js/point-gs.js" type="text/javascript"></script>
        <script src="assets/js/point-gs2.js" type="text/javascript"></script>
        
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />


        <!-- PushAlert -->
<!--
        <script type="text/javascript">
                (function(d, t) {
                        var g = d.createElement(t),
                        s = d.getElementsByTagName(t)[0];
                        g.src = "https://cdn.pushalert.co/integrate_8b47cafea07b91cc0bc3ccb4344a1065.js";
                        s.parentNode.insertBefore(g, s);
                }(document, "script"));
        </script>
-->
        <!-- End PushAlert -->
        
	</head>
	<body class="is-preload">
        
            
            
		<!-- Wrapper-->
			<div id="wrapper">
                    <?php include 'checkstatus.php'; ?>
				<!-- Nav -->
					<nav id="nav">
						<a href="#home" class="icon fa-home"><span>Home</span></a>
						<a href="#matches" class="icon fa-trophy"><span>Matches</span></a>
						<a href="#schedule" class="icon fa-calendar-check-o"><span>Schedule</span></a>
						<a href="#points" class="icon fa-table"><span>Points</span></a>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Me -->
							<article id="home" class="panel about">
								<header>
                                    <img onclick="countClick()" id="logo" src="images/logo.png">
									<h2>PRAMUKH CUP 2018</h2>
                                    <p>&quot;Where&nbsp;<span
                                            class="txt-rotate"
                                            data-period="2500"
                                            data-rotate='[ "Samp", "Mahima", "Milan","Mafi","Madad" ]'>
                                        </span>&nbsp;Happens&quot;
                                    </p>
                                    
                                    <img src="images/bapa-img.jpg">
								</header>
							</article>

						<!-- Work -->
							<article id="matches" class="panel">
								<header>
                                    
                                    <canvas id="canvas"></canvas>
                                    <img style="width:100%;height:auto;" src="images/trophy.png">
                                    <p style="width:100%;text-align:center;font-family:cursive;font-size:20px;"><strong>Thank you to all the players for keeping <br>SAMP<br> throughout the tournament</strong><br>&#9733;<br>Special thanks to all of our lovely volunteers</p>
                                    
<!--
									<h2>Live Matches</h2>
                                    <hr>
                                    <div class="row">
                                        <div id="live">
-->
                                            <?php 
//                                                include 'live.php'; 
                                            ?>
<!--
                                        </div>
                                    </div>
                                    <h2>Past Matches</h2>
-->
                                    <hr>
                                    <div class="row past">
                                        <div id="past">
                                            <?php include 'past.php'; ?>
                                        </div>
                                        
                                    </div>
								</header>
							</article>

							<article id="schedule" class="panel">
								<header>
									<h2>Schedule</h2>
                                    <hr>
                                    <div id="showschedule">

                                    </div>
								</header>
							</article>
                        
                            <article id="points" class="panel">
								<header>
									<h2>Points Table</h2>
                                    <hr>
                                    <h3>Group A</h3>
                                    <div id="showpoints">
                                        
                                    </div>
                                    <br>
                                    <h3>Group B</h3>
                                    <div id="showpointsB">
                                        
                                    </div>
                                    <p>*Updated at the end of every game day.</p>
								</header>
							</article>

					</div>
                
                    <div id="id01" class="w3-modal">
                        <div class="w3-modal-content">
                          <div class="w3-container">
                            <form action="checkid.php" method="post">
                                <label>Enter PIN:</label>
                                <input name="userid" maxlength="4" type="number" placeholder="PIN" required>
                                <input type="submit">
                            </form>
                            <button class='btndelete' onclick="document.getElementById('id01').style.display='none'">Close</button>
                          </div>
                        </div>
                      </div>

				<!-- Footer -->
					<div id="footer">
                        <img src="images/footer.png" style="width:100%;max-width:368px;">
					</div>

			</div>

            <script>
                  var TxtRotate = function(el, toRotate, period) {
                  this.toRotate = toRotate;
                  this.el = el;
                  this.loopNum = 0;
                  this.period = parseInt(period, 10) || 2000;
                  this.txt = '';
                  this.tick();
                  this.isDeleting = false;
                };

                TxtRotate.prototype.tick = function() {
                  var i = this.loopNum % this.toRotate.length;
                  var fullTxt = this.toRotate[i];

                  if (this.isDeleting) {
                    this.txt = fullTxt.substring(0, this.txt.length - 1);
                  } else {
                    this.txt = fullTxt.substring(0, this.txt.length + 1);
                  }

                  this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

                  var that = this;
                  var delta = 200 - Math.random() * 100;//change Typing animation's speed here

                  if (this.isDeleting) { delta /= 2; }

                  if (!this.isDeleting && this.txt === fullTxt) {
                    delta = this.period;
                    this.isDeleting = true;
                  } else if (this.isDeleting && this.txt === '') {
                    this.isDeleting = false;
                    this.loopNum++;
                    delta = 500;
                  }

                  setTimeout(function() {
                    that.tick();
                  }, delta);
                };

                window.onload = function() {
                  var elements = document.getElementsByClassName('txt-rotate');
                  for (var i=0; i<elements.length; i++) {
                    var toRotate = elements[i].getAttribute('data-rotate');
                    var period = elements[i].getAttribute('data-period');
                    if (toRotate) {
                      new TxtRotate(elements[i], JSON.parse(toRotate), period);
                    }
                  }
                  // INJECT CSS
                  var css = document.createElement("style");
                  css.type = "text/css";
                  css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
                  document.body.appendChild(css);
                };
                
                
                
                setInterval(function() {
                    $("#live").load('live.php');
                    $("#past").load('past.php');
//                    $("#showschedule").load('schedule.php');
                  // method to be executed;
                }, 5000);
                
                var clicks = 0;
                function countClick(){
                    clicks++;
                    if (clicks == 5){
                        document.getElementById('id01').style.display='block';
                        clicks=0;
                    }
                }
                

            </script>

            <!-- Default Statcounter code for Pramukh Cup 2018 - Cricket
            https://pramukhcupchicago.me/ -->
            <script type="text/javascript">
            var sc_project=11817713; 
            var sc_invisible=1; 
            var sc_security="05c0976e"; 
            var sc_https=1; 
            </script>
            <script type="text/javascript"
            src="https://www.statcounter.com/counter/counter.js" async></script>
            <noscript><div class="statcounter"><a title="Web Analytics"
            href="http://statcounter.com/" target="_blank"><img class="statcounter"
            src="//c.statcounter.com/11817713/0/05c0976e/1/" alt="Web
            Analytics"></a></div></noscript>
            <!-- End of Statcounter Code -->
        
        
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

<!--document.getElementById('id01').style.display='block'-->


<style>
canvas {
  position: absolute;
  overflow-y: hidden;
  overflow-x: hidden;
  width: 100%;
  margin: 0;
  height: 300px;
}
</style>

<script>
let W = window.innerWidth;
let H = window.innerHeight;
const canvas = document.getElementById("canvas");
const context = canvas.getContext("2d");
const maxConfettis = 20;
const particles = [];

const possibleColors = [
  "DodgerBlue",
  "OliveDrab",
  "Gold",
  "Pink",
  "SlateBlue",
  "LightBlue",
  "Gold",
  "Violet",
  "PaleGreen",
  "SteelBlue",
  "SandyBrown",
  "Chocolate",
  "Crimson"
];

function randomFromTo(from, to) {
  return Math.floor(Math.random() * (to - from + 1) + from);
}

function confettiParticle() {
  this.x = Math.random() * W; // x
  this.y = Math.random() * H - H; // y
  this.r = randomFromTo(11, 33); // radius
  this.d = Math.random() * maxConfettis + 11;
  this.color =
    possibleColors[Math.floor(Math.random() * possibleColors.length)];
  this.tilt = Math.floor(Math.random() * 33) - 11;
  this.tiltAngleIncremental = Math.random() * 0.07 + 0.05;
  this.tiltAngle = 0;

  this.draw = function() {
    context.beginPath();
    context.lineWidth = this.r / 2;
    context.strokeStyle = this.color;
    context.moveTo(this.x + this.tilt + this.r / 3, this.y);
    context.lineTo(this.x + this.tilt, this.y + this.tilt + this.r / 5);
    return context.stroke();
  };
}

function Draw() {
  const results = [];

  // Magical recursive functional love
  requestAnimationFrame(Draw);

  context.clearRect(0, 0, W, window.innerHeight);

  for (var i = 0; i < maxConfettis; i++) {
    results.push(particles[i].draw());
  }

  let particle = {};
  let remainingFlakes = 0;
  for (var i = 0; i < maxConfettis; i++) {
    particle = particles[i];

    particle.tiltAngle += particle.tiltAngleIncremental;
    particle.y += (Math.cos(particle.d) + 3 + particle.r / 2) / 2;
    particle.tilt = Math.sin(particle.tiltAngle - i / 3) * 15;

    if (particle.y <= H) remainingFlakes++;

    // If a confetti has fluttered out of view,
    // bring it back to above the viewport and let if re-fall.
    if (particle.x > W + 30 || particle.x < -30 || particle.y > H) {
      particle.x = Math.random() * W;
      particle.y = -30;
      particle.tilt = Math.floor(Math.random() * 10) - 20;
    }
  }

  return results;
}

window.addEventListener(
  "resize",
  function() {
    W = window.innerWidth;
    H = window.innerHeight;
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  },
  false
);

// Push new confetti objects to `particles[]`
for (var i = 0; i < maxConfettis; i++) {
  particles.push(new confettiParticle());
}

// Initialize
canvas.width = W;
canvas.height = H;
Draw();

</script>