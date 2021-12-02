<?php
    //Tables & columns config
    $table_names = [
        'Roles'          => 'fb_role',
        'Countries'      => 'fb_country',
        'Teams'          => 'fb_team',
        'Leagues'        => 'fb_league',
        'Personnel'      => 'fb_personnel',
        'League Teams'   => 'fb_league_team',
        'Team Personnel' => 'fb_team_personnel'
    ];

    $table_vs_columns = [
        'fb_role'           => ['role_id', 'role'],
        'fb_country'        => ['country_id', 'country'],
        'fb_team'           => ['team_id', 'team'],
        'fb_league'         => ['league_id', 'league'],
        'fb_personnel'      => ['personnel_id', 'personnel,height,role_id,country_id'],
        'fb_league_team'    => ['league_team_id', 'league_id,team_id'],
        'fb_team_personnel' => ['team_personnel_id', 'personnel_id,team_id']
    ];

    $id_vs_table = [];
    $table_vs_id = [];

    foreach($table_vs_columns as $table_name => $columns_list)
    {
        $table_vs_id[$table_name] = $columns_list[0];
        $id_vs_table[$columns_list[0]] = $table_name;
    }

    $id_vs_value_column = [
        'country_id'   => 'country',
        'team_id'      => 'team',
        'role_id'      => 'role',
        'league_id'    => 'league',
        'personnel_id' => 'personnel'
    ];

    $field_types = [
        'role_id'      => 'dropdown',
        'country_id'   => 'dropdown',
        'team_id'      => 'dropdown',
        'league_id'    => 'dropdown',
        'personnel_id' => 'dropdown',
        'from_date'    => 'date',
        'to_date'      => 'date'
    ];

    $queries = [
        'fb_team_personnel' => 'select fb_team_personnel.team_personnel_id, fb_team.team, fb_personnel.personnel, fb_role.role, fb_team_personnel.from_date as "from"
                                from fb_team_personnel, fb_team, fb_personnel, fb_role
                                where fb_team_personnel.personnel_id = fb_personnel.personnel_id
                                and fb_team_personnel.team_id = fb_team.team_id
                                and fb_personnel.role_id = fb_role.role_id
                                and fb_team_personnel.to_date is null'
    ];

    $delete_fields = [
        'team_personnel_id' => 'personnel'
    ];

    $edit_queries = [
        'fb_team_personnel' => [
        'UPDATE $table SET to_date = current_date() where team_personnel_id = $team_personnel_id',
        'INSERT into $table(team_personnel_id, team_id, personnel_id) SELECT COALESCE(max(team_personnel_id) + 1, 1), $team_id, $personnel_id from $table'
        ]
    ];

    $tables_with_no_delete = [
        'fb_team_personnel'
    ];

    $non_editable_fields = [
        'fb_team_personnel' => 'personnel_id'
    ];

    $tables_with_filters = [
        'fb_league_team' => 'league_id,team_id',
        'fb_personnel' => 'role_id,country_id',
        'fb_team_personnel' => 'role,team'
    ];

    $table_vs_order_by = [
        'fb_role' => 'role',
        'fb_country' => 'country',
        'fb_team' => 'team',
        'fb_league' => 'league',
        'fb_league_team' => 'league_id, team_id'
    ];

    define('TABLE_NAMES', $table_names);
    define('TABLE_VS_COLUMNS', $table_vs_columns);
    define('ID_VS_TABLE', $id_vs_table);
    define('TABLE_VS_ID', $table_vs_id);
    define('ID_VS_VALUE_COLUMN', $id_vs_value_column);
    define('FIELD_TYPES', $field_types);
    define('QUERIES', $queries);
    define('DELETE_FIELDS', $delete_fields);
    define('EDIT_QUERIES', $edit_queries);
    define('TABLES_WITH_NO_DELETE', $tables_with_no_delete);
    define('NON_EDITABLE_FIELDS', $non_editable_fields);
    define('TABLES_WITH_FILTERS', $tables_with_filters);
    define('TABLE_VS_ORDERBY', $table_vs_order_by);
?>