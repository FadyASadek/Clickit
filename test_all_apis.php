<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernelConsole = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernelConsole->bootstrap();
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Seller;
use Illuminate\Http\Request;

$customer = User::where('email', 'customer@test.com')->first();
$customerToken = '';
if ($customer) {
    // Some Laravel Passport systems expect specific guards, for test purposes we pull the latest token
    $tokenObj = DB::table('oauth_access_tokens')->where('user_id', $customer->id)->where('revoked', 0)->orderBy('created_at', 'desc')->first();
    if (!$tokenObj) {
        $customerToken = $customer->createToken('LaravelAuthApp')->accessToken;
    } else {
        // Just recreate for ease
        $customerToken = $customer->createToken('LaravelAuthApp')->accessToken;
    }
}

$seller = Seller::where('email', 'seller@test.com')->first();
$sellerToken = '';
if ($seller) {
    if (method_exists($seller, 'createToken')) {
        $sellerToken = $seller->createToken('SellerAuthApp')->accessToken;
    } else {
        $sellerToken = $seller->auth_token;
    }
}

$routes = Route::getRoutes();

$report = "# Clickit Automated API Health Check\n\n";
$report .= "| Scope | Endpoint | HTTP Status | Health Result |\n";
$report .= "|-------|----------|-------------|---------------|\n";

$base_url = "http://localhost:8000";

echo "🚀 Starting automated API testing (Testing ~200 GET endpoints)...\n";

foreach ($routes as $route) {
    $uri = $route->uri();
    
    if (strpos($uri, 'api/') === 0 && in_array('GET', $route->methods())) {
        
        $originalUri = $uri;
        
        // Mock required explicit route parameters
        $uri = str_replace(
            ['{id}', '{slug}', '{product_id}', '{seller_id}', '{type}', '{category_id}', '{brand_id}', '{seller_is}', '{ticket_id}', '{orderId}', '{productId}', '{deal_id}'],
            ['1',  'test-slug', '1',          '2',           'seller', '1',             '1',          'admin',       '1',           '1',         '1',           '1'        ], 
            $uri
        );
        
        // Skip endpoints that still have unmocked brackets
        if (strpos($uri, '{') !== false) continue;

        // Skip destructive endpoints that interfere with subsequent tests
        if (preg_match('/(delete|cancel|logout|refund-status-update)/', $uri) && strpos($uri, 'get-') === false) continue;

        $url = '/api/' . explode('api/', $uri, 2)[1] . "?guest_id=12345678&limit=10&offset=1";
        
        $middlewares = $route->middleware();
        $middlewares = is_array($middlewares) ? $middlewares : [$middlewares];
        
        $request = Request::create($url, 'GET');
        $request->headers->set('Accept', 'application/json');

        if (in_array('auth:api', $middlewares)) {
            $request->headers->set('Authorization', "Bearer $customerToken");
        } elseif (in_array('seller_api_auth', $middlewares) || in_array('seller_auth', $middlewares) || in_array('api, api_lang, delivery_man_auth', $middlewares)) {
            $request->headers->set('Authorization', "Bearer $sellerToken");
        }
        
        $response = $kernel->handle($request);
        $status = $response->getStatusCode();
        $kernel->terminate($request, $response);
        
        if ($status == 200) {
            $color = '🟢 OK';
        } elseif (in_array($status, [403, 401])) {
            $color = '🟡 Auth/Perm';
        } elseif ($status == 404) {
            $color = '⚪ Not Found (Mock)';
        } elseif ($status == 500) {
            $color = '🔴 Error 500';
            echo "   [!] CRASH DETECTED ON: /$originalUri\n";
            echo substr($response->getContent(), 0, 500) . "...\n";
        } elseif ($status == 422) {
            $color = '🟠 Validation Error';
        } else {
            $color = "🟣 $status";
        }
        
        // Scope logic
        $scope = strpos($originalUri, 'v1') !== false ? 'Customer/Guest' : (strpos($originalUri, 'v2') !== false ? 'Mobile App/Dev' : 'Seller');
        
        $report .= "| $scope | `/$originalUri` | $status | $color |\n";
        echo " -> /$originalUri [$status]\n";
    }
}

file_put_contents('API_Health_Report.md', $report);
echo "✅ Testing complete. Report generated at API_Health_Report.md\n";
