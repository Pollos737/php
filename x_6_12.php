<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recursive Programming 6.12</title>
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<main>
    <h2>Recursive Programming</h2>
    <form name="form1" method="post" action="<?php print $_SERVER['PHP_SELF'] ?>">
    <?php
        if(isset($_POST['item_1'])){
            $item_1 = $_POST['item_1'];
        }  else {
            $item_1 = '';
        }
        if(isset($_POST['item_2'])){
            $item_2 = $_POST['item_2'];
        }  else {
            $item_2 = '';
        }
        if(isset($_POST['amount_1'])){
            $amount_1 = $_POST['amount_1'];
        }  else {
            $amount_1 = '';
        }
        if(isset($_POST['amount_2'])){
            $amount_2 = $_POST['amount_2'];
        }  else {
            $amount_2 = '';
        }

        $display = 'dummy';
        $total = 0;
        $errorControl = 0;

        $display = "<table border ='1'>\n";
        $display .= "<tr>";
        $display .= "<th>Item</th>";
        $display .= "<th>Amount</th>";
        $display .= "</tr>\n";


        $display .= "<tr>";
        $display .= "<td><input type='text' name='item_1' value='".$item_1."'></td>";
        $display .= "<td><input type='text' name='amount_1' value='".$amount_1."'></td>";
    if (!empty($amount_1))
    {
        if (is_numeric($amount_1))
        {
            $total += $amount_1;
        }
        else
        {
            $err_cntr++;
            $display .= "<td style='color: red;'>Amount $amount_1 not Numeric</td>";
        }
    }

    $display .= "</tr>\n";  //added newline

    $display .= "<tr>";
    $display .= "<td><input type='text' name='item_2' value='".$item_2."'></td>";
    $display .= "<td><input type='text' name='amount_2' value='".$amount_2."'></td>";

    if (!empty($amount_2))
    {
        if (is_numeric($amount_2))
        {
            $total += $amount_2;
        }
        else
        {
            $err_cntr++;
            $display .= "<td style='color: red;'>Amount $amount_2 not Numeric</td>";
        }
    }

    $display .= "</tr>\n";  //added newline

    $display .= "</table>\n";

    $display .= "<br /><input type='submit' name='mysubmit' value='Click Me'>";


    if ($err_cntr > 0)
    {
        $display .= "<p style='color: red;'>Number of Errors: $err_cntr</p>";
    }
    else
    {
        $display .= "<p>Total Amount: $total</p>";
    }


    print $display;   //This prints the table rows
    ?>
    </form>
</main>
</body>
</html>