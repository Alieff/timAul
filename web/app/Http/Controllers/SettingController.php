<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingFormRequest;

class SettingController extends Controller
{
    public function create()
    {
        $data = [];
        $file = fopen(public_path('config.txt'),"r");
        $index=0;

        while($index<4)
        {
            $field = explode("=", fgets($file));
            if($index==0){
                $data['page_number'] = $field[1];
            }
            if($index==1){
                $data['crawl_depth'] = $field[1];
            }
            if ($index==2) {
                $data['proxy'] = $field[1];
            }
            if ($index==3) {
                $data['resumable'] = $field[1];;
            }
            $index++;
        }
        //read webAddress :
        fgets($file);
        $data['web_address'] = '';

        while(!feof($file))
        {
            $data['web_address'] .= fgets($file);
        }

        fclose($file);

        return View('admin.setting')->with('data', $data);
    }

    public function store(SettingFormRequest $request){
        $file = fopen(public_path('config.txt'),"w");

        $data = array(
            'page_number' => $request->get('page_number'),
            'crawl_depth' => $request->get('crawl_depth'),
            'proxy' => $request->get('proxy'),
            'resumable' => $request->get('resumable'),
            'web_address' => $request->get('web')
        );


        $txt = "pageNumber=" . $data['page_number'] . "\n";
        fwrite($file, $txt);
        $txt = "crawlDepth=" . $data['crawl_depth'] . "\n";
        fwrite($file, $txt);
        $txt = "proxy=" . $data['proxy'] . "\n";
        fwrite($file, $txt);
        $txt = "isResumable=" . $data['resumable'] . "\n";
        fwrite($file, $txt);
        $txt = "webAddress:" . "\n";
        fwrite($file, $txt);    
        $txt = $data['web_address'] . "\n";
        fwrite($file, $txt);
        fclose($file); 
        
        return \Redirect::route('setting')
           ->with('message', 'Configuration Saved!');
    }

}
