			<div class="garisbawah"><span class="judulgaris">Berita</span></div>
			<br>
			<?php
				if (!empty($id)) {
			?>
			<div class="row">
				<div class="col-md-12">
				<?php
					$q = "SELECT judul,isi,file1 FROM tb_berita WHERE kdtampil='1' AND idberita='$id'";
					if (!$result=$conn->query($q)) die($conn->error);
					if ($result->num_rows) {
						$r = $result->fetch_assoc();
						if (!empty($r['file1'])) {
							$strimg="<img src=\"$dirupload$r[file1]\" title=\"$r[judul]\" border=0 class=\"img-responsive\">";
						} else {
							$strimg="";
						}
				?>	
				<h3><?=$r['judul']?></h3>
				<div align="center"><?=$strimg?></div>
				<?=$r['isi']?>
				<?php
					} else {
				?>
				<?=pstrstatus("Berita tidak diketemukan.")?>
				<?php
					}
				?>
				</div>
			</div>
			<?php
				} else {
			?>
			<div class="row">
				<?php
				    $yy = 0;
					$q = "SELECT idberita,judul,file1 FROM tb_berita WHERE kdtampil='1' ORDER BY idberita DESC";
					if (!$result=$conn->query($q)) die($conn->error);
					while ($r = $result->fetch_assoc()) {
						if (!empty($r['file1'])) {
							$strimg="<img src=\"$dirupload$r[file1]\" title=\"$r[judul]\" border=0 class=\"img-responsive\">";
						} else {
							$strimg="<img data-src=\"holder.js/100%x200/auto/#038A90:#FFFFFF/text:$r[judul]\" title=\"$r[judul]\">";
						}
						$yy++;
				?>
				<div class="col-md-4 text-center">
					<a href="index.php?m=berita&id=<?=$idmember?>&idx=<?=$r['idberita']?>"><?=$strimg?></a>
					<br><a href="index.php?m=berita&id=<?=$idmember?>&idx=<?=$r['idberita']?>"><strong><?=$r['judul']?></strong></a>
				</div>
				<?php
						if ($yy%3==0) echo "</div><br><div class=\"row\">";
					}
				?>
			</div>		
			<?php
				}
			?>