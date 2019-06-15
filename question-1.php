<?php

/**
* Print all keys from INPUT array with their depth
*
*@param array $data as input array
*@return void
*/
function printDepth( $data ){
	$kdepth = recursiveKeys( $data );
	sort( $kdepth );//sorting keys
	echo join(PHP_EOL, $kdepth);//printing the values
	return TRUE;
}

/**
* Process array to find out its depth
*
*@param array $data as input array
*@param intger $depth as initial starting poistion
*@return array as key and value
*/
function recursiveKeys($arr, $depth=1){
	$kv = array();
	foreach($arr as $key => $value)
	{
		if(is_array( $value )) $kv = array_merge($kv, recursiveKeys($value, $depth + 1));
		$kv[] = $key. ' '.$depth;
	}
	return $kv;
}


/**
$a = array(  
	"key1" => 1, 
	"key2" => array(  
		"key3" => 1, 
		"key4" => array( "key5" => 4 ), 
	), 
);

header('Content-Type: text/plain; charset=utf-8', TRUE);//Just for browser preview

printDepth( $a );*/
?>