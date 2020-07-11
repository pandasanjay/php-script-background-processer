# php-script-background-processer

Here we can run a PHP file (script) in the background, This process is hidden to the end-user. IT improves your Website efficiency.

# Table of content:

- [EXECUTE PHP SCRIPT IN BACKGROUND PROCESSING](#execute-php-script-in-background-processing)
  - [How to check the background process in Linux?](#how-to-check-the-background-process-in-linux-)
- [What is the command to execute a PHP file in the background?](#what-is-the-command-to-execute-a-php-file-in-the-background-)
- [What is nohup?](#what-is-nohup-)
- [What is exec?](#what-is-exec-)
- [How to use this PHP library on your code?](#how-to-use-this-php-library-on-your-code-)
- [How to get all process which is running?](#how-to-get-all-process-which-is-running-)
- [How to kill a process?](#how-to-kill-a-process-)
- [How to generate stdout and stderr in a file. (Recommended Only for debugging)](#how-to-generate-stdout-and-stderr-in-a-file--recommended-only-for-debugging-)
- [How to use this inside CodeIgniter4](#how-to-use-this-inside-codeigniter4)

## EXECUTE PHP SCRIPT IN BACKGROUND PROCESSING

The scenario, when we need to run some script without waiting for the fronted user till the process is not completed, For that we need to execute some script in the background to hide the execution time to the user.

The Concept, In LINUX there is a shell script with is Used to run the process in the background. You can put a task (such as command or script) in the background by appending a & at the end of the command line. The & operator puts the command in the background and frees up your terminal. The command which runs in the background is called a job. You can type other commands while the background command is running.

Syntax :
{command} &

Example:

```sh
ls -l &
exec php index.php > /dev/null 2>&1 & echo \$!
```

### How to check the background process in Linux?

---

```sh

    ps -l (list all process)
    ps -ef (all full details of the process)

```

## What is the command to execute a PHP file in the background?

Syntax:
nohup exec </path/to/php/> <path/to/your/phpfile> arg1 arg2 > /dev/null &

Example:

```sh
nohup exec php process.php hello world > /dev/null &
```

## What is nohup?

Most of the time you log-in into remote server via ssh. If you start a shell script or command and you exit (abort remote connection), the process/command will get killed. Sometimes a job or command takes a long time. If you are not sure when the job will finish, then it is better to leave a job running in the background. But, if you log out of the system, the job will be stopped and terminated by your shell. What do you do to keep a job running in the background when the process gets SIGHUP?

The answer is simple, use nohup command line-utility which allows running command/process or shell script that can continue running in the background after you log out from a shell:

nohup command syntax:
nohup command-name &

## What is exec?

This command is used to execute a process in Linux. It can process one or more processes at a time.

## How to use this PHP library on your code?

**Step 1:** create two file name index.php and process.php

**step 2:** include the PHPBackgroundProcessor.php file in the index.php

**step 3:** create an instance of the class BackgroundProcess

We can use this:

**Type 1:**

```php
$proc=new BackgroundProcess('exec php <BASE_PATH>/process.php hello world');
```

    **Type 2:**

    ```php
    $proc=new BackgroundProcess();
    $proc->setCmd('exec php <BASE_PATH>/process.php hello world');
    $proc->start();
    ```

    **Type 3:**
    ```php
    	$proc=new BackgroundProcess();
    	$proc->setCmd('exec php <BASE_PATH>/process.php hello world')->start();
    ```
    An alternate way to do the PHP URL executes in the background without the direct (.php) file.
    ```php
    $process=new BackgroundProcess("curl -s -o <Base Path>/log/log_storewav.log <PHP URL to execute> -d param_key=<Param_value>");
    ```

## How to get all process which is running?

    ```php
    $proc=new BackgroundProcess();
    print_r($proc->showAllProcess());
    ```

## How to kill a process?

    ```php
    $proc=new BackgroundProcess();
    $proc->setProcessId(101)->stop(); //set the process id.
    ```

## How to generate stdout and stderr in a file. (Recommended Only for debugging)

```php
	//Pass a additional true flag
	$proc=new BackgroundProcess('exec php <BASE_PATH>/process.php hello world', true);
```

After run which will generate `/tmp/out_<random_number>` for `stdout` and `/tmp/error_out_<random_number>` for `stderr`

> Please don't use in a production, This will fill your storage if you not clean all the logs.

## How to use this inside CodeIgniter4

> Please follow same step inside `example` folder

**Step 1:** Copy the `PHPBackgroundProcessor.php` to `<CodeIgniter root>/app/Libraries/` \
**Step 2:** Add a namespace e.g `namespace App\Libraries;` first line after `<?php` \
**Step 3:** Create a controller for background process `app/Controllers/BackgroundProcess.php`. Make sure the class name and file name should same. \

```php
<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Background extends Controller
{

    public function run($to = 'World')
    {
        echo "Hello I am a background process {$to}!" . PHP_EOL;
    }
}

//https://codeigniter.com/userguide3/general/cli.html?highlight=cli
```

**Step 4**: Create a controller to execute above code in background `app/Controllers/BackgroundRunner.php`

```php
<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\BackgroundProcess;

class BackgroundRunner extends Controller
{
    public function index()
    {
        $proc = new BackgroundProcess("curl -s -o " . $_SERVER['DOCUMENT_ROOT'] . "/log_background_process.log " . base_url('tools/message'), true);

        $pid = $proc->getProcessId();
        echo $pid . "\n";
    }
}

```

**Step 5:** Start the server of your application and try `curl http://localhost:8080/backgroundrunner/` you will see a number which is process id. it means background process started.
