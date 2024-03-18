<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restriction;


class RestrictionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        Restriction::factory()->create([
            'codes' => 'A',
            'name' => 'MOTORCYCLE',
        ]);
        Restriction::factory()->create([
            'codes' => 'B',
            'name' => 'CAR UP TO 5000 KGS GVW/ 8 SEATS',
        ]);
        Restriction::factory()->create([
            'codes' => 'B1',
            'name' => 'CAR UP TO 5000 KGS GVW/ 9  OR MORE SEATS',
        ]);
        Restriction::factory()->create([
            'codes' => 'B2',
            'name' => 'GOODS ≤ 3500 KGS GVW',
        ]);
        Restriction::factory()->create([
            'codes' => 'C',
            'name' => 'GOODS > 3500 KGS GVW',
        ]);
        Restriction::factory()->create([
            'codes' => 'BE',
            'name' => 'TRAILERS ≤ 3500 KGS',
        ]);
        Restriction::factory()->create([
            'codes' => 'CE',
            'name' => 'ARTICULATED C > 3500 KGS COMBINED GVW',
        ]);

    }
}
