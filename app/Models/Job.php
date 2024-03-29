<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    // category relationship 
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
