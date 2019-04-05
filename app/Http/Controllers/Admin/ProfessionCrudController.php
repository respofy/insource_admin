<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProfessionRequest as StoreRequest;
use App\Http\Requests\ProfessionRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ProfessionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProfessionCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Profession');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/profession');
        $this->crud->setEntityNameStrings('profession', 'professions');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();
        $this->crud->addColumn([
            'label' => 'პროფესია',
            'type' => 'text',
            'name' => 'title', // the column that contains the ID of that connected entity;
            'pivot' => 'true'
        ]);

        $this->crud->addColumn([
            'label' => 'უნარები',
            'type' => 'select_multiple',
            'name' => 'skills', // the method that defines the relationship in your Model
            'entity' => 'skills', // the method that defines the relationship in your Model
            'attribute' => "title", // foreign key attribute that is shown to user
            'model' => "App\Models\Skill", // foreign key model
            'pivot' => 'true'
        ]);

        $this->crud->addField([
            'name' => 'title',
            'label' => "პროფესიის სახელწოდება"
        ]);

        $this->crud->addField([ // Select2 = 1-n relationship
            'label' => "უნარები",
            'type' => 'select2_multiple',
            'name' => 'skills', // the method that defines the relationship in your Model
            'entity' => 'skills', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
            'model' => "App\Models\Skill", // foreign key model
            'pivot' => 'true'
        ]);

        

        // add asterisk for fields that are required in ProfessionRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
