<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Collection;
use App\Models\DeliveryOption;
use App\Models\Product;
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
            'imperial knights'
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
                    'public/product_photos/tanks/kratos/Kratos-Heavy-Assault-Tank_clear.webp',
                    'public/product_photos/tanks/kratos/Kratos-Heavy-Assault-Tank1_cler.webp',
                    'public/product_photos/tanks/kratos/Kratos-Heavy-Assault-Tank2_cler.webp',
                ],
            ],
            [
                'name' => 'Imperial Knights Armiger Helverins',
                'quantity' => '999',
                'collection_id' => '21',
                'price' => '2600',
                'is_published' => true,
                'images' => [
                    'public/product_photos/imperial knights/Imperial Knights Armiger Helverins/Imperial-Knights-Armiger-Helverins (1).webp',
                    'public/product_photos/imperial knights/Imperial Knights Armiger Helverins/Imperial-Knights-Armiger-Helverins_full_150_rotate (1).webp'
                ],
            ],
            [
                'name' => 'Emperor\'s Children Sorcerer in Terminator Armour',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '650',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children Sorcerer in Terminator Armour/Emperor_s-Children-Sorcerer-in-Terminator-Armour_clear (1).webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children Chaos Lord in Terminator Armour',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '650',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children Chaos Lord in Terminator Armour/Emperor_s-Children-Chaos-Lord-in-Terminator-Armour_clear (1).webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children Master of Possession',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '550',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children Master of Possession/Emperor_s-Children-Master-of-Possession_clear.webp',
                    'public/product_photos/emperor\'s children/Emperor\'s Children Master of Possession/Emperor_s-Children-Master-of-Possession2_clear.webp',
                    'public/product_photos/emperor\'s children/Emperor\'s Children Master of Possession/Emperor_s-Children-Master-of-Possession3_clear.webp'
                ],
            ],
            [
                'name' => 'Chaos Daemons Slaanesh Keeper of Secrets',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '3000',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Chaos Daemons Slaanesh Keeper of Secrets/Chaos-Daemons-Slaanesh-Keeper-of-Secrets_clear.webp',
                    'public/product_photos/emperor\'s children/Chaos Daemons Slaanesh Keeper of Secrets/Chaos-Daemons-Slaanesh-Keeper-of-Secrets2_clear.webp',
                    'public/product_photos/emperor\'s children/Chaos Daemons Slaanesh Keeper of Secrets/Chaos-Daemons-Slaanesh-Keeper-of-Secrets3_clear.webp',
                    'public/product_photos/emperor\'s children/Chaos Daemons Slaanesh Keeper of Secrets/Chaos-Daemons-Slaanesh-Keeper-of-Secrets4_clear.webp'
                ],
            ],
            [
                'name' => 'Emperor\'s Children Weapons v6 Plasma gun',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '250',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children Weapons v6/Emperor\'s Children Weapons v6_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children Weapons v5',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '225',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children Weapons v5/Emperor\'s Children Weapons v5_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children Weapons v4',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '200',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children Weapons v4/Emperor\'s Children Weapons v4_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children Weapons v3',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '200',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children Weapons v3/Emperor\'s Children Weapons v3_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children Weapons v2',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '450',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children Weapons v2/Emperor\'s Children Weapons v2_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children Weapons v1',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '450',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children Weapons v1/Emperor\'s Children Weapons v1_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children torsos v2',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '200',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children torsos v2/Emperor\'s Children torsos v2_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children torsos v1',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '200',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children torsos v1/Emperor\'s Children torsos v1_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children arms with bolters',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '250',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children arms with bolters/Emperor\'s Children arms with bolters_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children Shoulder Pads v2',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '350',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children Shoulder Pads v2/Emperor\'s Children Shoulder Pads v2_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children Shoulder Pads v1',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '350',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children Shoulder Pads v1/Emperor\'s Children Shoulder Pads v1_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children Backpacks v1',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '200',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children Backpacks v1/Emperor\'s Children Backpacks v1_clrear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children Torsos with body',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '500',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children Torsos with body/Emperor\'s Children Torsos with body_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children legs v2',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '450',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children legs v2/Emperor\'s Children legs v2_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children legs v1',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '450',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children legs v1/Emperor\'s Children legs v1_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children heads v5',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '350',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children heads v5/Emperor\'s Children heads v5_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children heads v4',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '350',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children heads v4/Emperor\'s Children heads v4_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children heads v3',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '175',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children heads v3/Emperor\'s Children heads v3_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children heads v2',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '350',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children heads v2/Emperor\'s Children heads v2_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children heads v1',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '350',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children heads v1/Emperor\'s Children heads v1_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children extras v2 vox sirens',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '300',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children extras v2 vox sirens/Emperor\'s Children extras v1 vox sirens_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children extras v1 capes',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '175',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children extras v1 capes/Emperor\'s Children extras v1 capes_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children guitars with arms v2',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '350',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children guitars with arms v2/Emperor\'s Children guitars with arms v2_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children guitars with arms v1',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '300',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children guitars with arms v1/Emperor\'s Children guitars with arms v1_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children arms v2',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '300',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children arms v2/Emperor\'s Children arms v2_full_clear.webp',
                ],
            ],
            [
                'name' => 'Emperor\'s Children arms v1',
                'quantity' => '999',
                'collection_id' => '4',
                'price' => '350',
                'is_published' => true,
                'images' => [
                    'public/product_photos/emperor\'s children/Emperor\'s Children arms v1/Emperor\'s Children arms v1_full_clear.webp',
                ],
            ],
            //            [
//                'name' => '',
//                'quantity' => '999',
//                'collection_id' => '',
//                'price' => '',
//                'is_published' => true,
//                'images' => [
//                    '',
//                ],
//            ],
        ];

        foreach ($productsData as $productData) {
            $images = $productData['images'];
            unset($productData['images']);

            $product = Product::create($productData);

            foreach ($images as $imagePath) {
                $product->images()->create([
                    'image_path' => $imagePath,
                    'product_id' => $product->id
                ]);
            }
        }


    }
}
