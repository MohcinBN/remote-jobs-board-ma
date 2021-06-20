<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    // creating slug 
    public function get_slug_params_as_url()
    {
        $slg = Str::slug($this->title, '-');
        return [
            $this->id, // product id
            $slg, // slug
        ];
    }
}
