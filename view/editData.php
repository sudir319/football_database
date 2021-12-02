<!DOCTYPE html>
<?php
    require_once ROOT.'/view/utils.php';
    //Fetch required data into appropriate variables
    $menu = $data[2];
    $id_cols_data = $data[3];

    //var_dump($id_cols_data);

    $table_name = TABLE_NAMES[$menu];
    $cols = TABLE_VS_COLUMNS[$table_name];
    $id_column = $cols[0];
    $value_columns_arr = explode(',', $cols[1]);
    //var_dump($value_columns_arr);
    $data = getObjectAsArray($data[1][0]);

    //Get the configuration for the non editable fields and make them hidden in the UI.
    $non_editable_fields = NON_EDITABLE_FIELDS[$table_name];
    if($non_editable_fields)
    {
        $non_editable_fields_arr = explode(',', $non_editable_fields);
    }

    //var_dump($data);
?>
<html lang="en">
    <body>
        <br/>
        <br/>
        <form class="form-horizontal" action="<?=ROOT?>/index.php?menu=<?= $menu ?>&submenu=list" method="POST">
            <div class="form-group">
                <div class="form-group">
                    <label class = "control-label col-sm-5"><h2 style="align:center">Edit <?= $menu?></h2></label>
                </div>
                <input type="hidden" class="form-control" name="table" value="<?= $table_name?>">
                <input type="hidden" class="form-control" name="action" value="edit">
                <input type="hidden" class="form-control" name="where_param" value="<?= $id_column?>">
                <input type="hidden" class="form-control" name="<?= $id_column?>" value="<?= $data[strtoupper($id_column)]?>">
                <input type="hidden" class="form-control" name="param" value="<?= $cols[1]?>">
                <?php
                foreach($value_columns_arr as $value_column)
                {
                    $field_type = FIELD_TYPES[$value_column];
                    $options = $id_cols_data[$value_column];
                    //var_dump($non_editable_fields);
                    if($non_editable_fields_arr)
                    {
                        $non_editable = in_array($value_column, $non_editable_fields_arr);
                    }

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
                                    $selected_val = $data[strtoupper($value_column)];
                                    //var_dump($selected_val);
                                    $columns = getColumnsArray(getObjectAsArray($options[0]));
                                    //var_dump($columns);
                                    $id_col = $columns[0];
                                    //var_dump($id_col);
                                    //Get the value column for a given id column(Ex: team_id => Team) from the configuration
                                    $value_col = strtoupper(ID_VS_VALUE_COLUMN[strtolower($id_col)]);
                                    //var_dump($value_col);
                                    if($non_editable)
                                    {
                                        ?>
                                        <input type="hidden" class="form-control" name="<?= $value_column?>" value="<?= $selected_val?>"/>
                                        <?php
                                    }
                                    ?>
                                    <select class="form-control" name="<?= $value_column?>" <?= $non_editable ? "disabled" : ""?>>
                                        <option value=""> --Select <?= $column_name?>-- </option>
                                        <?php
                                            foreach($options as $option)
                                            {
                                                $options_arr = getObjectAsArray($option);
                                                $seleted_str = $options_arr[$id_col] == $selected_val ? "selected=true" : "";
                                                //var_dump($option);
                                                ?>
                                                <option value="<?= $options_arr[$id_col] ?>" <?= $seleted_str?>> <?= $options_arr[$value_col]?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                    <?php
                                }
                                else if($field_type == 'date')
                                {
                                    ?>
                                    <input type="date" class="form-control" name="<?= $value_column?>" value="<?= $data[strtoupper($value_column)]?>" <?= $non_editable ? true : false?>>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <input type="text" class="form-control" name="<?= $value_column?>" value="<?= $data[strtoupper($value_column)]?>" <?= $non_editable ? true : false?>>
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
                    <button type="submit" class="btn btn-default">Save</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" value="Cancel" class="btn btn-default" onclick="(function() {window.history.back();})();"/>
                </div>
            </div>
        </form>
    </body>
</html>