<?php

namespace Luchavez\GitlabSdk\Resources\Events;

use Luchavez\ApiSdkKit\Services\MakeRequest;
use Luchavez\GitlabSdk\Data\Events\ListUserContributionEventsAttributes;
use Luchavez\GitlabSdk\Resources\BaseResource;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

/**
 * Class UserContributionEvents
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/events.html#get-user-contribution-events
 */
class UserContributionEvents extends BaseResource
{
    /**
     * @param  MakeRequest  $make_request
     * @param  int|string  $id_or_username
     */
    public function __construct(protected MakeRequest $make_request, protected int|string $id_or_username)
    {
        parent::__construct($make_request);
    }

    /**
     * @param  ListUserContributionEventsAttributes|array  $attributes
     * @param  bool  $recursive
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/events.html#get-user-contribution-events
     */
    public function all(ListUserContributionEventsAttributes|array $attributes = [], bool $recursive = false): Response|Collection|null
    {
        $attributes = ListUserContributionEventsAttributes::from($attributes);

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

        return $this->parseResponse($this->getMakeRequest()->data($attributes)->get("users/$this->id_or_username/events"));
    }
}
