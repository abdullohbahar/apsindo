<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Subscription;
use Illuminate\Console\Command;
use App\Http\Controllers\WhatsappNotification;

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
        $oneMonthFromNow = now()->addMonth();

        $subscriptions = Subscription::with('user.profile', 'paymentSetting')
            ->whereDate('date_end', '=', $oneMonthFromNow->toDateString())
            ->orderBy('created_at', 'desc')
            ->get();

        $parseDate = Carbon::parse($oneMonthFromNow)->format('d-m-Y');

        foreach ($subscriptions as $subscription) {
            $whatsappNotificationController = new WhatsappNotification();
            $dataMember = [
                'subject' => 'Pengguna Baru',
                'message' => 'Masa Aktif Member Asosiasi Pendidik Seni Indonesia Anda Akan Berakhir Pada Tanggal ' . $parseDate . ' Harap Lakukan Perpanjangan',
                'phone-number' => $subscription->user->profile->no_telepon
            ];
            $whatsappNotificationController->__invoke($dataMember);

            // lakukan pengecekan apakah data subscription sudah ada
            // jika belum ada maka tambahkan data
            $cekSubs = Subscription::where('user_id', $subscription->user->id)
                ->where('payment_status', 'unpaid')
                ->where('information', 'Perpanjang')
                ->first();

            if ($cekSubs == null) {
                Subscription::create([
                    'user_id' => $subscription->user->id,
                    'information' => 'Perpanjang',
                    'payment_settings_id' => 1,
                    'metode_pembayaran' => '-',
                    'payment_status' => 'unpaid'
                ]);
            }
        }
    }
}
