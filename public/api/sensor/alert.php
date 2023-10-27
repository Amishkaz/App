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
        if (!isset($_GET['message'])) {
            echo get_response(-1, "Incomplete request: Message is not present!");
            return;
        }

        $number = $_GET['number'];
        $message = $_GET['message'];

        if (strcmp("ADMIN", $number) == 0) {
            $to = 2;
        }else{
            $query = "SELECT employee, id FROM vehicle WHERE number='$number'";

            $emp = get_all_query_full($query);
            if (sizeof($emp) == 0) {
                echo get_response(-1, "Vehicle is not registered in the system!");
                return;
            }

            $emp_id = $emp[0]['employee'];

            $to = intval($emp_id);
    }

        date_default_timezone_set('Asia/Kolkata');

        $data = array(
            "time" => date('Y-m-d H:i:s', time()),
            "message" => $message,
            "`to`" => $to
        );
        add("alert", $data);

        echo get_response(0, "Alerted!");
    }
    catch (Exception $exception){
        echo get_response(-1,$exception ->getMessage());
    }

}
