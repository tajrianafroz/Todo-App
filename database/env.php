<?php

$databaseHost = "localhost";
$dataUsername = "root";
$dataPassword = "";
$databaseName = "todo_app";

$connect = mysqli_connect($databaseHost, $dataUsername, $dataPassword, $databaseName);

if(!$connect)
{
    echo "Something went wrong";
}