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
    <title>Peaky Blinders | Video Game</title>
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
                <li><a href="home.php">Home</a> </li>
                <li><a href="characters.php">Characters</a> </li>
                <li><a href="episodes.php">Episodes</a> </li>
                <li><a href="about.php">About</a> </li>
                <li class="current"><a href="video_game.php">Video Game</a> </li>
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

    <section id="game">
        <div class="container">
            <h1 class="page-title">Peaky Blinders: Mastermind</h1>
            <p>
                Peaky Blinders: Mastermind is a puzzle-adventure game, based on the multi-award-winning BBC and Netflix TV show.
            </p>
            <p>
                Welcome to Birmingham, during the aftermath of the Great War. Set right before the events of Season One, Peaky Blinders: Mastermind lets you join the Shelby family's criminal gang. Follow the rise of Tommy as he successfully uncovers a sinister plot to put the family out of business, proving himself worthy of being the true mastermind of the Peaky Blinders.
            </p>
            <p>
                Mastermind refers to Tommy's ability to plan complex scenarios in his head. As the player, you get to exercise this power by taking control of key members of the Shelby family including Tommy, Arthur, Polly and more. Become the Mastermind as you freely reset and rewind each character's path in order to tune all of their actions for perfect coordination.
            </p>
            <div class="box">
                <img src="images/mastermind.gif" alt="mastermind">
                <h3>Purchase:</h3>
                <a href="https://store.steampowered.com/app/1013310/Peaky_Blinders_Mastermind/">Only for 8,49€ on Steam!</a>
                <p><iframe src="https://www.youtube.com/embed/-2W4bTnGMfQ" width="750" height="500"></iframe></p>
            </div>
        </div>
    </section>

<footer>
    <p>BBC, Copyright &copy; 2013</p>
</footer>

</body>
</html>