<?php

namespace Luchavez\GitlabSdk\Resources\PersonalAccessTokens;

use Luchavez\ApiSdkKit\Services\MakeRequest;
use Luchavez\GitlabSdk\Resources\BaseResource;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

/**
 * Class PersonalAccessToken
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/personal_access_tokens.html
 */
class PersonalAccessToken extends BaseResource
{
    /**
     * @param  MakeRequest  $make_request
     * @param  int|string|null  $id
     */
    public function __construct(protected MakeRequest $make_request, protected int|string|null $id = null)
    {
        parent::__construct($make_request);
    }

    /**
     * @return Collection|Response|null
     *
     * @link https://docs.gitlab.com/ee/api/personal_access_tokens.html#get-single-personal-access-token
     */
    public function get(): Collection|Response|null
    {
        $id = $this->id ?? 'self';

        return $this->parseResponse($this->getMakeRequest()->get("personal_access_tokens/$id"));
    }

    /**
     * @return bool
     *
     * @link https://docs.gitlab.com/ee/api/personal_access_tokens.html#revoke-a-personal-access-token
     */
    public function revoke(): bool
    {
        $id = $this->id ?? 'self';

        return $this->getMakeRequest()->delete("personal_access_tokens/$id")->successful();
    }
}
