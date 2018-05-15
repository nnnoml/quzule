@include('common.header')
@include('common.nav')
<link href="{{asset('static/css')}}/index-user_apply.css" rel="stylesheet">


<div class="container marketing">

    <hr class="featurette-divider">

    <div class="mainContent">
        <div class="presNav">
            <div class="avatar J_setAvatar"><img
                    src="https://static1.aidingmao.com/boss/img/19a135e0-352f-11e7-80d3-77a198583c3a.png"></div>
            <p class="phone">17791867393</p>
            <div class="info"><p>账户信息</p><a class="J_navItem" href="/personal" id="personalNav">资料信息</a><a
                    class="J_navItem" href="/account" id="accountNav">账户资金</a><a class="J_navItem" href="/addrList"
                                                                                 id="addrListNav">地址管理</a></div>
            <div class="info"><p>订单中心</p><a class="J_navItem" href="/persOrder" id="orderListNav">订单列表</a><a
                    class="J_navItem" href="/repay" id="repayNav">缴费计划</a></div>
        </div>
        <div class="authCard">
            <div class="pannelHead">认证中心</div>
            <div class="pannelBody">
                <div class="stepContainer">
                    <div class="editContainer J_editContainer" style="display: block;">
                        <div class="companyEdit J_companyEdit" style="display: block;">
                            <table>
                                <tbody>
                                <tr>
                                    <td class="textLeft height36 w180">企业名称：</td>
                                    <td><input class="formControl input300" id="J_companyName" type="text"
                                               placeholder="跟营业执照上的企业名称一致"></td>
                                </tr>
                                <tr>
                                    <td class="textLeft height36 w180">工商执照注册号：</td>
                                    <td><input class="formControl input300" id="J_companyRegistereId" text="text"
                                               placeholder="三证合一后18位的统一社会信用代码"></td>
                                </tr>
                                <tr>
                                    <td class="textLeft height36 w180">注册时间：</td>
                                    <td><input class="timeBox input300 datepicker timeIcon" id="J_companyTime"
                                               type="text" readonly="" placeholder="务必与营业执照一致"></td>
                                </tr>
                                <tr>
                                    <td class="textLeft height36 w180">营业执照：</td>
                                    <td style="height:188px;"><img class="licenseImg" id="J_licenseImg"
                                                                   src="https://static1.aidingmao.com/boss/img/114fba30-1a6b-11e7-a1a3-17a6d0e2b19f.jpg">
                                        <div class="licenseBox"><p>只支持中国大陆工商局或市场监督管理局颁发的工商营业执照，</p>
                                            <p>且必须在有效期内。若办理过三证合一的企业，请再次上传最新</p>
                                            <p>的营业执照。格式要求：原件照片，支持.jpg .jpeg .bmp </p>
                                            <p>.gif .png格式照片，大小不超过5M。</p><label class="licenseUpload mb10 silvery"
                                                                                id="J_license"
                                                                                style="z-index: 1;">选择图片</label>
                                            <div id="html5_1cdhig5k3rp81facpoi1hp61cl27_container"
                                                 class="moxie-shim moxie-shim-html5"
                                                 style="position: absolute; top: 0px; left: 0px; width: 0px; height: 0px; overflow: hidden; z-index: 0;">
                                                <input id="html5_1cdhig5k3rp81facpoi1hp61cl27" type="file"
                                                       style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;"
                                                       accept=""></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="textLeft height36 w180"><p>法人姓名：</p></td>
                                    <td><input class="formControl input300" id="J_companyAuthName" type="text"
                                               placeholder="请输入正确的法人姓名"></td>
                                </tr>
                                <tr>
                                    <td class="textLeft height36 w180">法人身份证号：</td>
                                    <td><input class="formControl input300" id="J_companyAuthId" type="text"
                                               placeholder="请输入正确的法人身份证号"></td>
                                </tr>
                                <tr>
                                    <td class="textLeft height36 w180">法人身份证正反面照片：</td>
                                    <td>
                                        <div class="clear">
                                            <div class="frontSide"><label id="J_companyIdPic"
                                                                          style="position: relative; z-index: 1;"><img
                                                        id="J_companyIdPicPre"
                                                        src="https://static1.aidingmao.com/boss/img/1180b540-1a6b-11e7-a1a3-17a6d0e2b19f.jpg">
                                                    <p>正面</p></label>
                                                <div id="html5_1cdhig5k51rlriro51arjapsa_container"
                                                     class="moxie-shim moxie-shim-html5"
                                                     style="position: absolute; top: 0px; left: 0px; width: 0px; height: 0px; overflow: hidden; z-index: 0;">
                                                    <input id="html5_1cdhig5k51rlriro51arjapsa" type="file"
                                                           style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;"
                                                           accept=""></div>
                                            </div>
                                            <div class="endSide"><label id="J_companyIdPicBack"
                                                                        style="position: relative; z-index: 1;"><img
                                                        id="J_companyIdBackPicPre"
                                                        src="https://static1.aidingmao.com/boss/img/11832640-1a6b-11e7-a1a3-17a6d0e2b19f.png">
                                                    <p>反面</p></label>
                                                <div id="html5_1cdhig5k7i3515frjbto6m76ad_container"
                                                     class="moxie-shim moxie-shim-html5"
                                                     style="position: absolute; top: 0px; left: 0px; width: 0px; height: 0px; overflow: hidden; z-index: 0;">
                                                    <input id="html5_1cdhig5k7i3515frjbto6m76ad" type="file"
                                                           style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;"
                                                           accept=""></div>
                                            </div>
                                        </div>
                                        <p class="textAll mt10 mb10">格式要求：照片、扫描件或者加盖公章的复印件，支持.jpg .jpeg .bmp .gif
                                            .png格式照片，大小不超过5M。</p></td>
                                </tr>
                                <tr>
                                    <td class="textLeft height36 w180">经营场地租赁合同：</td>
                                    <td>
                                        <div class="picList clear" id="J_picList"></div>
                                        <p class="textAll mb10" style="margin-top: 4px;">
                                            自有的房产提供房产证或者购房合同，租赁的提供租赁合同。支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                                        <label class="uploadBtn" id="J_uploadPlacePic"
                                               style="position: relative; z-index: 1;">选择图片</label>
                                        <div id="html5_1cdhig5kakq31torb6bdnb17q5m_container"
                                             class="moxie-shim moxie-shim-html5"
                                             style="position: absolute; top: 0px; left: 0px; width: 0px; height: 0px; overflow: hidden; z-index: 0;">
                                            <input id="html5_1cdhig5kakq31torb6bdnb17q5m" type="file"
                                                   style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;"
                                                   accept=""></div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="personalEdit J_personalEdit">
                            <table>
                                <tbody>
                                <tr>
                                    <td class="textLeft height36 w180">个人实名</td>
                                    <td><input class="formControl input300" id="J_personAuthName" type="text"></td>
                                </tr>
                                <tr>
                                    <td class="textLeft height36 w180">身份证号</td>
                                    <td><input class="formControl input300" id="J_personAuthId" type="text"></td>
                                </tr>
                                <tr>
                                    <td class="textLeft height36 w180">身份证正反面照片</td>
                                    <td>
                                        <div class="clear">
                                            <div class="frontSide"><label id="J_personIdPic"
                                                                          style="position: relative; z-index: 1;"><img
                                                        id="J_personIdPicPre"
                                                        src="https://static1.aidingmao.com/boss/img/1180b540-1a6b-11e7-a1a3-17a6d0e2b19f.jpg">
                                                    <p>正面</p></label>
                                                <div id="html5_1cdhig5k81ofn157sf0nuhdnd9g_container"
                                                     class="moxie-shim moxie-shim-html5"
                                                     style="position: absolute; top: 0px; left: 0px; width: 0px; height: 0px; overflow: hidden; z-index: 0;">
                                                    <input id="html5_1cdhig5k81ofn157sf0nuhdnd9g" type="file"
                                                           style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;"
                                                           accept=""></div>
                                            </div>
                                            <div class="endSide"><label id="J_personIdPicBack"
                                                                        style="position: relative; z-index: 1;"><img
                                                        id="J_personIdPicBackPre"
                                                        src="https://static1.aidingmao.com/boss/img/11832640-1a6b-11e7-a1a3-17a6d0e2b19f.png">
                                                    <p>反面</p></label>
                                                <div id="html5_1cdhig5k81bk6mka1rv4h7kvtoj_container"
                                                     class="moxie-shim moxie-shim-html5"
                                                     style="position: absolute; top: 0px; left: 0px; width: 0px; height: 0px; overflow: hidden; z-index: 0;">
                                                    <input id="html5_1cdhig5k81bk6mka1rv4h7kvtoj" type="file"
                                                           style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;"
                                                           accept=""></div>
                                            </div>
                                        </div>
                                        <p class="textAll mt10 mb10">格式要求：原件照片，支持.jpg .jpeg .bmp .gif
                                            .png格式照片，大小不超过5M。</p></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="nextBtn J_submitResult" data-id="554410" data-io="0" data-type="1">进入认证</div>
                    </div>
                </div>
                <div class="setAvatar">
                    <div class="head"><span>设置头像</span></div>
                    <div class="avatarInfo" style="position: relative;"><img id="J_showAvatar"
                                                                             src="https://static1.aidingmao.com/boss/img/19a135e0-352f-11e7-80d3-77a198583c3a.png">
                        <div class="chooseFile" id="J_Inputavatar" style="z-index: 1;"><span>选择图片</span></div>
                        <p id="J_avaErrMsg"></p>
                        <div id="html5_1cdhig5juid81l59fejl746et4_container" class="moxie-shim moxie-shim-html5"
                             style="position: absolute; top: 0px; left: 0px; width: 0px; height: 0px; overflow: hidden; z-index: 0;">
                            <input id="html5_1cdhig5juid81l59fejl746et4" type="file"
                                   style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;"
                                   accept=""></div>
                    </div>
                    <div class="btnBox">
                        <div class="cancle J_cancleAvatar">取消</div>
                        <div class="avaterSub" id="J_sureAvatar">确认</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="billCover"></div>
    </div>

    <hr class="featurette-divider">

@include('common.footer_nav')
    <script src="{{asset('static/js')}}/index-user_apply.js"></script>
    <script src="{{asset('static/js')}}/index-user_apply_main.js"></script>
@include('common.footer')