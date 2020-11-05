<?php

// database connection => $this->database   = app('firebase.firestore')->database();    // also called database
// database collection => $collections      = $this->database->collection('products'); // also called table
// search data         => $collections      = $collections->where('name', '=', $request->search); // also called filter
// get document id     => $document_id      = $document->id()  // also known as unique mobile number
// check exist data    => $has_document     = $document->exists() // check is there exist any data
// get data from specific document => $products = $collections->document('+8801976829262')->snapshot()->data()
