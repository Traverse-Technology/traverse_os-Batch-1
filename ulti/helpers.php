<?php
function emailValidate($email){
$pattern = "/\w+[@][a-zA-z0-9]+[.][a-zA-z0-9]+$/";
    if (preg_match($pattern, $email)){
        return true;
    }else{
        return false;
    }
}
function charCount($data,$count){
    if (strlen($data) < $count){
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

function insertData($table,$data){
    print_r(addSingleQuote($data));
    $columns = implode(",", array_keys($data));
    $values = implode(",",array_values($data));
    $insert_query = "INSERT INTO $table ($columns) VALUES $values";
}


$table = "users";
$data = array(
    "name" => "Maung Maung",
    "email" => "mgmg@gmail.com",
    "phone" => "0993434553",
    "status" => "active",
    "address" => "MDY"
);

insertData($table,$data);
function addSingleQuote($data){
    foreach ($data as $col => $val){
        $data[$col] = "'$val'";
    }
    return $data;
}