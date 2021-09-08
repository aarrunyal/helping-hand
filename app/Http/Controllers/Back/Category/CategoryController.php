<?php


namespace App\Http\Controllers\Back\Category;


use App\Http\Requests\Category\CategoryRequest;
use App\Services\Category\CategoryService;


class CategoryController
{

    protected $category;


    public function __construct(CategoryService $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->paginate(25);
        return view('back.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = $this->category->getParents();
        return view('back.category.create', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        if ($this->category->store($data)) {
            toastr()->success('Request Processed successfully');
            return redirect()->route('category.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = $this->category->findByColumn('slug', $slug);
        $parentCategories = $this->category->getParents();
        return view('back.category.edit', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        if ($this->category->update($id, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('category.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('category.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if ($this->category->delete($slug)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('category.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('category.index');
    }

    public function getSubCategoryByCategory($id)
    {
        $categories = $this->category->findByColumns(['is_active' => 1, "is_parent" => 0, "parent_id" => $id], true);
        return view('back.category.custom.sub-category', compact('categories'));
    }
}
