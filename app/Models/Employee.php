<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'FirstName',
        'LastName',
        'Birthday',
        'HireDate',
        'Gender',
        
    ];

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function departments()
    {
    return $this->belongsToMany(Department::class, 'departments_employees');
    }

    /*public function render()
    {
        $employee = Employee::where('FirstName', 'LIKE', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(6);
        return view('employee.index', ['employees' => $employee]);
    }*/

}
