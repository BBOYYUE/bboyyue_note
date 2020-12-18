php artisan key:generate 生成key 
php artisan route:list 查看路由
php artisan thinker 使用命令行调用全局函数

unit 可以进行单元测试,但是不能进行调试。
http://xdebug.org/download#releases  下载 xdebug. xdebug 需要加 zend_extension

WinCacheGrind 程序性能测试
JMeter 压力测试
CurlLoader。压力测试
mysqlslap。 mysql测试





error_reporting = E_ALL  // 报告错误级别，什么级别的
error_log = /tmp/php_errors.log // php中的错误显示的日志位置
display_errors = On // 是否把错误展示在输出上，这个输出可能是页面，也可能是stdout
display_startup_errors = On // 是否把启动过程的错误信息显示在页面上，记得上面说的有几个Core类型的错误是启动时候发生的，这个就是控制这些错误是否显示页面的。
log_errors = On // 是否要记录错误日志
log_errors_max_len = 1024 // 错误日志的最大长度
ignore_repeated_errors = Off // 是否忽略重复的错误
track_errors = Off // 是否使用全局变量$php_errormsg来记录最后一个错误
xmlrpc_errors = 0 //是否使用XML-RPC的错误信息格式记录错误
xmlrpc_error_number = 0 // 用作 XML-RPC faultCode 元素的值。
html_errors = On  // 是否把输出中的函数等信息变为HTML链接
docref_root = http://manual/en/ // 如果html_errors开启了，这个链接的根路径是什么
fastcgi.logging = 0 // 是否把php错误抛出到fastcgi中