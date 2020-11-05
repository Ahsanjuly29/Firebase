<?php
namespace App\Traits;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


trait FirebaseConnection {

    public function getConnection()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase-realtime.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://dokani-2ba87.firebaseio.com')
            ->create();

        return $database = $firebase->getDatabase();
    }
}
