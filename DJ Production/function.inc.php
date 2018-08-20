<?php
	function createidmember($idmember) {
		$nomember = "S".str_pad($idmember,5,"0", STR_PAD_LEFT);
		return $nomember;
	}
	function getidmember($nomember) {
		$nomember = str_replace("S","",$nomember);
		$idmember = ltrim($nomember,"0");
		return $idmember;
	}
	function cekidmember($idmember="") {
		global $conn,$kodememberdefault;
		if (empty($idmember)) $idmemberx = $kodememberdefault;
		else {
			$idmember = getidmember($idmember);
			$q = "SELECT idmember FROM tb_member WHERE idmember='$idmember'";
			if (!$result = $conn->query($q)) die ($conn->error);
			if (!$result->num_rows) {
				$idmemberx = $kodememberdefault;
			} else $idmemberx = createidmember($idmember);
		}
		return $idmemberx;
	}
	function getnamasponsor($idmember) {
		global $conn;
		$q = "SELECT nama FROM tb_member WHERE idmember='$idmember'";
		if (!$result = $conn->query($q)) die ($conn->error);
		$r = $result->fetch_assoc();
		$nama = $r['nama'];
		return $nama;
	}
	function getdetailbankuser($idmember) {
		global $conn;
		$q = "SELECT idbank,namarek,norek FROM tb_member WHERE idmember='$idmember'";
		if (!$result = $conn->query($q)) die ($conn->error);
		$r = $result->fetch_assoc();
		return $r;
	}
	function getdetailsponsor($idmember) {
		global $conn;
		$idmember = getidmember($idmember);
		$q = "SELECT a.nama,a.telp1,a.email,a.bbm,b.nama as bank FROM tb_member a 
				LEFT JOIN tb_bank b ON (a.idbank = b.idbank) WHERE a.idmember='$idmember'";
		if (!$result = $conn->query($q)) die ($conn->error);
		$r = $result->fetch_assoc();
		return $r;
	}
	function cekparenttrans($idafiliasi,$idmember,$account) {
		global $conn;
		$q = "SELECT a.idtrans FROM tb_trans a 
				JOIN tb_trans_account b ON (a.idtrans = b.idtrans)
				WHERE a.idafiliasi = '$idafiliasi' AND a.idmember='$idmember' AND b.account='$account' AND a.idstatus='2'";
		if (!$result = $conn->query($q)) die ($conn->error);
		if ($result->num_rows) {
			$r = $result->fetch_assoc();
			$id = $r['idtrans'];
		} else $id = false;
		return $id;		
	}
	function getnamaafiliasi($id) {
		global $conn;
		$q = "SELECT judul FROM tb_afiliasi WHERE idafiliasi='$id'";
		if (!$result = $conn->query($q)) die ($conn->error);
		$r = $result->fetch_assoc();
		$nama = $r['judul'];
		return $nama;
	}
    function uploadfile($nmfile, $dirfile, $tmpnmfile) {
        $lokfile = $dirfile.$nmfile;
        if (!move_uploaded_file($tmpnmfile, $lokfile)) $flag=-1;    //upload gagal
        else {
            $flag=1;     //upload berhasil
            chmod($lokfile,0755);
        }
        if ($flag == -1) $strstatus = "$nmfile file can not be upload, please check directory permission ...";
        return $strstatus;
    }
	function randomPassword() {
	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	}
	function hargaitem($harga) {
		$str = "Rp. ".number_format($harga,0,",",".");
		return $str;
	}
	function pstrstatus($str="") {
		if (!empty($str)) {
			$str = "<div class=\"alert alert-warning alert-dismissable\">\n<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n$str\n</div>";
			echo $str;
		}
	}
	function delfile($nmfile, $dirfile) {
		$str = unlink($dirfile.$nmfile);	
		return $str;
	}
	function uploadfileceksize($nmfile, $dirfile, $tmpnmfile, $max_width, $max_height) {
        $lokfile = $dirfile.$nmfile;
		list($imgwidth,$imgheight) = getimagesize($tmpnmfile);
		if ($imgwidth==$max_width && $imgheight==$max_height) {
	        if (!move_uploaded_file($tmpnmfile, $lokfile)) $flag=-1;    //upload gagal
	        else {
	            $flag=1;     //upload berhasil
	            chmod($lokfile,0755);
	        }
	        if ($flag == -1) $strstatus = "$nmfile file can not be upload, please check directory permission ...";
		} else {
			$strstatus = "Image size must be $max_width x $max_height";			
		}	
        return $strstatus;
    }
	function uploadfileceksizeplus($nmfile, $dirfile, $tmpnmfile, $max_width, $max_height) {
        $lokfile = $dirfile.$nmfile;
		list($imgwidth,$imgheight) = getimagesize($tmpnmfile);
		//echo "b:$imgwidth, $imgheight, $max_width, $max_height";
		if ($imgwidth<=$max_width && $imgheight<=$max_height) {
	        if (!move_uploaded_file($tmpnmfile, $lokfile)) $flag=-1;    //upload gagal
	        else {
	            $flag=1;     //upload berhasil
	            chmod($lokfile,0755);
	        }
	        if ($flag == -1) $strstatus = "$nmfile file can not be upload, please check directory permission ...";
		} else {
			$strstatus = "Image size must be max width: $max_width, max height: $max_height";			
		}	
        return $strstatus;
    }
    
	function cekusername($username) {
        global $conn;
        $q = "SELECT iduser FROM tb_user WHERE username='$username'";
        if (!$result = $conn->query($q)) die ($conn->error);
        if ($result->num_rows) {
            return true;
        } else return false;
    }
	
	function cekmember($email) {
		global $conn;
        $q = "SELECT idmember FROM tb_member WHERE email='$email'";
        if (!$result = $conn->query($q)) die ($conn->error);
        if ($result->num_rows) {
            return true;
        } else return false;
	}	
	function getsubisi($str,$length) {
		$str = strip_tags($str);
		if (strlen($str) > $length) {
			$str = substr($str,0,$length)."...";
		} else $str = $str;
		return $str;
	}
	
	function getheaderberita($id) {
		global $conn,$dirupload,$siteurl,$strheader_keyword;
		$q = "SELECT judul,isi,file1,seokeyword,seodescription FROM tb_berita WHERE idberita='$id' AND kdtampil='1'";
		if (!$result = $conn->query($q)) die ($conn->error);
		if ($result->num_rows) {
			$r = $result->fetch_assoc();
			$strdesc['judul'] = $r['judul'];
			if (empty($r['seodescription'])) {
				if (strlen($r['isi']) > 196) {
					$strdesc['seodescription'] = strip_tags(substr($r['isi'],0,196))."...";
				} else $strdesc['seodescription'] = strip_tags($r['isi']);
			} else $strdesc['seodescription'] = $r['seodescription'];
			if (!empty($r['seokeyword'])) {
				$strdesc['seokeyword'] = $r['seokeyword'];
			} else $strdesc['seokeyword'] = $strheader_keyword;
			if (!empty($r['file1'])) {
				$strdesc['file1'] = "<meta property=\"og:image\" content=\"$siteurl/$dirupload$r[file1]\">";
			} else $strdesc['file1'] = "";
		} else $strdesc = "";
		return $strdesc;
	}

	function getheaderafiliasi($id) {
		global $conn,$dirupload,$siteurl;
		$q = "SELECT judul,isi,file1 FROM tb_afiliasi WHERE idafiliasi='$id' AND kdtampil='1'";
		if (!$result = $conn->query($q)) die ($conn->error);
		if ($result->num_rows) {
			$r = $result->fetch_assoc();
			$strdesc['judul'] = $r['judul'];
			if (strlen($r['isi']) > 196) {
				$strdesc['isi'] = strip_tags(substr($r['isi'],0,196))."...";
			} else $strdesc['isi'] = strip_tags($r['isi']);
			if (!empty($r['file1'])) {
				$strdesc['file1'] = "<meta property=\"og:image\" content=\"$siteurl/$dirupload$r[file1]\">";
			} else $strdesc['file1'] = "";
		} else $strdesc = "";
		return $strdesc;
	}
	
	function getmarquee(){
		global $conn;
		$q = "SELECT judul FROM tb_marquee WHERE idmarquee='1' AND kdtampil='1'";
		if (!$result = $conn->query($q)) die ($conn->error);
		if ($result->num_rows) {
			$r = $result->fetch_assoc();
			$strmarquee = $r['judul'];
		} else $strmarquee = "";
		return $strmarquee;
	}
	
	function getmenuactive($mcek,$m="") {
		if ($mcek == $m) {
			echo " class=\"active\"";
		}
	}
	
	function getemailsubject($id,$strganti1) {
		global $conn;
		$q = "SELECT judul FROM tb_email_template WHERE idemailtemplate='$id'";
		if (!$result = $conn->query($q)) die ($conn->error);
		$r = $result->fetch_assoc();
		$judul = $r['judul'];
		//str_replace($search, $replace, $subject)
		$judul = str_replace('||webtitle||',$strganti1,$judul);
		return $judul;
	}
	
	function getemailisi($id) {
		global $conn;
		$q = "SELECT isi, isitext FROM tb_email_template WHERE idemailtemplate='$id'";
		if (!$result = $conn->query($q)) die ($conn->error);
		$r = $result->fetch_assoc();
		return $r;
	}
	
	function cekmenupilih($idmenu,$idlevel) {
		global $conn;
		$q = "SELECT idmenulevel FROM tb_menu_level WHERE idmenu='$idmenu' AND idlevel='$idlevel'";
		if (!$result = $conn->query($q)) die ($conn->error);
		if ($result->num_rows) {
			return true;
		} else return false;
	}
	
	function cekmenuallow($m,$idlevel) {
		global $conn;
		if ($m == "" || $m == "cpass") {
			return true;
		} else {
			$q = "SELECT a.idmenulevel FROM tb_menu_level a
					JOIN tb_menu b ON (a.idmenu = b.idmenu)
					WHERE b.file LIKE '$m%' AND a.idlevel='$idlevel'";
			if (!$result=$conn->query($q)) die ($conn->error);
			if ($result->num_rows) {
				return true;
			} else return false;		
		}
	}
?>