<?php
namespace Conversor\Webp\Controller;

class Builder{

  public array $image;

  function __construct(){

    $this->setImage($_FILES['image']);

  }

  public function getImage():array{
     return $this->image;
  }

  public function setImage(array $image) :void {
     $this->image = $image;
  }
}
