<script language="javascript">
function ceksubmit() {
    var f = document.f1;
    if(f.nama.value == "") {
        alert("Masukkan nama bank.");
        f.nama.focus();
        return false;
    }
}
</script>
        <h3>List Bank</h3>
        <form class="well form-horizontal" name=f1 action="main.php?m=<?=$m?>" method=post>
        <input type=hidden name=id value="<?=$idbank?>">
        <fieldset>
            <div class="form-group">
                <label class="col-md-2 control-label" for="nama">Nama Bank</label>
                <div class="col-md-5">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?=$nama?>">
                </div>
            </div>
            <div class="form-group">
            	<div class="col-md-offset-2 col-md-10">
	                <button type="submit" class="btn btn-primary" name="btnsubmit" onclick="return ceksubmit();">Submit</button>
	                <a href="main.php?m=<?=$m?>" class="btn btn-default">Cancel</a>
	            </div>
            </div>
        </fieldset>
        </form>