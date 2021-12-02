<html>
<?php 
    use Ctrl\Controller;

    //Define ROOT folder as the current folder and load other files with repsect to the same
    define('ROOT', '.');

    /**
     * Load all the necessary files which are required to run the application.
     */
    require_once ROOT.'/config/config.php';
    require_once ROOT.'/config/tables_config.php';
    require_once ROOT.'/config/reports_config.php';
    require_once ROOT.'/model/db/Database.php';
    require_once ROOT.'/view/common/header.php';
    require_once ROOT.'/controller/Controller.php';

    //Create object of the controller
    $controller = new Controller;

    //Get the menu and submenu from the URL
    $menu = $_GET['menu'];
    $submenu = $_GET['submenu'];

    /**
     * If the menu is passed(Means index.php is called without any URL params), then redirect it to Personnel list
     */
    if(!$menu)
    {
        $menu = 'Personnel';
        $submenu = 'list';
    }

    if($menu == 'Reports')
    {
        $report = $_GET['report'];
        if($report)
        {
            /**
             * If the report is specified then fetch data for that report based on the configured query
             * And fetch the configured description for the report and show the report page.
             */
            $tableData = $controller->getDataForReport($report);
            $description = REPORTS[$report];
            require_once ROOT.'/view/report.php';
        }
        else
        {
            //If menu is Reports and no report is specified, theb show the list of reports
            require_once ROOT.'/view/reports_list.php';
        }
    }
    else
    {
        //Get the action, param and addmore parameters from the POST object
        $action = $_POST['action'];
        $param = $_POST['param'];
        $addmore = $_POST['addmore'];

        $param_values = [];
        //var_dump($param);
        $param_arr = [];
        if($param)
        {
            /**
             * $param is a combination of multiple parameters with comma separated.
             * Get all the params list here and fetch each param value further, and store them in an array
             */
            $param_arr = explode(',', $param);
            foreach($param_arr as $param)
            {
                $param_values[$param] = $_POST[$param];
            }
        }
        //var_dump($param_values);

        //Get the table name for this menu and the where condition details
        $table = TABLE_NAMES[$menu];
        $whereParam = $_POST['where_param'];
        $whereValue = $_POST[$whereParam];
        
        //var_dump($action . ' : ' . $table);
        if($action)
        {
            // If the action is specified, then perform the action,
            $controller->performAction($menu, $table, $action, $param_arr, $param_values, $whereParam, $whereValue);
            // If addmore is specified then show the add page once again
            if($addmore)
            {
                $submenu = 'showadd';
            }
            //Getch all the records from the table
            $data = $controller->getDataFromModel($menu, $table);
            //var_dump($data);
        }
        else if($submenu == 'showedit')//showing edit page
        {
            /**
             * If show edit is specified, get the param value to which the row has to be fetched
             * It will be shown in the UI and user can modify it further.
             */
            $value = $_POST[$param];
            $data = $controller->getSingleRecord($menu, $table, $param, $value);
        }
        else
        {
            /**
             * If there is no action to be performed and not showedit, then submenu must be list to show all the records.
             * Fetch all the records from the table
             */
            $data = $controller->getDataFromModel($menu, $table);
        }
        //var_dump("Before Show View");
        //var_dump($menu.$submenu);

        //Make a call to controller to show the respective page according to the above logic by passing the record(s) data
        $controller->showViewWithData($menu, $submenu, $data);
    }
?>
<br/>
</html>