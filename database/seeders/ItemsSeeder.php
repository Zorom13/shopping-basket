<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'Apple Galaxy S9',
            'information' => 'Laptops : Shop for laptops & mini laptops online at best prices in India at Amazon​.in. Get Free 1 or 2 day delivery with Amazon Prime',
            'item_img' => 'https://i.ebayimg.com/00/s/ODY0WDgwMA==/z/9S4AAOSwMZRanqb7/$_35.JPG?set_id=89040003C1',
            'price' => 7878.88
        ]);
        DB::table('items')->insert([
            'name' => 'Apple iPhone X',
            'information' => 'Laptop Prices in India - Buy Laptops Online at Lowest Prices on Flipkart.com Choose from a wide range of Laptops from best brands like HP, Dell, Lenovo, Acer',
            'item_img' => 'https://i.ebayimg.com/00/s/MTYwMFg5OTU=/z/9UAAAOSwFyhaFXZJ/$_35.JPG?set_id=89040003C1',
            'price' => 7778.00
        ]);
        DB::table('items')->insert([
            'name' => 'Dell Pixel 2 XL',
            'information' => 'Get the best Laptops Online from Reliance Digital. Shop from top Laptop Brands like Apple, HP, Lenovo, Microsoft, Dell, iBall & more.',
            'item_img' => 'https://i.ebayimg.com/00/s/MTYwMFg4MzA=/z/G2YAAOSwUJlZ4yQd/$_35.JPG?set_id=89040003C1',
            'price' => 7587.00
        ]);
        DB::table('items')->insert([
            'name' => 'Asser V10 H900',
            'information' => 'A laptop, laptop computer, or notebook computer is a small, portable personal computer (PC) with a screen and alphanumeric keyboard. ',
            'item_img' => 'https://i.ebayimg.com/00/s/NjQxWDQyNA==/z/VDoAAOSwgk1XF2oo/$_35.JPG?set_id=89040003C1',
            'price' => 7852.99
        ]);
        DB::table('items')->insert([
            'name' => 'Iphone Elate',
            'information' => 'Planning for Online Mobile Shopping? Visit us now to explore mobile phones including mobile prices, reviews, comparisons, features, videos, accessories',
            'item_img' => 'https://ssli.ebayimg.com/images/g/aJ0AAOSw7zlaldY2/s-l640.jpg',
            'price' => 5288.00
        ]);
        DB::table('items')->insert([
            'name' => 'HTC One M10',
            'information' => 'Buy latest Mobile Phones at best prices online at Croma.Com. Choose smartphones from brands like Apple, Samsung, MI, OnePlus and get best.',
            'item_img' => 'https://i.ebayimg.com/images/g/u-kAAOSw9p9aXNyf/s-l500.jpg',
            'price' => 7845.99
        ]);
    }
}