<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
<<<<<<< HEAD
    //
=======
    protected $table = 'employees';
    protected $fillable = [
        'user_id',
        'position_id',
        'department_id',
        'first_name',
        'last_name',
        'gender',
        'address'
    ];
>>>>>>> 3e544c07ad744a462140f624dcff9c15f3812863
}
