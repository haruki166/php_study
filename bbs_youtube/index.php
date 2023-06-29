<?php 

    $comment_array = array();
    $error_messages = array();

    //DB接続
    try{
        $db = new PDO('mysql:host=localhost;dbname=bbs_youtube', 'root' ,'root' );
    }catch(PDOException $e){
        echo $e -> getMessage();
    }

    //フォームを打ち込んだ時
    if(!empty($_POST['submitButton'])){

        //名前のチェック
        if(empty($_POST['username'])){
            echo '名前を入力してください';
            $error_messages['username']='名前を入力してください';
        }

        //コメントのチェック
        if(empty($_POST['comment'])){
            echo 'コメントを入力してください';
            $error_messages['comment']='コメントを入力してください';
        }


        if(empty($error_messages)){
            //入力データの送信
            try {
                $stmt = $db->prepare('insert into `bbs-table` (username,comment) values (:name,:comment)');
                $stmt->bindParam(':name', $_POST['username']);
                $stmt->bindParam(':comment', $_POST['comment']);

                $stmt->execute();

                //ページを戻して再読み時に同じものが複数データベースに追加するのを防ぐ
                header('Location:index.php');
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }    
    }
    
    //DBからコメントデータを取得する
    $sql = 'select id ,username, comment , postDate from `bbs-table`';

    $comment_array = $db -> query($sql);

    //DBの接続を解除
    $db = null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="title">PHPで掲示板アプリ</h1>
    <hr>
    <div class="boardWrapper">
        <section>
            <?php foreach($comment_array as $comment):?>
            <article class="wrapper">
                <div class="nameArea">
                    <span>名前:</span>
                    <p class="username"><?php echo htmlspecialchars($comment['username']);?></p>
                    <time>:<?php echo htmlspecialchars($comment['postDate']);?></time>
                </div>
                <p class="comment">
                    <?php echo htmlspecialchars($comment['comment']);?>
                </p>
            </article>
            <?php endforeach;?>
        </section>
        
        <form action="" class="formWrapper" method="post">
            <div>
                <input type="submit" value="書き込む" name="submitButton">
                <label for="">名前:</label>
                <input type="text" name="username">
            </div>
            <div>
                <textarea class="commentTextArea" name="comment" id="" cols="30" rows="10"></textarea>
            </div>
        </form>
    </div>    
    
</body>
</html>