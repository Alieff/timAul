<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingFormRequest;
use App\Custom\CrawlerConfig;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function readConfig()
    {
        $data = new CrawlerConfig("","","","","");
        $file = fopen(public_path('config.txt'),"r");
        $index=0;

        while($index<4)
        {
            $field = explode("=", fgets($file));
            if($index==0){
                $data->setPageNumber($field[1]);
            }
            if($index==1){
                $data->setCrawlDepth($field[1]);
            }
            if ($index==2) {
                $data->setProxy($field[1]);
            }
            if ($index==3) {
                $data->setIsResumable($field[1]);
            }
            $index++;
        }
        //read webAddress :
        fgets($file);
        $web_address = '';

        while(!feof($file))
        {
            $web_address .= fgets($file);
        }

        $data->setWeb($web_address);
        fclose($file);

        return View('admin.setting')->with('data', $data);
    }

    public function store(SettingFormRequest $request){
        $file = fopen(public_path('config.txt'),"w");

        $txt = "pageNumber=" . $request->get('page_number') . "\n";
        fwrite($file, $txt);
        $txt = "crawlDepth=" . $request->get('crawl_depth') . "\n";
        fwrite($file, $txt);
        $txt = "proxy=" . $request->get('proxy') . "\n";
        fwrite($file, $txt);
        $txt = "isResumable=" . $request->get('resumable') . "\n";
        fwrite($file, $txt);
        $txt = "webAddress:" . "\n";
        fwrite($file, $txt);    
        $txt = $request->get('web') . "\n";
        fwrite($file, $txt);
        fclose($file); 
        
        return View('admin.setting')
           ->with('message', 'Configuration Saved!');
    }

}
