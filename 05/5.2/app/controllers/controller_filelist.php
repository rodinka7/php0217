<?php
use Intervention\Image\ImageManagerStatic as Image;

class Controller_filelist extends Controller {

	public function __construct(){
		parent::__construct();

		$this->model = new Model_filelist();
	}

	private function getExtension($filename) {
    	return end(explode(".", $filename));
    }

    public function action_main() {
    	session_start();
    	
    	if (!isset($_SESSION['user']) || empty($_SESSION['user'])){
			$this->view->generate('main_view.twig', array());
		} else {
			$photos = $this->model->get_data();
			
			foreach ($photos as $photo) {
			      if (($this->getExtension($photo) == 'jpg') 
			      || ($this->getExtension($photo) == 'png') 
			      || ($this->getExtension($photo) == 'gif')) {
			        
					$image = Image::make('app/img/'.$photo);
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
					    ->crop($imageWidth, $imageHeight, intval($imageHeight/2), intval($imageWidth/2))
					    ->resize(300, null, function($img){
					    	$img->aspectRatio();
					    })
					    ->save('app/img/'.$photo);
				        
				        $newPhotos[] = $photo; 
			    	}
			}

			$this->view->generate('filelist_view.twig', array(
        		'photos' => $newPhotos,
        		'uri' => 'filelist'
        	));
    	}
	}

    public function action_delete(){

    	$routes = explode('?', $_SERVER['REQUEST_URI']);
    	$img = $routes[3];
		$response = unlink(dirname(__DIR__).'/img/'.$img);
		
		if ($response) {
			echo 'Аватарка успешно удалена!';
		}
    }
}

?>