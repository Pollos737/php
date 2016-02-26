<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>6.7 Using Includes</title>
</head>
<body>
    <?php
    include 'x_6_7_custom.php';
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $fullName = combineName($lastName, $firstName);

    print 'You, '.$fullName.', may already be a wininer!';

    ?>
</body>
</html>