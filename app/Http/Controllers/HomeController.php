<?php

namespace App\Http\Controllers;

use App\Models\Surveys;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getSurveys(){
        $surveys = Surveys::all();
        return $surveys;
    }

    public function AllCounts($surveys){
        $surveys;
        $tab = [];
        for($i=0; $i<count($surveys); $i++){
            for($e=0; $e<count($surveys[$i]->responses); $e++){
                $tab[$i][$e] = $surveys[$i]->responses[$e]->count;
            }
        }
        return $tab;
    }

    public function countTotal(){
        $tab = $this->allCounts($this->getSurveys());
        $total = 0;
        for($i = 0; $i < count($tab); $i++){
            for($e=0; $e < count($tab[$i]); $e++){
                $total += $tab[$i][$e];
                if($e == count($tab[$i])-1){
                    array_push($tab[$i], $total);
                    $total = 0;
                    break;
                }
            }
        }
        return $tab;
    }

    public function countPourcent(){
        $tab = $this->countTotal();
        for($i = 0; $i < count($tab); $i++){
            for($e=0; $e < count($tab[$i]); $e++){
                if($tab[$i][count($tab[$i])-1] != 0){
                    $tab[$i][$e] = round($tab[$i][$e] / $tab[$i][count($tab[$i]) -1] *100);
                }else{
                    $tab[$i][$e] = 0;
                }

                if($e == count($tab[$i])-1){
                    array_pop($tab[$i]);
                }
            }
        }
        return $tab;
    }

    public function index(){
        //dd($this->countPourcent());
        //dd($this->getSurveys());
        return view('home',['surveys'=>$this->getSurveys(), "pourcent"=>$this->countPourcent()]);
    }



    public function pourcentVote(){
        $surveys = Surveys::all();

    }

    public function test(){
        echo "ok";
    }
}
