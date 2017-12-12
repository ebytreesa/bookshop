<?php
class Category extends Eloquent 
{
	protected $table 	= "categories";
	public function subcategory()
	{
		return $this->hasMany('Subcategory');
	}

	
}