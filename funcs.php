<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//環境変数を読み込む（ローカルとサーバー環境両対応）
function load_env(){
    $env_file = __DIR__ . '/.env';
    if(file_exists($env_file)){
        $lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach($lines as $line){
            if(strpos($line, '=') !== false && $line[0] !== '#'){
                list($key, $value) = explode('=', $line, 2);
                putenv(trim($key) . '=' . trim($value));
            }
        }
    }
}

//DB接続関数：db_conn()
function db_conn(){
    try {
        load_env(); //環境変数を読み込む
        
        $db_name = getenv('DB_NAME');    //データベース名
        $db_id   = getenv('DB_ID');      //アカウント名
        $db_pw   = getenv('DB_PW');      //パスワード
        $db_host = getenv('DB_HOST');    //DBホスト
        
        return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }
}

// //DB接続関数：db_conn()
// function db_conn(){
//     try {
//         $db_name = "gs_db_books";    //データベース名
//         $db_id   = "root";      //アカウント名
//         $db_pw   = "";          //パスワード：XAMPPはパスワード無し or MAMPはパスワード”root”に修正してください。
//         $db_host = "localhost"; //DBホスト
//         return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
//     } catch (PDOException $e) {
//         exit('DB Connection Error:'.$e->getMessage());
//     }
// }


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}




