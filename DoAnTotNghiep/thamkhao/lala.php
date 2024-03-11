<div class="page-header navbar navbar-fixed-top ">
        <div class="page-header-inner ">
            <div class="page-logo">
                <a href="#">
                    
                            <img src="/Content/AConfig/images/logo_dashboard.png" class="logo-default">

                    
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




    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-11"></div>
        </div>
        
<style>
    .login-with-social-btn:before {
        content: "";
        position: absolute;
        z-index: 2;
        top: 0px;
        left: 44px;
        height: 48px;
        width: 1px;
        background: linear-gradient(90deg,#aaa 50%,#f0f0f0 30%);
    }

    .login-with-social-btn {
        transition: background-color .3s, box-shadow .3s;
        width: 100%;
        position: relative;
        padding: 12px 30px 12px 62px;
        border: none;
        border-radius: 3px;
        box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);
        color: #222;
        font-size: 16px;
        font-weight: 400;
        font-family: Roboto,sans-serif;
        background-color: white;
        background-repeat: no-repeat;
        background-position: 12px center;
        margin-bottom: 15px;
    }

        .login-with-social-btn:hover {
            box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 2px 4px rgba(0, 0, 0, .25);
        }

        .login-with-social-btn:active {
            background-color: #eeeeee;
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAYAAACpF6WWAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAABRSURBVDiNY2CgAWBkYGBg+BSg9J+QQr4N9xjrdzEQVNfoxsDIRA2XoYNRQ0cNHQqAkYGBgYFhyXuCOYUhRpDx/07COYrRfTRHjRo6NAylCQAAN14NI2Qzu4kAAAAASUVORK5CYII=');
        }

        .login-with-social-btn:focus {
            outline: none;
            box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 2px 4px rgba(0, 0, 0, .25), 0 0 0 3px #c8dafc;
        }

    .login-with-microsoft-btn {
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAYAAACpF6WWAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAABRSURBVDiNY2CgAWBkYGBg+BSg9J+QQr4N9xjrdzEQVNfoxsDIRA2XoYNRQ0cNHQqAkYGBgYFhyXuCOYUhRpDx/07COYrRfTRHjRo6NAylCQAAN14NI2Qzu4kAAAAASUVORK5CYII=') !important;
    }

    .login-with-google-btn {
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAMAAACeyVWkAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACu1BMVEX///////7//Pz//f3++fj//v7//v397Ov2rKbwe3HtY1fsWk3tYVXweG71qKL96un0oZrrSjzoNSbpOCnpPS/qPzHpPi/pOCrqSDr1o5z/+/v++fnvdGnoMyTqQTPrSTvqRjjpPC3qPzDrSDvqRTfnKBjzmpP//fzoNCXrSDrpOSvpPjDtW0/uaV7tXE/vb2T98vHzm53oNCTqRDfpOSrvdmv61tP++vr++/r72NXvbmTua2D++/v//OTxeSnpOjbqRTnpOSnykIj+/v/9/v/+///9/P389/j94ZD8vgD1kR7pOyvuaWL///38z077twD9yAf2mgX6zr///Pvp8f7P4PzT4/3S4vzS4fzS4v3T4/zt9P7//vz8xy77ugD7ugT8xRL//en8/f+ewPkvefNBhPQ9gvRAhPSiw/n//fb7xCP7uwD5wiP9/Piiw/o4fvNJifRGh/RGiPREhvRDhfQ1ffOWvPn4uwT/wRD/+uj9//+avvkmc/I5f/M2ffM0fPM8gfRDhvRFh/Sbv/n80E/5uAD/vwTIswzO5sb8/fvW5PymxfquyvqqyPq0zvp6qfc6gPRHiPSwzPr/uACxtikspEtcunv8/vx2pvfV5Pz/+OKJsjknplY1qVcqo0mHzJr9/f+lw/43fvFdl/X9/vyP064loUQ6qlc1qVQpo0pqv4HS7Nn6/fv8/f3f8uKEyJ85h9ZDgv9HiPMze/Npv38koUU5qlc3qVYppEovpk5Os2leunZRtWw0qFQno0U2qFlDk8I0evlxpPb9/v75/Pppvn8joUUyp1E6q1gwpk8spU0vpk82qVU7qlo0qVAjoj9hqrj09v/9/v2a06k7q1kloUYoo0kupU4wplAupk4yp1KJzJv8//Pr9u6l2LNwwoZWt3BMsmhTtW2Z06nf8eT4/Pn7/fz8/v3+//5PFEZOAAAAAWJLR0QAiAUdSAAAAAd0SU1FB+ULEAc5JnRSWN0AAAGVSURBVBjTY2AAAkYmIMHMAiKZWBmggI2BgZ2Dk4ubh5ePH6gEIsjMwCAgKCQsIiomLiQhKQVTKS0jKyevIKqopKCsoqrGoA4UBJojo6GpoKWto6unrSisbwASYWBiMDTSNDYxNTNnsLC0srYBGQgEtnb2Do5OQIazi6ubu6ubi4szkOPh6eXtA9QDZPtCXeDKwODnHxAYxBDsyhASGhYeERkeFRrNwBATGxefkMjAmMSQnJKaBgTpKRkMDJlZcdk5uSDRvPyCwqLiksLSMrDa8orKKqBodU1tXX1DY1N9M9Dolta29g6GTmeGru6e3r7+CRPrJ4HcMHnK1GkMDNOBbmD0ZZhR29QwE+iKWbPnzJ03HyjtsoCBYeGiwobFLgwMSxiWLlu+YuWq1WsY1q5bv2Hjps2TGJJALt6yddv2HTt37d6zd9/+AwcPgX18mOHI0WPHT2w/eer0mbPnzl+46AvyMcMlBobLV65eu37j5sqrt27fASqDqma4e+/+g4ePVj1+wgATBLpjOkjL02dA8vkLkAAAfCh/yEaJBysAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjEtMTEtMTZUMDc6NTc6MzMrMDA6MDAsmbeWAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIxLTExLTE2VDA3OjU3OjMzKzAwOjAwXcQPKgAAAABJRU5ErkJggg==') !important;
    }
</style>
<script src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>
    <div class="row h-100 pt-5">

        <div class="col-lg-8 col-md-7 col-12 slide-left">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/Content/login2/img/slide1.png" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/Content/login2/img/slide2.png" alt="">
                        </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>


        <div class="col-lg-4 col-md-5 col-12">
            <div class="logo-top">
                <ul class="d-flex flex-column bd-highlight mb-3 mg-0">
                    <li class="p-2 bd-highlight logo-hd">
                        
                                <img src="/Content/AConfig/images/eoffice-login.png">

                        
                    </li>
                    <li class="p-2 bd-highlight name-hd"><h1>ĐĂNG NHẬP HỆ THỐNG</h1></li>
                </ul>
            </div>

<form action="/login.html" autocomplete="new-password" class="form-login" data-ajax="true" data-ajax-failure="onAjaxFailure" data-ajax-loading="#ajaxLoading" data-ajax-success="onAjaxSuccess" id="form-login" method="post"><input name="__RequestVerificationToken" type="hidden" value="IO77AG_aPYcx6Pekm81ZN4JorPq_vgnpZ3WPk5d6txRkCxIjIcUJd_HifI9BypGG-oBr8OAXKqaIKelet1HF_6kYWjejs-S3TM_K3xtiIY81"><input id="rQuery" name="rQuery" type="hidden" value=""><input id="SSOData" name="SSOData" type="hidden" value="">                <input asp-for="ReturnUrl" type="hidden">
                <div class="form-group">

                    <div class="input-group mb-2">

                        <input autocomplete="new-password" class="form-control" data-val="true" data-val-length="The field Tên đăng nhập must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Nhập tên đăng nhập" id="UserName" name="UserName" placeholder="Nhập tên đăng nhập" required="required" type="text" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2">

                        <input autocomplete="new-password" class="form-control" data-val="true" data-val-required="Nhập mật khẩu" id="Password" name="Password" placeholder="Nhập mật khẩu" required="required" type="password">
                    </div>
                </div>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="box-captcha"><style>.box-captcha{position:relative;height:37px}.box-captcha br{display:none}.box-captcha img{height:37px;position:absolute;top:0;left:160px}.box-captcha input{height:37px;position:absolute;left:0;top:0;width:125px;text-align:center}.box-captcha a{position:absolute;background:url(/Content/images/refresh.png) no-repeat;left:129px;top:7px;height:24px;width:24px;cursor:pointer;text-indent:-99965px;display:inherit!important}</style><div class="captchaContainer_65f0f"><img border="0" class=" captcha-input imgcaptcha_65f0f" float="left" href="javascript:void(0)" id="newcaptcha" src="/WebCommon/GetCaptcha" style="padding-right: 5px; max-height: 35px"></div><input class="captcha-input txtcaptcha_65f0f" id="Captcha" name="Captcha" placeholder="Nhập mã" type="text"><a href="javascript:void(0)" class="captcharefresh refreshNewCaptcha_65f0f"></a><script>$(function(){$('.refreshNewCaptcha_65f0f').click(function(e){var a=$('.imgcaptcha_65f0f'),n=a.attr('src');n=n.replace(/(.*?)\?r=\d+\.\d+$/,'$1'),'undefined'!=typeof console&&console.log(n);var c=new Image;$(c).load(function(){a.prev('.captchaContainer_65f0f').empty().append(c)}),$('.imgcaptcha_65f0f').attr('src',n+'?r='+Math.random()),e.preventDefault()})});</script></div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                <br>
                    <button type="submit" class="btn btn-primary btn-100">Đăng nhập</button>
                <br><br>
                <br>
                        <div style="color: #363636; font-size: 6pt; text-align: right">ver: 20231101</div>
<div class="message-notification">
    <div id="flash-messages" class="alert-message" style="display:none;">
         <div class="img-massage-box"><p></p></div>
        <a class="close" href="#">
            <img src="/Content/login/images/close.png" title="Close" alt="close">
        </a>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#flash-messages").flashMessage();
    });
</script></form>
        </div>
    </div>

<script type="text/javascript">
    var _0x2850 = ['click', 'preventDefault', 'submit', 'length', '#msg-login-fail', '<div\x20class=\x22k-callout\x20k-callout-n\x22></div></div>', '#div-errors', 'append', 'toggleClass', 'hide', 'show', 'keypress', 'btnLogin', '/Common/GetPrivateKey', 'get', 'val', 'ajax', 'getElementById', 'e84ad660c4721ae0e84ad660c4721ae0', 'parse', 'Hex', 'enc', 'Utf8', 'CryptographyPMT-EMS', 'mode', 'Pkcs7', 'pad', 'value', 'ciphertext', 'PBKDF2', 'toString', 'Base64', 'ready', '#form-login', 'css', 'border', '1px\x20solid\x20#ccc', '#Password', 'css', '#UserName', '1px\x20solid\x20red', 'UserName', 'function', 'trigger', '#btnLogin']; (function (_0x10e5ab, _0x1325fb) { var _0xcd89cd = function (_0x3e77ff) { while (--_0x3e77ff) { _0x10e5ab['push'](_0x10e5ab['shift']()); } }; _0xcd89cd(++_0x1325fb); }(_0x2850, 0xde)); var _0x50b8 = function (_0x323a59, _0x32df89) { _0x323a59 = _0x323a59 - 0x0; var _0x55aa14 = _0x2850[_0x323a59]; return _0x55aa14; }; function triggerOnEnter(_0x115e37, _0x4f3899, _0x9a95b9) { if (_0x115e37['keyCode'] == 0xd) { if (typeof _0x9a95b9 != _0x50b8('0x0')) { $('#' + _0x4f3899)[_0x50b8('0x1')](_0x9a95b9); } else { _0x9a95b9(); } } } $(_0x50b8('0x2'))[_0x50b8('0x3')](function (_0x32630d) { _0x32630d[_0x50b8('0x4')](); $('#form-login')[_0x50b8('0x5')](); }); function onAjaxFailure(_0x4343b6) { showDefaultErrorMessage(); } function onAjaxSuccess(_0x53be0e) { var _0x2930fa = getErrors(_0x53be0e); if (_0x2930fa[_0x50b8('0x6')] > 0x0) { if ($(_0x50b8('0x7'))[_0x50b8('0x6')] == 0x0) { var _0x3a3db6 = '<div\x20class=\x22k-invalid-msg\x20field-validation-error\x20hide\x22\x20style=\x22display:\x20block;\x22\x20id=\x22msg-login-fail\x22\x20role=\x22alert\x22>\x20' + _0x2930fa + _0x50b8('0x8'); $(_0x50b8('0x9'))[_0x50b8('0xa')](_0x3a3db6); } $(_0x50b8('0x7'))[_0x50b8('0xb')](_0x50b8('0xc'), ![])[_0x50b8('0xd')](); $(_0x50b8('0x7'))['html'](_0x2930fa); } else { location['href'] = ''; } } $('#UserName\x20,\x20#Password')['on'](_0x50b8('0xe'), function (_0x544b45) { if (this['value'] != '') { triggerOnEnter(_0x544b45, _0x50b8('0xf'), 'click'); } }); var _0x6100 = ['', _0x50b8('0x10'), _0x50b8('0x11'), _0x50b8('0x12'), '#', _0x50b8('0x13'), _0x50b8('0x14'), _0x50b8('0x15'), _0x50b8('0x16'), _0x50b8('0x17'), _0x50b8('0x18'), _0x50b8('0x19'), _0x50b8('0x1a'), 'CBC', _0x50b8('0x1b'), _0x50b8('0x1c'), _0x50b8('0x1d'), 'encrypt', 'AES', _0x50b8('0x1e'), _0x50b8('0x1f')]; function GetPrivateKey(_0x1bd14c, _0x340599) { var _0x27f4ba = _0x6100[0x0]; $[_0x6100[0x5]]({ 'url': _0x6100[0x1], 'type': _0x6100[0x2], 'data': { 'salt': $(_0x6100[0x4] + _0x340599)[_0x6100[0x3]]() }, 'success': function (_0xe2d567) { _0x27f4ba = _0xe2d567; }, 'async': ![] }); return _0x27f4ba; } function PMTEncryptData(_0x4bd137, _0x58954) { var _0x4fec52 = $(_0x6100[0x4] + _0x58954)[_0x6100[0x3]](); var _0x32c2a1 = document[_0x6100[0x6]](_0x58954); var _0x167640 = $(_0x6100[0x4] + _0x4bd137)[_0x6100[0x3]](); try { var _0x14014c = CryptoJS[_0x6100[0xa]][_0x6100[0x9]][_0x6100[0x8]](_0x6100[0x7]); var _0x2c9ec6 = CryptoJS[_0x6100[0xa]][_0x6100[0xb]][_0x6100[0x8]](GetPrivateKey(_0x167640, _0x4bd137)); var _0x4d598c = CryptoJS[_0x6100[0xa]][_0x6100[0xb]][_0x6100[0x8]](_0x6100[0xc]); var _0x5638c7 = CryptoJS[_0x50b8('0x20')](_0x2c9ec6[_0x50b8('0x21')](CryptoJS[_0x6100[0xa]][_0x50b8('0x19')]), _0x4d598c, { 'keySize': 0x80 / 0x20, 'iterations': 0x3e8 }); var _0x8d121f = CryptoJS[_0x6100[0x12]][_0x6100[0x11]](_0x4fec52, _0x5638c7, { 'mode': CryptoJS[_0x6100[0xe]][_0x6100[0xd]], 'iv': _0x14014c, 'padding': CryptoJS[_0x6100[0x10]][_0x6100[0xf]] }); _0x32c2a1[_0x6100[0x13]] = _0x8d121f[_0x6100[0x14]][_0x50b8('0x21')](CryptoJS[_0x6100[0xa]][_0x50b8('0x22')]); } catch (_0x2ca10d) { return _0x6100[0x0]; }; } $(document)[_0x50b8('0x23')](function () { $(_0x50b8('0x24'))['submit'](function () { var _0x3707c1 = 0x0; $('#UserName')[_0x50b8('0x25')](_0x50b8('0x26'), _0x50b8('0x27')); $(_0x50b8('0x28'))[_0x50b8('0x29')]('border', _0x50b8('0x27')); if ($(_0x50b8('0x2a'))[_0x50b8('0x12')]() == '') { $(_0x50b8('0x2a'))['css'](_0x50b8('0x26'), '1px\x20solid\x20red'); _0x3707c1 = 0x1; } if ($('#Password')['val']() == '') { $('#Password')[_0x50b8('0x29')]('border', _0x50b8('0x2b')); _0x3707c1 = 0x1; } if (_0x3707c1 == 0x1) { return ![]; } PMTEncryptData(_0x50b8('0x2c'), 'Password'); }); });
    if (typeof (Storage) !== "undefined") {
        var storageKey = 'tabs';
        localStorage.removeItem(storageKey);
        localStorage.toggledUL = "";
        localStorage.removeItem("auth_token");
        localStorage.removeItem("auth_user_info");
        localStorage.removeItem("auth_user_id");
    }
    $(function () {
        $('#UserName').focus();
    });
</script>

    </div>



    --------------------------------------------------------
    <div class="row">
                            <div class="col-md-6">
                                <div class="box-card">
                                    <div class="card-content bt-mailbox badge_dashboard_mail">
                                        <div class="clearfix">
                                            <div class="float-right">
                                                <i class="fa fa-envelope-o icon" aria-hidden="true"></i>
                                            </div>
                                            <div class="float-left">
                                                <a class="txt" href="javascript:" onclick="createTab('Hộp thư', '/MailBox/HopThu', 47, false);">Hộp thư</a>

                                                <h3 class="number">24</h3>

                                            </div>
                                        </div>
                                        <a href="javascript:" onclick="createTab('Hộp thư', '/MailBox/HopThu', 47, false);">
                                            <p class="text-muted">
                                                Vào hộp thư
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-md-6">
                                <div class="box-card">
                                    <div class="card-content bt-notify badge_dashboard_thongbao">
                                        <div class="clearfix">
                                            <div class="float-right">
                                                <i class="fa fa-bullhorn icon" aria-hidden="true"></i>
                                            </div>
                                            <div class="float-left">
                                                <a class="txt" href="javascript:" onclick="createTab('Thông báo', '/ThongBao/ThongBao', 46, false);">Thông báo</a>
                                                <h3 class="number">280</h3>

                                            </div>
                                        </div>
                                        <a href="javascript:" onclick="createTab('Thông báo', '/ThongBao/ThongBao', 46, false);">
                                            <p class="text-muted">
                                                Xem thông báo
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        



                            <div class="col-md-6">
                                <div class="box-card">
                                    <div class="card-content bt-notify badge_dashboard_dsks">
                                        <div class="clearfix">
                                            <div class="float-right">
                                                <i class="ascvn-write"></i>
                                            </div>
                                            <div class="float-left">
                                                <a class="txt" href="javascript:" onclick="createTab('Phiếu khảo sát', '/giang-vien/khao-sat.html?pIsDaKhaoSat=false', 50, false);">Phiếu khảo sát</a>
                                                <h3 class="number">0</h3>
                                            </div>
                                        </div>
                                        <a href="javascript:" onclick="createTab('Phiếu khảo sát', '/giang-vien/khao-sat.html?pIsDaKhaoSat=false', 50, false);">
                                            <p class="text-muted">
                                                Xem danh sách
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                                                                                                    <div class="col-md-12">

    <div class="dashboard-tabs">
        <div class="dashboard-tabs-head">
            <h3 class="dashboard-tabs-title">
                Công việc gần đến hạn             </h3>
            <div class="dashboard-tabs-options">
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown" data-display="static" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="dashboard-tabs-body nicescroll-cl bangcongtac " tabindex="1" style="overflow: hidden; outline: none;">
            <div class="scroller" style="height:259px !important; overflow-y:auto;" data-always-visible="1" data-rail-visible="0">
                    <div>
                        <i class="checker" style="background-color:rgb(194 223 255)"></i> <label style="padding-right: 30px !important">Hoàn thành</label>
                        <i class="checker" style="background-color:rgb(227 183 235);"></i> <label>Chưa hoàn thành</label>
                    </div>
                    <table class="table table-striped table-bordered my-md-2 w-100" id="grid-lct">
                        <thead>
                            <tr>
                                <th class="tb_head tgian" scope="col" style="width:10%">STT</th>
                                <th class="tb_head" scope="col" style="width:60%">Tên công việc</th>
                                <th class="tb_head w-25" scope="col" style="width:150px">Hạn xử lý còn lại</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td colspan="3" style="text-align:center">
                                        <p>Chưa có công việc gần đến hạn</p>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <script>
        $(document).ready(function () {
            /*console.log(($(".box-short-content-giaoviec").text()).length);*/
            $(".box-short-content-giaoviec").shorten({ showChars: 250 });
        });
    </script>

                            </div>

                    </div>