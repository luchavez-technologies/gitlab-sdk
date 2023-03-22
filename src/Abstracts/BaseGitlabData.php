<?php

namespace Luchavez\GitlabSdk\Abstracts;

use Luchavez\StarterKit\Abstracts\BaseJsonSerializable;
use Illuminate\Support\Carbon;

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
    protected function getDateString(Carbon|string|null $carbon): string|null
    {
        return $carbon instanceof Carbon ? $carbon->toDateString() : $carbon;
    }
}
