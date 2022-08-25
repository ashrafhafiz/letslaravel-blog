<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image' => '/storage/uploads/categories/images/1661415528_image_flexbox_cheatsheet.jfif',
                'parent_category_id' => NULL,
                'created_at' => '2022-08-25 16:05:30',
                'updated_at' => '2022-08-25 16:05:40',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'image' => '/storage/uploads/categories/images/1661415528_image_flexbox_cheatsheet.jfif',
                'parent_category_id' => NULL,
                'created_at' => '2022-08-25 08:18:48',
                'updated_at' => '2022-08-25 08:18:48',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'image' => '/storage/uploads/categories/images/1661415798_image_Merry Chirstmas.jpg',
                'parent_category_id' => 1,
                'created_at' => '2022-08-25 08:23:18',
                'updated_at' => '2022-08-25 14:37:32',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'image' => '/storage/uploads/categories/images/1661415963_image_Merry Chirstmas.png',
                'parent_category_id' => 1,
                'created_at' => '2022-08-25 08:26:03',
                'updated_at' => '2022-08-25 08:26:03',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 7,
                'image' => '/storage/uploads/categories/images/1661429986_image_ERP-4.png',
                'parent_category_id' => 3,
                'created_at' => '2022-08-25 12:19:46',
                'updated_at' => '2022-08-25 14:37:32',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 8,
                'image' => '/storage/uploads/categories/images/1661430023_image_ERP-4.png',
                'parent_category_id' => 3,
                'created_at' => '2022-08-25 12:20:23',
                'updated_at' => '2022-08-25 14:37:32',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}