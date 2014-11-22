<?php 
/*
* 碎语部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="main">
        <div id="post">
            <div id="title">
                <img src="<?php echo TEMPLATE_URL; ?>img/avatar.png" class="img" />
                <h1>微语</h1>
                <div class="date">我坚信思想能够改变世界</div>
            </div>
            <div class="weibo">
                <ul>
                    <?php 
                    foreach($tws as $val):
                        $author = $user_cache[$val['author']]['name'];
                        $avatar = empty($user_cache[$val['author']]['avatar']) ? 
                                    BLOG_URL . 'admin/views/images/avatar.jpg' : 
                                    BLOG_URL . $user_cache[$val['author']]['avatar'];
                        $tid = (int)$val['id'];
                        $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
                        ?> 
                        <li class="li">
                        <div class="row">
                            <div class="main_img large-1 column"><img src="<?php echo $avatar; ?>" width="32px" height="32px" /></div>
                            <div class="large-11 column">
                            <div class="post1"><span><?php echo $author; ?></span>
                                <?php echo $val['date'];?>
                                <br />
                                <?php echo $val['t'].'<br/>'.$img;?></div>
                            <div class="clear"></div>
                            </div>
                        </div>
                        </li>
                        <?php endforeach;?>
                </ul>
                <div id="pagenavi" class="right" style="margin-bottom: 10px;">
                    <?php echo $pageurl;?>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
<?php
 include View::getView('footer');
?>