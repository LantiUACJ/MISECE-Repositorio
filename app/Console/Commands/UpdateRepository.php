<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a request to MISECE';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $curl = new \App\Tools\CurlHelper(env("MISECE_URL") . "api/repositorio",[]);
        $response = $curl->postJWT();
        
        dd($response);

        return Command::SUCCESS;
    }
}
