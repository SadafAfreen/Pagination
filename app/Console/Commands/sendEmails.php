<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;
use App\Models\Customer;

class sendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to all users.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $users = Customer::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new MyEmail($user));
        }
    }
}
