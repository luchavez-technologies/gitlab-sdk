<?php

namespace Luchavez\GitlabSdk\Data\Members;

use Luchavez\GitlabSdk\Traits\Attributes\OffSetBasedPaginationTrait;
use Luchavez\StarterKit\Abstracts\BaseJsonSerializable;

/**
 * Class ListMembersAttributes
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/members.html#list-all-members-of-a-group-or-project
 */
class ListMembersAttributes extends BaseJsonSerializable
{
    use OffSetBasedPaginationTrait;

    /**
     * A query string to search for members
     *
     * @var string|null
     */
    public ?string $query = null;

    /**
     * Filter the results on the given user IDs
     *
     * @var array|null
     */
    public ?array $user_ids = null;

    /**
     * Filter skipped users out of the results
     *
     * @var array|null
     */
    public ?array $skip_users = null;

    /**
     * Show seat information for users
     *
     * @var bool|null
     */
    public ?bool $show_seat_info = null;
}
