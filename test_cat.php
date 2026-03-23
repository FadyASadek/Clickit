<?php
$c = stream_context_create(['http'=>['ignore_errors'=>true]]);
echo file_get_contents('http://localhost:8000/api/v1/categories/products/1?guest_id=123', false, $c);
