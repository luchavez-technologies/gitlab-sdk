<?php

namespace Luchavez\GitlabSdk\Data\Projects;

use Luchavez\GitlabSdk\Abstracts\BaseGitlabData;
use Luchavez\GitlabSdk\Traits\Attributes\OffSetBasedPaginationTrait;
use Illuminate\Support\Carbon;

/**
 * Class ListProjectsAttributes
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/projects.html#list-all-projects
 */
class ListProjectsAttributes extends BaseGitlabData
{
    use OffSetBasedPaginationTrait;

    /**
     * Limit by archived status.
     *
     * @var bool|null
     */
    public bool|null $archived = null;

    /**
     * Limit results to projects with IDs greater than the specified ID.
     *
     * @var int|null
     */
    public int|null $id_after = null;

    /**
     * 	Limit results to projects with IDs less than the specified ID.
     *
     * @var int|null
     */
    public int|null $id_before = null;

    /**
     *  No	Limit results to projects which were imported from external systems by current user.
     *
     * @var bool|null
     */
    public bool|null $imported = null;

    /**
     * Limit results to projects with last_activity after specified time. Format: ISO 8601 (YYYY-MM-DDTHH:MM:SSZ).
     *
     * @var string|null
     */
    public string|null $last_activity_after = null;

    /**
     * Limit results to projects with last_activity before specified time. Format: ISO 8601 (YYYY-MM-DDTHH:MM:SSZ).
     *
     * @var string|null
     */
    public string|null $last_activity_before = null;

    /**
     * Limit by projects that the current user is a member of.
     *
     * @var bool|null
     */
    public bool|null $membership = null;

    /**
     * Limit by current user minimal access level.
     *
     * @var int|null
     *
     * @link https://docs.gitlab.com/ee/api/members.html#valid-access-levels
     */
    public int|null $min_access_level = null;

    /**
     * Return projects ordered by id, name, path, created_at, updated_at, last_activity_at, or similarity fields.
     * repository_size, storage_size, packages_size or wiki_size fields are only allowed for administrators.
     * similarity (introduced in GitLab 14.1) is only available when searching and is limited to projects that the current user is a member of.
     * Default is created_at.
     *
     * @var string
     */
    public string $order_by = 'created_at';

    /**
     * Limit by projects explicitly owned by the current user.
     *
     * @var bool|null
     */
    public bool|null $owned = null;

    /**
     * Limit projects where the repository checksum calculation has failed.
     *
     * @var bool|null
     */
    public bool|null $repository_checksum_failed = null;

    /**
     * Limit results to projects stored on repository_storage. (administrators only)
     *
     * @var string|null
     */
    public string|null $repository_storage = null;

    /**
     * Include ancestor namespaces when matching search criteria.
     * Default is false.
     *
     * @var bool
     */
    public bool $search_namespaces = false;

    /**
     * Return list of projects matching the search criteria.
     *
     * @var string|null
     */
    public string|null $search = null;

    /**
     * Return only limited fields for each project.
     * This is a no-op without authentication where only simple fields are returned.
     *
     * @var bool|null
     */
    public bool|null $simple = null;

    /**
     * Return projects sorted in asc or desc order.
     * Default is desc.
     *
     * @var string
     */
    public string $sort = 'desc';

    /**
     * Limit by projects starred by the current user.
     *
     * @var bool|null
     */
    public bool|null $starred = null;

    /**
     * Include project statistics.
     * Only available to Reporter or higher level role members.
     *
     * @var bool|null
     */
    public bool|null $statistics = null;

    /**
     * Comma-separated topic names. Limit results to projects that match all of given topics. See topics attribute.
     *
     * @var string|null
     */
    public string|null $topic = null;

    /**
     * Limit results to projects with the assigned topic given by the topic ID.
     *
     * @var int|null
     */
    public int|null $topic_id = null;

    /**
     * Limit by visibility public, internal, or private.
     *
     * @var string|null
     */
    public string|null $visibility = null;

    /**
     * Limit projects where the wiki checksum calculation has failed.
     *
     * @var bool|null
     */
    public bool|null $wiki_checksum_failed = null;

    /**
     * Include custom attributes in response. (administrator only)
     *
     * @var bool|null
     *
     * @link https://docs.gitlab.com/ee/api/custom_attributes.html
     */
    public bool|null $with_custom_attributes = null;

    /**
     * 	Limit by enabled issues feature.
     *
     * @var bool|null
     */
    public bool|null $with_issues_enabled = null;

    /**
     * Limit by enabled merge requests feature.
     *
     * @var bool|null
     */
    public bool|null $with_merge_requests_enabled = null;

    /**
     * Limit by projects which use the given programming language.
     *
     * @var string|null
     */
    public string|null $with_programming_language = null;

    /**
     * @param  Carbon|string|null  $last_activity_after
     */
    public function setLastActivityAfter(Carbon|string $last_activity_after = null): void
    {
        $this->last_activity_after = $this->getDateString($last_activity_after);
    }

    /**
     * @param  Carbon|string|null  $last_activity_before
     */
    public function setLastActivityBefore(Carbon|string $last_activity_before = null): void
    {
        $this->last_activity_before = $this->getDateString($last_activity_before);
    }
}
