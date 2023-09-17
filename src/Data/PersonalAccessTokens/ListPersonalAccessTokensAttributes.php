<?php

namespace Luchavez\GitlabSdk\Data\PersonalAccessTokens;

use Illuminate\Support\Carbon;
use Luchavez\GitlabSdk\Abstracts\BaseGitlabData;
use Luchavez\GitlabSdk\Traits\Attributes\OffSetBasedPaginationTrait;

/**
 * Class ListPersonalAccessTokensAttributes
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/personal_access_tokens.html
 */
class ListPersonalAccessTokensAttributes extends BaseGitlabData
{
    use OffSetBasedPaginationTrait;

    /**
     * Limit results to PATs created after specified time.
     *
     * @var string|null
     */
    public ?string $created_after = null;

    /**
     * Limit results to PATs created before specified time.
     *
     * @var string|null
     */
    public ?string $created_before = null;

    /**
     * Limit results to PATs last used after specified time.
     *
     * @var string|null
     */
    public ?string $last_used_after = null;

    /**
     * Limit results to PATs last used before specified time.
     *
     * @var string|null
     */
    public ?string $last_used_before = null;

    /**
     * Limit results to PATs with specified revoked state. Valid values are true and false.
     *
     * @var bool|null
     */
    public ?bool $revoked = null;

    /**
     * Limit results to PATs with name containing search string.
     *
     * @var string|null
     */
    public ?string $search = null;

    /**
     * Limit results to PATs with specified state. Valid values are active and inactive.
     *
     * @var string|null
     */
    public ?string $state = null;

    /**
     * Limit results to PATs owned by specified user.
     *
     * @var int|string|null
     */
    public int|string|null $user_id = null;

    /**
     * @param  Carbon|string|null  $created_after
     */
    public function setCreatedAfter(Carbon|string $created_after = null): void
    {
        $this->created_after = $this->getDateString($created_after);
    }

    /**
     * @param  Carbon|string|null  $created_before
     */
    public function setCreatedBefore(Carbon|string $created_before = null): void
    {
        $this->created_before = $this->getDateString($created_before);
    }

    /**
     * @param  Carbon|string|null  $last_used_after
     */
    public function setLastUsedAfter(Carbon|string $last_used_after = null): void
    {
        $this->last_used_after = $this->getDateString($last_used_after);
    }

    /**
     * @param  Carbon|string|null  $last_used_before
     */
    public function setLastUsedBefore(Carbon|string $last_used_before = null): void
    {
        $this->last_used_before = $this->getDateString($last_used_before);
    }

    /**
     * @param  string|null  $state
     */
    public function setState(?string $state): void
    {
        if (in_array($state, ['active', 'inactive'])) {
            $this->state = $state;
        }
    }
}
