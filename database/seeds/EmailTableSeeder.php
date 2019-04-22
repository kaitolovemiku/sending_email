<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Lib;

class EmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Lib::truncate();

        foreach(range(1, 100) as $count) {
            $lib = Lib::create([
                'subject' => $faker->subject,
                'appointment_date' => $faker->appointment_date,
                'appointment_room' => $faker->appointment_room,
                'receiver_name' => $faker->receiver_name,
                'receiver_email' => $faker->receiver_email,
                'sender_name' => $faker->sender_name,
                'sender_email' => $faker->sender_email,
                'status' => $faker->status,
            ]);
        }

    }
}
