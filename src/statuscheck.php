<?php
session_start();

if (!isset($_SESSION['todo'])) {
     $_SESSION['todo'] = [];
}
$ms  = $_GET['index'];
if ($_SESSION['todo'][$ms]['status'] == "true") {
     $_SESSION['todo'][$ms]['status'] = "false";
     header("location:todo.php");
} else {
     if ($_SESSION['todo'][$ms]['status'] == "false") {
          $_SESSION['todo'][$ms]['status'] = "true";
          header("location:todo.php");
     }
}
