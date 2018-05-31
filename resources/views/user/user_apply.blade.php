@include('common.header')
@include('common.nav')
<link href="{{asset('static/css')}}/index-user_apply.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('static/vendor/webuploader/css')}}/webuploader.css" />
<link rel="stylesheet" type="text/css" href="{{asset('static/vendor/webuploader/css')}}/style.css" />
<link rel="stylesheet" type="text/css" href="{{asset('static/vendor/bootstrap_timer')}}/bootstrap-datetimepicker.css" />

<style>
    #legal_person_card_back .webuploader-pick , #legal_person_card_front .webuploader-pick{
         background: #fff;
         padding: 0px;
    }
</style>
<div class="container marketing">

    <hr class="featurette-divider-sm">

    <div class="mainContent">
        <div class="presNav">
            <div class="avatar"><img src="https://static1.aidingmao.com/boss/img/19a135e0-352f-11e7-80d3-77a198583c3a.png"></div>
            <p class="phone">{{$user_info['user_name']}}</p>
<!--            <div class="info"><p>账户信息</p>-->
<!--                <a class="J_navItem" href="#" id="personalNav">资料信息</a>-->
<!--                <a class="J_navItem" href="#" id="accountNav">账户资金</a>-->
<!--                <a class="J_navItem" href="#"  id="addrListNav">地址管理</a>-->
<!--            </div>-->
<!--            <div class="info"><p>订单中心</p>-->
<!--                <a class="J_navItem" href="#" id="orderListNav">订单列表</a>-->
<!--                <a class="J_navItem" href="#" id="repayNav">缴费计划</a>-->
<!--            </div>-->
        </div>
        <div class="authCard">
            <div class="pannelHead">网咖准入标准</div>
            <div class="pannelBody">
                <form id='submit_data'>
                <div class="stepContainer">
                    <div class="editContainer J_editContainer" style="display: block;">
                        <div class="companyEdit J_companyEdit" style="display: block;">
                            <table>
                                <tbody>
                                <tr>
                                    <input type="hidden" name="license_input" value=""/>
                                    <td class="textLeft height36 w180">营业执照<br />(复印件加盖公章)：</td>
                                    <td style="height:188px;"><img class="licenseImg" id="license_input_img" src="{{asset('static/img')}}/licenseImg.jpg">
                                        <div class="licenseBox"><p>只支持中国大陆工商局或市场监督管理局颁发的工商营业执照，</p>
                                            <p>且必须在有效期内。若办理过三证合一的企业，请再次上传最新</p>
                                            <p>的营业执照。格式要求：原件照片，支持.jpg .jpeg .bmp </p>
                                            <p>.gif .png格式照片，大小不超过5M。</p>
                                            <div id="license_input" class="webuploader_list" style="width:100px;">选择图片</div>
                                        </div>
                                    </td>
                                </tr>
<!--文化许可证-->
                                <tr>
                                    <input type="hidden" name="wenhua_input" value=""/>
                                    <td class="textLeft height36 w180">文化许可证<br />(复印件加盖公章)：</td>
                                    <td>
                                        <div class="picList clear uploader" id="wenhua_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="wenhua_input" style="position: relative; z-index: 1;width:100px;float:left">选择图片</label>
                                    </td>
                                </tr>
<!--消防合格证-->
                                <tr>
                                    <input type="hidden" name="xiaofang_input" value=""/>
                                    <td class="textLeft height36 w180">消防合格证<br />(复印件加盖公章)：</td>
                                    <td>
                                        <div class="picList clear uploader" id="xiaofang_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="xiaofang_input" style="position: relative; z-index: 1;width:100px;float:left">选择图片</label>
                                    </td>
                                </tr>
<!--宽带接入协议/证明-->
                                <tr>
                                    <input type="hidden" name="kuandai_input" value=""/>
                                    <td class="textLeft height36 w180">宽带接入协议/证明<br />(复印件加盖公章)：</td>
                                    <td>
                                        <div class="picList clear uploader" id="kuandai_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="kuandai_input" style="position: relative; z-index: 1;width:100px;float:left">选择图片</label>
                                    </td>
                                </tr>
<!--租房协议-->
                                <tr>
                                    <input type="hidden" name="zufang_input" value=""/>
                                    <td class="textLeft height36 w180">租房协议<br />(复印件加盖公章)：</td>
                                    <td>
                                        <div class="picList clear uploader" id="zufang_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="zufang_input" style="position: relative; z-index: 1;width:100px;float:left">选择图片</label>
                                    </td>
                                </tr>
<!--门头照片-->
                                <tr>
                                    <input type="hidden" name="mentou_input" value=""/>
                                    <td class="textLeft height36 w180">门头照片<br />(LOGO露出)：</td>
                                    <td>
                                        <div class="picList clear uploader" id="mentou_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="mentou_input" style="position: relative; z-index: 1;width:100px;float:left">选择图片</label>
                                    </td>
                                </tr>
<!--网咖内部环境照片-->
                                <tr>
                                    <input type="hidden" name="neibu_input" value=""/>
                                    <td class="textLeft height36 w180">网咖内部环境照片<br />(至少五张)：</td>
                                    <td>
                                        <div class="picList clear uploader" id="neibu_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="neibu_input" style="position: relative; z-index: 1;width:100px;float:left">选择图片</label>
                                    </td>
                                </tr>
<!--消防通道照片-->
                                <tr>
                                    <input type="hidden" name="xiaofangtongdao_input" value=""/>
                                    <td class="textLeft height36 w180">消防通道照片</td>
                                    <td>
                                        <div class="picList clear uploader" id="xiaofangtongdao_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="xiaofangtongdao_input" style="position: relative; z-index: 1;width:100px;float:left">选择图片</label>
                                    </td>
                                </tr>
<!--法人身份证正反面照片-->
                                <tr>
                                    <input type="hidden" name="legal_person_card_front" value=""/>
                                    <input type="hidden" name="legal_person_card_back" value=""/>
                                    <td class="textLeft height36 w180">法人身份证正反面照片：</td>
                                    <td>
                                        <div class="clear">
                                            <div class="frontSide">
                                                <label id="legal_person_card_front" class="webuploader_list"  style="position: relative; z-index: 1;">
                                                    <img id="legal_person_card_front_img" src="{{asset('static/img')}}/card_font.jpg">
                                                    <p>正面</p>
                                                </label>
                                            </div>
                                            <div class="endSide">
                                                <label id="legal_person_card_back" class="webuploader_list" style="position: relative; z-index: 1;">
                                                    <img id="legal_person_card_back_img" src="{{asset('static/img')}}/card_back.jpg">
                                                    <p>反面</p>
                                                </label>
                                            </div>
                                        </div>
                                        <p class="textAll mt10 mb10">格式要求：照片、扫描件或者加盖公章的复印件，支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p></td>
                                </tr>
<!--法人个人征信-->
                                <tr>
                                    <input type="hidden" name="zhengxin_input" value=""/>
                                    <td class="textLeft height36 w180">法人个人征信</td>
                                    <td>
                                        <div class="picList clear uploader" id="zhengxin_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="zhengxin_input" style="position: relative; z-index: 1;width:100px;float:left">选择图片</label>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="textLeft height36 w180">监控账号：</td>
                                    <td><input class="formControl input300" name="monitor_account" type="text" placeholder="设备价值大于15万需提供监控账号"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <button class="nextBtn" type="submit" >提交审核</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="billCover"></div>
    </div>

    <hr class="featurette-divider">

@include('common.footer_nav')
    <script src="{{asset('static/js')}}/jquery.min.js"></script>
    <script src="{{asset('static/vendor/bootstrap_timer')}}/bootstrap-datetimepicker.js"></script>
    <script src="{{asset('static/vendor/bootstrap_timer')}}/config.js"></script>
    <script src="{{asset('static/vendor/webuploader/js')}}/webuploader.js"></script>
    <script src="{{asset('static/vendor/webuploader/js')}}/index-config.js"></script>
    <script>
        window.onsubmit=function(){
            var msg = '';
            if($("input[name='license_input']").val() == '') msg = '请上传营业执照';
            else if($("input[name='wenhua_input']").val() == '') msg = '请上传文化许可证';
            else if($("input[name='xiaofang_input']").val() == '') msg = '请上传消防合格证';
            else if($("input[name='kuandai_input']").val() == '') msg = '请上传宽带接入协议/证明';
            else if($("input[name='zufang_input']").val() == '') msg = '请上传租房协议';
            else if($("input[name='mentou_input']").val() == '') msg = '请上传门头照片';
            else if($("input[name='neibu_input']").val() == '') msg = '请上传网咖内部环境照片';
            else if($("input[name='xiaofangtongdao_input']").val() == '') msg = '请上传消防通道照片';
            else if($("input[name='legal_person_card_front_input']").val() == '' || $("input[name='legal_person_card_back_input']").val() == '') msg = '请上传法人身份证正反面照片';
            else if($("input[name='zhengxin_input']").val() == '') msg = '请上传法人个人征信';

            if(msg != ''){
                alert(msg);
                return false;
            }
            else{
                ajaxCommon('userApply',$("#submit_data").serialize(),'post',applySuccess);
                return false;
            }
        }
        function applySuccess(data){
            alert(data.msg);
            window.location.href='/';
        }
    </script>
@include('common.footer')