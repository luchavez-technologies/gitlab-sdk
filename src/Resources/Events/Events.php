<?php

namespace Luchavez\GitlabSdk\Resources\Events;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Luchavez\GitlabSdk\Data\Events\ListEventsAttributes;
use Luchavez\GitlabSdk\Resources\BaseResource;

/**
 * Class Events
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/events.html
 */
class Events extends BaseResource
{
    /**
     * @param  ListEventsAttributes|array  $attributes
     * @param  bool  $recursive
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/events.html#list-currently-authenticated-users-events
     */
    public function all(ListEventsAttributes|array $attributes = [], bool $recursive = false): Response|Collection|null
    {
        $attributes = ListEventsAttributes::from($attributes);

        if ($recursive) {
            $this->asCollection();
            $result = collect();

            do {
                $data = $this->all($attributes);
                $attributes->page++; // increment page number
                $result = $result->merge($data);
            } while ($data->count());

            return $result;
        }

        return $this->parseResponse($this->getSimpleHttp()->data($attributes)->get(append_url: 'events'));
    }
}
