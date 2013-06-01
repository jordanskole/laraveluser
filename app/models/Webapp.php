<?php

class Webapp extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    // Webapps belong to users
    public function users() {
    	return $this->hasOne('User');
    }

    // Webapps have many screenshots
    public function screenshots() {
    	return $this->hasMany('Screenshot');
    }

}