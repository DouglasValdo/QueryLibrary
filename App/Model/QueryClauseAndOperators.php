<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 01-01-2018
 * Time: 16:32
 */

namespace Model\QueryClauseAndOperators;


class QueryClauseAndOperators
{
    const AND = "and";
    const OR = "or";
    const NOT = "not";
    const ASC = "asc";
    const DESC = "desc";

    public static function like(string $field, string $value)
    {
        return $field." like ".$value." ";
    }

    public static function where(string $whereStatement)
    {
        return "where ".$whereStatement;
    }

    public static function  orderBy($order, string $query)
    {
        return $query." ORDER BY ".$order;
    }
}