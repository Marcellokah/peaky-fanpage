<?php
session_start();
include "methods.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="It's a lame fan page or something like that.">
    <meta name="authors" content="Almási Marcell, Pozsgai Máté">
    <title>Peaky Blinders | Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Peaky Blinders</h1>
            </div>
            <nav>
                <ul>
                    <li class="current"><a href="home.php">Home</a> </li>
                    <li><a href="characters.php">Characters</a> </li>
                    <li><a href="episodes.php">Episodes</a> </li>
                    <li><a href="about.php">About</a> </li>
                    <li><a href="video_game.php">Video Game</a> </li>
                    <?php if (isset($_SESSION["user"])) { ?>
                        <li><a href="profile.php">Profile</a> </li>
                        <li><a href="logout.php">Logout</a> </li>
                    <?php } else { ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="registration.php">Registration</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>

    <section id="showcase">
        <div class="container">
            <h1>By order of the Peaky Blinders.</h1>
            <p>Peaky Blinders is a British period crime drama television series created by Steven Knight. Set in Birmingham, England, the series follows the exploits of the Shelby crime family in the direct aftermath of the First World War.</p>
            <h3><em> Theme song </em></h3>
                <audio controls>
                <source src="theme.mp3" type="audio/mpeg"/>
                </audio>
        </div>
    </section>

    <section id="weekly_game">
        <div class="container">
            <h1>Subscribe to our weekly game to win an original peaky hat from the show.</h1>
            <form>
                <input type="email" placeholder="Enter your email address.">
                <button type="submit" class="button1">Subscribe</button>
            </form>
        </div>
    </section>

    <section id="shelby_boys">
        <div class="container">
            <div class="box">
                <img src="images/arthur_home.jpg" alt = "Arthur Shelby">
                <div class = "Arthur"> 
                    <h3>Arthur Shelby Jr.</h3>
                    <p>The oldest Shelby sibling.</p>
                </div>   
            </div>
            <div class="box">
                <img src="images/thomas_home.jpg" alt="Thomas Shelby">
                <h3>Thomas Shelby</h3>
                <p>The leader of the Peaky Blinders.</p>
            </div>
            <div class="box">
                <img src="images/john_home.jpg" alt = "John Shelby">
                <h3>John Shelby</h3>
                <p>The third-youngest Shelby brother.</p>
            </div>
        </div>
    </section>

    <section>
        <div class = "container">
            <div class="click_here">
                <h2>Get the look, click on the hat!</h2>
            </div>
        </div>

    </section>

    <section id = "amazon">
        <div class="container">
           
            <img src="images/Tommy.jpg" alt="thomas" usemap="#hat">
            <map name="hat">
                <area shape="rect" alt="amazon-hat" coords="90,30,200,100" href="https://www.amazon.com/Wonderful-Fashion-Herringbone-Newsboy-DK-Grey/dp/B0103JEQYS/ref=sr_1_6?dchild=1&keywords=Peaky+Blinders+Hat&qid=1616084962&sr=8-6" target="_blank">
            </map>
    
        </div>
    </section>

    <footer>
        <p>BBC, Copyright &copy; 2013</p>
    </footer>

</body>
</html>