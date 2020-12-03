<?php

use Illuminate\Database\Seeder;
use App\Bookable;
use App\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookable::all()->each(function(Bookable $bookable){
            $reviews = factory(Review::class, random_int(5,30))->make();
            //ONLY v8
            //$reviews = Review::factory()->times(random_int(5,30))->make(); //not create

            $bookable->reviews()->saveMany($reviews);
        });
    }
}
