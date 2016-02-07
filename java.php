<html>
<head>
<script>
function validate(){
var name = document.getElementById("name").value;
var name1 = document.getElementById("name1").value;
if(name==""){
alert("Wrong");
}
if(name1==""){
alert("Wrong");
}
}

</script>
</head>
<body>
<form>

<input type="text" id="name" placeholder="Student Name *">
<input type="text" id="name1" placeholder="Student Name *">
<input type="submit" onclick="validate()">

</form>





</body>

</html>