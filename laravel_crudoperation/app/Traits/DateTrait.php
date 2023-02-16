<?php

namespace app\Traits;

trait DateTrait{
    public function date_format($val){
        return date("Y-m-d h:i A",strtotime($val));
    }
}


?>