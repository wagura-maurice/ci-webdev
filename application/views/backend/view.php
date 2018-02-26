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
    width: 25%;
}
button, input {
  padding: 10px;
}
</style>
<body>


<div align="center" class="container">

<p align="center"><a href="<?php echo base_url() . "backend/add"; ?>">Upload new data</a></p>

<table border="1" style="width:100%">
  <tr>
    <td>#</td>
    <td>Name</td> 
    <td>price</td>
    <td>Edit</td>
  </tr>
  <?php
    if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
    foreach ($view_data as $key => $data) { 
    ?>
  <tr>
    <td><?php echo $i++ ?></td>
    <td><?php echo $data['title']; ?></td> 
    <td><?php echo $data['price']; ?></td>
    <td>
      <a href="<?php echo site_url(); ?>/backend/edit/<?php echo $data['id']; ?>">Edit</a>
      <a href="<?php echo site_url(); ?>/backend/delete/<?php echo $data['id']; ?>">Delete</a>
    </td>
  </tr>
  <?php } endif; ?>
</table>

</div>


</body>
</html>