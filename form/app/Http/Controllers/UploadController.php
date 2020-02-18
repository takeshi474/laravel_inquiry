<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index(){
      return view('index');
    }

    public function store(Request $request){
      $file_name = $request -> file('file') -> getClientOriginalName();
      Storage::putFileAs('', $request -> file('file'), $file_name);
    }
}
