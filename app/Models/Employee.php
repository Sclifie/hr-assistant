<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes, HasFactory;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'email',
    ];
    
    /**
     * Get position Model for Employee
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    
    /**
     * Get interview Model for Employee
     */
    public function interview()
    {
        return $this->belongsTo(Interview::class);
        
    }
}
