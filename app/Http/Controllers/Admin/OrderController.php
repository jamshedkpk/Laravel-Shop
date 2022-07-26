<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
// Display pending orders
public function orderPending()
{
$orders=Order::with('orderitems')->where(['status'=>0])->get();
return view('admin.order.order_shipped')->with(['orders'=>$orders]);        
}

// Display shipped orders
public function orderShipped()
{
$orders=Order::with('orderitems')->where(['status'=>1])->get();
return view('admin.order.order_shipped')->with(['orders'=>$orders]);        
}

// Display delivered orders
public function orderDelivered()
{
$orders=Order::with('orderitems')->where(['status'=>2])->get();
return view('admin.order.order_delivered')->with(['orders'=>$orders]);        
}

public function orderDetail($id)
{
// Fetch order detail for admin panel and send to order_show page
$userid=Order::where(['id'=>$id])->pluck('user_id')->first();

$user=User::where(['users.id'=>$userid])
            ->first();

$orders=Order::join('order_items','orders.id','=','order_items.order_id')
->join('products','order_items.product_id','=','products.id')
->select('products.name as productname',
'products.photo as productphoto',
'products.quantity as quantity',        
'order_items.total as total',
'orders.total as totalorder',
)
->get();

$totalorder=Order::where(['id'=>$id])->pluck('total')->first();

return view('admin.order.order_show')->with([
'orders'=>$orders,
'user'=>$user,
'totalorder'=>$totalorder,
'orderid'=>$id,
]);
}
// Update status of order by admin side
public function updateOrder(Request $request, $id)
{
$this->validate($request,[
'status'=>'required|notIn:null',
]);
$status=$request->status;
$order=Order::find($id);
$order->update(['status'=>$status]);
$order->save();
}

}
