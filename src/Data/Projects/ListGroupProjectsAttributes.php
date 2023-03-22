<?php

namespace Luchavez\GitlabSdk\Data\Projects;

/**
 * Class ListGroupProjectsAttributes
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/groups.html#list-a-groups-projects
 */
class ListGroupProjectsAttributes extends ListGroupSharedProjectsAttributes
{
    /**
     * Limit by projects owned by the current user.
     *
     * @var bool|null
     */
    public bool|null $owned;

    /**
     * Include projects shared to this group.
     * Default is true.
     *
     * @var bool
     */
    public bool $with_shared = true;

    /**
     * Include projects in subgroups of this group.
     * Default is false.
     *
     * @var bool
     */
    public bool $include_subgroups = false;

    /**
     * Return only projects that have security reports artifacts present in any of their builds.
     * This means “projects with security reports enabled”.
     * Default is false.
     *
     * @var bool
     */
    public bool $with_security_reports = false;
}
