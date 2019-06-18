<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\SendEmail;
use App\Notifications\customEmail;
use App\User;
use App\Order;
use Auth;
class EmailController extends Controller
{
 public function index(){

$users=User::all();

return view('index')->with('users',$users);


    } 


    public function send_email(Request $request){

$user=User::find($request->user_id);

$user->notify(new SendEmail());
return redirect()->route('home');


    } 

 public function send_custom(Request $request){

$user=User::find(Auth::id());
$order= new Order;

$order->shipping_address=$request->shipping_address;
$order->user_id=$request->user_id;
$order->phone_number=$request->phone_number;
$order->price=$request->price;
$order->save();
$user->notify(new customEmail($order,$user));
return redirect()->route('index');


    } 


}
