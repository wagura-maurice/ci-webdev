<html>
<title>Multiple image upload with text in Codeignter</title>
<style type="text/css">
.container{
	width: 50%;
	margin: 0 auto;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    width: 50%;
}
button, input {
	padding: 10px;
}
</style>
<body>

<div align="center" class="container">
<form method="POST" action="<?php echo site_url('backend/file_upload');?>" enctype='multipart/form-data'>
<table border="1">
<tr>
<td>Item Name</td>
<td><input type="text" name="title" required id="title" placeholder="Item Name"></td>
</tr>
<tr>
<td>Item Price</td>
<td><input type="number" name="price" required id="price" placeholder="Item Price"></td>
</tr>
<tr>
<td>Item Details</td>
<td><textarea name="details" required id="details" placeholder="Item Details" rows="5"></textarea></td>
</tr>
<tr>
<td>Item Image</td>
<td><input type="file" name="userfile[]" required id="image_file" accept=".png,.jpg,.jpeg,.gif" multiple></td>
</tr>
<tr>
<td colspan="2" align="center"><input style="width: 50%;" type="submit" value="Submit"></td>
</tr>
</table>
</form>
</div>


</body>
</html>