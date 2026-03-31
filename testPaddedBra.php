<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

try {
    $p = App\Models\Product::where('slug', 'padded-bra-model-45065-ava')->first();
    echo "Product id: " . ($p->id ?? 'null') . "\n";
    $formatted = App\Utils\Helpers::product_data_formatting($p, false);
    echo "Formatted!\n";
} catch (\Throwable $e) {
    echo get_class($e) . ': "' . $e->getMessage() . '" in ' . $e->getFile() . ':' . $e->getLine() . "\n";
    echo $e->getTraceAsString();
}
