<?php
class VkApi
{
    public $myID  = '5989444';
    public $token = 'a4f3591af5f29c4d52a6eeb5d1bc51cf1c2b6c92cfd4c415c5948d30ff78c1e25eb32a3385858df3be97f';

    public $responseJson;
    public $requestDowl;
    public $ArrayInJson;

    public function vkRequest(string $method, array $options = []) : string {
        $params  =  http_build_query($options);
        $url     = 'https://api.vk.com/method/' . $method . '?' . $params . '&access_token=' . $this->token;
        return $this->push($url);
    }
    //метод для загрузки картики на сервер VK
    public function downloadServer($link, $nameFile)
    {
        $curl = curl_init();

        $cfile = curl_file_create($nameFile, 'image/jpeg', $nameFile);

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL            => $link,
            CURLOPT_POST           => 1,
            CURLOPT_POSTFIELDS     => ['photo' => $cfile]
        ));
        
        $this->requestDowl = json_decode(curl_exec($curl));
    }
    //Работаем только с массивом,преобразуем в массив
    public function toArray(){
        $this->ArrayInJson = json_decode($this->responseJson, 1);
        return $this->ArrayInJson;
    }
    //Вывод в json
    public function toJson()
    {
        echo  $this->responseJson;
    }
    private function push($url) : string
    {
        $curl    = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_URL,$url);
        $this->responseJson = curl_exec($curl);
        curl_close($curl);
        return $this->responseJson;
    }
}
?>