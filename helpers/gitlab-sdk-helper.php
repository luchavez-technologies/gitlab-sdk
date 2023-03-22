<?php

/**
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @since  2021-12-20
 */

use Luchavez\GitlabSdk\Services\GitlabSdk;

if (! function_exists('gitlabSdk')) {
    /**
     * @param  string|null  $privateToken
     * @return GitlabSdk
     */
    function gitlabSdk(string $privateToken = null): GitlabSdk
    {
        return resolve(
            'gitlab-sdk',
            [
                'private_token' => $privateToken,
            ]
        );
    }
}

if (! function_exists('gitlab_sdk')) {
    /**
     * @param  string|null  $privateToken
     * @return GitlabSdk
     */
    function gitlab_sdk(string $privateToken = null): GitlabSdk
    {
        return gitlabSdk($privateToken);
    }
}
