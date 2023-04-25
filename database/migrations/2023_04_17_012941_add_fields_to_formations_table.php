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
        Schema::table('formations', function (Blueprint $table) {
            $table->string('Title');
            $table->string('Description');
            $table->string('Image')->nullable();
            $table->string('Tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
/*         Schema::table('formations', function (Blueprint $table) {
            
        }); */
        Schema::dropColumns('formations',[
            'Title','Description','Image'
        ]);

    }
};