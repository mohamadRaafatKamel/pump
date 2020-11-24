<?php
include_once ('model/user.php');
include_once ('model/pumps.php');
include_once ('model/panel.php');
include_once ('model/pumpOrder.php');
include_once ('model/cable.php');

class Controller
{
    public function registration()
    {
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $user = new user();
            if($user->registration()){
                die("<script>location.href ='index.php'</script>");
            }
        }
    }

    public function login()
    {
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $user = new user();
            if($id=$user->login()){
                $_SESSION["user"] = $id;
                die("<script>location.href ='index.php'</script>");
            }
        }
    }

    public function shop()
    {
        $pump = new pumps();
        return $pump->getPumps("");
    }

    public function view($id)
    {
        $pump = new pumps();
        return $pump->getPumpsById($id);
    }

    public function selectSolarPanel($select = null)
    {
        $panel = new Panel();
        $panels = $panel->getPanel("");
        $options = "";
        if(!empty($panels)){
            foreach ($panels as $myPanel){
                $sele="";
                if($select == $myPanel['id'])$sele=" selected";
                $options .= "<option value=".$myPanel['id'].$sele.">".$myPanel['name']."</option>";
            }
        }
        return $options;
    }

    public function calcTotalPrice($id,$len){
        $cable = new Cable();
        if($forMtr=$cable->getCableOfPump($id,$len)){
            return $forMtr*$len;
        }else{
            return false;
        }
    }

    public function addOrder($id){
        $order = new pumpOrder();
        if($order->addNewOrder($id)){
            die("<script>location.href ='cart.php'</script>");
        }
    }

    public function displayOrder()
    {
        $pump = new pumps();
        $panal = new Panel();
        $cable = new Cable();
        $order = new pumpOrder();
        $orders = $order->getMyOrder();
        $table = "";
        if(!empty($orders)){
            $table .= "<thead><th>Solar Pump</th><th>Solar Panal</th><th>Extra Cable</th><th>Price Cable</th><th>Total Price</th><th>Date</th></thead><tbody>";
            foreach ($orders as $myOrder){
                $pumpPrc=$pump->pumpPriceById($myOrder['pump_id']);
                $panalPrc=$panal->panelPriceById($myOrder['panel_id']);
                $cablePrc=$cable->getCablePriceByID($myOrder['cable_id']);
                if($myOrder['cable_id']){
                    $cableLen=$myOrder['cable_length'];
                    $totalPrc= $pumpPrc + $panalPrc + ($cablePrc * $cableLen) ;
                }else {
                    $cableLen = "No";
                    $totalPrc= $pumpPrc + $panalPrc ;
                }
                $table .= "<tr><td>".$pump->pumpNameById($myOrder['pump_id'])."</td><td>".$panal->panelNameById($myOrder['panel_id'])
                    ."</td><td>".$cableLen."</td><td>".$cablePrc
                    ." $</td><td>".$totalPrc." $</td><td>".$myOrder['date']."</td></tr>";
            }
        }
        return $table;
    }

    public function checkOut()
    {
        $order = new pumpOrder();
        $order->myCheckOut();
    }

}
