<?php

namespace Luchavez\GitlabSdk\Services;

use Luchavez\ApiSdkKit\Abstracts\BaseApiSdkService;
use Luchavez\ApiSdkKit\Interfaces\CanGetHealthCheckInterface;
use Luchavez\ApiSdkKit\Services\MakeRequest;
use Luchavez\GitlabSdk\Resources\Events\Events;
use Luchavez\GitlabSdk\Resources\Events\UserContributionEvents;
use Luchavez\GitlabSdk\Resources\Groups\Group;
use Luchavez\GitlabSdk\Resources\Groups\Groups;
use Luchavez\GitlabSdk\Resources\Keys\GPGKeys;
use Luchavez\GitlabSdk\Resources\Keys\SSHKeys;
use Luchavez\GitlabSdk\Resources\Metadata\Metadata;
use Luchavez\GitlabSdk\Resources\PersonalAccessTokens\PersonalAccessToken;
use Luchavez\GitlabSdk\Resources\PersonalAccessTokens\PersonalAccessTokens;
use Luchavez\GitlabSdk\Resources\Projects\Project;
use Luchavez\GitlabSdk\Resources\Projects\Projects;
use Luchavez\GitlabSdk\Resources\Users\User;
use Luchavez\GitlabSdk\Resources\Version\Version;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

/**
 * Class GitlabSdk
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class GitlabSdk extends BaseApiSdkService implements CanGetHealthCheckInterface
{
    /**
     * @param  string|null  $privateToken
     */
    public function __construct(protected string|null $privateToken)
    {
        $this->setHeaders(
            [
                'PRIVATE-TOKEN' => $this->getPrivateToken(),
            ]
        );
    }

    /***** GETTERS & SETTERS *****/

    /**
     * @param  string|null  $append_url
     * @return string
     */
    public function getUrl(string $append_url = null): string
    {
        $url = parse_url(config('gitlab-sdk.url'));

        $append_url = $this->cleanAppendUrl($append_url);

        return 'https://'.collect([$url['host'] ?? $url['path'], $append_url])->filter()->implode('/');
    }

    /**
     * @param  string|null  $append_url
     * @return string
     */
    public function getBaseUrl(string $append_url = null): string
    {
        $url = $this->getUrl('/api/v4');

        $append_url = $this->cleanAppendUrl($append_url);

        return collect([$url, $append_url])->filter()->implode('/');
    }

    /**
     * @param  string|null  $append_url
     * @return string|null
     */
    protected function cleanAppendUrl(string $append_url = null): string|null
    {
        return $append_url ? ltrim(trim($append_url), '/') : null;
    }

    /**
     * @return string|null
     */
    public function getPrivateToken(): ?string
    {
        return $this->privateToken;
    }

    /**
     * @return MakeRequest
     */
    public function getMakeRequest(): MakeRequest
    {
        return parent::getMakeRequest()->returnAsResponse();
    }

    /***** RESOURCES*****/

    /**
     * @return Events
     *
     * @link https://docs.gitlab.com/ee/api/events.html
     */
    public function events(): Events
    {
        return new Events($this->getMakeRequest());
    }

    /**
     * @param  int|string  $id_or_username
     * @return UserContributionEvents
     *
     * @link https://docs.gitlab.com/ee/api/events.html#get-user-contribution-events
     */
    public function userContributionEvents(int|string $id_or_username): UserContributionEvents
    {
        return new UserContributionEvents($this->getMakeRequest(), $id_or_username);
    }

    /**
     * @param  int  $id
     * @return Group
     *
     * @link https://docs.gitlab.com/ee/api/groups.html
     */
    public function group(int $id): Group
    {
        return new Group($this->getMakeRequest(), $id);
    }

    /**
     * @return Groups
     *
     * @link https://docs.gitlab.com/ee/api/groups.html
     */
    public function groups(): Groups
    {
        return new Groups($this->getMakeRequest());
    }

    /**
     * @return GPGKeys
     *
     * @link https://docs.gitlab.com/ee/api/users.html#list-all-gpg-keys
     */
    public function gpgKeys(): GPGKeys
    {
        return new GPGKeys($this->getMakeRequest());
    }

    /**
     * @return SSHKeys
     *
     * @link @link https://docs.gitlab.com/ee/api/users.html#list-ssh-keys
     */
    public function sshKeys(): SSHKeys
    {
        return new SSHKeys($this->getMakeRequest());
    }

    /**
     * @return Metadata
     *
     * @link https://docs.gitlab.com/ee/api/metadata.html
     */
    public function metadata(): Metadata
    {
        return new Metadata($this->getMakeRequest());
    }

    /**
     * @param  int|string|null  $id
     * @return PersonalAccessToken
     *
     * @link https://docs.gitlab.com/ee/api/personal_access_tokens.html
     */
    public function personalAccessToken(int|string|null $id = null): PersonalAccessToken
    {
        return new PersonalAccessToken($this->getMakeRequest(), $id);
    }

    /**
     * @return PersonalAccessTokens
     *
     * @link https://docs.gitlab.com/ee/api/personal_access_tokens.html
     */
    public function personalAccessTokens(): PersonalAccessTokens
    {
        return new PersonalAccessTokens($this->getMakeRequest());
    }

    /**
     * @param  int  $id
     * @return Project
     *
     * @link https://docs.gitlab.com/ee/api/projects.html
     */
    public function project(int $id): Project
    {
        return new Project($this->getMakeRequest(), $id);
    }

    /**
     * @return Projects
     *
     * @link https://docs.gitlab.com/ee/api/projects.html
     */
    public function projects(): Projects
    {
        return new Projects($this->getMakeRequest());
    }

    /**
     * @return User
     *
     * @link https://docs.gitlab.com/ee/api/users.html#list-current-user
     */
    public function user(): User
    {
        return new User($this->getMakeRequest());
    }

    /**
     * @return Version
     *
     * @link https://docs.gitlab.com/ee/api/version.html
     */
    public function version(): Version
    {
        return new Version($this->getMakeRequest());
    }

    /**
     * @param  mixed|null  $data
     * @return Response|Collection|array
     */
    public function getHealthCheck(mixed $data = null): Response|Collection|array
    {
        return $this->metadata()->get();
    }
}
