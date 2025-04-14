<?php 
namespace App\Service;

use App\Repositories\CoursRepositorie;




class CouersServis
{
    public function index (){
        $reviews = new CoursRepositorie();
        $data = $reviews->getDataRviws();

    }
}
    