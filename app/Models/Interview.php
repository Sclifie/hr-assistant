<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Interview extends Model
{
    use SoftDeletes, HasFactory, Notifiable;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'status',
        'position_id',
        'employee_id',
    ];
    
    protected $with = ['images'];
    
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
    public function getFullName(): string
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }
    
    /**
     *  Возвращаем отношение Работника
     */
    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class, 'employee_id', 'id');
    }
    
    /**
     *   Позиция по текущему интервью
     */
    public function position(): HasOne
    {
        return $this->hasOne(Position::class, 'id', 'position_id');
    }
    
    /**
     * Картинка(и) данного интервью
     */
    
    public function images()
    {
        return $this->morphToMany(Image::class, 'imaginable');
    }
    
    /**
     * Ордер by
     * @param string $column Attribute name
     * @param string $direction Direction
     * @return Interview
     */
    public static function orderedByCol($column = 'updated_at', $direction = 'DESC')
    {
        return static::orderBy($column, $direction);
    }
    
}
