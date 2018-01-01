<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 01-01-2018
 * Time: 16:05
 */

namespace Model\SelectQuery;

require_once "../Model/QueryClauseAndOperators.php";

use Model\QueryClauseAndOperators\QueryClauseAndOperators as ClauseAndOperators;
use Model\QueryClauseAndOperators\QueryClauseAndOperators;

class SelectQuery
{
    private $tableName;
    private $fields;
    private $clause;

    public function __construct(string $tableName, $fields, $clause)
    {
        $this->tableName = $tableName;
        $this->fields = $this->getFieldsDataType($fields);
        $this->clause = $clause;
    }

    private function getFieldsDataType($fields)
    {
        $fieldValue = null;
        $lastItem = 0;

        if (is_array($fields)) {
           foreach ($fields as $field) {
               if($lastItem === count($fields)-1)
                   $fieldValue .=$field;
               else
                   $fieldValue .=$field.", ";

               $lastItem++;
           }
        }else
            $fieldValue .=$fields;

        return $fieldValue;
    }

    public function query()
    {
        return "SELECT ".$this->fields." FROM ".$this->tableName." ".$this->clause.";";
    }

}

$val = "*";

$test = new SelectQuery("users", $val,
    QueryClauseAndOperators::where(ClauseAndOperators::like("name", "%carla")));

echo $test->query();
