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
//        Создание двух пользователей. Первый - администратор, второй - обычный пользователь
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

        User::query()->create([
            'name' => 'Антон',
            'surname' => 'Синицын',
            'patronymic' => 'Мирославович',
            'login' => 'tony.mir',
            'email' => 'tony@mk.ru',
            'role' => 'user',
            'newsSubscription' => true,
            'password' => Hash::make('tonySas'),
            'city' => 'Архангельск',
            'address' => 'Ул. Большая Красная д. 4',
            'index' => '720011',
            'mobile' => '+7 (843) 129-2003',
            'birthDay' => '1980-11-17'
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
            'black legion',
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

//        Запись всех категорий в базу данных
        foreach ($deliveryOptions as $deliveryOption) {
            DeliveryOption::query()->create([
                'name' => $deliveryOption
            ]);
        }

//        Сиды для создания товаров
        $productsData = [
            [
                'name' => 'Kratos Heavy Assault Tank',
                'quantity' => '999',
                'collection_id' => '2',
                'price' => '4500',
                'is_published' => true,
                'images' => [
                    'public/product_photos/kratos/Kratos-Heavy-Assault-Tank_clear.webp',
                    'public/product_photos/kratos/Kratos-Heavy-Assault-Tank1_cler.webp',
                    'public/product_photos/kratos/Kratos-Heavy-Assault-Tank2_cler.webp',
                ],
            ],
        ];

        foreach ($productsData as $productData)
        {
            $images = $productData['images'];
            unset($productData['images']);

            $product = Product::create($productData);

            foreach ($images as $imagePath)
            {
                $product->images()->create([
                    'image_path' => $imagePath,
                    'product_id' => $product->id
                ]);
            }
        }


    }
}
