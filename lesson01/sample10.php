<?php
$fruits = [
    'apple' => 'りんご',
    'grape' => 'ぶどう',
    'lemon' => 'レモン',
    'tomato' => 'トマト',
    'peach' => 'もも'
];
?>

<dl>
    <?php foreach ($fruits as $en => $ja):?>
    <dt><?php echo $en ?></dt>
    <dt><?php echo $ja ?></dt>
    <?php endforeach ?>
</dl>