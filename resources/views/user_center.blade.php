@include('common.header')
@include('common.nav')
<link href="{{asset('static/css')}}/index-user_center.css" rel="stylesheet">
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
            <div class="info"><p>订单中心</p><a class="J_navItem active" href="/persOrder" id="orderListNav">订单列表</a><a
                    class="J_navItem" href="/repay" id="repayNav">缴费计划</a></div>
        </div>
        <div class="orderListCard">
            <div class="pannelHead">订单列表</div>
            <div class="pannelBody">
                <div class="ordersList">
                    <div class="infoHeader">
                        <div class="orders">商品信息</div>
                        <div class="price">单价/数量</div>
                        <div class="deposit">押金</div>
                        <div class="time">租期</div>
                        <div class="status">订单状态</div>
                        <div class="payStatus">支付状态</div>
                        <div class="total">总价</div>
                    </div>
                </div>
                <div class="cancelBox J_cancelBox"><p class="title">取消订单</p>
                    <div><input class="J_cancelReason" type="radio" data-reason="0" name="reason" checked=""><span
                            class="ml10">不想拍了</span><input class="J_cancelReason" type="radio" data-reason="1"
                                                           name="reason"><span class="ml10">拍错</span></div>
                    <div class="btn J_sureCancel">确定</div>
                </div>
                <div class="returnBox J_returnBox"><p class="title">退还设备</p>
                    <div class="typeMail J_typeMail"><p class="importantText">*请按以下地址发货（拒收到付件）</p>
                        <p>收货人:<span>付能</span></p>
                        <p>手机号:<span>18855173021</span></p>
                        <p>邮政编码:<span>310000</span></p>
                        <p>收货地址:<span>浙江省-杭州市-余杭区 杭州市西湖区三墩镇西园九路8号杭州数字产业园二期H401</span></p>
                        <div class="wuliu"><span>物流公司</span><select id="J_kdSel">
                                <option value="shunfeng">顺丰快递</option>
                                <option value="huitongkuaidi">百世汇通</option>
                                <option value="shentong">申通快递</option>
                                <option value="yuantong">圆通速递</option>
                                <option value="yunda">韵达快运</option>
                                <option value="zhongtong">中通速递</option>
                                <option value="tiantian">天天快递</option>
                                <option value="youshuwuliu">优速物流</option>
                                <option value="ems">EMS</option>
                                <option value="dhl">DHL</option>
                                <option value="dhlen">DHL(国际件)</option>
                                <option value="quanfengkuaidi">全峰快递</option>
                                <option value="lianbangkuaidi">联邦快递</option>
                                <option value="fedex">联邦快递（国际件）</option>
                                <option value="guotongkuaidi">国通快递</option>
                                <option value="debangwuliu">德邦物流</option>
                                <option value="kuaijiesudi">快捷速递</option>
                                <option value="zhaijisong">宅急送</option>
                                <option value="rufengda">如风达</option>
                            </select></div>
                        <div class="sn"><span>运单编号</span><input id="J_mailSn" type="text"></div>
                    </div>
                    <div class="typeDoor J_typeDoor"><p class="importantText">* 上门取货服务暂仅支持杭州地区</p>
                        <p>请确认设备完好，并做好数据备份工作，租葛亮的小伙伴会如约来取货。</p>
                        <div class="timeBox"><span>取货时间</span><input class="datepicker timeIcon" id="J_dateInput"
                                                                     type="text" readonly=""></div>
                    </div>
                    <div class="btnSure J_sureReturn">确定</div>
                </div>
            </div>
        </div>
    </div>
    <hr class="featurette-divider">

@include('common.footer_nav')
@include('common.footer')