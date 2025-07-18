<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Bookcreate extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'books';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bookname',
        'bookauthor',
        'bookdes',
        'bookcat',
        'program',
        'year',
        'total_pages',
        'maxallowed',
        'status',
        'cover_image',
    ];


    // Define the relationship with the category
    public function category()
    {
        return $this->belongsTo(Bookcategorycreate::class, 'bookcat', 'id'); // category_id is the foreign key in books table
    }

}
