<!DOCTYPE html>
<html lang="en">
<head>
    <title>6.10 Loading an array from a file</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<main class="container-fluid">
    <h1 class="text-center">Your Grocery List!</h1>
    <?php
    $filename = 'data/'.'grocery_list.txt';
    $lines = count(file($filename));

    $fp = fopen($filename, 'a');

    $addItem = $_POST['item'];
    $writeToTextFile = $addItem."\n";
    fwrite($fp, $writeToTextFile);
    fclose($fp);


    ?>
    <ol>
        <?php
            $groceryList = array();
            $fp = fopen($filename, 'r');
            for($i = 1; $i <= $lines; $i++){
                $line = fgets($fp);
                $item = trim($line);
                array_push($groceryList, $item);
            }
            fclose($fp);

            sort($groceryList);
            foreach($groceryList as $list_item){

                print "<li>".$list_item."</li><br>";
            }
        ?>
    </ol>
</main>
</body>
</html>