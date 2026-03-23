<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$log = "Starting log...\n";

try {
    $seller = Seller::where('email', 'seller@test.com')->first();
    if ($seller) {
        $log .= "Seller already exists: {$seller->id}\n";
        $log .= "Auth Token: {$seller->auth_token}\n";
    } else {
        $log .= "Creating seller...\n";
        $seller = Seller::create([
            'f_name' => 'Test',
            'l_name' => 'Seller',
            'phone' => '1234567890',
            'email' => 'seller@test.com',
            'password' => Hash::make('12345678'),
            'status' => 'approved',
            'bank_name' => 'Test Bank',
            'branch' => 'Test Branch',
            'account_no' => '123456789',
            'holder_name' => 'Test Seller',
            'sales_commission_percentage' => 0,
            'gst' => 0,
            'auth_token' => Str::random(50)
        ]);
        $log .= "Created seller: {$seller->id}\n";
    }
} catch (\Exception $e) {
    $log .= "EXCEPTION: " . $e->getMessage() . "\n" . $e->getTraceAsString() . "\n";
}

file_put_contents('seller_log.txt', $log);
echo "Written to seller_log.txt\n";
