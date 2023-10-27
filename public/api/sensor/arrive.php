<?php

include "../functions.php";

function get_response($code, $message){

    return json_encode(array(
        'code' => $code,
        "message" => $message
    ));
}
function get_response2($code, $message,$empid,$slot_name){
    $emp = get_all_query_full("SELECT username from employee where id = '$empid';");
    if (sizeof($emp) == 0){
        $message = "There are no available  parking slots!";
    }else{
        $emp_name = $emp[0]['username'];
        $message = "Your parking slot is $slot_name!";
        file_get_contents("http://52.66.241.98/$emp_name", false, stream_context_create([
                    'http' => [
                        'method' => 'POST',
                        'header' =>
                            "Content-Type: text/plain\r\n" .
                            "Priority: 4",
                        'content' => $message  
                    ]
                ]));         
        
    }
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
        $type = null;
        if (isset($_GET['type'])){
            $type = $_GET['type'];
        }

        $number = $_GET['number'];

        on_vehicle_number($number, $type);

    }
    catch (Exception $exception){
        echo get_response(-1, "Unknown error occurred!");
    }

}

function on_vehicle_number($number, $ml_type){
date_default_timezone_set('Asia/Kolkata');
    $query = "SELECT employee, vehicle.id as id, e.company as company FROM vehicle 
    left join employee e on e.id = vehicle.employee  WHERE number='$number' ";

    $emp = get_all_query_full($query);
    $emp_id = -1;
    if (sizeof($emp) == 0){
        $type = get_vehicle_type($number);
        if ($type == null){
            $type = $ml_type;
        }

        $slot = get_all_query_full("SELECT id FROM slot WHERE type='$type' AND company='' AND id NOT IN (SELECT parking.parking.slot FROM parking WHERE parking.parking.`to` IS NULL);"); //

    }
		else{
        $emp_id = $emp[0]['employee'];
        $company = $emp[0]['company'];
        $vehicle_id = $emp[0]['id'];

        //Checking for dedicated slot
        $slot = get_all_query_full("SELECT id FROM slot WHERE company='$company';"); ///*AND type='$type'*/
        if (sizeof($slot) == 0){
            $slot = get_all_query_full("SELECT id FROM slot WHERE id NOT IN (SELECT parking.parking.slot FROM parking WHERE parking.parking.`to` IS NULL);"); //AND type='$type'
        }
    }


    if (sizeof($slot) == 0){
        $message = "There are no available  parking slots!";
    }else{
        $slot_id = $slot[0]['id'];
        $slot_name = get("slot", "id=$slot_id")['name'];
        $message = "Your parking slot is $slot_name!";

			$data2 = array(
				"time" => date('Y-m-d H:i:s', time()),
				"vehicle" => $number,
				"slot" => $slot_id
			);

			add("arrive", $data2);

		}

    $data = array(
        "time" => date('Y-m-d H:i:s', time()),
        "message" => $message,
        "`to`" => intval($emp_id)
    );

    add("alert", $data);


    echo get_response2(0, "Employee was alerted!",$emp_id,$slot_name);
}

function get_vehicle_type($vehicleNumber) {

    $vehicleTypes = array(
        'motor bike' => array('T', 'U', 'V', 'W', 'X', 'BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BJ'),
        'car' => array('K', 'CA', 'CB'),
        'lorry' => array('P', 'L'),
        'van' => array()
    );

    foreach ($vehicleTypes as $vehicleType => $prefixes) {
        foreach ($prefixes as $prefix) {
            if (substr($vehicleNumber, 0, strlen($prefix)) === $prefix) {
                return $vehicleType;
            }
        }
    }

    return null;
}


