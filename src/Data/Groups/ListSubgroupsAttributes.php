<?php

namespace Luchavez\GitlabSdk\Data\Groups;

use Luchavez\GitlabSdk\Traits\Attributes\OffSetBasedPaginationTrait;
use Luchavez\StarterKit\Abstracts\BaseJsonSerializable;

/**
 * Class ListSubgroupsAttributes
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/groups.html#list-a-groups-subgroups
 */
class ListSubgroupsAttributes extends BaseJsonSerializable
{
    use OffSetBasedPaginationTrait;

    /**
     * Skip the group IDs passed
     *
     * @var int[]|null
     */
    public ?array $skip_groups;

    /**
     * Show all the groups you have access to (defaults to false for authenticated users, true for administrators);
     * Attributes owned and min_access_level have precedence
     *
     * @var bool|null
     */
    public ?bool $all_available;

    /**
     * Return the list of authorized groups matching the search criteria
     *
     * @var string|null
     */
    public ?string $search;

    /**
     * Order groups by name, path, id, or similarity (if searching, introduced in GitLab 14.1). Default is name
     * Link: https://gitlab.com/gitlab-org/gitlab/-/issues/332889
     *
     * @var string
     */
    public string $order_by = 'name';

    /**
     * Order groups in asc or desc order. Default is asc
     *
     * @var string|null
     */
    public ?string $sort;

    /**
     * Include group statistics (administrators only)
     *
     * @var bool|null
     */
    public ?bool $statistics;

    /**
     * Include custom attributes in response (administrators only)
     *
     * @var bool|null
     *
     * @link https://docs.gitlab.com/ee/api/custom_attributes.html
     */
    public ?bool $with_custom_attributes;

    /**
     * Limit to groups explicitly owned by the current user
     *
     * @var bool|null
     */
    public ?bool $owned;

    /**
     * Limit to groups where current user has at least this access level
     *
     * @var int|null
     *
     * @link https://docs.gitlab.com/ee/api/members.html#valid-access-levels
     */
    public ?int $min_access_level;

    /**
     * @param  string  $order_by
     */
    public function setOrderBy(string $order_by): void
    {
        if (in_array($order_by, ['name', 'path', 'id'])) {
            $this->order_by = $order_by;
        }
    }

    /**
     * @param  string|null  $sort
     */
    public function setSort(?string $sort): void
    {
        if (in_array($sort, ['asc', 'desc'])) {
            $this->sort = $sort;
        }
    }
}
