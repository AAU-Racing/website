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
        $this->findByNameOrCreate('Home', 'home', true, true);
        $this->findByNameOrCreate('About', 'about');
        $this->findByNameOrCreate('The Cars', 'cars', true, true);
        $this->findByNameOrCreate('Pictures and Press', 'press', false, true);
        $this->findByNameOrCreate('The Team', 'team', false, true);
        $this->findByNameOrCreate('Join the team', 'join');
        $this->findByNameOrCreate('Sponsors', 'sponsors');
        $this->findByNameOrCreate('Contact', 'contact');
    }

    private function findByNameOrCreate($title, $name, $editable = true, $special = false) {
        $page = Page::where('name', $name)->first();

        if (!$page) {
            $page = new Page();
            $page->name = $name;
            $page->content = 'This page is under construction.';
            $page->title = $title;
            $page->editable = $editable;
            $page->special = $special;
            $page->save();
        }

    }
}
