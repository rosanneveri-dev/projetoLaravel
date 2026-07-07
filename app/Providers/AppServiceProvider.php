<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Categoria;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        
            $categoriasMenu = Categoria::all();
            view()->share('categoriasMenu', $categoriasMenu);
        
    }
}
