<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** 
         * categories permission
         */

        Permission::query()->insert([
            [
                'title' => 'read-category',
                'label' => 'خواندن دسته بندی'
            ],
            
            [
                'title' => 'create-category',
                'label' => 'ایجاد دسته بندی'
            ],
            
            [
                'title' => 'update-category',
                'label' => 'ویرایش دسته بندی'
            ],

            [
                'title' => 'delete-category',
                'label' => 'حذف دسته بندی'
            ],

        ]);



         /** 
         * brans permission
         */

        Permission::query()->insert([
            [
                'title' => 'read-brand',
                'label' => 'خواندن  برند'
            ],
            
            [
                'title' => 'create-brand',
                'label' => 'ایجاد  برند'
            ],
            
            [
                'title' => 'update-brand',
                'label' => 'ویرایش  برند'
            ],

            [
                'title' => 'delete-brand',
                'label' => 'حذف  برند'
            ],

        ]);




         /** 
         * discounts permission
         */

        Permission::query()->insert([
            [
                'title' => 'read-discount',
                'label' => 'خواندن  تخفیف'
            ],
            
            [
                'title' => 'create-discount',
                'label' => 'ایجاد  تخفیف'
            ],
            
            [
                'title' => 'update-discount',
                'label' => 'ویرایش  تخفیف'
            ],

            [
                'title' => 'delete-discount',
                'label' => 'حذف  تخفیف'
            ],

        ]);




         /** 
         * pictures permission
         */

        Permission::query()->insert([
            [
                'title' => 'read-picture',
                'label' => 'خواندن  عکس'
            ],
            
            [
                'title' => 'create-picture',
                'label' => 'ایجاد  عکس'
            ],
            
            [
                'title' => 'update-picture',
                'label' => 'ویرایش  عکس'
            ],

            [
                'title' => 'delete-picture',
                'label' => 'حذف  عکس'
            ],

        ]);




         /** 
         * products permission
         */

        Permission::query()->insert([
            [
                'title' => 'read-product',
                'label' => 'خواندن  محصول'
            ],
            
            [
                'title' => 'create-product',
                'label' => 'ایجاد  محصول'
            ],
            
            [
                'title' => 'update-product',
                'label' => 'ویرایش  محصول'
            ],

            [
                'title' => 'delete-product',
                'label' => 'حذف  محصول'
            ],

        ]);


        /** 
         * roles permission
         */
        Permission::query()->insert([
            [
                'title' => 'read-role',
                'label' => 'خواندن  نقش'
            ],
            
            [
                'title' => 'create-role',
                'label' => 'ایجاد  نقش'
            ],
            
            [
                'title' => 'update-role',
                'label' => 'ویرایش  نقش'
            ],

            [
                'title' => 'delete-role',
                'label' => 'حذف  نقش'
            ],

        ]);



        /** 
         * offers permission
         */
        Permission::query()->insert([
            [
                'title' => 'read-offer',
                'label' => 'خواندن  کد تخفیف'
            ],
            
            [
                'title' => 'create-offer',
                'label' => 'ایجاد  کد تخفیف'
            ],
            
            [
                'title' => 'update-offer',
                'label' => 'ویرایش  کد تخفیف'
            ],

            [
                'title' => 'delete-offer',
                'label' => 'حذف  کد تخفیف'
            ],

        ]);



        /** 
         * dashbord permission
         */
        Permission::query()->insert([
            [
                'title' => 'view-dashbord',
                'label' => 'دسترسی به داشبورد'
            ],

        ]);




    }
}
