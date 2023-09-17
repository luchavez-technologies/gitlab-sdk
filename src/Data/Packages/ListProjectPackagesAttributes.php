<?php

namespace Luchavez\GitlabSdk\Data\Packages;

use Luchavez\GitlabSdk\Traits\Attributes\OffSetBasedPaginationTrait;
use Luchavez\StarterKit\Abstracts\BaseJsonSerializable;

/**
 * Class ListProjectPackagesAttributes
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/packages.html#within-a-project
 */
class ListProjectPackagesAttributes extends BaseJsonSerializable
{
    use OffSetBasedPaginationTrait;

    /**
     * The field to use as order.
     * One of created_at (default), name, version, type, or project_path.
     *
     * @var string
     */
    public string $order_by = 'created_at';

    /**
     * The direction of the order, either asc (default) for ascending order or desc for descending order.
     *
     * @var string
     */
    public string $sort = 'asc';

    /**
     * Filter the returned packages by type.
     * One of conan, maven, npm, pypi, composer, nuget, helm, or golang.
     * (Introduced in GitLab 12.9)
     *
     * @var string|null
     */
    public ?string $package_type;

    /**
     * Filter the project packages with a fuzzy search by name.
     * (Introduced in GitLab 13.0)
     *
     * @var string|null
     */
    public ?string $package_name;

    /**
     * When set to true, versionless packages are included in the response.
     * (Introduced in GitLab 13.8)
     *
     * @var bool|null
     */
    public ?bool $include_versionless;

    /**
     * Filter the returned packages by status.
     * One of default (default), hidden, processing, error, or pending_destruction.
     * (Introduced in GitLab 13.9)
     *
     * @var string
     */
    public string $status = 'default';

    /**
     * @param  string  $order_by
     */
    public function setOrderBy(string $order_by): void
    {
        if (in_array($order_by, ['created_at', 'name', 'version', 'type',  'project_path'])) {
            $this->order_by = $order_by;
        }
    }

    /**
     * @param  string  $sort
     */
    public function setSort(string $sort): void
    {
        if (in_array($sort, ['asc', 'desc'])) {
            $this->sort = $sort;
        }
    }

    /**
     * @param  string|null  $package_type
     */
    public function setPackageType(?string $package_type): void
    {
        if (in_array($package_type, ['conan', 'maven', 'npm', 'pypi', 'composer', 'nuget', 'helm', 'golang'])) {
            $this->package_type = $package_type;
        }
    }

    /**
     * @param  string  $status
     */
    public function setStatus(string $status): void
    {
        if (in_array($status, ['default', 'hidden', 'processing', 'error', 'pending_destruction'])) {
            $this->status = $status;
        }
    }
}
