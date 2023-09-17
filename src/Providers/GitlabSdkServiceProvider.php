<?php

namespace Luchavez\GitlabSdk\Providers;

use Luchavez\GitlabSdk\Services\GitlabSdk;
use Luchavez\StarterKit\Abstracts\BaseStarterKitServiceProvider as ServiceProvider;

/**
 * Class GitlabSdkServiceProvider
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class GitlabSdkServiceProvider extends ServiceProvider
{
    /**
     * Publishable Environment Variables
     *
     * @link    https://laravel.com/docs/8.x/eloquent#observers
     *
     * @example [ 'HELLO_WORLD' => true ]
     *
     * @var array
     */
    protected array $env_vars = [
        'GITLAB_URL' => 'gitlab.com',
    ];

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        // Register the service the package provides.
        $this->app->singleton('gitlab-sdk', fn ($app, $params) => new GitlabSdk($params['private_token']));
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['gitlab-sdk'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes(
            [
                __DIR__.'/../../config/gitlab-sdk.php' => config_path('gitlab-sdk.php'),
            ],
            'gitlab-sdk.config'
        );
    }
}
