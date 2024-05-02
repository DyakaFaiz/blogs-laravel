<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $load = ['user', 'category']; //Lazy Eager load untuk menghindari N+1
    protected $guarded = ['id'];
    protected $fillable = ['name', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
