<?php
$week_name = ['日', '月', '火', '水', '木', '金', '土'];
echo $week_name[0] . '<br>';

date_default_timezone_set('Asia/Tokyo');
$week = date('w');
echo $week.'<br>';
echo "今日は、$week_name[$week]曜日です";