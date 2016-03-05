<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <title>6.13 Finding Text</title>
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center">Search For A City!</h1>
    <div class = 'container-fluid'>
        <form name="form1" method="post" action="<?php print $_SERVER['PHP_SELF']?>">
        <h3>Enter The City Your Looking For: </h3>
         <?php



            $display = "<br><input type='text' name='city'>\n";
            $display .= "<br><button class='btn btn-info'>Submit Here</button>";

            $cities = array();

            $filename = 'data/'.'cities.txt';

            $lines = count(file($filename));

            $fp = fopen($filename, 'r');

            for ($i = 1; $i <= $lines; $i++ ){
                $linesInFile = fgets($fp);
                $city = trim($linesInFile);
                array_push($cities, $city);
            }


            fclose($fp);

            if(isset($_POST['city'])){
                $citySearch = $_POST['city'];
            } else {
                $citySearch = '';
            }

            if(!empty($citySearch)){
                print "<h3>Looking For your city!</h3>";

                foreach($cities as $city){
                    $seaching = stripos($city, $citySearch);

                    if($seaching === false){

                    } else {
                        print "<p>We found the city! : $city";
                    }
                }
            }



            print $display;
         ?>
        </form>
    </div>
</body>
</html>