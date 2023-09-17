<?php

namespace Luchavez\GitlabSdk\Resources\Projects;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Luchavez\ApiSdkKit\Services\SimpleHttp;
use Luchavez\GitlabSdk\Data\Members\ListMembersAttributes;
use Luchavez\GitlabSdk\Data\Packages\ListProjectPackageFilesAttributes;
use Luchavez\GitlabSdk\Data\Packages\ListProjectPackagesAttributes;
use Luchavez\GitlabSdk\Resources\BaseResource;

/**
 * Class Project
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @link https://docs.gitlab.com/ee/api/projects.html
 */
class Project extends BaseResource
{
    /**
     * @param  SimpleHttp  $simple_http
     * @param  int  $id
     */
    public function __construct(protected SimpleHttp $simple_http, protected int $id)
    {
        parent::__construct($simple_http);
    }

    /**
     * @return Collection|Response|null
     *
     * @link https://docs.gitlab.com/ee/api/projects.html#get-single-project
     */
    public function get(): Collection|Response|null
    {
        return $this->parseResponse($this->getSimpleHttp()->get("projects/$this->id"));
    }

    /**
     * @param  ListProjectPackagesAttributes|array  $attributes
     * @param  bool  $recursive
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/packages.html#within-a-project
     */
    public function packages(ListProjectPackagesAttributes|array $attributes = [], bool $recursive = false): Response|Collection|null
    {
        $attributes = ListProjectPackagesAttributes::from($attributes);

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

        return $this->parseResponse($this->getSimpleHttp()->data($attributes)->get("projects/$this->id/packages"));
    }

    /**
     * @param  int  $package_id
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/packages.html#get-a-project-package
     */
    public function package(int $package_id): Response|Collection|null
    {
        return $this->parseResponse($this->getSimpleHttp()->get("projects/$this->id/packages/$package_id"));
    }

    /**
     * @param  int  $package_id
     * @return bool
     *
     * @link https://docs.gitlab.com/ee/api/packages.html#delete-a-project-package
     */
    public function deletePackage(int $package_id): bool
    {
        return $this->getSimpleHttp()->delete("projects/$this->id/packages/$package_id")->successful();
    }

    /**
     * @param  int  $package_id
     * @param  ListProjectPackageFilesAttributes|array  $attributes
     * @param  bool  $recursive
     * @return Response|Collection|null
     *
     * @link https://docs.gitlab.com/ee/api/packages.html#list-package-files
     */
    public function packageFiles(int $package_id, ListProjectPackageFilesAttributes|array $attributes = [], bool $recursive = false): Response|Collection|null
    {
        $attributes = ListProjectPackageFilesAttributes::from($attributes);

        if ($recursive) {
            $this->asCollection();
            $result = collect();

            do {
                $data = $this->packageFiles($package_id, $attributes);
                $attributes->page++; // increment page number
                $result = $result->merge($data);
            } while ($data->count());

            return $result;
        }

        return $this->parseResponse($this->getSimpleHttp()->get("projects/$this->id/packages/$package_id/package_files"));
    }

    /**
     * @param  int  $package_id
     * @param  int  $package_file_id
     * @return bool
     *
     * @link https://docs.gitlab.com/ee/api/packages.html#delete-a-package-file
     */
    public function deletePackageFile(int $package_id, int $package_file_id): bool
    {
        return $this->getSimpleHttp()
            ->delete("projects/$this->id/packages/$package_id/package_files/$package_file_id")
            ->successful();
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

        return $this->parseResponse($this->getSimpleHttp()->data($attributes)->get("projects/$this->id/members"));
    }
}
