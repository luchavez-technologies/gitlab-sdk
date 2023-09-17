<?php

namespace Luchavez\GitlabSdk\Resources;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Luchavez\ApiSdkKit\Services\SimpleHttp;

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
     * @param  SimpleHttp  $simple_http
     */
    public function __construct(protected SimpleHttp $simple_http)
    {
    }

    /**
     * @return SimpleHttp
     */
    public function getSimpleHttp(): SimpleHttp
    {
        return $this->simple_http;
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
