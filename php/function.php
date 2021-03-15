<?php


function create($table_name, $fieldvalues) {
    $cmd_keys = array_keys($fieldvalues);
    $cmd_values = array_values($fieldvalues);
    $res="INSERT INTO $table_name(";
    $res.= \implode(',', $cmd_keys);
    $res.= ") VALUES(";
    array_walk($fieldvalues, function(&$v){$v = "'$v'";});
    $res.= \implode(',', $fieldvalues);
    $res.= ");";
    return $res;
}


function Update ($table,$fieldvalues){

    $res="UPDATE `$table` SET";
    $parts=[];
    foreach ($fieldvalues as $key => $value){
        $parts[]="`$key`= :$key ";
    }
    $res.= \implode(',',$parts);
    return $res." WHERE id=:id";
    
}


function Delete ($table, $id){
    $res="DELETE FROM `$table`";
    return $res." WHERE id=$id";
    
}

function Getpage ($table){
    $res="SELECT * FROM `$table`";
    return $res;   
}
?>