<?php

$firstArray = array(
    'key1' => 'Val1',
    'key2' => 'Val2',
    'key3' => 'Val3'
);

$secondArray = array(
    'Val4',
    'Val5',
    'Val6'
);

$newArray = array_combine($firstArray, $secondArray);

print_r($newArray);
?>