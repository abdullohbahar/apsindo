<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateExpiredUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-expired-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update is active to expired in user table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dateNow = now();
        $stringDateNow = strtotime($dateNow);

        $users = User::with([
            'subscribe' => function ($query) {
                $query->where('payment_status', 'paid')->orderBy('created_at', 'desc')->first();
            }
        ])->where('role', 'member')->get();

        foreach ($users as $user) {
            $stringDueDate = strtotime($user->subscribe->first()?->date_end);

            if ($stringDateNow > $stringDueDate) {
                $user->update([
                    'is_active' => 'expired'
                ]);

                $user->save();
            }
        }
    }
}
