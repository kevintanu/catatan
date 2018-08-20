<?php
	if (isset($_POST['btnsubmit'])) {
		$judul = $conn->real_escape_string($_POST['judul']);
		$url = $conn->real_escape_string($_POST['url']);
		$kdtampil = $_POST[kdtampil];
		if (!empty($judul)) {
			$q = "UPDATE tb_marquee SET judul='$judul',url='$url',kdtampil='$kdtampil' WHERE idmarquee='1'";
            if (!$result = $conn->query($q)) die ($conn->error);
            $strstatus .= "Data telah diupdate.";
		} else $strstatus = "Masukkan isi text berjalan.";
	}
	$q = "SELECT * FROM tb_marquee WHERE idmarquee='1'";
	if (!$result = $conn->query($q)) die ($conn->error);
    $r = $result->fetch_assoc();
    $judul = $r[judul];
	$url = $r[url];
	$kdtampil = $r[kdtampil];
?>
<script language="javascript">
function ceksubmit() {
    var f = document.f1;
    if(f.judul.value == "") {
        alert("Masukkan text berjalan.");
        f.judul.focus();
        return false;
    }
}
</script>
<?=pstrstatus($strstatus)?>
        <h3>Berita Berjalan</h3>
        <form class="well form-horizontal" name=f1 action="main.php?m=<?=$m?>" method=post>
        <fieldset>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="judul">Text</label>
                <div class="col-lg-10">
                    <input type="text" name="judul" class="form-control" id="judul" value="<?=$judul?>" maxlength=255>
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
            	<div class="col-lg-offset-2 col-lg-10">
	                <button type="submit" class="btn btn-primary" name="btnsubmit" onclick="return ceksubmit();">Submit</button>
	                <a href="main.php?m=<?=$m?>" class="btn btn-default">Cancel</a>
	            </div>
            </div>
        </fieldset>
        </form>