<?php

namespace App\Services;

// use Kreait\Firebase\Factory;
// use Kreait\Firebase\Messaging\CloudMessage;
// use Kreait\Firebase\Exception\MessagingException;
// use App\Models\Notification;

// class FirebaseService
// {
//     protected $messaging;

//     public function __construct()
//     {
//         $factory = (new Factory)
//             ->withServiceAccount(__DIR__ . '/firebase_credentials.json');

//         $this->messaging = $factory->createMessaging();
//     }

//     /**
//      * Generates a notification with the given title, body, and metadata.
//      *
//      * @param string $title The title of the notification.
//      * @param string $body The body of the notification.
//      * @param array $metaData The metadata associated with the notification.
//      * @return array The generated notification data.
//      */
//     public function generateNotification(string $title, string $body, array $metaData)
//     {
//         $data = [
//             'title' => $title,
//             'body' => $body,
//             'data' => $metaData
//         ];

//         return $data;
//     }

//     /**
//      * Send a notification to a specific device.
//      *
//      * @param string $deviceToken
//      * @param string $title
//      * @param string $body
//      * @param array $data
//      * @return void
//      */
//     public function notify($deviceToken, $data = [])
//     {
//         if (is_null($deviceToken)) {
//             return;
//         }

//         $message = CloudMessage::withTarget('token', $deviceToken)
//             ->withNotification(['title' => $data['title'], 'body' => $data['body']])
//             ->withData($data['data']);

//         $notification = Notification::create([
//             'device_token' => $deviceToken,
//             'title' => $data['title'],
//             'body' => $data['body'],
//             'data' => $data['data'],
//             'status' => 'pending',
//         ]);

//         try {
//             $this->messaging->send($message);
//             $notification->update(['status' => 'sent']);
//         } catch (MessagingException $e) {
//             $notification->update([
//                 'status' => 'failed',
//                 'error_message' => $e->getMessage(),
//             ]);
//         }
//     }
// }
