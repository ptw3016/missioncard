   <?php
   // api/db.php
   require_once __DIR__ . '/../../../config.php';

   $host    = DB_HOST;
   $db      = DB_NAME;
   $user    = DB_USER;
   $pass    = DB_PASS;
   $charset = DB_CHARSET;

   $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
   $options = [
       PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
   ];
   try {
       $pdo = new PDO($dsn, $user, $pass, $options);
   } catch (\PDOException $e) {
       http_response_code(500);
       // 실제 운영 환경에서는 에러 메시지를 직접 노출하지 않는 것이 좋습니다.
       // error_log($e->getMessage()); // 에러 로그 파일에 기록
       echo json_encode(['error' => '데이터베이스 연결에 실패했습니다.']);
       exit;
   }