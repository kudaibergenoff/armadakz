<?php

namespace App\Providers;

use App\Models\{User, Permission};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->key, function (User $user, Permission $permission) {
                    return $user->permission($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }

        Blade::directive('isCan', function ($permission){
            return "<?php if(auth()->check() && auth()->user()->permission({$permission})): ?>";
        });
        Blade::directive('endisCan', function ($permission){
            return "<?php endif; ?>";
        });
    }
}
