<?php
namespace App\Http\Controllers;


use App\Helpers\Helper;
use App\Test;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $helper;

    public function __construct(Helper $helper)
    {
        $this->helper = $helper;
    }

    public function index(Request $request)
    {
        $collection = Test::all();
        $data = $collection->toArray();
        /*$collection = $collection->map(function (Test $test) {
                    $test->date = date("Y-m-d H:i:s", $test->date);
                    return $test;
                });*/
        return view('test', ['data' => $data, 'user' => $request->user()]);
    }

    public function store(Request $request)
    {
        $test = new Test();
        $test->name = $request->name;
        $test->date = $request->date;
        $test->save();
        return response()->json($test);
    }
}