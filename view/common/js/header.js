function showPage(menu, submenu)
{
    var action = "index.php?menu=" + menu;
    if(submenu)
    {
        action += "&" + (menu == 'Reports' ? "report" : "submenu") + "="+ submenu;
    }
    document.getElementById("menu_form").action = action;
    document.getElementById("menu_form").submit();
}
