<?php
function plyrs() {
	require('settings.php');
        require_once('MinecraftQuery.class.php');
        $query = new MinecraftQuery();
        try {
                $query->Connect(MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT);
        } catch (MinecraftQueryException $e) {
                $error = $e->getMessage();
        }
if (($info = $query->GetInfo()) !== false){
        foreach ($info as $info_key => $info_value){
                if ($info_key == "Players"){$pamo=$info_value;}
                if ($info_key == "MaxPlayers"){$maxp=$info_value;}
                }
        if ($query->GetPlayers() != ""){
        	$players =$query->GetPlayers();
                printf("<p><img src='img/online2.jpg' width='69' height='20' alt='woohoo'><font color=red>");
                echo "</font></br><font color=#c0c0c0>Player count:</font><font color=white> </br>";
                echo $pamo."/".$maxp."</font>";
                echo "</br><font color=c0c0c0>Players Online:</font></br>";
		$count = 0;
                echo "<table border=1>";
                foreach ($players as $value) {
			$img = "none";
			$count = ($count + 1);
                        switch ($value){
                        	case "BearFather" :
                                        $img = "./img/AStar.png";
                                        break;
                                case "ZokWobblefotz" :
                                        $img = "./img/AStar.png";
                                        break;
                                case "Omnombulist" :
                                        $img = "./img/AStar.png";
                                        break;
                                case "binarynomad" :
                                        $img = "./img/MStar.png";
                                        break;
                                case "CptCabey" :
                                        $img = "./img/MStar.png";
                                        break;
                                case "cypher1024" :
                                        $img = "./img/MStar.png";
                                        break;
                                case "libella" :
                                        $img = "./img/MStar.png";
                                        break;
                                case "Ninjedi" :
                                        $img = "./img/MStar.png";
                                        break;
                                case "Beandon10" :
                                        $img = "./img/VStar.png";
                                        break;
                                case "deadlycouncil" :
                                        $img = "./img/VStar.png";
                                        break;
                                case "detes" :
                                        $img = "./img/VStar.png";
                                        break;
                                case "DumHed" :
                                        $img = "./img/VStar.png";
                                        break;
                                case "ewe2" :
                                        $img = "./img/VStar.png";
                                        break;
                                case "globalc" :
                                        $img = "./img/VStar.png";
                                        break;
                                case "idlegamer" :
                                        $img = "./img/VStar.png";
                                        break;
                                case "IntelSoap" :
                                        $img = "./img/VStar.png";
                                        break;
                                case "NoFaithNecessary" :
                                        $img = "./img/VStar.png";
                                        break;
                                case "PompadourJay" :
                                        $img = "./img/VStar.png";
                                case "rosenth" :
                                        $img = "./img/VStar.png";
                                        break;
                                case "splitfinity" :
                                        $img = "./img/VStar.png";
                                        break;
                                case "theloofa" :
                                        $img = "./img/VStar.png";
                                        break;
                                case "PsychoSuzy" :
                                        $img = "./img/VStar.png";
                                        break;
                        }
                        if ($count == "6" || $count == "11" || $count == "15" || $count == "20") {echo "</tr></tr>";}
                        if ($img == "none") {echo "<font color=yellow><td align=center>".$value."</td>";}
                        else {echo "<font color=yellow><td align=center><img src='".$img."' width='20' height='20' alt='VIP'>".$value."</td>";}
                }
                        echo "</table>";
        }
	else{
		printf("<p><img src='img/online2.jpg' width='69' height='20' alt='woohoo'><font color=red>");
		echo "<br><bold>NOBODY ONLINE</bold></font>";
	}
}
	else {
		echo "<p><font size=+2 color=red><strong>Server Offline</strong></font>";
		printf("<p><img src='img/offline.png' width='150' height='300' alt='SSSSSSSSSSBoom'>");
	}
}
?>

