<?php

namespace App\Nova;

use App\Models\AttributeTypeLookUp;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class AttributeTypeResource extends Resource
{
    public static $model = AttributeTypeLookUp::class;

    public static $title = 'name';

    public static $search = [
        'name'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->hide(),
            Text::make('name')->rules('required')
        ];
    }
    public static function label()
    {
        // input your logic to show label
        return 'Attributes Lookup';
    }

    public function cards(Request $request)
    {
        return [];
    }

    public function filters(Request $request)
    {
        return [];
    }

    public function lenses(Request $request)
    {
        return [];
    }

    public function actions(Request $request)
    {
        return [];
    }
}
