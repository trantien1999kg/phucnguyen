<?php 

    $bg_tintuc = $func->OneDataPhoto(null,'bg_tintuc','limit 0,1',"object");                                    // Background tin tức

    $bg_banner = $func->OneDataPhoto("mota_$lang as mota,",'bg-slider','limit 0,1',"object");                                    // Background tin tức

    $bg_boloc = $func->OneDataPhoto(null,'bg-boloc','limit 0,1',"object");                                    // Background tin tức

    $bg_motadangky = $func->OneDataPhoto("mota_$lang as mota,",'bg-motadangky','limit 0,1',"object");                                    // Background tin tức

    $bg_dangky = $func->OneDataPhoto(null,'bg-dangky','limit 0,1',"object");                        // Background tin tức và video

    $bg_gioithieu = $func->OneDataPhoto(null,'bg_gioithieu','limit 0,1',"object");                              // Background giới thiệu

    $ha_gioithieu = $func->OneDataPhoto(null,'ha-gioithieu','limit 0,1',"object");                              // Hình ảnh giới thiệu
   
    $introTop = $func->AllDataPhoto("ten_$lang as ten,number,",'intro-top','limit 0,5','array');                // Lấy toàn bộ thông số giới thiệu

    $anhgiaodich = $func->AllData('id,id_list,luotxem,','anh-giao-dich','','','array');              // Lấy toàn bộ dịch vụ
    

?>




<section class="wrapper-introduces wow fadeInRight" data-wow-offset="50" data-wow-duration="3" data-wow-delay="0.2s">

    <div class="grid wide">

        <div class="row">

            <div class="col l-6 m-6 c-12 mb-m-20 mt100 mt30mobile">

                <div class="wrapper-introduces__title mb25">

                    <a href="gioi-thieu" rel="dofollow" title="<?=$about["ten"]?>" class="d-flex align-items-center">

                        <div class="scrolltext_Introduces">
                            <div class="scrolltext"><?= $row_setting['scrolltext1_vi']?></div>
                            <div class="scrolltext"><?= $row_setting['scrolltext2_vi']?></div>
                        </div>

                    </a>
                    <div class="name_Introduces mt25">
                        <?= $about["ten"]?>
                    </div>

                </div>

                <div class="wrapper-introduces__title-des"><?= htmlspecialchars_decode($about["mota"])?></div>

                <div class="wrapper-introduces__parameter pt20">

                    <div class="row">

                        <?php for($i=0;$i<count($introTop);$i++){ ?>

                        <div class="col l-4 m-2-4 c-4 mb20 col-intro__check intro-col<?=$i?> d-flex flex-column">

                            <div class="wrapper-introduces__boxbottom flex-cl-1 d-flex flex-column">

                                <div class="wrapper-introduces__boxbottom-img">

                                    <span class="d-block ratio-img" img-width="63" img-height="63">

                                        <img class="ratio-img__content img-scale"
                                            src="./assets/images/loading_image.svg"
                                            data-src="<?=_upload_hinhanh_l.$introTop[$i]["photo"]?>"
                                            alt="<?=$introTop[$i]["ten"]?>" <?=$func->errorImg()?>>

                                    </span>

                                </div>

                                <div class="wrapper-introduces__boxbottom-detail flex-cl-1 d-flex flex-column">

                                    <span class="wrapper-introduces__boxbottom-detail-numb flex-cl-1">+<span
                                            id="count<?=$i?>">0</span> <?=$introTop[$i]["ten"]?></span>

                                    <span class="wrap-work__box-detail-line mt15"></span>

                                    <script>
                                    var mydiv<?=$i?> = document.getElementById("count<?=$i?>");

                                    var timeCurrent<?=$i?> = <?=$introTop[$i]["number"]?>;

                                    var checkTime<?=$i?> = 0;

                                    if (timeCurrent<?=$i?> < 50) {

                                        checkTime<?=$i?> = 100;

                                    } else {

                                        checkTime<?=$i?> = 20;

                                    }
                                    var time<?=$i?> = setInterval(getcounter, checkTime<?=$i?>);

                                    function getcounter() {

                                        if (mydiv<?=$i?>.textContent >= timeCurrent<?=$i?>) {
                                            clearInterval(time<?=$i?>);
                                        } else {
                                            mydiv<?=$i?>.textContent++;
                                        }

                                    }
                                    </script>

                                </div>

                            </div>


                        </div>

                        <?php }?>
                        <div class="ml25 button_introduces mt60">
                            <a href="gioi-thieu" class="link_slider" rel="nofollow">XEM THÊM</a>
                        </div>



                    </div>

                </div>

            </div>

            <div class="col l-6 m-6 c-12">

                <div class="wrapper-introduces__img p-relative">

                    <a href="gioi-thieu" class="d-block" rel="dofollow" title="Giới thiệu">

                        <div class="wrapper-introduces__img-big d-none-m">

                            <span class="d-block ratio-img" img-width="372" img-height="647">

                                <img class="ratio-img__content img-scale" src="./assets/images/loading_image.svg"
                                    data-src="<?=_upload_hinhanh_l.$ha_gioithieu->photo?>" alt="<?=$about["ten"]?>"
                                    <?=$func->errorImg()?>>

                            </span>

                        </div>

                        <div class="wrapper-introduces__img-small">

                            <span class="hover-left d-block ratio-img" img-width="578" img-height="504">

                                <img class="ratio-img__content img-scale" src="./assets/images/loading_image.svg"
                                    data-src="<?=_upload_hinhanh_l.$about["photo"]?>" alt="<?=$about["ten"]?>"
                                    <?=$func->errorImg()?>>

                            </span>

                        </div>

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="product_cartegory pb10"
    style="background:url('<?= _upload_hinhanh_l.$bg_duan['photo']?>') no-repeat center center/cover;">
    <div class="container">
        <div class="row">
            <div class="col-12 item wow slideInDown" data-wow-delay="0.2s">
                <div class="owl-carousel owl-theme" id="owl-duan">
                    <?php foreach ($list_c1 as $k => $v) {?>
                    <div class="col-12 product1_slide pb90 pt40mobile pt85">

                        <a href="<?=_upload_baiviet_l.$v["photo"]?>" data-fancybox="img-<?=$key?>" rel="dofollow"
                            title="<?=$v["ten"]?>" class="d-block z-index-1 hover-left ratio-img" img-width="323"
                            img-height="342">
                            <img class="ratio-img__content img-scale" src="./assets/images/loading_image.svg"
                                data-src="<?=_upload_baiviet_l.$v["photo"]?>" alt="<?=$v["ten"]?>"
                                <?=$func->errorImg()?>>
                        </a>
                        <div class="box_product1 mt-24">
                            <div class="box2_product1">
                                <a href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>" class="title_product1 line-1">
                                    THIẾT KẾ THI CÔNG <?=$v['ten']?>
                                </a>
                            </div>

                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="line-bottom-product"> </div>
            </div>
        </div>

    </div>

</section>

<section class="projects pt120">
    <div class="container">
        <div class="row">
            <?php if($deviceType == 'phone'){?>
            <div class="col-12 item">
                <div class="titleSEO_project mb30">
                    <?=$danhmucnoibat['title']?>
                </div>
            </div>
            <?php foreach($projects as $k=>$v){ 
                            $seoDB = $seo->getSeoDB($v['id'],'baiviet','man',$v["type"]); ?>

            <div class="col-12 p-relative">
                <div class="col-12 img_projects_phone">
                    <a href="<?=_upload_baiviet_l.$v["photo"]?>" data-fancybox="img-<?=$k?>" rel="dofollow"
                        title="<?=$v["ten"]?>" class="d-block z-index1 hover-left ratio-img" img-width="515"
                        img-height="402">
                        <img class="ratio-img__content img-scale" src="./assets/images/loading_image.svg"
                            data-src="<?=_upload_baiviet_l.$v["photo"]?>" alt="<?=$v["ten"]?>" <?=$func->errorImg()?>>
                    </a>
                </div>
                <div class="col-12 title_desc_phone info_project1">
                    <a href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>" class="">
                        <div class="project_title pb20">
                            <?=$v["ten"]?>
                        </div>
                        <div class="project_description line-4">
                            <?=$seoDB["description_$lang"]?>
                        </div>
                    </a>
                </div>
            </div>

            <?php }?>

            <?php }else{?>
            <div class="col-12 item display-flex mb220">
                <div class="col-4 p-relative  wow slideInLeft" data-wow-delay="0.2s">
                    <div class="title_Project">
                        Project
                    </div>
                    <div class="titleSEO_project mb30">
                        <?=$danhmucnoibat['title']?>
                    </div>
                    <div class="descriptionSEO_project">
                        <?= htmlspecialchars_decode($danhmucnoibat['mota'])?>
                    </div>
                </div>
                <?php foreach($projects as $k=>$v){ 
                            $seoDB = $seo->getSeoDB($v['id'],'baiviet','man',$v["type"]); ?>
                <?php if ($k == 0 ) { ?>
                <div class="col-5 mt45 circle_after wow slideInRight" data-wow-delay="0.2s">
                    <a href="<?=_upload_baiviet_l.$v["photo"]?>" data-fancybox="img-<?=$k?>" rel="dofollow"
                        title="<?=$v["ten"]?>" class="d-block z-index1 hover-left ratio-img" img-width="515"
                        img-height="402">
                        <img class="ratio-img__content img-scale" src="./assets/images/loading_image.svg"
                            data-src="<?=_upload_baiviet_l.$v["photo"]?>" alt="<?=$v["ten"]?>" <?=$func->errorImg()?>>
                    </a>
                </div>

                <div class="col-3 pl25 mt60 wow slideInRight" data-wow-delay="0.2s">
                    <a href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>" class="info_project1">
                        <div class="project_title pb20">
                            <?=$v["ten"]?>
                        </div>
                        <div class="project_description line-4">
                            <?=$seoDB["description_$lang"]?>
                        </div>
                    </a>
                </div>
                <?php }?>
                <?php }?>
            </div>

        </div>
    </div>



    <div class="col-12">
        <?php foreach($projects as $ky=>$val){ $seoDB = $seo->getSeoDB($val['id'],'baiviet','man',$val["type"]); ?>
        <?php if (( $ky > 0 )&& ( $ky % 2 == 1 ) ) { ?>

        <div class="col-12 display-flex mb100 gap30 ">
            <div class="title_desc_Project wow slideInLeft" data-wow-delay="0.2s">
                <a href="<?=$val["type"]?>/<?=$val["tenkhongdau"]?>" class="ml45 info_project flex-column-center mt90">
                    <div class="project_title mb25">
                        <?=$val["ten"]?>
                    </div>
                    <div class="project_description line-4">
                        <?=$seoDB["description_$lang"]?>
                    </div>
                </a>
            </div>

            <div class="img_project wow slideInRight" data-wow-delay="0.2s">
                <a href="<?=_upload_baiviet_l.$val["photo"]?>" data-fancybox="img-<?=$k?>" rel="dofollow"
                    title="<?=$val["ten"]?>" class="d-block z-index-1 hover-left ratio-img" img-width="857"
                    img-height="496">
                    <img class="ratio-img__content img-scale" src="./assets/images/loading_image.svg"
                        data-src="<?=_upload_baiviet_l.$val["photo"]?>" alt="<?=$val["ten"]?>" <?=$func->errorImg()?>>
                </a>
            </div>
        </div>

        <?php } if (( $ky > 0 )&& ( $ky % 2 == 0 )) { ?>
        <div class="col-12 display-flex mb100 gap10">
            <div class="img_project wow slideInLeft" data-wow-delay="0.2s">
                <a href="<?=_upload_baiviet_l.$val["photo"]?>" data-fancybox="img-<?=$k?>" rel="dofollow"
                    title="<?=$val["ten"]?>" class="d-block z-index-1 hover-left ratio-img" img-width="857"
                    img-height="496">
                    <img class="ratio-img__content img-scale" src="./assets/images/loading_image.svg"
                        data-src="<?=_upload_baiviet_l.$val["photo"]?>" alt="<?=$val["ten"]?>" <?=$func->errorImg()?>>
                </a>
            </div>
            <div class="title_desc_Project wow slideInRight" data-wow-delay="0.2s">
                <a href="<?=$val["type"]?>/<?=$val["tenkhongdau"]?>" class="mr45 info_project flex-column-center mt90">
                    <div class="project_title mb25">
                        <?=$val["ten"]?>
                    </div>
                    <div class="project_description line-4">
                        <?=$seoDB["description_$lang"]?>
                    </div>
                </a>
            </div>
        </div>


        <?php }?>
        <?php }?>
    </div>
    <?php }?>
</section>


<section class="pt80 pt30mobile pb20" style="background-color: var(--html-cl-website)">
    <div class="container">
        <div class="row">

            <div class="col-12 item p-relative">
                <span class="border_why"></span>
                <div class="grid-why">
                    <div class="col-12">
                        <div class="why_choosee_us">
                            TẠI SAO </br>
                            CHỌN PHÚC NGUYÊN ?
                            <div class="conten_why mt25 mb52">
                                WHY CHOOSE US
                            </div>
                        </div>
                        <div class="grid-why">
                            <?php foreach($taisao as $key=>$value){?>
                            <div class="why display-flex js-tab" data-target="#why<?=$key?>">
                                <div class="img_why">
                                    <span class="d-block ratio-img" img-width="88" img-height="87">
                                        <img class="ratio-img__content img-scale"
                                            src="./assets/images/loading_image.svg"
                                            data-src="<?=_upload_baiviet_l.$value["photo"]?>" alt="<?=$value["ten"]?>">
                                    </span>
                                </div>
                                <div class="title_why">
                                    <?=$value["ten"]?>
                                </div>
                            </div>
                            <script>

                            </script>


                            <?php }?>
                        </div>

                    </div>
                    <div class="col-12 margin-centerY">
                        <?php  $seoDB1 = $seo->getSeoDB($taisao[0]['id'],'baiviet','man',$taisao[0]["type"])?>
                        <div class="whyR flex-column-center box-tab show display-n" id="why0">
                            <div class="img_whyR mb15">
                                <span class="d-block ratio-img" img-width="88" img-height="87">
                                    <img class="ratio-img__content img-scale" src="./assets/images/loading_image.svg"
                                        data-src="<?=_upload_baiviet_l.$taisao[0]["photo"]?>"
                                        alt="<?=$taisao[0]["ten"]?>">
                                </span>
                            </div>
                            <div class="title_desc_why">
                                <div class="title_whyR mb25">
                                    <?=$taisao[0]["ten"]?>
                                </div>
                                <div class="desc_whyR flex-center">
                                    <div class="width_83 line-4">
                                        <?=$seoDB1["description_$lang"]?>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php foreach($taisao as $key=>$value){ $seoDB = $seo->getSeoDB($value['id'],'baiviet','man',$value["type"]); ?>
                        <div class="whyR flex-column-center box-tab display-n" id="why<?=$key?>">
                            <div class="img_whyR mb15">
                                <span class="d-block ratio-img" img-width="88" img-height="87">
                                    <img class="ratio-img__content img-scale" src="./assets/images/loading_image.svg"
                                        data-src="<?=_upload_baiviet_l.$value["photo"]?>" alt="<?=$value["ten"]?>">
                                </span>
                            </div>
                            <div class="title_desc_why">
                                <div class="title_whyR mb25">
                                    <?=$value["ten"]?>
                                </div>
                                <div class="desc_whyR flex-center">
                                    <div class="width_83">
                                        <?=$seoDB["description_$lang"]?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="banner_index">
    <span class="d-block ratio-img" img-width="1440" img-height="650">
        <img class="ratio-img__content img-scale" src="./assets/images/loading_image.svg"
            data-src="<?=_upload_hinhanh_l.$banner["photo"]?>" alt="MÁI NGÓI PHÚC NGUYÊN">
    </span>
</section>


<section class="news_index pt75">
    <div class="container">
        <div class="row">
            <div class="col-12 item">
                <div class="box_title_new">
                    <div class="news_content">
                        TIN TỨC </br>
                        & SỰ KIỆN NỔI BẬT
                        <a href="gioi-thieu" class="link_tintuc d-none-mobile focus-button button_absollute"
                            rel="nofollow" target="_blank">XEM THÊM</a>
                    </div>
                    <div class="new_infomation mt20">
                        NEW INFOMATION
                    </div>

                </div>
                <div class="owl-carousel owl-theme" id="owl-tintuc">
                    <?php foreach ($news as $k => $v) {?>
                    <div class="col-12 news_slide pb90 pt45">

                        <a href="<?=_upload_baiviet_l.$v["photo"]?>" data-fancybox="img-<?=$key?>" rel="dofollow"
                            title="<?=$v["ten"]?>" class="d-block z-index-1 hover-left ratio-img" img-width="323"
                            img-height="342">
                            <img class="ratio-img__content img-scale" src="./assets/images/loading_image.svg"
                                data-src="<?=_upload_baiviet_l.$v["photo"]?>" alt="<?=$v["ten"]?>"
                                <?=$func->errorImg()?>>
                        </a>
                        <div class="day_time mt20 mb15">
                            <?=date('g:i',$v['ngaytao'])?> PM &nbsp <?=date('d.m.Y',$v['ngaytao'])?>
                        </div>
                        <a href="<?=$v['type']?>/<?=$v['tenkhongdau']?>" class="title_news line-2">
                            <?=$v['ten']?>
                        </a>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php if($deviceType == 'phone'){?>

<section class="wrapper-register mb70 mt75 p-relative wow fadeInDown" data-wow-offset="50" data-wow-duration="3"
    data-wow-delay="0.2s"
    style="background:url('<?=_upload_hinhanh_l.$bg_dangkymobile["photo"]?>') no-repeat center center/cover;">



    <div class="grid wide">

        <div class="row">

            <div class="col l-5 m-5 c-12 d-flex flex-column mb-m-20 mt-m-20">

                <div class="wrapper-register__boxleft">

                    <div class="wrapper-register__title-default mb40">

                        BẠN CẦN HỖ TRỢ ?
                        <div class="title_rigister">
                            XIN VUI LÒNG ĐỂ LẠI </br>
                            THÔNG TIN
                        </div>
                        <div class="signUp mt20">
                            NEWS SIGN UP
                        </div>

                    </div>



                    <div class="wrapper-register__boxleft-form-row">

                        <div class="row">

                            <div class="col l-6 m-12 c-12 mb-m-18">

                                <input type="text" name="regis-index-fullname" placeholder="Nhập họ và tên">

                            </div>

                            <div class="col l-6 m-12 c-12">

                                <input type="text" name="regis-index-phone" placeholder="Nhập số điện thoại">
                            </div>

                        </div>

                    </div>

                    <div class="wrapper-register__boxleft-form-row">

                        <div class="row">

                            <div class="col l-12 m-12 c-12">

                                <input type="text" name="regis-index-email" placeholder="Nhập email">


                            </div>

                        </div>

                    </div>

                    <div class="wrapper-register__boxleft-form-row wrapper-register__boxleft-form-row-mb30 mb-m-18">

                        <div class="row">

                            <div class="col l-12 m-12 c-12">

                                <textarea name="regis-index-content" cols="30" rows="5"
                                    placeholder="Nhập nội dung"></textarea>

                            </div>

                        </div>

                    </div>

                    <div class="wrapper-register__boxleft-form-row">
                        <button class="p-relative link_register wrapper-regis-btn">ĐĂNG KÍ</button>

                    </div>


                </div>

            </div>

        </div>

    </div>

</section>
<?php }else{?>

<section class="wrapper-register mb70 mt75 p-relative wow fadeInDown" data-wow-offset="50" data-wow-duration="3"
    data-wow-delay="0.2s"
    style="background:url('<?= _upload_hinhanh_l.$bg_dangky->photo?>') no-repeat center center/cover;">



    <div class="grid wide">

        <div class="row">

            <div class="col l-5 m-5 c-12 d-flex flex-column mb-m-20">

                <div class="wrapper-register__boxleft">

                    <div class="wrapper-register__title-default mb40">

                        BẠN CẦN HỖ TRỢ ?
                        <div class="title_rigister">
                            XIN VUI LÒNG ĐỂ LẠI </br>
                            THÔNG TIN
                        </div>
                        <div class="signUp mt20">
                            NEWS SIGN UP
                        </div>

                    </div>

                    <div class="wrapper-register__boxleft-form-row">

                        <div class="row">

                            <div class="col l-6 m-12 c-12 mb-m-18">

                                <input type="text" name="regis-index-fullname" placeholder="Nhập họ và tên">

                            </div>

                            <div class="col l-6 m-12 c-12">

                                <input type="text" name="regis-index-phone" placeholder="Nhập số điện thoại">
                            </div>

                        </div>

                    </div>

                    <div class="wrapper-register__boxleft-form-row">

                        <div class="row">

                            <div class="col l-12 m-12 c-12">

                                <input type="text" name="regis-index-email" placeholder="Nhập email">


                            </div>

                        </div>

                    </div>

                    <div class="wrapper-register__boxleft-form-row wrapper-register__boxleft-form-row-mb30 mb-m-18">

                        <div class="row">

                            <div class="col l-12 m-12 c-12">

                                <textarea name="regis-index-content" cols="30" rows="5"
                                    placeholder="Nhập nội dung"></textarea>

                            </div>

                        </div>

                    </div>

                    <div class="wrapper-register__boxleft-form-row">
                        <button class="p-relative link_register wrapper-regis-btn">ĐĂNG KÍ</button>

                    </div>


                </div>

            </div>

        </div>

    </div>

</section>
<?php }?>