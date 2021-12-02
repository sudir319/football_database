<?php
    namespace Ctrl;
    use Mdl\Model;

    class Controller {
        function getDataFromModel($class, $tableName)
        {
            $params = [];
            array_push($params, $tableName);
            $data = $this->callClassMethod($class, 'getAllRecords', $params);
            return $data;
        }
        function performAction($class, $table, $action, $column_arr, $column_values, $whereParam, $whereValue)
        {
            $params = [];
            $data = [];
            
            array_push($data, $table);
            array_push($data, $action);
            array_push($data, $column_arr);
            array_push($data, $column_values);
            array_push($data, $whereParam);
            array_push($data, $whereValue);

            array_push($params, $data);
            //var_dump($data);

            $this->callClassMethod($class, 'alterData', $params);
        }

        function showViewWithData($class, $submenu, $data)
        {
            //var_dump($submenu);
            $dataArr = [];
            $params = [];
            //echo "Data START<br>";
            //var_dump($data);
            //echo "Data END<br>";
            if($submenu)
            {
                array_push($dataArr, $submenu);
            }
            //if($data) 
            //else
            {
                array_push($dataArr, $data);
                array_push($dataArr, $class);
            }

            //if($submenu == 'showadd' || $submenu == 'showedit')
            {
                $columns = TABLE_VS_COLUMNS[TABLE_NAMES[$class]];
                $value_columns = $columns[1];
                $value_columns_arr = explode(',', $value_columns);
                //var_dump($value_columns_arr);
                $id_vs_data = [];
                foreach($value_columns_arr as $value_column)
                {
                    //if(str_ends_with($value_column, '_id'))
                    if(FIELD_TYPES[$value_column] == 'dropdown')
                    {
                        //var_dump($value_column);
                        $table_name = ID_VS_TABLE[$value_column];
                        //var_dump($table_name);
                        $table_data = $this->getDataFromModel(null, $table_name);
                        //var_dump($table_data);
                        $id_vs_data[$value_column] = $table_data;
                    }
                }
                array_push($dataArr, $id_vs_data);
            } 

            array_push($params, $dataArr);

            $this->callClassMethod($class, 'showView', $params);
        }

        function callClassMethod($class, $method, $params=[])
        {
            //var_dump("callClassMethod . $method with <br>");
            //var_dump($params);
            //var_dump("here " . $method);
            $class = 'Model';
            require_once('./model/' . $class . '.php');
            // Instantiate the current controller
            //$classObj = new $class;
            $classObj = new Model;
            // Call a callback with an array of parameters
            return call_user_func_array([$classObj, $method], $params);
        }

        function getSingleRecord($class, $table, $param, $value)
        {
            $params = [];
            array_push($params, $table);
            array_push($params, $param);
            array_push($params, $value);
            //var_dump($params);
            return $this->callClassMethod($class, 'getSingleRecord', $params);
        }

        function getDataForReport($report)
        {
            $query = REPORT_QUERIES[$report];
            $params = [];
            array_push($params, $query);
            return $this->callClassMethod(null, 'getDataFromQuery', $params);
        }
    }
?>