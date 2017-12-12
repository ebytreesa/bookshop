<?php

class HomeController extends BaseController {

	

	public function index()
	{
		return View::make('index');
	}

	public function showNav($name)
	{
		$category = Category::where('name', $name)->first();
		$id = Category::where('name',$name)->first()->id;
		$product = Product::where('category_id', $id)->get();
		return View::make('category')->withProduct($product)->withCategory($category);
	}

	public function showSubNav($cname,$sname)
	{
		
		$id = Category::where('cname',$name)->first()->id;
		$subId = Subcategory::where('name', $sname)->first()->id;
		$product = Product::where('category_id', $id)->where('subcategory_id', $subId)->get();
		return View::make('subCategory')->withProduct($product);
	}


	public function showProduct($id)
	{
		$product = Product::where('id', $id)->first();
		return View::make('showProduct')->withProduct($product);
	}

	public function postAddToCart()
	{
		if (!Auth::user())
		{
			return Redirect::to('/login');
		}else
		{
		$messages	= array(
			'required'	=> ':attribute feltet skal udfyldes'
			
			);
		$validator	= Validator::make(Input::All(), array(
			'amount' => 'required'
			), $messages);
		if ($validator->fails())
		{
			return Redirect::back()
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{
		$cart  = new Cart;
		$cart->user_id = Auth::user()->id;
		$cart->product_id = Input::get('id');
		$cart->amount 	= Input::get('amount');
		$cart->total 	= (Input::get('amount'))*(Input::get('price'));
		$count = Cart::where('product_id',Input::get('id'))->where('user_id',Auth::user()->id)->count();

       if($count){

         return Redirect::back()->withError('The book already in your cart.');
       }
		$cart->save();
		return Redirect::to('/profile')->withSuccess('Book is added to cart');
		}
	}
}
}
