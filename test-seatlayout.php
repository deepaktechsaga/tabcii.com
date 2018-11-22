<style type="text/css">
.oc {
margin:0;
padding:0;
background-image:url('images/seatoccupied.png'); 
width:33px; 
height:26px; 
border:none; 
text-align:center;
line-height:26px; 
font-family:Helvetica;
font-size:16px;
font-weight:bold;
}
.oc a, a:link, a:hover {
color: black;
text-decoration: none;
}
.emp {
margin:0;
padding:0;
background-image:url('images/seatempty.png'); 
width:33px; 
height:26px; 
border:none; 
text-align:center;
line-height:26px; 
font-family:Helvetica;
font-size:16px;
font-weight:bold;
color: black;
text-decoration: none;
}
.emp a, a:link, a:hover{
color: black;
text-decoration: none;
}
.non { 
margin:0;
padding:0;
width:33px; 
height:26px; 
border:none; 
text-align:center;
color: white;
text-decoration: none;
}
</style>
<?php
//Query for booked seats
$k = array(); 
$ais = array("A","B","E","C","D",);
$aisle = array("E1","E2","E3","E4","E5","E6","E7","E8","E9");
$seatnumbers = array(
"A1" => "1","A2" => "5","A3" => "9","A4" => "13","A5" => "17","A6" => "21","A7" => "25","A8" => "29","A9" => "33","A10" => "37",
"B1" => "2","B2" => "6","B3" => "10","B4" => "14","B5" => "18","B6" => "22","B7" => "26","B8" => "30","B9" => "34","B10" => "38",
"E1" => "&nbsp;","E2" => "&nbsp;","E3" => "&nbsp;","E4" => "&nbsp;","E5" => "&nbsp;","E6" => "&nbsp;","E7" => "&nbsp;","E8" => "&nbsp;","E9" => "&nbsp;","E10" => "39",
"C1" => "3","C2" => "7","C3" => "11","C4" => "15","C5" => "19","C6" => "23","C7" => "27","C8" => "31","C9" => "35","C10" => "40",
"D1" => "4","D2" => "8","D3" => "12","D4" => "16","D5" => "20","D6" => "24","D7" => "28","D8" => "32","D9" => "36","D10" => "41");

echo "<table border=0 cellpadding=0 cellspacing=0>";
foreach($ais as $i){
    echo "<tr>";
    for($r=1;$r<=10;$r++){
        $seat = $i.$r;
        $setnum = $seatnumbers[$seat];
        if(in_array($seat,$k)){
            $bg = " class='oc'";
        }elseif(!in_array($seat,$aisle)){
            $bg = " class='emp'";
        }else{
            $bg = " class='non'";
        }
        if(is_numeric($setnum)){
            echo "<td" . $bg . "><a href=?seatnum=" . $setnum . ">" . $setnum . "</a></td>";
        }else{
            echo "<td" . $bg . ">" . $setnum . "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>"; 

?>