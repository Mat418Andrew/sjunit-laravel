<?php
/**
 * Created by PhpStorm.
 * User: mi
 * Date: 2019/7/30/0030
 * Time: 21:55
 */
namespace ShineYork\SjunitLaravel\Http\Controllers;


use Illuminate\Routing\Controller;

class SjunitController extends Controller
{
    public function index()
    {
        return view();
    }


    public function store(Request $request)
    {
        $namespace  = $request->input('namespace');
        $className  = $request->input('className');
        $action     = $request->input('action');
        $param      = $request->input('param');
        $class = ($className == "") ? $namespace : $namespace.'\\'.$className;
        // 要提换的值  需要的结果
        $class = str_replace("/", "\\", $class);
        $object = new $class();
        $param = ($param == "") ? [] : explode('|', $param) ;
        $data = call_user_func_array([$object, $action], $param);
        return (is_array($data)) ? json_encode($data) : dd($data);
    }

}
