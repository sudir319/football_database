<?php
//namespace Test;

use Ctrl\Controller;
use PHPUnit\Framework\TestCase;

class RoleTest extends TestCase
{
    var $no_of_roles = 0;
    var $controller;

    public static function setUpBeforeClass(): void
    {
        require_once "config/config.php";
        require_once "config/tables_config.php";
    }

    function setUp() : void
    {
        $this->controller = new Controller;

        $result = $this->controller->getDataFromModel(null, 'fb_role');
        $this->no_of_roles = count($result);
    }

    public function test_get_all_roles()
    {
        $result = $this->controller->getDataFromModel(null, 'fb_role');
        $this->no_of_roles = count($result);

        $this->assertNotNull($result);
        //$this->assertEquals($this->no_of_roles, $this->no_of_roles);
    }

    public function test_add_role_should_add_given_role_to_database()
    {
        $param_arr = ['role'];
        $param_values = [];
        $param_values['role'] = 'Captain';
        $this->controller->performAction(null, 'fb_role', 'add', $param_arr, $param_values, null, null);

        $result = $this->controller->getDataFromModel(null, 'fb_role');
        $no_of_roles = count($result);
        $this->assertEquals($this->no_of_roles, $no_of_roles - 1);
    }

    public function test_edit_role_should_modify_given_role_in_the_database()
    {
        $data = $this->controller->getSingleRecord(null, 'fb_role', 'role', "'Captain'");
        $role_id = $data[0]->ROLE_ID;
        //var_dump($role_id);

        $param_arr = ['role'];
        $param_values = [];
        $param_values['role'] = 'Captain1';

        $this->controller->performAction(null, 'fb_role', 'edit', $param_arr, $param_values, 'role_id', $role_id);

        $data = $this->controller->getSingleRecord(null, 'fb_role', 'role', "'Captain1'");

        //var_dump($data);
        $this->assertEquals($role_id, $data[0]->ROLE_ID);
    }

    public function test_delete_role_should_delete_given_role_from_database()
    {
        $param_arr = ['role'];
        $param_values = [];
        $param_values['role'] = 'Captain1';

        $this->controller->performAction(null, 'fb_role', 'delete', $param_arr, $param_values, null, null);

        $result = $this->controller->getDataFromModel(null, 'fb_role');
        $no_of_roles = count($result);
        //var_dump($this->no_of_roles);
        $this->assertEquals($this->no_of_roles, $no_of_roles + 1);
    }
}
?>