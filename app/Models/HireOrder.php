<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
class HireOrder extends Model
{
    use SoftDeletes, HasFactory;
    
    protected $fillable = [
        'salary',
    ];
    
    protected function salary(): Attribute
    {
    
//        По идее тут нужно писать преобразование цены
        
        return Attribute::make(
            get: fn (string $value) => $value / 100,
            set: fn (string $value) => $value * 100,
        );
    }
}
