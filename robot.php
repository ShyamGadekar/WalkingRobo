<?php
const NORTH = 1;
const EAST = 2;
const SOUTH = 3;
const WEST = 4;
$direction = [ 1 => "NORTH", 2 => "EAST", 3 => "SOUTH", 4 => "WEST"];
const MULTIPLIER_1 = 1;
const MULTIPLIER_2 = 1;
const MULTIPLIER_3 = -1;
const MULTIPLIER_4 = -1;

$x = $argv[1];
$y = $argv[2];

if(!is_numeric($x) || !is_numeric($y)){
    die("\nOnly Integer value allowed\n");
}

$currentDirction = $argv[3];

if($currentDirction != 'NORTH' && $currentDirction != 'EAST' && $currentDirction != 'SOUTH' && $currentDirction != 'WEST'){
     die("\nDirection is not specified\n");
}

$currentDirctionNumber = constant($currentDirction);
$path = $argv[4];

//5 2 SOUTH RW2LW4R

for($i = 0; $i < strlen($path); $i++ ){
    switch($path{$i}){
        case 'R':
            if($currentDirctionNumber == 4){
                $currentDirctionNumber = 1;
            } else {
                $currentDirctionNumber++;
            }
            break;
                case 'L':
                        if($currentDirctionNumber == 1){
                                $currentDirctionNumber = 4;
                        } else {
                                $currentDirctionNumber--;
                        }
                        break;
                case 'W':
            if( !($currentDirctionNumber % 2) ){
                $x += ($path{$i+1} * constant("MULTIPLIER_".$currentDirctionNumber) );
            } else {
                $y += ($path{$i+1} * constant("MULTIPLIER_".$currentDirctionNumber) );
            }
            $i++;
                        break;
        default:
            if(is_numeric($path{$i})){
                echo "\nWalk ranging from 0 - 9\n";
            } else {
                echo "\nProvided char '".$path{$i}."' is not valid\n";
            }
            break;
    }
}
echo $x." ".$y." ".$direction[$currentDirctionNumber]."\n";
?>