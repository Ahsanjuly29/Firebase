<?php

namespace App\Services;

use Exception;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Exception\Auth\EmailExists as FirebaseEmailExists;
use Kreait\Firebase\Exception\Messaging\InvalidMessage;
use Kreait\Firebase\Exception\Messaging\NotFound;
use App\FcmToken;

class FirestoreService
{

    /**
     * @var Firebase
     */
    protected $messaging;

    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount(base_path().'/Firebase.json');
        $firestore = $factory->createFirestore();
        $database = $firestore->database();

        $documentReference = $firestore->database();

        $collectionReference = $documentReference->snapshot();

        dd($collectionReference);
        $snapshot = $documentReference->snapshot();

        echo "Hello " . $snapshot['firstName'];
    }

//    public function sendNotification($title, $body, $data, $token) {
//        try {
//            $message = CloudMessage::withTarget('token', $token)->withNotification(['title' => $title, 'body' => $body])->withData($data);
//
//            $this->messaging->send($message);
//        } catch (NotFound $e) {
//            FcmToken::where('fcm_token', $token)->delete();
//        } catch (InvalidMessage $e) {
//            FcmToken::where('fcm_token', $token)->delete();
//        }
//    }
//
//    public function sendTopicNotification($title, $body, $data, $topicName) {
//        $message = CloudMessage::withTarget('topic', $topicName)->withNotification(['title' => $title, 'body' => $body])->withData($data);
//        return $this->messaging->send($message);
//    }
}
