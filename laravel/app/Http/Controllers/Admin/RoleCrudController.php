<?php
 
namespace App\Http\Controllers\Admin;
 
use Backpack\PermissionManager\app\Http\Controllers\RoleCrudController 
as PM_RoleCrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
 
class RoleCrudController extends PM_RoleCrudController
{
    public function setup()
    {
       parent::setup();
       // Add your code here
    }

    public function setupListOperation()
    {
        parent::setupListOperation();
        $this->crud->addColumn(['name'=>'guard_name']);
    }

}