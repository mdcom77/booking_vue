<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();

            $table->unsignedTinyInteger('raiting');
            $table->text('content');

            $table->unsignedBigInteger('bookable_id')->index();
            $table->foreign('bookable_id')->references('id')->on('bookables');
                        //==
            //$table->foreignId('bookable_id')->constrained();

            // $table->unsignedBigInteger('booking_id')->index()->nullable();
            // $table->foreign('booking_id')->references('id')->on('booking');
            //(NE RABOTI S TOVA GORE!!!!)
                        //==
            $table->foreignId('booking_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
