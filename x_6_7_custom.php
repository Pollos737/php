<?php

function  combineName($firstname, $lastname){
    $firstName = $firstname;
    $lastName = $lastname;
    $fullName = $lastName.', '.$firstName;
    return $fullName;
};