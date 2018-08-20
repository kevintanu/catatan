<script language="javascript">
function ceksubmit() {
    var f = document.f1;
    if(f.account.value == "") {
        alert("Masukkan akun produk.");
        f.account.focus();
        return false;
    }
    if(f.amount.value == "") {
        alert("Masukkan jumlah withdraw.");
        f.amount.focus();
        return false;
    }
    if(f.amount.value == "0") {
        alert("Masukkan jumlah withdraw.");
        f.amount.focus();
        return false;
    }
    if(true) {
    	return confirm("Apakah Anda yakin akan melakukan withdraw?");
    }
}
</script>
<div class="row">
    <div class="col-md-12">
        <h3>Withdraw</h3>
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
                <label class="col-md-2 control-label" for="amount">Jumlah</label>
                <div class="col-md-2">
                    <input type="text" name="amount" class="form-control" id="amount" value="<?=$amount?>">
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