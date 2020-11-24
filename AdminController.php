<?php
include_once ('model/user.php');
include_once ('model/pumps.php');
include_once ('model/panel.php');
include_once ('model/pumpOrder.php');
include_once ('model/cable.php');

class AdminController
{
    public function checkAdmin()
    {
        $user = new user();
        if(!$user->isAdmin()){
            die("<script>location.href ='index.php'</script>");
        }
    }

    // Pump

    public function addPump()
    {
        if(!empty($_POST)){
            if($path=$this->addImg('cover','asset/imgpump','5')){
                $_POST['cover']=$path;
                $pump = new pumps();
                if($pump->addNewPump()){
                    die("<script>location.href ='pump.php'</script>");
                }
            }
        }
    }

    public function addImg($namePost,$fileName,$id) {
        if(isset($_FILES[$namePost])){
            $name_array = $_FILES[$namePost]['name'];
            $tmp_name_array = $_FILES[$namePost]['tmp_name'];
            $type_array = $_FILES[$namePost]['type']['0'];
            $type_array = explode("/",$type_array);
            $extention = $type_array['1'];
            $path="";
            $count=count($tmp_name_array);
            for($i = 0; $i <$count ; $i++){
                $random = md5(random_bytes(2));
                if(move_uploaded_file($tmp_name_array[$i], $fileName."/".$namePost.$id.$i.$random.".".$extention)){
                    $path=$path.$fileName."/".$namePost.$id.$i.$random.".".$extention;
                }
                if($count>1)$path=$path."*";
            }
            return $path;
        }else {
            echo false;
        }
    }

    public function displayPumps($filter)
    {
        $pump = new pumps();
        $pumps = $pump->getPumps($filter);
        $table = "";
        if(!empty($pumps)){
            $table .= "<thead><th>Name</th><th>Pressure</th><th>Price</th></thead><tbody>";
            foreach ($pumps as $mypump){
                $table .= "<tr><td>".$mypump['name']."</td><td>".$mypump['pressure']." V</td><td>".$mypump['price']." $</td></tr>";
            }
        }
        return $table;
    }

    public function selectPumps($select = null)
    {
        $pump = new pumps();
        $pumps = $pump->getPumps("");
        $options = "";
        if(!empty($pumps)){
            foreach ($pumps as $myPump){
                $sele="";
                if($select == $myPump['id'])$sele=" selected";
                $options .= "<option value=".$myPump['id'].$sele.">".$myPump['name']."</option>";
            }
        }
        return $options;
    }

    // Panel

    public function addPanel()
    {
        if(!empty($_POST)){
            $panel = new Panel();
            if($panel->addNewPanel()){
                die("<script>location.href ='panel.php'</script>");
            }
        }
    }

    public function displayPanel($filter)
    {
        $panel = new Panel();
        $panels = $panel->getPanel($filter);
        $table = "";
        if(!empty($panels)){
            $table .= "<thead><th>Name</th><th>Watt</th><th>Price</th></thead><tbody>";
            foreach ($panels as $mypanel){
                $table .= "<tr><td>".$mypanel['name']."</td><td>".$mypanel['watt']." W</td><td>".$mypanel['price']." $</td></tr>";
            }
        }
        return $table;
    }

    // Cable

    public function addCable()
    {
        if(!empty($_POST)){
            $cable = new Cable();
            if($cable->addNewCable()){
                die("<script>location.href ='cable.php'</script>");
            }
        }
    }

    public function displayCable($filter)
    {
        $pump = new pumps();
        $cable = new Cable();
        $cables = $cable->getCable($filter);
        $table = "";
        if(!empty($cables)){
            $table .= "<thead><th>Solar Pump</th><th>Price</th><th>Diameter</th><th>Max</th><th>Min</th></thead><tbody>";
            foreach ($cables as $myCable){
                $table .= "<tr><td>".$pump->pumpNameById($myCable['pump_id'])."</td><td>".$myCable['price']." $</td><td>".$myCable['diameter']." mm</td><td>".$myCable['max']." m</td><td>".$myCable['min']." m</td></tr>";
            }
        }
        return $table;
    }

}
