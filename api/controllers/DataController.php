<?php

declare(strict_types=1);

namespace api\controllers;

use api\models\data\DataChair;
use api\models\data\DataCity;
use api\models\data\DataCountry;
use api\models\data\DataEmoji;
use api\models\data\DataFaculty;
use api\models\data\DataRegion;
use api\models\data\DataSchool;
use api\models\data\DataUniversity;

/**
 * DataController
 */
class DataController extends MainController
{   
    /* *** Emoji *************************************************** */

    /**
     * Get all emoji
     * @param string|null $search
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getEmoji(string $search = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, 5000);
        $offset = $this->checkOffset($offset);

        $query = DataEmoji::select(DataEmoji::getAvailableFields());

        if (!is_null($search)) {
            $query->where('name', 'like', $search . '%');
        }

        return [
            'count' => $query->count(),
            'items' => $query->take($count)->skip($offset)->get()->toArray()
        ];
    }

    /* *** Countries *********************************************** */

    /**
     * Get all countries
     * @param string|null $search
     * @param int|null $need_all
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getCountries(string $search = null, int $need_all = 1, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, 5000);
        $offset = $this->checkOffset($offset);

        $query = DataCountry::select(DataCountry::getAvailableFields());

        if (!is_null($search)) {
            $query->where('name', 'like', $search . '%');
        }
        
        // Need all countries
        if ($need_all == 0) {
            $query->where('is_ignore', 0);   
        }

        return [
            'count' => $query->count(),
            'items' => $query->take($count)->skip($offset)->get()->toArray()
        ];
    }

    /**
     * Get countries by id
     * @param array $ids
     * @return array
     */
    public function getCountriesById(array $ids) : array
    {
        $query = DataCountry::select(DataCountry::getAvailableFields())
            ->whereIn('id', $ids);

        return [
            'count' => $query->count(),
            'items' => $query->get()->toArray()
        ];
    }

    /* *** Regions ************************************************* */

    /**
     * Get all regions
     * @param string|null $search
     * @param int|null $id_country
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getRegions(string $search = null, int $id_country = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, 5000);
        $offset = $this->checkOffset($offset);

        $query = DataRegion::select(DataRegion::getAvailableFields());

        if (!is_null($search)) {
            $query->where('name', 'like', $search . '%');
        }

        if (!is_null($id_country)) {
            $query->where('id_country', $id_country);
        }

        return [
            'count' => $query->count(),
            'items' => $query->take($count)->skip($offset)->get()->toArray()
        ];
    }

    /**
     * Get regions by id
     * @param array $ids
     * @return array
     */
    public function getRegionsById(array $ids) : array
    {
        $query = DataRegion::select(DataRegion::getAvailableFields())
            ->whereIn('id', $ids);

        return [
            'count' => $query->count(),
            'items' => $query->get()->toArray()
        ];
    }

    /* *** Cities ************************************************** */

    /**
     * Get all cities
     * @param string|null $search
     * @param int|null $id_country
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getCities(string $search = null, int $id_country = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, 5000);
        $offset = $this->checkOffset($offset);

        $query = DataCity::select(DataCity::getAvailableFields());

        if (!is_null($search)) {
            $query->where('name', 'like', $search . '%');
        }

        if (!is_null($id_country)) {
            $query->where('id_country', $id_country);
        }

        return [
            'count' => $query->count(),
            'items' => $query->take($count)->skip($offset)->get()->toArray()
        ];
    }

    /**
     * Get cities by id
     * @param array $ids
     * @return array
     */
    public function getCitiesById(array $ids) : array
    {
        $query = DataCity::select(DataCity::getAvailableFields())
            ->whereIn('id', $ids);

        return [
            'count' => $query->count(),
            'items' => $query->get()->toArray()
        ];
    }

    /* *** Universities ******************************************** */

    /**
     * Get all universities
     * @param string|null $search
     * @param int|null $id_city
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getUniversities(string $search = null, int $id_city = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, 5000);
        $offset = $this->checkOffset($offset);

        $query = DataUniversity::select(DataUniversity::getAvailableFields());

        if (!is_null($search)) {
            $query->where('name', 'like', $search . '%');
        }

        if (!is_null($id_city)) {
            $query->where('id_city', $id_city);
        }

        return [
            'count' => $query->count(),
            'items' => $query->take($count)->skip($offset)->get()->toArray()
        ];
    }

    /**
     * Get universities by id
     * @param array $ids
     * @return array
     */
    public function getUniversitiesById(array $ids) : array
    {
        $query = DataUniversity::select(DataUniversity::getAvailableFields())
            ->whereIn('id', $ids);

        return [
            'count' => $query->count(),
            'items' => $query->get()->toArray()
        ];
    }

    /* *** Faculties *********************************************** */

    /**
     * Get all faculties
     * @param string|null $search
     * @param int|null $id_university
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getFaculties(string $search = null, int $id_university = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, 5000);
        $offset = $this->checkOffset($offset);

        $query = DataFaculty::select(DataFaculty::getAvailableFields());

        if (!is_null($search)) {
            $query->where('name', 'like', $search . '%');
        }

        if (!is_null($id_university)) {
            $query->where('id_university', $id_university);
        }

        return [
            'count' => $query->count(),
            'items' => $query->take($count)->skip($offset)->get()->toArray()
        ];
    }

    /**
     * Get faculties by id
     * @param array $ids
     * @return array
     */
    public function getFacultiesById(array $ids) : array
    {
        $query = DataFaculty::select(DataFaculty::getAvailableFields())
            ->whereIn('id', $ids);

        return [
            'count' => $query->count(),
            'items' => $query->get()->toArray()
        ];
    }

    /* *** Chairs ************************************************** */

    /**
     * Get all chairs
     * @param string|null $search
     * @param int|null $id_faculty
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getChairs(string $search = null, int $id_faculty = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, 5000);
        $offset = $this->checkOffset($offset);

        $query = DataChair::select(DataChair::getAvailableFields());

        if (!is_null($search)) {
            $query->where('name', 'like', $search . '%');
        }

        if (!is_null($id_faculty)) {
            $query->where('id_faculty', $id_faculty);
        }

        return [
            'count' => $query->count(),
            'items' => $query->take($count)->skip($offset)->get()->toArray()
        ];
    }

    /**
     * Get chairs by id
     * @param array $ids
     * @return array
     */
    public function getChairsById(array $ids) : array
    {
        $query = DataChair::select(DataChair::getAvailableFields())
            ->whereIn('id', $ids);

        return [
            'count' => $query->count(),
            'items' => $query->get()->toArray()
        ];
    }

    /* *** Schools ************************************************* */

    /**
     * Get all schools
     * @param string|null $search
     * @param int|null $id_city
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getSchools(string $search = null, int $id_city = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, 5000);
        $offset = $this->checkOffset($offset);

        $query = DataSchool::select(DataSchool::getAvailableFields());

        if (!is_null($search)) {
            $query->where('name', 'like', $search . '%');
        }

        if (!is_null($id_city)) {
            $query->where('id_city', $id_city);
        }

        return [
            'count' => $query->count(),
            'items' => $query->take($count)->skip($offset)->get()->toArray()
        ];
    }

    /**
     * Get schools by id
     * @param array $ids
     * @return array
     */
    public function getSchoolsById(array $ids) : array
    {
        $query = DataSchool::select(DataSchool::getAvailableFields())
            ->whereIn('id', $ids);

        return [
            'count' => $query->count(),
            'items' => $query->get()->toArray()
        ];
    }
}