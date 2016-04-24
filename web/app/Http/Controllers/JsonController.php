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
    * @api {get} /api/getQuote/:jumlah Mendapatkan quote dari database secara acak sesuai jumlah
    * @apiName GetQuote
    * @apiGroup Quote
    *
    * @apiParam {Jumlah} jumlah Banyak quote yang ingin didapatkan
    *
    *	@apiSuccess {String} _id  id dari quotenya
    * @apiSuccess {String} quote Isi dari quotenya
    * @apiSuccess {String} author Pencetus quotenya
    * @apiSuccess {String} category Kategori dari authornya, jika belum dikategorisasi, maka null
    * @apiSuccess {String} language Bahasa dari quote tersebut
    * @apiSuccess {String} source Sumber website quote tersebut
    *
    * @apiSuccessExample Success-Response:
    * HTTP/1.1 200 OK
    *	{
    *    "_id": {
    *	        "$oid": "57164739be1b0517794090ec"
    *	    },
    *	    "quote": "We know what we are, but know not what we may be",
    *	    "author": "William Shakespeare",
    *	    "category": null,
    *	    "language": English,
    *	    "source": "http://www.brainyquote.com/quotes/authors/w/william_shakespeare.html"
    *	}
    *
    */
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
	  * @api {get} /api/getQuoteByAuthor/:jumlah/:author Mendapatkan quote sesuai jumlah
	  * @apiName GetQuoteByAuthor
	  * @apiGroup Quote
	  *
	  * @apiParam {Jumlah} jumlah Banyak quote yang ingin didapatkan
	  * @apiParam {Author} author Quote yang dicari akan berdasarkan author yang dicantumkan. Note: Tidak harus full nama authornya, yang akan dicari nantinya adalah author yang mengandung kata tersebut
    *
	  *	@apiSuccess {String} _id  id dari quotenya
	  * @apiSuccess {String} quote Isi dari quotenya
	  * @apiSuccess {String} author Pencetus quotenya
	  * @apiSuccess {String} category Kategori dari authornya, jika belum dikategorisasi, maka null
	  * @apiSuccess {String} language Bahasa dari quote tersebut
	  * @apiSuccess {String} source Sumber website quote tersebut
	  *
	  * @apiSuccessExample Success-Response:
	  * HTTP/1.1 200 OK
		*	{
		*    "_id": {
		*	        "$oid": "57164739be1b0517794090ec"
		*	    },
		*	    "quote": "The best way to predict the future is to invent it.",
		*	    "author": "Alan Kay",
		*	    "category": null,
		*	    "language": null,
		*	    "source": "http://quotelicious.com/quotes/past-present-future-quotes"
		*	}
		*
		* @apiError QuoteNotFound Quote tidak ditemukan
	 	* @apiErrorExample Error-Response:
	 	*     HTTP/1.1 404 Not Found
		*     {
		*       "error": "QuoteNotFound"
 		*     }
	  */
	 public function getQuoteByAuthor($jumlah,$author){
		 try{
			 echo $author;
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
	 * @api {get} getQuoteBySource/:jumlah/:source
	 * @apiName getQuoteBySource
	 * @apiGroup Quote
	 *
	 * @apiParam {jumlah} jumlah Banyak quote yang ingin didapatkan
	 * @apiParam {source} source quotes yang diinginkan
	 *
   * @apiSuccess {String} _id  id dari quotenya
   * @apiSuccess {String} quote Isi dari quotenya
   * @apiSuccess {String} author Pencetus quotenya
   * @apiSuccess {String} category Kategori dari authornya, jika belum dikategorisasi, maka null
   * @apiSuccess {String} language Bahasa dari quote tersebut
   * @apiSuccess {String} source Sumber website quote tersebut
	 *
   * @apiSuccessExample Success-Response:
   * HTTP/1.1 200 OK
   *	{
   *    "_id": {
   *	        "$oid": "57164739be1b0517794090ec"
   *	    },
   *	    "quote": "The best way to predict the future is to invent it.",
   *	    "author": "Alan Kay",
   *	    "category": null,
   *	    "language": null,
   *	    "source": "http://quotelicious.com/quotes/past-present-future-quotes"
   *	}
   *
   * @apiError QuoteNotFound Quote tidak ditemukan
   * @apiErrorExample Error-Response:
   *     HTTP/1.1 404 Not Found
   *     {
   *       "error": "QuoteNotFound"
   *     }
   */

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
