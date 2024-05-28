<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    const PATH_VIEW = "brands.";
    public function index()
    {
        $brands = Brand::query()->latest('id')->paginate('4');
//        @dd($data ->toArray());
        return view(self::PATH_VIEW.__FUNCTION__,compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        Brand::query()->create($request->all());

//        @dd($request->all());die();
        return redirect()
            ->route('brands.index')
            ->with('success','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view(self::PATH_VIEW.__FUNCTION__,compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view(self::PATH_VIEW.__FUNCTION__,compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());
//        @dd($request->all());die();
        return back()->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back()->with('success','Thao tác thành công');
    }
}
