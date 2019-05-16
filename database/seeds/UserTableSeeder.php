<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker::create();
    foreach (range(1, 10) as $index) {
      DB::table('users')->insert([
        'name' => $faker->name,
        'email' => $faker->email,
        'track_url' => $this->generateRandomString(),
        'password' => bcrypt('secret'),
        'created_at' => Carbon::now()->subDays(rand(1, 30)),
        'updated_at' => Carbon::now()->subDays(rand(1, 30)),
      ]);
    }

  }

  function generateRandomString($length = 10)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
}
