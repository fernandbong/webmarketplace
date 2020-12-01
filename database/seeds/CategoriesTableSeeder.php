<?php

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
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'Photography',
                'slug' => 'photography',
                'created_at' => '2020-02-11 00:10:14',
                'updated_at' => '2020-05-28 00:29:53',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'Videography',
                'slug' => 'videography',
                'created_at' => '2020-02-11 00:10:14',
                'updated_at' => '2020-05-28 00:30:07',
            ),
            2 => 
            array (
                'id' => 5,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Fashion / Modeling',
                'slug' => 'fashion-modeling',
                'created_at' => '2020-05-28 00:30:37',
                'updated_at' => '2020-05-28 00:30:37',
            ),
            3 => 
            array (
                'id' => 6,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Weddings',
                'slug' => 'weddings',
                'created_at' => '2020-05-28 00:31:00',
                'updated_at' => '2020-05-28 00:31:00',
            ),
            4 => 
            array (
                'id' => 7,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Food',
                'slug' => 'food',
                'created_at' => '2020-05-28 00:31:21',
                'updated_at' => '2020-05-28 00:31:21',
            ),
            5 => 
            array (
                'id' => 8,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Portraits',
                'slug' => 'portraits',
                'created_at' => '2020-05-28 00:31:39',
                'updated_at' => '2020-05-28 00:31:39',
            ),
            6 => 
            array (
                'id' => 9,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Children',
                'slug' => 'children',
                'created_at' => '2020-05-28 00:31:51',
                'updated_at' => '2020-05-28 00:31:51',
            ),
            7 => 
            array (
                'id' => 10,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Family',
                'slug' => 'family',
                'created_at' => '2020-05-28 00:32:03',
                'updated_at' => '2020-05-28 00:32:03',
            ),
            8 => 
            array (
                'id' => 11,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Commercial',
                'slug' => 'commercial',
                'created_at' => '2020-05-28 00:32:16',
                'updated_at' => '2020-05-28 00:32:16',
            ),
            9 => 
            array (
                'id' => 12,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Event',
                'slug' => 'event',
                'created_at' => '2020-05-28 00:32:28',
                'updated_at' => '2020-05-28 00:32:28',
            ),
            10 => 
            array (
                'id' => 13,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Architecture',
                'slug' => 'architecture',
                'created_at' => '2020-05-28 00:32:45',
                'updated_at' => '2020-05-28 00:32:45',
            ),
            11 => 
            array (
                'id' => 14,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Vacation',
                'slug' => 'vacation',
                'created_at' => '2020-05-28 00:33:09',
                'updated_at' => '2020-05-28 00:33:09',
            ),
            12 => 
            array (
                'id' => 15,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Sports',
                'slug' => 'sports',
                'created_at' => '2020-05-28 00:33:21',
                'updated_at' => '2020-05-28 00:33:21',
            ),
            13 => 
            array (
                'id' => 16,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Landscape',
                'slug' => 'landscape',
                'created_at' => '2020-05-28 00:33:34',
                'updated_at' => '2020-05-28 00:33:34',
            ),
            14 => 
            array (
                'id' => 17,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Drone',
                'slug' => 'drone',
                'created_at' => '2020-05-28 00:33:45',
                'updated_at' => '2020-05-28 00:33:45',
            ),
            15 => 
            array (
                'id' => 18,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'Courses',
                'slug' => 'courses',
                'created_at' => '2020-05-28 00:33:56',
                'updated_at' => '2020-05-28 00:33:56',
            ),
            16 => 
            array (
                'id' => 19,
                'parent_id' => 2,
                'order' => 1,
                'name' => 'Advertising',
                'slug' => 'advertising',
                'created_at' => '2020-05-28 00:35:13',
                'updated_at' => '2020-05-28 00:35:13',
            ),
            17 => 
            array (
                'id' => 20,
                'parent_id' => 2,
                'order' => 1,
                'name' => 'Animated',
                'slug' => 'animated',
                'created_at' => '2020-05-28 00:35:32',
                'updated_at' => '2020-05-28 00:35:32',
            ),
            18 => 
            array (
                'id' => 21,
                'parent_id' => 2,
                'order' => 1,
                'name' => 'Corporate',
                'slug' => 'corporate',
                'created_at' => '2020-05-28 00:35:48',
                'updated_at' => '2020-05-28 00:35:48',
            ),
            19 => 
            array (
                'id' => 22,
                'parent_id' => 2,
                'order' => 1,
                'name' => 'Documentary',
                'slug' => 'documentary',
                'created_at' => '2020-05-28 00:35:59',
                'updated_at' => '2020-05-28 00:35:59',
            ),
            20 => 
            array (
                'id' => 23,
                'parent_id' => 2,
                'order' => 1,
                'name' => 'Drone Videography',
                'slug' => 'drone-videography',
                'created_at' => '2020-05-28 00:36:34',
                'updated_at' => '2020-05-28 00:36:34',
            ),
            21 => 
            array (
                'id' => 24,
                'parent_id' => 2,
                'order' => 1,
                'name' => 'Event Videography',
                'slug' => 'event-videography',
                'created_at' => '2020-05-28 00:36:47',
                'updated_at' => '2020-05-28 00:37:41',
            ),
            22 => 
            array (
                'id' => 25,
                'parent_id' => 2,
                'order' => 1,
                'name' => 'Music',
                'slug' => 'music',
                'created_at' => '2020-05-28 00:37:00',
                'updated_at' => '2020-05-28 00:37:00',
            ),
            23 => 
            array (
                'id' => 26,
                'parent_id' => 2,
                'order' => 1,
                'name' => 'Travel',
                'slug' => 'travel',
                'created_at' => '2020-05-28 00:37:16',
                'updated_at' => '2020-05-28 00:37:16',
            ),
        ));
        
        
    }
}