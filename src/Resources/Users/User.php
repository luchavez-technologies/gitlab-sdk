<?php

namespace Luchavez\GitlabSdk\Resources\Users;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Luchavez\GitlabSdk\Resources\BaseResource;

/**
 * Class User
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class User extends BaseResource
{
    /**
     * @param  int|null  $id
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/users.html#list-current-user
     */
    public function get(int $id = null): Response|Collection|null
    {
        $data = [];

        if ($id) {
            $data['sudo'] = $id;
        }

        return $this->parseResponse($this->getSimpleHttp()->data($data)->get(append_url: 'user'));
    }

    /**
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/users.html#user-status
     */
    public function status(): Response|Collection|null
    {
        return $this->parseResponse($this->getSimpleHttp()->get(append_url: 'user/status'));
    }

    /**
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/users.html#get-user-preferences
     */
    public function preferences(): Response|Collection|null
    {
        return $this->parseResponse($this->getSimpleHttp()->get(append_url: 'user/preferences'));
    }

    /**
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/users.html#list-emails
     */
    public function emails(): Response|Collection|null
    {
        return $this->parseResponse($this->getSimpleHttp()->get(append_url: 'user/emails'));
    }
}
