<?php

namespace Luchavez\GitlabSdk\Data\Events;

use Luchavez\GitlabSdk\Abstracts\BaseGitlabData;
use Luchavez\GitlabSdk\Traits\Attributes\OffSetBasedPaginationTrait;
use Illuminate\Support\Carbon;

/**
 * Class ListUserContributionEventsAttributes
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/events.html#list-currently-authenticated-users-events
 */
class ListUserContributionEventsAttributes extends BaseGitlabData
{
    use OffSetBasedPaginationTrait;

    /**
     * Include only events of a particular action type.
     *
     * @link https://docs.gitlab.com/ee/api/events.html#actions
     * @link https://docs.gitlab.com/ee/user/profile/contributions_calendar.html#user-contribution-events
     *
     * @var string|null
     */
    public string|null $action = null;

    /**
     * Include only events of a particular target type.
     *
     * @link https://docs.gitlab.com/ee/api/events.html#target-types
     *
     * @var string|null
     */
    public string|null $target_type = null;

    /**
     * Include only events created before a particular date. View how to format dates.
     *
     * @link https://docs.gitlab.com/ee/api/events.html#date-formatting
     *
     * @var string|null
     */
    public string|null $before = null;

    /**
     * Include only events created after a particular date. View how to format dates.
     *
     * @link https://docs.gitlab.com/ee/api/events.html#date-formatting
     *
     * @var string|null
     */
    public string|null $after = null;

    /**
     * Sort events in asc or desc order by created_at. Default is desc.
     *
     * @var string
     */
    public string $sort = 'desc';

    /**
     * @param  string|null  $action
     */
    public function setAction(?string $action): void
    {
        if (in_array($action, [
            'approved',
            'closed',
            'commented',
            'created',
            'destroyed',
            'expired',
            'joined',
            'left',
            'merged',
            'pushed',
            'reopened',
            'updated',
        ])) {
            $this->action = $action;
        }
    }

    /**
     * @param  string|null  $target_type
     */
    public function setTargetType(?string $target_type): void
    {
        if (in_array($target_type, ['issue', 'milestone', 'merge_request', 'note', 'project', 'snippet', 'user'])) {
            $this->target_type = $target_type;
        }
    }

    /**
     * @param  Carbon|string|null  $before
     */
    public function setBefore(Carbon|string $before = null): void
    {
        $this->before = $this->getDateString($before);
    }

    /**
     * @param  Carbon|string|null  $after
     */
    public function setAfter(Carbon|string $after = null): void
    {
        $this->after = $this->getDateString($after);
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
}
