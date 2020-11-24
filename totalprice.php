<?php
require_once 'Controller.php';
$cont=new Controller();

if(isset($_GET['len']) && isset($_GET['id'])){
    $len = $_GET['len'];
    $id = $_GET['id'];
    if($rslt = $cont->calcTotalPrice($id,$len)){
        echo $rslt;
    } else{
        echo "Don't have this cable";
    }
}
