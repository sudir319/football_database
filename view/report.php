<?php
    /**
     * This page is used to render output of a query as a report
     */
    require_once ROOT.'/view/utils.php';

    if($tableData)
    {
        //Get all the columns names
        $columns = getColumnsArray(getObjectAsArray($tableData[0]));

        //Get the filter columns configured for this report and split them by comma.
        $filter_columns = REPORTS_WITH_FILTERS[$report];
        $filter_columns = explode(',', $filter_columns);
        //var_dump($filter_columns);
    

        //Create an array with size as no of columns + 1 default value as 0. Additional column because the data table has index row(#)
        $filter_columns_arr = array_fill(0, sizeof($columns) + 1, 0);
    
        $array_index = 1;
        $filter_column_indices = [];
    
        $has_filters = false;
    
        //Fill out the filter columns array, with column names which are available
        foreach($columns as $column)
        {
            //var_dump($column);
            if(in_array(strtolower($column), $filter_columns))
            {
                $filter_columns_arr[$array_index] = strtolower($column);
                $filter_column_indices[strtolower($column)] = $array_index;
                $has_filters = true;
            }
            $array_index ++;
        }
    
        //var_dump($filter_column_indices);
        
        //Get the comma separated filter names and their indices, which will be used further to filter the data
        $filter_keys = implode(',', array_keys($filter_column_indices));
        $filter_indices = implode(',', array_values($filter_column_indices));
    
        //var_dump($filter_keys);
        //var_dump($filter_indices);
    }
?>
<html>
    <head>
        <script src="view/common/js/filter.js"></script>
    </head>
    <body
        onload = "loadFilters('<?= $filter_keys?>', '<?= $filter_indices?>')"
    >
        <br/>
        <div class="container">
        <h2><?= $description?></h2>
        <?php
        if($tableData)
        {
        ?>
        <table class="table" id="data-table" style="width:600px">
            <thead>
                <tr>
                    <th>#</th>
                    <?php
                        foreach($columns as $column)
                        {
                            ?>
                            <th><?= ucfirst($column)?></th>
                            <?php
                        }
                    ?>
                    <th>Action</th>
                </tr>
                <?php
                if($has_filters)
                {
                    ?>
                    <tr id="filters">
                    <?php
                        $array_index = 0;
                        foreach($filter_columns_arr as $filter_column)
                        {
                            /**
                             * If filter is available for a column, then create a drop down for the same, values will be filled to it, based on the table data on page load
                             */
                            ?>
                            <th>
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
                    <th colspan="2">
                        <nobr>
                            <button class="btn" onclick="(function() {clearFilters('<?= $filter_keys?>', '<?= $filter_indices?>');})();"><i class="fa fa-close"></i> Clear Filters</button>
                        </nobr>
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
                    $row_as_array = getObjectAsArray($row);
                    ?>
                    <tr>
                        <td><?= ++$row_index ?></td>
                        <?php
                            foreach($columns as $column)
                            {
                            ?>
                                <td><nobr><?= $row_as_array[$column]?></nobr></td>
                            <?php
                            }
                        ?>
                        <td></td>
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
                <br>
                <h4>No data found</h4>
            <?php
        }
        ?>
        </div>
    </body>
</html>