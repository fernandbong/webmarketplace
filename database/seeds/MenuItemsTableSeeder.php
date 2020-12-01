<?php

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => 2,
                'menu_id' => 1,
                'title' => 'Media',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-images',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 9,
                'created_at' => '2020-02-11 00:10:11',
                'updated_at' => '2020-06-10 03:25:32',
                'route' => 'voyager.media.index',
                'parameters' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'menu_id' => 1,
                'title' => 'Users',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2020-02-11 00:10:11',
                'updated_at' => '2020-06-10 03:25:32',
                'route' => 'voyager.users.index',
                'parameters' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'menu_id' => 1,
                'title' => 'Roles',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2020-02-11 00:10:11',
                'updated_at' => '2020-06-10 03:25:32',
                'route' => 'voyager.roles.index',
                'parameters' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'menu_id' => 1,
                'title' => 'Tools',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tools',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 10,
                'created_at' => '2020-02-11 00:10:11',
                'updated_at' => '2020-06-10 03:25:32',
                'route' => NULL,
                'parameters' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'menu_id' => 1,
                'title' => 'Menu Builder',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 1,
                'created_at' => '2020-02-11 00:10:11',
                'updated_at' => '2020-05-15 16:55:13',
                'route' => 'voyager.menus.index',
                'parameters' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'menu_id' => 1,
                'title' => 'Database',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-data',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 2,
                'created_at' => '2020-02-11 00:10:11',
                'updated_at' => '2020-05-15 16:55:13',
                'route' => 'voyager.database.index',
                'parameters' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'menu_id' => 1,
                'title' => 'Compass',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-compass',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 3,
                'created_at' => '2020-02-11 00:10:11',
                'updated_at' => '2020-05-15 16:55:13',
                'route' => 'voyager.compass.index',
                'parameters' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'menu_id' => 1,
                'title' => 'BREAD',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bread',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 4,
                'created_at' => '2020-02-11 00:10:11',
                'updated_at' => '2020-05-15 16:55:13',
                'route' => 'voyager.bread.index',
                'parameters' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'menu_id' => 1,
                'title' => 'Settings',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-settings',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 11,
                'created_at' => '2020-02-11 00:10:11',
                'updated_at' => '2020-06-10 03:25:32',
                'route' => 'voyager.settings.index',
                'parameters' => NULL,
            ),
            9 => 
            array (
                'id' => 11,
                'menu_id' => 1,
                'title' => 'Categories',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 7,
                'created_at' => '2020-02-11 00:10:14',
                'updated_at' => '2020-06-10 03:28:13',
                'route' => 'voyager.categories.index',
                'parameters' => NULL,
            ),
            10 => 
            array (
                'id' => 14,
                'menu_id' => 1,
                'title' => 'Hooks',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-hook',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 5,
                'created_at' => '2020-02-11 00:10:14',
                'updated_at' => '2020-05-15 16:55:13',
                'route' => 'voyager.hooks',
                'parameters' => NULL,
            ),
            11 => 
            array (
                'id' => 15,
                'menu_id' => 1,
                'title' => 'Orders',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-buy',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 5,
                'created_at' => '2020-02-11 00:22:34',
                'updated_at' => '2020-06-10 03:25:32',
                'route' => 'voyager.orders.index',
                'parameters' => NULL,
            ),
            12 => 
            array (
                'id' => 16,
                'menu_id' => 1,
                'title' => 'Photographers',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-camera',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2020-02-19 17:15:37',
                'updated_at' => '2020-06-19 00:40:27',
                'route' => 'voyager.photographers.index',
                'parameters' => 'null',
            ),
            13 => 
            array (
                'id' => 17,
                'menu_id' => 1,
                'title' => 'List Services',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bag',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2020-02-19 17:18:39',
                'updated_at' => '2020-06-10 03:25:32',
                'route' => 'voyager.products.index',
                'parameters' => 'null',
            ),
            14 => 
            array (
                'id' => 18,
                'menu_id' => 1,
                'title' => 'Coupons',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tag',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 8,
                'created_at' => '2020-05-02 05:05:15',
                'updated_at' => '2020-06-10 03:25:32',
                'route' => 'voyager.coupons.index',
                'parameters' => 'null',
            ),
            15 => 
            array (
                'id' => 19,
                'menu_id' => 1,
                'title' => 'Withdraw Funds',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-dollar',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 6,
                'created_at' => '2020-05-26 01:11:33',
                'updated_at' => '2020-06-10 03:28:13',
                'route' => 'voyager.withdraw-funds.index',
                'parameters' => 'null',
            ),
        ));
        
        
    }
}