<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    public function run()
    {        
        $counties = [
            'Baringo County',
            'Bomet County',
            'Bungoma County',
            'Busia County',
            'Elgeyo-Marakwet County',
            'Embu County',
            'Garissa County',
            'Homa Bay County',
            'Isiolo County',
            'Kajiado County',
            'Kakamega County',
            'Kericho County',
            'Kiambu County',
            'Kilifi County',
            'Kirinyaga County',
            'Kisii County',
            'Kisumu County',
            'Kitui County',
            'Kwale County',
            'Laikipia County',
            'Lamu County',
            'Machakos County',
            'Makueni County',
            'Mandera County',
            'Marsabit County',
            'Meru County',
            'Migori County',
            'Mombasa County',
            'Murang\'a County',
            'Nairobi County',
            'Nakuru County',
            'Nandi County',
            'Narok County',
            'Nyamira County',
            'Nyandarua County',
            'Nyeri County',
            'Samburu County',
            'Siaya County',
            'Taita-Taveta County',
            'Tana River County',
            'Tharaka-Nithi County',
            'Trans Nzoia County',
            'Turkana County',
            'Uasin Gishu County',
            'Vihiga County',
            'Wajir County',
            'West Pokot County'
        ];

        foreach ($counties as $county) {
            DB::table('locations')->insert([
                'name'        => $county,
                'created_by' => null,
                'updated_by' => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}