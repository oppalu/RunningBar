<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/5
 * Time: 15:04
 */
class MyDB {
    private static $DB;
    private static $rowNumber;
    //private static $queryCount;

    static function initialize() {
        try {
            if(self::$DB == null)
                self::$DB = new PDO(DB_TYPE. ':'. DB_NAME);

            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    static function select($tableName, $columns, $parameters = array()) {

    }

    static function countNum() {
        return (int)self::$rowNumber;
    }

    static function insert($tablename, $data) {
        try {
            $query = self::$DB->prepare('INSERT INTO '. $tablename. ' ('. self::implode_key(',', $data ).
                ') VALUES (:'. self::implode_key(',:', $data). ')');

            return $query->execute($data);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    static function delete($tablename, $where) {
        try {
            foreach ($where as $key=>$value) {
                $where[$key] = self::$DB->quote($value);
            }

            //array_map()函数将用户自定义函数作用到数组中的每个值上，并返回用户自定义函数作用后的带有新值的数组。
            $where_arr = implode(' AND ', array_map(
                create_function('$key,$value','return $key.\' = \'.$value;'),
                array_keys($where), array_values($where)
            ));

            $query = 'DELETE FROM '. $tablename. ' WHERE '. $where_arr;
            return self::$DB->exec($query);

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    static function update($tablename, $data, $where) {
        try {
            $sql = 'UPDATE '. $tablename. ' SET ';

            foreach( (array)$data as $key=>$value )
                $sql .= $key . ' = :' . $key . ',';
            $sql = substr_replace($sql,'',-1);

            foreach ($where as $key=>$value) {
                $where[$key] = self::$DB->quote($value);
            }
            $where_arr = implode(' AND ', array_map(
                create_function('$key,$value','return $key.\' = \'.$value;'),
                array_keys($where), array_values($where)
            ));
            $sql .= ' WHERE '. $where_arr;

            $query = self::$DB->prepare($sql);
            return $query->execute($data);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    private static function implode_key($glue = '',$arr = array()) {
        $arrK = array_keys($arr);
        return implode($glue,$arrK);
    }

}