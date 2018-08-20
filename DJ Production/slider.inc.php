<div class="container" padding-top:10px;padding-bottom:10px">
	<div id="carousel-afiliasi" class="carousel slide" data-ride="carousel">
		<?php
			$q = "SELECT * FROM tb_slider WHERE kdtampil='1' ORDER BY urut";
			if (!$result=$conn->query($q)) die($conn->error);
			$banyak = $result->num_rows;
		?>
		<ol class="carousel-indicators">
	    	<?php
	    		$x = 0;
	    		for($s=1;$s<=$banyak;$s++) {
	    			if ($s==1) $strslactive=" class=\"active\"";
					else $strslactive = "";
	    	?>
	    	<li data-target="#carousel-afiliasi" data-slide-to="<?=$x?>"<?=$strslactive?>></li>
	    	<?php
	    			$x++;
				}
	    	?>
		</ol>
	    <div class="carousel-inner">
	    <?php
	        $w = 0;
			while ($r = $result->fetch_assoc()) {
				$w++;
				if ($w == 1) {
					$strbanneractive = " active";
				} else $strbanneractive = "";
				if (!empty($r['url'])) {
					$adepan = "<a href=\"http://$r[url]\" target=_blank".$adepanadd.">";
					$ablk = "</a>";
				} else {
					$adepan = "";$ablk = "";
				}
		?>
			<div class="item<?=$strbanneractive?>">
				<?=$adepan?><img src="<?=$dirupload.$r['file1']?>" alt="<?=$r['judul']?>"><?=$ablk?>
			</div>
		<?php
			}
		?>
		</div>
	    <a class="left carousel-control" href="#carousel-afiliasi" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left"></span>
	    </a>
	    <a class="right carousel-control" href="#carousel-afiliasi" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right"></span>
	    </a>
	</div>
</div>