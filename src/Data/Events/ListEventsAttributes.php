<?php

namespace Luchavez\GitlabSdk\Data\Events;

/**
 * Class ListEventsAttributes
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/events.html#list-currently-authenticated-users-events
 */
class ListEventsAttributes extends ListUserContributionEventsAttributes
{
    /**
     * Include all events across a user’s projects.
     *
     * @var string|null
     */
    public string|null $scope = null;
}
