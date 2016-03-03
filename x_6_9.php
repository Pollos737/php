<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>6.9 Array Sort</title>
</head>
<body>
<ul>
    <?php
    $items = array();


    for($i = 1; $i <= 5; $i++){


        $user_input_html = 'item'.$i;
        $userInput = $_POST[$user_input_html];

        if($userInput !== ""){

            array_push($items, $userInput);
        }
    }

    sort($items);
    foreach($items as $element){
        print "<li>".$element."</li>";
    }

    ?>
</ul
</body>
</html>