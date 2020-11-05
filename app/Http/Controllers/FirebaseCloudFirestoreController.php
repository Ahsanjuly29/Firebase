<?php

namespace App\Http\Controllers;

use App\Services\FirestoreService;
use App\Traits\FirebaseConnection;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Http\Request;

use Kreait\Firebase;

use Kreait\Firebase\Factory;

use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;

class FirebaseCloudFirestoreController extends Controller
{
//    use FirebaseConnection;

    public function index()
    {
        $firestore = new FirestoreClient([
            'projectId' => 'dokani-2ba87',
        ]);

//        $collectionReference = $firestore->collection('products')->document('+8801745501406');
        $collectionReference = $firestore->collection('products');
        dd($collectionReference);
//        $documents = $firestore->documents([
//            '+8801745501406'
//        ]);
//
//        foreach ($documents as $document) {
//            dd($document);
//            if (!$document->exists()) {
//                echo $document->id() . ' Does Not Exist';
//            }
//        }

        $collectionReference->document('+8801745501406');
        dd($collectionReference);

        $snapshot = $collectionReference->snapshot();
        dd($firestore);

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount);
        $firestore = new FirestoreClient([
            'projectId' => 'dokani-2ba87',
        ]);


        $documentReference = $collectionReference->document('Search element from document');
        $snapshot = $documentReference->snapshot();
        $database = $this->getConnection();

        dd($database);

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

        $addNewProduct = $database->getReference('blog/products/' . $maxProductId)->update(['name' => 'panir bottol', 'quantity' => 120, 'price' => 130]);

        dd($addNewProduct);
    }
}

