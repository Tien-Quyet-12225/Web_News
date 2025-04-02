<?php
// Configuration settings
// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://biznews_rebuild.test/');
define('BASE_URL_ADMIN'       , 'http://biznews_rebuild.test/admin/');
define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'biznews');
define('DB_CHARSET', 'utf8');
// đẩy đường dẫn lên cấp cao nhất
define('PATH_ROOT'    , __DIR__ . '/../');