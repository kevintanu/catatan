<?php
	if (empty($tgl)) $tgl = date("Y-m-d|H:i:s");
?>
<script language="javascript">
function ceksubmit() {
    var f = document.f1;
    if(f.judul.value == "") {
        alert("Masukkan judul email.");
        f.judul.focus();
        return false;
    }
}
</script>
<div class="row">
    <div class="col-md-12">
        <h3>Email Template: <?=$strjudulemail?></h3>
        <form class="well well-sm form-horizontal" name=f1 action="main.php?m=<?=$m?>" method=post enctype="multipart/form-data">
        <input type=hidden name=id value="<?=$idemailtemplate?>">
        <fieldset>
        	<div class="form-group">
                <label class="col-md-2 control-label" for="afiliasi">Jenis Email</label>
                <div class="col-md-4">
                	<p class="form-control-static"><?=$emailuntuk?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="judul">Judul</label>
                <div class="col-md-5">
                    <input type="text" name="judul" class="form-control" id="judul" value="<?=$judul?>">
                </div>
                <div class="col-md-5">
                	<p class="form-control-static">Variabel: <?=$strvjudul?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="isi">Isi</label>
                <div class="col-md-10">
                	<textarea class="ckeditor" cols="80" id="isi" name="isi" rows="10"><?=$isi?></textarea>
                	<Br>Variabel: <?=$strvisi?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="isitext">Isi (Text Version)</label>
                <div class="col-md-10">
                	<textarea cols="80" id="isitext" name="isitext" rows="10"><?=$isitext?></textarea>
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