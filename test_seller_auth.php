<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$kernelHttp = $app->make(Illuminate\Contracts\Http\Kernel::class);

use App\Models\Seller;

$seller = Seller::where('email', 'seller@test.com')->first();
$sellerToken = $seller->auth_token;
echo "Token: $sellerToken\n";

$request = Illuminate\Http\Request::create('/api/v3/seller/seller-info', 'GET');
$request->headers->set('Authorization', "Bearer $sellerToken");
$request->headers->set('Accept', 'application/json');

$response = $kernelHttp->handle($request);
echo "Status: {$response->getStatusCode()}\n";
echo "Content: {$response->getContent()}\n";

$kernelHttp->terminate($request, $response);
