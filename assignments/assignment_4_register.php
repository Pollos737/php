<!DOCTYPE html>
<html lang= "en">
<head>
    <title>Assignment 3 Register</title>
    <link rel= "stylesheet" type="text/css" href="css/KingLib_4.css" />
</head>

<body>
<div id="header">
    <a href="assignment_4.php">
        <img src= "images/KingLibLogo.jpg"
             alt = "King Library Header Logo"
             height= "84"  width="800" id= "header_image"/>
    </a>
</div>

<main>
    <div>
        <p id="sign_up">Please Sign Up</p>
    </div>

    <form method= "post" action= "assignment_4_add_patron.php">
        <p>
            First Name: <br />
            <input type="text" name="firstName" size="30" />
        </p>

        <p>
            Last Name: <br />
            <input type="text" name="lastName" size="30" />
        </p>

        <p>
            Email: <br />
            <input type="email" name="userEmail" size="30" />
        </p>
        <p>
            Birth Year: <br>
            <input type="text" name="birthYear" size="4" maxlength="4">
        </p>
        <p>
            City of Residence: <br/>
            <select name="city" size="1">
                <option value="empty">-</option>
                <?php
                    $filename = 'data/'.'cities.txt';

                    $fp =fopen($filename, 'r');
                    $numOfLines = count(file($filename));

                    for($i = 1; $i <= $numOfLines; $i++)
                    {
                        $line = fgets($fp);
                        print "<option value=".$line.">$line</option><br>\n";
                    }
                fclose($fp);
                ?>
            </select>
        </p>


        <p>
            <input type ="submit" value = "Submit Information"/>
        </p>
    </form>
    <div id="viewPatrons">
        <span>For Admin Use Only: </span><a href="assignment_4_view_patron.php">View Patrons</a>
    </div>
</main>
<div id = "server">
    <?php

    $server = $_SERVER['SERVER_NAME'];
    $positionFound = strpos($server, 'profperry');

    if ($positionFound === false)
    {
        $server = 'localhost';
    } else {
        $server = 'Practice Area';
    }

    print $server;
    ?>
</div>
</body>
</html>
