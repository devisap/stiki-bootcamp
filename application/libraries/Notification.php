<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Notification {

    public function push($param){
        $curl = curl_init();
        $authkey = 'key=AAAAcOn1dgM:APA91bGAKGQR5BmowSlZqgqKe7VUcQrfF7WwgyLehPbmWddgMLvWpI84hjSVnjK4zLb6FFk_7WXexvDyatVAjkToJ_F5jrgMCso1q5wJDvMUdJUgscS0XTNSgXmjZp6DLUQkRN1nBYR2';
        
        $regisIds = array();
        foreach($param['regisIds'] as $item){
          if($item['TOKEN'] != null){
            array_push($regisIds, '"'.$item['TOKEN'].'"');
          }
        }
        $regisIds = implode(',', $regisIds);

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
          "registration_ids":['.$regisIds.'],
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
