<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>6.4 Data In and Out</title>
</head>
<body>
    <?php
        $firstNumber = $_POST['first_number'];
        $secondNumber = $_POST['second_number'];

        $output = add($firstNumber, $secondNumber);
        print $output;


        //add function
        function add($firstdigit, $seconddigit){
            $result = $firstdigit + $seconddigit;
            $display = "<p>When you add ".$firstdigit." to ".$seconddigit." you get ".$result.".</p>";
            return $display;
        }
    ?>

</body>
</html>