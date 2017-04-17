<?php
require '../07/app/vendor/autoload.php';
require 'ClassVk.php';
define("MY_ID", "1242739");
/**
 * @link https://vk.com/dev/wall.post
 * @link https://habrahabr.ru/company/mailru/blog/115163/
 **/

$api = new VkApi();

// СПИСОК ДРУЗЕЙ ОНЛАЙН
/*$api->vkRequest('friends.getOnline', [
    'user_id' => ''
]);
dd($api->toArray());

// Получение списка стран из России
$api->vkRequest('database.getCities', [
    'country_id' => 1 //Россия
]);
dd($api->toArray());

// ОТПРАВКА НА СТЕНУ
$api->vkRequest('wall.post', [
    'owner_id'      => '1242739',
    'friends_only1' => 0,
    'message'       => 'Отправил из программы',
]);
dd($api->toArray());*/

// 77420846
// ОТПРАВКА ПОСТА С ФОТО
echo '<pre>';

$api->vkRequest('photos.getWallUploadServer');//Получние ссылку от сервара для загрузки
$linkForDownload = $api->toArray()['response']['upload_url'];
print_r($api->downloadServer($linkForDownload, 'startNight.jpg'));

//по ссылке от отсылаем запросы
 $api->vkRequest('photos.saveWallPhoto', [
        'user_id' => MY_ID,
        'photo' => $api->requestDowl->image,
        'server' => $api->requestDowl->server,
        'hash' => $api->requestDowl->hash,
    ]);
    $api->toArray();
    
    $optionsWall = array(
        'owner_id' => MY_ID,//куда отправляем
        //'message' => 'Wall post',//текст
        'attachments' => $api->ArrayInJson['response'][0]['id']//что отправить
    );
    $api->vkRequest('wall.post', $optionsWall);
    $api->toArray();
  
    $result = $api->ArrayInJson['response']['post_id'];
    
    if ($result) {
       echo 'Пост успешно добавлен на стену';
    } else {
        echo $api->ArrayInJson['error']['error_msg'];
    }
?>
