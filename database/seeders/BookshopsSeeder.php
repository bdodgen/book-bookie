<?php

namespace Database\Seeders;

use App\Models\Bookshop;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookshopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // empties the bookshops table
        // and resets the autoincrement to 1
        DB::table('users')->truncate();

        $bookshops = [
            'Prague' => [
                'Knihy Dobrovský',
                'Kosmas',
                'Neoluxor'
            ],
            'London' => [
                'Blackwell\'s',
                'Daunt Books',
                'Foyles',
                'John Smith & Son',
                'W H Smith',
                'Waterstones',
                'The Works'
            ],
            'New York' => [
                'Amazon Books',
                'Anderson\'s Bookshops',
                'Barnes & Noble',
                'Bookmans',
                'Books-A-Million',
                'Books, Inc.',
                'Deseret Book, also operates Seagull Book',
                'Follett\'s',
                'Half Price Books',
                'Hudson News',
                'Joseph-Beth Booksellers',
                'Kinokuniya',
                'Mardel Christian Stores',
                'Powell\'s Books',
                'Schuler Books & Music',
                'Tattered Cover'
            ]
        ];

        // populates the table
        foreach ($bookshops as $city_name => $city_bookshops) {

            foreach ($city_bookshops as $bookshop_name) {

                //create new object
                $bookshop = new Bookshop;
              
                //fill it with the data from current loop
                $bookshop->city = $city_name;
                $bookshop->name = $bookshop_name;
              
                //save the object (does an INSERT query)
                $bookshop->save();
                

            }
        }
    }
}
