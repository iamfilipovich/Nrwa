<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Titles extends Model
{
    use HasFactory;

    protected $table = 'titles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'from_date',
        'to_date',
        'emp_no',
    ];
}
