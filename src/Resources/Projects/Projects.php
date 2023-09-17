<?php

namespace Luchavez\GitlabSdk\Resources\Projects;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Luchavez\GitlabSdk\Data\Projects\ListProjectsAttributes;
use Luchavez\GitlabSdk\Resources\BaseResource;

/**
 * Class Projects
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/projects.html
 */
class Projects extends BaseResource
{
    /**
     * @param  ListProjectsAttributes|array  $attributes
     * @param  bool  $recursive
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/projects.html#list-all-projects
     */
    public function all(ListProjectsAttributes|array $attributes = [], bool $recursive = false): Response|Collection|null
    {
        $attributes = ListProjectsAttributes::from($attributes);

        if ($recursive) {
            $this->asCollection();
            $result = collect();

            do {
                $data = $this->all($attributes);
                $attributes->page++; // increment page number
                $result = $result->merge($data);
            } while ($data->count());

            return $result;
        }

        return $this->parseResponse($this->getSimpleHttp()->data($attributes)->executeGet('projects'));
    }
}
