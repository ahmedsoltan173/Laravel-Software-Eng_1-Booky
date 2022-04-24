<?php

namespace App\Http\Controllers;

use App\Model\Book;
use App\Model\Cart;
use App\Model\Category;
use Illuminate\Session;
use Illuminate\Http\Request;
use App\Traits\OfferTrait;
use App\User;
use Illuminate\Support\Facades\Auth;


class usersbook extends Controller
{
    use OfferTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth');

    }

    public function index()
    {
        $books=Book::select('id','name','price','author','categories','photo','description','stock')->paginate(PAGINATION_COUNT);
        if(Auth::user()){
             $verfy=User::select('id','email_verified_at')->get()->where('id',Auth::user()->id);
             return view('home',compact('books'))->with('ver',$verfy);
            }else{
                $verfy=null;
                return view('home',compact('books'))->with('ver',$verfy);
            }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function likebook(Request $request){
        // return $request->method()
        // if($request->method()==null)

        // return redirect()->to(url('home'));
        $bookdetails=Book::select('id','name','price','author','photo','description','stock')->where('id',$request->bookid)->get();
        // return view('all',compact('books'));
        // return Auth::user()->id;
        // $session=Auth::user()->id;
        return view('show',compact('bookdetails'));
}


public function storbook(Request $request){


    $book=Book::find($request->id);
    // return $book;
    if(!$book)
        return redirect()->back()->with(['error'=>'there is No id such that']);
        // if()

        $user=Auth::user()->id;
        // return $request->id;

        $carts=Cart::select()->where('users_id',$user)->where('book_id',$request->id)->get();
         foreach($carts as $cart){$cart->id;
            $cart->number;
        }
        #to check if this book is exist or not
            if($carts->count() == 0){
                // return $user ."---".$request->id;
                $addcart=Cart::create([
                    'users_id'=>$user,
                    'book_id'=>$request->id,
                ]);
            }elseif($carts->count() > 0){
                $newNumber=$cart->number;
                Cart::where('id', $cart->id)->update(array('number' => $newNumber+1));
            }

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


###########################################################################################################
###########################################################################################################
######################################## categories #######################################################
###########################################################################################################
###########################################################################################################

public function getCategoriesBook(Request $request){
    $categories=Category::with('books')->find($request->id);
    $cat=Category::select('name')->find($request->id);
        $books=$categories->books;
        return view('category',compact('books'))->with('categories',$cat);

    }


    ###########################################################################################################
    ######################################## add to cart #######################################################
    ###########################################################################################################
public function addtocart(Request $request){

    $user=Auth::user()->id;
    $cart=Cart::select()->where('users_id',$user);
return $cart;
}
##############################

public function getcustomerBook(){
    // return Auth::user();
    if(!Auth::user())
        return redirect()->to(url('login'));

    $user=Auth::user()->id;
    $usercart=User::with('cart')->find($user);
     $carts=$usercart->cart;

    // $nu=Cart::select('book_id','number')->distinct()->where('users_id',$user)->get()->count(); //to get the number of add to cart ofthe same product
    $nu=Cart::select('book_id','number')->where('users_id',$user)->get(); //to get the number of add to cart ofthe same product

    return view('addtocard',compact('carts'))->with('nu',$nu);

    // $cartsno=Cart::select('number')->where('id','');
    // $usercart=User::with('cart')->find($user)->where('');
 }

public function showToeditBookNO(Request $request){
    $book=Book::select()->find($request->id);
    $reid= $request->id;
     $number=Cart::select('number','id')->where('book_id',$reid)->get();

    return view('editnumber ',compact('book'))->with('number', $number);
}



public function updatebooknumber(Request $request)
    {
        //  $request->id;
        $cart=Cart::select()->find($request->id);
        //update
            $cart->update($request->all());

    if($cart)
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeletebookCart($id)
    {
        //
        // $id;
        $cart=Cart::find($id);
            if(!$cart)
                return redirect()->back()->with(['error'=>'there is No id such that']);
        $cart->delete();
        return redirect()->to(url('addtocard'));
    }
// ##########################################################################################
// ################################ Search ##################################################
// ##########################################################################################

    public function search(Request $request){
        $bookname=$request->name;
        $books = Book::where('name','LIKE','%'.$bookname.'%')->orWhere('author','LIKE','%'.$bookname.'%')->get();
        // return $books;
        return view('search',compact('books'))->with('searched',$bookname);
    }


    public function adminsearch(Request $request){
        $bookname=$request->name;
        $books = Book::where('name','LIKE','%'.$bookname.'%')->orWhere('author','LIKE','%'.$bookname.'%')->orWhere('stock','LIKE',$bookname)->get();
        // return $books;
        return view('searchadmin',compact('books'))->with('searched',$bookname);
    }
}
