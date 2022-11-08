<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('on_home_page')
                ->default(false)->after('title');
            $table->integer('sorting')
                ->default(999)
                ->after('on_home_page');
        });
    }
};
