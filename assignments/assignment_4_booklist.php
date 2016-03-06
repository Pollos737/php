<!DOCTYPE html>
<html>
<head>
    <title>Assignment 4</title>
    <link rel= "stylesheet" type="text/css" href="css/KingLib_4.css" />
</head>
<body>
<header>
    <div id="header">
        <a href="assignment_4.php">
            <img src= "images/KingLibLogo.jpg"
                 alt = "King Library Header Logo"
                 height= "84"  width="800" id= "header_image"/>
        </a>
    </div>
</header>
<main>
    <?php

        $display = '';
        //getting user input
        if(isset($_POST['book_search'])){
            $keyword = $_POST['book_search'];
        } else{
            $keyword = '';
        }

        if(empty($keyword)){
            $display = '<h4>Current Title</h4>';
        } else{
            $display = '<h4>Current Titles that match '.$keyword.'</h4>';
        }

        $filename = 'data/'.'booklist.txt';
        $numOfLines = count(file($filename));
        $fp = fopen($filename, 'r');

        if(empty($keyword)) {
            for ($i = 1; $i <= $numOfLines; $i++) {
              $line = fgets($fp);
              $trimmedLine = trim($line);
              list($title, $category, $pub_date, $isbn) =
                  explode('*', $trimmedLine);
              $display .= $i.'. '.$title.'<br>';
              $display .= 'Category: '.$category.'<br>';
              $display .= 'Date Published: '.$pub_date.'<br>';
              $display .= 'ISBN: '.$isbn.'<br><br>';
            }
        } else{
            for($i = 1; $i <= $numOfLines; $i++) {
                $line = fgets($fp);
                $trimmedLine = trim($line);
                list($title, $category, $pub_date, $isbn) =
                    explode('*', $trimmedLine);

                $searching = stripos($title, $keyword);
                if ($searching === false) {

                } else {
                    $display .= $i . '. ' . $title . '<br>';
                    $display .= 'Category: ' . $category . '<br>';
                    $display .= 'Date Published: ' . $pub_date . '<br>';
                    $display .= 'ISBN: ' . $isbn . '<br><br>';
                }
            }
        }


        fclose($fp);
        print $display;

    ?>
</main>

</body>
</html>