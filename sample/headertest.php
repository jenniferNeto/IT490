<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<script type="text/javascript">
function seshCheck(){

//	document.getElementById("name").innerHTML = "Welcome <?php echo $_SESSION['user'];?>!";
  //      let l = sessionStorage.getItem("id");
//        var request = new XMLHttpRequest();
        //request.open("POST","sessionCheck.php",true);
        //request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      //  request.send("id="+l);
    //    if("<?php echo $_SESSION['user']; ?>" == "undefined"){
  //              window.location.replace("login.html");
//        }

	var receive = new XMLHttpRequest();
	receive.open("POST","getPosts.php",true);
        receive.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        receive.send();
	//var posts exists here, holding 2D array from response
	var topics;
	var container = document.querySelector('ol');
//	var topics = [
//	["bob", "11/11/2000", "Is it ok to breathe fire?"],
//	["iii", "22/22/2022", "Baloney"]
//	];
	console.log(topics);
	for (let topic of topics){
		var content = 
			`<li>
			<a href = "thread.php">
                        <h4 class="title\">
                                ${topic[2]}
                        </h4>
                        <div class="bottom">
                                <p class="timestamp">
				${topic[1]}
				</p>
				<p class="username">
				${topic[0]}
				</p>
                        </div>
                        </a>
			</li>`;
			console.log(content);
		container.insertAdjacentHTML("beforeend", content);
	}

}
</script>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="A short description." />
    <meta name="keywords" content="put, keywords, here" />
    <title>PHP-MySQL forum</title>
    <link rel="stylesheet" href="style.css" type="text/css">
<style>
body {
    background-color: #4E4E4E;
    text-align: center;         /* make sure IE centers the page too */
}
 
#wrapper {
    width: 900px;
    margin: 0 auto;             /* center the page */
}
 
#content {
    background-color: #fff;
    border: 1px solid #000;
    float: left;
    font-family: Arial;
    padding: 20px 30px;
    text-align: left;
    width: 100%;                /* fill up the entire div */
}
 
#menu {
    float: left;
    border: 1px solid #000;
    border-bottom: none;        /* avoid a double border */
    clear: both;                /* clear:both makes sure the content div doesn't float next to this one but stays under it */
    width:100%;
    height:20px;
    padding: 0 30px;
    background-color: #FFF;
    text-align: left;
    font-size: 85%;
}
 
#menu a:hover {
    background-color: #009FC1;
}
 
#userbar {
    background-color: #fff;
    float: right;
    width: 250px;
}
 
#footer {
    clear: both;
}
 
/* begin table styles */
table {
    border-collapse: collapse;
    width: 100%;
}
 
table a {
    color: #000;
}
 
table a:hover {
    color:#373737;
    text-decoration: none;
}
 
th {
    background-color: #B40E1F;
    color: #F0F0F0;
}
 
td {
    padding: 5px;
}
 
/* Begin font styles */
h1, #footer {
    font-family: Arial;
    color: #F1F3F1;
}
 
h3 {margin: 0; padding: 0;}
 
/* Menu styles */
.item {
    background-color: #00728B;
    border: 1px solid #032472;
    color: #FFF;
    font-family: Arial;
    padding: 3px;
    text-decoration: none;
}
 
.leftpart {
    width: 70%;
}
 
.rightpart {
    width: 30%;
}
 
.small {
    font-size: 75%;
    color: #373737;
}
#footer {
    font-size: 65%;
    padding: 3px 0 0 0;
}
 
.topic-post {
    height: 100px;
    overflow: auto;
}
 
.post-content {
    padding: 30px;
}
 
textarea {
    width: 500px;
    height: 200px;
}
</style>
</head>
<body>
<h1>My forum</h1>
    <div id="wrapper">
    <div id="menu">
        <a class="item" href="index.html">Home</a> -
        <a class="item" href="/forum/create_topic.php">Create a topic</a> -
        <a class="item" href="create_cat.php">Create a category</a>
         
        <div id="userbar">
	<div id="userbar">Hello <?php echo $_SESSION['user']; ?>. Not you? Log out.</div>
    </div>
	<div id="content">
		<ol>
		<li>
                        <a href="thread.php">
                        <h4 class="title">
                                Thread 1
                        </h4>
                        <div class="bottom">
                                <p class="timestamp">
                                        10/10/2000
                                </p>
                        </div>
                        </a>
                </li>
                <li>
                        <a href="">
                        <h4 class="title">
                                Thread 2
                        </h4>
                        <div class="bottom">
                                <p class="timestamp">
                                        10/10/2000
                                </p>
                        </div>
                        </a>
		</li>
		</ol>
<script>
seshPostCheck();
</script>
