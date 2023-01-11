<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductSkuRequest;
use App\Http\Requests\UpdateProductSkuRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductProductCategory;
use App\Models\ProductSku;
use App\Models\ProductSkuUnit;

class ProductController extends Controller
{

    public function index()
    {
        $products = ProductResource::collection(Product::all());

        return response()->json($products);
    }


    public function store(StoreProductSkuRequest $request)
    {


        $productName = $request->input('basic.product_name');
        $groupId = $request->input('basic.group_id');
        $brandId = $request->input('basic.brand_id');
        $description = $request->input('basic.description');
        $categoryList = $request->input('basic.categories');

        $standardProduct = $request->input('standard_product');
        $variantProductList = $request->input('variant_products');

        $singleProductUnit = $request->input('single_product_unit');
        $multiProductUnit = $request->input('multi_product_unit');

        $product = Product::create([
            'title' => $productName,
            'group_id' => $groupId,
            'brand_id' => $brandId,
            'description' => $description,
            'created_by' => auth()->id(),
        ]);

        $productId = $product->id;

        foreach ($categoryList as $categoryId) {
            ProductProductCategory::create([
                'product_id' => $productId,
                'product_category_id' => $categoryId,
            ]);
        }


        //IS STANDARD PRODUCT
        if ($standardProduct) {

            $refPurchasePrice = $request->input('standard_product.ref_purchase_price');
            $refSellingPrice = $request->input('standard_product.ref_selling_price');
            $altCode = $request->input('standard_product.alternative_code');
            $sku = $request->input('standard_product.sku');
            $barcode = $request->input('standard_product.barcode');
            $isEnabled = $request->input('standard_product.is_enable');


            $productSku = ProductSku::create([
                'product_id' => $productId,
                'title' => '',
                'ref_purchase_price' => $refPurchasePrice,
                'ref_selling_price' => $refSellingPrice,
                'alternative_code' => $altCode,
                'sku' => $sku,
                'barcode' => $barcode,
                'enabled' => $isEnabled,
                'created_by' => auth()->id(),
                'is_default'=>true,
            ]);


        } //IS VARIANT PRODUCT
        elseif ($variantProductList) {

            foreach ($variantProductList as $key=>$item) {

                if ($key === 0 ){
                    info($item);
                }


                ProductSku::create([
                    'product_id' => $productId,
                    'title' => $item['variantName'],
                    'ref_purchase_price' => $item['refPurchasePrice'],
                    'ref_selling_price' => $item['refSellingPrice'],
                    'alternative_code' => $item['altCode'],
                    'sku' => $item['sku'],
                    'barcode' => $item['barcode'],
                    'enabled' => $item['isEnabled'],
                    'created_by' => auth()->id(),
                    'is_default'=>false,
                ]);
            }
        }

        //IS SINGLE PRODUCT UNIT
        if ($singleProductUnit) {

            $productUnitId = $request->input('single_product_unit.id');
            //!!!
            //TEMPORARY USE PRODUCT_ID AS PRODUCT_SKU_ID
            //ENHANCE IN FUTURE
            ProductSkuUnit::create([
                'product_sku_id' => $productId,
                'product_unit_id' => $productUnitId,
                'rate' => 1,
                'is_default' => true
            ]);

        } //IS MULTI PRODUCT UNIT
        elseif ($multiProductUnit) {

            $baseProductUnitId = $request->input('multi_product_unit.base_id');
            $otherUnitList = $request->input('multi_product_unit.other_units');

            ProductSkuUnit::create([
                'product_sku_id' => $productId,
                'product_unit_id' => $baseProductUnitId,
                'rate' => 1,
                'is_default' => true
            ]);

            foreach ($otherUnitList as $item){
                ProductSkuUnit::create([
                    'product_sku_id' => $productId,
                    'product_unit_id' => $item['id'],
                    'rate' => $item['ratio'],
                    'is_default' => false
                ]);
            }


        }

        return response()->json('success');
    }


    public function show(ProductSku $productSku)
    {
        //
    }


    public function update(UpdateProductSkuRequest $request, ProductSku $productSku)
    {
        //
    }


    public function destroy(ProductSku $productSku)
    {
        //
    }
}
