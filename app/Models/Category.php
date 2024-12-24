<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;

    protected $table = 'categories';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    /******  c5d7bf6f-3547-47f8-bb67-61df6e8a960d  *******/
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    // Relasi ke posts
    public function posts()
    {
        return $this->hasMany(Post::class, 'categories_id');
    }
}
