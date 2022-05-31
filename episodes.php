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
    <title>Peaky Blinders | Episodes</title>
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
                <li class="current"><a href="episodes.php">Episodes</a> </li>
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

    <section id="table">
        <div class="container">
        <h1 class="page-title">Seasons/Episodes</h1>
            <table id="seasons">
                <tr><th id="season">Season</th><th id="episode">Episode</th><th id="description">Description</th></tr>
                <tr><td headers="season">Season 1</td><td headers="episode">Episode 1</td><td headers="description">When a crate of guns goes missing, Thomas recognises an opportunity to move up in the world.</td></tr>
                <tr><td headers="season">Season 1</td><td headers="episode">Episode 2</td><td headers="description">Inspector Campbell carries out a vicious raid of Small Heath in search of the stolen guns.</td></tr>
                <tr><td headers="season">Season 1</td><td headers="episode">Episode 3</td><td headers="description">Thomas Shelby plans to go to Cheltenham races in order to get closer to Billy Kimber.</td></tr>
                <tr><td headers="season">Season 1</td><td headers="episode">Episode 4</td><td headers="description">Thomas Shelby's war with the Lee family of gypsies escalates and Campbell puts further pressure on him to deliver the stolen guns.</td></tr>
                <tr><td headers="season">Season 1</td><td headers="episode">Episode 5</td><td headers="description">Thomas Shelby has to deal with an IRA chief who has come to Small Heath to avenge his cousin's death.</td></tr>
                <tr><td headers="season">Season 1</td><td headers="episode">Episode 6</td><td headers="description">As Thomas Shelby prepares to oust Billy Kimber, hidden secrets are revealed and the family have to face up to the problems that have divided them.</td></tr>
                <tr><td headers="season">Season 2</td><td headers="episode">Episode 1</td><td headers="description">Tommy Shelby starts to expand his legal and illegal operations, with an eye on the racetracks of the south.</td></tr>
                <tr><td headers="season">Season 2</td><td headers="episode">Episode 2</td><td headers="description">Tommy offers to help Polly by searching for her children, who long ago were taken from her.</td></tr>
                <tr><td headers="season">Season 2</td><td headers="episode">Episode 3</td><td headers="description">Tommy hatches a plan to take control of the southern racecourses.</td></tr>
                <tr><td headers="season">Season 2</td><td headers="episode">Episode 4</td><td headers="description">Arthur spearheads a ferocious takeover of London's Eden Club.</td></tr>
                <tr><td headers="season">Season 2</td><td headers="episode">Episode 5</td><td headers="description">As Tommy struggles to save his family and regain the upper hand, May expresses her feelings for him, and he is paid a visit by an old friend.</td></tr>
                <tr><td headers="season">Season 2</td><td headers="episode">Episode 6</td><td headers="description">As derby day arrives, Tommy is faced with impossible decisions as he plans to strike back at his enemies and take the family business to another level.</td></tr>
            </table>
        </div>
    </section>

<footer>
    <p>BBC, Copyright &copy; 2013</p>
</footer>

</body>
</html>