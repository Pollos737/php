<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>6.8 Array Basics</title>
</head>
<body>
    <ul>
    <?php
        $items = array();

        for($i = 1; $i <= 5; $i++){
            $user_input_html = 'item'.$i;
            $userInput = $_POST[$user_input_html];

            array_push($items, $userInput);

            $array_number = $i - 1;

            print "<li>$items[$array_number]</li>";
        }
    ?>
    </ul
</body>
</html>