<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Support\Str;
=======
>>>>>>> 3e544c07ad744a462140f624dcff9c15f3812863

class Letter extends Model
{
    protected $table = 'letters';
<<<<<<< HEAD
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['letter_format_id', 'user_id', 'name'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                // Generate custom ID: LTR001, LTR002, dst
                $lastId = self::orderBy('id', 'desc')->first();
                $number = $lastId ? intval(substr($lastId->id, 3)) + 1 : 1;
                $model->id = 'LTR' . str_pad($number, 3, '0', STR_PAD_LEFT);
            }
        });
    }

    // Relasi
    public function letterFormat()
=======
    protected $fillable = [
        'letter_format_id',
        'employee_id',
        'name',
        'status'
    ];

    public function format()
>>>>>>> 3e544c07ad744a462140f624dcff9c15f3812863
    {
        return $this->belongsTo(LetterFormat::class, 'letter_format_id');
    }

<<<<<<< HEAD
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // nanti kalau User model sudah ada
    }

    // Custom soft delete (karena deleted_at varchar)
    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
=======
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
>>>>>>> 3e544c07ad744a462140f624dcff9c15f3812863
    }
}
