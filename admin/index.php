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
        <script src="https://www.google.com/jsapi" type="text/javascript"></script>
        <script src="../assets/js/google-sheets-html.js" type="text/javascript"></script>
	</head>
	<body class="is-preload">

            <?php include 'conn.php'; include 'login.php'; ?>
		<!-- Wrapper-->
			<div id="wrapper">
                    <p class="padmin">--------&nbsp;ADMIN ONLY&nbsp;--------</p>
                    
				<!-- Nav -->
					<nav id="nav">
						<a href="#home" class="icon fa-home"><span>Home</span></a>
						<a href="#matches" class="icon fa-trophy"><span>Matches</span></a>
						<a href="#schedule" class="icon fa-calendar-check-o"><span>Schedule</span></a>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Me -->
							<article id="home" class="panel">
								<header>
                                    <h3 class="accordion-header">
                                        Create New Game    
                                    </h3>
                                    <div class="accordion-content">
                                        <p>
                                            <?php echo "<form action='create.php?user=$userid' method='post'>"; ?>
                                                <label>Name (Ex. "Match 10"):</label>
                                                <input autocomplete="off" name="matchinfo" type="text">
                                                <label>Team 1:</label>
                                                <select name="team1">
                                                    <option>---Select---</option>
                                                    <?php
                                                        $get_teams = "SELECT * FROM Teams";
                                                        $result = $conn->query($get_teams);
                                                        if (($result->num_rows) > 0){
                                                            while ($row = $result->fetch_assoc()){
                                                                $teamId = $row['id'];
                                                                $name = $row['name'];
                                                                echo "<option value='$teamId'>$name</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <label>Team 2:</label>
                                                <select name="team2">
                                                    <option>---Select---</option>
                                                    <?php
                                                        $get_teams = "SELECT * FROM Teams";
                                                        $result = $conn->query($get_teams);
                                                        if (($result->num_rows) > 0){
                                                            while ($row = $result->fetch_assoc()){
                                                                $teamId = $row['id'];
                                                                $name = $row['name'];
                                                                echo "<option value='$teamId'>$name</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <input type="submit" value="Create Game">
                                            </form>
                                        </p>
                                    </div>
                                    <h3 class="accordion-header">
                                        Edit Existing Game    
                                    </h3>
                                    <div class="accordion-content">
                                        <p>
                                            <?php echo "<form action='editgame.php?user=$userid' method='post'>"; ?>
                                                <label>Pick a Game:</label>
                                                <select name="matchid">
                                                    <option>---Select---</option>
                                                    <?php
                                                        $get_teams = "SELECT * FROM Matches";
                                                        $result = $conn->query($get_teams);
                                                        if (($result->num_rows) > 0){
                                                            while ($row = $result->fetch_assoc()){
                                                                $matchid = $row['id'];
                                                                $team1_num = $row['team1'];
                                                                $team2_num = $row['team2'];
                                                                $matchinfo = $row['match_info'];
                                                                $get_team1 = "SELECT * FROM Teams where id = '$team1_num'";
                                                                $get_team2 = "SELECT * FROM Teams where id = '$team2_num'";
                                                                $team1 = $conn->query($get_team1);
                                                                $team2 = $conn->query($get_team2);
                                                                if (($team1->num_rows) > 0){
                                                                    while ($row = $team1->fetch_assoc()){
                                                                        $team1_name = $row['name'];
                                                                    }
                                                                }
                                                                if (($team2->num_rows) > 0){
                                                                    while ($row = $team2->fetch_assoc()){
                                                                        $team2_name = $row['name'];
                                                                    }
                                                                }
                                                                echo "<option value='$matchid'>$matchinfo: $team1_name vs $team2_name</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <input type="submit" value="Edit Game">
                                            </form>    
                                        </p>
                                    </div>
                                    <a class='btnhome' href='../'>Return to User Home</a>
								</header>
							</article>
                        
						<!-- Work -->
							<article id="matches" class="panel">
								<header>
									<h2>Live Matches</h2>
                                    <hr>
                                    <div class="row">
                                        
                                         <div id="live">
                                            <?php include 'live.php'; ?>
                                        </div>
<!--
                                        <div class="match-cont">
                                            <div class="team-cont">
                                                <div>
                                                    <span>B</span>
                                                    <p>Bartlett W.</p>
                                                    <p class="score">221/5 (9.5)</p>
                                                </div>
                                                <div>
                                                    <span>S</span>
                                                    <p>Schaumburg</p>
                                                    <p class="score">0/0 (0)</p>
                                                </div>
                                            </div>
                                        </div>
-->
                                    </div>
                                    <h2>Past Matches</h2>
                                    <hr>
                                    <div class="row past">
                                       <div id="past">
                                            <?php include 'past.php'; ?>
                                        </div>
<!--
                                        <div class="match-cont">
                                            <div class="team-cont">
                                                <div>
                                                    <span>B</span>
                                                    <p>Bartlett W.</p>
                                                    <p class="score">221/5 (9.5)</p>
                                                </div>
                                                <div>
                                                    <span>S</span>
                                                    <p>Schaumburg</p>
                                                    <p class="score">0/0 (0)</p>
                                                </div>
                                            </div>
                                            <div class="results">
                                                Bartlett W. won the match
                                            </div>
                                        </div>
-->
                                    </div>
								</header>
							</article>

						<!-- Contact -->
							<article id="schedule" class="panel">
								<header>
									<h2>Schedule</h2>
                                    <hr>
                                    <div id="showschedule">
                                        
                                    </div>
                                        
								</header>
							</article>

					</div>

				<!-- Footer -->
					<div id="footer">
                        <img src="../images/footer.png" style="width:100%;max-width:368px;">
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

    <!-- Default Statcounter code for PC Cup Cricket - Admin
    https://pramukhcupchicago.me/admin/index.php -->
    <script type="text/javascript">
    var sc_project=11818719; 
    var sc_invisible=1; 
    var sc_security="b8ea6ec7"; 
    var sc_https=1; 
    </script>
    <script type="text/javascript"
    src="https://www.statcounter.com/counter/counter.js"
    async></script>
    <noscript><div class="statcounter"><a title="Web Analytics"
    href="http://statcounter.com/" target="_blank"><img
    class="statcounter"
    src="//c.statcounter.com/11818719/0/b8ea6ec7/1/" alt="Web
    Analytics"></a></div></noscript>
    <!-- End of Statcounter Code -->

</html>