<?php    
include_once 'connectiondemo.php';
$round=10;
for($n = 0; $n < $round; $n++){ 
    $name_two[$n]=$n; 
}
for($n = 0; $n < $round; $n++){ 
    echo $name_two["$n"] ; 
}  
?>