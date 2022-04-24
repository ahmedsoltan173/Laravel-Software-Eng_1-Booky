<?php

namespace App\Http\Controllers;

use App\Model\Book;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Traits\OfferTrait;

class bookController extends Controller
{
    use OfferTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $books=Book::select('id','name','price','photo','categories','author','description','stock')->orderBy('categories')->paginate(PAGINATION_COUNT);
        return view('all',compact('books'));

        // return  session()->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::select()->get();

        return view('create',compact('categories'));
    }
#==================================================================================================================
#========================== Create category =========================================================
#==================================================================================================================
    public function categoryshow(){
        $Categories=Category::select('id','name')->get();
            return view('category.categoryshow',compact('Categories'));

            // return  session()->all();

    }
    public function createcategory()
    {
        //
        $categories=Category::select()->get();

        return view('category/category',compact('categories'));
    }

    public function categorystore(Request $request){

        $category=Category::create([
            'name'=>$request->catname,

        ]);
        if($category)
            return response()->json([
                'status'=>true,
                'msg'=>'Save Successfully',
            ]);
        else
            return response()->json([
                'status'=>false,
                'msg'=>'Save Failed'

            ]);

    }
    public function editcat(Request $request, $catid)
    {
        //
        // return $bookid;
          // Offer::findOrFail($offerid);///search of the tabel that id == or not
          $categories =Category::find($catid);                  //search in given tabel id only
          if(!$categories)
            return  redirect()->back();
            // $file_name = $this->saveImage($request->file('photo'),'images/books');

            // $books= Book::select('id','name')->find($catid);
            $catname= Category::select('id','name')->find($catid);

            // $categories=Category::select()->get();

            return view('category/catedit',compact('catname'));


            // return $bookid;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatecat(Request $request, $id)
    {
        //
        $category=Category::select('id','name')->find($id);
        if(!$id)
            return redirect()->back();

        //update
            $category->update($request->all());
            return redirect()->back()->with(['success'=>'Update Successfully']);

    }


    public function destroycat(Request $request)
    {
        //
        $categories=Category::find($request->id);
            if(!$categories)
                return redirect()->back()->with(['error'=>'there is No id such that']);
        $$categories->delete();
            return response()->json([
                'status'=>true,
                'msg'=>'Delete Successfully',
                'id'=>$request->id,


            ]);
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
        $file_name = $this->saveImage($request->file('photo'),'images/books');

        $book=Book::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->details,
            'author'=>$request->author,
            'stock'=>$request->stock,
            'categories'=>$request->category,
            'photo'=>$file_name

        ]);
        if($book)
            return response()->json([
                'status'=>true,
                'msg'=>'Save Successfully',
            ]);
        else
            return response()->json([
                'status'=>false,
                'msg'=>'Save Failed'

            ]);

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
    public function edit(Request $request, $bookid)
    {
        //
        // return $bookid;
          // Offer::findOrFail($offerid);///search of the tabel that id == or not
          $books =Book::find($bookid);                  //search in given tabel id only
          if(!$books)
            return  redirect()->back();
            // $file_name = $this->saveImage($request->file('photo'),'images/books');

            $books= Book::select('id','name','description','categories','author','price','stock')->find($bookid);
            $catname= Category::select('id','name')->find($bookid);

            $categories=Category::select()->get();

            return view('edit',compact('books'))->with('categories',$categories)->with('catname',$catname);


            // return $bookid;
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
        $book=Book::select('id','name','description','author','categories','price','stock')->find($id);
        if(!$id)
            return redirect()->back();

        //update
            $book->update($request->all());
            return redirect()->back()->with(['success'=>'Update Successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $book=Book::find($request->id);
            if(!$book)
                return redirect()->back()->with(['error'=>'there is No id such that']);
        $book->delete();
            return response()->json([
                'status'=>true,
                'msg'=>'Delete Successfully',
                'id'=>$request->id,


            ]);
    }




}
