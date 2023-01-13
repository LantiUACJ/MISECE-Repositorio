<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Model\User;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Introducir nombre');
        $email = $this->ask('Introducir email');
        $password = $this->secret('Introducir password');
        $user = new \App\Models\User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);

        if($user->save()){
            $this->info('Administrador registrado correctamente');
        }
        return 0;
    }
}
