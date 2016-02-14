<?php
/**
 * Created by PhpStorm.
 * User: Laura 4
 * Date: 1/23/2016
 * Time: 6:41 PM
 */

include("includes/admin-functions.php");
include("includes/language-functions.php");
include("includes/user-functions.php");

function printLine($text)
{
    echo $text."<br/>";
}

echo "<h2>open connection</h2>";
$connection = openConnection();

/*
echo "<hr><h2>admin functions</h2>";
createLanguage($connection,"Spanish","ES");
createCourse($connection,1,"spanish test");
createText($connection,1,"text test");
createQuestion($connection,1,"question test");
createAnswer($connection,1,"answer test");

echo "<h2>language functions</h2>";
$langArray = getAllLanguages($connection);
$shortLangArray = getAllLanguagesShort($connection);
$longName = getLongByShort($connection,"ES");
$shortName = getShortByLong($connection,"Spanish");
$courseList = getCoursesByLang($connection,1);
$textList = getTextsByCourse($connection,1);
$questionList = getQuestionsByText($connection,1);
$answerList = getAnswersByQuestion($connection,1);

echo "<h2>user functions</h2>";
printLine(register($connection,"zzxjoanw@gmail.com","password"));
var_dump(login($connection,$email,$password));
logout();
addCourse($connection,1,1);
dropCourse($connection,1,1);

*/
echo "<h2>close connection</h2>";
printLine(closeConnection($connection));