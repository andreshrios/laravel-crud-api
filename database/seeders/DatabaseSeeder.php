<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Expertise;
use App\Models\CulturalRight;
use App\Models\Nac;
use App\Models\Monitor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $expertises = ['Artes plásticas', 'Teatro', 'Música', 'Danza', 'Cocina tradicional', 'Juegos tradicionales', 'Promoción de lectura'];

        foreach ($expertises as $expertise) {
            Expertise::factory()->create([
                 'name' => $expertise
            ]);
        }

        $cultural_rights = ['Identidad y patrimonios culturales', 'Referencias a comunidades culturales', 'Acceso y participación en la vida cultural', 'Educación y formación', 'Información y comunicación', 'Cooperación cultural'];

        foreach ($cultural_rights as $cultural_right) {
            CulturalRight::factory()->create([
                 'name' => $cultural_right
            ]);
        }

        $nacs = ['ALCALÁ', 'ANDALUCÍA', 'ANSERMANUEVO', 'ARGELIA', 'BOLÍVAR', 'BUENAVENTURA', 'BUGA'];

        foreach ($nacs as $nac) {
            Nac::factory()->create([
                 'name' => $nac
            ]);
        }

        $monitors = ['KAREM LOPEZ', 'ELVIA TULIA O'];

        foreach ($monitors as $monitor) {
            Monitor::factory()->create([
                 'name' => $monitor
            ]);
        }
    }
}
