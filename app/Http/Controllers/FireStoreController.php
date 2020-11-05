<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FireStoreController extends Controller
{
    protected $db;

    public function __construct() {
        $this->db = app('firebase.firestore')->database();
    }

    public function index(Request $request)
    {
        $docRef =  $this->db->collection('products');


        $query = $docRef;

        if(isset($request->search))
            $query = $docRef->where('name', '=', $request->search);

        $documents = $query->documents();

        foreach ($documents as $document) {
            if ($document->exists()) {
                $products = $document->data();

                foreach ($products as $key => $items) {
                    foreach ($items as $k => $item) {
                        dd($item);
                    }
                }
                printf('Document data for document %s:' . PHP_EOL, $document->id());
                printf($document->data());
                printf(PHP_EOL);
            } else {
                printf('Document %s does not exist!' . PHP_EOL, $snapshot->id());
            }
        }
    }
}
