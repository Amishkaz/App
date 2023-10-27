<?php

include "../functions.php";

function get_response($code, $message){

    return json_encode(array(
        'code' => $code,
        "message" => $message
    ));
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {

        if (!isset($_GET['number'])) {
            echo get_response(-1, "Incomplete request: Vehicle number is not present!");
            return;
        }

        $number = $_GET['number'];
        $query = "SELECT employee, id FROM vehicle WHERE number='$number'";

        $emp = get_all_query_full($query);
        if (sizeof($emp) == 0) {
            echo get_response(-1, "Vehicle is not registered in the system!");
            return;
        }

        echo get_response(0, "Vehicle is registered in the system!");
    }
    catch (Exception $exception){
        echo get_response(-1, "Unknown error occurred!");
    }

}
