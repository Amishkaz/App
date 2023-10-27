<?php

include "functions.php";
include "predict.php";

/*
 * type:    get, get all, add, update, delete
 * table:   related table name
 * data:    data for update and insertion
 * where:   specify the row
 */

function get_response($status, $data, $error){
/*    if (!isset($_SESSION['login'])){
        return json_encode(array(
            'status' => "FAILED",
            'data' => "",
            'error' => "Your session is expired!",
            'auth' => null
        ));
    }*/

    $l = null;
    if (isset($_SESSION['login'])){
        $l = $_SESSION['login'];
    }

    return json_encode(array(
        'status' => $status,
        'data' => $data,
        'error' => $error,
        'auth' => $l
    ));
}
function get_response_auth($status, $data, $error){

    if (isset($_SESSION['login'])){
        $login = $_SESSION['login'];
    }
    else{
        $login = null;

    }
    return json_encode(array(
        'status' => $status,
        'data' => $data,
        'error' => $error,
        'auth' => $login
    ));
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $params = ["type", "data", "table", "where"];

    foreach ($params as $param){
        if (!isset($_GET[$param])){
            echo get_response("FAILED", array(), "Required parameter $param is not fount!");
            return;
        }
    }


    try {
        $type = $_GET['type'];
        $table = $_GET['table'];
        $data = json_decode($_GET['data'], true);
        $where = $_GET['where'];

        if (strcmp($type, "get") == 0){
            echo
                get_response(
                    "SUCCESS",
                    get($table, $where),
                    ""
                );
        }
        if (strcmp($type, "get all") == 0){
            echo
                get_response(
                    "SUCCESS",
                    get_all($table, $where),
                    ""
                );
        }
        if (strcmp($type, "add") == 0){

            add($table, $data);

            if (strcmp($table, "employee") == 0){
                $username = $data['username'];
                $password = $data['password'];

                $user = get("employee", "username='$username'");
                if ($user == null){
                    echo get_response_auth(
                        "FAILED",
                        "",
                        "Invalid username!"
                    );
                    return;
                }

                $_SESSION['login'] = $user;
            }

            echo
                get_response(
                    "SUCCESS",
                    "",
                    ""
                );

//            $_SESSION['login'] = $data;
        }
        if (strcmp($type, "update") == 0){
            update($table, $data, $where);

            if (strcmp($table, "user") == 0){
                $_id = $_SESSION['login']['id'];
                $_SESSION['login'] = get('user', "id=$_id");
            }

            echo
                get_response(
                    "SUCCESS",
                    "",
                    ""
                );
        }
        if (strcmp($type, "delete") == 0){
            delete($table, $where);

            echo
                get_response(
                    "SUCCESS",
                    "",
                    ""
                );
        }
        if (strcmp($type, "auth") == 0){

            if (strcmp($table, "login") == 0){

                $username = $data['username'];
                $password = $data['password'];

                $user = get("employee", "username='$username'");
                if ($user == null){
                    echo get_response_auth(
                        "FAILED",
                        "",
                        "Invalid username!"
                    );
                    return;
                }
                if (strcmp($user['password'], $password) != 0){
                    echo get_response_auth(
                        "FAILED",
                        "",
                        "Invalid password!"
                    );
                    return;
                }

                $_SESSION['login'] = $user;
                echo get_response_auth(
                    "SUCCESS",
                    $user,
                    ""
                );
            }
            if (strcmp($table, "logout") == 0){

                $_SESSION['login'] = null;
                echo get_response(
                    "SUCCESS",
                    "",
                    ""
                );
            }
            if (strcmp($table, "data") == 0){

                $user = $_SESSION['login'];
                if ($user == null){
                    echo get_response(
                        "FAILED",
                        "",
                        "Your session is expired!"
                    );
                    return;
                }

                echo get_response(
                    "SUCCESS",
                    $user,
                    ""
                );
            }


        }

    }
    catch (Exception $exception){
        echo get_response("FAILED", array(), $exception->getMessage());
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $json_input = file_get_contents('php://input');
    $post_data = json_decode($json_input, true);

    $params = ["type", "data", "table", "where"];

    foreach ($params as $param){
        if (!isset($post_data[$param])){
            echo get_response("FAILED", array(), "Required parameter $param is not fount!");
            return;
        }
    }

    try {
        $type = $post_data['type'];
        $table = $post_data['table'];
        $data = json_decode($post_data['data'], true);
        $where = $post_data['where'];

        $q = array();

        if (strcmp($type, "add") == 0){

            add($table, $data);

            if (strcmp($table, "user") == 0){
                $username = $data['username'];
                $password = $data['password'];

                $user = get("user", "username='$username'");
                if ($user == null){
                    echo get_response_auth(
                        "FAILED",
                        "",
                        "Invalid username!"
                    );
                    return;
                }
                if (strcmp($user['password'], $password) != 0){
                    echo get_response_auth(
                        "FAILED",
                        "",
                        "Invalid password!"
                    );
                    return;
                }

                $_SESSION['login'] = $user;
            }

            echo
            get_response(
                "SUCCESS",
                "",
                ""
            );

        }
        if (strcmp($type, "predict") == 0){

            $result = predict($data['type'], $data['year'], $data['month']);

//            if ($result === FALSE) {
//                echo get_response(
//                    "FAILED",
//                    "",
//                    "IDK"
//                );
//                return;
//            }

            echo get_response(
                "SUCCESS",
                $result,
                ""
            );

        }
        if (strcmp($type, "update") == 0){
            update($table, $data, $where);

            if (strcmp($table, "employee") == 0){
                $_id = $_SESSION['login']['id'];
                $_SESSION['login'] = get('employee', "id=$_id");
            }

            echo
            get_response(
                "SUCCESS",
                "",
                ""
            );
        }

    }
    catch (Exception $exception){
        echo get_response("FAILED", array(), $exception->getMessage());
    }

}

?>









