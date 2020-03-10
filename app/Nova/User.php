<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use OwenMelbz\RadioField\RadioButton;
use Laravel\Nova\Http\Requests\NovaRequest;
use R64\NovaFields\JSON;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\User';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    public function title()
    {
        return $this->name;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable()->onlyOnDetail(),

            Text::make('Unique Id')->onlyOnDetail(),

            Avatar::make('Avatar'),

            HasMany::make('Subscriptions'),

            BelongsTo::make('Institute'),

            Text::make('Unique Id')->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Mobile')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),

            Text::make('Dob')
                ->sortable()
                ->rules('required', 'max:255'),

            RadioButton::make('Gender')
                ->sortable()
                ->options(['Male' => 'Male', 'Female' => 'Female'])
                ->default('Male'),

            Text::make('School')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Class')
                ->sortable()
                ->rules('required', 'max:255'),

            Select::make('Account Status')->sortable()->options([
                'Approved' => 'Approved',
                'Pending' => 'Pending',
                'Rejected' => 'Rejected',
            ])->onlyOnDetail(),

            Boolean::make('Profile Updated', 'status')->sortable(),

            DateTime::make('Join At', 'created_at')->format('DD-MM-YYYY hh:mm A')->sortable(),

            Text::make('Imei')->onlyOnDetail()
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
