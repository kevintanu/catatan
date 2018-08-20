<?php
	if (empty($tgl)) $tgl = date("Y-m-d|H:i:s");
?>
<script language="javascript">
function ceksubmit() {
    var f = document.f1;
    if(f.judul.value == "") {
        alert("Masukkan nama afiliasi.");
        f.judul.focus();
        return false;
    }
}
</script>
<div class="row">
    <div class="col-md-12">
        <h3>Afiliasi</h3>
        <form class="well well-sm form-horizontal" name=f1 action="main.php?m=<?=$m?>" method=post enctype="multipart/form-data">
        <input type=hidden name=id value="<?=$idafiliasi?>">
        <fieldset>
            <div class="form-group">
                <label class="col-md-2 control-label" for="judul">Nama</label>
                <div class="col-md-5">
                    <input type="text" name="judul" class="form-control" id="judul" value="<?=$judul?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="judul">Isi</label>
                <div class="col-md-10">
                	<textarea class="ckeditor" cols="80" id="isi" name="isi" rows="10"><?=$isi?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="file1">Gambar</label>
                <div class="col-md-4">
                	<?=$strfile1?>
                    <input type="file" name="file1" id="file1">
                    <span class="help-block">Ukuran gambar max <?=$wgaleri?>x<?=$hgaleri?> pixel</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="kdtampil">Tampil</label>
                <div class="col-md-2">
                    <select name=kdtampil size=1 class="form-control">
                    	<option value="1"<?php if($kdtampil) echo " selected"; ?>>Ya</option>
                    	<option value="0"<?php if(!$kdtampil) echo " selected"; ?>>Tidak</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
            	<div class="col-md-offset-2 col-md-10">
	                <button type="submit" class="btn btn-primary" name="btnsubmit" onclick="return ceksubmit();">Submit</button>
	                <a href="main.php?m=<?=$m?>" class="btn btn-default">Cancel</a>
            	</div>
            </div>
        </fieldset>
        </form>
    </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace( 'isi', {
            filebrowserBrowseUrl : 'flmngr/index.html',
        }
    );
</script>