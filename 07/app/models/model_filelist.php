<?php
use Intervention\Image\ImageManagerStatic as Image;
require_once('classesEloquent.php');

class Model_Filelist extends Model {  
	public $data;

	public function __construct(){
		parent::__construct();
	}

    public function get_data()
    {
     	$images = scandir(dirname(__DIR__).'/img/');
     	$newImgs;
     	$errors;
			
		foreach ($images as $img) {
		      if (($this->getExtension($img) == 'jpg') 
		      || ($this->getExtension($img) == 'png') 
		      || ($this->getExtension($img) == 'gif')) {
		        
				$image = Image::make('app/img/'.$img);
				$imageWidth = $image->width();
				$imageHeight = $image->height();

				$image
				    ->rotate(45)
					->text("Loftschool", $image->width() / 2, $image->height() / 2, function($font) {
				        $font->file('template/fonts/arial.ttf');
				        $font->size('32');
				        $font->color('#8c0707');
				        $font->align('center');
				        $font->valign('center');
				    })
				    ->rotate(-45)
				    ->crop($imageWidth, $imageHeight, intval($imageHeight/2), intval($imageWidth/2));
				    
				    if ($imageHeight > $imageWidth) {
				    	$image->crop($imageWidth, $imageWidth);
				    } else {
				    	$image->crop($imageHeight, $imageHeight);
				    }

				    $image->resize(480, 480);

					$image->save('app/img/'.$img);
			        
			        $newImgs[] = $img;
		    	}
		}
     	   
     	$this->data['images'] = $newImgs;
     	return $this->data;
    }

    private function getExtension($filename) {
    	return end(explode(".", $filename));
    }

    public function deleteImg() {
    	$errors;
    	$img = $_GET['img'];

    	$user = User::where('image', $img)->first();
    	$userId = $user['id'];

  		if ($userId) {
  			$user->image = '';
  			
	        if ($user->save()) {
	            $errors[] = 'У пользователя успешно удалена аватарка';
	        } else {
	        	$errors[] = 'При удалении из базы данных аватарки возникла ошибка :(';
	        }

  		} else {
  			$errors[] = 'Пользователя с аватаркой '.$img.' не нашлось!';
  		}

		$response = unlink(dirname(__DIR__).'/img/'.$img);
		
		if ($response) {
			$errors[] = 'Аватарка успешно удалена на сервере!';
		}

		$this->data['errors'] = $errors;
    }
}
?>