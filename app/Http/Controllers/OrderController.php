<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Order;
use App\Checkout;
use App\Events\NotificationEvent;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;
use App\Utilities\VNPay;


class OrderController extends Controller
{
    protected $notification;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(
        SendNotification $notification
    ){
        $this->notification = $notification;
    }

    public function index()
    {
        $orders = Order::with('checkouts')->latest()->paginate(10);; 
          $categories=Category::paginate(15);;
        return view('order.view', compact('orders','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        return view('cart.order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // insert order
        if(Cart::subTotal()==0)
            return redirect('/show-cart');

        $data=$request->all();

      /*  return Cart::subtotal(0,'',''); + ($request->input('ship_method')=='1'   ? 30000: 50000 );*/
        if($request->pay_method==1){ //thanh toan sau
            $order = new Order;
            $order ->user_id = Auth::user()->user_id;
            $order ->order_name = $request->input('order_name');
            $order ->order_phone = $request->input('order_phone');
            $order ->order_city = $request->input('order_city');
            $order ->order_district = $request->input('order_district');
            $order ->order_ward = $request->input('order_ward');
            $order ->order_address = $request->input('order_address');
            $order ->ship_method = $request->input('ship_method');
            $order ->pay_method = $request->input('pay_method');
            $order->order_total = Cart::subtotal(0,'','');
            $order->order_qty = Cart::count();
            $order->save();
               $order_id = $order->order_id;
            foreach(Cart::content() as $check){
            Checkout::create([
                'order_id' => $order_id,
                'pro_id' => $check->id,
                'quantity' => $check->qty,
                'total_price' => $check->price * $check->qty,
            ]);
            $pro_quantity = Product::find($check->id)->quantity;
            Product::where('pro_id', $check->id)->update(['quantity' => $pro_quantity - $check->qty]);
            }
            Cart::destroy();
             $data = [
             'title' => 'Bạn có đơn hàng mới' . ' #' . $order->order_id,
             'content' => trans('admin.notification.content'),
             ];
            $this->notification->sendToAdmin($data);

            return view('cart.complete_order');
        }
           
        else {
            $data=['user_id'=>Auth::user()->user_id,
                    'order_name'=> $request->input('order_name'),
                    'order_phone'=> $request->input('order_phone'),
                    'order_city'=> $request->input('order_city') ,
                    'order_district'=> $request->input('order_district') ,
                    'order_ward'=>$request->input('order_ward') ,
                    'order_address'=>$request->input('order_address') ,
                    'ship_method'=> $request->input('ship_method'),
                    'pay_method'=>  $request->input('pay_method'),
                    'order_total'=> Cart::subtotal(0,'',''),
                    'order_qty'=> Cart::count(),
                    'order_status'=>2,  


                     ];
/*
            $order = new Order;
            $order ->user_id = Auth::user()->user_id;
            $order ->order_name = $request->input('order_name');
            $order ->order_phone = $request->input('order_phone'); 

            $order ->order_city = $request->input('order_city');
            $order ->order_district = $request->input('order_district');
            $order ->order_ward = $request->input('order_ward');
            $order ->order_address = $request->input('order_address');
            $order ->ship_method = $request->input('ship_method');
            $order ->pay_method = $request->input('pay_method');
            $order->order_total = Cart::subTotal();
            $order->order_qty = Cart::count();*/
          
            $order=Order::create($data);
            //chi them đơn chưa them chi tiétw


       
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->order_id, //id đơn hàng
                'vnp_OrderInfo' => 'Mô tả đơn hàng ', //Mô tả đơn hàng
                'vnp_Amount' => (Cart::subtotal(0,'','')+($request->input('ship_method')=='1'   ? 30000: 50000 ))//tổng giá của đơn hàng

            ]);
            //Chuyển hướng đến URL lấydduowjc
        return redirect()->to($data_url);
           /* return ($data_url);*/




            
        }
     

        //insert checkout
        

    }
    public function vnPayCheck(Request $request){
        //Lấy data từ URL (do VNPAY gửi về Returnurl)
     
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');//Mã phản hồi kết quả thanh toán. 00 = thành công
        $vnp_TxnRef = $request->get('vnp_TxnRef');//Order_id
        $vnp_Amount = $request->get('vnp_Amount');//Số tiền thanh toán

        //Kiểm tra data xem kết quả giao dịch có hợp lệ hay không
        if($vnp_ResponseCode != null){
            //Nếu thành công
            if($vnp_ResponseCode == 00){
                //Cập nhật trạng thái Order
                
                //them chi tiet dơn hang
                 foreach(Cart::content() as $check){
                Checkout::create([
                'order_id' =>  $vnp_TxnRef,
                'pro_id' => $check->id,
                'quantity' => $check->qty,
                'total_price' => $check->price * $check->qty,
            ]);
            $pro_quantity = Product::find($check->id)->quantity;
            Product::where('pro_id', $check->id)->update(['quantity' => $pro_quantity - $check->qty]);
            }
            //xóa gio
            Cart::destroy();
             $data = [
             'title' => 'Bạn có đơn hàng mới' . ' #' . $vnp_TxnRef,
             'content' => trans('admin.notification.content'),
             ];
            $this->notification->sendToAdmin($data);

              return view('cart.complete_order');  
             /*   //Xóa giỏ hàng
                Cart::destroy();
                //thông báo kết quả
                return redirect('checkout/result')->with('notification', 'Successful payment! Please check your mail');*/

                

            }else{//Nếu không thành công
                //Xóa đơn hàng đã lưu vào database
                $order=Order::find($vnp_TxnRef);
                $order->delete();
                //thông báo lỗi
                return view('cart.fail_order')->with('notification', 'Thanh toán không thành công!');
            

            }
        }
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id); 
          $categories=Category::all();

        return view('order.detail', compact('order','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $order = Order::findOrFail($id);
        $order->order_status = $request->input('order_status');
        $order->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function history($id)
    {
        $history = User::findOrFail($id);
       
      $categories=Category::all();

        return view('order.history', compact('history','categories'));
    }

    public function cancel($id){
        $order = Order::findOrFail($id);
        $order->order_status = 4;
        $order->save();

        return redirect()->back();
    }

    public function historyDetail($id)
    {
        $categories=Category::all();
        $order = Order::findOrFail($id);

        return view('order.history-detail', compact('order','categories'));
    }
}
