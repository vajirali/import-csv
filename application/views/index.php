<div class="row">
    <div class="col-lg-12">
        <h2>CodeIgniter Import CSV Demo</h2>                 
    </div>
</div><!-- /.row -->

<a href="<?php echo base_url('import/samplecsvFile'); ?>"><button>Download Sample CSV File</button></a><br/><br/><br/>

<form method="post" action="<?php echo base_url('import/importcsvFile');?>" enctype="multipart/form-data">
	Select CSV File <input type="file" name="csvfile" id="csvfile" required /> 
	<button type="submit">Import</button>
</form>


<?php foreach($result as $detail){ ?>
		<table border="0" width="80%" align="center">
			<tr>
				<td width="5%"><?php echo $detail['id']; ?></td>
				<td width="12%"><img src="<?php echo base_url(); ?>assets/images/Penguins.jpg" height="85" width="75"></td>
				<td width="10%"><b>Price:</b> <?php echo number_format($detail['price'], 2, '.', ''); ?></td>
				<td width="30%"><b>Name:</b> <?php echo $detail['name']; ?></td>
				<td width="43%"><b>Descriptipn:</b> <?php echo $detail['description']; ?></td>
			</tr>
		</table>
		<hr>
<?php } ?>