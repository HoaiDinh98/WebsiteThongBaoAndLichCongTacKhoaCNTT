<?php
 require 'init.php';
?>
<?php include 'header.php' ;?>  

<div class="page-header navbar navbar-fixed-top ">
        <div class="page-header-inner ">
            <div class="page-logo">
                <a href="#">
                    
                            <img src="image/home_img1.png" class="logo-default">

                    
                </a>
            </div>
            <a href="javascript:;" class="menu-toggler menu-toggler-top responsive-toggler" data-toggle="collapse" data-target=".page-sidebar-top">
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </a>
            <div class="menu-top-left">
                <div class="navbar-collapse collapse  page-sidebar-top" aria-expanded="false">
                    <ul class="nav navbar-nav">
                            <li>
                                <a class="badge_thongbao" href="javascript:" onclick="createNewTab('Thông báo', '/ThongBao/ThongBao', 46, false);">
                                    Thông báo
                                <span class="badge badge-danger"> 276 <span></span></span></a>
                            </li>
                                                    <li class="dropdown">
                                    <a class="badge_lichcongtac_all" href="javascript:" data-toggle="dropdown">
                                        Lịch công tác
                                    </a>
                                    <ul class="dropdown-menu">
                                            <li>
                                                <a class="badge_lichcongtac_chung" href="javascript:" onclick="createNewTab('Lịch công tác chung', '/LichCongTac/Lich', 48, false);">
                                                    Lịch công tác chung
                                                </a>
                                            </li>
                                                                                                                            <li>
                                                <a class="badge_lichcongtac_phongban" href="javascript:" onclick="createNewTab('Lịch công tác phòng ban', '/LichCongTac/LichPhongBan', 1172, false);">
                                                    Lịch công tác phòng ban
                                                </a>
                                            </li>
                                                                                                                            <li>
                                                <a class="badge_lichcongtac_canhan" href="javascript:" onclick="createNewTab('Lịch cá nhân', '/LichCongTac/LichCaNhan', 1173, false);">
                                                    Lịch cá nhân
                                                </a>
                                            </li>
                                                                            </ul>
                            </li>
                                                    <li>
                                <a class="badge_thuden" href="javascript:" onclick="createNewTab('Hộp thư', '/MailBox/HopThu', 47, false);">
                                    Hộp thư
                                <span class="badge badge-danger"> 23 <span></span></span></a>
                            </li>
                                                                                                                                                                                                                    </ul>
                </div>
            </div>
            <div class="top-menu">
                <a href="javascript:;" class="menu-toggler responsive-toggler pull-left" data-toggle="collapse" data-target=".page-sidebar-right">
                    <span></span>
                </a>

                <ul class="nav navbar-nav pull-right">




                    <li class="dropdown dropdown-extended dropdown-notification" id="asc_header_notification_bar">

<a id="a-bell" style="" href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
    <i class="icon-bell"></i>
    <span class="badge badge-danger" id="countThongBao">299</span>
</a>
<ul class="dropdown-menu">

    <li class="external">
        <h3>
            <span class="bold" id="countThongBao1">299</span> thông tin chưa xem
        </h3>
    </li>
    <li>
        <ul class="dropdown-menu-list scroller" style="height:250px; overflow-y: auto" data-handle-color="#637283">
                        <li class="head_noti_47">
                            <a href="javascript:;" onclick="createNewTab('Hộp thư', '/MailBox/HopThu', 47, false);">
                                <span class="time"><b style="font-size:15px;color:red">23</b></span>
                                <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-envelope"></i>
                                    </span>Hộp thư
                                    <div></div>
                                </span>

                            </a>
                        </li>
                        <li class="head_noti_46">
                            <a href="javascript:;" onclick="createNewTab('Thông báo', '/ThongBao/ThongBao', 46, false);">
                                <span class="time"><b style="font-size:15px;color:red">276</b></span>
                                <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-bell"></i>
                                    </span>Thông báo
                                    <div></div>
                                </span>

                            </a>
                        </li>
                            
                    

                
        </ul>
    </li>


</ul>
        <script>
            $(document).ready(function () {
                var tongText = $("#countThongBao1").text().trim();
                if (tongText == "0" || tongText == undefined || tongText == "") {
                    tongText = '0';
                }
                var tongInt = parseInt(tongText);
                var newTongInt = tongInt + 299;
                $("#a-bell").show();
                $("#countThongBao").text(newTongInt);
                $("#countThongBao1").text(newTongInt);

                                                                                                                                                setTimeout(function () {
$('.badge_dashboard_mail .number').html(23);                            $('.badge_dashboard_thongbao .number').html(276);
                        }, 100);
            });
        </script>
</li>

                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                            
                                <span class="alphabet-avatar bg-yellow-crusta">Ý </span>
                                <span class="username username-hide-on-mobile"> Trần Như Ý </span>



                            <i class="fa fa-angle-down"></i>
                        </a>
                        <style>

                            .menu-info li a {
                                display: flex;
                                padding: 2px 8px;
                                align-items: center;
                                transition: all ease-in-out .3s;
                            }

                                .menu-info li a.gen-pass, .menu-info li a.gen-pass-edu {
                                    border-bottom: 1px dashed #d9d9d9;
                                }

                            .menu-info .gen-pass .clock_wrapper, .menu-info .gen-pass-edu .clock_wrapper {
                                position: relative;
                                width: 30px;
                                height: 30px;
                            }

                            .menu-info .gen-pass span, .menu-info .gen-pass-edu span {
                                display: flex;
                                align-items: center;
                                padding-left: 5px;
                            }

                            .menu-info .gen-pass .clock_wrapper #clock, .menu-info .gen-pass-edu .clock_wrapper #clock-edu {
                                position: relative;
                                width: 30px;
                            }

                            .menu-info .gen-pass .clock_wrapper #timer, .menu-info .gen-pass-edu .clock_wrapper #timer-edu {
                                position: absolute;
                                top: 0;
                                left: 0;
                                padding-top: 6px;
                                font-size: 9px;
                                width: 28px;
                                text-align: center;
                                transition: opacity 350ms linear 0s;
                                -webkit-transition: opacity 350ms linear 0s;
                            }

                            .menu-info .gen-pass .half_opacity, .menu-info .gen-pass-edu .half_opacity {
                                opacity: 0.5;
                            }

                            .page-header.navbar .top-menu .navbar-nav > li.dropdown-user .dropdown-menu > li > a i {
                                width: 30px;
                                height: 30px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin-right: 5px;
                                font-size: 15px;
                            }

                            .menu-info li a:hover .fa-hashtag {
                                color: #43d232;
                            }

                            .menu-info li a:hover .icon-refresh {
                                color: #ff8d2c;
                            }

                            .menu-info li a:hover .icon-info, .menu-info li a:hover .fa-building {
                                color: #03a0eb;
                            }

                            .menu-info li a:hover .fa-key {
                                color: #dfc300;
                            }

                            .menu-info li a:hover .fa-sign-out {
                                color: #ff0000;
                            }

                            .menu-info li a:hover .icon-lock {
                                color: #3ab794;
                            }

                            .menu-info li a:hover .fa-code {
                                color: #00a139;
                            }
                        </style>
                        <ul class="dropdown-menu dropdown-menu-default menu-info">




                            <li>
                                <a href="javascript:;" onclick="clearCacheSystem()">
                                    <i class="icon-refresh"></i> Xóa cache
                                </a>
                            </li>
                                <li>
                                    <a onclick="$('[id=gridIDCapNhatMatKhau').gridPopupEditor('popupAddUpdatePassword', '/ASecurity/ChangePassword', 'Cập nhật mật khẩu')" href="javascript:void(0);">
                                        <i class="fa fa-key"></i> Đổi mật khẩu
                                    </a>
                                </li>

                                                            <li>
                                    <a onclick="$('[id=gridIDCapNhatAlias').gridPopupEditor('popupAddUpdateAlias', '/ASecurity/ChangeAlias', 'Thay đổi bí danh')" href="javascript:void(0);">
                                        <i class="icon-lock"></i> Thay đổi bí danh
                                    </a>
                                </li>
                            <li>
                                <a onclick="$('[id=gridChangeThongTinNguoiDung').gridPopupEditor('popupAddUpdatePassword', '/ASecurity/ChangeThongTinNguoiDung', 'Thay đổi thông tin')" href="javascript:void(0);">
                                    <i class="icon-info"></i> Thay đổi thông tin
                                </a>
                            </li>
                            

                            <li>
                                <a href="/ASecurity/Logout">
                                    <i class="fa fa-sign-out"></i> Đăng xuất
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li class="dropdown search-box" style="padding:0">
                        <a title="Tìm kiếm màn hình (ALT + Q)" class="dropdown-toggle" style="color: #6BA1D1; padding-right:10px" href="javascript:;" onclick="openSearchMenu();">
                            <i class="glyphicon glyphicon-search"></i>
                        </a>
                    </li>
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="/ASecurity/Logout" class="dropdown-toggle">
                            <i class="icon-paper-plane"></i>
                        </a>
                    </li>
                </ul>





            </div>
        </div>

    </div>

<?php  include 'footer.php'?>