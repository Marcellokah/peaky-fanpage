<?php

  function loadUsers($path) {
    $users = [];

    $file = fopen($path, "r");
    if ($file === FALSE)
      die("ERROR: File could not be opened!");

    while (($line = fgets($file)) !== FALSE) {
      $user = unserialize($line);
      $users[] = $user;
    }

    fclose($file);
    return $users;
  }

  function saveUsers($path, $users) {
    $file = fopen($path, "w");
    if ($file === FALSE)
      die("ERROR: File could not be opened!");

    foreach($users as $user) {
      $serialized_user = serialize($user);
      fwrite($file, $serialized_user . "\n");
    }

    fclose($file);
  }

  function uploadProfilePicture($username) {
    global $fajlfeltoltes_hiba;

    if (isset($_FILES["profile-pic"]) && is_uploaded_file($_FILES["profile-pic"]["tmp_name"])) {
      $allowed_extensions = ["png", "jpg", "jpeg"];
      $extension = strtolower(pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION));

      if (in_array($extension, $allowed_extensions)) {
        if ($_FILES["profile-pic"]["error"] === 0) {
          if ($_FILES["profile-pic"]["size"] <= 31457280) {
            $path = "images/" . $username . "." . $extension;

            if (!move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $path)) {
              $fajlfeltoltes_hiba = "File could not be moved!";
            }
          } else {
            $fajlfeltoltes_hiba = "File is too big!";
          }
        } else {
          $fajlfeltoltes_hiba = "File upload has failed!";
        }
      } else {
        $fajlfeltoltes_hiba = "File extension is incorrect!";
      }
    }
  }

  function getProfilePicture($path, $username, $allowed_extensions) {
    $path = strtolower($path);
    $username = strtolower($username);

    foreach ($allowed_extensions as $extension) {
      $filename = $path . "/" . $username . "." . strtolower($extension);

      if (file_exists($filename))
        return $filename;
    }

    return "images/wink.png";
  }
?>