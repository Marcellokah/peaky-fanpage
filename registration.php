<?php
  session_start();
  include "methods.php";
  $fiokok = loadUsers("users.txt");

  $hibak = [];

  if (isset($_POST["regiszt"])) { 
    if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "")
      $hibak[] = "Username is required!";

    if (!isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "" || !isset($_POST["jelszo2"]) || trim($_POST["jelszo2"]) === "")
      $hibak[] = "Password is required twice!";

    if (!isset($_POST["eletkor"]) || trim($_POST["eletkor"]) === "")
      $hibak[] = "Age is required!";

    if (!isset($_POST["nem"]) || trim($_POST["nem"]) === "")
      $hibak[] = "Gender is required!";

    if (!isset($_POST["hobbik"]) || count($_POST["hobbik"]) < 1)
      $hibak[] = "At least one interest is required!";

    $felhasznalonev = $_POST["felhasznalonev"];
    $jelszo = $_POST["jelszo"];
    $jelszo2 = $_POST["jelszo2"];
    $eletkor = $_POST["eletkor"];
    $nem = NULL;
    $hobbik = NULL;

    if (isset($_POST["nem"]))
      $nem = $_POST["nem"];
    if (isset($_POST["hobbik"]))
      $hobbik = $_POST["hobbik"];

    foreach ($fiokok as $fiok) {
      if ($fiok["felhasznalonev"] === $felhasznalonev)
        $hibak[] = "This username is unavailable!";
    }

    if (strlen($jelszo) < 8)
      $hibak[] = "Password has to be at least 8 characters long!";

    if ($jelszo !== $jelszo2)
      $hibak[] = "The passwords are not matching!";

    if ($eletkor < 18)
      $hibak[] = "You need to be 18 years old or older.";

    $fajlfeltoltes_hiba = "";
    uploadProfilePicture($felhasznalonev);

    if ($fajlfeltoltes_hiba !== "")
      $hibak[] = $fajlfeltoltes_hiba;

    if (count($hibak) === 0) {
      $fiokok[] = ["felhasznalonev" => $felhasznalonev, "jelszo" => $jelszo, "eletkor" => $eletkor, "nem" => $nem, "hobbik" => $hobbik];
      saveUsers("users.txt", $fiokok);
      $siker = TRUE;
      header("Location: login.php");
    } else {
      $siker = FALSE;
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
                    <li><a href="login.php">Login</a></li>
                    <li class="current"><a href="registration.php">Registration</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>

<section>
    <div class="container">
        <h1 class="page-title">Registration</h1>
        <form class="signup" action="registration.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <label>Username: <input type="text" name="felhasznalonev" value="<?php if (isset($_POST['felhasznalonev'])) echo $_POST['felhasznalonev']; ?>"/></label> <br/>
                <label>Password: <input type="password" name="jelszo"/></label> <br/>
                <label>Password again: <input type="password" name="jelszo2"/></label> <br/>
                <label>Age: <input type="number" name="eletkor" value="<?php if (isset($_POST['eletkor'])) echo $_POST['eletkor']; ?>"/></label> <br/>
                Gender:
                <label><input type="radio" name="nem" value="M" <?php if (isset($_POST['nem']) && $_POST['nem'] === 'M') echo 'checked'; ?>/> Male</label>
                <label><input type="radio" name="nem" value="F" <?php if (isset($_POST['nem']) && $_POST['nem'] === 'F') echo 'checked'; ?>/> Female</label> <br/>
                Interest(s):
                <label><input type="checkbox" name="hobbik[]" value="whisky" <?php if (isset($_POST['hobbik']) && in_array('whisky', $_POST['hobbik'])) echo 'checked'; ?>/> Whisky</label>
                <label><input type="checkbox" name="hobbik[]" value="cigarette" <?php if (isset($_POST['hobbik']) && in_array('cigarette', $_POST['hobbik'])) echo 'checked'; ?>/> Cigarettes</label>
                <label><input type="checkbox" name="hobbik[]" value="gun" <?php if (isset($_POST['hobbik']) && in_array('gun', $_POST['hobbik'])) echo 'checked'; ?>/> Guns</label>
                <label><input type="checkbox" name="hobbik[]" value="suit" <?php if (isset($_POST['hobbik']) && in_array('suit', $_POST['hobbik'])) echo 'checked'; ?>/> Suits</label> <br/>
                <label>Profile picture: <input type="file" name="profile-pic" accept="image/*"/></label> <br/>
                <input type="submit" name="regiszt"/> <br/><br/>
            </fieldset>
        </form>
        <?php
        if (isset($siker) && $siker === TRUE) {
            echo "<p>Successful registration!</p>";
        } else {
            foreach ($hibak as $hiba) {
                echo "<p>" . $hiba . "</p>";
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