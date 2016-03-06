<!DOCTYPE html>
<html lang= "en">
<head>
    <title>Assignment 2 Register Success</title>
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

    <?php
    include "assignment_4_common_functions.php";
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $fullName = "$firstName $lastName";
    $userEmail = $_POST['userEmail'];
    $city = $_POST['city'];
    $birthYear = $_POST['birthYear'];
    $currentYear = date('Y');
    $age = $currentYear - $birthYear;

    doValidtion($firstName, $lastName, $userEmail, $city, $birthYear);

    //adding data to patrons.txt file
    $filename = 'data/'.'patrons.txt';
    $fp = fopen($filename, 'a');
    $outputIntoTextFile = $lastName.'|'.$firstName.'|'.$userEmail.'|'.$city.'|'.$birthYear.'|'."\n";
    fwrite($fp, $outputIntoTextFile);
    fclose($fp);



    print "<h3>Thank You for Registering!</h3>\n";
    print "<p>Name: $fullName</p>\n";
    print "<p>Email: $userEmail</p>\n";
    print "<p>City: $city</p>\n";

    if($age <= 15 )
    {
        print "<p>Section: Children</p>";
    } elseif($age > 15 && $age < 55)
    {
        print "<p>Section: Adult</p>";
    } else
    {
        print "<p>Section: Senior</p>";
    }

    ?>
    <div id="viewPatrons">
        <span>For Admin Use Only: </span><a href="assignment_4_view_patron.php">View Patrons</a>
    </div>
    <div id = "server">
        <?php

        getServer();
        ?>
    </div>

</main>
</body>
</html>