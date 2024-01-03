<?php

namespace App\Http\Controllers\Catalog\Frontend;

use App\Models\Catalog\Catalogproduct;
use Illuminate\Support\Str;
use App\Models\Catalog\AttributeOption;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogproductController extends Controller
{
    private $selectedSort = null;

    public function index(Request $request)
    {
        $minPrice = Catalogproduct::min('product_price');
        $maxPrice = Catalogproduct::max('product_price');

        // $catalogproducts = Catalogproduct::active();
        // $colors = AttributeOption::whereHas(
        //     'attribute',
        //     function ($query) {
        //         $query->where('code', 'color')
        //             ->where('is_filterable', 1);
        //     }
        // )
        //     ->orderBy('group_code', 'asc')->get();
        // $sizes = AttributeOption::whereHas(
        //     'attribute',
        //     function ($query) {
        //         $query->where('code', 'size')
        //             ->where('is_filterable', 1);
        //     }
        // )->orderBy('group_code', 'asc')->get();
        // $catalogproducts = Catalogproduct::parentCatalogproducts()
        //     ->orderBy('productgroup_code', 'asc')
        //     ->get();

    //     $selectedSort = url('catalogproducts');
    //     $sorts = [
    //         url('catalogproducts') => 'Default',
    //         url('catalogproducts?sort=price-asc') => 'Price - Low to High',
    //         url('catalogproducts?sort=price-desc') => 'Price - High to Low',
    //         url('catalogproducts?sort=created_at-desc') => 'Newest to Oldest',
    //         url('catalogproducts?sort=created_at-asc') => 'Oldest to Newest',
    //     ];

        // $catalogproducts = $this->_searchCatalogs($catalogproducts, $request);
        // $catalogproducts = $this->_filterCatalogsByPriceRange($catalogproducts, $request);
        // $catalogproducts = $this->_filterCatalogsByAttribute($catalogproducts, $request);
        // $catalogproducts = $this->_sortCatalogs($catalogproducts, $request);
    //     $selectedSort = $this->selectedSort;
        // $catalogproducts = $catalogproducts->paginate(10);

        $catalogproducts = Catalogproduct::all();

        return view('catalogs.frontend.catalogproducts.index', compact('catalogproducts'));
    }

    // private function _filterCatalogsByPriceRange($catalogproducts, $request)
    // {
    //     $lowPrice = null;
    //     $highPrice = null;

    //     if ($priceSlider = $request->query('product_price')) {
    //         $prices = explode('-', $priceSlider);

    //         $lowPrice = (float)$prices[0];
    //         $highPrice = (float)$prices[1];

    //         if ($lowPrice && $highPrice) {
    //             $catalogproducts = $catalogproducts ->where('product_price', '>=', $lowPrice)
    //                 ->where('product_price', '<=', $highPrice)
    //                 ->orWhereHas(
    //                     'variants',
    //                     function ($query) use ($lowPrice, $highPrice) {
    //                         $query->where('product_price', '>=', $lowPrice)
    //                             ->where('product_price', '<=', $highPrice);
    //                     }
    //                 );
    //         }
    //     }

    //     return $catalogproducts;
    // }

    // private function _searchCatalogs($catalogproducts, $request)
    // {
    //     if ($q = $request->query('q')) {
    //         $q = str_replace('-', ' ', Str::product_descrip($q));

    //         $catalogproducts = $catalogproducts->whereRaw('MATCH(product_name, product_descrip, product_descrip) AGAINST (? IN NATURAL LANGUAGE MODE)', [$q]);

    //         $this->data['q'] = $q;
    //     }

    //     if 
    //     ($catalogproductSlug = $request->query('catalogproduct')) {
    //         $catalogproduct = Catalogproduct::where('slug', $catalogproductSlug)->firstOrFail();

    //         $childIds = Catalogproduct::childIds($catalogproduct->id);
    //         $catalogproductIds = array_merge([$catalogproduct->id], $childIds);

    //         $catalogproducts = $catalogproducts->whereHas(
    //             'catalogproducts',
    //             function ($query) use ($catalogproductIds) {
    //                 $query->whereIn('catalogproducts.id', $catalogproductIds);
    //             }
    //         );
    //     }

    //     return $catalogproducts;
    // }

    // private function _filterProductsByAttribute($catalogproducts, $request)
    // {
    //     if ($attributeOptionID = $request->query('option')) {
    //         $attributeOption = AttributeOption::findOrFail($attributeOptionID);

    //         $catalogproducts = $catalogproducts->whereHas(
    //             'CatalogAttributeValues',
    //             function ($query) use ($attributeOption) {
    //                 $query->where('attribute_id', $attributeOption->attribute_id)
    //                     ->where('text_value', $attributeOption->product_name);
    //             }
    //         );
    //     }

    //     return $catalogproducts;
    // }

    // private function _sortCatalogs($catalogproducts, $request)
    // {
    //     if ($sort = preg_replace('/\s+/', '', $request->query('sort'))) {
    //         $availableSorts = ['product_price', 'created_at'];
    //         $availableOrder = ['asc', 'desc'];
    //         $sortAndOrder = explode('-', $sort);

    //         $sortBy = strtolower($sortAndOrder[0]);
    //         $orderBy = strtolower($sortAndOrder[1]);

    //         if (in_array($sortBy, $availableSorts) && in_array($orderBy, $availableOrder)) {
    //             $catalogproducts  = $catalogproducts ->orderBy($sortBy, $orderBy);
    //         }

    //         $this->selectedSort = url('catalogproducts ?sort=' . $sort);
    //     }

    //     return $catalogproducts ;
    // }

    public function show(Catalogproduct $catalogproduct)
    {
        if (!$catalogproduct->configurable()) {
            return view('catalogs.frontend.catalogproducts.index', compact('catalogproduct'));
        }

        // $colors = ProductAttributeValue::getAttributeOptions($product, 'color')->pluck('text_value', 'text_value');
        // $sizes = ProductAttributeValue::getAttributeOptions($product, 'size')->pluck('text_value', 'text_value');
        // return view('frontend.products.show', compact('product', 'sizes', 'colors'));
    }

    public function quickView(Catalogproduct $catalogproduct)
    {
        if (!$catalogproduct->configurable()) {
            return view('catalogs.frontend.catalogproducts.index', compact('catalogproduct'));
        }

        // $colors = ProductAttributeValue::getAttributeOptions($product, 'color')->pluck('text_value', 'text_value');
        // $sizes = ProductAttributeValue::getAttributeOptions($product, 'size')->pluck('text_value', 'text_value');
        return view('catalogs.frontend.catalogproducts.index', compact('catalogproduct', 'totalcatalogproducts'));
    }
}
 