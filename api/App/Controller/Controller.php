<?php 

namespace App\Controller;

use App\Database\Connection;
use App\Http\Response;
use App\Route\Router;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;

class Controller
{
    public function __construct()
    {
        $this->repository = new Connection();
    }

    public function summary()
    {
        $query = "SELECT * FROM tbl_00;";
        $data = $this->repository->fetchAll($query);
        return Response::json('Success', 200, $data);
    }

    public function details()
    {
        $id = Router::params('id', 0);
        //Where Params should be made in mysql statement and bind properties
        $query = "SELECT tb1.*, tb2.SSCC FROM tbl_01 tb1 
            left join tbl_02 tb2 on tb2.ID = tb1.ID 
            where tb1.ARTICULO = $id;
        ";

        $data = $this->repository->fetchAll($query, ['id' => $id]);
        
        return Response::json('Success', 200, $data);
    }
}