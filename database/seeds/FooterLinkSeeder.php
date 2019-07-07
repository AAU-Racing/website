<?php

use App\FooterLink;
use Illuminate\Database\Seeder;

class FooterLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FooterLink::create([
            'name' => 'Aalborg University',
            'path' => 'https://www.aau.dk'
        ]);

        FooterLink::create([
            'name' => 'Formula Student',
            'path' => 'https://www.imeche.org/events/formula-student'
        ]);

        FooterLink::create([
            'name' => 'SAE International',
            'path' => 'https://www.sae.org/attend/student-events/'
        ]);

        FooterLink::create([
            'name' => 'Find us on Facebook!',
            'path' => 'https://www.facebook.com/AAURacing/'
        ]);

        FooterLink::create([
            'name' => 'Find us on Instagram!',
            'path' => 'https://www.instagram.com/aau_racing/'
        ]);

        FooterLink::create([
            'name' => 'AAU Racing Wiki',
            'path' => 'https://wiki.aauracing.dk'
        ]);
    }
}
