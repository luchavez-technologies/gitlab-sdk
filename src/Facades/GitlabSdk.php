<?php

namespace Luchavez\GitlabSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class GitlabSdk
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @see \Luchavez\GitlabSdk\Services\GitlabSdk
 */
class GitlabSdk extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'gitlab-sdk';
    }
}
