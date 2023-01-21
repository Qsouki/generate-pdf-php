<?php

require_once __DIR__ . '/vendor/autoload.php'; 

$db= require_once('database.php');

// Create an instance of the class:
$dompdf = new \Dompdf\Dompdf();  

//get data by id
$user=$db->getUser($_GET['id']);

// var_dump($user['name']);die; 

// HTML code:
$html ='<html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
                <title>My App</title>
            </head>
            <body >
            <h1>'.$user['name'].'</h1>
            <h1>'.$user['phone'].'</h1>
            <h1>'.$user['email'].'</h1>
            </body> 
</html>';

// Write HTML to PDF
$dompdf->loadHtml($html);

// Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render(); 
$dompdf->stream($user['name'].".pdf"); 
 
header('Location: index.php');