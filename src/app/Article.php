<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //複数代入時のホワイトリストを定義
    protected $fillable = ['user_id', 'title', 'category_id', 'summary', 'url'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
