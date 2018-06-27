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

        </div>
        <div class="authCard">
            <div class="pannelHead">网咖准入标准 补充资料</div>
            <div class="pannelBody">
                <form id='submit_data'>
                <div class="stepContainer">
                    <div class="editContainer J_editContainer" style="display: block;">
                        <div class="companyEdit J_companyEdit" style="display: block;">
                            <table>
                                <tbody>
<!--文化许可证-->
                                @if(empty($has_file['wenhua_input']))
                                <tr>
                                    <input type="hidden" name="wenhua_input" value=""/>
                                    <td class="textLeft height36 w180">文化许可证扫描件<br />(复印件加盖公章)：</td>
                                    <td>
                                        <div class="picList clear uploader" id="wenhua_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="wenhua_input" style="position: relative; z-index: 1;width:100px;float:left">选择扫描件</label>
                                    </td>
                                </tr>
                                @endif
<!--消防合格证-->
                                @if(empty($has_file['xiaofang_input']))
                                <tr>
                                    <input type="hidden" name="xiaofang_input" value=""/>
                                    <td class="textLeft height36 w180">消防合格证扫描件<br />(复印件加盖公章)：</td>
                                    <td>
                                        <div class="picList clear uploader" id="xiaofang_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="xiaofang_input" style="position: relative; z-index: 1;width:100px;float:left">选择扫描件</label>
                                    </td>
                                </tr>
                                @endif
<!--网络监察证-->
                                @if(empty($has_file['wangjian_input']))
                                <tr>
                                    <input type="hidden" name="wangjian_input" value=""/>
                                    <td class="textLeft height36 w180">网络监察证描件<br />(复印件加盖公章)：</td>
                                    <td>
                                        <div class="picList clear uploader" id="wangjian_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="wangjian_input" style="position: relative; z-index: 1;width:100px;float:left">选择扫描件</label>
                                    </td>
                                </tr>
                                @endif
<!--其他资料1-->
                                @if(empty($has_file['other1_input']))
                                <tr>
                                    <input type="hidden" name="other1_input" value=""/>
                                    <td class="textLeft height36 w180">其他资料1<br />(非必填)</td>
                                    <td>
                                        <div class="picList clear uploader" id="other1_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="other1_input" style="position: relative; z-index: 1;width:100px;float:left">选择图片</label>
                                    </td>
                                </tr>
                               @endif
<!--其他资料2-->
                            @if(empty($has_file['other2_input']))
                                <tr>
                                    <input type="hidden" name="other2_input" value=""/>
                                    <td class="textLeft height36 w180">其他资料2<br />(非必填)</td>
                                    <td>
                                        <div class="picList clear uploader" id="other2_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="other2_input" style="position: relative; z-index: 1;width:100px;float:left">选择图片</label>
                                    </td>
                                </tr>
                            @endif
<!--其他资料3-->
                            @if(empty($has_file['other3_input']))
                                <tr>
                                    <input type="hidden" name="other3_input" value=""/>
                                    <td class="textLeft height36 w180">其他资料3<br />(非必填)</td>
                                    <td>
                                        <div class="picList clear uploader" id="other3_input_uploader">
                                            <ul class="filelist"> </ul>
                                        </div>
                                        <p class="textAll mb10" style="margin-top: 4px;">支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="webuploader_list" id="other3_input" style="position: relative; z-index: 1;width:100px;float:left">选择图片</label>
                                    </td>
                                </tr>
                            @endif

                            @if(empty($has_file['mark']))
                                <tr>
                                    <td class="textLeft height36 w180">订购机型/数量：</td>
                                    <td><textarea class="form-control" rows="3" name="mark" placeholder="请填写需要订购的机型，数量和其他信息"></textarea></td>
                                </tr>
                            @endif

                            @if(empty($has_file['monitor_account']))
                                <tr>
                                    <td class="textLeft height36 w180">监控账号：</td>
                                    <td><input class="formControl input300" name="monitor_account" type="text" placeholder="设备价值大于15万需提供监控账号"></td>
                                </tr>
                            @endif
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
            ajaxCommon('userApply',$("#submit_data").serialize(),'post',applySuccess);
            return false;
        }
        function applySuccess(data){
            alert(data.msg);
            window.location.href='/';
        }
    </script>
@include('common.footer')