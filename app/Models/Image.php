<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes, HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'path',
        'volume',
        'size',
    ];
    
    public function interviews()
    {
        return $this->morphedByMany(Interview::class, 'images');
    }
}
