<?php

class AdminController extends BaseController {

	

	public function admin()
	{
		return View::make('admin.admin');
	}

	public function listUsers()
	{
		$users = User::get();
		return View::make('admin.listUsers')->withUsers($users);
	}

	public function deleteUser($id)
	{
		 User::destroy($id);
		
		return Redirect::to('/admin/listUsers')->withSuccess('user deleted');

	}

	

	public function listProducts()
	{
		$products = Product::get();
		return View::make('admin.listProducts')->withProducts($products);
	}

	public function addProduct()
	{	
		$categories = Category::get();
		// $subcategories = Subcategory::get();
		return View::make('admin.addProduct')->withCategories($categories);
	}

	public function postAddProduct()
	{

		$messages	= array(
			'required'	=> ':attribute feltet skal udfyldes',
						);
		$validator	= Validator::make(Input::All(), array(
			'title' => 'required',
			'price' => 'required'
			
			), $messages);
		if ($validator->fails())
		{
			return Redirect::back()
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{
			
			$product = new Product;
			$product->category_id = Input::get('category');
			$product->subcategory_id = Input::get('subcategory');
			$product->title	= Input::get('title');
			$product->description	= Input::get('description');
			$product->price= Input::get('price');
			if(Input::hasFile('pic'))
			{
			$filename = md5(microtime());
			Image::make(Input::file('pic'))->save(public_path() . '/images/' . $filename);
			Image::make(input::file('pic'))->resize(120,120)->save(public_path() . '/images/' . $filename . '_thumb');
			$product->coverImg = $filename;
		    }

			$product->save();
				
		}
		if ($product)
		{
			return Redirect::to('/admin/listProducts')->withSuccess('ny product blev oprettet');
		}else
		{
			return "der opstod en fejl";
		}
	}

	public function editProduct($id)
	{
		$book = Book::where('id', $id)->first();
		return View::make('admin.editBook')->withBook($book);
	}

	public function postEditBook($id)
	{
		$messages	= array(
			'required'	=> ':attribute feltet skal udfyldes',
						);
		$validator	= Validator::make(Input::All(), array(
			'title' => 'required',
			'price' => 'required',
			'author' => 'required'
			), $messages);
		if ($validator->fails())
		{
			return Redirect::back()
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{
			$id = Author::where('lastname',Input::get('author'))->first()->id;
			$book =  Book:: where('id', Input::get('id'))->first();
			$book->author_id	= $id;
			$book->title	= Input::get('title');
			$book->price= Input::get('price');
			if(Input::hasFile('pic'))
			{
			$filename = md5(microtime());
			Image::make(Input::file('pic'))->save(public_path() . '/books/' . $filename);
			Image::make(input::file('pic'))->resize(120,120)->save(public_path() . '/books/' . $filename . '_thumb');
			$book->coverImg = $filename;
		    }

			$book->save();
				
		}
		if ($book)
		{
			return Redirect::to('/admin/listBooks')->withSuccess('Book blev oprettet');
		}else
		{
			return "der opstod en fejl";
		}
	}

	public function deleteProduct($id)
	{
		 Product::destroy($id);
		
		return Redirect::to('/admin/listProducts')->withSuccess('product deleted');

	}

	



}