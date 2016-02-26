<!DOCTYPE html>

<html>
<head>
    <title>0605 Variable Scope</title>
</head>

<body>

<h3>Variable Scope</h3>

<?php

$institution = "Infinite Skills";

$rtr_info = doStartUp();
$class_type = "Video";


print "<br />Insitution: ".$institution;
print "<br />Class: ".$class;
print "<br />Class Type: ".$class_type;
print "<br />rtr_info: ".$rtr_info;
print "<br />Degree: ".$degree;


function doStartUp()
{
    global $class;
    $class = "PHPMySQL";
    global $degree;
    $classInstructorInfo = getClassInstructorInfo($class);
    return $classInstructorInfo."*DEGREE: ".$degree;
}

function getClassInstructorInfo($a_class)
{

    global $degree;



    if ($a_class == 'PHPMySQL')
    {
        $instructor = 'Steve Perry';
        $degree = 'MAED';
    }

    return $instructor;

}

?>

</body>
</html>