<?php
	if (empty($urut)) $urut=1;
?>
<script language="javascript">
function ceksubmit() {
    var f = document.f1;
    if(f.judul.value == "") {
        alert("Masukkan judul slider.");
        f.judul.focus();
        return false;
    }
}
</script>
        <h3>Slider</h3>
        <form class="well form-horizontal" name=f1 action="main.php?m=<?=$m?>" method=post enctype="multipart/form-data">
        <input type=hidden name=id value="<?=$idslider?>">
        <fieldset>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="judul">Judul</label>
                <div class="col-lg-5">
                    <input type="text" name="judul" class="form-control" id="judul" value="<?=$judul?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="file1">Slider</label>
                <div class="col-lg-4">
                	<?=$strfile1?>
                    <input type="file" name="file1" id="file1">
                    <span class="help-block">Ukuran gambar <?=$wslider?>x<?=$hslider?> pixel</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="url">URL</label>
                <div class="col-lg-5">
				  	<input type="text" name="url" class="form-control" id="url" value="<?=$url?>">
				</div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="kdtampil">Tampil</label>
                <div class="col-lg-2">
                    <select name=kdtampil size=1 class="form-control">
                    	<option value="1"<?php if($kdtampil) echo " selected"; ?>>Ya</option>
                    	<option value="0"<?php if(!$kdtampil) echo " selected"; ?>>Tidak</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="urut">urut</label>
                <div class="col-lg-1">
                    <input type="text" name="urut" class="form-control" id="urut" value="<?=$urut?>">
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