<?php

trait 主题式
{
    private SplObjectStorage $box;

    function 添加监控($observer)
    {
        if (!isset($this->box))
            $this->box = new SplObjectStorage();
        if (method_exists($observer, '更新主题'))
            $this->box->attach($observer);
        else
            exit(new ErrorException("更新主题方法不存在\n"));
    }

    function 删除监控($observer)
    {
        $this->box->detach($observer);
    }

    function 使用监控()
    {
        foreach ($this->box as $observer) {
            $observer->更新主题($this);
        }
    }
}
