<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class AssignWebsiteAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register:website-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign the website-admin role to a user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->ask('Email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error(sprintf('No user with email, %s, exists', $email));
        }

        $user->assignRole('website-admin');
    }
}
