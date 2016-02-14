<?php
/**
 * Created by PhpStorm.
 * User: Laura 4
 * Date: 1/23/2016
 * Time: 5:37 PM
 */

function openConnection()
{
    $username = "dcwecddg_TimeCap";
    $password = "20winter16";
    $host = "localhost";
    $database = "dcwecddg_mrzn";
    //$port = 3306;
    //$correctFingerprint = "";

    $connection = new mysqli($host,$username,$password,$database) or die($connection->error);

    return $connection;
}

function closeConnection($connection)
{
    return $connection->close();
}