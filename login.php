<?php
  session_start();
  include "methods.php";
  $fiokok = loadUsers("users.txt"); 

  $uzenet = ""; 

  if (isset($_POST["login"])) {
    if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "" || !isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "") {
      $uzenet = "<strong>Error:</strong> Username or password is missing!";
    } else {
      $felhasznalonev = $_POST["felhasznalonev"];
      $jelszo = $_POST["jelszo"];

      $uzenet = "Wrong username or password!";

      foreach ($fiokok as $fiok) {
        if ($fiok["felhasznalonev"] === $felhasznalonev && $fiok["jelszo"] === $jelszo) {
          $uzenet = "Successful login!";
          $_SESSION["user"] = $fiok;
          header("Location: profile.php");
        }
      }
    }
  }
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
                <li><a href="home.php">Home</a> </li>
                <li><a href="characters.php">Characters</a> </li>
                <li><a href="episodes.php">Episodes</a> </li>
                <li><a href="about.php">About</a> </li>
                <li><a href="video_game.php">Video Game</a> </li>
                <?php if (isset($_SESSION["user"])) { ?>
                    <li><a href="profile.php">Profile</a> </li>
                    <li><a href="logout.php">Logout</a> </li>
                <?php } else { ?>
                    <li class="current"><a href="login.php">Login</a></li>
                    <li><a href="registration.php">Registration</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>

<section>
    <div class="container">
        <h1 class="page-title">Login</h1>
        <form class="login" action="login.php" method="POST">
            <fieldset>
                <label>Username: <input type="text" name="felhasznalonev"/></label> <br/>
                <label>Password: <input type="password" name="jelszo"/></label> <br/>
                <input type="submit" name="login"/> <br/><br/>
            </fieldset>
        </form>
        <?php echo $uzenet . "<br/>"; ?>
    </div>
</section>

<footer>
    <p>BBC, Copyright &copy; 2013</p>
</footer>

</body>
</html>