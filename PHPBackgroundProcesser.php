<?php
/*
    Title: PHP Script Background Processer
    Version: 1.0
    Auther: Sanjay Kumar Panda
    Description: Here we can run a PHP file (script) in background, This process is hidden to the end user. IT improves your Website efficiency.  
*/

class BackgroundProcess{
    private $pid;
    private $command;
    private $debugger=true;
    private $msg="";
    
    public function __construct($cmd=null){
      
        if(!empty($cmd))
        {
            $this->command=$cmd;
            $this->do_process();
        }
        else{
            $this->msg['error']="Please Provide the Command Here";
        }
    }
    
    public function setCmd($cmd){
        $this->command = $cmd;
        return true;
    }
    
    public function setProcessId($pid){
        $this->pid = $pid;
        return true;
    }

    public function getProcessId(){
        return $this->pid;
    } 
    public function status(){
        $command = 'ps -p '.$this->pid;
        exec($command,$op);        
        if (!isset($op[1]))return false;
        else return true;
    }
    
    public function showAllPocess(){
        $command = 'ps -ef '.$this->pid;
        exec($command,$op);
        return $op;
    }
    
    public function start(){
        if ($this->command != '')$this->do_process();
        else return true;
    }

    public function stop(){
        $command = 'kill '.$this->pid;
        exec($command);
        if ($this->status() == false)return true;
        else return false;
    }
    
    //do the process in background
    public function do_process(){
        echo "sdf";
        $command = 'nohup '.$this->command.' > /dev/null 2>&1 & echo $!';
        exec($command ,$pross);
        $this->pid = (int)$pross[0];
    }
    
    
}
?>
