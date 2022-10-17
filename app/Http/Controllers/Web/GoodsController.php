<?php

namespace App\Http\Controllers\Web;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Spot;
use App\Models\Event;
use App\Models\Upload;
use App\Models\Favorite;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Category;
use DB;
use App\Models\ExchangeGoods;
use Illuminate\Support\Str;

use App\Models\Goods;
use App\Models\User;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailResetPass;

class GoodsController extends Controller
{
    //view
    public function list_goods(){
        $list_goods = Goods::take(12)->get();
        return view('web.goods',compact('list_goods'));
    } 

    public function goods_detail($alias){
        $info_goods = Goods::where('alias',$alias)->first(); 
        if( empty($info_goods)){
            abort(404);
        }
        $list_goods = Goods::where('name', 'like', "%$info_goods->name%")->take(10)->get();

        return view('web.good-detail',['info_goods'=>$info_goods,'list_goods'=>$list_goods]);
    }
    public function exchangeGoods($alias){
        $goods = Goods::where('alias',$alias)->first();
        if(empty($goods)){
            abort(404);
        }
        $user = Auth::user();
        return view('web.good-exchange')
        ->with([
            'alias'=>$alias,
            'goods'=>$goods,
            'user'=> $user
        ]);
    }

    public function goodExchangeConfirm(){
        return view('web.good-exchange-confirm');
    }
    public function goodExchangeComplete(){
        return view('web.good-exchange-complete');
    }
    //handle

    public function postExchangeGoods(Request $req,$alias){
        $this->validate($req,[
            'name'=>'required|max:100',
            'furigana'=>'required|max:100',
            'phone'=>'required|min:10|max:20',
            'zip_code'=>'required|min:6',
            'address'=>'required',
            'home_address'=>'required',
        ],[
            'name.required'=>'必須項目です',
            'name.max'=>'100文字以上入力しないでください', 
            'furigana.required'=>'必須項目です',
            'furigana.max'=>'100文字以上入力しないでください',
            'phone.required'=>'必須項目です',
            'phone.min'=>'パスワードは半角英数字を含む10文字以上を設定してください',
            'phone.max'=>'20文字以上入力しないでください',
            'zip_code.required'=>'必須項目です',
            'zip_code.min'=>'パスワードは半角英数字を含む10文字以上を設定してください',
            'address.required'=>'必須項目です',
            'home_address.required'=>'必須項目です',
        ]);
        // dd($req->input('point_remaining'));
        if($req->input('point_remaining') > 0){

            $exchange = new ExchangeGoods;
            $exchange->name = $req->input('name');
            $exchange->phone = $req->input('phone');
            $exchange->address = $req->input('address');
            $exchange->home_address = $req->input('home_address');
            $exchange->zip_code = $req->input('zip_code');
            $exchange->furigana = $req->input('furigana');

            return view('web.good-exchange-confirm')
            ->with([
                'name_item'=>$req->name_item,
                'image'=> $req->image,
                'point'=> $req->point_remaining,
                'exchange'=>$exchange
            ]);
        }else {
            return redirect()->back()->with('error','あなたのスコアは十分ではありません');
            
        }

    }
    public function postGoodExchangeConfirm(Request $req){
        try {
            $exchange = new ExchangeGoods;
            $exchange->name = $req->input('name');
            $exchange->phone = $req->input('phone');
            $exchange->address = $req->input('address');
            $exchange->home_address = $req->input('home_address');
            $exchange->zip_code = $req->input('zip_code');
            $exchange->furigana = $req->input('furigana');
            $exchange->status = 'unread';

            $exchange->save();

            $user = Auth::user();
            $user->point = $req->input('point');
            $user->save();
            return redirect('/good-exchange-complete');
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }
    }
}