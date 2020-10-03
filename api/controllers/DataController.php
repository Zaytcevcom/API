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
    const MAX_COUNT = 1000;

    /* *** Emoji *************************************************** */

    /**
     * Get all emoji
     * @param array|null $ids
     * @param string|null $search
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getEmoji(array $ids = [], string $search = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, self::MAX_COUNT);
        $offset = $this->checkOffset($offset);

        $query = DataEmoji::select(DataEmoji::getAvailableFields());

        if (!empty($ids)) {
            $query->whereIn('id', $ids);
        }

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
     * @param array|null $ids
     * @param string|null $search
     * @param int|null $need_all
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getCountries(array $ids = [], string $search = null, int $need_all = 1, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, self::MAX_COUNT);
        $offset = $this->checkOffset($offset);

        $query = DataCountry::select(DataCountry::getAvailableFields());

        if (!empty($ids)) {
            $query->whereIn('id', $ids);
        }

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

    /* *** Regions ************************************************* */

    /**
     * Get all regions
     * @param array|null $ids
     * @param string|null $search
     * @param int|null $id_country
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getRegions(array $ids = [], string $search = null, int $id_country = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, self::MAX_COUNT);
        $offset = $this->checkOffset($offset);

        $query = DataRegion::select(DataRegion::getAvailableFields());

        if (!empty($ids)) {
            $query->whereIn('id', $ids);
        }

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

    /* *** Cities ************************************************** */

    /**
     * Get all cities
     * @param array|null $ids
     * @param string|null $search
     * @param int|null $id_country
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getCities(array $ids = [], string $search = null, int $id_country = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, self::MAX_COUNT);
        $offset = $this->checkOffset($offset);

        $query = DataCity::select(DataCity::getAvailableFields());

        if (!empty($ids)) {
            $query->whereIn('id', $ids);
        }

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

    /* *** Universities ******************************************** */

    /**
     * Get all universities
     * @param array|null $ids
     * @param string|null $search
     * @param int|null $id_city
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getUniversities(array $ids = [], string $search = null, int $id_city = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, self::MAX_COUNT);
        $offset = $this->checkOffset($offset);

        $query = DataUniversity::select(DataUniversity::getAvailableFields());

        if (!empty($ids)) {
            $query->whereIn('id', $ids);
        }

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

    /* *** Faculties *********************************************** */

    /**
     * Get all faculties
     * @param array|null $ids
     * @param string|null $search
     * @param int|null $id_university
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getFaculties(array $ids = [], string $search = null, int $id_university = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, self::MAX_COUNT);
        $offset = $this->checkOffset($offset);

        $query = DataFaculty::select(DataFaculty::getAvailableFields());

        if (!empty($ids)) {
            $query->whereIn('id', $ids);
        }

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

    /* *** Chairs ************************************************** */

    /**
     * Get all chairs
     * @param array|null $ids
     * @param string|null $search
     * @param int|null $id_faculty
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getChairs(array $ids = [], string $search = null, int $id_faculty = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, self::MAX_COUNT);
        $offset = $this->checkOffset($offset);

        $query = DataChair::select(DataChair::getAvailableFields());

        if (!empty($ids)) {
            $query->whereIn('id', $ids);
        }

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

    /* *** Schools ************************************************* */

    /**
     * Get all schools
     * @param array|null $ids
     * @param string|null $search
     * @param int|null $id_city
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getSchools(array $ids = [], string $search = null, int $id_city = null, int $count = null, int $offset = null) : array
    {
        $count  = $this->checkCount($count, self::MAX_COUNT);
        $offset = $this->checkOffset($offset);

        $query = DataSchool::select(DataSchool::getAvailableFields());

        if (!empty($ids)) {
            $query->whereIn('id', $ids);
        }

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
}