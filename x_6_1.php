<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>6.1 A Simple Function</title>
</head>
<body>
    <?php

        function add()
        {
            $firstNumber = $_POST['first_number'];
            $secondNumber = $_POST['second_number'];
            $total = $firstNumber + $secondNumber;

            print 'When you add '.$firstNumber.' to '.$secondNumber.' you get '.$total;
        }

        add();
    ?>

</body>
</html>
