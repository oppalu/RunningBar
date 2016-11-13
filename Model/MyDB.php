<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * 封装数据库基本方法
 * Date: 2016/11/5
 * Time: 15:04
 */

class MyDB {
    private static $DB;

    static function initialize() {
        try {
            if(self::$DB == null) {
                self::$DB = new PDO("sqlite:runningbar.db");
                self::$DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }
            return self::$DB;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $tableName
     * @param $columns
     * @param array $params
     * 参数列表说明:
     * where:使用array(key=>value)
     * group by
     * having
     * order by
     * limit
     * fetchStyle
     */
    static function select($tablename, $columns, $parameters = array()) {
        $where = null;

        if(isset($parameters['where'])) {
            $where_arr = array();
            //array_map()函数将用户自定义函数作用到数组中的每个值上，并返回用户自定义函数作用后的带有新值的数组。
            $where_param = implode(' AND ', array_map(
                create_function('$key, $value', 'return $key.\' = :\'.str_replace(".","",$key);'),
                array_keys($parameters['where']), array_values($parameters['where'])
            ));

            foreach ((array)$parameters['where'] as $param=>$value) {
                unset($parameters['where'][$param]);
                $parameters['where'][str_replace('.','',$param)] = $value;
            }

            if($where_param != '')
                $where_arr[] = $where_param;
            if(count($where_arr) > 0)
                $where = ' WHERE '. implode(' AND ',$where_arr);
        } else {
            $parameters['where'] = null;
        }

        $groupby = null;
        if(isset($parameters['groupby']))
            $groupby = ' GROUP BY '. $parameters['groupby'];

        $having = null;
        if(isset($parameters['having']))
            $having = ' HAVING '. $parameters['having'];

        $orderby = null;
        if(isset($parameters['orderby']))
            $orderby = ' ORDER BY '. $parameters['orderby'];

        $limit = null;
        if(isset($parameters['limit']))
            $limit = ' LIMIT '. $parameters['limit'];

        $fetchStyle = PDO::FETCH_ASSOC;
        if(isset($parameters['fetchStyle'])) {
            switch($parameters['fetchStyle']) {
                case 'assoc':			$fetchStyle = PDO::FETCH_ASSOC; 	break;
                case 'num':				$fetchStyle = PDO::FETCH_NUM; 		break;
                case 'singleColumn':	$fetchStyle = PDO::FETCH_COLUMN; 	break;
                default:				$fetchStyle = PDO::FETCH_ASSOC; 	break;
            }
        }

        try {
            $sql = 'SELECT '. implode(',', (array)$columns). ' FROM '. $tablename.
                $where. $groupby. $having. $orderby. $limit;

            $query = self::$DB->prepare($sql);
            $query->execute($parameters['where']);

            $result = $query->fetchAll($fetchStyle);
            return json_encode($result);

        } catch(PDOException $e) {
            return $e->getMessage();
        }
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

            foreach ((array)$where as $key=>$value) {
                $where[$key] = self::$DB->quote($value);
            }
            $where_arr = implode(' AND ', array_map(
                create_function('$key,$value','return $key.\' = \'.$value;'),
                array_keys((array)$where), array_values((array)$where)
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