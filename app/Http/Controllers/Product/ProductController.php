<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Google\Cloud\Firestore\FieldValue;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $database;

    public function __construct()
    {
        $this->database = app('firebase.firestore')->database();
    }
    public function index(Request $request){
        $collections =  $this->database->collection('products');
        if ($request->filled('search')) {
            $collections = $collections->where('name', '=', $request->search);
        }
        $products = optional(optional($collections->document('+8801777519553'))->snapshot())['products'] ?? [];
        return view('backend.product.product.index', compact('products'));
    }
    public function create()
    {
        return view('backend.product.products.create');
    }

    public function get_product_last_id(){
        try{
            return $this->database->collection('products')->document('+8801745501406')->snapshot()['product_last_id'];
        }
        catch (\Exception $ex) {
            $docRef = $this->database->collection('products')->document('+8801777519553');
            $docRef->set([
                'product_last_id' => 1
            ], ['merge' => true]);
            return  1;
        }
    }
    public function store(Request $request){
        try {
            $collections =  $this->database->collection('products');
            $document = $collections->document('+8801777519553');

            $product_last_id = $this->get_product_last_id();
            $product_last_id = $product_last_id + 1;

            // $product_last_id = $collections->document('+8801777519553')->snapshot()['product_last_id'] + 1;

            $data = $request->except('_token');
            $data['product_id'] = $product_last_id;

            $docRef = $collections->document('+8801777519553');
            $docRef->update([[
                'path' => 'products', 'value' => FieldValue::arrayUnion([$data])
            ]
            ]);
            $docRef->update([[
                'path' => 'product_last_id', 'value' => FieldValue::deleteField()
            ]]);
            $docRef->set([
                'product_last_id' => $product_last_id
            ], ['merge' => true]);

            return redirect()->route('products.index')->withMessage('Product created successfully');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
    public function show($id)
    {

        return 'show';
        // try {

        //     return redirect()->back()->withMessage('Product deleted successfully');
        // } catch (\Exception $ex) {
        //     return redirect()->back()->withError($ex->getMessage());
        // }
    }
    public function edit($id)
    {
        $productReference = $this->database->collection('products')->document('+8801777519553')->snapshot()['products'];

        $product = collect($productReference)->where('id', $id)->first();

        return view('backend.product.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->destroy($id);

            $collections =  $this->database->collection('products');
            $document = $collections->document('+8801777519553');

            $data = $request->except(['_token', '_method']);
            $data['id'] = $id;

            $docRef = $collections->document('+8801777519553');
            $docRef->update([[
                'path' => 'products', 'value' => FieldValue::arrayUnion([$data])
            ]]);

            return redirect()->route('products.index')->withMessage('Product updated successfully');
        } catch (\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }
    }


    public function destroy($id)
    {

        try {
            $productReference = $this->database->collection('products')->document('+8801777519553')->snapshot()['products'];
            $product = collect($productReference)->where('id', $id)->first();

            $docRef = $this->database->collection('products')->document('+8801777519553');

            $docRef->update([
                ['path' => 'products', 'value' => FieldValue::arrayRemove([$product])]
            ]);

            return redirect()->back()->withMessage('Product deleted successfully');
        } catch (\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }
    }
}
