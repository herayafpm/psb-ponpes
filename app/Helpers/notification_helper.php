<?php

use GuzzleHttp\Client;
use App\Models\NotificationsModel;

function notif($user_id, $to = "", $title = "", $body = "", $data = ["foo" => "bar"])
{
  $notificationModel = new NotificationsModel();
  $notificationModel->save([
    'user_id' => $user_id,
    'notification_title' => $title,
    'notification_body' => $body,
  ]);
  if ($to != "") {
    $client = new Client();
    $response = $client->post('https://onesignal.com/api/v1/notifications', [
      \GuzzleHttp\RequestOptions::JSON => [
        "app_id" => "246fbd22-450f-4ffb-b5b6-5bc03fbf6046", "include_player_ids" => [$to],
        "data" => $data,
        "headings" => ["en" => $title],
        "contents" => ["en" => $body],
        "subtitle" => ["en" => $body],
        "large_icon" => base_url('') . "/assets/images/icon.png",
        "small_icon" => "ic_stat_onesignal_default",
        "android_channel_id" => "f40acc7d-4380-41d3-be6e-3779e8ce04d5"
      ]
    ]);
  }
  // return $response;
}
