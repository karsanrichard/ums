<!DOCTYPE html>
<html>
<head>
	<title>Notes Upload</title>
</head>
<body>
	<form method="post" action="<?php echo base_url()?>home/upload_notes">
		<div>
			<?php 
				echo $notes_dropdown;
			?>
		</div>
		<div>
			<input type="file" name="upload" id="upload" />
		</div>
		<div>
			<input type="text" name="link" id="link" />
		</div>
	</form>
</body>
</html>