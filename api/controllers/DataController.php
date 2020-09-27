<?php

declare(strict_types=1);

namespace api\controllers;

use api\models\data\DataChair;
use api\models\data\DataCity;
use api\models\data\DataCountry;
use api\models\data\DataEmoji;
use api\models\data\DataFaculti;
use api\models\data\DataRegion;
use api\models\data\DataSchool;
use api\models\data\DataUniversity;

/**
 * DataController
 */
class DataController extends MainController
{   
    /**
     * Get all countries
     * 
     * @param string|null $search
     * @param int|null $need_all
     * @param int|null $count
     * @param int|null $offset
     * 
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
     * Get all cities
     * 
     * @param string|null $search
     * @param int|null $id_country
     * @param int|null $count
     * @param int|null $offset
     * 
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
}