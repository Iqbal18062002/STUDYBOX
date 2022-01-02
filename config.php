<?php
$connection = new mysqli("localhost", "root", "", "preorder");

if (mysqli_connect_error()) {
    echo "Failed connect to database " . mysqli_connect_error();
}?>