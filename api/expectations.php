<?php
// api/expectations.php

require_once __DIR__ . '/../../../config.php';  
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once 'db.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// // CORS 허용
// header('Access-Control-Allow-Origin: https://www.spread0608.com');   // 프로덕션 도메인만 허용
// header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
// header('Access-Control-Allow-Headers: Content-Type, Authorization');

// // preflight 요청 대응
// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     exit;
// }

$action = $_REQUEST['action'] ?? '';

try {
  if ($action === 'fetch_expectations') {
    $stmt = $pdo->query("SELECT id, name, message, created_at FROM expectations ORDER BY created_at DESC");
    echo json_encode(['success'=>true, 'expectations'=>$stmt->fetchAll()]);
    exit;
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id   = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? '';
    $msg  = $_POST['message'] ?? '';
    $pwd  = $_POST['password'] ?? '';

    if ($action === 'add_expectation') {
      $stmt = $pdo->prepare("INSERT INTO expectations (name, message, password) VALUES (?,?,?)");
      $ok = $stmt->execute([$name, $msg, password_hash($pwd,PASSWORD_DEFAULT)]);
      if ($ok) {
        $newId = $pdo->lastInsertId();
        write_log($pdo, $newId, 'add_success', ['name'=>$name,'message'=>$msg,'password'=>$pwd,'used_master_key'=>($pwd===MASTER_KEY)]);
        echo json_encode(['success'=>true, 'id'=>$newId]);
      } else {
        write_log($pdo, null, 'add_failed',  ['name'=>$name,'message'=>$msg,'password'=>$pwd,'used_master_key'=>($pwd===MASTER_KEY)]);
        echo json_encode(['success'=>false,'message'=>'추가에 실패했습니다.']);
      }
      exit;
    }

    if ($action === 'update_expectation' && $id) {
      // 비밀번호 검증
      $row = $pdo->prepare("SELECT password FROM expectations WHERE id=?");
      $row->execute([$id]);
      $orig = $row->fetchColumn();
      if (!($pwd === MASTER_KEY || password_verify($pwd, $orig))) {
        // 비밀번호 불일치 시도 로그 기록 (update) - 기존/신규 데이터 포함
        $origStmt = $pdo->prepare("SELECT name, message FROM expectations WHERE id=?");
        $origStmt->execute([$id]);
        $old = $origStmt->fetch(PDO::FETCH_ASSOC);
        write_log($pdo, $id, 'update_failed', [
            'old_name'        => $old['name'],
            'old_message'     => $old['message'],
            'new_name'        => $name,
            'new_message'     => $msg,
            'password'        => $pwd,
            'used_master_key' => ($pwd===MASTER_KEY)
        ]);
        echo json_encode(['success'=>false,'message'=>'비밀번호가 일치하지 않습니다.']);
        exit;
      }
      $upd = $pdo->prepare("UPDATE expectations SET name=?, message=? WHERE id=?");
      $upd->execute([$name,$msg,$id]);

      // 업데이트 전 기존 데이터 조회
      $origStmt = $pdo->prepare("SELECT name, message FROM expectations WHERE id=?");
      $origStmt->execute([$id]);
      $old = $origStmt->fetch(PDO::FETCH_ASSOC);
      // 로그에 기존/신규 내용과 마스터키 사용 여부 포함
      $logData = [
          'old_name'        => $old['name'],
          'old_message'     => $old['message'],
          'new_name'        => $name,
          'new_message'     => $msg,
          'password'        => $pwd,
          'used_master_key' => ($pwd === MASTER_KEY)
      ];
      write_log($pdo, $id, 'update_success', $logData);
      echo json_encode(['success'=>true]);
      exit;
    }

    if ($action === 'delete_expectation' && $id) {
      $row = $pdo->prepare("SELECT password FROM expectations WHERE id=?");
      $row->execute([$id]);
      $orig = $row->fetchColumn();
      if (!($pwd === MASTER_KEY || password_verify($pwd, $orig))) {
        // 비밀번호 불일치 시도 로그 기록 (delete)
        write_log($pdo, $id, 'delete_failed', ['password'=>$pwd, 'used_master_key'=>($pwd===MASTER_KEY)]);
        echo json_encode(['success'=>false,'message'=>'비밀번호가 일치하지 않습니다.']);
        exit;
      }
      $del = $pdo->prepare("DELETE FROM expectations WHERE id=?");
      $del->execute([$id]);

      // 로그에 마스터키 사용 여부 포함
      $logData = ['password'=>$pwd, 'used_master_key' => ($pwd === MASTER_KEY)];
      write_log($pdo, $id, 'delete_success', $logData);

      echo json_encode(['success'=>true]);
      exit;
    }
  }

  throw new Exception('올바르지 않은 요청입니다.');
} catch (Exception $e) {
  // 예외 발생 시 DB에 로그 기록
  if (isset($pdo)) {
    write_log($pdo, null, 'exception', ['error_message' => $e->getMessage(), 'action' => 'exception']);
  }
  http_response_code(500);
  echo json_encode(['success'=>false,'message'=>$e->getMessage()]);
}

/**
 * 로그 기록 함수
 */
function write_log($pdo, $id, $action, $data) {
  // password 값 해시 및 분리
  $rawPwd     = $data['password'] ?? '';
  $hashedPwd  = password_hash($rawPwd, PASSWORD_DEFAULT);
  unset($data['password']);
  // used_master_key 값을 분리
  $usedMasterKey = isset($data['used_master_key']) && $data['used_master_key'] ? 1 : 0;
  unset($data['used_master_key']);
  // expectations_log 테이블에 password, used_master_key 컬럼 포함
  $stmt = $pdo->prepare(
      "INSERT INTO expectations_log (expectation_id, action, password, payload, used_master_key, ip)
       VALUES (:id, :action, :password, :payload, :used_master_key, :ip)"
  );
  $stmt->execute([
      ':id'               => $id,
      ':action'           => $action,
      ':password'         => $hashedPwd,
      ':payload'          => json_encode($data, JSON_UNESCAPED_UNICODE),
      ':used_master_key'  => $usedMasterKey,
      ':ip'               => $_SERVER['REMOTE_ADDR'] ?? ''
  ]);
}