<!DOCTYPE html>
<html lang= "en">
<head>
    <title>Assignment 2 Register Success</title>
    <link rel= "stylesheet" type="text/css" href="css/KingLib_4.css" />
</head>

<body>
<div id="header">
    <a href="assignment_4_register.php">
        <img src= "images/KingLibLogo.jpg"
             alt = "King Library Header Logo"
             height= "84"  width="800" id= "header_image"/>
    </a>
</div>
<main>

    <?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $fullName = "$firstName $lastName";
    $userEmail = $_POST['userEmail'];
    $city = $_POST['city'];
    $birthYear = $_POST['birthYear'];
    $currentYear = date('Y');
    $age = $currentYear - $birthYear;

    $errorFound ="n"; //If this variable is set to y, the program will exit

    //This next code will make sure the fields were filled out
    if(empty($firstName))
    {
        print "<p>Error: Please Enter First Name</p>";
        $errorFound = "y";
    }
    if(empty($lastName))
    {
        print "<p>Error: Please Enter Last Name</p>";
        $errorFound = "y";
    }
    if(empty($userEmail))
    {
        print "<p>Error: Please Enter an Email</p>";
        $errorFound = "y";
    }
    if($city == "empty")
    {
        print "<p>Error: Please Select A City</p>";
        $errorFound = "y";
    }
    if(empty($birthYear))
    {
        print "<p>Error: Please Enter a Birth Year";
        $errorFound = "y";
    } elseif(!(is_numeric($birthYear)) || $birthYear < 1900 || $birthYear > $currentYear )
    {
        print "<p>Error: Please enter a valid 4 digit number for birth year</p>";
        $errorFound = "y";
    }

    if($errorFound == "y")
    {
        print "<p>Go BACK and make the corrections above</p>";
        print "</body></html>";
        return exit;
    }


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
    <div id="server">
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

</main>
</body>
</html>