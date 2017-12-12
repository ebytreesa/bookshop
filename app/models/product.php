<?php
class Product extends Eloquent 
{
	protected $table 	= "products";
	public function category()
	{
		return $this->belongsTo('Category');
	}

	public function subcategory()
	{
		return $this->belongsTo('Subcategory');
	}

	public function cart()
	{
		return $this->hasMany('Cart');
	}
}