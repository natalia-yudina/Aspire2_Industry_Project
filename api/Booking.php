<?php

//class for the events
class Booking {

	public $title;
	public $start;
	public $end;
	public $allDay = false;
	public $backgroundColor;
	public $borderColor;
	public $url;
	public $className;
	public $block = false;
	public $description;

	// list of the assigned junior coaches
	public $jc_list;
	// id_class
	public $ev_id_class;
	// head coach
	public $hc;

	public function __constructor($t, $s) {
		$this->title = $t;
		$this->start = $s;
	}

}
?>
