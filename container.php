<?php 
abstract class Container {
    private $ar;
    function __construct($it) {
        $this->ar = $it;
    }

    protected function getArray() {
        return $this->ar;
    }

    protected function checkPicture(string $source): string {
        if (strcmp($source, "no img") !== 0) {
            return $source;
        }
        return "img/no_img.png";
    }
          
    abstract function info(): string;
}
?>