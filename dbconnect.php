<?php

$db= new mysqli(
    "br-cdbr-azure-south-b.cloudapp.net",
    "bc852cafdb9783",
    "187e9998",
    "acsm_16b13eeb6a004c1"
    );

if (!$db) {
    die('Connect Error: ' . mysqli_connect_errno());
}