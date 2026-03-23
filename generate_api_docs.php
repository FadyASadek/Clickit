<?php
require 'vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$routes = app('router')->getRoutes();

$markdown = "# Flutter API Integration Guide (Complete Reference)\n\n";
$markdown .= "This guide is designed for the Mobile (Flutter/Dart) Developer. It outlines the structure, authentication, and error handling for all available Clickit Endpoints.\n\n";

$markdown .= "> **ملاحظة هامة للمطور (Critical Note for Developer):**\n";
$markdown .= "> All endpoints now strictly follow the **Defensive Programming** paradigm. You will no longer encounter random `500 Internal Server Errors`. Instead, you must properly handle `404 Not Found`, `400 Bad Request`, and `401 Unauthorized` HTTP status codes in your Dio/HTTP interceptors.\n\n";

$markdown .= "---\n\n";
$markdown .= "## 🔒 1. Seller API Authentication (CRITICAL)\n\n";
$markdown .= "The Seller & Delivery Man APIs do **not** use the standard Laravel Passport tokens automatically. They rely on a custom token verifier built into the middleware. You **must** pass the exact `auth_token` provided during the login/registration response.\n\n";
$markdown .= "**Requirement:**\n";
$markdown .= "- Header Key: `Authorization`\n";
$markdown .= "- Header Value: `Bearer <auth_token>`\n\n";
$markdown .= "⚠️ **Common Pitfall**: If you forget the `Bearer ` prefix with the space in between, the token split logic inside the backend will fail, and you will receive a silent `401 Unauthorized`.\n\n";

$markdown .= "---\n\n";
$markdown .= "## 🛠️ 2. All Available API Endpoints\n\n";

$categories = [];

foreach ($routes as $route) {
    if (strpos($route->uri(), 'api/') === 0) {
        $uri = $route->uri();
        $methodsArray = array_diff($route->methods(), ['HEAD', 'OPTIONS']);
        if (empty($methodsArray)) continue;
        
        $methods = implode('|', $methodsArray);
        $middlewaresArray = [];
        foreach ($route->gatherMiddleware() as $m) {
            if (is_string($m)) {
                $middlewaresArray[] = $m;
            }
        }
        $middlewares = implode(', ', $middlewaresArray);
        
        // Categorize by the segment after api/vX/
        $segments = explode('/', $uri);
        $version = $segments[1] ?? 'v1';
        $category = $segments[2] ?? 'general';
        
        // Special categorization for seller/delivery-man since they use v2/v3
        if ($category === 'seller' || $category === 'delivery-man') {
            $subCategory = $segments[3] ?? 'general';
            $displayCategory = strtoupper($category) . ' - ' . ucfirst($subCategory) . ' (' . strtoupper($version) . ')';
        } else {
            $displayCategory = strtoupper($category) . ' (' . strtoupper($version) . ')';
        }

        if (!isset($categories[$displayCategory])) {
            $categories[$displayCategory] = [];
        }
        
        $auth_note = "";
        $headers = [];
        
        if (strpos($middlewares, 'auth:customer') !== false || strpos($middlewares, 'auth:api') !== false) {
            $headers[] = "`Authorization: Bearer <customer_token>`";
        } elseif (strpos($middlewares, 'seller_api_auth') !== false || strpos($middlewares, 'seller') !== false) {
            $headers[] = "`Authorization: Bearer <seller_auth_token>`";
        } elseif (strpos($middlewares, 'deliveryman_api_auth') !== false || strpos($middlewares, 'delivery_man') !== false) {
            $headers[] = "`Authorization: Bearer <delivery_man_auth_token>`";
        }
        
        $headers_str = empty($headers) ? "*None (Public Endpoint)*" : implode("  \n", $headers);
        
        $params = [];
        preg_match_all('/\{([a-zA-Z0-9_]+)\}/', $uri, $matches);
        if (!empty($matches[1])) {
            foreach ($matches[1] as $param) {
                $params[] = "- `$param`: URL Parameter";
            }
        }
        if (in_array('POST', $methodsArray) || in_array('PUT', $methodsArray)) {
            $params[] = "- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*";
        }
        
        $params_str = empty($params) ? "*No explicit URL parameters*" : implode("\n", $params);
        
        $endpointDoc = "### `[" . $methods . "]` /" . $uri . "\n";
        $endpointDoc .= "- **Headers Required:** \n  " . $headers_str . "\n";
        if (strpos($middlewares, 'api') !== false) {
            $endpointDoc .= "- **Middlewares:** `" . $middlewares . "`\n";
        }
        $endpointDoc .= "- **Inputs/Params:** \n" . $params_str . "\n\n";
        
        $categories[$displayCategory][] = $endpointDoc;
    }
}

ksort($categories);

foreach ($categories as $cat => $endpoints) {
    if(count($endpoints) > 0) {
        $markdown .= "<details>\n<summary><b>📂 Category: " . $cat . " (" . count($endpoints) . " endpoints)</b></summary>\n\n";
        foreach ($endpoints as $ep) {
            $markdown .= $ep;
        }
        $markdown .= "</details>\n\n";
    }
}

$markdown .= "---\n\n";
$markdown .= "## 📱 3. Handling Responses in Flutter (Best Practices)\n\n";
$markdown .= "1. **Always Evaluate Status Codes:** Use a strict interceptor strategy in `Dio` or `http`.\n";
$markdown .= "   - `200`: HTTP Ok. Parse JSON directly via your Dart models (e.g., `Product.fromJson(json)`).\n";
$markdown .= "   - `401`: Unauthorized. Immediately clear local `SharedPreferences` user data and auto-redirect to the Login Screen.\n";
$markdown .= "   - `404`: Not Found. **Do not crash the view!** Show a delicate UI element (like an empty state vector or a Toast \"Item not found\") and pop the navigation stack if needed.\n";
$markdown .= "   - `400 / 403`: Validation or Business Logic Error. Read the `message` or `errors` array from the JSON response and show it directly to the user (e.g., via SnackBar).\n";

file_put_contents('FLUTTER_API_GUIDE.md', $markdown);
echo "Documentation successfully generated and saved to FLUTTER_API_GUIDE.md!\n";
