<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interview extends Model
{
    use SoftDeletes, HasFactory;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'status',
        'position_id',
        'employee_id',
    ];
    
    /**
     * Если поменяем роутбиндинг нужно поменять данный метод
     */
    public function path()
    {
        return $this->id;
    }
    
    /**
     *  Просто конкатенированная строка Имя + Фамилия
     * */
    public function getFullName() : string
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }
    
    /**
     *  Возвращаем работника
     */
    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class, 'employee_id', 'id');
    }
    
    
    /**
     *   Позиция по текущему интервью
     */
    public function position() : HasOne
    {
        return $this->hasOne(Position::class,'id','position_id');
    }
    
}
