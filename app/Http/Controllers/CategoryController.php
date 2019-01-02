<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Category;
//use App\Http\Requests\CategoryStoreRequest;
use Validator;

class CategoryController extends Controller
{
    /**
     * Return all Categories
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::All();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
          'name' => 'required|max:20',
          'code' => 'required|max:5',
          'parent_code' => 'required|max:5'
        ]);

        if ($validator->fails()) {
          return response()->json(['message'=>$validator->errors()]);
        }

        $slug = str_replace(" ", "-", strtolower($request['name']));

        $category = new Category;
        $category->name = $request['name'];
        $category->code = $request['code'];
        $category->parent_code = $request['parent_code'];
        $category->slug = $slug;

        if($category->save())
        {
          return \Response::json(['message' => "success"],201);
        } else {
          return \Response::json(['message' => "error saving"],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
