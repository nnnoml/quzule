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

    <hr class="featurette-divider">

    <div class="mainContent">
        <div class="presNav">
            <div class="avatar"><img src="https://static1.aidingmao.com/boss/img/19a135e0-352f-11e7-80d3-77a198583c3a.png"></div>
            <p class="phone">{{$user_info['user_name']}}</p>
            <div class="info"><p>账户信息</p>
                <a class="J_navItem" href="#" id="personalNav">资料信息</a>
                <a class="J_navItem" href="#" id="accountNav">账户资金</a>
                <a class="J_navItem" href="#"  id="addrListNav">地址管理</a>
            </div>
            <div class="info"><p>订单中心</p>
                <a class="J_navItem" href="#" id="orderListNav">订单列表</a>
                <a class="J_navItem" href="#" id="repayNav">缴费计划</a>
            </div>
        </div>
        <div class="authCard">
            <div class="pannelHead">认证中心</div>
            <div class="pannelBody">
                <form id='submit_data'>
                <div class="stepContainer">
                    <div class="editContainer J_editContainer" style="display: block;">
                        <div class="companyEdit J_companyEdit" style="display: block;">
                            <table>
                                <tbody>
                                <tr>
                                    <td class="textLeft height36 w180">企业名称：</td>
                                    <td><input class="formControl input300" name="comp_name" type="text" placeholder="跟营业执照上的企业名称一致"></td>
                                </tr>
                                <tr>
                                    <td class="textLeft height36 w180">工商执照注册号：</td>
                                    <td><input class="formControl input300" name="comp_reg_num" text="text" placeholder="三证合一后18位的统一社会信用代码"></td>
                                </tr>
                                <tr>
                                    <td class="textLeft height36 w180">注册时间：</td>
                                    <td><input class="timeBox input300 datepicker timeIcon" data-date="" data-date-format="yyyy-mm-dd"
                                               data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" name="comp_reg_time" type="text"
                                               readonly="" id="reg_time" placeholder="务必与营业执照一致"></td>
                                </tr>
                                <tr>
                                    <input type="hidden" name="license_input" value=""/>
                                    <td class="textLeft height36 w180">营业执照：</td>
                                    <td style="height:188px;"><img class="licenseImg" id="license_img" src="https://static1.aidingmao.com/boss/img/114fba30-1a6b-11e7-a1a3-17a6d0e2b19f.jpg">
                                        <div class="licenseBox"><p>只支持中国大陆工商局或市场监督管理局颁发的工商营业执照，</p>
                                            <p>且必须在有效期内。若办理过三证合一的企业，请再次上传最新</p>
                                            <p>的营业执照。格式要求：原件照片，支持.jpg .jpeg .bmp </p>
                                            <p>.gif .png格式照片，大小不超过5M。</p>

                                            <div id="license" class="webuploader_list" style="width:100px;">选择图片</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="textLeft height36 w180"><p>法人姓名：</p></td>
                                    <td><input class="formControl input300" name="legal_person_name" type="text" placeholder="请输入正确的法人姓名"></td>
                                </tr>
                                <tr>
                                    <td class="textLeft height36 w180">法人身份证号：</td>
                                    <td><input class="formControl input300" name="legal_person_id" type="text" placeholder="请输入正确的法人身份证号"></td>
                                </tr>
                                <tr>
                                    <input type="hidden" name="legal_person_card_front_input" value=""/>
                                    <input type="hidden" name="legal_person_card_back_input" value=""/>
                                    <td class="textLeft height36 w180">法人身份证正反面照片：</td>
                                    <td>
                                        <div class="clear">
                                            <div class="frontSide">
                                                <label id="legal_person_card_front" class="webuploader_list"  style="position: relative; z-index: 1;">
                                                    <img id="legal_person_card_front_img" src="https://static1.aidingmao.com/boss/img/1180b540-1a6b-11e7-a1a3-17a6d0e2b19f.jpg">
                                                    <p>正面</p>
                                                </label>
                                            </div>
                                            <div class="endSide">
                                                <label id="legal_person_card_back" class="webuploader_list" style="position: relative; z-index: 1;">
                                                    <img id="legal_person_card_back_img" src="https://static1.aidingmao.com/boss/img/11832640-1a6b-11e7-a1a3-17a6d0e2b19f.png">
                                                    <p>反面</p>
                                                </label>
                                            </div>
                                        </div>
                                        <p class="textAll mt10 mb10">格式要求：照片、扫描件或者加盖公章的复印件，支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p></td>
                                </tr>
                                <tr>
                                    <input type="hidden" name="area_img_input" value=""/>
                                    <td class="textLeft height36 w180">经营场地租赁合同：</td>
                                    <td>
                                        <div class="picList clear" id="uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">
                                            自有的房产提供房产证或者购房合同，租赁的提供租赁合同。支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="area_img" style="position: relative; z-index: 1;width:100px;float:left">选择图片</label>
                                    </td>

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
            if($("input[name='comp_name']").val() == '') msg = '企业名称必填';
            else if($("input[name='comp_reg_num']").val() == '') msg = '工商执照注册号必填';
            else if($("input[name='comp_reg_time']").val() == '') msg = '注册时间必填';
            else if($("input[name='license_input']").val() == '') msg = '请上传营业执照';
            else if($("input[name='legal_person_name']").val() == '') msg = '法人姓名必填';
            else if($("input[name='legal_person_id']").val() == '') msg = '法人身份证必填';
            else if($("input[name='legal_person_card_front_input']").val() == '' || $("input[name='legal_person_card_back_input']").val() == '') msg = '请上传法人身份证正反面照片';
            else if($("input[name='area_img_input']").val() == '') msg = '请上传经营场地租赁合同';

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