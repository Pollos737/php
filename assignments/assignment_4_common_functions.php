<?php
/**
 * Created by PhpStorm.
 * User: wilme
 * Date: 3/5/2016
 * Time: 4:10 PM
 */

function getServer(){

    $server = $_SERVER['SERVER_NAME'];
    $positionFound = strpos($server, 'profperry');

    if ($positionFound === false)
    {
        $server = 'localhost';
    } else {
        $server = 'Practice Area';
    }

    print $server;
}

function doValidtion($firstName, $lastName, $userEmail, $city,$birthYear){

    $currentYear = date('Y');

    $errorFound ="n"; //If this variable is set to y, the program will exit
    $displayErrors = '';
    //This next code will make sure the fields were filled out
    if(empty($firstName))
    {
        $errorFound = "y";
        $displayErrors .="<p>Error: Please Enter First Name</p>";
    }
    if(empty($lastName))
    {
        $errorFound = "y";
        $displayErrors .= "<p>Error: Please Enter Last Name</p>";
    }
    if(empty($userEmail))
    {
        $displayErrors .= "<p>Error: Please Enter an Email</p>";
        $errorFound = "y";
    }
    if($city == "empty")
    {
        $displayErrors .= "<p>Error: Please Select A City</p>";
        $errorFound = "y";
    }
    if(empty($birthYear))
    {
        $displayErrors .= "<p>Error: Please Enter a Birth Year";
        $errorFound = "y";
    } elseif(!(is_numeric($birthYear)) || $birthYear < 1900 || $birthYear > $currentYear )
    {
        $displayErrors .= "<p>Error: Please enter a valid 4 digit number for birth year</p>";
        $errorFound = "y";
    }

    if($errorFound == "y")
    {
        print $displayErrors;
        print "<p>Go BACK and make the corrections above</p>";
        print "</body></html>";
        return exit;
    }

    return $displayErrors;

}