<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Csv extends Model
{

    public function getCsvData($article)
    {
        $data = $article->select(
                    'u.name AS user_name',
                    'articles.title',
                    'articles.category_id',
                    'articles.summary',
                    'articles.url',
                    'articles.created_at',
                )
            ->leftJoin('users AS u', 'articles.user_id','=','u.id')
            ->whereNull('deleted_at')
            ->orderBy('articles.created_at', 'desc')
            ->get();

        return $data;
    }

    public function csvHeader(){
        return [
                '名前',
                'カテゴリ',
                'タイトル',
                '概要',
                'URL',
                '投稿日'
        ];
    }
    public function csvRow($row, $array_category){

        return [
            $row->user_name,
            $array_category[$row->category_id],
            $row->title,
            $row->summary,
            $row->url,
            $row->created_at
        ];
    }
}
