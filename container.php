<?php 
abstract class Container {
    private $ar;
    function __construct($it) {
        $this->ar = $it;
    }

    protected function getArray() {
        return $this->ar;
    }
          
    abstract function info(): string;
}
?>