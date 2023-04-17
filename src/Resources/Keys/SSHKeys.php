<?php

namespace Luchavez\GitlabSdk\Resources\Keys;

use Luchavez\GitlabSdk\Resources\BaseResource;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

/**
 * Class Keys
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/keys.html
 *
 * Note: The functions below actually belongs to Users Resource. The actual Keys Resource has no implementations here.
 */
class SSHKeys extends BaseResource
{
    /**
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/users.html#list-ssh-keys
     */
    public function all(): Response|Collection|null
    {
        return $this->parseResponse($this->getSimpleHttp()->executeGet('user/keys'));
    }

    /**
     * @param  int  $key_id
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/users.html#single-ssh-key
     */
    public function get(int $key_id): Response|Collection|null
    {
        return $this->parseResponse($this->getSimpleHttp()->get("user/keys/$key_id"));
    }
}
