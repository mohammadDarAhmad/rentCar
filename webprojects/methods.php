<?php

$server = "localhost";

$username = "root";
$password = "";
$dbname = "dbschema_1161721";
$conn = "mysql:host=$server;dbname=$dbname";

$pdo = null;
try {
    $pdo = new PDO($conn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}

    
     
    
     function checkAdmine($email, $password)
{
    global $pdo;
    $res = $pdo->query("select count(*) from manager where email = '" . $email . "' and password = '" . $password . "'");

    return $res->fetchColumn();
}

function checkUser($email, $password)
{
    global $pdo;
    $res = $pdo->query("select count(*) from user where email = '" . $email . "' and password = '" . $password . "'");

    return $res->fetchColumn();
}
function checkEmail($email)
{
    global $pdo;
    $res = $pdo->query("select count(*) from manager where email = '" . $email . "'");

    $count1 = $res->fetchColumn();

    $res = $pdo->query("select count(*) from user where email = '" . $email . "'");

    $count2 = $res->fetchColumn();

    return ($count2 > $count1) ? $count2 : $count1;
}
function getUserName($email)
{

    global $pdo;

    return $pdo->query("select * from user where email = '" . $email . "';");
}
function checkRegister($email)
{
    if (checkEmail($email) > 0)
        return 1;
    return 0;

}

function FirstUser()
{
    global $pdo;
    $res = $pdo->query("select count(*) from user");

    $count1 = $res->fetchColumn();

    return ($count1 == 0);
}

function FindMaxId()
{

    global $pdo;
    $res = $pdo->query("SELECT MAX(uid) FROM user");

    $id = $res->fetchColumn();

    return $id;

}


function checkEAccount($username, $password, $cpassword)
{


    $passlen = strlen($password);
    $userlen = strlen($username);
     if ($userlen < 3|| $userlen > 20)
          return 1;

    if ($password != $cpassword)
        return 2;

    if ($passlen < 6 || $passlen > 15)
       return 3;


 if (!ctype_lower(substr($password, -1)))
        return 4;

    if (!is_numeric(substr($password, 0, 1)))
       return 5;

    if (checkUsername($username) > 0)
        return 6;

    return 0;

}

function checkEmailAndUserName($email, $username){


    $userlen = strlen($username);

      if (checkEmail($email) > 0)
        return 1;

    if ($userlen < 6 || $userlen > 15)
         return 2;

    if (checkUsername($username) > 0)
        return 3;



    return 0;

}


function checkUsername($username)
{
    global $pdo;
    $res = $pdo->query("select count(*) from user where username = '" . $username . "'");

    $count1 = $res->fetchColumn();

    return $count1;
}

function addUser($name, $email, $username, $Mobile,$Telephone, $password, $address, $dob, $id)
{
    global $pdo;
    $sql = "INSERT INTO `user`(`uid`, `name`, `email`, `username`, `Mobile Number`, `Telephone Number`, `password`, `address`, `DOB`) 
VALUES (" . $id . ",'" . $name . "','" . $email . "','" . $username . "','" . $Mobile . "','" . $Telephone . "','" . $password . "','" . $address . "','" . $dob . "')";

    if ($pdo->exec($sql) === false) {
        return 0;
    } else return 1;
}
//Rented table group
function FindMaxIdRented()
{

    global $pdo;
    $res = $pdo->query("SELECT MAX(rId) FROM rented");

    $id = $res->fetchColumn();

    return $id;

}
function addRented($FinalPrice, $id, $addition,$idUser)
{
    global $pdo;
// $sql=   "SELECT * FROM `user` WHERE email = '" . $addition . "'";


   $sql= "INSERT INTO `rented`(`rPrice`, `cId`, `radd`, `uid`) VALUES (".$FinalPrice.",".$id.",'" . $addition ."',".$idUser.")";
    if ($pdo->exec($sql) === false) {
        return 0;
    } 
    else
     return 1;
}

function getID($email)
{

    global $pdo;
   $res = $pdo->query("SELECT uid FROM `user` WHERE email ='" . $email . "';");
    $id = $res->fetchColumn();

    return $id;
    
}function FirstRented()
{
    global $pdo;
    $res = $pdo->query("select count(*) from rented");

    $count1 = $res->fetchColumn();

    return ($count1 == 0);
}

function updatesCar($color,$id)
{
    global $pdo;

          $sqlUpdate= "UPDATE `cars` SET `isRented`= 1 ,`color`='".$color."'WHERE cId= ".$id."";
         

     if ($pdo->exec($sqlUpdate) === false) {
        return 0;
    } 
    else
     return 1;
}