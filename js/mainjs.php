<?php if ( ! isset($_GET["group"])) die("invalid request"); 
$group = $_GET["group"];
?>

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

$("#username").val(readCookie("nickname"));

function update()
{
$.get( "./rooms/<?php echo $group;?>/chat.txt" )
  .done(function( data ) {
	 var prev = document.getElementById("chatBox").innerHTML;
	 if (prev != data)
	 {
		document.getElementById("chatBox").innerHTML = data;
		if (document.getElementById("toggleAlert").checked) document.getElementById("alert").play();
		document.getElementById("chatBox").scrollTop = document.getElementById("chatBox").scrollHeight;
	 }
  });

}
setInterval(update, 1000);

$( "#submitChat" ).click(function() {
	var message = document.getElementById("message").value;
	var username = document.getElementById("username").value;
	if (message == "" || username == "")
	{
		alert("Message and/or nickname cannot be blank");
		return false;
	}
  $.get( "./submit.php", { group: "<?php echo $group;?>", text: message, user: username } );
  document.getElementById("message").value = "";
  document.cookie="nickname=" + username;
});
