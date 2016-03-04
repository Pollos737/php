<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>6.9</title>
</head>
<body>

<?php
    $searchTerm = $_POST['search_term'];
    $searchString = $_POST['search_string'];

    $pos = stripos($searchString, $searchTerm);

    if ($pos === false)
    {
        print "<br>$searchTerm is not found in $searchString";
    } else{
        print "<br>$searchTerm is in $searchString";
    }

?>

</body>
</html>