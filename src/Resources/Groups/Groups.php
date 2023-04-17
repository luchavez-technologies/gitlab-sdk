<?php

namespace Luchavez\GitlabSdk\Resources\Groups;

use Luchavez\GitlabSdk\Data\Groups\ListGroupsAttributes;
use Luchavez\GitlabSdk\Resources\BaseResource;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

/**
 * Class Groups
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/groups.html
 */
class Groups extends BaseResource
{
    /**
     * @param  ListGroupsAttributes|array  $attributes
     * @param  bool  $recursive
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/groups.html#list-groups
     */
    public function all(ListGroupsAttributes|array $attributes = [], bool $recursive = false): Response|Collection|null
    {
        $attributes = ListGroupsAttributes::from($attributes);

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

        return $this->parseResponse($this->getSimpleHttp()->data($attributes)->executeGet('groups'));
    }
}
