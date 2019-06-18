<?Php
namespace App\Helpers\Usability;

use Illuminate\Http\Request;
use Illuminate\Support\Optional;
use Session;
use File;

/*

function cacul_pourcentage($nombre,$total,$pourcentage)
{ 
  $resultat = ($nombre/$total) * $pourcentage;
  return round($resultat); // Arrondi la valeur
}
*/

class Configuration{

	public static function hours($value = null){

		$arr = [

				'15:10',
				'18:45',
				'21:00'

			];

		if( isset( $value ) ){
			return $arr[$value];
		}else{
			return $arr;
		}
	}

}

class Voiding{
	public static function optional($value = null, callable $callback = null)
    {
        if (is_null($callback)) {
            return new Optional($value);
        } elseif (! is_null($value)) {
            return $callback($value);
        }
    }

/*
    public static function getSalleName($object, $rep){

    	if(self::optional($this->rep->salle) == self::optional(null)){

    		return $object;

    	}else{

    		return Salle::find( $rep->salle->id );

    		
    	}




    }

*/
}

class Img {
	public static function noimg( $model_name, $what = null){


		if($what == null || $what == ''  ){



			return config('app.noimg');

		}else{


			return 'uploads/'.$model_name.'/'.$what;

		}

	}

	public static function store(Request $request, $model_name, $name)
	{ 




        if ($request->hasFile('img')) {


            $img = $request->file('img');

            $folder = '/uploads/'.$model_name.'/';

            $img_name = str_slug($request->input($name));


            //dd($filePath);

            $img->move(public_path().$folder,$img_name.'.'.$img->getClientOriginalExtension());


            return $img_name. '.' . $img->getClientOriginalExtension();


        }else{
        	return '';
        }

	  
	}




	public static function delete($model,$model_name, $name )
	{


		if($model->img != ''){


			$folder = '/uploads/'.$model_name.'/';

			//File::delete($folder. $model->img );

			$path = public_path().$folder.$model->img;

			if( file_exists($path) ){

				unlink($path);

			} 

			
			
			

		}

	  
	}


}

class Math {

	public static function pourcentage($nombre,$pourcentage)
	{ 
	  $resultat = $nombre * $pourcentage/100;
	  return round($resultat); // Arrondi la valeur
	}

}

class Money {

	public static function limit($money)
	{ 

		return $money > config('app.limit_argent')? $money : config('app.limit_argent') ;

	}

}

class Decore {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */

    public static function salle_theatre($item){

		

	    $imgs = [
			's1.png',
			's2.jpg',
			's3.jpg',
			's4.jpg',

		];

		$random_img = $imgs[array_rand($imgs)];


		if( Session::get('key-salle-img-'.$item ) ){

			return Session::get('key-salle-img-'.$item );

		}else{

			Session::put('key-salle-img-'.$item , $random_img );


			return Session::get('key-salle-img-'.$item  );

		}

	


    }


    public static function colors($item = null) {

	    $colors = [
			'#fad390',
			'#f8c291',
			'#6a89cc',
			'#82ccdd',
			'#b8e994',
			'#f6b93b',

			'#e55039',
			'#4a69bd',
			'#60a3bc',
			'#60a3bc',
			'#78e08f',


			'#fa983a',
			'#eb2f06',
			'#1e3799',
			'#3c6382',
			'#38ada9',
			'#e58e26',

			'#b71540',
			'#0c2461',
			'#0a3d62',
			'#079992',

		];

		

		if( $item == null){
	          return $colors;
	      }elseif($item == 'random'){
	      	return $colors[array_rand($colors)];
	      }
	      else{
	          return $colors[$item];
	      }


    }


    public static function colorsCats($item) {

    	switch ($item) {
		    case 'DERIERE':
		        return '#079992';
		        break;
		    case 'ANDICAPE':
		        return '#0a3d62';
		        break;
		    case 'DERIERE':
		        return '#b71540';
		        break;
		    case 'NORMAL':
		        return '#78e08f';
		        break;
		    case 'VIP':
		        return '#f6b93b';
		        break;

		    case 'BALCON':
		        return '#4a69bd';
		        break;

		}

		

    }
}