<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SampleController extends Controller
{
    public function index( Request $request )
    {
      // キーワードで検索
      $keyword = $request -> keyword;
      $inquiry_list = DB::search($keyword);

      return view('export.index', ['Inquiry_list' => $inquiry_list, 'keyword' => $keyword]);
    }

    public function export( Request $request )
    {
      $response = new StreamedResponse (function() use ($request){
        // キーワードで検索
        $keyword = $request -> keyword;
        $stream = fopen('php://output', 'w');
        // 文字化け回避
        $stream_filter_prepend($stream,'convert.iconv.utf-8/cp932//TRANSLIT');
        // タイトルを追加
        fputcsv($stream, ['id', 'name', 'email', 'post', 'created_at', 'updated_at']);

        inquiry::where('name', 'LIKE', '%' .$keyword. '%') -> chunk( 1000, function($results) use ($stream) {
              foreach ($results as $result) {
                fputcsv($stream, [
                $result -> id,
                $result -> name,
                $result -> email,
                $result -> post,
                $result -> created_at,
                $result -> updated_at]);
              }
      });
      fclose($stream);
    });
    $response -> headers -> set('Content-Type', 'application/octet-stream');
    $response -> headers -> set('Content-Disposition', 'attachment; filename="InquiryList.csv"');

    return $response;
  }
}
