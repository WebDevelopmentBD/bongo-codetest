<?php
/**
* Print all keys from INPUT array with their depth
*
*@param array $data as input array
*@return void
*/
function printDepth( $data ){
	$kdepth = recursiveKeys( $data );
	echo join(PHP_EOL, $kdepth);//printing the values
	return TRUE;
}

/**
* Process array to find out its depth
*
*@param mixed $data as input array or object
*@param intger $depth as initial starting poistion
*@return array as key with value
*/
function recursiveKeys($arr, $depth=1){
	$kv = array(); $token = is_array( $arr )? ' ':': ';
	foreach((array)$arr as $key => $value)
	{
		if(is_array( $value ) || is_object( $value )) $kv = array_merge($kv, recursiveKeys($value, $depth + 1));
		$kv[] = $key. $token .$depth;
	}
	return $kv;
}

class Person
{ 
    public function __construct($first_name, $last_name, $father){ 
        $this->first_name = $first_name; 
        $this->last_name = $last_name; 
        $this->father = $father; 
	}
}

/**----------Code Test
$person_a = new Person("User", "1", NULL);
$person_b = new Person("User", "2", $person_a);
 
$a = array(  
	"key1" => 1, 
	"key2" => array(  
		"key3" => 1, 
		"key4" => array ( 
			"key5" => 4, 
			"User" => $person_b, 
		 ), 
	), 
); 

header('Content-Type: text/plain; charset=utf-8', TRUE);//Just for browser preview

printDepth( $a );*/
?>