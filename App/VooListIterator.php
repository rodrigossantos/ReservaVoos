<?php

namespace App;

class VooListIterator {
    protected $vooList;
    protected $currentVoo = 0;

    public function __construct(VoosList $vooList_in) {
      $this->vooList = $vooList_in;
    }
    public function getCurrentVoo() {
      if (($this->currentVoo > 0) && 
          ($this->vooList->getVooCount() >= $this->currentVoo)) {
        return $this->vooList->getVoo($this->currentVoo);
      }
    }
    public function getNextVoo() {
      if ($this->hasNextVoo()) {
        return $this->vooList->getVoo(++$this->currentVoo);
      } else {
        return NULL;
      }
    }
    public function hasNextVoo() {
      if ($this->vooList->getVooCount() > $this->currentVoo) {
        return TRUE;
      } else {
        return FALSE;
      }
    }
}

?>