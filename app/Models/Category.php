<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // category relationship 
    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
