<?php

defined('CP') || exit('CarPrices: access denied.');

class Model_index extends Model
{
    /**
     * @return mixed
     */
    public function getModels($search)
    {
        if ($search) {
            $_search = core::database()->escape($search);

            $temp = strtok($_search, " ");
            $temp = "%" . $temp . "%";
            $logstr = "or";
            $tmpl = null;
            $is_query = null;

            while ($temp) {
                if ($is_query)
                    $tmpl .= " $logstr (c.name LIKE '" . $temp . "' OR m.name LIKE '" . $temp . "') ";
                else
                    $tmpl .= "(c.name LIKE '" . $temp . "' OR m.name LIKE '" . $temp . "') ";

                $is_query = true;
                $temp = strtok(" ");
            }

            $query = "SELECT *, c.name AS car, m.name AS model, m.id AS model_id FROM " . core::database()->getTableName('model') . " m
                    LEFT JOIN " . core::database()->getTableName('cars') . " c ON c.id=m.car_id
                    WHERE " . $tmpl . "
                    ORDER BY c.name";

        } else {
            $query = "SELECT *, c.name AS car, m.name AS model, m.id AS model_id FROM " . core::database()->getTableName('model') . " m
                    LEFT JOIN " . core::database()->getTableName('cars') . " c ON c.id=m.car_id
                    ORDER BY c.name";
        }

        $result = core::database()->querySQL($query);
        return core::database()->getColumnArray($result);
    }

    /**
     * @param $city
     * @return mixed
     */
    public function getShops($city)
    {
        $query = "SELECT * FROM " . core::database()->getTableName('shops') . " WHERE city=" . $city;
        $result = core::database()->querySQL($query);
        return core::database()->getColumnArray($result);
    }

    /**
     * @param $shop_id
     * @param $model_id
     * @return mixed
     */
    public function getPriceInfo($shop_id,$model_id)
    {
        if (is_numeric($shop_id) && is_numeric($model_id)) {
            $query = "SELECT * FROM " . core::database()->getTableName('price') . " WHERE shop_id=" . $shop_id . " AND model_id=" . $model_id;
            $result = core::database()->querySQL($query);
            return core::database()->getRow($result);
        }
    }
}