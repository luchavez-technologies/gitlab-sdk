<?php

namespace Luchavez\GitlabSdk\Data\Groups;

/**
 * Class ListGroupsAttributes
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/groups.html#list-groups
 */
class ListGroupsAttributes extends ListSubgroupsAttributes
{
    /**
     * Limit to top level groups, excluding all subgroups
     *
     * @var bool|null
     */
    public bool|null $top_level_only;
}
