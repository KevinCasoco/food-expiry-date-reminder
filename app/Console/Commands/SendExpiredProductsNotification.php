<?php

namespace App\Console\Commands;

use App\Notifications\EmailNotification;
use Illuminate\Console\Command;
use App\Models\User;

class SendExpiredProductsNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-expired-products-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification for expired products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all(); // Retrieve all users or customize as needed

        foreach ($users as $user) {
            $user->notify(new EmailNotification());
        }
    }
}
