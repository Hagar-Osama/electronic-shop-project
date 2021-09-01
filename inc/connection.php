<?php 
$connection = mysqli_connect('localhost', 'root', '', 'product-management');
       if (! $connection) {
           die('error '. mysqli_connect_error());
       }