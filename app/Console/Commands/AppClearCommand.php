<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppClearCommand extends Command
{
    protected $signature = 'app:clear';
    
    protected $description = 'Clear All';
    
    public function handle(): void
    {
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');
        \Artisan::call('event:clear');
        \Artisan::call('optimize:clear');
        \Artisan::call('queue:clear');
        \Artisan::call('route:clear');
        \Artisan::call('view:clear');
        
        $this->info('App Cleared Successfully');
    }
}
