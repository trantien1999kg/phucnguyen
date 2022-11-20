<div id="menu-mobile" class="d-none d-block-m">

    <nav id="mmenu">

        <ul>
            <?php /*
            <div class="search_mobi">

                <input type="text" id="keywords2" placeholder="Nhập vào tên sản phẩm cần tìm..." value="">

                <i class="fa fa-search" data-view aria-hidden="true"></i>

            </div>
            */ ?>

            <?php /* if(count($list_c1)) { ?>

            <li class="heading">Danh mục nhà đất bán</li>

            <?php for($i=0;$i<count($list_c1); $i++) {
                    $sql="select id, ten_$lang, tenkhongdau_$lang as tenkhongdau,type from #_baiviet_cat where id_list = '".$list_c1[$i]['id']."' and hienthi > 0 and type='san-pham' order by stt,id desc";
                    $spcatmenu = $db->rawQuery($sql); 
            ?>
            <li>

                <a class="transition" title="<?=$list_c1[$i]['ten']?>"
                    href="<?=$list_c1[$i]['type']?>/<?=$list_c1[$i]['tenkhongdau']?>"><?=$list_c1[$i]['ten']?></a>

                <?php if(count($spcatmenu)>0) { ?>

                <ul>

                    <?php for($j=0;$j<count($spcatmenu);$j++) {

                        $spitemmenu = $db->rawQuery("select ten_$lang, tenkhongdau_$lang as tenkhongdau,type, id from #_baiviet_item where id_cat = ? and hienthi > 0 order by stt,id desc",array($spcatmenu[$j]['id'])); ?>

                    <li>

                        <a class="transition" title="<?=$spcatmenu[$j]['ten_'.$lang]?>"
                            href="<?=$spcatmenu[$j]['type']?>/<?=$spcatmenu[$j]['tenkhongdau']?>"><?=$spcatmenu[$j]['ten_'.$lang]?></a>

                        <?php if(count($spitemmenu)) { ?>

                        <ul>

                            <?php for($u=0;$u<count($spitemmenu);$u++) {

                                $spsubmenu = $db->rawQuery("select ten_$lang as ten, tenkhongdau_$lang as tenkhongdau,type, id from #_baiviet where id_item = ? and hienthi > 0 order by stt,id desc",array($spitemmenu[$u]['id'])); ?>

                            <li>

                                <a class="transition" title="<?=$spitemmenu[$u]['ten_'.$lang]?>"
                                    href="<?=$spitemmenu[$u]['type']?>/<?=$spitemmenu[$u]['tenkhongdau']?>"><?=$spitemmenu[$u]['ten_'.$lang]?></a>

                                <?php if(count($spsubmenu)) { ?>

                                <ul>

                                    <?php for($s=0;$s<count($spsubmenu);$s++) { ?>

                                    <li>

                                        <a class="transition" title="<?=$spsubmenu[$s]['ten_'.$lang]?>"
                                            href="<?=$spsubmenu[$s]['type']?>/<?=$spsubmenu[$s]['tenkhongdau']?>"><?=$spsubmenu[$s]['ten_'.$lang]?></a>

                                    </li>

                                    <?php } ?>

                                </ul>

                                <?php } ?>

                            </li>

                            <?php } ?>

                        </ul>

                        <?php } ?>

                    </li>

                    <?php } ?>

                </ul>

                <?php } ?>

            </li>

            <?php } ?>

            <?php } */?>



           

            <li>

                <a class="transition <?php if($com=='' || $com=='index') echo 'active'; ?>" href=""
                    title="Trang chủ">TRANG CHỦ</a>

            </li>

            <li>

                <a class="transition <?php if($com=='gioi-thieu') echo 'active'; ?>" href="gioi-thieu"
                    title="GIỚI THIỆU">GIỚI THIỆU</a>

            </li>
            <?php foreach($list_c1 as $k => $v){ ?>
            <li>

                <a class="transition <?php if($com== 'san-pham' && $act==$v['tenkhongdau']) echo ' active';?>" href="<?= $v['type']?>/<?= $v['tenkhongdau']?>"
                    title="<?= $v['ten']?>"><?= $v['ten']?></a>

            </li>
            <?php }?>
            
            <li>

                <a class="transition <?php if($com=='du-an') echo 'active'; ?>" href="du-an"
                    title="DỰ ÁN">DỰ ÁN</a>
            </li>
            <?php /*
            <li>

                <a class="transition <?php if($com=='ky-gui') echo 'active'; ?>" href="ky-gui" title="Ký gửi">Ký gửi</a>

                <?php if(count($dichvu_c1)) { ?>

                <ul>

                    <?php for($i=0;$i<count($dichvu_c1); $i++) {
                        $sql="select id, ten_$lang , tenkhongdau_$lang as tenkhongdau,type from #_baiviet_cat where id_list = '".$dichvu_c1[$i]['id']."' and hienthi > 0 and type='dich-vu' order by stt,id desc";
                        $spcatmenu = $db->rawQuery($sql); 
                    ?>

                    <li>

                        <a class="transition" title="<?=$dichvu_c1[$i]['ten']?>"
                            href="<?=$dichvu_c1[$i]["type"]?>/<?=$dichvu_c1[$i]["tenkhongdau"]?>"><?=$dichvu_c1[$i]['ten']?></a>

                        <?php if(count($spcatmenu)) { ?>

                        <ul>

                            <?php for($j=0;$j<count($spcatmenu); $j++) {?>

                            <li>

                                <a class="transition" title="<?=$spcatmenu[$j]['ten_'.$lang]?>"
                                    href="<?=$spcatmenu[$j]["type"]?>/<?=$spcatmenu[$j]["tenkhongdau"]?>"><?=$spcatmenu[$j]['ten_'.$lang]?></a>



                            </li>

                            <?php } ?>

                        </ul>

                        <?php } ?>

                    </li>

                    <?php } ?>

                </ul>

                <?php } ?>

            </li>
            */ ?>

            <li>
                <a class="transition <?php if($com=='tin-tuc') echo 'active'; ?>" href="tin-tuc" title="TIN TỨC">TIN TỨC</a>
            </li>

            <li>

                <a class="transition <?php if($com=='lien-he') echo 'active'; ?>" href="lien-he" title="LIEN HỆ">LIÊN HỆ</a>

            </li>

        </ul>

    </nav>

</div>