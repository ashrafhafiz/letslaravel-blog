<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->id();

            $table->unique(['setting_id', 'locale']);
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('desc')->nullable();
            $table->string('address')->nullable();

            $table->unsignedBigInteger('setting_id');
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_translations');
    }
};
