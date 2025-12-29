<?php

use function PHPSTORM_META\type;

session_start();
$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$deadline = $_REQUEST['deadline'];
$errors = [];

// Title Validation
if(empty($title))
{
    $errors['title_error'] = "Title is required!";
}else if(strlen($title) > 50)
{
    $errors['title_error'] =  "Maximum 50 characters!";
}else if(strlen($title) < 3)
{
     $errors['title_error'] = "Minimum 3 characters!";
}

// Description Validation
if(empty($detail))
{
    $errors['detail_error'] = "Description is required!";
}else if(strlen($detail) > 100)
{
     $errors['detail_error'] =  "Maximum 100 characters!";
}

// Deadline Validation
if(empty($deadline))
{
    $errors['deadline_error'] = "Deadline is required!";
}else {
    $today = date('Y-m-d');
    if ($deadline < $today) {
        $errors['deadline_error'] = "Past date is not allowed!";
    }
}

// Error Occured
if(count($errors) > 0)
{
    // Redirecting
    $_SESSION['errors'] = $errors;
    header("Location: ../index.php");
}else{
    include "../database/env.php";
    $query = "INSERT INTO `todos`(`title`, `detail`, `deadline`) VALUES ('$title','$detail','$deadline')";
    $res = mysqli_query($connect, $query);
    print_r($res);
    if($res)
    {
        $_SESSION['message'] = [
            'type' => 'success',
            'content' => 'Todo added successfully',
        ];
        header("Location: ../all-todos.php");
    }
}