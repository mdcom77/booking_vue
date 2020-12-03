<?php

use App\Booking;
use App\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(BookablesTableSeeder::class);
        // $this->call(BookingSeeder::class);
        // $this->call(ReviewSeeder::class);

        $this->call([
            BookablesTableSeeder::class,
            BookingSeeder::class,
            ReviewSeeder::class
        ]);
    }
}
