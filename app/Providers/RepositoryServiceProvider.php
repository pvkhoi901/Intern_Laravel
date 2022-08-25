<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Admin\PermissionGroup\PermissionGroupRepositoryInterface::class,
            \App\Repositories\Admin\PermissionGroup\PermissionGroupRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Admin\Role\RoleRepositoryInterface::class,
            \App\Repositories\Admin\Role\RoleRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Admin\Permission\PermissionRepositoryInterface::class,
            \App\Repositories\Admin\Permission\PermissionRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\User\UserRepositoryInterface::class,
            \App\Repositories\Admin\User\UserRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Admin\Category\Category::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\Question\QuestionRepositoryInterface::class,
            \App\Repositories\Admin\Question\Question::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\Answer\AnswerRepositoryInterface::class,
            \App\Repositories\Admin\Answer\Answer::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\Customer\CustomerRepositoryInterface::class,
            \App\Repositories\Admin\Customer\Customer::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\PhoneZalo\PhoneZaloRepositoryInterface::class,
            \App\Repositories\Admin\v\PhoneZalo::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
