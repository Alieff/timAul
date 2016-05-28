<?php 
namespace App\Custom;
 
// Custom made class for Setting Crawler
class CrawlerConfig{
 
    private $pageNumber, $crawlDepth, $proxy, $isResumable, $web;

    //CONSTRUCTOR
    public function __construct($pageNumber, $crawlDepth, $proxy, $isResumable, $web)
    {
        $this->pageNumber = $pageNumber;
        $this->crawlDepth = $crawlDepth;
        $this->proxy = $proxy;
     	$this->isResumable = $isResumable;
        $this->web = $web;   
    }

    //GETTER
    public function getPageNumber() {
        echo $this->pageNumber;
    }

    public function getCrawlDepth() {
        echo $this->crawlDepth;
    }

    public function getProxy(){
    	echo $this->proxy;
    }
    
    public function getIsResumable(){
    	echo $this->isResumable;
    } 
    
    public function getWeb(){
    	echo $this->web;
    }

    //SETTER
    public function setPageNumber($value) {
        $this->pageNumber = $value;
    }

    public function setCrawlDepth($value) {
        $this->crawlDepth = $value;
    }

    public function setProxy($value){
    	$this->proxy = $value;
    }
    
    public function setIsResumable($value){
    	$this->isResumable = $value;
    } 
    
    public function setWeb($value){
    	$this->web = $value;
    }

}
?>