<!DOCTYPE html>
<html>
<head>
    <title>View Patrons</title>

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
        <h3>View Patrons</h3>
        <?php
            $filename = "data/"."patrons.txt";
            $fp =fopen($filename, 'r');
            $lines = count(file($filename));
            if($lines < 1)
            {
                print "<p>There are no Patrons</p>";
            }

            fclose($fp);

        ?>

        <table border="1">
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>City</th>
                <th>Birth Year</th>
            </tr>
            <?php
                $display = "";
                $lineCounter = 0;

                $filename = 'data/'.'patrons.txt';
                $fp = fopen($filename, 'r');
                while(true)
                {
                    $line = fgets($fp);

                    if (feof($fp)){
                        break;
                    }

                    $lineCounter++;

                    $lineEvenOrOdd = $lineCounter % 2;

                    if($lineEvenOrOdd == 0){
                        $style = "style='background-color: #white;'";
                    } else {
                        $style = "style='background-color: #F0E68C;'";
                    }

                    list($lastName, $firstName, $userEmail, $city, $birthYear) = explode('|', $line);

                    //adds data to table
                    $display .= "<tr $style>";
                    $display .= "<td>".$lastName."</td>";
                    $display .= "<td>".$firstName."</td>";
                    $display .= "<td>".$userEmail."</td>";
                    $display .= "<td>".$city."</td>";
                    $display .= "<td>".$birthYear."</td>";
                    $display .= "</tr>\n";  //added newline
                }

                fclose($fp);
                print $display;
            ?>
        </table>


    </main>
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
</body>
</html>