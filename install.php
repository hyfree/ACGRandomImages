<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require 'Utils/SnowFlake.php';
    //-------------------------------声明变量------------------------------
    $servername = "localhost";
    $database = "database";
    $username = "username";
    $password = "password";
    //--------------------------------------------------------------------

    //------------------------------开始执行安装过程------------------------
    $message = "未初始化";
    if (file_exists("install.lock")) {
        echo ("请删除install.lock重试操作<br>");
        return;
    } else {
        echo ("创建install.lock文件<br>");
        //$myfile = fopen("install.lock", "w");
        echo ("install.lock文件创建成功<br>");
    }
    // 创建连接
    $conn = new mysqli($servername, $username, $password, $database);
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    // 使用 sql 创建数据表
    $sql = "CREATE TABLE Images (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
        )";
    $snow = new SnowFlake;
    $number = $snow->createID();
    $str=number_format($number, 0, '', '');
    echo ($str);
    ?>





</body>

</html>