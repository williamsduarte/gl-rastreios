<?php

use \App\Category;
use \App\Company;
use \App\Phone;
use \App\Data;
use \App\City;
use Illuminate\Database\Seeder;

class DataGMTableSeeder extends Seeder
{

    private $company;
    private $category;
    private $phone;

    public function __construct(Company $company,
                                Category $category,
                                Phone $phone)
    {
        $this->company = $company;
        $this->category = $category;
        $this->phone = $phone;
    }

    private function clearField($value = null)
    {
        return isset($value) && !empty( $value ) ? $value : null;
    }

    private function  only_numbers($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        $arrayData = Data::where('status_cadastro', 0)->take(100)->get();


        foreach ($arrayData as $list) {


            $array_data = [
                'company_uuid' => Uuid::generate()->string,
                'plan_id' => 1,
                'state_id' => $this->clearField( $list['estado_id'] ),
                'city_id' => $this->clearField( $list['cidade_id'] ),
                'zipcode_id' => $this->clearField( $list['cep_id'] ),
                'place_id' => $this->clearField( $list['endereco_id'] ),
                'district_id' => $this->clearField( $list['bairro_id'] ),
                'name_fantasy' => $this->clearField( $list['name'] ),
                'numeral' => $this->clearField( $list['numero'] ),
                'active' => false
            ];

            $array_exists = [
                'state_id' => $this->clearField( $list['estado_id'] ),
                'city_id' => $this->clearField( $list['cidade_id'] ),
                'zipcode_id' => $this->clearField( $list['cep_id'] ),
                'place_id' => $this->clearField( $list['endereco_id'] ),
                'district_id' => $this->clearField( $list['bairro_id'] ),
                'name_fantasy' => $this->clearField( $list['name'] ),
                'numeral' => $this->clearField( $list['numero'] ),
            ];

            $exists = $this->company->where($array_exists)->exists();

            if( $exists === false ) {

                $company = $this->company->create($array_data);

                if (!empty( $list['cat_guialocaliza'] ) && $list['cat_guialocaliza'] > 0) {

                    $category = $this->category->find($list['cat_guialocaliza']);

                    if(isset($category) && $category->id > 0) {

                        $category->companies()->attach($company->id);

                    } else {

                        $category = $this->category->find( 478 );
                        $category->companies()->attach($company->id);

                    }

                } else {

                    $category = $this->category->find( 478 );
                    $category->companies()->attach($company->id);

                }


                $collection = collect([]);

                if(!empty($list->telephone)) {

                    $expTelephones = explode(',', $list->telephone);

                    foreach ($expTelephones as $key => $telephone) {
                       $collection->push($this->only_numbers($telephone));
                    }

                }
          
                foreach ($collection->all() as $number) {

                    if (preg_match('#^\d{2}[6789]\d{4}\d{4}$#', $number) > 0) {
                        $type = 'cell';
                    } else {
                        $type = 'fixed';
                    }

                    if( !empty( $number ) ) {

                        $phone = $this->phone->create([
                            'number' => $number,
                            'type' => $type
                        ]);

                    }

                    $company->phones()->attach($phone->id);

                   Data::where('id', $list->id)
                    ->update([
                        'status_cadastro' => true, 
                        'company_id' => $company->id,
                    ]);


                }

            }

            City::where('id', $list->cidade_id)
                ->update(['active' => true]);

            Data::where('id', $list->id)
                ->update([
                    'status_cadastro' => true
                ]);

        }

    }

}
