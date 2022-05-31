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
    <title>Peaky Blinders | Characters</title>
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
                <li class="current"><a href="characters.php">Characters</a> </li>
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

    <section id="character_list">
        <div class="container">
            <h1 class="page-title">Character list</h1>
                <ul id="cast">
                    <li>Cillian Murphy as Thomas "Tommy" Shelby, the leader of the Peaky Blinders.</li>
                    <li>Sam Neill as Chief Inspector/Major Chester Campbell (series 1–2), an Ulster Protestant policeman drafted from Belfast.</li>
                    <li>Helen McCrory as Elizabeth "Polly" Gray, née Shelby, the aunt of Tommy and his siblings, and treasurer of the Peaky Blinders.</li>
                    <li>Paul Anderson as Arthur Shelby Jr., the oldest Shelby sibling.</li>
                    <li>Annabelle Wallis as Grace Shelby (main series 1–3, recurring series 5), née Burgess, a former undercover agent and Irish Protestant. First wife of Tommy Shelby and the mother of his son Charles.</li>
                    <li>Iddo Goldberg as Freddie Thorne (series 1), a known communist who fought in the Great War; Ada's husband.</li>
                    <li>Sophie Rundle as Ada Thorne, née Shelby, the Shelby brothers' only sister.</li>
                    <li>Joe Cole as John "Johnny" Shelby (series 1–4), the third-youngest Shelby brother.</li>
                </ul>

            <article id="about-peaky-blinders">
                <h1>Casting</h1>
                <p>
                    You must also have <strong>no visible piercings or tattoos, false nails, tattooed/drawn eyebrows, eyelash extensions, and so forth.</strong>
                </p>
                <p>
                    Actors will be paid at PACT Equity rates, although travel and accommodation apparently will not be provided, with a daily expectation to “start early and finish late”. Certainly worth keeping in mind.
                </p>
                <p>
                    Applications are open until Friday the 3rd of January, 2021. So if you think you fit the bill – and happen to be both over the age of 16 and around Manchester early next year – send your name, address, age, location, and two selfies to apply@lbcastingltd.co.uk.
                </p>
            </article>

            <aside id="sidebar">
                <div class="dark">
                    <h3>Want to be featured in the next season?</h3>
                    <form class="casting">
                        <fieldset>
                            <legend>Personal data</legend>
                            <div>
                                <label>Name</label>
                                <input type="text" placeholder="Your name" required>
                            </div>
                            <div>
                                <label>Date of Birth</label>
                                <input type="date" required>
                            </div>
                            <div>
                                <label>Phone number</label>
                                <input type="tel" placeholder="Your phone number" required>
                            </div>
                            <div>
                                <label>Country</label>
                                <input type="text" placeholder="Country where you live" required>
                            </div>
                            <div>
                                <label>About you</label>
                                <textarea placeholder="About you..."></textarea>
                            </div>
                            <div>
                                <label>Send the form</label>
                                <input type="hidden">
                            </div>
                            <button class="button1" type="submit">Submit</button>
                            <button class="button1" type="reset">Reset</button>
                        </fieldset>
                    </form>
                </div>
            </aside>
        </div>
    </section>

<footer>
    <p>BBC, Copyright &copy; 2013</p>
</footer>

</body>
</html>