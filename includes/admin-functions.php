<?php
/**
 * Created by PhpStorm.
 * User: Laura 4
 * Date: 1/23/2016
 * Time: 5:22 PM
 */

include("database-functions.php");

function createLanguage($connection, $name, $shortName)
{
    $sql = "INSERT INTO language (name,shortname) VALUES (?,?)";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("ss",$name,$shortName);
    $preparedStatement->execute();
}

function createCourse($connection,$languageID,$name)
{
    $sql = "INSERT INTO course (languageID,name,status) VALUES(?,?,?)";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("iss",$languageID,$name,"Being Built");
    $preparedStatement->execute();
}

function editCourseStatus($connection,$courseID,$newStatus)
{
    $sql = "";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("is",$courseID,$newStatus);
    $preparedStatement->execute();
}

function createText($connection, $courseID, $text)
{
    $sql = "INSERT INTO text (courseID,text) VALUES(?,?)";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("is",$courseID,$text);
    $preparedStatement->execute();
}

function editText($connection,$textID,$newText)
{
    $sql = "";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("is",$textID,$newText);
    $preparedStatement->execute();
}

function removeText($connection,$textID)
{
    $sql = "DELETE FROM text WHERE id=?";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("i",$textID);
    $preparedStatement->execute();
}

function createQuestion($connection, $textID, $questionText)
{
    $sql = "INSERT INTO question (textID,questionText) VALUES(?,?)";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("is",$textID,$questionText);
    $preparedStatement->execute();
}

function editQuestion($connection,$questionID,$newText)
{
    $sql = "";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("is",$questionID,$newText);
    $preparedStatement->execute();
}

function removeQuestion($connection,$questionID)
{
    $sql = "DELETE FROM question WHERE id=?";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("i",$questionID);
    $preparedStatement->execute();
}

function createAnswer($connection, $questionID, $text)
{
    $sql = "INSERT INTO answer (textID,questionText) VALUES(?,?)";
    $preparedStatement = $connection->prepare($sql);
    $connection->bind_param("is",$questionID,$text);
    $connection->execute();
}

function editAnswer($connection,$answerID,$newText)
{
    $sql = "";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("is",$answerID,$newText);
    $preparedStatement->execute();
}

function removeAnswer($connection,$answerID)
{
    $sql = "DELETE FROM answer WHERE id=?";
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->bind_param("i",$answerID);
    $preparedStatement->execute();
}