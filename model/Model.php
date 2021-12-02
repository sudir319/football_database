<?php
    namespace Mdl;
    use Mdl\DB\Database;

    class Model 
    {
        protected $db;
        
        function __construct()
        {
            $this->db = new Database;
        }

        public function fetchDataFromDB($sql)
        {
            $this->db->query($sql);
            return $this->db->resultSet();
        }

        public function getAllRecords($table)
        {
            $sql = "";
            if(array_search($table, QUERIES))
            {
                $sql = strtoupper(QUERIES[$table]);
            }
            if(!$sql)
            {
                $sql = "select * from $table ORDER BY " . (TABLE_VS_ORDERBY[$table] ? TABLE_VS_ORDERBY[$table] : 1);
            }
            //echo "<br>$sql<br>";
            $data = $this->fetchDataFromDB($sql);
            //var_dump($data);
            return $data;
        }

        public function getSingleRecord($table, $column, $value)
        {
            $sql = "select * from $table where $column = $value";
            //var_dump($sql);
            $this->db->query($sql);
            return $this->db->resultSet();
        }

        public function showView($data)
        {
            //var_dump("showView");
            //var_dump($data);
            $action = '';
            switch($data[0])
            {
                case 'list' : $action = 'show'; break;
                case 'showadd' : $action = 'add'; break;
                case 'showedit' : $action = 'edit'; break;
            }
            //var_dump('view/'.strtolower($data[2]).'/'.$action.$data[2].'.php');

            if($action)
            {
                require_once 'view/'.$action.'Data.php';
            }
            //$this->showView($data[2], $data);
        }

        public function alterData($data)
        {
            //var_dump($data);
            $table = $data[0];
            $action = $data[1];
            $columns_arr = $data[2];
            $column_values = $data[3];
            $whereColumn = $data[4];
            $whereValue = $data[5];
            //var_dump($data);
            $sql = null;

            //INSERT into fb_country(country_id, country) select max(country_id) + 1, 'Brazil' from fb_country;
            if($action == 'add')
            {
                $column_id = TABLE_VS_ID[$table];
                $values_sql = "";
                $sql = "INSERT into $table($column_id";
                foreach($columns_arr as $column)
                {
                    $sql .= ", $column";
                    $values_sql .= ", '".$column_values[$column]."'";
                }
                $sql .= ") ";
                $sql .= "select COALESCE(max($column_id) + 1, 1) ";
                $sql .= $values_sql;
                $sql .= " from $table";
            }
            else if($action == 'edit')
            {
                $queries = null;
                if(array_search($table, EDIT_QUERIES))
                {
                    $queries = EDIT_QUERIES[$table];
                }

                if($queries)
                {
                    foreach($columns_arr as $column)
                    {
                        //echo "\$$column = \"$column_values[$column]\";<br>";
                        eval("\$$column = \"$column_values[$column]\";");
                    }
                    eval("\$$whereColumn = \"$whereValue\";");
                    //var_dump("team_personnel_id : $team_personnel_id");
                    foreach($queries as $query)
                    {
                        eval("\$query = \"$query\";");
                        //echo "<br>Query : $query";
                        $this->db->query($query);
                        $this->db->execute();
                    }
                }
                else
                {
                    $set_string = null;
                    foreach($columns_arr as $column)
                    {
                        if(!$set_string)
                        {
                            $set_string = "$column = '$column_values[$column]'";
                        }
                        else
                        {
                            $set_string .= ", $column = '$column_values[$column]'";
                        }
                    }
                    $sql = "UPDATE $table set $set_string where $whereColumn = $whereValue";
                }
            }
            else
            {
                $where_string = null;
                foreach($columns_arr as $column)
                {
                    if(!$where_string)
                    {
                        $where_string = "$column = '$column_values[$column]'";
                    }
                    else
                    {
                        $where_string .= " and $column = '$column_values[$column]'";
                    }
                }

                $sql = "DELETE from $table where $where_string";
            }
            if($sql)
            {
                //var_dump($sql);
                $this->db->query($sql);
                $result = $this->db->execute();
                //var_dump($result);
            }
        }

        function getDataFromQuery($query)
        {
            $this->db->query($query);
            $result = $this->db->resultSet();
            return $result;
        }
    }
?>