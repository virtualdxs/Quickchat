$( "#goButton" ).click(function() {
	var groupName = document.getElementById("group").value;
	$.get( "./create.php", { group: groupName } )
    .done(function( data ) {
	  if (data == 'exists' || data == 'Success!') window.location.href = "./go.php?group=" + groupName;
	  else alert('Something went wrong. :( Reload the page.');
  });
});
