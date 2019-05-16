<?php

use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker::create();
    $devices = ["Macintosh", "Iphone X", "Samsung A7", "Google plus", "Nexus"];
    $platforms = ["OS X", "Windows", "Linux"];
    $browsers = ["Chrome", "Explorer", "Opera", "Mozilla"];
    foreach (range(1, 10) as $index) {
      DB::table('visits')->insert([
        'user_id' => User::all()->random()->id,
        'url' => "http://localhost:8000/analytics/user/" . User::all()->random()->track_url,
        'ip_address' => "" . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255),
        'platform' => $platforms[array_rand($platforms)],
        'browser' => $browsers[array_rand($browsers)],
        'device' => $devices[array_rand($devices)],
        'country' => $faker->country,
        'created_at' => Carbon::now()->subDays(rand(1, 30)),
        'updated_at' => Carbon::now()->subDays(rand(1, 30)),
      ]);
    }

  }
}
