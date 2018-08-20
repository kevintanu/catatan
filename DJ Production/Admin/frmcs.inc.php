<?php
	if (empty($urut)) $urut=1;
?>
<script language="javascript">
function ceksubmit() {
    var f = document.f1;
    if(f.nama.value == "") {
        alert("Masukkan nama.");
        f.nama.focus();
        return false;
    }
    if(f.yahoo.value == "") {
        alert("Masukkan Yahoo ID.");
        f.yahoo.focus();
        return false;
    }
}
</script>
        <h3>Customer Support</h3>
        <form class="well form-horizontal" name=f1 action="main.php?m=<?=$m?>" method=post>
        <input type=hidden name=id value="<?=$idcs?>">
        <fieldset>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="nama">Nama</label>
                <div class="col-lg-5">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?=$nama?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="yahoo">Yahoo ID</label>
                <div class="col-lg-4">
                	<input type="text" name="yahoo" class="form-control" id="yahoo" value="<?=$yahoo?>"> Untuk email @yahoo.co.id masukkan secara penuh, contoh: username@yahoo.co.id.
                </div>
            </div>
            <div class="form-group">
            	<div class="col-lg-offset-2 col-lg-10">
	                <button type="submit" class="btn btn-primary" name="btnsubmit" onclick="return ceksubmit();">Submit</button>
	                <a href="main.php?m=<?=$m?>" class="btn btn-default">Cancel</a>
	            </div>
            </div>
        </fieldset>
        </form>