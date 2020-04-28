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
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	</head>
	<body class="is-preload">
            <?php include 'login.php'; ?>
		<!-- Wrapper-->
			<div id="wrapper">
                    <p class="padmin">--------&nbsp;ADMIN ONLY&nbsp;--------</p>
                    
				<!-- Nav -->
					<nav id="nav">
						<a href="#game" class="icon fa-edit"><span>Game</span></a>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Me -->
							<article id="game" class="panel">
								<header>
                                    <h3 class="accordion-header">
                                        <?php 
                                            include 'setup.php'; 
                                            echo $team1_name;
                                        ?> Innings
                                    </h3>
                                    <div class="accordion-content">
                                        <p>
                                            <form>
                                                <p class="lblgame">Score</p>
                                                <div class="valcont">
                                                    <span onclick="doScore1(0)" class="btnminus">-</span>
                                                    <span id="score1" class="txtvalue">0</span>
                                                    <span onclick="doScore1(1)" class="btnplus">+</span>
                                                </div>
                                                <p class="lblgame">Wickets</p>
                                                <div class="valcont">
                                                    <span onclick="doWickets1(0)" class="btnminus">-</span>
                                                    <span id="wickets1" class="txtvalue">0</span>
                                                    <span onclick="doWickets1(1)" class="btnplus">+</span>
                                                </div>
                                                <p class="lblgame">Overs</p>
                                                <div class="valcont">
                                                    <span onclick="doOvers1(0)" class="btnminus">-</span>
                                                    <span id="overs1" class="txtvalue">0.0</span>
                                                    <span onclick="doOvers1(1)" class="btnplus">+</span>
                                                </div>
                                            </form>
                                        </p>
                                    </div>
                                    <h3 class="accordion-header">
                                        <?php 
                                            echo $team2_name;
                                        ?> Innings    
                                    </h3>
                                    <div class="accordion-content">
                                        <p>
                                            <form>
                                                <p class="lblgame">Score</p>
                                                <div class="valcont">
                                                    <span onclick="doScore2(0)" class="btnminus">-</span>
                                                    <span id="score2" class="txtvalue">0</span>
                                                    <span onclick="doScore2(1)" class="btnplus">+</span>
                                                </div>
                                                <p class="lblgame">Wickets</p>
                                                <div class="valcont">
                                                    <span onclick="doWickets2(0)" class="btnminus">-</span>
                                                    <span id="wickets2" class="txtvalue">0</span>
                                                    <span onclick="doWickets2(1)" class="btnplus">+</span>
                                                </div>
                                                <p class="lblgame">Overs</p>
                                                <div class="valcont">
                                                    <span onclick="doOvers2(0)" class="btnminus">-</span>
                                                    <span id="overs2" class="txtvalue">0.0</span>
                                                    <span onclick="doOvers2(1)" class="btnplus">+</span>
                                                </div>
                                            </form> 
                                        </p>
                                    </div>
                                    <h3 class="accordion-header">
                                        End Game  
                                    </h3>
                                    <div class="accordion-content">
                                        <p>
                                            <?php echo "<form action='endgame.php?gameid=$gameid&user=$userid' method='post'>" ?>
                                                <label>Who Won:</label>
                                                <select name="winner">
                                                    <option>---Select---</option>
                                                    <?php 
                                                        echo "<option value='$team1_name'>$team1_name</option>
                                                              <option value='$team2_name'>$team2_name</option>
                                                        ";
                                                    ?>
                                                    
                                                </select>
                                                <input type="submit" value="End Game">
                                            </form>    
                                        </p>
                                    </div>
                
                                    <?php 
                                        echo "<a class='btndelete' href='delete.php?gameid=$gameid&user=$userid'>Delete Game</a>
                                              <a class='btnhome' href='../admin?user=$userid'>Return to Admin Home</a>
                                        ";
//                                           
                                    ?>
                                    
                                    

								</header>
							</article>

					</div>

				<!-- Footer -->
					<div id="footer">
						<ul class="copyright">
							<img src="../images/footer.png" style="width:100%;max-width:368px;">
						</ul>
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
                function refreshData()
                {
                  // Load the content of "path/to/script.php" into an element with ID "#container".
                  $('#addScores').load('pro_live.php');
                }

                // Execute every 5 seconds
                window.setInterval(refreshData, 5000);

            </script>
		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

	</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><script>
        $(document).ready(function()
        {
        /*	//Add Inactive Class To All Accordion Headers*/
            $('.accordion-header').toggleClass('inactive-header');

        /*	//Set The Accordion Content Width*/
            var contentwidth = $('.accordion-header').width();
            $('.accordion-content').css({'width' : contentwidth });

        /*	Open The First Accordion Section When Page Loads*/
            $('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
            $('.accordion-content').first().slideDown().toggleClass('open-content');

        /*	The Accordion Effect*/
            $('.accordion-header').click(function () {
                if($(this).is('.inactive-header')) {
                    $('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
                    $(this).toggleClass('active-header').toggleClass('inactive-header');
                    $(this).next().slideToggle().toggleClass('open-content');
                }

                else {
                    $(this).toggleClass('active-header').toggleClass('inactive-header');
                    $(this).next().slideToggle().toggleClass('open-content');
                }
            });

            return false;
        });
    </script>

    <script>
        
        document.getElementById('score1').innerHTML = score1;
        document.getElementById('wickets1').innerHTML = wickets1;
        document.getElementById('overs1').innerHTML = overs1+"."+balls1;
        document.getElementById('score2').innerHTML = score2;
        document.getElementById('wickets2').innerHTML = wickets2;
        document.getElementById('overs2').innerHTML = overs2+"."+balls2;
        
        function doScore1(num){
            if (num==0){
                if (score1>0){
                    score1--;
                }
            }
            else if (num==1){
                score1++;
            }
            document.getElementById('score1').innerHTML = score1;
            saveData();
        }
        function doWickets1(num){
            if (num==0){
                if (wickets1>0){
                    wickets1--;
                }
            }
            else if (num==1){
                if (wickets1<10){
                    wickets1++;
                }
                
            }
            document.getElementById('wickets1').innerHTML = wickets1;
            saveData();
        }
        function doOvers1(num){
            if (num==0){
                if (balls1<=0){
                    if (overs1!=0){
                        balls1 =5;
                        if (overs1>0){
                            overs1--;
                        }
                    }
                }
                else{
                    balls1--;
                }
            }
            else if (num==1){
                balls1++;
            }
            if (balls1==6){
                overs1++;
                balls1=0;
            }
            document.getElementById('overs1').innerHTML = overs1+"."+balls1;
            saveData();
        }
        function doScore2(num){
            if (num==0){
                if (score2>0){
                    score2--;
                }
            }
            else if (num==1){
                score2++;
            }
            document.getElementById('score2').innerHTML = score2;
            saveData();
        }
        function doWickets2(num){
            if (num==0){
                if (wickets2>0){
                    wickets2--;
                }
            }
            else if (num==1){
                if (wickets2<10){
                    wickets2++;
                }
            }
            document.getElementById('wickets2').innerHTML = wickets2;
            saveData();
        }
        function doOvers2(num){
            if (num==0){
                if (balls2<=0){
                    if (overs2!=0){
                        balls2 =5;
                        if (overs2>0){
                            overs2--;
                        }
                    }
                }
                else{
                    balls2--;
                }
            }
            else if (num==1){
                balls2++;
            }
            if (balls2==6){
                overs2++;
                balls2=0;
            }
            document.getElementById('overs2').innerHTML = overs2+"."+balls2;
            saveData();
        }
        function saveData(){

             
             $.ajax({
                type: 'POST',
                url: 'process.php',
                data: { score1: score1, wickets1: wickets1,overs1: overs1+"."+balls1, score2: score2,wickets2: wickets2, overs2: overs2+"."+balls2,gameid:gameid},
                success: function(response) {
                    
                }
            });
        }
    </script>

</html>