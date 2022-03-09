<?php

use Illuminate\Database\Seeder;
use App\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('comics');
        
        foreach($comics as $elemento){
            $fumetto = new Comic();
            $fumetto->title = $elemento['title'];
            $fumetto->description = $elemento['description'];
            $fumetto->thumb = $elemento['thumb'];
            $fumetto->price = $elemento['price'];
            $fumetto->series = $elemento['series'];
            $fumetto->sale_date = $elemento['sale_date'];
            $fumetto->type = $elemento['type'];
            $fumetto->save();
        }
    }
}
