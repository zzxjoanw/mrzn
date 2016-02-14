<?php
/**
 * Created by PhpStorm.
 * User: Laura 4
 * Date: 1/23/2016
 * Time: 5:11 PM
 */

include("database-functions.php");

function getAllLanguages($connection)
{
    //do i need prepared statements here?
    $sql = "SELECT name FROM language";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->execute();
    $preparedStatement->bind_result($name);

    $list = array();

    while ($preparedStatement->fetch())
    {
        $row = $name;
        array_push($list,$row);
    }

    return $list;
}

function getAllLanguagesShort($connection)
{
    $sql = "SELECT shortname FROM language";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->execute();
    $preparedStatement->bind_result($shortname);

    $list = array();

    while ($preparedStatement->fetch())
    {
        $row = $shortname;
        array_push($list,$row);
    }

    return $list;
}

function getLongByShort($connection,$shortname)
{
    $sql = "SELECT name FROM language WHERE shortname=?";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("s",$shortname);
    $preparedStatement->execute();
    $preparedStatement->bind_result($name);

    $list = array();

    while ($preparedStatement->fetch())
    {
        $row = $name;
        array_push($list,$row);
    }

    return $list;
}

function getShortByLong($connection,$longname)
{
    $sql = "SELECT name FROM language WHERE name=?";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("s",$name);
    $preparedStatement->execute();
    $preparedStatement->bind_result($shortname);

    $list = array();

    while ($preparedStatement->fetch())
    {
        $row = $shortname;
        array_push($list,$row);
    }

    return $list;
}

function getCoursesByLang($connection,$languageID)
{
    $sql = "SELECT name FROM coure WHERE languageID=?";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("i",$languageID);
    $preparedStatement->execute();
    $preparedStatement->bind_result($name);

    $list = array();

    while ($preparedStatement->fetch())
    {
        $row = $name;
        array_push($list,$row);
    }

    return $list;
}

function getTextsByCourse($connection,$courseID)
{
    $sql = "SELECT text FROM texts WHERE courseID=?";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("i",$courseID);
    $preparedStatement->execute();
    $preparedStatement->bind_result($courseID);

    $list = array();

    while ($preparedStatement->fetch())
    {
        $row = $courseID;
        array_push($list,$row);
    }

    return $list;
}

function getQuestionsByText($connection,$textID)
{
    $sql = "SELECT question FROM questions WHERE textID=?";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("i",$textID);
    $preparedStatement->execute();
    $preparedStatement->bind_result($question);

    $list = array();

    while ($preparedStatement->fetch())
    {
        $row = $textID;
        array_push($list,$row);
    }

    return $list;
}

function getAnswersByQuestion($connection,$questionID)
{
    $sql = "SELECT answer FROM answers WHERE questionID=?";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("s",$questionID);
    $preparedStatement->execute();
    $preparedStatement->bind_result($answer);

    $list = array();

    while ($preparedStatement->fetch())
    {
        $row = $answer;
        array_push($list,$row);
    }

    return $list;
}