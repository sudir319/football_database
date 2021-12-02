<?php
    //Reports and Queries configuration
    $reports = [
        'all_managers' => 'List All Managers',
        'all_leagues_with_more_than_10_teams' => 'Leagues with more than 10 teams',
        'all_players_currently_in_a_league' => 'List all players currently in a League',
        'all_players_from_given_coutry' => 'List all players from a specify Country',
        'all_players_started_with_team_in_last_2_years' => 'List all players that started with a new team in the last 2 years',
        'all_players_not_on_a_team' => 'List all players that are not currently on a team'
    ];

    $report_queries = [
        'all_managers' => 'select fb_country.country, fb_personnel.personnel
        from fb_personnel, fb_role, fb_country
        where fb_personnel.role_id = fb_role.role_id
        and fb_personnel.country_id = fb_country.country_id
        and fb_role.role = \'Manager\'',
        'players_currently_in_a_league' => '', 

        'all_leagues_with_more_than_10_teams' => 'select fl.league, count(flt.team_id) team_count 
		from fb_league fl, fb_league_team flt
		where fl.league_id = flt.league_id
		group by fl.league_id, fl.league
		having count(flt.team_id) > 10',

        'all_players_currently_in_a_league' => 'select fl.league, ft.team, fr.role, fp.personnel
		from fb_league fl, fb_team ft, fb_personnel fp, fb_league_team flt, fb_team_personnel pth, fb_role fr
		where fl.league_id = flt.league_id
		and ft.team_id = flt.team_id
		and fp.personnel_id = pth.personnel_id
		and fr.role_id = fp.role_id
		and pth.team_personnel_id = (select max(team_personnel_id) from fb_team_personnel h 
		where h.personnel_id = fp.personnel_id and h.team_id = ft.team_id and h.to_date is null)',

        'all_players_from_given_coutry' => 'select fc.country, fr.role, fp.personnel 
		from fb_personnel fp, fb_country fc, fb_role fr
		where fp.country_id = fc.country_id
		and fr.role_id = fp.role_id',

        'all_players_started_with_team_in_last_2_years' => 'select ft.team, fr.role, fp.personnel, extract( year from pth.from_date) year 
		from fb_personnel fp, fb_team_personnel pth, fb_role fr, fb_team ft
		where fp.personnel_id = pth.personnel_id
        and ft.team_id = pth.team_id
		and fr.role_id = fp.role_id
		and pth.team_personnel_id = (select max(h.team_personnel_id)
		from fb_team_personnel h 
		where h.personnel_id = fp.personnel_id)
		and pth.from_date >= (select extract( year from current_date) - 2 from dual)',
        
        'all_players_not_on_a_team' => 'select ft.team, fr.role, fp.personnel
		from fb_personnel fp, fb_team_personnel pth, fb_role fr, fb_team ft
		where fp.personnel_id = pth.personnel_id
        and pth.team_id = ft.team_id
		and fr.role_id = fp.role_id
		and pth.team_personnel_id = (select max(h.team_personnel_id)
		from fb_team_personnel h 
		where h.personnel_id = fp.personnel_id)
		and pth.to_date is not null',

    ];

    $reports_with_filters = [
        'all_managers' => 'country',
        'all_leagues_with_more_than_10_teams' => 'league',
        'all_players_currently_in_a_league' => 'league,team,role',
        'all_players_from_given_coutry' => 'country,role',
        'all_players_started_with_team_in_last_2_years' => 'team,role',
        'all_players_not_on_a_team' => 'team,role'
    ];

    define('REPORTS', $reports);
    define('REPORT_QUERIES', $report_queries);
    define('REPORTS_WITH_FILTERS', $reports_with_filters);
?>