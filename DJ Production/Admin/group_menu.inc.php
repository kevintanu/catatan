<?php
	if (isset($_POST['btnpilih'])) {
		$idlevelx = $_POST['idlevelx'];
		$cbm = $_POST['cbm'];
		$c_cbm = count($cbm)-1;
		if ($c_cbm > -1) {
			$q = "DELETE FROM tb_menu_level WHERE idlevel='$idlevelx'";
			if (!$result = $conn->query($q)) die ($conn->error);
			for($i=0;$i<=$c_cbm;$i++) {
				$q = "INSERT INTO tb_menu_level(idlevel,idmenu) VALUES('$idlevelx','$cbm[$i]')";
				if (!$result = $conn->query($q)) die ($conn->error);
			}
			$strstatus = "Data telah diupdate.";
		}
	}
	if (isset($_POST['btnsubmit'])) {
		$idlevelx = $_POST['idlevelx'];
	}
?>
<?=pstrstatus($strstatus)?>
<h3>List Menu Group</h3>
<form class="well form-horizontal" name=f1 action="main.php?m=<?=$m?>" method=post>
<fieldset>
	<div class="form-group">
    	<label class="col-md-2 control-label" for="nama">Group</label>
        <div class="col-md-3">
        	<select name="idlevelx" size=1 class="form-control">
        		<option value="">-- Pilih Group --</option>
        		<?php
        			$q = "SELECT * FROM tb_user_level";
					if (!$result = $conn->query($q)) die ($conn->error);
					while ($r = $result->fetch_assoc()) {
				?>
				<option value="<?=$r[idlevel]?>"<?php if ($r[idlevel]==$idlevelx) echo " selected";?>><?=$r[level]?></option>
				<?php		
					}
        		?>
        	</select>
        </div>
    </div>
    <div class="form-group">
    	<div class="col-md-offset-2 col-md-10">
	    	<button type="submit" class="btn btn-primary" name="btnsubmit" onclick="return ceksubmit();">Submit</button>
	        <a href="main.php?m=<?=$m?>" class="btn btn-default">Cancel</a>
	    </div>
    </div>
</fieldset>
<?php
	if (!empty($idlevelx)) {
?>
<table class="table table-bordered table-condensed table-striped">
<thead>
	<Tr>
		<th>Nama Menu</th>
		<th>#</th>
	</tr>
</thead>
<tbody>
<?php
		$q = "SELECT * FROM tb_menu";
		if (!$result = $conn->query($q)) die ($conn->error);
		while ($r = $result->fetch_assoc()) {
			if (cekmenupilih($r[idmenu],$idlevelx)) {
				$strchecked = " checked";
			} else $strchecked = "";
?>
	<tr>
		<Td><?=$r[nama]?></Td>
		<Td><input type=checkbox name=cbm[] value="<?=$r[idmenu]?>"<?=$strchecked?>></Td>
	</tr>
<?php			
		}
?>	
	<tr>
		<Td colspan=2><button type="submit" class="btn btn-primary" name="btnpilih">Submit</button></Td>
</tbody>
</table>
<?php
	}
?>
</form>