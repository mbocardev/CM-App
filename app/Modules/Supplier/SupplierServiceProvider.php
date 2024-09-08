<?php

namespace App\Modules\Supplier;

use Illuminate\Support\ServiceProvider;

class SupplierServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Fusionne la configuration de base avec celle définie
        $this->mergeConfigFrom(__DIR__ . '/config.php', 'supplier');
    }

    public function boot(): void
    {
        // Charge les routes définies pour ce module
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        
        // Charge les vues du module depuis le répertoire approprié
        $this->loadViewsFrom(resource_path('views/suppliers'), 'suppliers');
    }
}
