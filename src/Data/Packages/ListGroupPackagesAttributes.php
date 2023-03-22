<?php

namespace Luchavez\GitlabSdk\Data\Packages;

/**
 * Class ListPackagesAttributes
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/packages.html#within-a-group
 */
class ListGroupPackagesAttributes extends ListProjectPackagesAttributes
{
    /**
     * If the parameter is included as true, packages from projects from subgroups are not listed.
     * Default is false.
     *
     * @var bool
     */
    public bool $exclude_subgroups = false;
}
