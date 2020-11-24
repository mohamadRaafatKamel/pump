<?php
class Panel
{
  // Table panel
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

    public function addNewPanel()
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $user=$_SESSION["user"];
            $name=$_POST['name'];
            $watt=$_POST['watt'];
            $price=$_POST['price'];
            $cover=$_POST['cover'];
            $sql="INSERT INTO `panel`(`name`, `price`, `watt`, `user`) 
                            VALUES ('$name', '$price', '$watt', '$user')";
            $query=mysqli_query($GLOBALS['con'],$sql);

            return $query ;
        }
    }

    public function getPanel($filter)
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $sql="SELECT * FROM panel where name LIKE '%$filter%' ";
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

    public function panelNameById($id)
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $sql="SELECT * FROM panel where id ='$id' ";
            $result=mysqli_query($GLOBALS['con'],$sql);
            $count=mysqli_num_rows($result);
            if ($count === 1) {
                while($row = mysqli_fetch_assoc($result)) {
                    return $row['name'];
                }
            }
        }
    }

    public function panelPriceById($id)
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $sql="SELECT * FROM panel where id ='$id' ";
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
