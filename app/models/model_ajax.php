<?php

defined('CP') || exit('CarPrices: access denied.');

class Model_ajax extends Model
{
    /**
     * @param $str
     * @return mixed
     */
    public function searchModel($str)
    {
        $str = trim(core::database()->escape($str));

        $query = "SELECT * FROM " . core::database()->getTableName('cars') . " WHERE name LIKE '" . $str . "'";
        $result = core::database()->querySQL($query);

        if (core::database()->getRecordCount($result) > 0) {
            $row = core::database()->getRow($result);
            $query = "SELECT * FROM " . core::database()->getTableName('model') . " WHERE car_id=" . $row['id'];
            $result = core::database()->querySQL($query);
            return core::database()->getColumnArray($result);
        } else {
            $query = "SELECT * FROM " . core::database()->getTableName('model') . " WHERE name LIKE '" . $str . "%'";
            $result = core::database()->querySQL($query);
            return core::database()->getColumnArray($result);
        }
    }
}