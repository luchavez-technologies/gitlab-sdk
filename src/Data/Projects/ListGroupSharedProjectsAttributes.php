<?php

namespace Luchavez\GitlabSdk\Data\Projects;

use Luchavez\GitlabSdk\Traits\Attributes\OffSetBasedPaginationTrait;
use Luchavez\StarterKit\Abstracts\BaseJsonSerializable;

/**
 * Class ListGroupSharedProjectsAttributes
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/groups.html#list-a-groups-shared-projects
 */
class ListGroupSharedProjectsAttributes extends BaseJsonSerializable
{
    use OffSetBasedPaginationTrait;

    /**
     * Limit by archived status.
     *
     * @var bool|null
     */
    public bool|null $archived;

    /**
     * Limit by visibility public, internal, or private.
     *
     * @var string|null
     */
    public string|null $visibility;

    /**
     * Return projects ordered by id, name, path, created_at, updated_at, similarity (1), or last_activity_at fields.
     * Default is created_at.
     *
     * @var string
     */
    public string $order_by = 'created_at';

    /**
     * Return projects sorted in asc or desc order.
     * Default is desc.
     *
     * @var string
     */
    public string $sort = 'desc';

    /**
     * Return list of authorized projects matching the search criteria.
     *
     * @var string|null
     */
    public string|null $search;

    /**
     * Return only limited fields for each project.
     * This is a no-op without authentication where only simple fields are returned.
     *
     * @var bool|null
     */
    public bool|null $simple;

    /**
     * Limit by projects starred by the current user.
     *
     * @var bool|null
     */
    public bool|null $starred;

    /**
     * Limit by projects with issues feature enabled.
     * Default is false.
     *
     * @var bool
     */
    public bool $with_issues_enabled = false;

    /**
     * Limit by projects with merge requests feature enabled.
     * Default is false.
     *
     * @var bool
     */
    public bool $with_merge_requests_enabled = false;

    /**
     * Limit to projects where current user has at least this access level
     *
     * @link https://docs.gitlab.com/ee/api/members.html#valid-access-levels (Valid access levels)
     *
     * @var int|null
     */
    public int|null $min_access_level = null;

    /**
     * Include custom attributes in response (administrators only).
     *
     * @var bool|null
     */
    public bool|null $with_custom_attributes = null;
}
