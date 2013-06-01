<?php

class Screenshot extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    // Screenshots belong to webapps
    public function webapps() {
    	return $this->belongsTo('Webapp');
    }
}