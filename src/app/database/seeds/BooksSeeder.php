<?php

use Carbon\Carbon;
use Illuminate\Support\Collection;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->truncate();

        $books = Collection::make([
            [
                'asin' => 'B00F418SQ8',
                'title' => 'Vagrant入門ガイド',
                'price' => 400,
                'inventory' => 10,
            ],
            [
                'asin' => '4774159719',
                'title' => 'PHPエンジニア養成読本',
                'price' => 2138,
                'inventory' => 10,
            ],
            [
                'asin' => '4774153249',
                'title' => 'CakePHP2 実践入門',
                'price' => 3110,
                'inventory' => 2,
            ],
        ]);

        $books->each(function ($item) {
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();

            DB::table('books')->insert($item);
        });
    }
}

