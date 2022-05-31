<?php
  session_start();
  include "methods.php";

  if (!isset($_SESSION["user"])) {
  	header("Location: login.php");
  }

  function nemet_konvertal($betujel) {
  	switch ($betujel) {
  		case "M" : return "Male"; break;
  		case "F" : return "Female"; break;
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
                    <li class="current"><a href="profile.php">Profile</a> </li>
                    <li><a href="logout.php">Logout</a> </li>
                <?php } else { ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="registration.php">Registration</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>

<section>
    <div class="container">
        <h1 class="page-title">My Profile</h1>

        <?php
        $utvonal = "images";
        $felhasznalonev = $_SESSION["user"]["felhasznalonev"];
        $kiterjesztesek = ["png", "jpg", "jpeg"];

        $profilkep = getProfilePicture($utvonal, $felhasznalonev, $kiterjesztesek);
        ?>

        <table class="profile-data">
            <tr>
                <th colspan="2">
                    <img src="<?php echo $profilkep; ?>" alt="Profile picture" height="200"/>
                    <?php if ($_SESSION["user"]["felhasznalonev"] !== "default") {?>
                        <form action="profile.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="profile-pic" accept="image/*"/>
                            <input type="submit" name="upload-btn" value="edit profile-pic"/>
                        </form>
                    <?php } ?>
                </th>
            </tr>
            <tr>
                <th>Username:</th>
                <td><?php echo $_SESSION["user"]["felhasznalonev"]; ?></td>
            </tr>
            <tr>
                <th>Age:</th>
                <td><?php echo $_SESSION["user"]["eletkor"]; ?></td>
            </tr>
            <tr>
                <th>Gender:</th>
                <td><?php echo nemet_konvertal($_SESSION["user"]["nem"]); ?></td>
            </tr>
            <tr>
                <th>Interest(s):</th>
                <td><?php echo implode(", ", $_SESSION["user"]["hobbik"]); ?></td>
            </tr>
        </table>

        <?php

        if (isset($_POST["upload-btn"]) && is_uploaded_file($_FILES["profile-pic"]["tmp_name"])) {
            $fajlfeltoltes_hiba = "";
            uploadProfilePicture($_SESSION["user"]["felhasznalonev"]);

            $kit = strtolower(pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION));
            $utvonal = "images/" . $_SESSION["user"]["felhasznalonev"] . "." . $kit;


            if ($fajlfeltoltes_hiba === "") {
                if ($utvonal !== $profilkep && $profilkep !== "images/default.png") {
                    unlink($profilkep);
                }

                header("Location: profile.php");
            } else {
                echo "<p>" . $fajlfeltoltes_hiba . "</p>";
            }
        }
        ?>
    </div>
</section>

<footer>
    <p>BBC, Copyright &copy; 2013</p>
</footer>

</body>
</html>