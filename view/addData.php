<!DOCTYPE html>
<?php
    require_once ROOT.'/view/utils.php';

    //Fetch required data into appropriate variables
    $table_data = $data[1];
    //var_dump($table_data);
    $menu = $data[2];
    $id_cols_data = $data[3];
    //var_dump($id_cols_data);
    $table_name = TABLE_NAMES[$menu];
    $cols = TABLE_VS_COLUMNS[$table_name];
    $id_column = $cols[0];
    $value_columns_arr = explode(',', $cols[1]);

    //Get the mandatory columns from the configuration
    $mandatory_cols = TABLE_VS_COLUMNS[$table_name][1];
    $mandatory_cols_arr = explode(',', $mandatory_cols);

    //var_dump($mandatory_cols_arr);
?>
<html lang="en">
<head>
    <script type="text/javascript">

        var dataByColumn = [];
        var columnData;
        var noOfRows = <?= count($table_data)?>;
        var columns = [];
        var columnName;
        var columnValue;
        var columnValues = [];
        var noOfColumns = <?= count($mandatory_cols_arr)?>;
        var columnDataFromDB;
        var noOfMatches = 0;

        /**
         * Prepare all the data into an array by column, and use it for validation
         * The validation includes,
         *      1. Mandatory column must be entered
         *      2. The value must not be available in the database
         */

        <?php
        $data_by_column = [];
        foreach($mandatory_cols_arr as $mandatory_col)
        {
            $data_by_column[$mandatory_col] = "";
        }
        foreach($table_data as $row)
        {
            $row_as_array = getObjectAsArray($row);
            foreach($mandatory_cols_arr as $mandatory_col)
            {
                $data_by_column[$mandatory_col] .= $row_as_array[strtoupper($mandatory_col)] . ",";
            }
        }

        foreach($mandatory_cols_arr as $mandatory_col)
        {
            $data_by_column[$mandatory_col] = substr($data_by_column[$mandatory_col], 0, strlen($data_by_column[$mandatory_col]) - 1);
            ?>
                dataByColumn["<?=$mandatory_col?>"] = "<?=$data_by_column[$mandatory_col]?>".split(",");
                columns.push("<?=$mandatory_col?>");
            <?php
        }
        //var_dump($data_by_column);

        ?>
        //console.log(dataByColumn);

        function validateData()
        {
            <?php
                foreach($mandatory_cols_arr as $mandatory_col)
                {
                ?>
                    columnValue = document.getElementById("<?=$mandatory_col?>").value;
                    if(!columnValue)
                    {
                        alert("<?= ID_VS_VALUE_COLUMN[$mandatory_col] ? ucfirst(ID_VS_VALUE_COLUMN[$mandatory_col]) : ucfirst($mandatory_col)?> is required");
                        return false;
                    }
                <?php
                }

                foreach($mandatory_cols_arr as $mandatory_col)
                {
                ?>
                    columnValue = document.getElementById("<?=$mandatory_col?>").value;
                    columnValues["<?=$mandatory_col?>"] = columnValue;
                <?php
                }
            ?>
            for(var index = 0; index < noOfRows; index++)
            {
                noOfMatches = 0;
                for(var index1 = 0; index1 < noOfColumns; index1++)
                {
                    columnName = columns[index1];
                    columnData = dataByColumn[columnName];
                    columnValue = columnValues[columnName];
                    if(columnData[index] == columnValue) 
                    {
                        noOfMatches ++;
                    }
                }

                if(noOfMatches == noOfColumns)
                {
                    alert("This data is already existing");
                    return false;
                }
            }
            /*
            columnDataFromDB = dataByColumn["<?=$mandatory_col?>"];
            if(columnDataFromDB.includes(columnValue))
            {
                alert(columnValue + " is already existing");
                return false;
            }
            */

            return true;
        }
    </script>
</head>
<body>
    <br/>
    <br/>
    <form class="form-horizontal" action="<?=ROOT?>/index.php?menu=<?= $menu?>&submenu=list" method="POST" onSubmit="return validateData()">
        <div class="form-group">
            <div class="form-group">
                <label class = "control-label col-sm-5"><h2 style="align:center">Add <?= get_singular_name($menu)?></h2></label>
            </div>
            <input type="hidden" class="form-control" name="action" value="add">
            <input type="hidden" class="form-control" name="param" value="<?= $cols[1]?>">
            <?php
                foreach($value_columns_arr as $value_column)
                {
                    $field_type = FIELD_TYPES[$value_column];
                    //var_dump($field_type);
                    $options = $id_cols_data[$value_column];
                    //var_dump($options[0]);

                    if(str_ends_with($value_column, '_id'))
                    {
                        $column_name = explode('_', $value_column)[0];
                    }
                    else
                    {
                        $column_name = $value_column;
                    }

                    $column_name = ucfirst($column_name);
                ?>
                    <div class="form-group">
                        <label class = "control-label col-sm-2" for="<?= $column_name?>"><?= ucfirst($column_name) ?></label>
                        <div class="col-sm-5">
                            <?php
                                if($field_type == 'dropdown')
                                {
                                    $columns = getColumnsArray(getObjectAsArray($options[0]));
                                    //var_dump($columns);
                                    $id_col = $columns[0];
                                    //var_dump($id_col);
                                    $value_col = strtoupper(ID_VS_VALUE_COLUMN[strtolower($id_col)]);
                                    //var_dump($value_col);
                                    ?>
                                    <select class="form-control" id="<?= $value_column?>" name="<?= $value_column?>">
                                        <option value=""> --Select <?= $column_name?>-- </option>
                                        <?php
                                            foreach($options as $option)
                                            {
                                                $options_arr = getObjectAsArray($option);
                                                //var_dump($option);
                                                ?>
                                                <option value="<?= $options_arr[$id_col] ?>"> <?= $options_arr[$value_col]?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                    <?php
                                }
                                else if($field_type == 'date')
                                {
                                    ?>
                                    <input type="date" id="<?= $value_column?>" name="<?=$value_column?>" class="form-control">
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <input type="text" class="form-control" id="<?= $value_column?>" name="<?= $value_column?>">
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                <?php
                }
            ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" value="Add" class="btn btn-default"/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Add More" name="addmore" class="btn btn-default"/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" value="Cancel" class="btn btn-default" onclick="(function() {showPage('<?= $menu?>', 'list');})();"/>
                </div>
            </div>
        </div>
    </form>
</body>
</html>