<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use App\Models\Order;
use App\Models\UserApp;
use App\Models\Food;
use App\Models\Review;
use App\Models\Basket;
use App\Models\FoodBasket;
use App\Models\FoodOrder;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function signup(Request $r)
    {
        if($r->submit == 'Sign up')
        {
            $user = new UserApp();

            $user->firstname = $r->fnames;
            $user->lastname = $r->lnames;
            $user->email = $r->emails;
            $user->password = Hash::make($r->passwords);
            $user->type = $r->type;
            $user->status = "Null";

            $u = UserApp::Where('email',$user->email)->get();
            if($u->isempty() and $r->passwords == $r->confirmpasswords)
            {
                $user->save();
                return view('Login',['message'=>"sign up successfull"]);
            }
            else{
                return view('Login',['message'=>"sign up error"]);
            }
        }
        else
        {
            return view('Login',['message'=>""]);
        }

    }

    public function Welcome(Request $r)
    {
        $cat = Category::all()->take(6);
        $food = Food::all()->sortBy('price')->take(6);
        return View("welcome",['categories'=>$cat,'food'=>$food,'user'=>'','foodBasket'=>'']);
    }

    public function WelcomeWithUser(Request $r)
    {
        if($r->submit == 'Login')
        {
            $u = UserApp::Where('email',$r->emaill)->first();
            if(!$u or Hash::check($r->passwordl,$u->password)==FALSE)
            {
                return $this->signup($r);
            }
            else
            {
                if($u->type == "Cook" && $u->status == "Null")
                {
                    return $this->signup($r);
                }
                else
                {
                    $cat = Category::all()->take(6);
                    $user = UserApp::where('email',$r->emaill)->first();
                    $food = Food::all()->sortBy('price')->take(6);
                    return View("welcome",['categories'=>$cat,'user'=>$user,'food'=>$food]);
                }
            }
        }
        else
        {
            $cat = Category::all()->take(6);
            $user = UserApp::where('id',$r->id)->first();
            $food = Food::all()->sortBy('price')->take(6);
            return View("welcome",['categories'=>$cat,'user'=>$user,'food'=>$food]);
        }
        
    }

    public function GoToFoods(Request $r)
    {
        if($r->submit == "Foods")
        {
            $food = Food::all();
            $user = UserApp::where('id',$r->uid)->first();
            $fb = FoodBasket::join('baskets','food_baskets.idBasket','=','baskets.id')
                        ->where('food_baskets.idFood',$r->fid)
                        ->where('baskets.idUser',$r->uid)
                        ->select('food_baskets.*','baskets.*')
                        ->first();
            return View("Foods",['user'=>$user,'food'=>$food]);
        }   
        else if($r->submit == "Search")
        {
            $user = UserApp::where('id',$r->id)->first();
            $food = Food::join("categories","food.idCategory","=","categories.id")
                        ->join("user_apps","food.idCook","=","user_apps.id")
                        ->where('food.name','LIKE','%'.$r->search.'%')
                        ->orwhere('food.description','LIKE','%'.$r->search.'%')
                        ->orwhere('categories.name','LIKE','%'.$r->search.'%')
                        ->orwhere('user_apps.firstName','LIKE','%'.$r->search.'%')
                        ->orwhere('user_apps.lastName','LIKE','%'.$r->search.'%')
                        ->select("food.*")->get();
            $fb = FoodBasket::join('baskets','food_baskets.idBasket','=','baskets.id')
                        ->where('food_baskets.idFood',$r->fid)
                        ->where('baskets.idUser',$r->uid)
                        ->select('food_baskets.*','baskets.*')
                        ->first();
            return View("Foods",['user'=>$user,'food'=>$food]);
        }
        else
        {
            $food = Food::where('idCategory',$r->cid)->get();
            $user = UserApp::where('id',$r->uid)->first();
            return View("Foods",['user'=>$user,'food'=>$food]);
        }

        

    }

    public function GoToHistory(Request $r)
    {
        if($r->submit == "Cancel Order")
        {   
            $order1 = FoodOrder::where('idOrder',$r->oid)->delete();
            $order2 = Order::where('id',$r->oid)->delete();
        }
        else if($r->submit == "CHECKOUT")
        {

            $order = Order::Create(['idUser'=>$r->id,'totalPrice'=>$r->tot,'location'=>$r->location,'status'=>'Pending']);

            $foods = FoodBasket::where('idBasket',$r->bid)->get();
            
            $o = Order::where('id',$order->id)->first();
            foreach($foods as $food)
            {
                $foodOrder = new FoodOrder();
                $foodOrder->idFood = $food->idFood;
                $foodOrder->idOrder = $o->id;
                $foodOrder->quantity = $food->quantity;
                $foodOrder->save();

                $f = FoodBasket::where('id',$food->id)->delete();
            }

        }
        $user = UserApp::where('id',$r->id)->first();
        $orders = Order::join('user_apps', 'orders.idUser', '=', 'user_apps.id')->where('orders.idUser',$r->id)->select('orders.*','user_apps.email as email')->get();
        
        
        $foods = Order::join('food_orders', 'orders.id', '=', 'food_orders.idOrder')
                        ->join('food','food_orders.idFood', '=', 'food.id')
                        ->where('orders.idUser',$r->id)->select('food_orders.quantity as qty','food.name as name')->get();
        return View("OrderHistory",['orders'=>$orders, 'user'=>$user,'foods'=>$foods]);
    }

    public function SingleFood(Request $r)
    {
        if($r->submit == "addReview")
        {
            $review = new Review();
            $review->idUser = $r->uid;
            $review->idFood = $r->fid;
            $review->description = $r->review;

            $review->save();
        }
        if($r->submit == "addToCart")
        {
            $b = Basket::where('idUser',$r->uid)->first();
            if($b =='')
            {
                $basket = new Basket();
                $basket->idUser = $r->uid;
                $basket->save();
            }

            $baskets = Basket::where('idUser',$r->uid)->first();
            $foodBasket = new FoodBasket();
            $foodBasket->idBasket = $baskets->id;
            $foodBasket->idFood = $r->fid;
            $foodBasket->quantity = 1;

            $foodBasket->save();
        }

        if($r->submit == "removeFromCart")
        {
            $fb = FoodBasket::join('baskets','food_baskets.idBasket','=','baskets.id')
            ->where('food_baskets.idFood',$r->fid)
            ->where('baskets.idUser',$r->uid)
            ->select('food_baskets.*','baskets.*')
            ->delete();            
        }

        $food = Food::join('user_apps','food.idCook','=','user_apps.id')
                    ->where('food.id',$r->fid)
                    ->select('food.*','user_apps.firstName as fname','user_apps.lastName as lname')->first();
        $review = Review::join('user_apps','reviews.idUser','=','user_apps.id')
                        ->where('reviews.idFood',$r->fid)
                        ->select('reviews.*','user_apps.firstName as fname','user_apps.lastName as lname')->get();
        $user = UserApp::where('id',$r->uid)->first();
        $fb = FoodBasket::join('baskets','food_baskets.idBasket','=','baskets.id')
                        ->where('food_baskets.idFood',$r->fid)
                        ->where('baskets.idUser',$r->uid)
                        ->select('food_baskets.*','baskets.*')
                        ->first();
        return View("SingleFood",['user'=>$user,'food'=>$food,'review'=>$review,'foodBasket'=>$fb]);
    }

    public function Category(Request $r)
    {
        $food = Food::where('idCategory',$r->cid)->get();
        $user = UserApp::where('id',$r->uid)->first();
        return View("Foods",['user'=>$user,'food'=>$food]);
    }


    public function MyMenu(Request $r)
    {
        if($r->submit == "Create")
        {
            $newf = new Food();
        
            $newf->name = $r->name;
            $newf->image = $r->image;
            $newf->description = $r->description;
            $newf->calorieCount = $r->calorieCount;
            $newf->price = $r->price;
            $newf->isPlatDuJour = $r->platDuJour;
            $newf->offer = $r->offer;
            $newf->idCategory = $r->category;
            $newf->idCook = $r->id;

            $newf->save();
        }
        else if($r->submit == "Save")
        {
            $editf = Food::where('id', $r->fid)->first();
        
            $editf->name = $r->name;
            if($r->image != "")
            {
                $editf->image = $r->image;
            }
            $editf->description = $r->description;
            $editf->calorieCount = $r->calorieCount;
            $editf->price = $r->price;
            $editf->isPlatDuJour = $r->platDuJour;
            $editf->offer = $r->offer;
            $editf->idCategory = $r->category;
            $editf->idCook = $r->id;
    
            $editf->save();
        }
        else if($r->submit == 'Delete')
        {
            $food = Food::where('id',$r->fid)->delete();
        }

        $food = Food::Where('idCook',$r->id)->get();
        $user = UserApp::where('id',$r->id)->first();
        $category = Category::all();
        return View("MyMenu",['food'=>$food,'user'=>$user,'category'=>$category]);
    }

    public function OrdersList(Request $r)
    {   
        if($r->status !="")
        {
            $order = Order::where('id',$r->oid)->first();
            $order->status = $r->status;
            $order->save();
        }

        $user = UserApp::where('id',$r->id)->first();
        $orders = Order::join('user_apps', 'orders.idUser', '=', 'user_apps.id')
                        ->join('food_orders', 'orders.id', '=', 'food_orders.idOrder')
                        ->join('food','food_orders.idFood', '=', 'food.id')
                        ->where('food.idCook',$r->id)->select('orders.*','user_apps.email as email')->get();
        
        $foods = Order::join('food_orders', 'orders.id', '=', 'food_orders.idOrder')
                        ->join('food','food_orders.idFood', '=', 'food.id')
                        ->where('food.idCook',$r->id)->select('food_orders.quantity as qty','food.name as name')->get();
        return View("OrderList",['orders'=>$orders, 'user'=>$user,'foods'=>$foods]);
    }

    public function GoToCreate(Request $r)
    {
        $cat = Category::all();
        $user = UserApp::where('id',$r->id)->first();
        return View("CreateFood",['user'=>$user,'categories'=>$cat]);
    }

    public function Delete(Request $r)
    {
        $food = Food::where('id',$r->fid)->delete();
        return Redirect("/MyMenu"."/".$r->uid);
    }

    public function GoToEdit(Request $r)
    {
        $food = Food::where('id',$r->fid)->get();
        $user = UserApp::where('id',$r->id)->first();
        $cat = Category::all();
        return view("EditFood",['user'=>$user,'categories'=>$cat,'food'=>$food]);
    }

    public function GoToBasket(Request $r)
    {
        if($r->submit=="-")
        {
            $food = FoodBasket::where('id',$r->fid)->first();
            $food->quantity = $food->quantity - 1;
            $food->save();
        }
        else if($r->submit=="+")
        {
            $food = FoodBasket::where('id',$r->fid)->first();
            $food->quantity = $food->quantity + 1;
            $food->save();
        }

        $user = UserApp::where('id',$r->id)->first();
        $foods = Basket::join('food_baskets', 'baskets.id', '=', 'food_baskets.idBasket')
                        ->join('food','food_baskets.idFood', '=', 'food.id')
                        ->where('baskets.idUser',$r->id)->select('food_baskets.id as fid','food_baskets.quantity as qty','food.*','baskets.id as bid')->get();
               
        $items = count($foods);
        $totalPrice = 0; 
        foreach($foods as $food)
        {
            if($food->offer == "" || $food->offer == "0")
            {
                $totalPrice = $totalPrice+($food->qty*$food->price);
            }
            else
            {
                $totalPrice = $totalPrice+($food->price - $food->price * $food->offer / 100) * $food->qty;
            }
        }
       return View("Basket",['user'=>$user, 'foods'=>$foods, 'items'=>$items, 'totPrice'=>$totalPrice]);
    }

}
