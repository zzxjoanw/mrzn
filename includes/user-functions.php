<?php
/**
 * Created by PhpStorm.
 * User: Laura 4
 * Date: 1/23/2016
 * Time: 5:06 PM
 */

include("database-functions.php");

/*
 * @param object $connection a connection object generated by mysqli->__construct()
 * @param string $email an email address
 * @return true if user found, else false
 */
function checkIfUserExists($connection,$email)
{
    $sql = "SELECT email,password,role FROM users WHERE email = ?";
    $preparedStatement = $connection->prepare($sql) or die("error: " . $connection->error);
    $preparedStatement->bind_param("s",$email) or die("error in login()");
    $preparedStatement->execute();
    $preparedStatement->store_result();
    $preparedStatement->bind_result($email);

    if($preparedStatement->num_rows() == 1)
    {
        return true;
    }

    return false;
}

/*
 * @param object $connection a connection object generated by mysqli->__construct()
 * @param string $email
 * @param string $password
 * @return false if user already exists, else true
 */
function register($connection,$email,$password)
{
    if(checkIfUserExists($connection,$email))
    {
        return false;
    }

    $sql = "INSERT INTO users(email,password) VALUES(?,?)";
    $preparedStatement = $connection->prepare($sql) or die("error: ".$preparedStatement->error());
    $preparedStatement->bind_param("ss",$email,$password) or die("error: ".$preparedStatement->error());
    $preparedStatement->execute();
    return true;
}

/*
 * @param object $connection a connection object generated by mysqli->__construct()
 * @param string $email
 * @param string $password
 * @return user info if login successful, else false
 */
function login($connection,$email,$password)
{
    $sql = "SELECT email,password,role FROM users WHERE email = ? AND password = ?";
    $preparedStatement = $connection->prepare($sql) or die("error: " . $connection->error);
    $preparedStatement->bind_param("ss",$email,$password) or die("error in login()");
    $preparedStatement->execute();
    $preparedStatement->store_result();
    $preparedStatement->bind_result($email,$password,$role);

    $list = array();

    if($preparedStatement->num_rows() == 1)
    {
        while($preparedStatement->fetch())
        {
            array_push($list,$email);
            array_push($list,$role);
        }
        return $list;
    }
    return false;
}

function logout()
{
    unset($_SESSION['email']);
    unset($_SESSION['role']);
    session_destroy();
}

function resetPassword()
{

}

function getPreferences()
{

}

function changeInterfaceLanguage($newLang)
{

}

function changeTargetLanguage($newLang)
{

}

/*
 * @param object $connection a connection object generated by mysqli->__construct()
 * @param int $userID
 * @param int $courseID
 */
function addCourse($connection,$userID,$courseID)
{
    $sql = "INSERT INTO userCourses(userID,courseID) VALUES(?,?)";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("ii",$userID,$courseID);
    $preparedStatement->execute();
}

/*
 * @param object $connection a connection object generated by mysqli->__construct()
 * @param int $userID
 * @param int $courseID
 */
function dropCourse($connection,$userID,$courseID)
{
    $sql = "DELETE FROM userCourses WHERE userID = ? AND courseID = ?";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("ii",$userID,$courseID);
    $preparedStatement->execute();
}