<?php 

    namespace Alberto\Pr;
    
    require 'vendor/autoload.php';
    use Alberto\Pr\Webbd;
    use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertNotNull;

class TestWebbd{
        public function testDeberiaMostrarLaBd(){

            $data = new Webbd();
            
            assertNotNull($data);
        }
    }