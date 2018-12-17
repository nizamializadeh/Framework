
<style>
    @import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);

    .detailBox {
        width:320px;
        border:1px solid #bbb;
        margin:50px;
    }
    .titleBox {
        background-color:#fdfdfd;
        padding:10px;
    }
    .titleBox label{
        color:#444;
        margin:0;
        display:inline-block;
    }

    .commentBox {
        padding:10px;
        border-top:1px dotted #bbb;
    }
    .commentBox .form-group:first-child, .actionBox .form-group:first-child {
        width:80%;
    }
    .commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
        width:18%;
    }
    .actionBox .form-group * {
        width:100%;
    }
    .taskDescription {
        margin-top:10px 0;
    }
    .commentList {
        padding:0;
        list-style:none;
        max-height:200px;
        overflow:auto;
    }
    .commentList li {
        margin:0;
        margin-top:10px;
    }
    .commentList li > div {
        display:table-cell;
    }
    .commenterImage {
        width:30px;
        margin-right:5px;
        height:100%;
        float:left;
    }
    .commenterImage img {
        width:100%;
        border-radius:50%;
    }
    .commentText p {
        margin:0;
    }
    .sub-text {
        color:#aaa;
        font-family:verdana;
        font-size:11px;
    }
    .actionBox {
        border-top:1px dotted #bbb;
        padding:10px;
    }
</style>

<div class="detailBox">
    <div class="titleBox">
        <label>Comment Box</label>
        <button type="button" class="close" aria-hidden="true">&times;</button>
    </div>
    <div class="commentBox">

    </div>
    <div class="actionBox">
        <ul class="commentList">
            <li>
                <div class="commenterImage">
                    <img src="http://placekitten.com/50/50" />
                </div>
                <div class="commentText">
                    <?php
                    if(isset($com)!=0)
                    {
                        foreach($com as $key => $value)
                        {
                            ?>
                            <tr>
                                <p class=""> <?=$value['commit'];?></p>

                                <td>USER:<?=$value['user_email'];?></td>
                            </tr>
                            <?php
                        }
                    }

                    ?>

                </div>
            </li>

        </ul>
        <?php if(isset($_SESSION['statu'])) {  ?> <p class="login-box-msg"><?=$_SESSION['statu'];?></p>  <?php } ?>
        <form class="form-inline" id="Login" action="<?=SITE_URL;?>/posts/comment" method="post" role="form">
            <div class="form-group">
                <input type="hidden" name="post_id" value="<?=$value['post_id'];?>">
                <input class="form-control" type="text" name="commit" placeholder="Your comments" />
            </div>
            <div class="form-group">
                <button class="btn btn-default">Add</button>
            </div>
        </form>
    </div>
</div>


