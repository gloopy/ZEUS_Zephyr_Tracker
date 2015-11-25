<!DOCTYPE HTML>
<?php
session_start();
?>
<html>
<head>
	<title>ZEUS Zephyr Tracker</title>
	<meta name="description" content="website description" />
	<meta name="keywords" content="website keywords, website keywords" />
	<meta http-equiv="content-type" content="text/html; charset=windows-1252" />
	<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
</head>

<body>
        <div id="main">
            <div id="header">
                <div id="logo">
                    <div id="logo_text">
                        <!-- class="logo_colour", allows you to change the colour of the text -->
                        <h1><a href="index.php">ZEUS</a></h1>
                        <under>ZEUS Zephyr Tracker</under>
                    </div>
                </div>
                <div id="menubar">
                    <ul id="menu">
                        <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
                        <li><a href="index.php">Home</a></li>
                        <li class="selected"><a href="about.php">About JP2A</a></li>
                        <?php
                        if (empty($_SESSION["username"])) {
                            ?>
                            <li><a href="loginpage.php">Login</a></li>
                            <?php
                        } else if (!empty($_SESSION["username"])) {
                            ?>
                            <li><a href="UserCP.php">User: <?php
                        if (!empty($_SESSION["username"])) {
                            echo $_SESSION["username"];
                        }
                            ?> CP</a></li> 
                            <li><a href = "UploadImage.php" title ="Upload Image">Upload Image</a></li>
                            <li><a href="logout.php" tite="Logout">Logout</a></li>              
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
	    <div id="site_content">
		<div id="content">
		    <!-- insert the page content here -->
<img src="./Content/jp2a_ascii.png" alt="JP2A" style="width:300px; height:100px"><br>					
JP2A is a small, lightweight terminal utility created by Cristian Larsen to convert jpg images into
					ASCII art. JP2AWESOME is an online client-server implementation of the software that we did as our final
					project for SENG401 (Software Architecture). <br><br>Once you've registered you can get converting like a thug. Ain't no stopping this conversion train. You want conversion options? We've got those up the wazoo. You wanna convert a .PNG or a .BMP picture? You giver, we got ALL KINDSA format conversion support.
					<br><br>For more information on JP2A, click <a href = "https://csl.name/jp2a/">here</a> to go to the JP2A website.<br>

				</body>
<br>Our server, running out of Calgary Alberta, proves that it doesn't take much to do great things.<br>

<img src="./Content/server.jpeg" alt="SERVER" style="width:400px; height:300px" ><br>					
<i>"The machine behind the magic"</i><br><br>

Assembeld by our team of software wiz kidz at JP2AWESOME, it features:<br>
 - The Puppy Linux operating system<br>
 - 1GB of RAM<br>
 - 40GB of Hardrive space<br>
 - 2002 pentium 4 CPU<br>
 - A 10 or 15 year old Power Supply<br>
This little engine won't stop till its dying breath to provide the best image conversion services on the planet. JP2AWESOME is a brand name that will soon be making its way into homes all across the globe.<br>
		</div>
	    </div>
            <div id="content_footer"></div>
            <div id="footer">
                <a>Created by Indra Prasetyo | Christopher Smith | Neil Baskerville-Bridges | Jonathan Wan</a>
            </div>
        </div>
    </body>
</html>
