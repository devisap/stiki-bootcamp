<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Notification {

    public function push($param){
        $curl = curl_init();
        $authkey = 'key=AAAAQ5rQk00:APA91bElnT8bZpx2QuE2RNFxNJEGIz0v6cU86NplNVhv-WSvGCzWqYxQ8Ji6BQm6Ii6_iCXw_RHQzP5MeIUn7CYRunNtMW1oTJutpl8AuIM-MASNFudqlfjh1JiFyd8SPu8zN3nNXr5r';
        // $regisIds = array();
        // foreach($param['regisIds'] as $item){
        //   if($item['TOKEN_USERS'] != null){
        //     array_push($regisIds, '"'.$item['TOKEN_USERS'].'"');
        //   }
        // }
        // $regisIds = implode(',', $regisIds);

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
          "registration_ids":["'.$param['regisIds'].'"],
          "notification": {
              "title":"'.$param['title'].'",
              "body":"'.$param['message'].'",
              "icon":"myicon",
              "sound":"default"
          }
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$authkey
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;
    }
}
