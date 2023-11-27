<?php

namespace app\Traits;
//formating response
trait ApiResponseFormatter
{
    public function apiResponse($code = 200, $message = "succsess", $data = [])
    {
        //format data
        return json_encode([
            "code" => $code,
            "message" => $message,
            "data" => $data
        ]);
    }
}
