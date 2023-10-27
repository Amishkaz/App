<?php

//include "functions.php";

function predict($type, $year, $month){


    $vehicles = get_all_query_full("SELECT vehicle.id, vehicle.type, e.full_name as full_name, e.company as company FROM vehicle left join employee e on e.id = vehicle.employee");
    $slots = get_all_query_full("SELECT COUNT(slot.id) AS slots FROM slot;")[0]['slots'];
    $is_model = get("settings", "k='prediction_method' AND v='ml_model'");
    if ($is_model != null) {
        $response = predict_ml($vehicles, $year, $month);
    }else{
        $response = predict_algorithm($vehicles, $year, $month);
    }

    $total = 0;

    for ($i = 0; $i < sizeof($response); $i++){
        $total += $response[$i];
    }

    for ($i = 0; $i < sizeof($vehicles); $i++){
        $vehicles[$i]['fraction'] = $response[$i] / $total;
        $vehicles[$i]['slots'] = (int) round(($slots * $response[$i]) / $total, 0);
    }

    if (strcmp("vehicle", $type) == 0){

        $out = array(
            "type" => $type,
            "table" => array()
        );

        for ($i = 0; $i < sizeof($vehicles); $i++){
            $vehicle = $vehicles[$i];
            $out['table'][$vehicle['type']] = isset($out['table'][$vehicle['type']]) ?
                ($out['table'][$vehicle['type']] + $vehicle['slots']) : $vehicle['slots'];
        }

        return $out;
    }
    if (strcmp("employee", $type) == 0){

        $out = array(
            "type" => $type,
            "table" => array()
        );

        $key_name = "full_name";

        for ($i = 0; $i < sizeof($vehicles); $i++){
            $vehicle = $vehicles[$i];
            $out['table'][$vehicle[$key_name]] = isset($out['table'][$vehicle[$key_name]]) ?
                ($out['table'][$vehicle[$key_name]] + $vehicle['slots']) : $vehicle['slots'];
        }

        return $out;
    }
    if (strcmp("company", $type) == 0){

        $out = array(
            "type" => $type,
            "table" => array()
        );

        $key_name = "company";

        for ($i = 0; $i < sizeof($vehicles); $i++){
            $vehicle = $vehicles[$i];
            $out['table'][$vehicle[$key_name]] = isset($out['table'][$vehicle[$key_name]]) ?
                ($out['table'][$vehicle[$key_name]] + $vehicle['slots']) : $vehicle['slots'];
        }

        return $out;
    }



    return array();
}


function predict_ml($vehicles, $year, $month){

    $url = 'http://127.0.0.1:5000/predict';

    $req_v = array();
    for ($i = 0; $i < sizeof($vehicles); $i++){
        $req_v[]['id'] = $vehicles[$i]['id'];
    }

    $request = array(
        "year" => $year,
        "month" => $month,
        "vehicle" => $req_v
    );
    $request = array("data" => json_encode($request));

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => http_build_query($request)
        )
    );

    $context  = stream_context_create($options);

    $response = file_get_contents($url, false, $context);
    $response = json_decode(str_replace("\"", "", $response), true);

    return $response;
}

function predict_algorithm($vehicles, $year, $month){

    $targetYear = $year;
    $targetMonth = $month;

    $data = get_all_query_full("SELECT
    vehicle,
    YEAR(`from`) AS year,
    MONTH(`from`) AS month,
    SUM(TIMESTAMPDIFF(MINUTE, `from`, `to`)) AS total_duration
FROM
    parking
WHERE
  `to` IS NOT NULL
GROUP BY
    vehicle,
    YEAR(`from`),
    MONTH(`from`);");

    // Separate data by vehicle
    $groupedData = [];
    foreach ($data as $row) {
        $vehicle = $row['vehicle'];
        if (!isset($groupedData[$vehicle])) {
            $groupedData[$vehicle] = [];
        }
        $groupedData[$vehicle][] = $row;
    }

    // Predict future durations for each vehicle
    $predictions = [];
    foreach ($groupedData as $vehicle => $vehicleData) {
        $x = []; // Independent variable (month index)
        $y = []; // Dependent variable (total duration)

        // Prepare data for linear regression
        foreach ($vehicleData as $row) {
            $year = $row['year'];
            $month = $row['month'];
            $duration = $row['total_duration'];

            $monthIndex = ($year - $targetYear) * 12 + ($month - $targetMonth);
            $x[] = $monthIndex;
            $y[] = $duration;
        }

        // Perform linear regression
        $coefficients = linearRegression($x, $y);

        // Predict future duration
        $targetMonthIndex = 0;
        $predictions[$vehicle] = predict_($coefficients, $targetMonthIndex);
    }

    //Reorder
    $r = array();
    for ($i=0; $i < sizeof($vehicles); $i++){
        $v = $vehicles[$i];
        $p = $predictions[$v['id']];
        $r[] = $p;
    }

    return $r;
}

function linearRegression($x, $y) {
    $n = count($x);
    $sumX = array_sum($x);
    $sumY = array_sum($y);
    $sumX2 = 0;
    $sumXY = 0;

    for ($i = 0; $i < $n; $i++) {
        $sumX2 += $x[$i] * $x[$i];
        $sumXY += $x[$i] * $y[$i];
    }

    $slope = ($n * $sumXY - $sumX * $sumY) / ($n * $sumX2 - $sumX * $sumX);
    $intercept = ($sumY - $slope * $sumX) / $n;

    return ['slope' => $slope, 'intercept' => $intercept];
}

function predict_($coefficients, $x) {
    $slope = $coefficients['slope'];
    $intercept = $coefficients['intercept'];
    return $intercept + $slope * $x;
}

//
//$a = predict("vehicle", 2023, 6);
//print_r(json_encode($a));