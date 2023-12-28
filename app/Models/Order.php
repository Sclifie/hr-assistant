<?php

namespace App\Models;

use App\Enums\OrderTypesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes, HasFactory;
    
    protected $fillable = [
        'document_class',
        'employee_id',
        'type',
    ];
    
    protected $casts = [
        'type' => OrderTypesEnum::class,
    ];
    
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
