			<div class="garisbawah"><span class="judulgaris">Afiliasi</span></div>
			<br>
			<?php
				if (!empty($id)) {
			?>
			<div class="row">
				<div class="col-md-12">
				<?php
					$q = "SELECT judul,isi,file1 FROM tb_afiliasi WHERE kdtampil='1' AND idafiliasi='$id'";
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
				<?=pstrstatus("Afiliasi tidak diketemukan.")?>
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
					$q = "SELECT idafiliasi,judul,file1 FROM tb_afiliasi WHERE kdtampil='1' ORDER BY idafiliasi";
					if (!$result=$conn->query($q)) die($conn->error);
					while ($r = $result->fetch_assoc()) {
						if (!empty($r['file1'])) {
							$strimg="<img src=\"$dirupload$r[file1]\" title=\"$r[judul]\" border=0 class=\"img-responsive\">";
						} else {
							$strimg="<img data-src=\"holder.js/100%x200/auto/#038A90:#FFFFFF/text:$r[judul]\" title=\"$r[judul]\">";
						}
				?>
				<div class="col-md-4 text-center">
					<a href="index.php?m=afiliasi&id=<?=$idmember?>&idx=<?=$r['idafiliasi']?>"><?=$strimg?></a>
					<br><a href="index.php?m=afiliasi&id=<?=$idmember?>&idx=<?=$r['idafiliasi']?>"><strong><?=$r['judul']?></strong></a>
				</div>
				<?php
					}
				?>
			</div>		
			<?php
				}
			?>