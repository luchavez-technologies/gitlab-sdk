<?php

namespace Luchavez\GitlabSdk\DataTransferObjects;

use Luchavez\StarterKit\Abstracts\BaseJsonSerializable;
use Illuminate\Support\Carbon;

/**
 * Class GitlabCurrentUserResponseData
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class GitlabCurrentUserResponseData extends BaseJsonSerializable
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    public string $username;

    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $state;

    /**
     * @var string
     */
    public string $avatar_url;

    /**
     * @var string
     */
    public string $web_url;

    /**
     * @var Carbon
     */
    public Carbon $created_at;

    /**
     * @var string
     */
    public string $bio;

    /**
     * @var string|null
     */
    public string|null $location;

    /**
     * @var string|null
     */
    public string|null $public_email;

    /**
     * @var string
     */
    public string $skype;

    /**
     * @var string
     */
    public string $linkedin;

    /**
     * @var string
     */
    public string $twitter;

    /**
     * @var string
     */
    public string $website_url;

    /**
     * @var string|null
     */
    public string|null $organization;

    /**
     * @var string
     */
    public string $job_title;

    /**
     * @var string|null
     */
    public string|null $pronouns;

    /**
     * @var bool
     */
    public bool $bot;

    /**
     * @var string|null
     */
    public string|null $work_information;

    /**
     * @var int
     */
    public int $followers;

    /**
     * @var int
     */
    public int $following;

    /**
     * @var string|null
     */
    public string|null $local_time;

    /**
     * @var Carbon
     */
    public Carbon $last_sign_in_at;

    /**
     * @var Carbon
     */
    public Carbon $confirmed_at;

    /**
     * @var int
     */
    public int $theme_id;

    /**
     * @var string
     */
    public string $last_activity_on;

    /**
     * @var int
     */
    public int $color_scheme_id;

    /**
     * @var int
     */
    public int $projects_limit;

    /**
     * @var Carbon
     */
    public Carbon $current_sign_in_at;

    /**
     * @var array
     */
    public array $identities;

    /**
     * @var bool
     */
    public bool $can_create_group;

    /**
     * @var bool
     */
    public bool $can_create_project;

    /**
     * @var bool
     */
    public bool $two_factor_enabled;

    /**
     * @var bool
     */
    public bool $external;

    /**
     * @var bool
     */
    public bool $private_profile;

    /**
     * @var string
     */
    public string $commit_email;

    /**
     * @param  string  $created_at
     */
    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $this->parseStringToCarbon($created_at);
    }

    /**
     * @param  string  $confirmed_at
     */
    public function setConfirmedAt(string $confirmed_at): void
    {
        $this->confirmed_at = $this->parseStringToCarbon($confirmed_at);
    }

    /**
     * @param  string  $current_sign_in_at
     */
    public function setCurrentSignInAt(string $current_sign_in_at): void
    {
        $this->current_sign_in_at = $this->parseStringToCarbon($current_sign_in_at);
    }

    /**
     * @param  string  $last_sign_in_at
     */
    public function setLastSignInAt(string $last_sign_in_at): void
    {
        $this->last_sign_in_at = $this->parseStringToCarbon($last_sign_in_at);
    }
}
