<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Quotes;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $quotes =  Quotes::paginate(15);
        // die('hoea, at quote controller, method index')
       // echo $test;
        $i = 1;
  //      foreach($test as $kucing){
    //    	echo $i++ . " " . $kucing->_id;
      //  }
        echo "hehehe";
        // die('kj');
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
        //
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
