<?php
    /**
     * This method is to convert an object into an array
     */
    function getObjectAsArray($row)
    {
        //var_dump($row);
        return get_object_vars($row);
    }

    /**
     * This method is to fetch the keys of an array return the same as an another array
     */
    function getColumnsArray($row_array)
    {
        //var_dump($row_array);
        return array_keys($row_array);
    }

    /**
     * This method is to return singular form of a plural name.
     * For Ex: countries => contry
     *         teams     => team
     *         league    => league
     */
    function get_singular_name($name)
    {
        if(str_ends_with($name, 'ies'))
        {
            $name = substr($name, 0, strlen($name) - 3). 'y';
        }
        else if(str_ends_with($name, 's'))
        {
            $name = substr($name, 0, strlen($name) - 1);
        }

        return $name;
    }

    /**
     * This method is to convert underscore separated names into simple readable names
     * This also remove suffixed _id from the name.
     */
    function get_column_name($id_column, $column)
    {
        $column = strtolower($column);
        //var_dump($id_column . " : " . $column);
        $column_name = $column;
        if($id_column == $column)
        {
            $column_name = 'Id';
        }
        else if(str_ends_with($column, '_id'))
        {
            $column_name = explode('_', $column)[0];
        }

        $column_name = ucfirst($column_name);
        return $column_name;
    }
?>