<?php

namespace App\Nova;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class AttributeResource extends Resource
{
    public static $displayInNavigation = false;
    public static $model = Attribute::class;
    public static $title = 'attributeType';
    public static $search = [
        'attributeType'
    ];
    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        return '/resources/product-resources'.static::uriKey().'/'.$resource->getKey();
    }
    public function fields(Request $request)
    {
        return [
            ID::make(),
            BelongsTo::make('Type', 'attributeType', AttributeTypeResource::class),
            Text::make('Value', 'attribute_value')->rules('required'),

        ];
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
