<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UserAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a user to the database';

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
        $email = $this->ask('Email: ');
        $password = $this->secret('Password: ');
        $password_confirm = $this->secret('Password (again): ');

        if($password !== $password_confirm) {
            $this->error('Passwords mismatch. Bailing out!');
            return;
        }

        $user = \App\User::create([
            'name' => $email,
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        $this->info("User created with id {$user->id}.");
    }
}
