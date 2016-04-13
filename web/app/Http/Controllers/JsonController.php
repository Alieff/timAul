<?php

namespace App\Http\Controllers;
use App\Quotes;
use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class JsonController extends Controller
{
    /**
     * Method ini contoh penggunaan API
     * TODO Later on next version: generate token for verified user.
     * @return JSON quote 
     */
     public function index(){
		 $quotes = Quotes::all();
		 $randQuote = rand(1,count($quotes));
		 $quotees = $quotes[$randQuote-1];
		 try{
			 $statusCode = 200;
			 
			 $response = $quotees;
		 }
		 catch (Exception $e){
			 $statusCode = 404;
			 $response = "error coy";
		 }
		 finally{
			 return Response::json($response, $statusCode);
			 //return 'hehe';
		 }
	 }
	 
	 /**
	  * 
	  * */
	 public function getQuote($jumlah){
		 try{
			$statusCode = 200;
			$response = [];
			$totalQuote = Quotes::count();
			$doneRandom = [];
			
			//EXCEPTION FOR JUMLAH > TOTALQUOTE
			if($jumlah > $totalQuote){
				throw Exception;
			}
			
			for($i=$jumlah; $i > 0; $i=$i-1){
				$randQuote = rand(1,$totalQuote);
				while(in_array($randQuote, $doneRandom)){
					$randQuote = rand(1,$totalQuote);
				}
				
				$quotes = Quotes::find($randQuote);
				
				array_push($doneRandom,$randQuote);
				array_push($response,$quotes);
				
			}
		 
		 }
		 catch (Exception $e){
			 $statusCode = 404;
			 $response = "error coy";
		 }
		 finally{
			 return Response::json($response, $statusCode);
			 //return 'hehe';
		 }
	 }
	 
	 /**
	  * 
	  * 
	  * */
	 public function getQuoteByAuthor($jumlah,$author){
		 try{
			$statusCode = 200;
			$response = [];
			$authorQuote = Quotes::where('author', $author)->get();
			$totalQuote = count($authorQuote);
			$doneRandom = [];
			
			//EXCEPTION FOR JUMLAH > TOTALQUOTE
			if($jumlah > $totalQuote){
				throw Exception;
			}
			
			for($i=$jumlah; $i > 0; $i=$i-1){
				$randQuote = rand(1,$totalQuote);
				while(in_array($randQuote, $doneRandom)){
					$randQuote = rand(1,$totalQuote);
				}
				
				$quotes = $authorQuote[$randQuote-1];
				
				array_push($doneRandom,$randQuote);
				array_push($response,$quotes);
			}
		 
		 }
		 catch (Exception $e){
			 $statusCode = 404;
			 $response = "error coy";
		 }
		 finally{
			 return Response::json($response, $statusCode);
			 //return 'hehe';
		 }
	 }
	 
	  /**
	  * 
	  * 
	  * */
	 public function getQuoteBySource($jumlah,$source){
		 try{
			$statusCode = 200;
			$response = [];
			$sourceQuote = Quotes::where('source', 'like', "%$source%")->get();
			$totalQuote = count($sourceQuote);
			$doneRandom = [];
			
			//EXCEPTION FOR JUMLAH > TOTALQUOTE
			if($jumlah > $totalQuote){
				throw Exception;
			}
			
			for($i=$jumlah; $i > 0; $i=$i-1){
				$randQuote = rand(1,$totalQuote);
				while(in_array($randQuote, $doneRandom)){
					$randQuote = rand(1,$totalQuote);
				}
				
				$quotes = $sourceQuote[$randQuote-1];
				
				array_push($doneRandom,$randQuote);
				array_push($response,$quotes);
			}
		 
		 }
		 catch (Exception $e){
			 $statusCode = 404;
			 $response = "error coy";
		 }
		 finally{
			 return Response::json($response, $statusCode);
			 //return 'hehe';
		 }
	 }
}
