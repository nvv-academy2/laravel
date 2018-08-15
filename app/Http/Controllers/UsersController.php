<?php
/**
 * Created by PhpStorm.
 * User: ПК
 * Date: 15.08.2018
 * Time: 19:50
 */

namespace App\Http\Controllers;


class UsersController extends Controller
{
    public function index()
    {
        return response()->json(['status' => true]);
    }

    public function test()
    {
        die("test");
    }
}