<?php
/*
        演示PHP的监听模式
        1、员工监听老板指令
        2、老板发出指令
        3、员工执行与反馈
*/
//老板接口
interface boss
{
        //下达指示
        public function sendcommand($msg);                
        //员工登记
        public function account(employe $everyone);
}


//雇员接口
interface employe
{
        //拉长耳朵听老板的口令
        public function listen(boss $boss);
        //执行老板的指令
        public function execute($msg);
}




//老板 laja
class laja implements boss
{
        private static $every=array();
        function sendcommand($msg)
        {
                foreach (self::$every as $index=>$obj)
                $obj->execute($msg);
        }

        public function account(employe $everyone)
        {
                self::$every[]=$everyone;
        }
}



//雇员james
class james implements employe
{
        public function listen(boss $boss)
        {
                $boss->account($this);
        }

        public function execute($msg)
        {
                echo ' james执行命令:',$msg;
        }
}


//雇员kobe
class kobe implements employe
{        
        public function listen(boss $boss)
        {
                $boss->account($this);
        }

        public function execute($msg)
        {
                echo ' Kobe 执行命令:',$msg;
        }
}


//实例化老板
$laja=new laja();

//实例化james
$james=new james;
//james 监听老板的话
$james->listen($laja);

//实例化kobe
$kobe=new kobe;
//kobe也监听老板的话
$kobe->listen($laja);



//测试老板发出指令，看看是否响应
$laja->sendcommand('好好干活!');