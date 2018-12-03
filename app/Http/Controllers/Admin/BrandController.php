<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandCreateRequest;
use App\Http\Requests\BrandEditRequest;
use App\Http\Traits\HasImages;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{

    use HasImages;

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandShowList = Brand::paginate(15);

        return view('admin.brand.list', ['brandShowList' => $brandShowList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandCreateRequest $request)
    {
        $createdBrand = new Brand();
        $createdBrand->fill($request->all());
        $createdBrand->save();

        $createdBrand->addBrandSingleImage($request->file('image'));

        return redirect()->route('brand.create')->with('status', 'Бренд добавлен!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brandForEdit = Brand::where('id', $id)->first();

        return view('admin.brand.edit', compact('brandForEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandEditRequest $request, $id)
    {
        $brandUpdate = Brand::find($id);
        $brandUpdate->fill($request->all());
        $brandUpdate->save();

        if ($request->file('image')) {
            $brandUpdate->addBrandSingleImage($request->file('image'));
        }

        return redirect()->route('brand.edit', $id)->with('status', 'Бренд обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brandDelete = Brand::find($id);
        $brandDelete->delete();

        return redirect()->route('brand.index')->with('status', 'Бренд удален!');
    }
}
