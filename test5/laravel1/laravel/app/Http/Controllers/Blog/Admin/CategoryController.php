<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController1
{
    private $blogCategoryRepository;

    public function __construct(){
        parent::__construct();
        $this->blogCategoryRepository=app(BlogCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$paginator=BlogCategory::paginate(5);
        $paginator=$this->blogCategoryRepository->getAllWithPaginate(5);

        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        //$categoryList=BlogCategory::all();
        $categoryList=$this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.categories.edit',compact('item','categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data=$request->input();
        /*
        if(empty($data['slug'])){
            $data['slug']=Str::slug($data['title']);
        }*/

        $item=(new BlogCategory())->create($data);

        if($item){
            return redirect()->route('blog.admin.categories.edit',[$item->id])
                ->with(['success'=>'Успешно сохранено']);
        } else{
            return back()->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$item = BlogCategory::findOrFail($id);
        $item = $this->blogCategoryRepository->getEdit($id);
        if (empty($item)){
            abort(404);
        }
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
     /*   $rules=[
            'title'=>'required|min:5|max:200',
            'slug'=>'max:200',
            'description'=>'string|max:500|min:3',
            'parent_id'=>'required|integer|exists:blog_categories,id',
        ];
        $validatedData=$this->validate($request,$rules);
     */
        $item=$this->blogCategoryRepository->getEdit($id);
        if (empty($item)){
            return back()
                ->withErrors(['msg'=>"Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data=$request->all();
        //$result=$item->fill($data)->save(); или
        $result=$item->update($data);

        if($result){
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success'=>'Успешно сохранено']);
        } else{
            return back()
                ->withError(['msg'=>'Ошибка сохранения'])
                ->withInput();
        }
    }


}
