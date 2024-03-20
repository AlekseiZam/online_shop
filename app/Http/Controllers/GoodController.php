<?php

namespace App\Http\Controllers;

use App\Http\Filters\GoodFilter;
use App\Http\Requests\good\CreateRequest;
use App\Http\Requests\good\EditRequest;
use App\Http\Requests\good\FilterRequest;
use App\Http\Requests\good\StoreRequest;
use App\Http\Requests\good\UpdateRequest;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(GoodFilter::class, ['queryParams' =>array_filter($data)]);
        $goods = Good::filter($filter)->paginate(10);
        $categories = Category::all();
        return view('goods.index', compact('goods', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('goods.create', compact('categories'));
    }

    public function create2(CreateRequest $request)
    {
        $data = $request->validated();
        $brands = Category::find($data['category_id'])->brands;
        $manufacturers = Category::find($data['category_id'])->manufacturers;
        $attributes = Category::find($data['category_id'])->attributes;
        return view('goods.create2', compact('data', 'brands', 'manufacturers', 'attributes'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        if(Good::where('name', $data['name'])->where('brand_id', $data['brand_id'])->doesntExist())
        {
            $attrs = $request->input('value');
            unset($data['value']);
            if(is_null($data['brand_id']))
                unset($data['brand_id']);
            if(is_null($data['manufacturer_id']))
                unset($data['manufacturer_id']);
            if (isset($data['image']))
                $data['image'] = $request->file('image')->store('uploads', 'public');
            else {
                $data['image'] = 'uploads/no_image.jpg';
            }
            $good = Good::firstOrCreate($data);
            foreach ($attrs as $key=>$value)
                if(!is_null($value))
                {
                    $arrtibuteValue = new AttributeValue();
                    $arrtibuteValue->good_id = $good->id;
                    $arrtibuteValue->attribute_id = $key;
                    $arrtibuteValue->value = $value;
                    $arrtibuteValue->save();
                }
            return redirect()->route('goods.index');
        }
        else
            return redirect()->route('goods.create')->with('mess', 'Данный товар уже существует');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $good = Good::find($id);
        $brands = Category::find($good['category_id'])->brands;
        $manufacturers = Category::find($good['category_id'])->manufacturers;
        $attributes = Category::find($good['category_id'])->attributes;
        return view('goods.edit', compact('good', 'brands', 'manufacturers', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $attr = $data['value'];
        $good = Good::find($id);
        $image = $good->image;
        unset($data['value']);
        if (isset($data['image']))
            $data['image'] = $request->file('image')->store('uploads', 'public');
        else {
            $data['image'] = $image;
        }

        Good::find($id)->update($data);
        foreach ($attr as $attribute_id => $value) {
            AttributeValue::upsert([
                'good_id' => $id,
                'attribute_id' => $attribute_id,
                'value' => $value
            ], ['good_id', 'attribute_id', 'value']);
        }

        return redirect()->route('goods.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AttributeValue::where('good_id', $id)->delete();
        Good::find($id)->delete();
        return redirect()->route('goods.index');
    }

}
