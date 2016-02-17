<?php
/** Класс для работы со специальным форматом шрифтов GDF используемым в
 * библиотеке GD php.
 *
 * Поддерживает конвертацию шрифта TTF в GDF формат.
 * Поддерживает создание своего GDF-шрифта из набора изображений
 *
 * @author InSys, http://intsystem.org/
 *
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Copyright (c) 2012, InSys
 */
class GDFConvertor{
	/** Установить в false для подавления всех генерируемых E_USER* ошибок */
	const CLASS_DEBUG=true;

	/** Преобразование результата функции imagettfbbox() в человеко-читаемый вид
	 *
	 * @param array $box результат функции imagettfbbox
	 * @return array
	 */
	private function BoxConvert($box){
		$minX = min(array($box[0], $box[2], $box[4], $box[6]));
		$maxX = max(array($box[0], $box[2], $box[4], $box[6]));
		$minY = min(array($box[1], $box[3], $box[5], $box[7]));
		$maxY = max(array($box[1], $box[3], $box[5], $box[7]));


		return array(
			'width'  => $maxX - $minX,
			'height' => $maxY - $minY,

			'top'=>array(
				'left'	=> array('x'=>$box[6], 'y'=>$box[7]),
				'right'	=> array('x'=>$box[4], 'y'=>$box[5]),
			),
			'bottom'=>array(
				'left'	=> array('x'=>$box[0], 'y'=>$box[1]),
				'right'	=> array('x'=>$box[2], 'y'=>$box[3]),
			),
		);
	}

	/** Проверка наличия библиотеки GD и FreeType
	 *
	 * @param boolean $check_free_type [опционально] true - проверять наличие библиотеки FreeType, false (дефолт) - не проверять
	 * @return boolean
	 */
	private function CheckGD($check_free_type=false){
		if(!extension_loaded('gd')){
			return false;
		}

		if($check_free_type){
			if(!function_exists('gd_info')){
				return false;
			}

			$arr=gd_info();
			if(!array_key_exists('FreeType Support', $arr)){
				return false;
			}

			if($arr['FreeType Support']===false){
				return false;
			}
		}

		return true;
	}

	/** Переконвертировать TTF-шрифт в GDF-шрифт
	 *
	 * @param string $ttf_file путь к файлу с TTF-шрифтом
	 * @param integer $char_size размер выходного шрифта в PT
	 * @param array $char_names [опционально] массив со списком конвертируемых символов, если не указанно, будут загруженны все символы
	 * @return string бинарное содержимое файла-шрифта, null - в случае неудачи
	 */
	function GenerateGdfFromTTF($ttf_file, $char_size, $char_names=null){
		if(!$this->CheckGD(true)){
			if(self::CLASS_DEBUG){
				trigger_error(__METHOD__.': GD library or FreeType library has not been loaded', E_USER_WARNING);
			}
			return null;
		}

		if(!file_exists($ttf_file)){
			if(self::CLASS_DEBUG){
				trigger_error(__METHOD__.': file "'.htmlspecialchars($ttf_file).'" does not exists', E_USER_WARNING);
			}
			return null;
		}

		$max_width=0;
		$max_height=0;
		$char_height=0;

		if(!is_array($char_names) || count($char_names)==0){
			$char_names=range(0, 255);
			$char_names=array_map('chr', $char_names);
		}

		$box=$this->BoxConvert(imagettfbbox($char_size, 0, $ttf_file, str_replace("\0", '', implode('', $char_names))));
		$char_height=$box['height'];

		$char_boxes=array();
		$char_max=null;
		foreach($char_names as $char){
			$box=$this->BoxConvert(imagettfbbox($char_size, 0, $ttf_file, $char));

			$box_width=$box['width'];
			$box_height=abs($box['top']['left']['y']);

			$char_boxes[$char]=$box;

			if($box_width>$max_width){
				$max_width=$box_width;
				$char_max_width=$char;
			}
			if($box_height>$max_height){
				$max_height=$box_height;
				$char_max_height=$char;
			}
		}

		$char_resources=array();
		foreach($char_names as $key => $char){
			$resource=imagecreate($max_width, $char_height);

			$color_white=imagecolorallocate($resource, 255, 255, 255);
			$color_black=imagecolorallocate($resource, 0, 0, 0);
			$box=$char_boxes[$char];

			imagefilledrectangle($resource, 0, 0, $max_width, $max_height, $color_white);


			$x=-1;
			$y=$max_height-1;

			imagettftext($resource, $char_size, 0, $x, $y, $color_black, $ttf_file, $char);

			$char_resources[$key]=$resource;
		}

		$result=$this->GenerateGdfFromResources($char_names, $char_resources, $max_width, $char_height);

		foreach($char_resources as $resource){
			if(is_resource($resource)){
				imagedestroy($resource);
			}
		}

		return $result;
	}

	/** Сгенерировать GDF-шрифт на основе списка изображений
	 *
	 * @param array $char_names массив с символами
	 * @param array $char_resources массив с списком путей к изображениям символов в порядке соответствующему параметру "$char_names"
	 * @param integer $char_width ширина всех символов
	 * @param integer $char_height высота всех символов
	 * @return string бинарное содержимое файла-шрифта, null - в случае неудачи
	 */
	function GenerateGdfFromFiles($char_names, $char_files, $char_width, $char_height){
		if(!$this->CheckGD()){
			if(self::CLASS_DEBUG){
				trigger_error(__METHOD__.': GD library has not been loaded', E_USER_WARNING);
			}
			return null;
		}

		$char_resources=array();

		foreach($char_files as $key => $file){
			$resource=null;
			if(file_exists($file)){
				$resource=$this->ImageLoadFile($file);
			}

			if(is_resource($resource)){
				$char_resources[$key]=$resource;
			}else{
				if(self::CLASS_DEBUG){
					trigger_error(__METHOD__.': can not load "'.htmlspecialchars($file).'"', E_USER_WARNING);
				}
				return null;
			}
		}

		$result=$this->GenerateGdfFromResources($char_names, $char_resources, $char_width, $char_height);

		foreach($char_resources as $resource){
			if(is_resource($resource)){
				imagedestroy($resource);
			}
		}

		return $result;
	}

	/** Сгенерировать GDF-шрифт на основе уже открытых ресурсов изображений
	 *
	 * @param array $char_names массив с символами
	 * @param array $char_resources массив с ресурсами в порядке соответствующему параметру "$char_names"
	 * @param integer $char_width ширина всех символов
	 * @param integer $char_height высота всех символов
	 * @return string бинарное содержимое файла-шрифта, null - в случае неудачи
	 */
	function GenerateGdfFromResources($char_names, $char_resources, $char_width, $char_height){
		if(!$this->CheckGD()){
			if(self::CLASS_DEBUG){
				trigger_error(__METHOD__.': GD library has not been loaded', E_USER_WARNING);
			}
			return null;
		}

		if(count($char_names) !== count($char_resources)){
			if(self::CLASS_DEBUG){
				trigger_error(__METHOD__.': number of elements in the "char_names" array does not match the number of elements in the "char_resources" array', E_USER_WARNING);
			}
			return null;
		}

		$chars=array();
		$names_keys=array_keys($char_names);
		$names_resources=array_keys($char_resources);

		for($i=0, $x=count($names_keys); $i<$x; $i++){
			$chars[$char_names[$names_keys[$i]]]=$char_resources[$names_resources[$i]];
		}

		ksort($chars, SORT_STRING);
		$char_names=array_keys($chars);

		$tmp=array_map('ord', $char_names);

		$binary_data='';

		$binary_data.=$this->IntToBinary(max($tmp) - min($tmp) + 1);
		$binary_data.=$this->IntToBinary(ord(strval($char_names[0])));
		$binary_data.=$this->IntToBinary($char_width);
		$binary_data.=$this->IntToBinary($char_height);

		$last_char_name=null;
		foreach($chars as $char_name => $char_resource){

			if(!is_null($last_char_name)){
				$diff=ord($char_name)-ord($last_char_name);

				if($diff>1){
					$binary_data.=implode('', array_fill(0, (($diff-1)*$char_width*$char_height), chr(0)));
				}
			}

			$matrix=$this->GenerateGdfMatrix($char_resource, $char_name, $char_width, $char_height);

			if(is_null($matrix)){
				if(self::CLASS_DEBUG){
					trigger_error(__METHOD__.': can not load image file of char "'.htmlspecialchars($char_name).'"', E_USER_WARNING);
				}
				return null;
			}

			foreach($matrix as $char){
				$binary_data.=chr($char);
			}

			$last_char_name=$char_name;
		}

		return $binary_data;
	}

	/** Сгенерировать матрицу пикселей на основе исходного изображения
	 *
	 * @param resource $gd_resource ресурс изображения
	 * @param char $char_name текущий символ
	 * @param integer $char_width ширина участка с символом
	 * @param integer $char_height высота участка с символом
	 * @return array матрица из 0 и 1, null - в случае неудачи
	 */
	private function GenerateGdfMatrix($gd_resource, $char_name, $char_width, $char_height){
		$width =imagesx($gd_resource);
		if($width===false){
			return null;
		}

		$height=imagesy($gd_resource);
		if($height===false){
			return null;
		}

		if($width>$char_width){
			$width=$char_width;
		}elseif($width<$char_width){
			if(self::CLASS_DEBUG){
				trigger_error(__METHOD__.': width of the image character of "'.htmlspecialchars($char_name).'" is less than "'.htmlspecialchars($char_width).'" pixels');
			}
			return null;
		}

		if($height>$char_height){
			$height=$char_height;
		}elseif($height<$char_height){
			if(self::CLASS_DEBUG){
				trigger_error(__METHOD__.': height of the image character of "'.htmlspecialchars($char_name).'" is less than "'.htmlspecialchars($char_height).'" pixels');
			}
			return null;
		}

		$matrix=array();

		for($y=0; $y<$height; $y++){
			for($x=0; $x<$width; $x++){
				$color_index=imagecolorat($gd_resource, $x, $y);
				$color=imagecolorsforindex($gd_resource, $color_index);


				$mcolor=round(($color['red']+$color['green']+$color['blue'])/3);

				if(isset($color['alpha']) && $color['alpha']!=0){
					$mcolor = ($mcolor * (127 - $color['alpha']) + 255 * $color['alpha']) / 127;
				}

				$matrix[]=($mcolor < 240 ? 1 : 0);
			}
		}

		return $matrix;
	}


	/** Упаковать число в двоичный формат
	 *
	 * @param integer $int 32-битное число
	 * @return string 4-ех байтовая строка
	 */
	private function IntToBinary($int){
		$int=intval($int);

		return (pack('l', $int));
	}

	/** Загрузить файл с изображением
	 *
	 * @param string $filename имя файла
	 * @return resource выходной ресурс изображения, null - в случае ошибки
	 */
	private function ImageLoadFile($filename){
		if(!file_exists($filename)){
			return null;
		}

		$extension=substr($filename, strrpos($filename, '.'));
		$extension=strtolower($extension);

		switch($extension){
			case '.gif': return imagecreatefromgif($filename);

			case '.png': return imagecreatefrompng($filename);

			case '.jpeg':
			case '.jpg': return imagecreatefromjpeg($filename);
		}

		return null;
	}
}
?>
