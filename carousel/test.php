<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$.ajax({
   type: "POST",
   url: "insert_note.php",
   data: { name: "John", location: "Boston" },
   success: function( msg ) {
          alert( msg);
      }
     });

</script>
</head>	
</html>