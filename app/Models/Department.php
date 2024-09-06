<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'DepartmentName',
    ];

    public function employees()
    {
    return $this->belongsToMany(Employee::class, 'departments_employees');
    }

}
