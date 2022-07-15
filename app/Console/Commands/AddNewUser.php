<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AddNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pvk:add-new-user {number} {--email=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $argument = $this->argument('number');
        dd($this->option('email'));
        return 0;
    }
}
