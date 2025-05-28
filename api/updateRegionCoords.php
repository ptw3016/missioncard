<?php
// api/updateRegionCoords.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// // CORS 허용
// header('Access-Control-Allow-Origin: https://www.spread0608.com');   // 프로덕션 도메인만 허용
// header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
// header('Access-Control-Allow-Headers: Content-Type, Authorization');

// // preflight 요청 대응
// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     exit;
// }

// // CORS preflight 대응
// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     header('Access-Control-Allow-Origin: *');
//     header('Access-Control-Allow-Methods: POST, OPTIONS');
//     header('Access-Control-Allow-Headers: Content-Type');
//     exit;
// }

try {
    require_once 'db.php';  // db.php 경로 확인

    // raw JSON body 읽기
    $input = json_decode(file_get_contents('php://input'), true);
    if (!isset($input['buttons']) || !is_array($input['buttons'])) {
        throw new Exception('Invalid payload');
    }

    // 트랜잭션 시작
    $pdo->beginTransaction();
    $stmt = $pdo->prepare("UPDATE region_buttons SET coord_x = :x, coord_y = :y WHERE button_id = :id");

    foreach ($input['buttons'] as $btn) {
        if (!isset($btn['id'], $btn['x'], $btn['y'])) continue;
        $stmt->execute([
            ':x'  => $btn['x'],
            ':y'  => $btn['y'],
            ':id' => $btn['id']
        ]);
    }

    // 트랜잭션 커밋 및 성공 응답
    $pdo->commit();
    echo json_encode(['success' => true]);

} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error'   => $e->getMessage()
    ]);
}