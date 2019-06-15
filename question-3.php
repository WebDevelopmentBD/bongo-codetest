<?php
/**
* Find the Least Common Ancestor from a nodes
*
*@param integer $node1 as input node
*@param integer $node2 as input node
*@return integer
*/
function lca($node1, $node2) { 
	global $root;//binary tree
	
	$node = traverseLca($root, $node1, $node2);
	//print_r( $root );
	if( $node ) return $node->value;
	return NULL;
}

function traverseLca($btree, $n1, $n2){

	if(!isset( $btree->value )) return NULL;//Base in-case
	
	if($n1 == $btree->value || $n2 == $btree->value){
		return $btree;
	}
	
	//Search for the nodes
	$left = traverseLca($btree->left, $n1, $n2);
	$right = traverseLca($btree->right, $n1, $n2);
	
	if ($left != NULL && $right != NULL){
		return $btree; //Has value
	}
	
	//Check individual subtree is LCA 
	return ($left != NULL) ? $left:$right; 
}

class Node
{ 
	var $left; 
	var $right;
	var $value;
	
	function __construct( $num = 1 ){
		$this->value = $num;
	}
}
 
/**----------Code Test
 
header('Content-Type: text/plain; charset=utf-8', TRUE);//Just for browser preview


//==creating the binary tree
$root = new Node( 1 );

$root->left = new Node( 2 );
$root->right= new Node( 3 );

$root->left->left = new Node( 4 );
$root->left->right = new Node( 5 );

$root->right->left = new Node( 6 );
$root->right->right = new Node( 7 );

$root->left->left->left = new Node( 8 );
$root->left->left->right = new Node( 9 );


echo lca(6, 7), PHP_EOL;
echo lca(3, 7), PHP_EOL;*/
?>