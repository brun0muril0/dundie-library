<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';
    protected $primaryKey = 'id_author';

    protected $fillable = [
        'name',
        'surname',
        'birthday',
        'country',
        'biography'
    ];

    public function books () {
        return $this->hasMany(Book::class, 'id_author', 'id_author');
    }
}
