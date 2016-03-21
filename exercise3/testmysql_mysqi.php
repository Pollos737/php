<?php
/**
 * Created by PhpStorm.
 * User: Wilmer
 * Date: 3/20/16
 * Time: 9:45 PM
 */
    $db = mysqli_connect('localhost','root','root');
    if (!$db) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    }
    echo 'Connection OK';
    mysqli_close($db);
