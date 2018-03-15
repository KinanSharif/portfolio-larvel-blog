<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);

        Form::component('bsEmail', 'components.form.email', ['name', 'value' => null, 'attributes' => []]);

        Form::component('bsTextArea', 'components.form.textarea', ['name', 'value' => null, 'attributes' => []]);

        Form::component('bsSubmit', 'components.form.submit', ['value' => 'Submit', 'attributes' => []]);

        Form::component('hidden', 'components.form.hidden', ['name', 'value' => null, 'attributes' => []]);

        Form::component('bsPassword', 'components.form.password', ['name', 'value' => null, 'attributes' => []]);

        Form::component('bsFile', 'components.form.file', ['name', 'value' => null, 'attributes' => []]);

        Form::component('bsCheckbox', 'components.form.checkbox', ['name', 'value' => null, 'attributes' => []]);

        Form::component('bsSelect', 'components.form.select', ['name', 'value' => null, 'attributes' => []]);

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}