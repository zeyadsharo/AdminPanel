<?php

namespace App\Nova;

use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Saumini\Count\RelationshipCount;

class ProductResource extends Resource
{
    public static $model = Product::class;

    public static $title = 'id';

    public static $search = [
        'product_name','product_description'
    ];
    public function title()
    {
        return 'Products';
    }
    public static function label()
    {
        // input your logic to show label
        return 'Products';
    }


    public function fields(Request $request)
    {
        return [
            ID::make()->hide(),
            Text::make('Product Name','product_name')
                ->sortable()
                ->rules('required', 'max:255'),
            Number::make('Price','price')
                ->sortable()
                ->rules('required', 'max:255'),
            Textarea::make('Product Description','product_description'),
            Image::make(__('Image'), 'image')->creationRules('required', 'mimes:jpeg,jpg,png,gif|required|max:10000')
                ->disableDownload()->required()->disk('public')->path('public/pictures')->deletable(false)->prunable(),
            RelationshipCount::make('Attributes', 'attributes'),
            HasMany::make('Attributes', 'attributes', AttributeResource::class)
        ];
    }

    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        return '/resources/'.static::uriKey().'/'.$resource->getKey();
    }

    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        return '/resources/'.static::uriKey().'/'.$resource->getKey();
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
