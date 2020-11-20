<?php
## Database configuration
require "../model/db.php";
$db=new dbConfig();
echo 'test <br>';



if (isset($_POST['action']) && ($_POST['action']=='view') )
{
    $output="";
    $data=$db->read();
    print_r($data);
}


