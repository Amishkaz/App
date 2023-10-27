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

        if (!isset($_GET['number'])){
            echo get_response(-1, "Incomplete request: Vehicle number is not present!");
            return;
        }
        if (!isset($_GET['slot'])){
            echo get_response(-1, "Incomplete request: Parking slot is not present!");
            return;
        }

        $number = $_GET['number'];
        $type = $_GET['slot'];

        $query = "SELECT employee, id FROM vehicle WHERE number='$number'";

        $emp = get_all_query_full($query);
        if (sizeof($emp) == 0){
            echo get_response(-1, "Vehicle is not registered in the system!");
            return;
        }

        $emp_id = $emp[0]['employee'];
        $vehicle_id = $emp[0]['id'];

        //Checking for dedicated slot
        $slot = get_all_query_full("SELECT id FROM slot WHERE name='$type'");

        if (sizeof($slot) == 0){
            echo get_response(-1, "Unable to find the parking slot!");
            return;
        }else{
            $slot_id = $slot[0]['id'];
        }

        $query = "SELECT id FROM parking.parking WHERE vehicle=$vehicle_id AND `to` IS NULL ORDER BY id DESC";
        $parking = get_all_query_full($query);

        if (sizeof($parking) == 0) {
            echo get_response(-1, "Unable to find the parking details!");
            return;
        }

        date_default_timezone_set('Asia/Kolkata');

        $data = array(
            "`to`" => date('Y-m-d H:i:s', time())
        );
        $parking_id = $parking[0]['id'];
        update("parking", $data, "id=$parking_id");

        echo get_response(0, "Parking was updated!");
    }
    catch (Exception $exception){
        echo get_response(-1, "Unknown error occurred!");
    }

}
