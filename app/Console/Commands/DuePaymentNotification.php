<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DuePaymentNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:due-payment-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Notification Payment H-1 Month ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    }
}
