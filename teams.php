<?php
require "data.php";
require "index.php";

 
 $team1 = 3;
 $team2 = 4;

 $res = match($team1, $team2);
 

 
 echo $res[0] . ' : ' . $res[1];