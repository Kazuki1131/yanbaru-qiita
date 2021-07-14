<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'title', 'category_id', 'summary', 'url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function searchRange()
    {
        return [
            'termRanges' => range(1, 20),
            'categories' => Category::all(),
        ];
    }

    public function search($request)
    {
        // バリデーション済みのリクエストパラメーターの連想配列
        $search = [
            'term' => intval($request->term),
            'category' => intval($request->category),
            'word' => $request->word,
        ];

        // リクエストパラメーターに該当するレコードの取得
        $articles = $this->query()
            ->when($search['term'], function ($q) use ($search){
                return $q->whereHas('user', function ($q) use ($search){
                    return $q->where('term', $search['term']);
                });
            })
            ->when($search['category'], function ($q) use ($search){
                return $q->where('category_id', $search['category']);
            })
            ->when($search['word'], function ($q) use ($search){
                return $q->where('title', 'like', '%' . $this->escapeLike($search['word']) . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // 検索結果とページング時に検索条件を保持するための配列を値に持つ連想配列
        $searchData = [
            'articles' => $articles,
            'retentionParams' => [
                'term' => $search['term'] ?? null,
                'category' => $search['category'] ?? null,
                'word' => $search['word'] ?? null,
            ],
        ];

        return $searchData;
    }

    //’％’をワイルドカードとして認識しないようにエスケープ処理
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
}
