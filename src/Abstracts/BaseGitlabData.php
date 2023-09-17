<?php

namespace Luchavez\GitlabSdk\Abstracts;

use Illuminate\Support\Carbon;
use Luchavez\StarterKit\Abstracts\BaseJsonSerializable;

/**
 * Class BaseGitlabData
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
abstract class BaseGitlabData extends BaseJsonSerializable
{
    /**
     * @param  Carbon|string|null  $carbon
     * @return string|null
     */
    protected function getDateString(Carbon|string|null $carbon): ?string
    {
        return $carbon instanceof Carbon ? $carbon->toDateString() : $carbon;
    }
}
