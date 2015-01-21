<?php

use Carbon\Carbon;
use Illuminate\Support\Collection;

class UsersSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $users = Collection::make([
            [
                'api_token' => 'token1',
                'name' => '大阪 太郎',
            ],
            [
                'api_token' => 'token2',
                'name' => '神戸 花子',
            ],
            [
                'api_token' => 'token3',
                'name' => '東京 次郎',
            ],
        ]);

        $users->each(function ($item) {
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();

            DB::table('users')->insert($item);
        });
    }
}

