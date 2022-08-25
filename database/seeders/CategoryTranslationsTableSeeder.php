<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category_translations')->delete();
        
        \DB::table('category_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'locale' => 'en',
                'name' => 'TV',
                'desc' => 'TV',
                'category_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'locale' => 'ar',
                'name' => 'تليفزيون',
                'desc' => 'وصف تفصيلي',
                'category_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'locale' => 'fr',
                'name' => 'TV',
                'desc' => 'TV',
                'category_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'locale' => 'en',
                'name' => 'Radio',
                'desc' => 'Radio',
                'category_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'locale' => 'ar',
                'name' => 'راديو',
                'desc' => 'وصف تفصيلي',
                'category_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'locale' => 'fr',
                'name' => 'Radio',
                'desc' => 'Radio',
                'category_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'locale' => 'en',
                'name' => 'Samsung',
                'desc' => 'Samsung TV',
                'category_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'locale' => 'ar',
                'name' => 'سامسونج',
                'desc' => 'تلفزيون سامسونج',
                'category_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'locale' => 'fr',
                'name' => 'Samsung',
                'desc' => 'Samsung TV',
                'category_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 11,
                'locale' => 'en',
                'name' => 'LG',
                'desc' => 'LG TV',
                'category_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 12,
                'locale' => 'ar',
                'name' => 'محمول',
                'desc' => 'وصف تفصيلي',
                'category_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'locale' => 'fr',
                'name' => 'LG',
                'desc' => 'LG',
                'category_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 17,
                'locale' => 'en',
                'name' => 'Samsung 40 inch Plasma',
                'desc' => 'Samsung 40 inch Plasma',
                'category_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 18,
                'locale' => 'ar',
                'name' => 'سامسونج',
                'desc' => 'وصف تفصيلي',
                'category_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 19,
                'locale' => 'fr',
                'name' => 'Samsung 40 inch Plasma',
                'desc' => 'Samsung 40 inch Plasma',
                'category_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 20,
                'locale' => 'en',
                'name' => 'Samsung 42 inch Plasma',
                'desc' => 'Samsung 42 inch Plasma',
                'category_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 21,
                'locale' => 'ar',
                'name' => 'سامسونج',
                'desc' => 'وصف تفصيلي',
                'category_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 22,
                'locale' => 'fr',
                'name' => 'Samsung 42 inch Plasma',
                'desc' => 'Samsung 42 inch Plasma',
                'category_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}