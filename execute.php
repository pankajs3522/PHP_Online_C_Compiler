<?php
session_start();
$inputs = $_POST['inputs'];
//echo $_GET['language'];

	mkdir($_SESSION['user']);
	$my=fopen($_SESSION['user']."/inputs.txt","w");
	fwrite($my,$inputs);
	if($_GET['language'] == "C")
	{
		$name = $_SESSION['user']."/".$_SESSION['user'].".c";
		$myfile=fopen($name,"w");
		$txt=$_POST['code'];
		//echo $txt;
		fwrite($myfile,$txt);
		ob_start();
		if($_GET['language']=='C')
		{
		exec("gcc " . $name . " 2>&1", $out);
		}
		$res=ob_get_contents();
		ob_end_clean();
		if(count($out)==0)
		{
		$t=shell_exec('./a.out < ' . $_SESSION['user']."/inputs.txt");
		echo $t;
		}
		else
		{
		for($i=0;$i<count($out);$i++)
		{
			echo $out[$i];
			echo "<br>";
		}
		}
	}
	else if($_GET['language'] == "C++")
	{
		$name = $_SESSION['user']."/".$_SESSION['user'].".cpp";
		$myfile=fopen($name,"w");
		$txt=$_POST['code'];
		//echo $txt;
		fwrite($myfile,$txt);
		ob_start();
		if($_GET['language']=='C++')
		{
		exec("g++ " . $name . " 2>&1", $out);
		}
		$res=ob_get_contents();
		ob_end_clean();
		if(count($out)==0)
		{
		$t=shell_exec('./a.out < ' . $_SESSION['user']."/inputs.txt");
		echo $t;
		}
		else
		{
		for($i=0;$i<count($out);$i++)
		{
			echo $out[$i];
			echo "<br>";
		}
		}
	}
	else if($_GET['language'] == "Java")
	{
chdir($_SESSION['user']);
		$name = "Main.java";
		$myfile=fopen($name,"w");
		$txt=$_POST['code'];
		//echo $txt;
		fwrite($myfile,$txt);
		ob_start();
		if($_GET['language']=='Java')
		{
		exec("javac " . $name . " 2>&1", $out);
		}
		$res=ob_get_contents();
		ob_end_clean();
		if(count($out)==0)
		{
		$t=shell_exec('java Main < inputs.txt');
		echo $t;
		}
		else
		{
		for($i=0;$i<count($out);$i++)
		{
			echo $out[$i];
			echo "<br>";
		}
		}
	}
	else if($_GET['language'] == "Python")
	{

		$name = $_SESSION['user']."/".$_SESSION['user'].".py";
		$myfile=fopen($name,"w");
		$txt=$_POST['code'];
		//echo $txt;
		fwrite($myfile,$txt);
		ob_start();
		if($_GET['language']=='Python')
		{
		exec("python " . $name . " 2>&1" . ' < ' . $_SESSION['user']."/". "inputs.txt", $out);
		}
		$res=ob_get_contents();
		ob_end_clean();
		if(count($out)==0)
		{
		echo 'python ' . $name . ' < ' . $_SESSION['user']."/". "inputs.txt";
		$t=shell_exec('python ' . $name . ' < ' . $_SESSION['user']."/". "inputs.txt");
		echo $t;
		}
		else
		{
		for($i=0;$i<count($out);$i++)
		{
			echo $out[$i];
			echo "<br>";
		}
		}
	}
		else
		{
			echo "Invalid Language";
		}
?>
