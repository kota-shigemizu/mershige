<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// 並べ替え
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use HasFactory;
    use Sortable;

    protected $post = 'posts';

    protected $fillable =
    [
        'title',
        'price',
        'description',
    ];

    public $sortable =
    [
        'id',
        'price',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function nices() {
        return $this->hasMany('App\Models\Nice');
    }
}
