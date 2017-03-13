Utilisation de PHPUnit

Requis : 
	- composer update

Classe de test
	class ExempleTest extends PHPUnit_Framework_TestCase{
		public function testFunction(){
			//$this->assertEquals($expected,$actual,["message"]);
			$this->assertEquals(100,\namespace\Exemple::function($param),"Function devrait retourner 100");
		}
	}
	
Tester en console :
	./vendor/bin/phpunit <test directory>
