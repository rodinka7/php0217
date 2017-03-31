<?php
class Model_filelist extends Model {  

    public function get_data()
    {
        return scandir(dirname(__DIR__).'/img/');
    }
}
?>