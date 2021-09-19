<?php
include 'db_connection.php';
function emailValidate($email){
$pattern = "/\w+[@][a-zA-z0-9]+[.][a-zA-z0-9]+$/";
    if (preg_match($pattern, $email)){
        return true;
    }else{
        return false;
    }
}
function charCount($data,$count){
    if (strlen(trim($data)) < $count){
        return false;
    }else{
        return true;
    }
}

function isStrong($password){
    $isupper = false;
    $islower = false;
    $isspeical = false;
    $isdigit = false;
    $countValid = false;
    if (preg_match("/[A-Z]/",$password)){
        $isupper = true;
    }
    if (preg_match("/[a-z]/",$password)){
        $islower = true;
    }
    if (preg_match("/[!@#$%.]/",$password)){
        $isspeical = true;
    }

    if (preg_match("/[0-9]/",$password)){
        $isdigit = true;
    }

    if (strlen($password) >= 8){
        $countValid = true;
    }
    if ($isupper and $islower and $isdigit and $isspeical and $countValid){
        return true;
    }else{
        return false;
    }

}
function addSingleQuote($data){
    foreach ($data as $col => $val){
        $data[$col] = "'$val'";
    }
    return $data;
}

function insertData($db, $table,$data){
    $columns = implode(",", array_keys($data));
    $values = implode(",",array_values(addSingleQuote($data)));
    $insert_query = "INSERT INTO $table ($columns) VALUES ($values)";
    $db->exec($insert_query);
}
function selectData($db,$table,$condition=null){
    $select_query = "SELECT * FROM $table $condition";
   $data =  $db->query($select_query);
    return $data->fetchAll();
}
function deleteData($db,$table,$condition=null){
    $select_query = "DELETE FROM $table $condition";
    $db->exec($select_query);
}
$user_arrrays = selectData($db,'users',"WHERE id = 5");


function updateData($db,$table,$data,$id){
    $update_data = null;
    foreach (addSingleQuote($data) as $col => $val){
        if (array_key_last($data) != $col){
            $update_data .= $col."=".$val.",";
        }else{
            $update_data .= $col."=".$val;
        }

    }
    $update_query = "UPDATE $table SET $update_data WHERE  id = $id ";
    $db->exec($update_query);
}

function upload($upload_file,$image_name){
    $save_file= "upload_file/".time().$image_name;
    move_uploaded_file($upload_file,$save_file);
}
