<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Hashids\Hashids;

class TestPromoCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promoCode:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test promo code';

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
        $salt = env('HASHIDS_SALT');
        $hashids = new Hashids($salt);
        $this->info($hashids->encode(1345,2,3));
    }
}
