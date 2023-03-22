<?php

namespace Luchavez\GitlabSdk\Resources\Metadata;

use Luchavez\GitlabSdk\Resources\BaseResource;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

/**
 * Class Metadata
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/metadata.html
 */
class Metadata extends BaseResource
{
    /**
     * @return Collection|Response|null
     *
     * @link https://docs.gitlab.com/ee/api/metadata.html
     */
    public function get(): Collection|Response|null
    {
        return $this->parseResponse($this->getMakeRequest()->get('metadata'));
    }
}
