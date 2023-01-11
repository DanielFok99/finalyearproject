<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductSkuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //Validate Basic Info
            'basic.product_name' => 'required|string|max:255',
            'basic.group_id' => 'required|integer',
            'basic.brand_id' => 'required|integer',
            'basic.categories' => 'required|array',

            //Validate Standard Product Info
            'standard_product.ref_purchase_price' => 'numeric|required_with:standard',
            'standard_product.ref_selling_price' => 'numeric|required_with:standard',
            'standard_product.alternative_code' => 'string|max:255|nullable',
            'standard_product.sku' => 'unique:product_skus,sku|string|max:255|required_with:standard',
            'standard_product.barcode' => 'string|max:255|required_with:standard',
            'standard_product.is_enable' => 'boolean|required_with:standard',

            //Validate Single Product Unit Info
            'single_product_unit.id' => 'numeric|required_with:single_product_unit',

            //Validate Variant Product Info
            'variant_products.*' => 'array:variantName,refPurchasePrice,refSellingPrice,altCode,sku,barcode,isEnabled',
            'variant_products.*.variantName' => 'string|max:255|required_with:variant_products',
            'variant_products.*.refPurchasePrice' => 'numeric|required_with:variant_products',
            'variant_products.*.refSellingPrice' => 'numeric|required_with:variant_products',
            'variant_products.*.altCode' => 'string|max:255|nullable',
            'variant_products.*.sku' => 'unique:product_skus,sku|string|max:255|required_with:variant_products',
            'variant_products.*.barcode' => 'string|max:255|required_with:variant_products',
            'variant_products.*.isEnabled' => 'boolean|required_with:variant_products',

            //Validate Multi Product Unit Info
            'multi_product_unit.base_id' => 'integer|required_with:multi_product_unit',
            'multi_product_unit.other_units.*' => 'array:id,ratio',
            'multi_product_unit.other_units.*.id' => 'integer|required_with:multi_product_unit',
            'multi_product_unit.other_units.*.ratio' => 'integer|required_with:multi_product_unit',
        ];
    }
}
