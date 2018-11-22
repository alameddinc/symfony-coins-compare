<?php
/**
 * Created by PhpStorm.
 * User: alameddincelik
 * Date: 22.11.2018
 * Time: 21:23
 */
namespace AppBundle;

class dovizAdapter
{
    private $usdTry;
    private $eurTry;
    private $gbpTry;
    public function __construct($url,$status=false)
    {
        $amount = "oran";
        $json = file_get_contents($url);
        $obj = json_decode($json,true);
        if($status){
            $obj=$obj['result'];
            $amount = "amount";
        }
        $this->usdTry=$obj[0][$amount];
        $this->eurTry=$obj[1][$amount];
        $this->gbpTry=$obj[2][$amount];
    }

    /*
     * Get Functions
     */
    public function getUsd()
    {
        return $this->usdTry;
    }

    public function getEuro()
    {
        return $this->eurTry;
    }
    public function getGbp(){
        return $this->gbpTry;
    }

    /*
     * Compare Functions
     */
    public function compareUsd($val){
        if($this->usdTry<=$val){
            return true;
        }else{
            return false;
        }
    }
    public function compareEuro($val){
        if($this->eurTry<=$val){
            return true;
        }else{
            return false;
        }
    }
    public function compareGbp($val){
        if($this->gbpTry<=$val){
            return true;
        }else{
            return false;
        }
    }

}