<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    ## Bir vaqtda ikkalasidan birini foydalanish mumkin!

    ## To'ldirilishi mumkin bo'lgan maydonlar ro'yxati
    // protected $fillable = ['title', 'description', 'image', 'content'];

    ## To'ldirilishi taqiqlangan maydonlar ro'yxati
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
