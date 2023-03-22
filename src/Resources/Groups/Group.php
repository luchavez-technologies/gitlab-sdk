<?php

namespace Luchavez\GitlabSdk\Resources\Groups;

use Luchavez\ApiSdkKit\Services\MakeRequest;
use Luchavez\GitlabSdk\Data\Groups\ListSubgroupsAttributes;
use Luchavez\GitlabSdk\Data\Members\ListMembersAttributes;
use Luchavez\GitlabSdk\Data\Packages\ListGroupPackagesAttributes;
use Luchavez\GitlabSdk\Data\Projects\ListGroupProjectsAttributes;
use Luchavez\GitlabSdk\Data\Projects\ListGroupSharedProjectsAttributes;
use Luchavez\GitlabSdk\Resources\BaseResource;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

/**
 * Class Group
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/groups.html
 */
class Group extends BaseResource
{
    /**
     * @param  MakeRequest  $make_request
     * @param  int  $id
     */
    public function __construct(protected MakeRequest $make_request, protected int $id)
    {
        parent::__construct($make_request);
    }

    /**
     * @return Collection|Response|null
     *
     * @link https://docs.gitlab.com/ee/api/groups.html#details-of-a-group
     */
    public function get(): Collection|Response|null
    {
        return $this->parseResponse($this->getMakeRequest()->get("groups/$this->id"));
    }

    /**
     * @return Collection|Response|null
     *
     * @link https://docs.gitlab.com/ee/api/groups.html#details-of-a-group
     */
    public function avatar(): Collection|Response|null
    {
        return $this->parseResponse($this->getMakeRequest()->get("groups/$this->id/avatar"));
    }

    /**
     * @param  ListSubgroupsAttributes|array  $attributes
     * @param  bool  $recursive
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/groups.html#list-a-groups-subgroups
     */
    public function subgroups(ListSubgroupsAttributes|array $attributes = [], bool $recursive = false): Response|Collection|null
    {
        $attributes = ListSubgroupsAttributes::from($attributes);

        if ($recursive) {
            $this->asCollection();
            $result = collect();

            do {
                $data = $this->subgroups($attributes);
                $attributes->page++; // increment page number
                $result = $result->merge($data);
            } while ($data && $data->count());

            return $result;
        }

        return $this->parseResponse($this->getMakeRequest()->data($attributes)->get("groups/$this->id/subgroups"));
    }

    /**
     * @param  ListSubgroupsAttributes|array  $attributes
     * @param  bool  $recursive
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/groups.html#list-a-groups-descendant-groups
     */
    public function descendantGroups(ListSubgroupsAttributes|array $attributes = [], bool $recursive = false): Response|Collection|null
    {
        $attributes = ListSubgroupsAttributes::from($attributes);

        if ($recursive) {
            $this->asCollection();
            $result = collect();

            do {
                $data = $this->descendantGroups($attributes);
                $attributes->page++; // increment page number
                $result = $result->merge($data);
            } while ($data->count());

            return $result;
        }

        return $this->parseResponse($this->getMakeRequest()->data($attributes)->get("groups/$this->id/descendant_groups"));
    }

    /**
     * @param  ListGroupProjectsAttributes|array  $attributes
     * @param  bool  $recursive
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/groups.html#list-a-groups-projects
     */
    public function projects(ListGroupProjectsAttributes|array $attributes = [], bool $recursive = false): Response|Collection|null
    {
        $attributes = ListGroupProjectsAttributes::from($attributes);

        if ($recursive) {
            $this->asCollection();
            $result = collect();

            do {
                $data = $this->projects($attributes);
                $attributes->page++; // increment page number
                $result = $result->merge($data);
            } while ($data->count());

            return $result;
        }

        return $this->parseResponse($this->getMakeRequest()->data($attributes)->get("groups/$this->id/projects"));
    }

    /**
     * @param  ListGroupSharedProjectsAttributes|array  $attributes
     * @param  bool  $recursive
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/groups.html#list-a-groups-shared-projects
     */
    public function sharedProjects(ListGroupSharedProjectsAttributes|array $attributes = [], bool $recursive = false): Response|Collection|null
    {
        $attributes = ListGroupSharedProjectsAttributes::from($attributes);

        if ($recursive) {
            $this->asCollection();
            $result = collect();

            do {
                $data = $this->sharedProjects($attributes);
                $attributes->page++; // increment page number
                $result = $result->merge($data);
            } while ($data->count());

            return $result;
        }

        return $this->parseResponse($this->getMakeRequest()->data($attributes)->get("groups/$this->id/projects/shared"));
    }

    /**
     * @param  ListGroupPackagesAttributes|array  $attributes
     * @param  bool  $recursive
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/packages.html#within-a-group
     */
    public function packages(ListGroupPackagesAttributes|array $attributes = [], bool $recursive = false): Response|Collection|null
    {
        $attributes = ListGroupPackagesAttributes::from($attributes);

        if ($recursive) {
            $this->asCollection();
            $result = collect();

            do {
                $data = $this->packages($attributes);
                $attributes->page++; // increment page number
                $result = $result->merge($data);
            } while ($data->count());

            return $result;
        }

        return $this->parseResponse($this->getMakeRequest()->data($attributes)->get("groups/$this->id/packages"));
    }

    /**
     * @param  ListMembersAttributes|array  $attributes
     * @param  bool  $recursive
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/members.html#list-all-members-of-a-group-or-project
     */
    public function members(ListMembersAttributes|array $attributes = [], bool $recursive = false): Response|Collection|null
    {
        $attributes = ListMembersAttributes::from($attributes);

        if ($recursive) {
            $this->asCollection();
            $result = collect();

            do {
                $data = $this->members($attributes);
                $attributes->page++; // increment page number
                $result = $result->merge($data);
            } while ($data->count());

            return $result;
        }

        return $this->parseResponse($this->getMakeRequest()->data($attributes)->get("groups/$this->id/members"));
    }
}
