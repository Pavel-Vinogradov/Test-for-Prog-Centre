<?php
require_once "model/db.php";
$db=new dbConfig();

if (isset($_POST['action'] ) && $_POST['action']=='view')
{
    $output='';
    $data=$db->read();
    print_r($data);
}