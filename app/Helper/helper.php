<?php

if(!function_exists('sendResponse')){
    function sendResponse($status, $message, $data){
        return response()->json([
            'status'    => $status,
            'message'   => $message,
            'data'      => $data
        ]);
    }
}

function convertTimeIntoHourMinute($originalTime){
    $hour = floor($originalTime);
    $minute = floor(($originalTime - $hour) * 60);
    $responseTime ="";
    if(isset($hour) && $hour > 0){
        $responseTime .= $hour. " hr ";
    }
    if(isset($minute) && $minute > 0){
        $responseTime .= $minute. " min";
    }
    return $responseTime;
}