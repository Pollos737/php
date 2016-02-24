<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>6.3 Returning Data from a Function</title>
</head>
<body>
    <?php

        $returnDisplay = add();
        print $returnDisplay;

        function add() {
            $firstNumber = $_POST["first_number"];
            $secondNumber = $_POST["second_number"];

            $total = $firstNumber + $secondNumber;
            $display = '<p>When you add '.$firstNumber.' and '.$secondNumber.' you get '.$total.'.</p>';
            return $display;
        }
    debugger;
    ?>
</body>
</html>