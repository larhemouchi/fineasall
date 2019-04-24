<?Php
namespace App\Helpers\Usability;

class Decore {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */
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
	      }else{
	          return $colors[$item];
	      }


    }
}