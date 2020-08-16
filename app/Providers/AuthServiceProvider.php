<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        roleカラムが99のuser(開発者のみ)に許可
        Gate::define('system-only', function ($user) {
            return ($user->role == 99);
        });
        // roleカラムが10から99のuser(主催者以上（主催者＆管理者）)以上に許可
        Gate::define('admin-higher', function ($user) {
            return (9 < $user->role && $user->role <= 99);
        });
        // roleカラムが1から99のuser（一般ユーザ）以上（つまり全権限）に許可
        Gate::define('user-higher', function ($user) {
            return (0 < $user->role && $user->role <= 99);
        });
    }
}
