<?php
class user
{
  // Table user
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

    public function registration()
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $username=$_POST['username'];
            $password=$_POST['password'];
            $sql="INSERT INTO `user`(`username`, `password`) VALUES ('$username', '$password')";
            $query=mysqli_query($GLOBALS['con'],$sql);

            return $query ;
        }
    }

    public function login()
    {
        if($GLOBALS['con']){
            mysqli_select_db($GLOBALS['con'],$GLOBALS['dbname']);
            $username=$_POST['username'];
            $password=$_POST['password'];

            $sql="SELECT * FROM `user` WHERE `username`='$username' and `password`='$password'";
            $result=mysqli_query($GLOBALS['con'],$sql);
            $count=mysqli_num_rows($result);
            $row =mysqli_fetch_assoc($result);
            if($count===1){
                return $row['id'];
            }else {
                return false;
            }
        }
    }

    public function logout()
    {
        session_destroy();
    }

    public function isGust()
    {
        return !isset($_SESSION["user"]);
    }

    public function isAdmin()
    {
        if(!$this->isGust()){
            if($GLOBALS['con']) {
                mysqli_select_db($GLOBALS['con'], $GLOBALS['dbname']);
                $id = $_SESSION["user"];
                $sql = "SELECT * FROM `user` WHERE `id`='$id'";
                $result = mysqli_query($GLOBALS['con'], $sql);
                $row = mysqli_fetch_assoc($result);
                return $row['admin'];
            }
        }
    }

    public function getUsername()
    {
        if(!$this->isGust()){
            if($GLOBALS['con']) {
                mysqli_select_db($GLOBALS['con'], $GLOBALS['dbname']);
                $id = $_SESSION["user"];
                $sql = "SELECT * FROM `user` WHERE `id`='$id'";
                $result = mysqli_query($GLOBALS['con'], $sql);
                $row = mysqli_fetch_assoc($result);
                return $row['username'];
            }
        }
    }


}
