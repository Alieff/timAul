<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\Quotes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

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
    // public function edit($id,$author,$category,$language,$source)
    public function edit($id)
    {
        // localhost/timAul/web/public/admin/CRUD/5716472abe1b0517794090e5/author/sldkjf/category/22/language/22/source/22/edit

        $quote = Quotes::find($id);
        // show the edit form and pass the quote
        return view('admin.update',[
                'quote' => $quote
        ]);
    }

    public function updatePage($id){
        // dummy id : 5716472abe1b0517794090e5
        $quotes =  Quotes::find($id);

        return view('admin.update',[
                'quote' => $quotes
        ]);
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
        // die('fine');
        $rules = array(
            'quote'      => 'required',
            'author'     => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::all());
                
        } else {

            // store
            $nerd = Quotes::find($id);
            $nerd->quote       = Input::get('quote');
            $nerd->author      = Input::get('author');
            $nerd->source = Input::get('source');
            $nerd->language = Input::get('language');
            $nerd->category = Input::get('category');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully updated quote!');
            return Redirect::to('admin/CRUD');
        }
        // die('peaceful boy');
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
