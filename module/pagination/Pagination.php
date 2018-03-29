<?php

class Pagination
{
    public $current;
    public $first;
    public $last;
    private $displayMode;
    private $range;

    public function __construct($current, $first, $last, $displayMode = "SMALL"){
        $this->current = $current;
        $this->first = $first;
        $this->last = $last;
        $this->displayMode = $displayMode;

        $this->setRange();
    }

    public function render($additionalClass = ''){
        $htmlPagination = '';
        $htmlStart = '';
        $htmlLast = '';

        $start = $this->current - $this->range;
        if( $start <= $this->first) $start = $this->first;
        else {
            $htmlStart = '<li><span>'.$this->first.'</span></li>';
            if($start > ($this->first +1) ) $htmlStart .= '<li><span class="disabled">...</span></li>';
        }

        $end = $this->current + $this->range;
        if( $end >= $this->last) $end = $this->last;
        else {
            if($end < ($this->last -1) ) $htmlLast = '<li><span class="disabled">...</span></li>';
            $htmlLast .= '<li><span>'.$this->last.'</span></li>';
        }

        for($i=$start; $i <= $end; $i++) {
            $active = '';
            if($i == $this->current) $active = 'class="active"';

            $htmlPagination .= '<li '.$active.'><span>'.$i.'</span></li>';
        }


        echo '<ul class="pagination '.$additionalClass.'">'.$htmlStart.$htmlPagination.$htmlLast.'</ul>';
    }

    private function setRange(){
        switch($this->displayMode) {
            case "SMALL":
                $this->range = 2;
                break;
            case "MEDIUM":
                $this->range = 4;
                break;
            case "LONG":
                $this->range = 6;
                break;
        }
    }

    public function getFirst() {
        return $this->first;
    }

    public function getLast() {
        return $this->last;
    }

    public function getCurrent() {
        return $this->first;
    }

    public function getNext() {
        return $this->current + 1 > $this->last ? $this->last : $this->current + 1;
    }

    public function getPrevious() {
        return $this->current - 1 < $this->first ? $this->first : $this->current - 1;
    }
}

