<?php
/**
 * Created by PhpStorm.
 * User: Deepak
 * Date: 20-02-2020
 * Time: 13:40
 */

namespace App\UserAccess;
use Illuminate\Support\Facades\Facade;

class UserAccessFacade extends Facade {
    protected static function getFacadeAccessor(){
        return 'useraccess';
    }
}