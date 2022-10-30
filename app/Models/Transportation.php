<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Transportation extends Model
{
    protected $fillable = ['police_number', 'name', 'type', 'status', 'min_capacity', 'max_capacity'];

    // public function cat_info(){
    //     return $this->hasOne('App\Models\Category','id','cat_id');
    // }
    // public function sub_cat_info(){
    //     return $this->hasOne('App\Models\Category','id','child_cat_id');
    // }
    public static function getAllTransportation()
    {
        return Transportation::orderBy('id', 'desc')->paginate(10);
    }
    // public function rel_prods(){
    //     return $this->hasMany('App\Models\Product','cat_id','cat_id')->where('status','active')->orderBy('id','DESC')->limit(8);
    // }

    public function order()
    {
        return $this->belongsTo(Order::class, 'truk');
    }

    // public static function getProductBySlug($slug){
    //     return Product::with(['cat_info','rel_prods','getReview'])->where('slug',$slug)->first();
    // }
    public static function countActiveItem()
    {
        $data = Transportation::where('status', 'active')->count();
        if ($data) {
            return $data;
        }
        return 0;
    }

    public static function countInUsedItem()
    {
        $data = Transportation::where('status', 'in_used')->count();
        if ($data) {
            return $data;
        }
        return 0;
    }

    // public function carts(){
    //     return $this->hasMany(Cart::class)->whereNotNull('order_id');
    // }

    // public function wishlists(){
    //     return $this->hasMany(Wishlist::class)->whereNotNull('cart_id');
    // }

    // public function brand(){
    //     return $this->hasOne(Brand::class,'id','brand_id');
    // }

}
