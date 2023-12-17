<?php

try {
  $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", 
  DB_USERNAME, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  logMessage($e->getMessage());
  redirect(route('404'));
}
