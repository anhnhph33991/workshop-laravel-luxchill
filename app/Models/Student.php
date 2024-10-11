<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'name',
        'email'
    ];

    public function passport()
    {
        return $this->hasOne(Passport::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('name', 'LIKE', "%{$keyword}%")
            ->orWhereHas('classroom', function ($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%");
            });
    }
}
