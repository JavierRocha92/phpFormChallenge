<?php
/**
 * function to show a message format from value given as parameter
 * 
 * @param int $age
 */
function showAge($age){
    echo '<br>Edad : '.$age.' anos</br>';
}
/**
 * function to show a message format from value given as parameter
 * 
 * @param int $salary
 */
function showSalary($salary){
    echo '<br>Salario anterior : '.$salary.' .00 €</br>';
}
/**
 * function to creare a border for data output
 */
function separator(){
    echo '<br>';
    echo '******************************************';
    echo '<br>';
}
/**
 * function to check if at least a element of an array is ('')
 * 
 * @param array $array
 * @return bool
 */
function isFull($array){
    foreach ($array as $data){
        if(empty($data)){
            return false;
        }
    }
    return true;
}
?>
