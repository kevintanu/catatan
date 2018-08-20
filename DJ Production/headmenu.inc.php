<div class="topblack">
	<div class="container">
		<div class="col-md-12" style="margin-top:5px">
			<img src="img/logo.png" border=0 title="logo perusahaan">
		</div>
	</div>
</div>
<div class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
    	<div class="navbar-header">
        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            	<span class="sr-only">Toggle navigation</span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
          	</button>
          	<div class="text-right kontakmobile" style="padding-top:15px"><?php if (!empty($dtmember['bbm'])) { ?> <i class="icon-blackberry"></i>&nbsp;<?=$dtmember['bbm']?><?php }?> &nbsp;&nbsp;&nbsp;<img src="img/wa.jpg"/>&nbsp;<?=$dtmember['telp1']?></div>
        </div>
        <div class="navbar-collapse collapse">
        	<ul class="nav navbar-nav">
	            <li<?=getmenuactive("home",$mx)?>><a href="index.php?id=<?=$idmember?>">Home</a></li>
	            <li<?=getmenuactive("afiliasi",$mx)?>><a href="index.php?m=afiliasi&id=<?=$idmember?>">Afiliasi</a></li>
	            <li<?=getmenuactive("berita",$mx)?>><a href="index.php?m=berita&id=<?=$idmember?>">News</a></li>
	            <li<?=getmenuactive("kontak",$mx)?>><a href="index.php?m=kontak&id=<?=$idmember?>">Contact</a></li>
          	</ul>
          	<p class="navbar-text navbar-right kontakweb"><strong>Contact Us</strong>:<?php if (!empty($dtmember['bbm'])) { ?>&nbsp;&nbsp;&nbsp;<i class="icon-blackberry"></i>&nbsp;<?=$dtmember['bbm']?><?php }?>&nbsp;&nbsp;&nbsp;<img src="img/wa.jpg"/>&nbsp;<?=$dtmember['telp1']?></p>
        </div><!--/.nav-collapse -->
	</div>
</div>
<div class="wrapper">
	<div class="container" style="margin-top:-20px;padding-top:10px;padding-bottom:10px">
		<div class="row">
			<div class="col-md-11">
				<span class="label label-warning">News: </span><div class="marquee"><?=getmarquee()?></div>
			</div>
		</div>
	</div>
