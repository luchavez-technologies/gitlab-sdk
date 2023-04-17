<?php

namespace Luchavez\GitlabSdk\Resources\Version;

use Luchavez\GitlabSdk\Resources\BaseResource;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

/**
 * Class Version
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/version.html
 */
class Version extends BaseResource
{
    /**
     * @return Collection|Response|null
     *
     * @link https://docs.gitlab.com/ee/api/version.html
     */
    public function get(): Collection|Response|null
    {
        return $this->parseResponse($this->getSimpleHttp()->get('version'));
    }
}
