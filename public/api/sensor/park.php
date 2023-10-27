<?php

include "../functions.php";

function get_response($code, $message){

    return json_encode(array(
        'code' => $code,
        "message" => $message
    ));
}
function pushNoti($number,$slot,$fmessage){
    //$emp = get_all_query_full("SELECT username from employee where id = '$empid';");
    $emp = get_all_query_full("SELECT e.username FROM employee e INNER JOIN vehicle v ON e.id = v.employee WHERE v.number = '$number';");
    if (sizeof($emp) == 0){
        $message = "There are no available  parking slots!";
    }else{
        $emp_name = $emp[0]['username'];
        $message = "Your parking slot is $slot!";
        file_get_contents("http://52.66.241.98/$emp_name", false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' =>
                    "Content-Type: text/plain\r\n" .
                    "Title: $message\r\n" .
                    "Priority: urgent\r\n" .
                    "Tags: warning",
                'content' => $fmessage
            ]
        ]));

    }
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
				if ($number == null || strlen($number) == 0){
					echo get_response(-1, "Incomplete request: Vehicle number is not present!");
					return;
				}

			$type = $_GET['slot'];
				if ($type == null || strlen($type) == 0){
					echo get_response(-1, "Incomplete request: Parking slot is not present!");
					return;
				}


        $query = "SELECT employee, id FROM vehicle WHERE number='$number'";

        $emp = get_all_query_full($query);
				$vehicle_id = -1;
        if (sizeof($emp) != 0) {
					$emp_id = $emp[0]['employee'];
					$vehicle_id = $emp[0]['id'];
				}


			$slot = get_all_query_full("SELECT id, name FROM slot WHERE name='$type'");

        if (sizeof($slot) == 0){
            echo get_response(-1, "Unable to find the parking slot!");
            return;
        }else{
            $slot_id = $slot[0]['id'];
        }

        date_default_timezone_set('Asia/Kolkata');

        $data = array(
            "`from`" => date('Y-m-d H:i:s', time()),
            "vehicle" => $vehicle_id,
            "slot" => $slot_id
        );
				if ($vehicle_id != -1){
					add("parking", $data);
				}


//			{
//				$data = array(
//					"time" => date('Y-m-d H:i:s', time()),
//					"message" => $number . " was successfully parked in " . $slot_id . ".",
//					"`to`" => -1
//				);
//				add("alert", $data);
//			}
			{
				$now = date("Y-m-d H:i:s");
				$time = date('Y-m-d H:i:s', strtotime('-10 minutes', strtotime($now)));

				$arrives = get_all("arrive", "vehicle='$number' AND time>'$time'");

				$admin_msg = $number . " was successfully parked in " . $slot_id . ".";

				$p = $slot[0];

				if (sizeof($arrives) == 0){
					$admin_msg = $number . " was parked in " . $p['name'] . ". But it does not have a allocated slot!";
				}else{
					
					$sid = $arrives[0]['slot'];
					$allocated_slot = get("slot", "id=".$sid)['name'];

					if ($slot_id != $sid){
						$admin_msg = $number . " was not parked in correct slot! Allocated: " . $allocated_slot . "| Parked: ".$p['name'];
                        pushNoti($number,$allocated_slot,$admin_msg);
					}else{
						$admin_msg = $number . " was successfully parked in " . $allocated_slot . ".";
					}
				}

				$data = array(
					"time" => date('Y-m-d H:i:s', time()),
					"message" => $admin_msg,
					"`to`" => -1
				);
				add("alert", $data);


			}

        echo get_response(0, "Parking was added!");
    }
    catch (Exception $exception){
				echo $exception ->getMessage();
        echo get_response(-1, "Unknown error occurred!");
    }

}
