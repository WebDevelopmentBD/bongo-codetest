<?php
/**
PHP Unit Test for these three solution(s)
Question 1, 2, 3
*/

include('../question-1.php');
include('../question-2.php');
include('../question-3.php');

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testQuestion1()
    {
		$a = array(  
			"key1" => 1, 
			"key2" => array(  
				"key3" => 1, 
				"key4" => array( "key5" => 4 ), 
			), 
		);

        $this->assertTrue(printDepth( $a ));
    }

    public function testQuestion2()
    {
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

        $this->assertTrue(printDepth( $a ));
    }
	
	public function testQuestion3()
    {
		$root = new Node( 1 );
		
		$root->left = new Node( 2 );
		$root->right= new Node( 3 );
		
		$root->left->left = new Node( 4 );
		$root->left->right = new Node( 5 );
		
		$root->right->left = new Node( 6 );
		$root->right->right = new Node( 7 );
		
		$root->left->left->left = new Node( 8 );
		$root->left->left->right = new Node( 9 );

        $this->assertEquals(3,  lca(6, 7));
		$this->assertEquals(3,  lca(3, 7));
    }
}
?>