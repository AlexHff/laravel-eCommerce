<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create sample items.
         */

        Item::create([
            'name' => 'Clarks Men Tilden Cap Oxford Shoe',
            'description' => '100% Leather, Rubber sole',
            'price' => 52.99,
            'units' => 15,
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/315YqD3NyKL._AC_US218_.jpg']
        );

        Item::create([
            'name' => 'Stacy Adams Men Dickinson Cap-Toe Lace-up Oxford',
            'description' => '100% Leather, Non-Leather sole',
            'price' => 63.99,
            'units' => 12,
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/41d9tPlKJFL._AC_US218_.jpg'
        ]);

        Item::create([
            'name' => 'DREAM PAIRS Bruno Marc Moda Italy Men Prince Classic Modern Formal Oxford Wingtip Lace Up Dress Shoes',
            'description' => 'Man made material, Designed in USA',
            'price' => 29.99,
            'units' => 21,
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/41hblrM+WlL._AC_US218_.jpg'
        ]);
    }
}
