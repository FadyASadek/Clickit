<?php
require 'vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\SellerWallet;
use App\Models\Seller;
use App\Models\Shop;
use Illuminate\Support\Str;

try {
    $seller_id = 6;
    $seller = Seller::find($seller_id);
    if (!$seller) {
        throw new Exception("Seller not found!");
    }

    $shop = Shop::where('seller_id', $seller_id)->first();
    if (!$shop) {
        $shop = new Shop();
        $shop->seller_id = $seller_id;
        $shop->name = 'Test Shop';
        $shop->slug = 'test-shop-' . Str::random(5);
        $shop->contact = $seller->phone ?? '123456789';
        $shop->image = 'def.png';
        $shop->save();
        echo "Created Shop ID: {$shop->id}.\n";
    }
    $shop_id = $shop->id;

    // Create 3 products
    $products = [];
    for ($i = 1; $i <= 3; $i++) {
        $product = new Product();
        $product->name = "Success Product $i";
        $product->slug = Str::slug("Success Product $i") . '-' . Str::random(6);
        $product->user_id = $seller_id;
        $product->added_by = 'seller';
        $product->category_ids = json_encode([['id' => '1', 'position' => 1]]);
        $product->brand_id = 1;
        $product->unit = 'pc';
        $product->product_type = 'physical';
        $product->minimum_order_qty = 1;
        $product->refundable = 1;
        $product->images = json_encode(['def.png']);
        $product->thumbnail = 'def.png';
        $product->colors = '[]';
        $product->attributes = '[]';
        $product->choice_options = '[]';
        $product->variation = '[]';
        $product->unit_price = 100 * $i;
        $product->purchase_price = 50 * $i;
        $product->tax = 5;
        $product->tax_type = 'percent';
        $product->discount = 10;
        $product->discount_type = 'flat';
        $product->current_stock = 50;
        $product->details = "This is a success scenario product $i";
        $product->status = 1;
        $product->request_status = 1; // Approved
        $product->save();
        $products[] = $product;
    }

    echo "Created 3 products.\n";

    // Create an order
    $order = new Order();
    $order->customer_id = 1;
    $order->customer_type = 'customer';
    $order->payment_status = 'paid';
    $order->order_status = 'pending';
    $order->payment_method = 'cash_on_delivery';
    $order->order_amount = 300;
    $order->order_type = 'default_type';
    $order->seller_id = $seller_id;
    $order->seller_is = 'seller';
    $order->shipping_address = json_encode([
        "contact_person_name" => "Ahmed Test",
        "address_type" => "Home",
        "address" => "123 Street",
        "city" => "Cairo",
        "zip" => "11111",
        "phone" => "01000000000",
        "latitude" => "",
        "longitude" => "",
        "is_billing" => 0
    ]);
    $order->billing_address = $order->shipping_address;
    $order->created_at = now();
    $order->updated_at = now();
    $order->save();

    echo "Created Order ID: {$order->id}.\n";

    // Create order detail
    $order_detail = new OrderDetail();
    $order_detail->order_id = $order->id;
    $order_detail->product_id = $products[0]->id;
    $order_detail->seller_id = $seller_id;
    $order_detail->product_details = json_encode($products[0]->toArray());
    $order_detail->qty = 2;
    $order_detail->price = $products[0]->unit_price;
    $order_detail->tax = 10;
    $order_detail->discount = 20;
    $order_detail->delivery_status = 'pending';
    $order_detail->payment_status = 'paid';
    $order_detail->created_at = now();
    $order_detail->updated_at = now();
    $order_detail->save();

    echo "Created Order Detail ID: {$order_detail->id}.\n";

    // Create or update Seller Wallet
    $wallet = SellerWallet::where('seller_id', $seller_id)->first();
    if (!$wallet) {
        $wallet = new SellerWallet();
        $wallet->seller_id = $seller_id;
        $wallet->total_earning = 1000;
        $wallet->withdrawn = 0;
        $wallet->created_at = now();
        $wallet->updated_at = now();
    }
    $wallet->balance = 500;
    $wallet->save();

    echo "Seller Wallet configured (Balance 500).\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
