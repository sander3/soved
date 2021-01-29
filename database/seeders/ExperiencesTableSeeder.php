<?php

namespace Database\Seeders;

use App\Experience;
use Illuminate\Database\Seeder;

class ExperiencesTableSeeder extends Seeder
{
    /**
     * @var array
     */
    public $experiences = [
        [
            'organization' => 'Orderchamp',
            'role'         => [
                'nl' => 'Backend Developer',
                'en' => 'Backend Developer',
            ],
            'start_year' => 2019,
            'end_year'   => null,
            'logo'       => 'svg/orderchamp.svg',
        ],
        [
            'organization' => 'FORYARD.tech',
            'role'         => [
                'nl' => 'DevOps',
                'en' => 'DevOps',
            ],
            'start_year'   => 2015,
            'end_year'     => 2019,
            'logo'         => 'svg/foryard-tech.svg',
        ],
        [
            'organization' => 'Ucfirst',
            'role'         => [
                'nl' => 'Eigenaar',
                'en' => 'Owner',
            ],
            'start_year'   => 2014,
            'end_year'     => 2019,
            'logo'         => 'svg/ucfirst.svg',
        ],
        [
            'organization' => 'GRRR',
            'role'         => [
                'nl' => 'Stage',
                'en' => 'Internship',
            ],
            'start_year'   => 2013,
            'end_year'     => 2014,
            'logo'         => 'img/grrr.png',
        ],
        [
            'organization' => 'Driebit',
            'role'         => [
                'nl' => 'Stage',
                'en' => 'Internship',
            ],
            'start_year'   => 2013,
            'end_year'     => 2013,
            'logo'         => 'svg/driebit.svg',
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        foreach ($this->experiences as $experience) {
            Experience::create($experience);
        }
    }
}
