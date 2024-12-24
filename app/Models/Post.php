<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;


    protected $guarded = ['id'];
    protected $table = 'posts';


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categoryBlog()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
