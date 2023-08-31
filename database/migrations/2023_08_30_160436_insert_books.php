<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Titulo 1',
                'id_author' => DB::table('authors')->select('id_author')->where('name', 'Thomas')->pluck('id_author')[0],
                'gender' => 'Ação',
                'synopsis' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate.',
                'cover' => 'https://html.com/wp-content/uploads/flamingo.jpg',
                'publication_year' => 1995,
            ],
            [
                'title' => 'Titulo 2',
                'id_author' => DB::table('authors')->select('id_author')->where('name', 'Marcos')->pluck('id_author')[0],
                'gender' => 'Comédia',
                'synopsis' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate.',
                'cover' => 'https://html.com/wp-content/uploads/flamingo.jpg',
                'publication_year' => 1995,
            ],
            [
                'title' => 'Titulo 3',
                'id_author' => DB::table('authors')->select('id_author')->where('name', 'Dom')->pluck('id_author')[0],
                'gender' => 'Drama',
                'synopsis' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate.',
                'cover' => 'https://html.com/wp-content/uploads/flamingo.jpg',
                'publication_year' => 1995,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('books')->delete();
    }
};
