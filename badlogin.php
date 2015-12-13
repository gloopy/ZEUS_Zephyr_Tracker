<!DOCTYPE HTML>
<html>

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="keywords" content="ZEUS, Zephyr, NovAtel, tracker" />
		<meta name="viewport" content="initial-scale=1.0">
		<meta charset="utf-8">
        <title>ZEUS Zephyr Tracker</title>
        <link rel="stylesheet" type="text/css" href="styles.css" title="style" />
    </head>

    <body>
        <div id="main">
            <div id="header">
                <div id="logo">
                    <div id="logo_text">
                        <!-- class="logo_colour", allows you to change the colour of the text -->
                        <h1><a href="index.php">ZEUS</a></h1>
                        <under>Zephyr Tracker</under>
                    </div>
                </div>
                <div id="menubar">
                    <ul id="menu">
                        <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
						<li><a href="allraces.php">All Races</a></li>
                        <li class="selected"><a href="loginpage.php">Login</a></li>
                    </ul>
                </div>
            </div>
            <div id="site_content">
                <error>Incorrect username or password</error>
                <div id="content">

                    <p></p>
                    <body>Username</body>
                    <form action= "logincheck.php" method= "POST">
                        <input type="text" name="username" value="" />
                        <br>
                        <br>
                        <body>Password</body>
                        <br>
                        <input type="password" name="pword" value= "" />
                        <br>
                        <br>
                        <input type="submit" value="Login" />
                    </form>
                    <p></p>
                    <a href="register.php">Register for an account here.</a>
                    <p></p>

                </div>
            </div>
            <div id="content_footer"></div>
            <div id="footer">
				<a>Created by the University of Calgary ZEUS Racing Team</a>
            </div>
        </div>
    </body>
</html>
