<?php

$db=mysqli(
    "br-cdbr-azure-south-b.cloudapp.net",
    "b85ab62c621ad",
    "b725147c",
    "coursework"
    );

if($db->connect_errno){
    die('Connectfailed['.$db->connect_error.']');
}
