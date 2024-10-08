<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\cr;
use Directory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  public function index(): Bu, controller sınıfı içindeki bir yöntemdir. Genellikle, bir web sayfasının ilk yüklendiğinde çağrılan yöntemdir.
    //  Category::paginate(10): Bu ifade, Category modelindeki tüm kayıtları alır ve bunları sayfalandırır. paginate(10) kısmı, her sayfada 10 kategori gösterileceğini belirtir.
    //  return view('category.index', ['categories' => $categories]): Bu satır, category.index adlı Blade şablonunu oluşturur ve bu şablona categories adlı bir değişken olarak sayfalandırılmış kategori listesini geçirir
    public function index()
    {
        $categories = Category::paginate(1);
        return view('category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate metodu, bir dizi doğrulama kuralı alır ve bu kurallara göre gelen verileri kontrol eder. Eğer veriler kurallara uyuyorsa doğrulama başarılı olur, aksi takdirde bir hata mesajı döndürür.//
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable',
        ]);
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1 : 0,
        ]);
        return redirect('/category')->with('status', 'Category Created Succesfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category  $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable',
        ]);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1 : 0,
        ]);
        return redirect('/category')->with('status', 'Category Updated  Succesfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/category')->with('status', 'Category Deleted  Succesfuly');
    }
}
