			<br><div class="garisbawah"><span class="judulgaris">Customer Support</span></div>
			<div class="text-center">
			<?php
				$q = "SELECT * FROM tb_cs";
				if (!$result=$conn->query($q)) die ($conn->error);
				while ($r = $result->fetch_assoc()) {
			?>
				<br><a href="https://messenger.yahoo.com/edit/send/?.target=<?=$r[yahoo]?>"><img border="0" src="https://opi.yahoo.com/yahooonline/u=<?=$r[yahoo]?>/m=g/t=14/l=us/opi.jpg"></a>
			<?php
				}
			?>
			</div>