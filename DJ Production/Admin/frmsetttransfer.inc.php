<div class="row">
    <div class="col-md-12">
        <h3>Edit Transfer</h3>
        <form class="well well-sm form-horizontal" name=f1 action="main.php?m=<?=$m?>" method=post>
        <input type=hidden name=id value="<?=$idtrans?>">
        <fieldset>
        	<div class="form-group">
                <label class="col-md-2 control-label" for="tgl">Tanggal</label>
                <div class="col-md-4">
                	<p class="form-control-static"><?=$tgl?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="afiliasi">Dari Produk</label>
                <div class="col-md-4">
                	<p class="form-control-static"><?=$afiliasi?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="afiliasi">Akun Produk</label>
                <div class="col-md-4">
                	<p class="form-control-static"><?=$account?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="afiliasi">Ke Produk</label>
                <div class="col-md-4">
                	<p class="form-control-static"><?=$afiliasito?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="afiliasi">Akun Produk</label>
                <div class="col-md-4">
                	<p class="form-control-static"><?=$accountto?></p>
                </div>
            </div>
            <div class="form-group">
				<label for="jumlah" class="col-md-2 control-label">Jumlah</label>
			    <div class="col-md-3">
			    	<p class="form-control-static"><?=$jumlah?></p>
			    </div>
			</div>
			<div class="form-group">
                <label class="col-md-2 control-label" for="idstatusadmin">Status</label>
                <div class="col-md-4">
                	<select name="idstatusadmin" size=1 class="form-control">
					<?php
						$q = "SELECT * FROM tb_trans_status_admin";
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
                	<button type="submit" class="btn btn-primary" name="btnsubmit" onclick="return confirm('Apakah Anda yakin akan mengubah status transaksi ini?');;">Submit</button>
                	<a href="main.php?m=<?=$m?>" class="btn btn-default">Cancel</a>
               	</div>
            </div>
        </fieldset>
        </form>
    </div>
</div>