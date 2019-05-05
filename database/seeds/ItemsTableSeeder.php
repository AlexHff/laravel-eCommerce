<?php

use Illuminate\Database\Seeder;
use App\Clothing;
use App\Music;
use App\Book;
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

        $item = Item::create([
        'name' => 'Come',
        'description' => 'song from france',
        'price' => 1.99,
        'units' => 922498,
        'image' => 'https://m.media-amazon.com/images/I/81d1124adwL._SS500_.jpg',
        'category' => 'Music',
        'seller_id' => 2
        ]);
        Music::create([
        'item_id' => $item->id,
        'author' => 'Jain',
        'album' => 'Zanaka album'
        ]);

        $item = Item::create([
        'name' => 'Pogo',
        'description' => 'french rap',
        'price' => 1.29,
        'units' => 1039866,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/51eos4sl2sL._SL1200_.jpg',
        'category' => 'Music',
        'seller_id' => 2
        ]);
        Music::create([
        'item_id' => $item->id,
        'author' => 'Romeo Elvis',
        'album' => 'Morale 2luxe album'
        ]);

        $item = Item::create([
        'name' => 'Trop beau',
        'description' => 'french rap',
        'price' => 1.99,
        'units' => 2108652,
        'image' => 'https://m.media-amazon.com/images/I/71su85LACLL._SS500_.jpg',
        'category' => 'Music',
        'seller_id' => 2
        ]);
        Music::create([
        'item_id' => $item->id,
        'author' => 'Lomepal',
        'album' => 'Jeannine album'
        ]);

        $item = Item::create([
        'name' => 'Paradis',
        'description' => 'french rap',
        'price' => 1.29,
        'units' => 1052986,
        'image' => 'https://m.media-amazon.com/images/I/81Lu6EXrguL._SS500_.jpg',
        'category' => 'Music',
        'seller_id' => 2
        ]);
        Music::create([
        'item_id' => $item->id,
        'author' => 'Orelsan',
        'album' => 'La fête est finie'
        ]);

        $item = Item::create([
        'name' => 'Au DD',
        'description' => '« Au DD », troisième extrait du nouvel album de PNL "Deux Frères", disponible maintenant.',
        'price' => 1.99,
        'units' => 1000000,
        'image' => 'http://33rapmp3.com/218musicupload/2019/04/PNL-Deux-Fr%C3%A8res.jpg',
        'video' => 'https://www.youtube.com/embed/BtyHYIpykN0',
        'category' => 'Music',
        'seller_id' => 2
        ]);
        Music::create([
        'item_id' => $item->id,
        'author' => 'PNL',
        'album' => 'Deux frères'
        ]);

        $item = Item::create([
        'name' => 'Les misérables',
        'description' => 'French classic',
        'price' => 4.95,
        'units' => 55,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/51W2mjLTYCL._SX349_BO1,204,203,200_.jpg',
        'category' => 'Book',
        'seller_id' => 2
        ]);
        Book::create([
        'item_id' => $item->id,
        'author' => 'Victor Hugo',
        'release' => '2014'
        ]);

        $item = Item::create([
        'name' => 'La disparition de Stephanir Mailer',
        'description' => 'French novel',
        'price' => 9.50,
        'units' => 100,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/51Mb1i3vLWL._SX307_BO1,204,203,200_.jpg',
        'category' => 'Book',
        'seller_id' => 2
        ]);
        Book::create([
        'item_id' => $item->id,
        'author' => 'Joel Dicker',
        'release' => '2019'
        ]);

        $item = Item::create([
        'name' => 'Simetierre',
        'description' => 'English Novel',
        'price' => 8.90,
        'units' => 30,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/41IWP7bQwKL._SX307_BO1,204,203,200_.jpg',
        'category' => 'Book',
        'seller_id' => 2
        ]);
        Book::create([
        'item_id' => $item->id,
        'author' => 'Stephen King',
        'release' => '2003'
        ]);

        $item = Item::create([
        'name' => 'After, Tome 1',
        'description' => 'American love story',
        'price' => 8.20,
        'units' => 200,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/41RWNplneFL._SX307_BO1,204,203,200_.jpg',
        'category' => 'Book',
        'seller_id' => 2
        ]);
        Book::create([
        'item_id' => $item->id,
        'author' => 'Anna Todd',
        'release' => '2016'
        ]);

        $item = Item::create([
        'name' => 'Crépuscule',
        'description' => 'French politics Novel',
        'price' => 19,
        'units' => 30,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/51Y9-E18M8L._SX326_BO1,204,203,200_.jpg',
        'category' => 'Book',
        'seller_id' => 2
        ]);
        Book::create([
        'item_id' => $item->id,
        'author' => 'Juan Branco',
        'release' => '2019'
        ]);

        $item = Item::create([
        'name' => "Women's Zipper Bomber Jacket with Floral Print",
        'description' => '100% polyester',
        'price' => 12.99,
        'units' => 15,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/71u0XoeOoGL._UX522_.jpg',
        'category' => 'Clothing',
        'seller_id' => 2
        ]);
        Clothing::create([
        'item_id' => $item->id,
        'size' => 'M',
        ]);

        $item = Item::create([
        'name' => "Women's SKINNY SOFT ULTIMATE 201 dark blue Skinny Jeans",
        'description' => '66% Cotton, 32% Polyester, 2% Elastane',
        'price' => 34.95,
        'units' => 4,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/81KPyTX2JlL._UX569_.jpg',
        'category' => 'Clothing',
        'seller_id' => 2
        ]);
        Clothing::create([
        'item_id' => $item->id,
        'size' => 'S',
        ]);

        $item = Item::create([
        'name' => "Men's Calvin klein boxer x3",
        'description' => '95% Cotton, 5%,Elastane',
        'price' => 41.74,
        'units' => 1,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/619ayRf0R%2BL._UX522_.jpg',
        'category' => 'Clothing',
        'seller_id' => 2
        ]);
        Clothing::create([
        'item_id' => $item->id,
        'size' => 'M',
        ]);

        $item = Item::create([
        'name' => 'Schwarze Rose Kent Slim Fit Classic Skirt',
        'description' => '100% cotton',
        'price' => 42.74,
        'units' => 30,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/711BOj1DjWL._UY500_.jpg',
        'category' => 'Clothing',
        'seller_id' => 2
        ]);
        Clothing::create([
        'item_id' => $item->id,
        'size' => 'M',
        ]);
    }
}
