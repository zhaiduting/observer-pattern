<?php

require './src/主题式.php';
require './src/监控式.php';

class 登录类
{
    use 主题式;
    private $status = '初始状态';

    function 模拟登录()
    {
        $status = ['成功', '失败', '非法'];
        $x = array_rand($status);
        $this->status = $status[$x];
        $this->使用监控();
    }

    function 获取状态()
    {
        return $this->status;
    }
}

class 邮件观众类
{
    use 监控式;

    function 更新主题(登录类 $login)
    {
        $status = $login->获取状态();
        if ($status === '非法') {
            echo "邮件通知非法登录\n";
        }
    }
}

class 日志观众类
{
    use 监控式;

    function 更新主题(登录类 $login)
    {
        $status = $login->获取状态();
        if ($status === '失败') {
            echo "记录错误信息\n";
        }
    }
}

$login = new 登录类;
$mail = new 邮件观众类;
$meme = new 日志观众类;
$login->添加监控($mail);
$login->添加监控($meme);
//$login->添加监控([]);   // 如添加一个无效参数则报错

$login->模拟登录();
$login->模拟登录();
$login->模拟登录();
$login->模拟登录();
$login->模拟登录();
$login->模拟登录();
$login->模拟登录();
$login->模拟登录();
$login->模拟登录();
