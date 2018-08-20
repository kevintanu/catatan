<?php
	if (empty($idbank)) {
		$dtbank = getdetailbankuser($idmember);
		$idbank = $dtbank[idbank];
		$namarek = $dtbank[namarek];
		$norek = $dtbank[norek];
	}
?>	
<script language="javascript">
function ceksubmit() {
    var f = document.f1;
    if(f.account.value == "") {
        alert("Masukkan akun produk.");
        f.account.focus();
        return false;
    }
	if(f.namarek.value == "") {
        alert("Masukkan nama rekening.");
        f.namarek.focus();
        return false;
    }    
    if(f.norek.value == "") {
        alert("Masukkan nomor rekening.");
        f.norek.focus();
        return false;
    }
    if(f.amount.value == "") {
        alert("Masukkan jumlah deposit.");
        f.amount.focus();
        return false;
    }
    if(f.amount.value == "0") {
        alert("Masukkan jumlah deposit.");
        f.amount.focus();
        return false;
    }
    if(f.amount.value < <?=$minamount?>) {
        alert("Nilai minimal deposit adalah <?=$minamount?>.");
        f.amount.focus();
        return false;
    }
    if(true) {
    	return confirm("Apakah Anda yakin akan melakukan deposit?");
    }
}
</script>
<div class="row">
    <div class="col-md-12">
        <h3>Deposit</h3>
        <form class="well well-sm form-horizontal" name=f1 action="member.php?m=<?=$m?>" method=post>
        <input type=hidden name=id value="<?=$idtrans?>">
        <fieldset>
            <div class="form-group">
                <label class="col-md-2 control-label" for="idafiliasi">Produk</label>
                <div class="col-md-4">
                	<select name="idafiliasi" size=1 class="form-control">
					<?php
						$q = "SELECT * FROM tb_afiliasi ORDER BY judul";
						if (!$result = $conn->query($q)) die ($conn->error);
						while ($r=$result->fetch_assoc()) {
					?>                		
						<option value="<?=$r[idafiliasi]?>"<?php if($idafiliasi==$r[idafiliasi]) echo " selected";?>><?=$r[judul];?></option>
					<?php
						}
					?>
                	</select>
                </div>
            </div>
            <div class="form-group">
				<label for="account" class="col-md-2 control-label">Akun Produk</label>
			    <div class="col-md-3">
			    	<input type="text" class="form-control" name="account" id="account" placeholder="Akun Produk" value="<?=$account?>">
			    </div>
			</div>
            <div class="form-group">
				<label for="idbank" class="col-md-2 control-label">Nama Bank</label>
			    <div class="col-md-3">
			      		<select name="idbank" size=1 class="form-control">
			      		<?php
			      			$q = "SELECT * FROM tb_bank ORDER BY nama";
							if (!$result = $conn->query($q)) die ($conn->error);
							while ($r = $result->fetch_assoc()) {
			      		?>	
			      			<option value="<?=$r[idbank]?>"<?php if ($r[idbank] == $idbank)  echo " selected";?>><?=$r[nama]?></option>
			      		<?php
							}
			      		?>
			      		</select>
			    </div>
			</div>
			<div class="form-group">
				<label for="namarek" class="col-md-2 control-label">Pemilik Rekening</label>
			    <div class="col-md-6">
			    	<input type="text" class="form-control" name="namarek" id="namarek" placeholder="Pemilik Rekening" value="<?=$namarek?>">
			    </div>
			</div>
			<div class="form-group">
				<label for="norek" class="col-md-2 control-label">Nomor Rekening</label>
			    <div class="col-md-2">
			    	<input type="text" class="form-control" name="norek" id="norek" placeholder="Nomor Rekening" value="<?=$norek?>">
			   	</div>
			</div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="amount">Jumlah</label>
                <div class="col-md-2">
                    <input type="text" name="amount" class="form-control" id="amount" value="<?=$amount?>"> (minimal <?=hargaitem($minamount)?>)
                </div>
            </div>   
            <div class="form-actions">
            	<div class="col-md-4 col-md-offset-2">
                	<button type="submit" class="btn btn-primary" name="btnsubmit" onclick="return ceksubmit();">Submit</button>
                	<a href="member.php?m=<?=$m?>" class="btn btn-default">Cancel</a>
               	</div>
            </div>
        </fieldset>
        </form>
    </div>
</div>