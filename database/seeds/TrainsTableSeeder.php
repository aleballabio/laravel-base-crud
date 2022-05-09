<?php

use Illuminate\Database\Seeder;
use App\Train;
use Faker\Generator as Faker;


class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        // Migration ONE example with real datas ( Not reccomended with this method)
        /*
        $arrHouses = [
            [
                'title' => 'Bellissima casa al mare',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
                'city' => 'Roma',
                'available_date' => '2022-05-07'
            ],
            [
                'title' => 'Bruttissima casa al mare',
                'description' => "Lorem Ipsum is simply",
                'city' => 'Firenze',
                'available_date' => '2022-05-06'
            ],
            [
                'title' => 'Normale casa al mare',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived ",
                'city' => 'Napoli',
                'available_date' => '2022-05-06'
            ],
        ];

        foreach ($arrHouses as $houseData) {
            $house = new House();
            $house->title = $houseData['title'];
            $house->description = $houseData['description'];
            $house->city = $houseData['city'];
            $house->available_date = $houseData['available_date'];
            $house->fill($houseData);
            $house->save();
        }
    */

        for ($index = 0; $index < 500; $index++) {
            $trainInfos = [
                'azienda' => $faker->company(),
                'stazione_di_partenza' => $faker->city(),
                'stazione_di_arrivo' => $faker->city(),
                'orario_di_partenza' => $faker->dateTime(),
                'orario_di_arrivo' => $faker->dateTime(),
                'codice_treno' => $faker->regexify('[A-Z]{5}[0-9]{3}'),
                'numero_carrozze' => $faker->numberBetween(1, 12),
                'in_orario' =>  $faker->numberBetween(0, 1),
                'cancellato' =>  $faker->numberBetween(0, 1),

            ];

            $train = new Train;
            $train->fill($trainInfos);
            $train->save();
        }
    }
}