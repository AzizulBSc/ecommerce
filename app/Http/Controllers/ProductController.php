<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use App\Models\Coupons;
use App\Models\ProductsImages;
use App\Models\ProductsAttributes;
use Attribute;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class ProductController extends Controller
{
  public function addProduct(Request $request)
  {
    if ($request->ismethod('post')) {
      $data = $request->all();
      // echo "<pre>";print_r($data);die;
      $product = new Products;
      $product->category_id = $data['category_id'];
      $product->name = $data['product_name'];
      $product->code = $data['product_code'];
      $product->color = $data['product_color'];
      $product->price = $data['product_price'];
      if (!empty($data['product_desc'])) {
        $product->description = $data['product_desc'];
      } else {
        $product->description = ' ';
      }
      //upload image
      if ($request->hasFile('image')) {
        $img_tmp = $request->file('image');
        if ($img_tmp->isValid()) {
          //imge path code
          $extension = $img_tmp->getClientOriginalExtension();
          $filename = rand(111, 99999) . '.' . $extension;
          $img_path = 'uploads/products/' . $filename;
          //image resize 
          Image::make($img_tmp)->resize(500, 500)->save($img_path);
          $product->image = $filename;
        }
      }
      $product->save();

      Alert::success('Saved', ' Product has been Saved Successfully!!');
      return redirect('/admin/view-product');
      //  ->with('flash_message_success','Product has been save successfully!!');
    }
    //Categories Dropdown menu Code
    $categories = Category::where(['parent_id' => 0])->get();
    $categories_dropdown = "<option value='' selected disabled>Select</option>";
    foreach ($categories as $cat) {
      $categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name . "</option>";
      $sub_categories = Category::where(['parent_id' => $cat->id])->get();
      foreach ($sub_categories as $sub_cat) {
        $categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;--&nbsp" . $sub_cat->name . "</option>";
      }
    }

    return view('admin.products.addProduct')->with(compact('categories_dropdown'));
  }



  public function viewProduct()
  {
    $products = Products::get();
    return view('admin.products.viewProducts')->with(compact('products'));
  }

  public function editProduct(Request $request, $id = null)
  {

    if ($request->ismethod('post')) {
      $data = $request->all();

      //upload image
      if ($request->hasFile('image')) {
        $img_tmp = $request->file('image');
        if ($img_tmp->isValid()) {
          //imge path code
          $extension = $img_tmp->getClientOriginalExtension();
          $filename = rand(111, 99999) . '.' . $extension;
          $img_path = 'uploads/products/' . $filename;
          //image resize 
          Image::make($img_tmp)->resize(500, 500)->save($img_path);
        }
      } else {
        $filename = $data['current_image'];
      }
      if (empty($data['product_desc'])) {
        $data['product_desc'] = '';
      }
      Products::where(['id' => $id])->update([
        'category_id' => $data['category_id'],
        'name' => $data['product_name'],
        'code' => $data['product_code'],
        'color' => $data['product_color'],
        'price' => $data['product_price'],
        'description' => $data['product_desc'],
        'image' => $filename
      ]);
      Alert::success('Updated', ' Product Updated Successfully!!');
      return redirect('/admin/view-product');
    }

    $productDetails = Products::where(['id' => $id])->first();

    //Category dropdown code 
    $categories = Category::where(['parent_id' => 0])->get();
    $categories_dropdown = "<option value='' selected disabled>Select</option>";
    foreach ($categories as $cat) {
      if ($cat->id == $productDetails->category_id) {
        $selected = "selected";
      } else {
        $selected = "";
      }
      $categories_dropdown .= "<option value='" . $cat->id . "' " . $selected . ">" . $cat->name . "</option>";
      //code for showing subcategories in main category
      $sub_categories = Category::where(['parent_id' => $cat->id])->get();
      foreach ($sub_categories as $sub_cat) {
        if ($sub_cat->id == $productDetails->category_id) {
          $selected = "selected";
        } else {
          $selected = "";
        }
        $categories_dropdown .= "<option value = '" . $sub_cat->id . "' " . $selected . ">&nbsp;--&nbsp;" . $sub_cat->name . "</option>";
      }
    }
    $productDetails = Products::where(['id' => $id])->first();
    return view('admin.products.editProduct')->with(compact('productDetails', 'categories_dropdown'));
  }

  public function deleteProduct($id = null)
  {
    Products::where(['id' => $id])->delete();
    Alert::warning('Deleted', ' Product Deleted Successfully');
    return redirect('/admin/view-product');
  }
  public function updateStatus(Request $request, $id = null)
  {
    $data = $request->all();
    Products::where('id', $data['id'])->update(['status' => $data['status']]);
  }

  public function updateFeatured(Request $request, $id = null)
  {
    $data = $request->all();
    Products::where('id', $data['id'])->update(['featured_products' => $data['status']]);
  }

  public function products($id = null)
  {
    $productDetails = Products::with('attributes')->where('id', $id)->first();
    $ProductsAltImages = ProductsImages::where('product_id', $id)->get();
    $featuredProducts = Products::where(['featured_products' => 1])->get();
    // echo $productDetails;die;
    return view('wayshop.product_details')->with(compact('productDetails', 'ProductsAltImages', 'featuredProducts'));
  }



  //Start Add Attribute Function

  public function add_attributes(Request $request, $id = null)
  {
    $productDetails = Products::where(['id' => $id])->first();
    if ($request->isMethod('post')) {
      $data = $request->all();
      // echo "<pre>";print_r($data);die;
      foreach ($data['sku'] as $key => $val) {
        if (!empty($val)) {
          //Prevent duplicate SKU Record
          $attrCountSKU = ProductsAttributes::where('sku', $val)->count();
          if ($attrCountSKU > 0) {
            return redirect('/admin/add_attributes/' . $id)->with('flash_message_error', 'SKU is already exist please select another sku');
          }
          //Prevent duplicate Size Record
          $attrCountSizes = ProductsAttributes::where(['product_id' => $id, 'size' => $data['size'][$key]])->count();
          if ($attrCountSizes > 0) {
            return redirect('/admin/add_attributes/' . $id)->with('flash_message_error', '' . $data['size'][$key] . 'Size is already exist please select another size');
          }
          $attribute = new ProductsAttributes;
          $attribute->product_id = $id;
          $attribute->sku = $val;
          $attribute->size = $data['size'][$key];
          $attribute->price = $data['price'][$key];
          $attribute->stock = $data['stock'][$key];
          $attribute->save();
        }
      }
      Alert::success('Added', ' Products attributes added successfully!');
      return redirect('/admin/add_attributes/' . $id);
      //->with('flash_message_success','Products attributes added successfully!');

    }
    return view('admin.products.add_attributes')->with(compact('productDetails'));
  }
  //END Add Attribute Function

  //Delete Attribute Function
  public function delete_attribute($id = null)
  {

    ProductsAttributes::where(['id' => $id])->delete();

    Alert::warning('Deleted', ' Attribute Deleted Successfully');
    return redirect()->back();
  }

  //Edit Attributes fun

  public function editAttributes(Request $request, $id = null)
  {
    if ($request->isMethod('post')) {
      $data = $request->all();
      foreach ($data['attr'] as $key => $attr) {
        ProductsAttributes::where(['id' => $data['attr'][$key]])->update([
          'sku' => $data['sku'][$key],
          'size' => $data['size'][$key], 'price' => $data['price'][$key], 'stock' => $data['stock'][$key]
        ]);
      }
      return redirect()->back()->with('flash_message_success', 'Products Attributes Updated!!!');
    }
  }

  //Product Images add
  public function addImages(Request $request, $id = null)
  {
    $productDetails = Products::where(['id' => $id])->first();
    if ($request->isMethod('post')) {
      $data = $request->all();
      if ($request->hasfile('image')) {
        $files = $request->file('image');
        foreach ($files as $file) {
          $image = new ProductsImages;
          $extension = $file->getClientOriginalExtension();
          $filename = rand(111, 9999) . '.' . $extension;
          $image_path = 'uploads/products/' . $filename;
          Image::make($file)->save($image_path);
          $image->image = $filename;
          $image->product_id = $data['product_id'];
          $image->save();
        }
      }
      return redirect('/admin/add_images/' . $id)->with('flash_message_success', 'Image has been updated');
    }
    $productImages = ProductsImages::where(['product_id' => $id])->get();
    return view('admin.products.add_images')->with(compact('productDetails', 'productImages'));
  }

  // Product Image Delete
  public function deleteImage($id = null)
  {
    $productImage = ProductsImages::where(['id' => $id])->first();
    $image_path = 'uploads/products/';
    if (file_exists($image_path . $productImage->image)) {
      unlink($image_path . $productImage->image);
    }
    ProductsImages::where(['id' => $id])->delete();
    Alert::success('Deleted', 'Product Image Deleted Successfully');
    return redirect()->back();
  }
  public function getprice(Request $request)
  {
    $data = $request->all();
    //echo "<pre>";print_r($data);die;
    $proArr = explode("-", $data['idSize']);
    $proAttr = ProductsAttributes::where(['product_id' => $proArr[0], 'size' => $proArr[1]])->first();
    echo $proAttr->price;
  }

  //add to Cart fun 
  public function addtoCart(Request $request)
  {
    Session::forget('CouponAmount' );
    Session::forget('CouponCode');
    $data = $request->all();
    // echo "<pre>";print_r($data);die;
    if (empty($data['email'])) {
      $data['user_email'] = '';
    }
    $session_id = Str::random(40);
    Session::put('session_id', $session_id);
    $sizeArr = explode('-', $data['size']);
    DB::table('cart')->insert([
      'product_id' => $data['product_id'],
      'product_name' => $data['product_name'],
      'product_code' => $data['product_code'],
      'product_color' => $data['color'],
      'price' => $data['price'],
      'size' => $sizeArr[1],
      'quantity' => $data['quantity'],
      'user_email' => $data['user_email'],
      'session_id' => $session_id
    ]);

    return redirect('/cart')->with('flash_message_success', 'Product has been added in cart');
  }
  public function cart()
  {
    $session_id = Session::get('session_id');
    $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
    foreach ($userCart as $key => $products) {
      $productsDetails = Products::where(['id' => $products->product_id])->first();
      $userCart[$key]->image = $productsDetails->image;
    }
    // echo "<pre>";print_r($userCart);die;
    return view('wayshop.products.cart')->with(compact('userCart'));
  }
  public function deleteCartProduct($id = null)
  {
    Session::forget('CouponAmount');
    Session::forget('CouponCode');
    DB::table('cart')->where('id', $id)->delete();
    return redirect('/cart')->with('flash_message_error', 'Product has been deleted!');
  }
  public function applyCoupon(Request $request)
  {
    Session::forget('CouponAmount');
    Session::forget('CouponCode');
    if ($request->isMethod('post')) {
      $data = $request->all();
      $couponCount = Coupons::where('coupon_code', $data['coupon_code'])->count();
      if ($couponCount == 0) {
        return redirect()->back()->with('flash_message_error', 'Coupon Does not Exsist');
      } else {
        $couponDetails = Coupons::where('coupon_code', $data['coupon_code'])->first();
        if ($couponDetails->status == 0) {
          return redirect()->back()->with('flash_message_error', 'Coupon Does not active now');
        }
        $expiry_date = $couponDetails->expiry_date;
        $current_date = date('Y-m-d');
        if ($expiry_date < $current_date) {
          return redirect()->back()->with('flash_message_error', 'This Coupon is Expaired');
        }
        $total_amount = 0;
        $session_id = Session::get('session_id');
        $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
        foreach ($userCart as $item) {
          $total_amount = $total_amount + ($item->price * $item->quantity);
        }
        //check type of coupon
        if ($couponDetails->amount_type == "Fixed") {
          $couponAmount = $couponDetails->amount;
        } else {
          $couponAmount = $total_amount * ($couponDetails->amount / 100);
        }
        Session::put('CouponAmount', $couponAmount);
        Session::put('CouponCode', $data['coupon_code']);
        return redirect()->back()->with('flash_message_sucess', 'Your Coupon Apllied On your Total amount');
      }
    }
  }
}
