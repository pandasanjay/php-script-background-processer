php-script-background-processer
===============================

Here we can run a PHP file (script) in background, This process is hidden to the end user. IT improves your Website efficiency.  

EXECUTE PHP SCRIPT IN BACKGROUND PROCESSING
---------------------------------------------------------------------------------

The scenario, when we need to run some script without waiting  the fronted user till the process is not completed, For that we need to execute some script in background to hiding the execution time to user.

The Concept, In LINUX there is a shell script with is Used to run the process in background. You can put a task (such as command or script) in a background by appending a & at the end of the command line. The & operator puts command in the background and free up your terminal. The command which runs in background is called a job. You can type other command while background command is running.

Syntax :
 {command} &
	
Example: 
 ls -l &
 exec php index.php  > /dev/null 2>&1 & echo $!
	
How to check the background process in Linux?
---------------------------------------------
	ps -l (list all process)
 	ps -ef (all full details of process)

What is the command to execute a php file in background?
--------------------------------------------------------

 Syntax:
	nohup exec </path/to/php/> <path/to/your/phpfile> arg1 arg2 > /dev/null &
 example: 
	nohup exec php process.php hello world > /dev/null &	

What is nohup?
---------------
Most of the time you log-in into remote server via ssh. If you start a shell script or command and you exit (abort remote connection), the process / command will get killed. Sometime job or command takes a long time. If you are not sure when the job will finish, then it is better to leave job running in background. But, if you log out of the system, the job will be stopped and terminated by your shell. What do you do to keep job running in the background when process gets SIGHUP?

The answer is simple, use nohup command line-utility which allows to run command/process or shell script that can continue running in the background after you log out from a shell:

 nohup command syntax:
 nohup command-name &

What is exec?
------------------------

This command is used to execute a process in Linux. It can process one or more process at a time.

How to use this PHP library on your code?
------------------------------------------

Step 1: create two file name index.php and process.php

step 2: include the PHPBackgroundProcesser.php file in the index.php

step 3: create a instance of the class BackgroundProcess
	
	We can use this:
	
	Type 1:
	$proc=new BackgroundProcess('exec php <BASE_PATH>/process.php hello world');

	Type 2:
	$proc=new BackgroundProcess();
	$proc->setCmd('exec php <BASE_PATH>/process.php hello world');
	$proc->start();
	
	Type 3: 
        $proc=new BackgroundProcess();
	$proc->setCmd('exec php <BASE_PATH>/process.php hello world')->start();

How to get all process which is running?
----------------------------------------
        $proc=new BackgroundProcess();
	print_r($proc->showAllPocess());
	
How to kill a process ?
-------------------------------
  	$proc=new BackgroundProcess();
  	$proc->setProcessId(101)->stop(); //set the process id.
