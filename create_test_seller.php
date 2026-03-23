<?php

use Illuminate\Support\Str;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$seller = \App\Models\Seller::where('email', 'test_seller@clickit.com')->first();

if (!$seller) {
    $seller = new \App\Models\Seller();
    $seller->f_name = 'Test';
    $seller->l_name = 'Seller';
    $seller->phone = '01234567890';
    $seller->email = 'test_seller@clickit.com';
    $seller->password = bcrypt('password123');
    $seller->status = 'approved';
    $seller->auth_token = Str::random(50);
    $seller->save();

    \App\Models\SellerWallet::updateOrCreate(
        ['seller_id' => $seller->id],
        [
            'total_earning' => 0, 
            'withdrawn' => 0, 
            'pending_withdraw' => 0, 
            'commission_given' => 0,
            'delivery_charge_earned' => 0,
            'collected_cash' => 0
        ]
    );
} else {
    if (strlen($seller->auth_token) < 30) {
        $seller->auth_token = Str::random(50);
    }
    $seller->status = 'approved';
    $seller->password = bcrypt('password123');
    $seller->save();

    \App\Models\SellerWallet::updateOrCreate(
        ['seller_id' => $seller->id],
        [
            'total_earning' => 0, 
            'withdrawn' => 0, 
            'pending_withdraw' => 0, 
            'commission_given' => 0,
            'delivery_charge_earned' => 0,
            'collected_cash' => 0
        ]
    );
}

$shop = \App\Models\Shop::where('seller_id', $seller->id)->first();
if (!$shop) {
    $shop = new \App\Models\Shop();
    $shop->seller_id = $seller->id;
    $shop->name = 'Test Shop';
    $shop->address = '123 Test Street';
    $shop->contact = '01234567890';
    $shop->image = 'def.png';
    $shop->save();
}

$data = json_encode([
    'id' => $seller->id,
    'email' => $seller->email,
    'auth_token' => $seller->auth_token,
    'password' => 'password123',
    'shop_id' => $shop->id
], JSON_PRETTY_PRINT);

file_put_contents(__DIR__.'/seller_data.txt', $data);
echo "Done.";
