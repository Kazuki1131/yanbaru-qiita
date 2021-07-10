<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Article;
use App\Category;
use App\Csv;

class CsvController extends Controller
{
    public function csvExport(Article $article, Category $category, Csv $csv) {

        $response = new StreamedResponse(function () use ($article, $category, $csv) {
            $categories = $category->getLists();
            $stream = fopen('php://output','w');

            // 文字化け回避
            stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');

            // ヘッダー行を追加
            fputcsv($stream, $csv->csvHeader());

            $results = $csv->getCsvData($article);

            if (empty($results[0])) {
                    fputcsv($stream, [
                        'データが存在しませんでした。',
                    ]);
            } else {
                foreach ($results as $row) {
                    fputcsv($stream, $csv->csvRow($row, $categories));
                }
            }
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('content-disposition', 'attachment; filename=yanbaru_qiita.csv');

        return $response;
    }
}
