<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Path to your JSON file
        $jsonFile = base_path('database/seeders/data/tagihan.json');

        // Check if the JSON file exists
        if (!File::exists($jsonFile)) {
            $this->command->error('File ' . $jsonFile . ' not found.');
            return;
        }

        // Read JSON file
        $json = File::get($jsonFile);

        // Decode JSON data
        $data = json_decode($json, true);

        // Check if JSON decoding was successful
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->command->error('Unable to parse JSON: ' . json_last_error_msg());
            return;
        }

        // Insert data into the database
        foreach ($data as $article) {
            DB::table('tagihans')->insert($article);
        }

        $this->command->info('Data seeded successfully.');
    }
}
