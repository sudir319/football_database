<!DOCTYPE html>
<html lang="en">
<?php

    require_once ROOT.'/view/utils.php';

    $option = $data[0];
    //var_dump($data);
    $tableData = $data[1];
    $menu = $data[2];

    $id_cols_data = $data[3];
    //var_dump($id_cols_data);

    $table_name = TABLE_NAMES[$menu];
    $cols = TABLE_VS_COLUMNS[$table_name];
    $id_column = $cols[0];
    $value_column = DELETE_FIELDS[$id_column];

    //var_dump("id_column : $id_column");
    //var_dump("value_column : $value_column");

    $table_index = array_search($table_name, TABLES_WITH_NO_DELETE);
    $is_delete_possible = true;

    if(is_numeric($table_index))
    {
        $is_delete_possible = false;
    }

    if(!$value_column)
    {
        $value_column = $cols[1];
        $value_column = explode(',', $value_column)[0];
    }

    //var_dump("value_column : $value_column");
    if($tableData)
    {
        $columns = getColumnsArray(getObjectAsArray($tableData[0]));
        array_unshift($columns, "#");

        $filter_columns = TABLES_WITH_FILTERS[$table_name];
        $filter_columns = explode(',', $filter_columns);
        $filter_columns_arr = array();
        $filter_columns_arr = array_fill(0, sizeof($columns), 0);
        $array_index = 0;
        $filter_column_indices = [];
    
        $has_filters = false;
    
        foreach($columns as $column)
        {
            //var_dump($column);
            if(in_array(strtolower($column), $filter_columns))
            {
                $filter_columns_arr[$array_index] = strtolower($column);
                $filter_column_indices[get_column_name($id_column, strtolower(($column)))] = $array_index;
                $has_filters = true;
            }
            $array_index ++;
        }
    
        $filter_keys = implode(',', array_keys($filter_column_indices));
        $filter_indices = implode(',', array_values($filter_column_indices));    
    }

    //var_dump($filter_columns);
    //var_dump($filter_column_indices);
?>
<head>
    <script src="<?=ROOT?>/view/common/js/filter.js"></script>
    <script type="text/javascript">
        function confirmDelete(id, value)
        {
            var confirmation = confirm('Are you sure to delete ' + value);
            if(confirmation)
            {
                document.getElementById("<?= $id_column?>").value = id;
                document.getElementById("delete_form").submit();
            }
        }
        function openEdit(id)
        {
            document.getElementById("delete_form").innerHTML = "";
            document.getElementById("<?= $id_column?>").value = id;
            document.getElementById("edit_form").submit();
        }
    </script>
</head>
<body
    onload = "loadFilters('<?= $filter_keys?>', '<?= $filter_indices?>')"
>
    <br/>
    <div class="container">
        <h2><?= $menu . ($tableData ? "(".count($tableData).")" : "")?></h2>
        <?php
        if($tableData)
        {
        ?>
        <table class="table" style="width:600px" id="data-table">
            <thead>
            <tr>
                <?php
                    foreach($columns as $column)
                    {
                        $column_name = get_column_name($id_column, $column);
                        //echo "<br>$column_name</br>";
                        ?>
                        <th <?= $column_name == 'Id' ? "style='display:none'":""?>>
                            <?= $column_name?>
                        </th>
                        <?php
                    }
                ?>
                <th colspan="<?= $is_delete_possible ? 2 : 1 ?>" width = "10%">Actions</th>
            </tr>
            <?php
                if($has_filters)
                {
                    ?>
                    <tr id="filters">
                    <?php
                        $array_index = 0;
                        $id_column_index = array_search($id_column, $columns);
                        foreach($filter_columns_arr as $filter_column)
                        {
                            $filter_column = get_column_name($id_column, $filter_column);
                            //echo "<br>$column_name</br>";
                            ?>
                            <th <?=  $array_index == $id_column_index ? "style='display:none'":"" ?>>
                                <?php
                                    if($filter_column)
                                    {
                                    ?>
                                    <select id="<?=$filter_column?>#<?=$array_index?>" onChange="filterData('<?= $filter_keys?>', '<?= $filter_indices?>')">
                                        <option value="">-- All --</option>
                                    </select>
                                    <?php
                                    }
                                ?>
                            </th>
                            <?php
                            $array_index ++;
                        }
                    ?>
                    <th colspan="2"><nobr>
                        <button class="btn" onclick="(function() {clearFilters('<?= $filter_keys?>', '<?= $filter_indices?>');})();"><i class="fa fa-close"></i> Clear Filters</button>
                    </nobr></tr>
                    </tr>
                    <?php
                }
            ?>
            </thead>
            <tbody>
            <?php
                $row_index = 0;
                foreach($tableData as $row)
                {
                    $col_index = 0;
                    $row_as_array = getObjectAsArray($row);
                    $row_as_array['#'] = ++$row_index;
                    ?>
                    <tr id="data-tr">
                        <?php
                            foreach($columns as $column)
                            {
                                unset($actual_value);
                                if(str_ends_with($column, '_ID') && strtolower($column) != $id_column)
                                {
                                    //var_dump($column . " : " . $row_as_array[$column]);
                                    $id_col_data = $id_cols_data[strtolower($column)];
                                    //echo "<br>";
                                    //var_dump($id_col_data);
                                    foreach($id_col_data as $each_row)
                                    {
                                        $each_row_arr = getObjectAsArray($each_row);
                                        //echo "<br>";
                                        //var_dump("each_row_arr : ");
                                        //var_dump($each_row_arr);
                                        if($each_row_arr[$column] == $row_as_array[$column])
                                        {
                                            //var_dump("matching : ");
                                            $value_column_for_id = ID_VS_VALUE_COLUMN[strtolower($column)];
                                            //var_dump("value col : " . $value_column_for_id);
                                            $actual_value = $each_row_arr[strtoupper($value_column_for_id)];                                            
                                        }
                                        //echo "<br>";
                                        //var_dump("actual value : " . $actual_value);    
                                    }
                                }

                                if(!$actual_value)
                                {
                                    $actual_value = $row_as_array[$column];
                                }
                            ?>
                                <td <?= get_column_name($id_column, $column) == 'Id' ? "style='display:none'":""?>><nobr><?= $actual_value?></nobr></td>
                            <?php
                            }
                        ?>
                        <td colspan="<?= $is_delete_possible ? 1 : 2 ?>" align="center"><a href="#" onClick="openEdit('<?= $row_as_array[strtoupper($id_column)]?>')">
                        <span class="glyphicon glyphicon-pencil"></span>
                        </a></td>
                        <?php
                        if($is_delete_possible)
                        {
                            ?>
                            <td><a href="#" onClick="confirmDelete('<?= $row_as_array[strtoupper($id_column)]?>', '<?= $row_as_array[strtoupper($value_column)]?>')">
                            <span class="glyphicon glyphicon-remove" style="color:red"></span>
                            </a></td>
                            <?php
                        }
                        ?>
                    </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
        <?php
            }
            else
            {
                ?>
                    <h4>No <?= $data[2]?> found</h4>
                <?php
            }        
        ?>
    </div>
    <form class="form-inline" id="delete_form" action="<?=ROOT?>/index.php?menu=<?=$menu?>&submenu=list" method="POST">
        <input type="hidden" name="table" value="<?= $table_name?>">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="param" value="<?= $id_column?>">
        <input type="hidden" name="<?= $id_column?>" id="<?= $id_column?>">
    </form>
    <form class="form-inline" id="edit_form" action="<?=ROOT?>/index.php?menu=<?=$menu?>&submenu=showedit" method="POST">
        <input type="hidden" name="table" value="<?= $table_name?>">
        <input type="hidden" name="param" value="<?= $id_column?>">
        <input type="hidden" name="<?= $id_column?>" id="<?= $id_column?>">
    </form>
</body>
</html>