<!DOCTYPE HTML>
<?php
include 'config.php';
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
                        <under>Zephyr Tracker</under>
                    </div>
                </div>
                <div id="menubar">
                    <ul id="menu">
                        <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
                        <li class="selected"><a href="index.php">Home</a></li>
                        <li><a href="about.php">About JP2A</a></li>
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
                    <bodybold>MOST RECENTLY CONVERTED IMAGES</bodybold><br><br>
                    <?php
                    $connected = new mysqli($Database_Address, $Database_User, $Database_Password, $Database_Name);
                    if ($connected->connect_errno > 0) {
                        die('Unable to connect to database [' . mysqli_connect_errno() . ']' . mysqli_connect_error());
                    }

                    $result = $connected->prepare("SELECT Image.image_ID, Image.title From Image WHERE Image.private = 0 ORDER BY image_ID DESC"); 

                    $result->execute();
                    $result->bind_result($ID, $title);
                    while ($result->fetch()) {
                        ?>
                        <a href="imageinfo.php?ID=<?php echo $ID ?>"><img src="Thumb/<?php echo $ID ?>.jpeg" title="<?php echo $title ?>"></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div id="content_footer"></div>
            <div id="footer">
                <a>Created by Indra Prasetyo | Christopher Smith | Neil Baskerville-Bridges | Jonathan Wan</a>
            </div>
        </div>
    </body>
</html>
