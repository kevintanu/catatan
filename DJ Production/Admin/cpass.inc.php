<?php
    if (isset($_POST['btnsubmit'])) {
        $oldpwd = $_POST['oldpwd'];
        $pwd1 = $_POST['pwd1'];
        $pwd2 = $_POST['pwd2'];
        if ($pwd1 == $pwd2) {
            $uname = $_SESSION['isuser'];
            $coldpwd = md5($oldpwd);
            $q = "select username from tb_user where (passwd = '$coldpwd') and (username = '$uname')";
            if (!$result = $conn->query($q)) die ($conn->error);
            if ($result->num_rows) {
                $pwd = md5($pwd1);
                $sql = "update tb_user set passwd='$pwd' where (username = '$uname')";
                if (!$result = $conn->query($sql)) die ($conn->error);
                $strstatus = "Password Anda telah diupdate.";
            } else $strstatus = "Password lama Anda salah.";
        } else $strstatus = "Password baru Anda tidak sama.";
    }
?>
<script language="javascript">
function ceksubmit() {
    if (document.form1.oldpwd.value=="") {
        alert ("Masukkan password lama Anda.");
        document.form1.oldpwd.focus();
        return false;
    }
    if (document.form1.pwd1.value=="") {
        alert ("Masukkan password Anda.");
        document.form1.pwd1.focus();
        return false;
    }
    if (document.form1.pwd1.value!=document.form1.pwd2.value) {
        alert ("Password baru Anda tidak sama.");
        document.form1.pwd2.focus();
        return false;
    }
}
</script>
<?php
    if (!empty($strstatus)) {
?>
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<?=$strstatus?>
</div>
<?php       
    }
?>
<div class="row">
	<h3>Change Password</h3>
    <div class="col-md-12">
        <form class="well well-sm form-horizontal" name=form1 action="main.php?m=<?=$m?>" method=post>
        	<fieldset>
            <div class="form-group">
                <label class="col-md-2 control-label" for="oldpwd">Password Sekarang</label>
                <div class="col-md-4">
                	<input class="form-control" id="oldpwd" type="password" name=oldpwd>    	
            	</div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="pwd1">Password Baru</label>
                <div class="col-md-4">
                	<input class="form-control" id="pwd1" type="password" name=pwd1>    	
            	</div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="pwd2">Ketikkan Password Baru</label>
                <div class="col-md-4">
                	<input class="form-control" id="pwd2" type="password" name=pwd2>    	
            	</div>
            </div>
            <div class="form-actions">
            	<div class="col-md-4 col-md-offset-2">
                	<button type="submit" class="btn btn-primary" name="btnsubmit" onclick="return ceksubmit();">Submit</button>
                	<A href="main.php" class="btn btn-default">Cancel</a>
               	</div>
            </div>
            </fieldset>
        </form>
    </div>
</div>
