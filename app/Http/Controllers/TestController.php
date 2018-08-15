<?php
namespace App\Http\Controllers;


use App\Helpers\Helper;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $helper;

    public function __construct(Helper $helper)
    {
        $this->helper = $helper;
    }

    public function index()
    {
        die("I WILL SHOW LIST");
    }

    public function show()
    {
        die("I WILL SHOW ONE");
    }

    public function update(Request $request, $id)
    {
        $this->helper->test();
        dd($request->input('test', "111111111111"));
        die("I WILL UPDATE $id");
    }

    public function destroy($id)
    {
        die("I WILL DESTROY $id");
    }

    public function store()
    {
        die("I WILL CREATE");
    }
}