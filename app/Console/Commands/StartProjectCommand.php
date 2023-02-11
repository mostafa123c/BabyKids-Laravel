<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class StartProjectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Just for start Project';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $name = $this->ask('Enter Your Name');
        $email = $this->ask('Enter Your Email');
        $password = $this->ask('Enter Your Password');

//        if($email= User::where('email',$email)->first());
//        {
//            $this->info('This Email Exists');
//            return 0;
//        };

        User::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>Hash::make($password),
        ]);

        $this->info('User Created !');
        return 0;
    }
}
