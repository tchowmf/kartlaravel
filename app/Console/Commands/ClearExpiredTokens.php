<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class ClearExpiredTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokens:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Limpa os tokens expirados';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::where('token_expires_at', '<', now())->update([
            'reset_token' => null,
            'token_expires_at' => null
        ]);

        $this->info('Tokens expirados foram limpos com sucesso!');
    }
}
