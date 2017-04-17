<?php
class VkApi
{
    public $myID  = '5986992';
    public $token = '074df39e1f67e2b03dd67aa8489e0a3c79d9c9c2723cf9b5ff1bf1a7adfcf0c99579c4a7f3188f22220f1';

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
        $cfile = curl_file_create($nameFile, 'image/jpeg', $nameFile);
        print_r($cfile);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL            => $link,
            CURLOPT_POST           => 1,
            CURLOPT_POSTFIELDS     => array("image" => $cfile)
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