<?php

namespace Luchavez\GitlabSdk\Data\Packages;

use Luchavez\GitlabSdk\Traits\Attributes\OffSetBasedPaginationTrait;
use Luchavez\StarterKit\Abstracts\BaseJsonSerializable;

/**
 * Class ListProjectPackageFilesAttributes
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/packages.html#list-package-files
 */
class ListProjectPackageFilesAttributes extends BaseJsonSerializable
{
    use OffSetBasedPaginationTrait;
}
