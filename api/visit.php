<?php
// api/visit.php
require_once __DIR__ . '/../../../config.php';  
require_once __DIR__ . '/db.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

// 요청 메소드 확인
$method = $_SERVER['REQUEST_METHOD'];

// POST 요청 처리 (비밀번호 검증)
if ($method === 'POST') {
  // JSON 데이터 파싱
  $json = file_get_contents('php://input');
  $data = json_decode($json, true);
  
  // 비밀번호 검증
  $password = $data['password'] ?? '';
  $correctPassword = MASTER_KEY;
  
  if ($password === $correctPassword) {
    try {
      // 기본 통계 데이터
      $today = date('Y-m-d');
      
      // 날짜 범위가 제공된 경우
      $startDate = $data['startDate'] ?? date('Y-m-d', strtotime('-30 days'));
      $endDate = $data['endDate'] ?? $today;
      
      // 당일 방문자 수 조회
      $daily = $pdo->prepare("SELECT COUNT(*) FROM visits WHERE visit_date = ?");
      $daily->execute([$today]);
      $dailyCount = (int)$daily->fetchColumn();

      // 전체 방문자 수 조회
      $total = $pdo->query("SELECT COUNT(*) FROM visits");
      $totalCount = (int)$total->fetchColumn();
      
      // 날짜별 방문자 수 조회 (그래프용)
      if ($startDate === $endDate) {
        // 단일일: 정확한 생성 시각별 데이터 (visit_time alias)
        $stmt = $pdo->prepare(
          "SELECT visit_date AS visit_time, COUNT(*) AS count
           FROM visits
           WHERE DATE(visit_date) = ?
           GROUP BY visit_date
           ORDER BY visit_date ASC"
        );
        $stmt->execute([$startDate]);
        $graphData = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } else {
        // 기존 기간별 조회
        $graph = $pdo->prepare(
          "SELECT DATE(visit_date) as visit_date, COUNT(*) as count 
           FROM visits 
           WHERE DATE(visit_date) BETWEEN ? AND ? 
           GROUP BY DATE(visit_date) 
           ORDER BY visit_date ASC"
        );
        $graph->execute([$startDate, $endDate]);
        $graphData = $graph->fetchAll(PDO::FETCH_ASSOC);
      }
      
      // 최근 7일 방문자 추이
      $weekly = $pdo->prepare("
        SELECT visit_date, COUNT(*) as count 
        FROM visits 
        WHERE visit_date BETWEEN DATE_SUB(?, INTERVAL 6 DAY) AND ? 
        GROUP BY visit_date 
        ORDER BY visit_date ASC
      ");
      $weekly->execute([$today, $today]);
      $weeklyData = $weekly->fetchAll(PDO::FETCH_ASSOC);

      echo json_encode([
        'success' => true,
        'auth_success' => true,
        'daily_count' => $dailyCount,
        'total_count' => $totalCount,
        'graph_data' => $graphData,
        'weekly_data' => $weeklyData
      ]);
    } catch (Exception $e) {
      http_response_code(500);
      echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
  } else {
    echo json_encode([
      'success' => false,
      'auth_success' => false,
      'message' => '비밀번호가 일치하지 않습니다.'
    ]);
  }
}
// GET 요청 처리 (방문 기록)
else {
  try {
    $today = date('Y-m-d');
    $now   = date('Y-m-d H:i:s');
    $ip    = $_SERVER['REMOTE_ADDR'] ?? '';

    // 방문 기록 저장
    $ins = $pdo->prepare("INSERT INTO visits (visit_date, ip) VALUES (?, ?)");
    $ins->execute([$now, $ip]);

    // 당일 방문자 수 조회
    $daily = $pdo->prepare("SELECT COUNT(*) FROM visits WHERE DATE(visit_date) = ?");
    $daily->execute([$today]);
    $dailyCount = (int)$daily->fetchColumn();

    // 전체 방문자 수 조회
    $total = $pdo->query("SELECT COUNT(*) FROM visits");
    $totalCount = (int)$total->fetchColumn();

    // 최초 방문 날짜 조회
    $firstDateStmt = $pdo->query("SELECT MIN(DATE(visit_date)) FROM visits");
    $earliestDate = $firstDateStmt->fetchColumn() ?: $today;

    echo json_encode([
      'success'     => true,
      'daily_count' => $dailyCount,
      'total_count' => $totalCount,
      'earliest_date' => $earliestDate
    ]);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success'=>false,'message'=>$e->getMessage()]);
  }
}