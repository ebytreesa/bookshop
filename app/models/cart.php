<?php
class Cart extends Eloquent 
{
	protected $table 	= "cart";

	public function product()
	{
		return $this->belongsTo('product','product_id');
	}
	
}