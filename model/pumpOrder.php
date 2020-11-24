<?php
class pumpOrder
{
  // Table pump_order
  private $servername;
  private $username;
  private $password;
  private $dbname;
  private $con;

  function __construct()
  {
    $GLOBALS['servername'] = 'localhost';
    $GLOBALS['username'] = 'root';
    $GLOBALS['password'] = '';
    $GLOBALS['dbname'] = 'pump';
    // $GLOBALS['servername'] = 'localhost';
    // $GLOBALS['username'] = 'id5287639_root';
    // $GLOBALS['password'] = '123456789';
    // $GLOBALS['dbname']='id5287639_crs';
    $GLOBALS['con'] = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
  }

    public function addNewOrder($id)
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $cabl = new Cable();
            $user=$_SESSION["user"];
            $panel=$_POST['panel'];
            if(isset($_POST['cableLength']) && $_POST['cableLength'] != 0){
                $length=$_POST['cableLength'];
                $cable_id = $cabl->getCableIDOfPump($id,$length);
            }else{
                $length=null ;
                $cable_id= 0 ;
            }
            $sql="INSERT INTO `pump_order`(`pump_id`, `panel_id`, `cable_id`, `cable_length`, `user`, `state`) 
                                    VALUES ('$id', '$panel', '$cable_id', '$length', '$user', '0')";
            $query=mysqli_query($GLOBALS['con'],$sql);
            //printf("Errormessage2: %s\n", mysqli_error($GLOBALS['con']));
            return $query ;
        }
    }

    public function getMyOrder()
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $user = $_SESSION["user"];
            $sql="SELECT * FROM pump_order where user = '$user' AND state = 0 ";
            $result=mysqli_query($GLOBALS['con'],$sql);
            $count=mysqli_num_rows($result);
            $data = [];
            if ($count >0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $data[]=$row;
                }
            }
            return $data;
        }
    }

    public function myCheckOut(){
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $user = $_SESSION["user"];
            $sql="UPDATE `pump_order` SET `state` = 1 WHERE `user` = '$user'";
            $result=mysqli_query($GLOBALS['con'],$sql);

            return $result;
        }
    }

}
