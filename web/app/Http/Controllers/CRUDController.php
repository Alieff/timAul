<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Quotes;

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

       
        return view('admin.quote',[
                'quotes' => $quotes
        ]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit($id,$author,$category,$language,$source)
    {
        //http://localhost/timAul/web/public/admin/quote/5716472abe1b0517794090e5/author/sldkjf/category/22/language/22/source/22/edit
        var_dump($id);
        echo "<br>---------<br>"; 
        echo $id."<br>";
        echo $author."<br>";
        echo $category."<br>";
        echo $language."<br>";
        echo $source."<br>";
        echo "<br>---------<br>";  
        die();

        $user = Quotes::find($id);
        $user->quote = '" In order to succeed, you must first be willing to fail."';
        $user->author = 'not Anonymous';
        $user->category = '';
        $user->language = '';
        $user->source = '';
        $user->save();
        echo "$id, success";
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
