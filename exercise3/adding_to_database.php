<html>
<head>
    <title>Reload Bookpub</title>
    <link rel="stylesheet" href="http://profperry.com/Classes/Main.css" type="text/css">
</head>
<body style="font-family: Arial, Helvetica, sans-serif; color: Blue;">

<div class=toptext>
    <?php
    print  "<span style=\"font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold; font-stretch: wider; color: white\">&nbsp;&nbsp;&nbsp;Practice Server</span>";
    ?>
</div>

<div style="width: 780px;">
    <br><br><br><br>
    <h2 style="background-color: #F5DEB3;">Reload the Bookpub Database - Version 5</h2>


    <?php

    //Connect to MySQL and test database

    $db = mysqli_connect('localhost','root','root', 'test');

    if (!$db) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    }


    //Load BookPub database

    $err_cntr = 0;

    $bookpub_sql = getSQL();  //Retreive the entire SQL statement string

    $mySQLArray = explode(';', $bookpub_sql);  //Break up into individual SQL statements

    foreach ($mySQLArray as $element)
    {
        //print "<br>$element";
        $sqlstatement = trim($element);

        if ($sqlstatement != '')
        {
            $status = doSQLStatement($db, $sqlstatement);

            if ($status == 'error')
            {
                $err_cntr++;
            }
        }
    }

    if ($err_cntr > 0)
    {
        print "<h1><font color=red>There were errors!</font></h1>";
        print "<br><b>Try running this program one more time by clicking Reload/Refresh</b>";
        print "<br><b>If you get errors again, then email me!</b>";
    } else {
        print "<h1>bookpub was re-loaded successfully</h1>";
        print "<br><b>Run this script any time you change the database</b>";
    }


    function doSQLStatement($db, $a_sql_string)
    {
        $result = mysqli_query($db, $a_sql_string);

        if ($result) {
            return 'ok';
        } else {
            echo("<p style='color: red;'>MySQL No: ".mysqli_errno($result)."<br>");
            echo("MySQL Error: ".mysqli_error($result)."<br>");
            echo("SQL: ".$a_sql_string."</p");

            return 'error';
        }
    }

    ?>

    <?php
    function getSQL()
    {

        $bookpub_all_sql = "
drop table IF EXISTS authors;  
drop table IF EXISTS publishers;
drop table IF EXISTS roysched;
drop table IF EXISTS titleauthors;
drop table IF EXISTS titles;
drop table IF EXISTS sales;
drop table IF EXISTS editors;
drop table IF EXISTS titleditors;
drop table IF EXISTS salesdetails;




DROP TABLE  IF EXISTS author;

DROP TABLE  IF EXISTS book ;

DROP TABLE  IF EXISTS bookauthor; 

DROP TABLE  IF EXISTS bookeditor ;

DROP TABLE  IF EXISTS city ;

DROP TABLE  IF EXISTS editor ;

DROP TABLE  IF EXISTS publisher ;

DROP TABLE  IF EXISTS zauthor ;

DROP TABLE  IF EXISTS zbookauthor; 

DROP TABLE  IF EXISTS zpublisher;


DROP TABLE IF EXISTS staff;






CREATE TABLE author (
  author_id int(11) NOT NULL,
  ssn varchar(11) ,
  lastname varchar(40)  NOT NULL,
  firstname varchar(20)  NOT NULL,
  phone varchar(12) ,
  address varchar(40) ,
  city varchar(20) ,
  state varchar(2) ,
  zip varchar(5) ,
  PRIMARY KEY (author_id)
) ;



CREATE TABLE  book (
  isbn varchar(13)  NOT NULL,
  title varchar(80)  NOT NULL,
  type varchar(12) ,
  pub_id varchar(4) ,
  price decimal(9,2) ,
  advance decimal(9,2) ,
  ytd_sales int(11) ,
  pubdate date ,
  PRIMARY KEY (isbn)
) ;



CREATE TABLE  bookauthor (
  author_id int(11) NOT NULL,
  isbn varchar(13)  NOT NULL,
  author_order int(11) NOT NULL,
  royaltyshare decimal(5,2) ,
  PRIMARY KEY (author_id,isbn)
) ;


CREATE TABLE  bookeditor (
  editor_id int(11) NOT NULL,
  isbn varchar(13)  NOT NULL,
  PRIMARY KEY (editor_id,isbn)
) ;


CREATE TABLE  city (
  name varchar(30)  NOT NULL,
  PRIMARY KEY (name)
) ;


CREATE TABLE  editor (
  editor_id int(11) NOT NULL,
  ssn varchar(11) ,
  lastname varchar(40)  NOT NULL,
  firstname varchar(20)  NOT NULL,
  phone varchar(12) ,
  editor_position varchar(20)  NOT NULL,
  salary decimal(9,2) NOT NULL,
  PRIMARY KEY (editor_id)
) ;


CREATE TABLE  publisher (
  pub_id int(11) NOT NULL,
  name varchar(40) ,
  address varchar(40) ,
  city varchar(20) ,
  state varchar(2) ,
  PRIMARY KEY (pub_id)
) ;



CREATE TABLE  zauthor (
  ssn varchar(11)  NOT NULL DEFAULT '',
  lastname varchar(40)  NOT NULL,
  firstname varchar(20)  NOT NULL,
  phone varchar(12) ,
  address varchar(40) ,
  city varchar(20) ,
  state varchar(2) ,
  zip varchar(5) ,
  PRIMARY KEY (ssn)
) ;


CREATE TABLE  zbookauthor (
  author_id varchar(11)  NOT NULL,
  isbn varchar(13)  NOT NULL,
  author_order int(11) NOT NULL,
  royaltyshare decimal(5,2) ,
  PRIMARY KEY (author_id,isbn)
) ;




CREATE TABLE  zpublisher (
  publisher_id int(11) NOT NULL,
  name varchar(40) ,
  address varchar(40) ,
  city varchar(20) ,
  state varchar(2) ,
  PRIMARY KEY (publisher_id)
) ;


CREATE TABLE IF NOT EXISTS staff (
  realtor_id int(30) NOT NULL AUTO_INCREMENT,
  lastname varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  firstname varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  phone varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  email varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  position varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  image_file varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (realtor_id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;




insert into author
values(998, '998-72-3567', 'Singer', 'Albert',
'801 826-0752', '123 3rd Street', 'St. George', 'UT', '84152')
;
insert into author
values(899, '899-46-2035', 'Singer', 'Anne',
'801 826-0752', '123 3rd Street', 'St. George', 'UT', '84152')
;
insert into author
values(722, '722-51-5454', 'Lance', 'Mike',
'219 547-9982', '3 Bald Eagle Drive', 'Chicago', 'IL', '60631')
;
insert into author
values(807, '807-91-6654', 'Parry', 'Sylvia',
'301 946-8853', '19 Main Street', 'Rockville', 'MD', '20853')
;
insert into author
values(893, '893-72-1158', 'McCluck', 'Serge',
'707 448-4982', '1 Fizzy Street', 'Anaheim', 'CA', '95688')
;
insert into author
values(728, '724-80-9391', 'MacDouglas', 'Spencer',
'415 354-7128', '47 Cumbre Ct.', 'Oakland', 'CA', '94612')
;
insert into author
values(427, '427-17-2319', 'Dingy', 'Ann',
'415 836-7128', '3410 RedWing St.', 'Santa Clara', 'CA', '94301')
;
insert into author
values(672, '672-71-3249', 'Suko', 'Ahi',
'415 935-4228', '3 Silver Ct.', 'Walnut Creek', 'CA', '94595')
;
insert into author
values(267, '267-41-2394', 'Farhey', 'Michael',
'408 286-2428', '44 Homestead Pkwy', 'San Jose', 'CA', '95128')
;
insert into author
values(472, '472-27-2349', 'Dunhill', 'Curt',
'707 938-6445', 'PO Box 792', 'Santa Clara', 'CA', '94301')
;
insert into author
values(527, '527-72-3246', 'Blue', 'Robert',
'615 297-2723', '22 Cowboy Rd.', 'Nashville', 'TN', '37215')
;
insert into author
values(172, '172-32-1176', 'Black', 'John',
'408 496-7223', '10932 Bigge Rd.', 'Menlo Park', 'CA', '94025')
;
insert into author
values(724, '724-08-9931', 'McGyver', 'Dirk',
'415 843-2991', '752 Telescope Rd.', 'Oakland', 'CA', '94609')
;
insert into author
values(274, '274-80-9391', 'Straight', 'Richard',
'415 834-2919', '5420 University Av.', 'Oakland', 'CA', '94609')
;
insert into author
values(756, '756-30-7391', 'Karsen', 'Lynda',
'415 534-9219', '72 James St.', 'Oakland', 'CA', '94609')
;
insert into author
values(712, '712-45-1867', 'Castillo', 'Jose',
'615 996-8275', '28 Park Pl. #86', 'Ann Arbor', 'MI', '48105')
;
insert into author
values(846, '846-92-7186', 'Hunter', 'Cindy',
'415 836-7128', '41 Smart St.', 'Palo Alto', 'CA', '94301')
;
insert into author
values(486, '486-29-1786', 'Lockley', 'Sharon',
'415 585-4620', '18 Brooklyn Av.', 'San Francisco', 'CA', '94130')
;
insert into author
values(648, '648-92-1872', 'Hall', 'Mark',
'503 745-6402', '55 Valley Blvd.', 'Corvallis', 'OR', '97330')
;
insert into author
values(341, '341-22-1782', 'Smith', 'Marge',
'913 843-0462', '10 Misisipi Dr.', 'Lawrence', 'KS', '66044')
;

insert into author
values(409, '409-56-7008', 'Adams', 'Abraham',
'415 658-9932', '622 Robin St.', 'Berkeley', 'CA', '94705')
;
insert into author
values (213, '213-46-8915', 'Blue', 'Maggie',
'415 986-7020', '397 83rd St. #431', 'Oakland', 'CA', '94618')
;
insert into author
values(238, '238-95-7766', 'Carson', 'Honey',
'415 548-7723', '89 MLK Blvd.', 'Berkeley', 'CA', '94705')
;




INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-8888-8888-x', 'Silicon Valley Start-ups', 'computer', '3', '40.00', '8000.00', 4095, '2012-06-12');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-1032-1032-x', 'One Hour Negotiations', 'business', '3', '29.99', '5000.00', 4095, '2012-06-12');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-3333-3333-x', 'Analyzing the Obsessive', 'psychology', '1', '29.99', '2000.00', 4072, '2012-06-12');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-1111-1111-x', 'Where is my Break-Even Point?', 'business', '3', '21.95', '5000.00', 3876, '2012-06-09');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-2222-2222-x', 'Treats and More Treats', 'cooking', '2', '29.99', '0.00', 2032, '2012-06-09');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-7777-7777-x', 'Gluten Free or Die', 'cooking', '2', '29.99', '8000.00', 4095, '2012-06-12');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-4203-4203-x', 'Twenty Meals you can make in 20 minutes', 'cooking', '2', '21.95', '4000.00', 15096, '2012-06-12');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-1035-1035-x', 'Usability Testing', 'computer', '3', '42.95', '7000.00', 8780, '2012-06-30');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-2075-2075-x', 'Are You Stressed for Success?', 'business', '1', '12.99', '10125.00', 18722, '2012-06-15');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-2091-2091-x', 'Sleep Depreviation and Mood Therapy', 'psychology', '1', '21.95', '2275.00', 2045, '2012-06-15');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-2106-2106-x', 'Instilling Courage', 'psychology', '1', '17.00', '6000.00', 111, '2012-10-05');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-3021-3021-x', 'Fresh and Easy?', 'cooking', '2', '12.99', '15000.00', 22246, '2012-06-18');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-3218-3218-x', 'Stop and Smell the Humus', 'cooking', '2', '40.95', '7000.00', 375, '2012-10-21');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-3026-3026-x', 'The Psychology of Social Networking', NULL, '2', NULL, NULL, NULL, NULL);
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-7832-7832-x', 'How to Choose a Computer', 'business', '3', '29.99', '5000.00', 4095, '2012-06-22');
INSERT INTO book (isbn, title, type, pub_id, price, advance, ytd_sales, pubdate) VALUES('1-1372-1372-x', 'Dealing with Behavior Problems in the Workplace', 'psychology', '1', '41.59', '7000.00', 375, '2012-10-21');



INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(409, '1-1032-1032-x', 1, '0.60');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(486, '1-5555-5555-x', 1, '1.00');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(486, '1-9999-9999-x', 1, '1.00');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(712, '1-2222-2222-x', 1, '1.00');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(172, '1-3333-3333-x', 1, '1.00');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(213, '1-1032-1032-x', 2, '0.40');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(238, '1-1035-1035-x', 1, '1.00');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(213, '1-2075-2075-x', 1, '1.00');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(998, '1-2091-2091-x', 1, '0.50');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(899, '1-2091-2091-x', 2, '0.50');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(998, '1-2106-2106-x', 1, '1.00');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(722, '1-3021-3021-x', 1, '0.75');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(899, '1-3021-3021-x', 2, '0.25');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(807, '1-3218-3218-x', 1, '1.00');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(274, '1-7832-7832-x', 1, '1.00');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(427, '1-8888-8888-x', 1, '0.50');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(846, '1-8888-8888-x', 2, '0.50');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(756, '1-1372-1372-x', 1, '0.75');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(728, '1-1372-1372-x', 2, '0.25');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(728, '1-1111-1111-x', 1, '0.60');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(267, '1-1111-1111-x', 2, '0.40');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(672, '1-7777-7777-x', 1, '0.40');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(267, '1-7777-7777-x', 2, '0.30');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(472, '1-7777-7777-x', 3, '0.30');
INSERT INTO bookauthor (author_id, isbn, author_order, royaltyshare) VALUES(648, '1-4203-4203-x', 1, '1.00');



INSERT INTO bookeditor (editor_id, isbn) VALUES(0, 'ISBN');
INSERT INTO bookeditor (editor_id, isbn) VALUES(2, '1-1111-1111-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(2, '1-2091-2091-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(2, '1-2106-2106-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(3, '1-1372-1372-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(3, '1-3021-3021-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(3, '1-7832-7832-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(3, '1-8888-8888-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(5, '1-1032-1032-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(5, '1-1372-1372-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(5, '1-2222-2222-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(5, '1-3333-3333-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(5, '1-5555-5555-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(5, '1-9999-9999-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(7, '1-1111-1111-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(7, '1-2091-2091-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(7, '1-3218-3218-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(7, '1-7777-7777-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(8, '1-3021-3021-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(8, '1-4203-4203-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(8, '1-7777-7777-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(8, '1-8888-8888-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(9, '1-1032-1032-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(9, '1-1035-1035-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(9, '1-2075-2075-x');
INSERT INTO bookeditor (editor_id, isbn) VALUES(9, '1-7777-7777-x');



INSERT INTO city (name) VALUES('Chicago');
INSERT INTO city (name) VALUES('Detroit');
INSERT INTO city (name) VALUES('Toronto');



INSERT INTO editor (editor_id, ssn, lastname, firstname, phone, editor_position, salary) VALUES(5, '955-72-3567', 'Penny', 'Anne', '801 826-0752', 'Managing Editor', '108000.00');
INSERT INTO editor (editor_id, ssn, lastname, firstname, phone, editor_position, salary) VALUES(9, '888-46-2035', 'Jones', 'Albert', '801 826-0752', 'Copy Editor', '77000.00');
INSERT INTO editor (editor_id, ssn, lastname, firstname, phone, editor_position, salary) VALUES(2, '722-51-5454', 'Lance', 'Mike', '219 547-9982', 'Project Editor', '88000.00');
INSERT INTO editor (editor_id, ssn, lastname, firstname, phone, editor_position, salary) VALUES(7, '807-91-6654', 'Parry', 'Sylvia', '301 946-8853', 'Managing Editor', '105000.00');
INSERT INTO editor (editor_id, ssn, lastname, firstname, phone, editor_position, salary) VALUES(3, '793-72-1158', 'Smith', 'Steve', '707 448-4982', 'Copy Editor', '76000.00');
INSERT INTO editor (editor_id, ssn, lastname, firstname, phone, editor_position, salary) VALUES(8, '714-80-9391', 'MacDonald', 'Ron', '415 354-7128', 'Project Editor', '87000.00');



INSERT INTO publisher (pub_id, name, address, city, state) VALUES(2, 'Binder and Smith', '2 2nd Ave.', 'New York', 'NY');
INSERT INTO publisher (pub_id, name, address, city, state) VALUES(3, 'All Techo Books', '3 3rd Dr.', 'Cupertino', 'CA');
INSERT INTO publisher (pub_id, name, address, city, state) VALUES(1, 'Sunshine Publishers', '1 1st St', 'Berkeley', 'CA');



INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('998-72-3567', 'Singer', 'Albert', '801 826-0752', '123 3rd Street', 'St. George', 'UT', '84152');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('899-46-2035', 'Singer', 'Anne', '801 826-0752', '123 3rd Street', 'St. George', 'UT', '84152');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('722-51-5454', 'Lance', 'Mike', '219 547-9982', '3 Bald Eagle Drive', 'Chicago', 'IL', '60631');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('807-91-6654', 'Parry', 'Sylvia', '301 946-8853', '19 Main Street', 'Rockville', 'MD', '20853');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('893-72-1158', 'McCluck', 'Serge', '707 448-4982', '1 Fizzy Street', 'Anaheim', 'CA', '95688');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('724-80-9391', 'MacDouglas', 'Spencer', '415 354-7128', '47 Cumbre Ct.', 'Oakland', 'CA', '94612');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('427-17-2319', 'Dingy', 'Ann', '415 836-7128', '3410 RedWing St.', 'Santa Clara', 'CA', '94301');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('672-71-3249', 'Suko', 'Ahi', '415 935-4228', '3 Silver Ct.', 'Walnut Creek', 'CA', '94595');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('267-41-2394', 'Farhey', 'Michael', '408 286-2428', '44 Homestead Pkwy', 'San Jose', 'CA', '95128');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('472-27-2349', 'Dunhill', 'Curt', '707 938-6445', 'PO Box 792', 'Santa Clara', 'CA', '94301');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('527-72-3246', 'Blue', 'Robert', '615 297-2723', '22 Cowboy Rd.', 'Nashville', 'TN', '37215');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('172-32-1176', 'Black', 'John', '408 496-7223', '10932 Bigge Rd.', 'Menlo Park', 'CA', '94025');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('724-08-9931', 'McGyver', 'Dirk', '415 843-2991', '752 Telescope Rd.', 'Oakland', 'CA', '94609');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('274-80-9391', 'Straight', 'Richard', '415 834-2919', '5420 University Av.', 'Oakland', 'CA', '94609');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('756-30-7391', 'Karsen', 'Lynda', '415 534-9219', '72 James St.', 'Oakland', 'CA', '94609');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('712-45-1867', 'Castillo', 'Jose', '615 996-8275', '28 Park Pl. #86', 'Ann Arbor', 'MI', '48105');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('846-92-7186', 'Hunter', 'Cindy', '415 836-7128', '41 Smart St.', 'Palo Alto', 'CA', '94301');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('486-29-1786', 'Lockley', 'Sharon', '415 585-4620', '18 Brooklyn Av.', 'San Francisco', 'CA', '94130');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('648-92-1872', 'Hall', 'Mark', '503 745-6402', '55 Valley Blvd.', 'Corvallis', 'OR', '97330');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('341-22-1782', 'Smith', 'Marge', '913 843-0462', '10 Misisipi Dr.', 'Lawrence', 'KS', '66044');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('409-56-7008', 'Adams', 'Abraham', '415 658-9932', '622 Robin St.', 'Berkeley', 'CA', '94705');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('213-46-8915', 'Blue', 'Maggie', '415 986-7020', '397 83rd St. #431', 'Oakland', 'CA', '94618');
INSERT INTO zauthor (ssn, lastname, firstname, phone, address, city, state, zip) VALUES('238-95-7766', 'Carson', 'Honey', '415 548-7723', '89 MLK Blvd.', 'Berkeley', 'CA', '94705');



INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('409-56-7008', '1-1032-1032-x', 1, '0.60');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('486-29-1786', '1-5555-5555-x', 1, '1.00');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('486-29-1786', '1-9999-9999-x', 1, '1.00');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('712-45-1867', '1-2222-2222-x', 1, '1.00');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('172-32-1176', '1-3333-3333-x', 1, '1.00');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('213-46-8915', '1-1032-1032-x', 2, '0.40');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('238-95-7766', '1-1035-1035-x', 1, '1.00');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('213-46-8915', '1-2075-2075-x', 1, '1.00');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('998-72-3567', '1-2091-2091-x', 1, '0.50');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('899-46-2035', '1-2091-2091-x', 2, '0.50');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('998-72-3567', '1-2106-2106-x', 1, '1.00');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('722-51-5454', '1-3021-3021-x', 1, '0.75');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('899-46-2035', '1-3021-3021-x', 2, '0.25');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('807-91-6654', '1-3218-3218-x', 1, '1.00');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('274-80-9391', '1-7832-7832-x', 1, '1.00');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('427-17-2319', '1-8888-8888-x', 1, '0.50');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('846-92-7186', '1-8888-8888-x', 2, '0.50');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('756-30-7391', '1-1372-1372-x', 1, '0.75');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('724-80-9391', '1-1372-1372-x', 2, '0.25');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('724-80-9391', '1-1111-1111-x', 1, '0.60');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('267-41-2394', '1-1111-1111-x', 2, '0.40');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('672-71-3249', '1-7777-7777-x', 1, '0.40');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('267-41-2394', '1-7777-7777-x', 2, '0.30');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('472-27-2349', '1-7777-7777-x', 3, '0.30');
INSERT INTO zbookauthor (author_id, isbn, author_order, royaltyshare) VALUES('648-92-1872', '1-4203-4203-x', 1, '1.00');



INSERT INTO zpublisher (publisher_id, name, address, city, state) VALUES(2, 'Binder and Smith', '2 2nd Ave.', 'New York', 'NY');
INSERT INTO zpublisher (publisher_id, name, address, city, state) VALUES(3, 'All Techo Books', '3 3rd Dr.', 'Cupertino', 'CA');
INSERT INTO zpublisher (publisher_id, name, address, city, state) VALUES(1, 'Sunshine Publishers', '1 1st St', 'Berkeley', 'CA');


INSERT INTO staff (realtor_id, lastname, firstname, phone, email, position, image_file) VALUES(1, 'Way', 'Lee', '777-555-1111', 'staff_lee@kinglibl.com', 'Front Desk', 'staff_lee.jpg');
INSERT INTO staff (realtor_id, lastname, firstname, phone, email, position, image_file) VALUES(2, 'Urkiddeng', 'Shirley', '777-555-3333', 'staff_shirley@kinglib.com', 'Childrens Section', 'staff_shirley.jpg');
INSERT INTO staff (realtor_id, lastname, firstname, phone, email, position, image_file) VALUES(3, 'Phoolary', 'Tom', '777-555-4444', 'staff_tom@kinglib.com', 'Reference Librarian', 'staff_tom.jpg');
";

        return $bookpub_all_sql;
    }


    ?>

</div>
</body>
</html>