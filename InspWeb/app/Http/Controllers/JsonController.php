<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class JsonController extends Controller
{
    /**
     * Method ini contoh penggunaan API
     * @return JSON quote alif
     */
     public function index(){
		 try{
			 $statusCode = 200;
			 $response = array("Author"=>"Alief Aziz", "Quote"=>"Ayo kita jadi sapi biar ganteng",
				"Website"=>"www.aliefsapi.com");
		 }
		 catch (Exception $e){
			 $statusCode = 404;
		 }
		 finally{
			 return Response::json($response, $statusCode);
			 //return 'hehe';
		 }
	 }
}
