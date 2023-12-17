<?php
require_once __DIR__ . '/../autoload.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Brainster Library</title>
  <meta charset="utf-8" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />

  <!-- Compiled and minified Bootstrap 5.1.3 CSS -->
  <link rel="stylesheet" href="<?= asset("bootstrap-5.1.3-dist/css/bootstrap.min.css") ?>">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= asset("style.css") ?>">

  <!-- Font-Awesome CDN -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body class="bg-secondary">
    <?php
    require_once __DIR__ . '/nav.php';
    printSessionMessages();
    ?>