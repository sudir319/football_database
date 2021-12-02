<?php 
  $menus = [
    'Roles' => [['fb_role'], ['Add'=>'showAdd', 'List']],
    'Countries' => [['fb_country'],['Add'=>'showAdd', 'List']], 
    'Leagues' => [['fb_league'],['Add'=>'showAdd', 'List']],
    'Teams' => [['fb_team'],['Add'=>'showAdd', 'List']],
    'League Teams' => [['fb_league_team'], ['Add' => 'showAdd', 'List']],
    'Personnel' => [['fb_personnel'],['Add'=>'showAdd', 'List']],
    'Team Personnel' => [['fb_team_personnel'], ['Add'=>'showAdd', 'List']],
    'Reports' => []
  ];
?>
<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="view/common/css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="view/common/js/header.js"></script>
    <title><?= SITENAME ?></title>
  </head>
  <body>
    <ul id="nav">
        <?php
        foreach ($menus as $menu => $submenus)
        {
          ?>
          <li><a href="#" onclick="showPage('<?= $menu?>', '<?= sizeof($submenus) > 0 ? 'list' : ''?>')"><?= $menu?></a>
            <ul>
                <?php
                  //var_dump($submenus);
                  foreach($submenus[1] as $submenuKey => $submenu)
                  {
                    if(is_string($submenuKey))
                    {
                    ?>
                      <li><a href="#" onclick="showPage('<?= $menu?>', '<?= strtolower($submenu)?>')"><?= $submenuKey?></a></li>
                    <?php
                    }
                    else
                    {
                      ?>
                        <li><a href="#" onclick="showPage('<?= $menu?>', '<?= strtolower($submenu)?>')"><?= $submenu?></a></li>
                      <?php
                    }
                  }
                ?>
            </ul>
          </li>
          <?php
        }
        ?>
    </ul>
    <form class="form-inline" id="menu_form" action="index.ph" method="POST">
      <!-- <input type="hidden" name="table" id="table" value="">
      <button type="submit" class="btn btn-default">Add</button> -->
    </form>
    <br/>
    <br/>
  </body>
</html>