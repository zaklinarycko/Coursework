<?php

$db=mysqli(
    "br-cdbr-azure-south-b.cloudapp.net",
    "bc852cafdb9783",
    "187e9998",
    "coursework"
    );

if($db->connect_errno){
    die('Connectfailed['.$db->connect_error.']');
}
