<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Collection;
use App\Models\DeliveryOption;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Илья',
            'surname' => 'Семагин',
            'patronymic' => 'Юрьевич',
            'login' => 'forgenight',
            'email' => 'ilyasemagin@mail.ru',
            'role' => 'admin',
            'newsSubscription' => false,
            'password' => Hash::make('NostramoM31'),
            'avatar' => 'users-avatars/admin.webp',
            'city' => 'Казань',
            'address' => 'Ул. Октябрьская 90',
            'index' => '420025',
            'mobile' => '+7 (917) 254-6005',
            'birthDay' => '2002-12-07'
        ]);

        $categories = [
            'warhammer 40000',
            'the horus heresy',
            'dark angels',
            'emperors children\'s',
            'iron warriors',
            'white scars',
            'space wolfs',
            'imperial fists',
            'night lords',
            'blood angels',
            'iron hands',
            'world eaters',
            'ultramarine\'s',
            'death guard',
            'thousand sons',
            'sons of horus/black legion',
            'word bearer',
            'salamanders',
            'raven guard',
            'alpha legion',
        ];

        foreach ($categories as $category) {
            Collection::query()->create([
                'name' => $category
            ]);
        }

        $deliveryOptions = [
            'СДЭК',
            'Почта России',
        ];

        foreach ($deliveryOptions as $deliveryOption) {
            DeliveryOption::query()->create([
                'name' => $deliveryOption
            ]);
        }

        $id = Product::query()->create([
            'name' => 'Horus Ascended',
                'price' => '3500',
                'quantity' => '100',
                'is_published' => true,
                'description' => 'test 1',
                'collection_id' => '2'
            ]
        );
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/product_photos/horus/1.jpg'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/product_photos/horus/2.jpg'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/product_photos/horus/3.jpg'
        ]);







        $id = Product::query()->create([
                'name' => 'Cerastus Knight-Castigator',
                'price' => '8500',
                'quantity' => '50',
                'is_published' => true,
                'description' => 'test 1',
                'collection_id' => '1'
            ]
        );
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/product_photos/cerastus/1.jpg'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/product_photos/cerastus/2.jpg'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/product_photos/cerastus/3.jpg'
        ]);





        $id = Product::query()->create([
                'name' => 'Lion El Jonson',
                'price' => '1500',
                'quantity' => '150',
                'is_published' => true,
                'description' => 'test 1',
                'collection_id' => '3'
            ]
        );
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/product_photos/lion/1.jpg'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/product_photos/lion/2.jpg'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/product_photos/lion/2.jpg'
        ]);
    }
}
