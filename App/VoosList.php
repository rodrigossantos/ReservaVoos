<?php

namespace App;

class VoosList {
    private $voos = array();
    private $vooCount = 0;
    public function __construct() {
    }
    public function getVooCount() {
      return $this->vooCount;
    }
    private function setVooCount($newCount) {
      $this->vooCount = $newCount;
    }
    public function getVoo($vooNumberToGet) {
      if ( (is_numeric($vooNumberToGet)) && 
           ($vooNumberToGet <= $this->getVooCount())) {
           return $this->voos[$vooNumberToGet];
         } else {
           return NULL;
         }
    }
    public function addVoo(Voos $voo_in) {
      $this->setVooCount($this->getVooCount() + 1);
      $this->voos[$this->getVooCount()] = $voo_in;
      return $this->getVooCount();
    }
    public function removeVoo(Voos $voo_in) {
      $counter = 0;
      while (++$counter <= $this->getVooCount()) {
        if ($voo_in->getAuthorAndTitle() == 
          $this->voos[$counter]->getAuthorAndTitle())
          {
            for ($x = $counter; $x < $this->getVooCount(); $x++) {
              $this->voos[$x] = $this->voos[$x + 1];
          }
          $this->setVooCount($this->getVooCount() - 1);
        }
      }
      return $this->getVooCount();
    }
}

?>