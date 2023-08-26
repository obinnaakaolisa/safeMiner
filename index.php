<?php

require_once "ObstuctionDetector.php";

$pointA = [53.5872,-2.4138];
$pointB = [53.474,-2.2388];
$timeDuration = 78; // Time is in minutes generated from the other team's module;
$machineSpeed = 50; // Assuming the machine speed is known;

$obstruction = new ObstuctionDetector($machineSpeed, $pointA, $pointB);

if($obstruction::isPenetrable($timeDuration)){
    echo "No obstructions detected!";
} else echo "Obstruction has been detected and it is impenetrable!";