<?php
class pumps
{
  // Table pumps
  private $servername;
  private $username;
  private $password;
  private $dbname;
  private $con;

  public function __construct()
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

  public function addNewPump()
  {
      if($GLOBALS['con']){
          mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
          $user=$_SESSION["user"];
          $name=$_POST['name'];
          $pressure=$_POST['pressure'];
          $price=$_POST['price'];
          $cover=$_POST['cover'];
          $sql="INSERT INTO `pumps`(`name`, `cover`, `pressure`, `price`, `user`) 
                            VALUES ('$name', '$cover', '$pressure', '$price', '$user')";
          $query=mysqli_query($GLOBALS['con'],$sql);

          return $query ;
      }
  }

    public function getPumps($filter)
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $sql="SELECT * FROM pumps where name LIKE '%$filter%' ";
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

    public function pumpNameById($id)
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $sql="SELECT * FROM pumps where id ='$id' ";
            $result=mysqli_query($GLOBALS['con'],$sql);
            $count=mysqli_num_rows($result);
            if ($count === 1) {
                while($row = mysqli_fetch_assoc($result)) {
                    return $row['name'];
                }
            }
        }
    }

    public function getPumpsById($id)
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $sql="SELECT * FROM pumps where id ='$id' ";
            $result=mysqli_query($GLOBALS['con'],$sql);
            $count=mysqli_num_rows($result);
            if ($count === 1) {
                $row = mysqli_fetch_assoc($result);
                return $row;
            }
        }
    }

    public function pumpPriceById($id)
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $sql="SELECT * FROM pumps where id ='$id' ";
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
