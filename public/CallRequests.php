<?php

use Illuminate\Database\Capsule\Manager as DB;
use App\Models\CallRequest;

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::capture();
$response = $kernel->handle($request);

header('Content-Type: application/json');

// Ambil body JSON dan decode
$input = json_decode($request->getContent(), true);

// Tampilkan isi dari $input untuk debugging
echo json_encode([
    'received_input' => $input
]);

// Validasi input
if (!isset($input['id_device'], $input['button_type'], $input['status'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    exit;
}

try {
    // Simpan data ke database
    $data = CallRequest::create([
        'id_device' => $input['id_device'],
        'button_type' => $input['button_type'], // Gunakan button_type sebagai type
        'status' => $input['status'],    // Gunakan status langsung
    ]);

    // Berikan respon sukses
    echo json_encode(['status' => 'ok', 'message' => 'Success']);
} catch (Exception $e) {
    // Berikan respon error jika ada masalah
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
