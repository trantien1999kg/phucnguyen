<header class="wrapper-header pt10 pb10 scroll-fixed d-none-m d-none-tablet d-none-tl <?php if($source!='index'){echo 'box-shadown-tpl';} ?>">

    <div class="grid wide">

        <div class="row align-items-center">

            <div class="col-4 item">

                <div class="wrapper-header__logo">

                    <a href="" class="p-relative ratio-img" img-width="198" img-height="81">

                        <img src="./assets/images/loading_image.svg" data-src="<?=_upload_hinhanh_l.$logo["photo"]?>" alt="Logo trang chủ" class="ratio-img__content img-scale">


                    </a>

                </div>

            </div>

            <div class="col-8 item">

                <?php include_once _layouts."menu.php";  ?>

            </div>

        </div>

    </div>

</header>