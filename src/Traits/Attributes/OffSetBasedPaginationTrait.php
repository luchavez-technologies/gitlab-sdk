<?php

namespace Luchavez\GitlabSdk\Traits\Attributes;

/**
 * Trait OffSetBasedPaginationTrait
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
trait OffSetBasedPaginationTrait
{
    /**
     * Page number (default: 1).
     *
     * @var int
     */
    public int $page = 1;

    /**
     * Number of items to list per page (default: 20, max: 100).
     *
     * @var int
     */
    public int $per_page = 20;
}
