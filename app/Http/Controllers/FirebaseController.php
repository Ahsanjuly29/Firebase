<?php

namespace App\Http\Controllers;

use App\Traits\FirebaseConnection;
use Illuminate\Http\Request;

use Kreait\Firebase;

use Kreait\Firebase\Factory;

use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
    use FirebaseConnection;

    public function index() {

        $database = $this->getConnection();

        // get all products
        $allProducts = $database->getReference('blog/products/')->getValue();

        $filteredProducts = collect($allProducts)->filter(function ($product, $key) {
            return $product != null;
        })->where('name', 'O ho ho abar hoiche')->first();


        // get specific product
        $findProductById = $database->getReference('blog/products/' . 4)->getValue();


        // delete specific product
        $delete = $database->getReference('blog/products/' . 4)->remove();


        // ##########################            add new record       ###########################
        $getMaxProductId = $database->getReference('blog/products/')->getChildKeys();
        $maxProductId = max($getMaxProductId) + 1;

        $addNewProduct = $database->getReference('blog/products/' . $maxProductId)->update(['name' => 'panir bottol','quantity' => 120, 'price' => 130]);

        dd($addNewProduct);
    }
}

