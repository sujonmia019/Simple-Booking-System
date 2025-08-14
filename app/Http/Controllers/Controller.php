<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function setPageTitle(string $title, string $siteTitle = null, $subTitle = null){
        return view()->share(['title'=>$title, 'siteTitle'=>$siteTitle, 'subTitle'=>$subTitle]);
    }

    protected function responseJson($status = 'success',$message = null, $data = null, $response_code = 200)
    {
        return response()->json([
            'status'        => $status,
            'message'       => $message,
            'data'          => $data,
            'response_code' => $response_code
        ], $response_code);
    }
}
