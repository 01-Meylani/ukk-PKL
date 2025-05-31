<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Filament::serving(function () {
            $user = auth()->user();

            if ($user) {
                $role = $user->getRoleNames()->first();

                Filament::registerUserMenuItems([
                    UserMenuItem::make()
                        ->label($user->name . ' (' . $role . ')')
                        ->url('#')
                        ->icon('heroicon-o-user'),
                ]);
            }
        });
    }
}
