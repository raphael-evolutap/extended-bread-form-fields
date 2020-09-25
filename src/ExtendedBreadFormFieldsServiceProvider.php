<?php

namespace ExtendedBreadFormFields;

use TCG\Voyager\Voyager as VoyagerVoyager;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\ServiceProvider;
use ExtendedBreadFormFields\FormFields\MultipleImagesWithAttrsFormField;
use ExtendedBreadFormFields\FormFields\KeyValueJsonFormField;

class ExtendedBreadFormFieldsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'extended-fields');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        (new VoyagerVoyager)->addFormField(KeyValueJsonFormField::class);
        (new VoyagerVoyager)->addFormField(MultipleImagesWithAttrsFormField::class);

        $this->app->bind(
            'TCG\Voyager\Http\Controllers\VoyagerBaseController',
            'ExtendedBreadFormFields\Controllers\ExtendedBreadFormFieldsController'
        );

        $this->app->bind(
            'TCG\Voyager\Http\Controllers\VoyagerMediaController',
            'ExtendedBreadFormFields\Controllers\ExtendedBreadFormFieldsMediaController'
        );
    }
}
