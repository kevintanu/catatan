<script language="javascript">
function ceksubmit() {
    var f = document.f1;
    var filterx=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    if(f.amount.value == "") {
        alert("Masukkan Nilai Deposit.");
        f.amount.focus();
        return false;
    }
    if(f.amount.value == "0") {
        alert("Masukkan Nilai Deposit.");
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
        <h3>First time Deposit</h3>
        <form class="well well-sm form-horizontal" name=f1 action="member.php?m=<?=$m?>" method=post>
        <input type=hidden name=id value="<?=$idtransfirst?>">
        <fieldset>
            <div class="form-group">
                <label class="col-md-2 control-label" for="username">Email</label>
                <div class="col-md-4">
                    <input class="form-control" id="username" type="text" placeholder="<?=$email?>" readonly>    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="idafiliasi">Afiliasi</label>
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
                <label class="col-md-2 control-label" for="amount">Nilai Deposit</label>
                <div class="col-md-4">
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