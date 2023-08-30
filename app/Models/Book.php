<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'id_book';

    protected $fillable = [
        'title',
        'id_author',
        'gender',
        'synopsis',
        'cover',
        'publication_year'
    ];

    public function author () {
        return $this->belongsTo(Author::class, 'id_author', 'id_author');
    }
}
