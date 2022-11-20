<nav class="wrapper-nav__menu d-none-m d-none-tablet">



    <div class="col l-12 m-12 c-12">

        <ul class="nav-menu d-flex justify-content-between">

            <li class="<?php if($com=='' || $com=='index') echo ' active';?>">
                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
                <h2>
                    <?php }?>
                    <a href="" title="Trang chủ" rel="dofollow"><img src="./assets/images/tienIMG/menuhome.png"
                            alt=""></a>
                    <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
                </h2>
                <?php }?>
            </li>

            <li class="<?php if($com=='gioi-thieu') echo ' active';?>">
                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
                <h2>
                    <?php }?>
                    <a href="gioi-thieu" title="Giới thiệu" rel="dofollow">GIỚI THIỆU</a>
                    <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
                </h2>
                <?php }?>
            </li>

            <?php foreach($list_c1 as $k => $v){
                $list_c2 = $db->rawQuery("select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau from #_baiviet_cat where hienthi=1 and id_list=? order by stt asc,id desc",array($v['id']));
                           
                ?>
            <li class="<?php if($com== 'san-pham' && $act==$v['tenkhongdau']) echo ' active';?>">
                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
                <h2>
                    <?php }?>

                    <a href="<?= $v['type']?>/<?= $v['tenkhongdau']?>" title="Về chúng tôi "
                        class="menuheader"><?= $v['ten']?> </a>

                    <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
                </h2>
                <?php if(count($list_c2)>0){?>
                <ul>
                    <?php
                                    foreach($list_c2 as $key =>$vc2){ ?>
                    <li class="p-relative">

                        <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                        <h4>

                            <?php }?>

                            <a href="<?= $v['type']?>/<?= $v['tenkhongdau']?>/<?= $vc2['tenkhongdau']?>" rel="dofollow"
                                title="<?= $vc2['ten']?>"><?= $vc2['ten']?></a>

                            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                        </h4>

                        <?php }?>

                        <?php if(count($c3)>0){ ?>
                        <ul>
                            <?php foreach($c3 as $key =>$vc3){ ?>
                            <li>
                                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
                                <h5>
                                    <?php }?>
                                    <a href="<?= $v['type']?>/<?= $v['tenkhongdau']?>/<?= $vc3['tenkhongdau']?>"
                                        rel="dofollow" title="<?= $vc3['ten']?>"><?= $vc3['ten']?></a>
                                    <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
                                </h5>
                                <?php }?>
                            </li>
                            <?php } ?>
                        </ul>

                        <?php }?>

                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
                <?php }?>
            </li>
            <?php }?>

            <!---->


            <!---->

            <li class="<?php if($com=='du-an') echo ' active';?>">

                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                <h2>

                    <?php }?>

                    <a href="du-an" title="DỰ ÁN" rel="dofollow">DỰ ÁN</a>

                    <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                </h2>

                <?php }?>

                <?php if(count($projects_c1)>0){?>
                <ul>
                    <?php
                                    foreach($projects_c1 as $key =>$vc2){ ?>
                    <li class="p-relative">

                        <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                        <h4>

                            <?php }?>

                            <a href="<?= $v['type']?>/<?= $v['tenkhongdau']?>/<?= $vc2['tenkhongdau']?>" rel="dofollow"
                                title="<?= $vc2['ten']?>"><?= $vc2['ten']?></a>

                            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                        </h4>

                        <?php }?>




                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </li>

            <li class="<?php if($com=='tin-tuc') echo ' active';?>">

                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                <h2>

                    <?php }?>

                    <a href="tin-tuc" title="Tin tức" rel="dofollow">TIN TỨC</a>

                    <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                </h2>

                <?php }?>

                <?php if(count($baogiam_c1)>0){?>

                <ul class="">

                    <?php foreach($baogiam_c1 as $k => $v){
                            
                            ?>

                    <li class="p-relative">

                        <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                        <h3>

                            <?php }?>

                            <a href="<?= $v['type']?>/<?= $v['tenkhongdau']?>" rel="dofollow"
                                title="<?= $v['ten']?>"><?= $v['ten']?></a>

                            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                        </h3>

                        <?php }?>

                    </li>

                    <?php }?>

                </ul>

                <?php }?>

            </li>

            <li class="<?php if($com=='lien-he') echo ' active';?> p-relative">

                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                <h2>

                    <?php }?>

                    <a href="lien-he" title="Liên hệ" rel="dofollow">LIÊN HỆ</a>

                    <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                </h2>

                <?php }?>

            </li>

            <li class="search">
                <span class="search-Click">

                    <img src="./assets/images/tienIMG/search.png" class="search-icon-yellow">

                </span>

                <div class="nav-menu__formsearchheader d-flex align-items-center">

                    <input role="search-input" type="text" name="keywords" id="keywordspc" placeholder="Tìm kiếm">

                    <button class="nav-menu__formsearchheader-button" data-btn-search-pc="" type="submit"><i
                            class="fa-solid fa-magnifying-glass"></i></button>

                </div>
            </li>



        </ul>

    </div>



</nav>