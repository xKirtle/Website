<?php
$news1_3 = mysql_query("SELECT * FROM cms_news ORDER BY ID DESC LIMIT 3") or die(mysql_error());
$news4_5 = mysql_query("SELECT * FROM cms_news ORDER BY ID DESC LIMIT 2 OFFSET 2") or die(mysql_error());
?>

<div id="column2" class="column">
<div class="habblet-container news-promo">
<div class="cbb clearfix notitle ">
<div id="newspromo">
<div id="topstories">

<?php $i = 0; while($news = mysql_fetch_assoc($news1_3)){ $i++; ?>

<div class="topstory" style="background-image: url(<?php echo $news['image']; ?>)<?php if($i != '1'){ ?>; display: none<?php } ?>">
<h4>&Uacute;ltimas not&iacute;cias</h4>
<h3><a href="<?php echo $path; ?>/articles/<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h3>
<p class="summary"><?php echo $news['longstory']; ?></p>
<p><a href="<?php echo $path; ?>/articles/<?php echo $news['id']; ?>">Ler mais &raquo;</a></p>
</div>

<?php } ?>

<div id="topstories-nav" style="display: none"><a href="#" class="prev">�Anterior</a><span>1</span> / 3<a href="#" class="next">Seguinte�</a></div>
</div>
  
<ul class="widelist">
<?php 
$i = 0;
while($news = mysql_fetch_assoc($news4_5)){
$i++;

if(IsEven($i)){
	$even = "odd";
} else {
	$even = "even";
}
?>

<li class="<?php echo $even; ?>">
<a href="<?php echo $path; ?>/articles/<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a>
<div class="newsitem-date"><?php echo date('d-m-Y', $news['published']); ?></div>
</li>

<?php } ?>

<li class="last"><a href="<?php echo $path; ?>/articles" style="color:red;text-decoration:underline;">�ndice de Not&iacute;cias &raquo;</a></li>
</ul>

</div>
<script type="text/javascript">
document.observe("dom:loaded", function() { NewsPromo.init(); });
</script>

</div>
</div>