			<div class="garisbawah"><span class="judulgaris">Afiliasi</span></div>
			<br>
			<div class="row">
				<?php
					$q = "SELECT idafiliasi,judul,file1 FROM tb_afiliasi WHERE kdtampil='1' ORDER BY idafiliasi DESC LIMIT 3";
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
			<Br>
			<div class="garisbawah"><span class="judulgaris">News</span></div>
			<br>
			<div class="row">
				<?php
					$q = "SELECT idberita,tgl,judul,isi,file1 FROM tb_berita WHERE kdtampil='1' ORDER BY idberita DESC LIMIT 1";
					if (!$result=$conn->query($q)) die ($conn->error);
					$r = $result->fetch_assoc();
					if (!empty($r['file1'])) {
						$strimg="<img src=\"$dirupload$r[file1]\" title=\"$r[judul]\" border=0 class=\"img-responsive\">";
					} else {
						$strimg="<img data-src=\"holder.js/100%x170/auto/#B4DAA7:#FFFFFF/text:$r[judul]\" title=\"$r[judul]\">";
					}
					$strid = $r['idberita'];
				?>
				<div class="col-md-6">
					<?=$strimg?>
					<a href="index.php?m=berita&id=<?=$idmember?>&idx=<?=$r['idberita']?>"><h3><?=$r['judul']?></h3></a>
					<small><?=date("d/m/Y H:i",strtotime($r['tgl']))?></small>	
					<br><?=getsubisi($r['isi'], 200)?>
				</div>
				<div class="col-md-6">
					<?php
						$q = "SELECT idberita,tgl,judul,isi,file1 FROM tb_berita WHERE kdtampil='1' AND idberita !='$strid' ORDER BY idberita DESC LIMIT 3";
						if (!$result=$conn->query($q)) die ($conn->error);
						while($r = $result->fetch_assoc()) {
							if (!empty($r['file1'])) {
								$strimg="<img src=\"$dirupload$r[file1]\" title=\"$r[judul]\" border=0 class=\"img-responsive\">";
							} else {
								$strimg="<img data-src=\"holder.js/100%x100/auto/#BE6A47:#FFFFFF/text:$r[judul]\" title=\"$r[judul]\">";
							}
					?>
					<div class="row">
						<div class="col-md-6">
							<?=$strimg?>
						</div>
						<div class="col-md-6">
							<a href="index.php?m=berita&id=<?=$idmember?>&idx=<?=$r['idberita']?>"><h5 style="margin:0;padding:0"><?=$r['judul']?></h5></a>
							<small><?=date("d/m/Y",strtotime($r['tgl']))?></small>	
						</div>
					</div>
					<br>
					<?php
						}
					?>
				</div>
			</div>