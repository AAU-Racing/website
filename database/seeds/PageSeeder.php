<?php

use App\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->findByNameOrCreate('Home', 'home', 0, true, true);
        $this->findByNameOrCreate('About', 'about', 1);
        $this->findByNameOrCreate('The Cars', 'cars', 2, true, true);
        $this->findByNameOrCreate('Pictures and Press', 'press', 3, false, true);
        $this->findByNameOrCreate('The Team', 'team', 4, false, true);
        $this->findByNameOrCreate('Join the team', 'join', 5);
        $this->findByNameOrCreate('Sponsors', 'sponsors', 6);
        $this->findByNameOrCreate('Contact', 'contact', 7);
    }

    private function findByNameOrCreate($title, $name, $order, $editable = true, $special = false) {
        $page = Page::where('name', $name)->get();

        if (!$page) {
            Page::create(['name' => $name,
                'content' => 'This page is under construction.',
                'title' => $title,
                'order' => $order,
                'editable' => $editable,
                'special' => $special]);
        }

    }
}
