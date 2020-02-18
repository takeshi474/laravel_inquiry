<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsvDownloadController extends Controller
{
    public function practice1()
    {
      $query = \App\inquiry;
      // $query -> Join('profiles','auth_information.id','=','profiles.authinformation_id');
      $query -> orderBy('inquiry');
      $lists = $query -> paginate(10);

      $hash = array(
        'lists' => $lists,
      );

      return view('csv.practice1') -> with($hash);
    }
}
