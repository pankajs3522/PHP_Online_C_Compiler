<?php
session_start();
$_SESSION['logged']=1;
$your_user_login = 3;
$_SESSION['user']=md5(uniqid($your_user_login, true));
echo "SESSION Id : " . $_SESSION['user'].".cpp";
?>

<html>
<head>
<title>C Programming - VLab</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../style.css">

</head>
<body>


<div class="content" style="margin-left:2%;overflow:none;max-width:95%;">
<form method="post" action="submit_code.php?task=<?php echo $_GET['task']; ?>">
	<h3>Q: Hello</h3>
	<p>Print Hello !</p>
<select name="language" id="lang">
<option>C</option>
<option>C++</option>
<option>Java</option>
<option>Python</option>
</select><br><br>
	<textarea name="program" id="program" rows=20 cols=200>
	
		//Type Your Program Here.
	
	</textarea><br><br>
	<a href="#co"><input type="button" value="Run Code" class="btn" onclick="gv()"></a></form><br><br>
	<textarea name="inputs" id="inputs" rows=20 cols=200>
	
		//Inputs Here!
	
	</textarea><br><br>
	<div style="width:90%;height:30%;font-size:70%;padding:2px;color:white;background-color:black">
	<code id="codedesk" name="codedesk">pankaj@vlab ></code><a name="co"></a>
	</div>
</div>
<script>
function gv() {
	//alert("Pahuncha");
a=document.getElementById("program").value;
lang=document.getElementById("lang").value;
inputs=document.getElementById("inputs").value;
lang=encodeURIComponent(lang);
a=encodeURIComponent(a);
inputs=encodeURIComponent(inputs);
//alert(inputs);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("codedesk").innerHTML=this.responseText;
    }
  };
  xhttp.open("POST", "execute.php?language="+lang, true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("code="+a+"&inputs="+inputs);
}
</script>
