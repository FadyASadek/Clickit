<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernelConsole = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernelConsole->bootstrap();
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

use Illuminate\Support\Facades\Route;
use App\Models\Seller;
use Illuminate\Http\Request;

$seller = Seller::where('email', 'test_seller@clickit.com')->first();
$sellerToken = $seller ? $seller->auth_token : '';
echo "Using Seller Token: $sellerToken\n";

$routes = Route::getRoutes();

echo "🚀 Starting automated Seller API testing (v2 & v3)...\n";

foreach ($routes as $route) {
    $uri = $route->uri();
    
    // Only check APIs with v2 or v3 and seller in URI
    if ((strpos($uri, 'api/v2/seller') === 0 || strpos($uri, 'api/v3/seller') === 0) && in_array('GET', $route->methods())) {
        
        $originalUri = $uri;
        
        $uri = str_replace(
            ['{id}', '{type}', '{seller_id}'],
            ['1',    'customer', $seller->id ?? '1'], 
            $uri
        );
        
        if (strpos($uri, '{') !== false) {
             // skip unmocked parameters for now
             continue;
        }
        if (preg_match('/(delete|cancel|logout|refund-status-update)/', $uri) && strpos($uri, 'get-') === false) continue;

        $url = '/' . $uri . "?limit=10&offset=1";
        
        $request = Request::create($url, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', "Bearer $sellerToken");
        
        $response = $kernel->handle($request);
        $status = $response->getStatusCode();
        $kernel->terminate($request, $response);
        
        if ($status == 200) {
            $color = '🟢 OK';
        } elseif (in_array($status, [403, 401])) {
            $color = '🟡 Auth/Perm';
        } elseif ($status == 404) {
            $color = '⚪ Not Found';
        } elseif ($status == 500) {
            $color = '🔴 Error 500';
            echo "   [!] CRASH DETECTED ON: /$originalUri\n";
            echo substr($response->getContent(), 0, 500) . "...\n";
        } elseif ($status == 422) {
            $color = '🟠 Validation Error';
        } else {
            $color = "🟣 $status";
        }
        
        echo " -> /$originalUri [$status] $color\n";
    }
}
echo "✅ Testing complete.\n";
