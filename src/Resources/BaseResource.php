<?php

namespace Luchavez\GitlabSdk\Resources;

use Luchavez\ApiSdkKit\Services\MakeRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

/**
 * Class BaseResource
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
abstract class BaseResource
{
    /**
     * @var bool
     */
    protected bool $as_collection = true;

    /**
     * @param  MakeRequest  $make_request
     */
    public function __construct(protected MakeRequest $make_request)
    {
    }

    /**
     * @return MakeRequest
     */
    public function getMakeRequest(): MakeRequest
    {
        return $this->make_request;
    }

    /**
     * @param  bool  $bool
     * @return $this
     */
    public function asCollection(bool $bool = true): static
    {
        $this->as_collection = $bool;

        return $this;
    }

    /**
     * @param  bool  $bool
     * @return $this
     */
    public function asResponse(bool $bool = true): static
    {
        $this->as_collection = ! $bool;

        return $this;
    }

    /**
     * @param  Response  $response
     * @return Response|Collection|null
     */
    protected function parseResponse(Response $response): Collection|Response|null
    {
        if ($this->as_collection) {
            return $response->successful() ? $response->collect() : null;
        }

        return $response;
    }
}
