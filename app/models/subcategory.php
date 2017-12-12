<?php
class Subcategory extends Eloquent 
{
	protected $table 	= "subcategories";
	public function Category()
	{
		return $this->hasOne('Category');
	}
}