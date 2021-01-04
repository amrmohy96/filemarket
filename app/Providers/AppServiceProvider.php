<?php

namespace App\Providers;

use App\Models\File\File;
use App\Models\FileApproval\FileApproval;
use App\Observers\File\FileObserver;
use App\Observers\FileApproval\FileApprovalObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        File::observe(FileObserver::class);
        FileApproval::observe(FileApprovalObserver::class);
    }
}
