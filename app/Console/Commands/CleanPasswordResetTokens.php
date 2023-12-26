<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanPasswordResetTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-password-reset-tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean expired password reset tokens';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('password_reset_tokens')
            ->where('expires_at', '<', now())
            ->delete();

        $this->info('Expired password reset tokens cleaned.');
    }
}
