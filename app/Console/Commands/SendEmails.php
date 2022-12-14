<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("algo");
        $this->table(
            ['Name', 'Email'],
            [['Luis', 'luis@dominio.com'],['Mario', 'mario@dominio.com']]
        );
        return 0;
    }
}
