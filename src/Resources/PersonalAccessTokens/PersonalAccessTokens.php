<?php

namespace Luchavez\GitlabSdk\Resources\PersonalAccessTokens;

use Luchavez\GitlabSdk\Data\PersonalAccessTokens\ListPersonalAccessTokensAttributes;
use Luchavez\GitlabSdk\Resources\BaseResource;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

/**
 * Class PersonalAccessTokens
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/personal_access_tokens.html
 */
class PersonalAccessTokens extends BaseResource
{
    /**
     * @param  ListPersonalAccessTokensAttributes|array  $attributes
     * @param  bool  $recursive
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/projects.html#list-all-projects
     */
    public function all(ListPersonalAccessTokensAttributes|array $attributes = [], bool $recursive = false): Response|Collection|null
    {
        $attributes = ListPersonalAccessTokensAttributes::from($attributes);

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

        return $this->parseResponse($this->getSimpleHttp()->data($attributes)->get('personal_access_tokens'));
    }
}
