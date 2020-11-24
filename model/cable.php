<?php
class Cable
{
  // Table cable
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

    public function addNewCable()
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $user=$_SESSION["user"];
            $diameter=$_POST['diameter'];
            $max=$_POST['max'];
            $min=$_POST['min'];
            $price=$_POST['price'];
            $pump=$_POST['pump'];
            $sql="INSERT INTO `cable`(`diameter`, `price`, `max`, `min`, `pump_id`, `user`) 
                            VALUES ('$diameter', '$price', '$max', '$min', '$pump', '$user')";
            $query=mysqli_query($GLOBALS['con'],$sql);

            return $query ;
        }
    }

    public function getCable($filter)
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $sql="SELECT * FROM cable ";
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

    public function getCableOfPump($id,$len)
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $sql="SELECT * FROM cable where pump_id = '$id' AND `max` >= '$len' AND `min`<= '$len'";
            $result=mysqli_query($GLOBALS['con'],$sql);
            $count=mysqli_num_rows($result);
            $data = [];
            if ($count >0) {
                $row = mysqli_fetch_assoc($result);
                return $row['price'] ;
            }
            return false;
        }
    }

    public function getCableIDOfPump($id,$len)
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $sql="SELECT * FROM cable where pump_id = '$id' AND `max` >= '$len' AND `min`<= '$len'";
            $result=mysqli_query($GLOBALS['con'],$sql);
            $count=mysqli_num_rows($result);
            $data = [];
            if ($count >0) {
                $row = mysqli_fetch_assoc($result);
                return $row['id'] ;
            }
            return false;
        }
    }

    public function getCablePriceByID($id)
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $sql="SELECT * FROM cable where id ='$id' ";
            $result=mysqli_query($GLOBALS['con'],$sql);
            $count=mysqli_num_rows($result);
            if ($count === 1) {
                while($row = mysqli_fetch_assoc($result)) {
                    return $row['price'];
                }
            }
        }
    }

}
