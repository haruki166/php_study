<?php 
date_default_timezone_set('Asia/Tokyo');
$time =date('G');
echo $time;
?>
<?php if($time < 9):?>
<p>営業時間外です</p>
<?php else :?>
<p>ようこそ</p>
<?php endif;?>

<?php 
$s ='a';
if ($s) :
    echo '$sには文字が入っています';
endif;