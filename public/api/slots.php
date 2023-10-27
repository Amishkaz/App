<?php

include "functions.php";

$slots = get_all_query_full("SELECT s.id, s.name, s.company, v.number, p.slot, IF(p.id IS NULL, 'A', p.`to`) AS `to`
FROM slot s
         LEFT JOIN (
    SELECT id, vehicle, slot, `from`, `to`
    FROM parking
    WHERE id IN (
        SELECT MAX(id) AS max_id
        FROM parking
        GROUP BY slot
    )
) p ON p.slot = s.id

LEFT JOIN vehicle v on v.id = p.vehicle
");

for($i = 0; $i < sizeof($slots); $i++){
    $slot = $slots[$i];

    if ($slot['to'] == null){
        $slot['status'] = "Occupied";
    }else{
        $slot['status'] = "Free";
    }
    if ($slot['company'] != null && $slot['status'] == "Free"){
        $slot['status'] = "Reserved";
    }
    if ($slot['number'] == null){
        $slot['number'] = "&nbsp;";
    }

    unset($slot['to']);

    $slots[$i] = $slot;
}


echo json_encode($slots, JSON_PRETTY_PRINT);