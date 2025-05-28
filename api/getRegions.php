<?php
// api/getRegions.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// 데이터베이스 연결 포함
require_once 'db.php'; // db.php 파일 경로가 맞는지 확인하세요.

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // 
// CORS 허용
// header('Access-Control-Allow-Origin: https://www.spread0608.com');   // 프로덕션 도메인만 허용
// header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
// header('Access-Control-Allow-Headers: Content-Type, Authorization');

// // preflight 요청 대응
// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     exit;
// }

try {
    // 데이터베이스에서 모든 지역 버튼 정보 가져오기
    $stmt = $pdo->query("SELECT button_id, region_code, coord_x, coord_y, label FROM region_buttons ORDER BY region_code, button_id");
    $buttons = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Vue 컴포넌트에서 사용하는 형식으로 데이터 재구성
    $regionButtons = [];
    foreach ($buttons as $button) {
        $regionCode = $button['region_code'];
        if (!isset($regionButtons[$regionCode])) {
            $regionButtons[$regionCode] = [];
        }
        $regionButtons[$regionCode][] = [
            'id' => $button['button_id'],
            'x' => $button['coord_x'],
            'y' => $button['coord_y'],
            'label' => $button['label']
        ];
    }

    // JSON으로 출력
    echo json_encode($regionButtons);

} catch (\PDOException $e) {
    http_response_code(500);
    // 에러 로그 기록 등 추가 처리
    echo json_encode(['error' => '데이터 조회 중 오류가 발생했습니다: ' . $e->getMessage()]);
    exit;
}
?>