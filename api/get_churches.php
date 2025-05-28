<?php
// api/get_churches.php

// --- DEBUGGING: Display errors (Remove in production!) ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// --- END DEBUGGING ---

// CORS 허용
// header('Access-Control-Allow-Origin: https://www.spread0608.com');   // 프로덕션 도메인만 허용
// header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
// header('Access-Control-Allow-Headers: Content-Type, Authorization');

// // preflight 요청 대응
// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     exit;
// }
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once 'db.php'; // $pdo 생성

$type     = isset($_GET['type'])      ? $_GET['type']      : null;
$regionId = isset($_GET['region_id']) ? $_GET['region_id'] : null;

try {
    // 교구별 요청 처리
    if ($type === 'diocese') {
        $stmt = $pdo->prepare("
            SELECT
                id, church_identifier, region_name, church_name, pastor_name, 
                address, diocese, 
                capacity, service_time, is_island, 
                region_id, group_name, parking_info 
            FROM churches
            WHERE diocese IS NOT NULL AND diocese != '' -- 교구 정보가 있는 교회만 선택
            ORDER BY diocese, church_name -- 교구 이름, 교회 이름 순으로 정렬
        ");
        $stmt->execute();
        $all_churches = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $grouped_by_diocese = [];
        foreach ($all_churches as $church) {
            $diocese_name = $church['diocese'];
            if (!isset($grouped_by_diocese[$diocese_name])) {
                $grouped_by_diocese[$diocese_name] = [];
            }
            $grouped_by_diocese[$diocese_name][] = $church;
        }

        echo json_encode(['data' => $grouped_by_diocese]);
        exit;
    }

    // 해외/선교지 요청 처리
    if ($type === 'overseas') {
        $stmt = $pdo->prepare("
            SELECT church_id, diocese, church_name, country, remarks, nation_code, nation
            FROM overseas_churchs
        ");
        $stmt->execute();
        $churches = $stmt->fetchAll();
        echo json_encode(['data' => $churches]);
        exit;
    }

    // 지역별 요청 처리
    if (!$regionId) {
        http_response_code(400);
        echo json_encode(['error' => '지역 ID 또는 유형(type)이 필요합니다.']);
        exit;
    }

    $stmt = $pdo->prepare("
        SELECT
            id, church_identifier, region_name, capacity,
            service_time, is_island, church_name, pastor_name,
            address, region_id, group_name, parking_info, diocese
        FROM churches
        WHERE region_id = :region_id
    ");
    $stmt->bindParam(':region_id', $regionId, PDO::PARAM_STR);
    $stmt->execute();
    $churches = $stmt->fetchAll();

    echo json_encode($churches);

} catch (\PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => '데이터를 가져오는 중 오류가 발생했습니다.']);
}