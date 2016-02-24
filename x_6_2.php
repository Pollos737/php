<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>6.2 Passing Data Into A Function</title>
</head>
<body>
<?php
    $num = $_POST['first_number'];

    function add($num)
    {

        $total = $num + 5;

        print 'When you add '.$num.' to 5 you get '.$total;
    }

    add($num);
?>
</body>
</html>