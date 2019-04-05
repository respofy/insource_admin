<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('city', 'CityCrudController');
    CRUD::resource('status', 'StatusCrudController');
    CRUD::resource('profession', 'ProfessionCrudController');
    CRUD::resource('workingType', 'WorkingTypeCrudController');
    CRUD::resource('industry', 'IndustryCrudController');
    CRUD::resource('university', 'UniversityCrudController');
    CRUD::resource('degree', 'DegreeCrudController');
    CRUD::resource('faculty', 'FacultyCrudController');
    CRUD::resource('role', 'RoleCrudController');
    CRUD::resource('language', 'LanguageCrudController');
    CRUD::resource('languageKnowledge', 'LanguageKnowledgeCrudController');
    CRUD::resource('skill', 'SkillCrudController');
    CRUD::resource('professionSkill', 'ProfessionSkillCrudController');
}); // this should be the absolute last line of this file