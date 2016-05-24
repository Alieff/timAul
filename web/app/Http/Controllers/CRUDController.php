<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Quotes;
use App\Statistic;
use Carbon\Carbon;

class CRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $quotes =  Quotes::paginate(15);

        return view('admin.CRUD',[
                'quotes' => $quotes
        ]);
    }

     public function indexAdd(Request $request)
    {   
        return view('admin.addQuote',[]);
    }


    /**
    *   BUAT REFERENSI AUL
    */
    public function testing(Request $request){

        $sortSearch = $request->sort;
        $sortBySearch = $request->sortby;
        echo 'this is Author = ' . $request->author;
        echo 'This is Quote = ' . $request->quote;
        echo 'This is Source = ' . $request->source;
        echo 'This is sort = ' . $request->sort;
        echo 'This is sortby = ' .  $request->sortby .  '\n';

        $allRequest = $request->only(['author', 'quote', 'source']  );

        $ternyataKosong = TRUE;

        $authorThere = FALSE;
        $author = "";

        $quoteThere = FALSE;
        $quote = "";

        $sourceThere = FALSE;
        $source = "";

        $whereQuery = [];
        if ($request->has('author')) {
            $authorThere = TRUE;
            $ternyataKosong = FALSE;
            $author = $request->author;
            //$whereQuery['author'] = $request->author;
        }


        if ($request->has('quote')) {
            $ternyataKosong = FALSE;

            $quoteThere = TRUE;
            $quote = $request->quote;
           // $whereQuery['quote'] = $request->quote;
        }


        if ($request->has('source')) {
            $ternyataKosong = FALSE;
            $sourceThere = TRUE;
            $source = $request->source;
            echo "MASOOOOK DONNG";
         //   $whereQuery['source'] = $request->source;
        }

        $quotes = [];
        if($ternyataKosong){
            echo "masuk ga aaasa ini?";   
            $quotes =  Quotes::orderBy("$sortSearch","$sortBySearch")->paginate(15);
        }

        else{
            if($authorThere){
                echo "masuk ga ini?";   
                $quotes = Quotes::where('author', 'like', "%$author%");
                if($quoteThere){
                    $quotes = $quotes->where('quote', 'like', "%$quote%");
                }

                if($sourceThere){
                    $quotes = $quotes->where('source', 'like' , "$source%");
                }
            }
            
            else if ($quoteThere) {
                echo "masuk quote";
                $quotes = Quotes::where('quote', 'like', "%$quote%");
                   if($sourceThere){
                        $quotes = $quotes->where('source', 'like' , "$source%");
                    }
                }

            else {
                    echo "masa ini ga masuk?";
                    $quotes = Quotes::where('source', 'like' , "$source%");
                }
            $quotes->orderBy("$sortSearch","$sortBySearch");
            $quotes = $quotes->paginate(15);
        }

        $quotes->appends(\Input::except('page'))->links();
        return view('admin.CRUD',[
                'quotes' => $quotes
        ]);
    }
    /**
     * Function to create statistic data in database
     */
      public function updateTotalQuotes(){

        $totalQuote = Quotes::count();
        $stat = new Statistic;
        $stat->total = $totalQuote;
        $current_time = Carbon::now()->toDayDateTimeString();
        $stat->time =  $current_time;
        $stat->save(); 
        
        return redirect('admin/AddQuote');
    }
    /**
     * Function for creating a new Quote and add it to the database.
     */
    public function create(Request $request)
    {
        $quote = new Quotes;
        $quote->quote = $request->quote;
        $quote->author = $request->author;
        $quote->category = $request->category;
        $quote->language = $request->language;
        $quote->source = $request->source;
        $quote->save();
        return redirect('admin/updateStat');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

  
}
