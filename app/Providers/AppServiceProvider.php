<?php

namespace App\Providers;

use App\Models\LanguageOptions;
use App\Models\PublicationsType;
use Illuminate\Support\{ServiceProvider, Facades\View};

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
        $language_options = LanguageOptions::all();
        $publication_types = PublicationsType::all();
        View::share([ 'language_options' => $language_options, 'publication_types' => $publication_types]);
    }
}
