<?php

namespace Database\Seeders;

use App\Domain\Address\Models\City;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Diego Pereira',
            'email' => 'diego.kernel@kernelms.com',
            'password' => bcrypt('password'),
        ]);

        $ufs = [
            'Acre' => 'Rio Branco',
            'Alagoas' => 'Maceió',
            'Amapá' => 'Macapá',
            'Amazonas' => 'Manaus',
            'Bahia' => 'Salvador',
            'Ceará' => 'Fortaleza',
            'Distrito Federal' => 'Brasília',
            'Espírito Santo' => 'Vitória',
            'Goiás' => 'Goiânia',
            'Maranhão' => 'São Luís',
            'Mato Grosso' => 'Cuiabá',
            'Mato Grosso do Sul' => 'Campo Grande',
            'Minas Gerais' => 'Belo Horizonte',
            'Pará' => 'Belém',
            'Paraíba' => 'João Pessoa',
            'Paraná' => 'Curitiba',
            'Pernambuco' => 'Recife',
            'Piauí' => 'Teresina',
            'Rio de Janeiro' => 'Rio de Janeiro',
            'Rio Grande do Norte' => 'Natal',
            'Rio Grande do Sul' => 'Porto Alegre',
            'Rondônia' => 'Porto Velho',
            'Roraima' => 'Boa Vista',
            'Santa Catarina' => 'Florianópolis',
            'São Paulo' => 'São Paulo',
            'Sergipe' => 'Aracaju',
            'Tocantins' => 'Palmas',
        ];

        foreach ($ufs as $state => $name) {
            $ufModel = new City;
            $ufModel->state = $state;
            $ufModel->name = $name;
            $ufModel->save();
        }
    }
}
