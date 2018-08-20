<script language="javascript">
function ceksubmit() {
    var f = document.f1;
    var filterx=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    <?php
        if (!$edituser) {
    ?>
    if(f.username.value == "") {
        alert("Masukkan username.");
        f.username.focus();
        return false;
    }
    if(f.username.length < 5) {
        alert("Minimal karakter untuk username adalah 5.");
        f.username.focus();
        return false;
    }
    <?php
        }
    ?>
    if(f.nama.value == "") {
        alert("Masukkan nama pengguna.");
        f.nama.focus();
        return false;
    }
    if(f.email.value == "") {
        alert("Masukkan email pengguna.");
        f.email.focus();
        return false;
    }
    if (!filterx.test(f.email.value)) {
        alert("Format email salah.");
        f.email.focus();
        return false;
    }
    <?php
        if (!$edituser) {
    ?>
    if (f.passwd1.value=="") {
        alert("Masukkan password Anda.");
        f.passwd1.focus();
        return false;
    }
    if (f.passwd2.value=="") {
        alert("Ketikan kembali password Anda.");
        f.passwd2.focus();
        return false;
    }
    if (f.passwd1.value != f.passwd2.value) {
        alert("Kedua password Anda tidak sama.");
        f.passwd2.focus();
        return false;    
    }
    <?php
        }
    ?>
}
</script>
<div class="row">
    <div class="col-md-12">
        <h3>List Pengguna</h3>
        <form class="well well-sm form-horizontal" name=f1 action="main.php?m=<?=$m?>" method=post>
        <input type=hidden name=id value="<?=$iduser?>">
        <fieldset>
            <div class="form-group">
                <label class="col-md-2 control-label" for="username">Username</label>
                <div class="col-md-4">
                    <?php
                        if ($edituser) {
                    ?>
                    <input class="form-control" id="username" type="text" placeholder="<?=$username?>" disabled name=username>    
                    <?php
                        } else {
                    ?>
                    <input type="text" name="username" class="form-control" id="username"> 
                    <span class="help-block">(jangan ada spasi, minimal 5 karakter)</span>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="nama">Nama</label>
                <div class="col-md-4">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?=$nama?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="idlevel">Level Pengguna</label>
                <div class="col-md-3">
                    <select name="idlevel" id="idlevel" size=1 class="form-control">
                        <?php
                            $q = "SELECT * FROM tb_user_level";
                            if (!$result = $conn->query($q)) die ($conn->error);
                            while ($r = $result->fetch_assoc()) {
                        ?>
                        <option value="<?=$r[idlevel]?>" <?php if ($r[idlevel] == $idlevel) echo "selected"; ?>><?=$r[level]?></option>
                        <?php        
                            }
                        ?>
                    </select>    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="email">Email</label>
                <div class="col-md-4">
                    <input type="text" name="email" class="form-control" id="email" value="<?=$email?>">
                </div>
            </div>   
            <?php
                if (!$edituser) {
            ?>
            <div class="form-group">
                <label class="col-md-2 control-label" for="passwd1">Password</label>
                <div class="col-md-4">
                    <input type="password" name="passwd1" class="form-control" id="passwd1">
                </div>
            </div>          
            <div class="form-group">
                <label class="col-md-2 control-label" for="passwd2">Retype Password</label>
                <div class="col-md-4">
                    <input type="password" name="passwd2" class="form-control" id="passwd2">
                </div>
            </div>
            <?php
                }
            ?>
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