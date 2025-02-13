<?php

$host = 'localhost';
$username = 'root';
$password = 'admin#1234';
$database = 'luxetask';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi Database Gagal! " . $conn->connect_error);
}