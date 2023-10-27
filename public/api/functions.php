<?php
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "parking";

global $con;
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$con) {
    die("Database error!");
}

$sid = session_id();


function get_all($table, $where = ""){

    if (strlen($where) > 0){
        $result = mysqli_query($GLOBALS['con'], "SELECT * FROM $table WHERE $where");
    }else{
        $result = mysqli_query($GLOBALS['con'], "SELECT * FROM $table");
    }

    $objects = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $object = array();

            foreach( $row as $field => $value) {
                $object[$field] = $value;
            }

            $objects[] = $object;
        }
    }

    return $objects;
}
function get_all_query($table, $query){

    $result = mysqli_query($GLOBALS['con'], "SELECT * FROM $table WHERE $query");

    $objects = array();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $object = array();

            foreach( $row as $field => $value) {
                $object[$field] = $value;
            }

            $objects[] = $object;
        }
    }

    return $objects;
}
function get_all_query_full($query){

    $result = mysqli_query($GLOBALS['con'], $query);

    $objects = array();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $object = array();

            foreach( $row as $field => $value) {
                $object[$field] = $value;
            }

            $objects[] = $object;
        }
    }

    return $objects;
}
function get($table, $where = ""){
    $results = get_all($table, $where);
    if (sizeof($results) > 0){
        return $results[0];
    }
    return null;
}

function add($table, $data){



    $keys = "";
    $values = "";

    foreach( $data as $field => $value) {
        $keys .= "$field,";
	
        if (is_string($value)){
            $values .= "'$value', ";
        }else if ($value == null){
	
	}else{
            $values .= "$value, ";
        }
    }

    $values = rtrim($values, ", ");
    $keys = rtrim($keys, ", ");

    $query = "insert into $table ($keys) 
                values ($values);";

    mysqli_query($GLOBALS['con'], $query);
}
function delete($table, $where){
    $query = "delete from $table where $where;";
    mysqli_query($GLOBALS['con'], $query);
}
function update($table, $data, $where){

    $keys = "";
    $values = "";

    foreach( $data as $field => $value) {
        $keys .= "$field,";
        if (is_string($value)){
            $values .= "$field = '$value', ";
        }else{
            $values .= "$field = $value, ";
        }
    }

    $values = rtrim($values, ", ");

    $query = "update $table 
                set $values
                where $where
                    ";


    mysqli_query($GLOBALS['con'], $query);

}

?>









