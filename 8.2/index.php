<?php
require '/../07/app/vendor/autoload.php';
require 'ClassVk.php';
define("MY_ID", "1242739");

if (($_SERVER['REQUEST_METHOD'] == 'POST') && $_FILES['image']) {
    
    $photo = $_FILES['image']['tmp_name'];
    
    $api = new VkApi();

    $api->vkRequest('photos.getWallUploadServer');//Получние ссылку от сервара для загрузки
    $linkForDownload = $api->toArray()['response']['upload_url'];
    
    $api->downloadServer($linkForDownload, $photo);

    //по ссылке от отсылаем запросы

    print_r($api->vkRequest('photos.saveWallPhoto', [
        'user_id' => MY_ID,
        'photo' => $api->requestDowl->photo,
        'server' => $api->requestDowl->server,
        'hash' => $api->requestDowl->hash,
    ]));
    
    $api->toArray();
        
    $optionsWall = array(
        'owner_id' => MY_ID,//куда отправляем
        'message' => 'Wall post',//текст
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
}
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">

    <title>VK api</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="file"> Выберите картинку: 
                <input type="file" name="image" id="file" />
            </label>
            <button class="input" type="submit">Отправить на стену</button>
        </form>
    </div>
</body>
