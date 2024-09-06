<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentEmployee extends Model
{
    use HasFactory;

    protected $table = 'departments_employees';

    protected $fillable = [
        'DepartmentName',
        'department_id',
        'employee_id',
        'from_date',
        'to_date',
    ];

    // Definirajte relaciju s modelom "Department"
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    // Definirajte relaciju s modelom "Employee"
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}

