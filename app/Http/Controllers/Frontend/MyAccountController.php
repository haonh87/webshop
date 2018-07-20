<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\BaseController;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Vote;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Validator;

class MyAccountController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(!Auth::check())
            return redirect()->back()->withErrors(['myaccount'=>trans('lang.view_account')]);
        else {
            $sub_navi = '<li>
                        <a href="'.route("myaccount.index").'" style="display: none;">'.trans('lang.my_account').'</a>
                    </li>';
            return view('frontend.myaccount.index')->with('sub_navi', $sub_navi);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::check()){
            return redirect()->route('index');
        }
        $sub_navi= '<li>
                        <a href="'.route("myaccount.index").'" style="display: none;">'.trans('lang.my_account').'</a>

                    </li>';
        return view('frontend.myaccount.create')->with('sub_navi', $sub_navi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

            $messages = [
                'txtname.required' => 'The name field is required.',
                'txtemail.required' => 'The email field is required.',
                'txtpassword.required' => 'The password field is required.',
                'txtpassword_confirmation.required' => 'The password confirm and password must match.',
                'txtbirthday.required' => 'The birthday field is required.',
            ];
            $rules = [
                'txtname' => 'required|max:255',
                'txtemail' => 'required|max:255',
                'txtpassword' => 'required|confirmed|min:6',
                'txtpassword_confirmation' => 'same:txtpassword',
                'txtbirthday' => 'required',
            ];
            $this->validate($request, $rules, $messages);

            $user = new User();
            $user->name = $request->input("txtname");
            $user->birthdate = $request->input("txtbirthday");
            $user->gender = $request->input("txtgender");
            $user->email = $request->input("txtemail");
            $user->password =  \Hash::make($request->input("txtpassword"));
            $user->customer_id= null ;
            $user->save();
        //send mail
            $data = array(
                'pass' => $user->password,
                'server' => 'mpmoda',
            );
            if($user){
                \Mail::send('emails.email_register',$data, function($message) use ($user){
                    $message->from($user->email, 'Admin');
                    $message->to($user->email, $user->name)
                        ->subject('Verify your Account');
                });
            }
        //end send mail
            return redirect()->route('authLogin')->with('message', trans('lang.success'));

    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit_password($id)
    {
        if (!Auth::check())
            return view('admin.login');
        else {
            $sub_navi = '<li>
                        <a href="' . route("myaccount.index") . '" style="display: none;">'.trans('lang.my_account').'</a>
                    </li>';
            return view('frontend.myaccount.edit_password')->with('sub_navi', $sub_navi);
        }
    }
    public function update_password(Request $request, $id)
    {
        if(!Auth::check())
            return view('admin.login');
        else {
            if(Auth::user()->role_id != 4){
                $messages = [
                    'txtoldpassword.required' => 'The name field is required.',
                    'txtpassword.required' => 'The password field is required.',
                    'txtpassword_confirmation.required' => 'The password confirm and password must match.',
                ];
                $rules = [
                    'txtoldpassword' => 'required|max:255',
                    'txtpassword' => 'required|confirmed|min:6',
                    'txtpassword_confirmation' => 'same:txtpassword',
                ];
                $validator = Validator::make($request->input(), $rules, $messages);
                if ($validator->fails())
                {
                    return Redirect()->route('myaccount.edit.password')->withErrors($validator)->withInput();
                }
                $Password1= $request->input("txtoldpassword");
                $Password2= Auth::user()->password;
                if (Hash::check($Password1, $Password2)) {
                    $user = User::findOrFail($id);
                    $user->password = \Hash::make($request->input("txtpassword"));
                    //dump($user->password);
                    //dump($user);
                    //die;
                    $user->save();
                    return redirect()->route('myaccount.index', $id)->with('message', trans('lang.success'));
                }else{
                    $validator->getMessageBag()->add('txtoldpassword', 'Password wrong');
                    return Redirect()->route('myaccount.edit.password')->withErrors($validator)->withInput();
                }
            }else{
                $messages = [
                    'txtpassword.required' => 'The password field is required.',
                    'txtpassword_confirmation.required' => 'The password confirm and password must match.',
                ];
                $rules = [
                    'txtpassword' => 'required|confirmed|min:6',
                    'txtpassword_confirmation' => 'same:txtpassword',
                ];
                $validator = Validator::make($request->input(), $rules, $messages);
                if ($validator->fails())
                {
                    return Redirect()->route('myaccount.edit.password')->withErrors($validator)->withInput();
                }
                $Password2= Auth::user()->password;
                    $user = User::findOrFail($id);
                    $user->password = \Hash::make($request->input("txtpassword"));
                    $user->role_id = "3";
                    //dump($user->password);
                    //dump($user);
                    //die;
                    $user->save();
                    return redirect()->route('myaccount.index', $id)->with('message', trans('lang.success'));
            }
        }
    }
    public function edit($id)
    {
        if(!Auth::check())
            return view('admin.login');
        else {
            $sub_navi = '<li>
                        <a href="' . route("myaccount.index") . '" style="display: none;">'.trans('lang.my_account').'</a>
                    </li>';
            return view('frontend.myaccount.edit')->with('sub_navi', $sub_navi);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if(!Auth::check())
            return view('admin.login');
        else {
            /*if($request->ajax()){
                $message = ["success"=>"success", "massage"=>"login success"];
                return response()->json($message);
            }else{}*/
            $messages = [
                'txtname.required' => 'The name field is required.',
                'txtemail.required' => 'The email field is required.',
                'txtbirthday.required' => 'The birthday field is required.',
            ];
            $rules = [
                'txtname' => 'required|max:255',
                'txtemail' => 'required|max:255',
                'txtbirthday' => 'required',
            ];
            $this->validate($request, $rules, $messages);

            $user = User::findOrFail($id);
            $user->name = $request->input("txtname");
            $user->birthdate = $request->input("txtbirthday");
            $user->gender = $request->input("txtgender");
            $user->email = $request->input("txtemail");
            $user->save();
            return redirect()->route('myaccount.index', $id)->with('message', trans('lang.success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
   //
    }
    public function old_orders()
    {
        if (!Auth::check())
            return view('admin.login');
        else {
            $sub_navi = '<li>
                        <a href="' . route("myaccount.index") . '" style="display: none;">'.trans('lang.my_account').'</a>
                    </li>';
            if(is_null(Auth::user()->customer)){
                $orders= null;
            }else {
                $orders = Order::where('customers_id',Auth::user()->customer->id)
                    ->orderBy('status')
                    ->orderBy('id', 'desc')
                    ->get();
            }
//            dd($orders);
            return view('frontend.myaccount.old_orders')->with('orders',$orders)
                ->with('sub_navi', $sub_navi)
                ->with('i', 1);
        }
    }
    public function show_order($id)
    {
        if (!Auth::check())
            return view('admin.login');
        else {
            $sub_navi = '<li>
                        <a href="' . route("myaccount.index") . '" style="display: none;">'.trans('lang.my_account').'</a>
                    </li>';
            $orderItem = OrderItem::where('order_id',$id)->get();
//            dd($orderItem);
            return view('frontend.myaccount.show_order')->with('orderItem',$orderItem)->with('sub_navi', $sub_navi);
        }
    }
    //reset password
    public function getEmail()
    {
        $sub_navi = '<li>
                        <a href="' . route("myaccount.index") . '" style="display: none;">'.trans('lang.my_account').'</a>
                    </li>';
        return view('frontend.myaccount.email_reset')->with('sub_navi', $sub_navi);
    }
    public function postEmail(Request $request)
    {
        $messages = [
            'email.required' => 'The email field is required.',
        ];
        $rules = [
            'email' => 'required|max:255',
        ];
        $this->validate($request, $rules, $messages);
//        dd(route('myaccount.password.reset')."/".$request->_token);
        if($user= User::where('email', $request->input("email"))->first()){
            $data = array(
                'link' => url(route('myaccount.password.reset'))."/".$request->_token,
                'server' => 'mpmoda',
            );
            if($user){
                \Mail::send('emails.email_reset_password',$data, function($message) use ($user){
                    $message->from($user->email, 'Admin');
                    $message->to($user->email, $user->name)
                        ->subject('Reset password');
                });
            }
            return redirect()->route('index');
        }else{
            return redirect()->route('myaccount.password.email')->with('message_error', trans('lang.error'));
        }
    }
    public function getReset($id)
    {
        $sub_navi = '<li>
                        <a href="' . route("myaccount.index") . '" style="display: none;">'.trans('lang.my_account').'</a>
                    </li>';
        return view('frontend.myaccount.reset')->with('sub_navi', $sub_navi)->with('token', $id);
    }
    public function postReset(Request $request)
    {
        $messages = [
            'txtemail.required' => 'The email field is required.',
            'txtpassword.required' => 'The password field is required.',
            'txtpassword_confirmation.required' => 'The password confirm and password must match.',
        ];
        $rules = [
            'txtemail' => 'required|min:6',
            'txtpassword' => 'required|confirmed|min:6',
            'txtpassword_confirmation' => 'same:txtpassword',
        ];
        $this->validate($request, $rules, $messages);
        if($request->token == $request->_token){
            User::where('email', $request->input('txtemail'))
                ->update([
                    'password' =>  \Hash::make($request->input("txtpassword"))
                ]);
            return redirect()->route('index')->with('message', trans('lang.success'));
        }else{
            return redirect()->route('index')->with('message_error', trans('lang.error'));
        }
    }
}
