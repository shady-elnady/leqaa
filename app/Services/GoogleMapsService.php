<?php

namespace App\Services;

// use GuzzleHttp\Client;

// class GoogleMapsService
// {
//     public static function requestDistanceMatrix($origins, $destinations)
//     {
//         $apiKey = config('services.google_maps.api_key');
//         $client = new Client();

//         $response = $client->get('https://maps.googleapis.com/maps/api/distancematrix/json', [
//             'query' => [
//                 'origins' => $origins,
//                 'destinations' => is_array($destinations) ? implode('|', $destinations) : $destinations,
//                 'key' => $apiKey,
//             ],
//         ]);

//         return json_decode($response->getBody(), true);
//     }

//     protected static function processElements($elements, $items, $keyLat, $keyLng)
//     {
//         $nearestItems = [];

//         foreach ($elements as $index => $element) {
//             if ($element['status'] == 'OK') {
//                 $item = $items[$index];
//                 $distance = $element['distance']['value'];
//                 $duration = $element['duration']['value'];

//                 $nearestItems[] = [
//                     'item' => $item,
//                     'distanceValue' => $distance,
//                     'distanceText' => $element['distance']['text'],
//                     'durationValue' => $duration,
//                     'durationText' => $element['duration']['text'],
//                 ];
//             }
//         }

//         usort($nearestItems, function ($a, $b) {
//             return $a['distanceValue'] - $b['distanceValue'];
//         });

//         return collect($nearestItems)->map(function ($item) use ($keyLat, $keyLng) {
//             $item['item']['distance'] = $item['distanceText'];
//             $item['item']['duration'] = $item['durationText'];
//             return $item['item'];
//         });
//     }

//     public static function findNearest($origins, $destinations, $items, $keyLat, $keyLng)
//     {
//         $data = self::requestDistanceMatrix($origins, $destinations);

//         if ($data['status'] == 'OK' && !empty($data['rows'][0]['elements'])) {
//             return self::processElements($data['rows'][0]['elements'], $items, $keyLat, $keyLng);
//         }

//         return [];
//     }

//     public static function findNearestDrivers($userLat, $userLng, $drivers)
//     {
//         $origins = $userLat . ',' . $userLng;
//         foreach ($drivers as $driver) {
//             $destinations[] = $driver->lat . ',' . $driver->lng;
//         }

//         return self::findNearest($origins, $destinations, $drivers, 'lat', 'lng');
//     }

//     public static function findNearestTrips($driverLat, $driverLng, $trips)
//     {
//         $origins = $driverLat . ',' . $driverLng;
//         foreach ($trips as $trip) {
//             $destinations[] = $trip->source_lat . ',' . $trip->source_lng;
//         }

//         return self::findNearest($origins, $destinations, $trips, 'source_lat', 'source_lng');
//     }

//     public static function findNearestDeliveries($driverLat, $driverLng, $deliveries)
//     {
//         $origins = $driverLat . ',' . $driverLng;
//         foreach ($deliveries as $delivery) {
//             $destinations[] = $delivery->source_lat . ',' . $delivery->source_lng;
//         }

//         return self::findNearest($origins, $destinations, $deliveries, 'source_lat', 'source_lng');
//     }

//     public static function findTripOffers($trip)
//     {
//         $origins = $trip->source_lat . ',' . $trip->source_lng;
//         foreach ($trip->offers as $tripOffer) {
//             $destinations[] = $tripOffer->driver->lat . ',' . $tripOffer->driver->lng;
//         }

//         return self::findNearest($origins, $destinations, $trip->offers, 'lat', 'lng');
//     }

//     public static function findDeliveryOffers($delivery)
//     {
//         $origins = $delivery->source_lat . ',' . $delivery->source_lng;
//         foreach ($delivery->offers as $offer) {
//             $destinations[] = $offer->driver->lat . ',' . $offer->driver->lng;
//         }

//         return self::findNearest($origins, $destinations, $delivery->offers, 'lat', 'lng');
//     }

//     public static function getDistanceAndDurationBetweenSourceAndDest($trip)
//     {
//         $origins = $trip->source_lat . ',' . $trip->source_lng;
//         $destinations = $trip->destination_lat . ',' . $trip->destination_lng;

//         $data = self::requestDistanceMatrix($origins, $destinations);

//         if ($data['status'] == 'OK' && !empty($data['rows'][0]['elements'][0])) {
//             $element = $data['rows'][0]['elements'][0];

//             if ($element['status'] == 'OK') {
//                 return [
//                     'distance' => $element['distance']['text'],
//                     'duration' => $element['duration']['text'],
//                 ];
//             }
//         }

//         return response()->json(['error' => 'Invalid response from API.'], 400);
//     }

//     public static function getDistancesAndDurationsBetweenSourcesAndDests($trips)
//     {
//         $origins = [];
//         $destinations = [];

//         foreach ($trips as $trip) {
//             $origins[] = $trip->source_lat . ',' . $trip->source_lng;
//             $destinations[] = $trip->destination_lat . ',' . $trip->destination_lng;
//         }

//         $data = self::requestDistanceMatrix(implode('|', $origins), implode('|', $destinations));

//         $results = [];
//         if ($data['status'] == 'OK' && !empty($data['rows'])) {
//             foreach ($data['rows'] as $i => $row) {
//                 $element = $row['elements'][$i];
//                 if ($element['status'] == 'OK') {
//                     $results[$i] = [
//                         'distance' => $element['distance']['text'],
//                         'duration' => $element['duration']['text'],
//                     ];
//                 } else {
//                     $results[$i] = [
//                         'distance' => null,
//                         'duration' => null,
//                     ];
//                 }
//             }
//         }

//         return $results;
//     }
// }
