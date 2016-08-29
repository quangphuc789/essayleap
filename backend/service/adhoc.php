<?php

function send($message = null, $http_code = 200) {
    http_response_code($http_code);
    header('Content-Type: application/json; charset=utf-8');
    if ($message != null) {
        echo json_encode($message);
    }   
}