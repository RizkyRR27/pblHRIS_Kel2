<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LetterFormat extends Model
{
    protected $table = 'letter_formats';
<<<<<<< HEAD
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['name', 'content', 'status'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                // Generate custom ID: LF001, LF002, dst
                $lastId = self::orderBy('id', 'desc')->first();
                $number = $lastId ? intval(substr($lastId->id, 2)) + 1 : 1;
                $model->id = 'LF' . str_pad($number, 3, '0', STR_PAD_LEFT);
            }
        });
    }
=======
    protected $fillable = ['name', 'content'];
>>>>>>> 3e544c07ad744a462140f624dcff9c15f3812863

    // Relasi ke letters
    public function letters()
    {
        return $this->hasMany(Letter::class, 'letter_format_id');
    }
<<<<<<< HEAD

    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }
=======
>>>>>>> 3e544c07ad744a462140f624dcff9c15f3812863
}
