<?php

use Carbon\Carbon;
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
        DB::table('authors')->insert([
            [
                'name' => 'Thomas',
                'surname' => 'Edinson',
                'birthday' => Carbon::now(),
                'country' => 'Argentina',
                'biography' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate.',
            ],
            [
                'name' => 'Marcos',
                'surname' => 'Ferreira',
                'birthday' => Carbon::now(),
                'country' => 'Brasil',
                'biography' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate.',
            ],
            [
                'name' => 'Dom',
                'surname' => 'Quixote',
                'birthday' => Carbon::now(),
                'country' => 'Holanda',
                'biography' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate.',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('authors')->delete();
    }
};
