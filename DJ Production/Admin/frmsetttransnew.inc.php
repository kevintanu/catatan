<script language="javascript">
function ceksubmit() {
    var f = document.f1;
    if(f.account.value == "") {
        alert("Masukkan akun produk.");
        f.account.focus();
        return false;
    }    
    if(f.accpasswd.value == "") {
        alert("Masukkan akun password.");
        f.accpasswd.focus();
        return false;
    }
    if(true) {
    	return confirm("Apakah Anda yakin akan mengubah status transaksi ini?");
    }
}
</script>
<div class="row">
    <div class="col-md-12">
        <h3>Edit <?=$strjudul?></h3>
        <form class="well well-sm form-horizontal" name=f1 action="main.php?m=<?=$m?>&kd=<?=$kd?>" method=post>
        <input type=hidden name=id value="<?=$idtrans?>">
        <input type=hidden name=idta value="<?=$idtransaccount?>">
        <fieldset>
        	<div class="form-group">
                <label class="col-md-2 control-label" for="tgl">Tanggal</label>
                <div class="col-md-4">
                	<p class="form-control-static"><?=$tgl?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="afiliasi">Produk</label>
                <div class="col-md-4">
                	<p class="form-control-static"><?=$afiliasi?></p>
                </div>
            </div>
            <div class="form-group">
				<label for="jumlah" class="col-md-2 control-label">Jumlah</label>
			    <div class="col-md-3">
			    	<p class="form-control-static"><?=$jumlah?></p>
			    </div>
			</div>
			<div class="form-group">
				<label for="bank" class="col-md-2 control-label">Bank</label>
			    <div class="col-md-3">
			    	<p class="form-control-static"><?=$bank?></p>
			    </div>
			</div>
			<div class="form-group">
				<label for="namarek" class="col-md-2 control-label">Pemilik Rekening</label>
			    <div class="col-md-3">
			    	<p class="form-control-static"><?=$namarek?></p>
			    </div>
			</div>
			<div class="form-group">
				<label for="norek" class="col-md-2 control-label">Nomor Rekening</label>
			    <div class="col-md-3">
			    	<p class="form-control-static"><?=$norek?></p>
			    </div>
			</div>
			<?php
				if ($kd==1) {
			?>
			<div class="form-group">
				<label for="account" class="col-md-2 control-label">Akun Produk</label>
			    <div class="col-md-2">
			    	<input type="text" class="form-control" name="account" id="account" placeholder="Akun Produk" value="<?=$account?>">
			   	</div>
			</div>
			<div class="form-group">
				<label for="accpwd" class="col-md-2 control-label">Akun Password</label>
			    <div class="col-md-2">
			    	<input type="text" class="form-control" name="accpwd" id="accpwd" placeholder="Akun Password" value="<?=$accpwd?>">
			   	</div>
			</div>
			<?php
				} else {
			?>
			<input type=hidden name="account" value="<?=$account?>">
			<input type=hidden name="accpwd" value="xx">
			<div class="form-group">
				<label for="norek" class="col-md-2 control-label">Akun Produk</label>
			    <div class="col-md-3">
			    	<p class="form-control-static"><?=$account?></p>
			    </div>
			</div>
			<?php
				}
			?>
			<div class="form-group">
                <label class="col-md-2 control-label" for="idstatusadmin">Status</label>
                <div class="col-md-4">
                	<select name="idstatusadmin" size=1 class="form-control">
					<?php
						$q = "SELECT * FROM tb_trans_status_admin WHERE idstatusadmin < 3";
						if (!$result = $conn->query($q)) die ($conn->error);
						while ($r=$result->fetch_assoc()) {
					?>                		
						<option value="<?=$r[idstatusadmin]?>"<?php if($idstatusadmin==$r[idstatusadmin]) echo " selected";?>><?=$r[statusadmin];?></option>
					<?php
						}
					?>
                	</select>
                </div>
            </div>
            <div class="form-actions">
            	<div class="col-md-4 col-md-offset-2">
                	<button type="submit" class="btn btn-primary" name="btnsubmit" onclick="return ceksubmit();">Submit</button>
                	<a href="main.php?m=<?=$m?>" class="btn btn-default">Cancel</a>
               	</div>
            </div>
        </fieldset>
        </form>
    </div>
</div>