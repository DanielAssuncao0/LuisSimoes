<?php 

namespace App\Controller;

use App\Http\Response;

class Controller
{
    public function summary()
    {
        // var_dump(Response::json('Success', 200, ['Test' => 'test1']));
        return Response::json('Success', 200, ['Test' => 'test1']);
    }

    public function details()
    {
        return Response::json('Success', 200, ['Test' => 'test1']);
    }

    //Reconstruct database tables
    public function restore()
    {
        
    }
}