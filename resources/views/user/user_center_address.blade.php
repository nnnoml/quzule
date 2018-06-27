@include('common.header')
@include('common.nav')
<link href="{{asset('static/css')}}/index-user_center.css" rel="stylesheet">
<div class="container marketing">

    <hr class="featurette-divider-sm">
    <div class="mainContent">
        <div class="presNav">
            <div class="avatar">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </div>
            <p class="phone">{{$user_info['user_name']}}</p>
            <div class="info"><p>订单中心</p>
                <a class="J_navItem" href="/userCenter">订单列表</a>
                <!--                <a class="J_navItem" href="#" id="repayNav">缴费计划</a>-->
            </div>
            <div class="info"><p>账户信息</p>
<!--                <a class="J_navItem" href="#" id="personalNav">资料信息</a>-->
<!--                <a class="J_navItem" href="#" id="accountNav">账户资金</a>-->
                <a class="J_navItem active" href="/userCenterAddress">地址管理</a>
            </div>
        </div>
        <div class="orderListCard">
            <div class="pannelHead">地址管理</div>
            <div class="pannelBody">
                <div class="ordersList">
                    <div class="infoHeader">
                        <div class="orders">收货地址</div>
                        <div class="deposit">用户姓名</div>
                        <div class="deposit">用户电话</div>
                        <div class="deposit">操作</div>
                    </div>
                    <div class="ordersItem">
                        @foreach($address_list as $vo)
                        <div class="orders address">
                            <div class="ordersInfo">
                                <p class="ordersName">{{$vo->address}}</p>
                            </div>
                            <div class="itemDeposit">
                                <p><i>{{$vo->user_name}}</i></p>
                            </div>
                            <div class="itemDeposit">
                                <p><i>{{$vo->user_tel}}</i></p>
                            </div>
                            <div class="itemDeposit">
                                <p>
                                    <div class="btn-group" >
                                    <button class="btn btn-default" onclick="editAddress({{$vo->id}},'{{$vo->address}}','{{$vo->user_name}}','{{$vo->user_tel}}')" type="button">修改</button>
                                    <button class="btn btn-default" onclick="delAddress({{$vo->id}})" type="button">删除</button>
                                    </div>
                                </p>
                            </div>
                        </div>
                        @endforeach
                        <div class="operInfo">
                            <div class="oper">
                                <div class="btn-group" >
                                    <button type="button" class="btn btn-default" onclick="addAddress()">新增地址</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="featurette-divider">

    <div class="modal fade" id="address_modal" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">收件人</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">收件人联系方式</label>
                            <input type="text" name="tel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">收件地址</label>
                            <input type="text" name="address" class="form-control">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" save_id="0" onclick="AddressDo(this)">保存</button>
                </div>
            </div>
        </div>
    </div>

@include('common.footer_nav')
    <script src="{{asset('static/js')}}/jquery.min.js"></script>
    <script>
        function addressCheck(){
            var address = $('#address_modal input[name="address"]').val();
            var name = $('#address_modal input[name="name"]').val();
            var tel = $('#address_modal input[name="tel"]').val();
            if(address == '' || name == '' || tel == ''){
                alert('请填写完整');
                return false;
            }
            else return true;
        }
        function addAddress(){
            $('#address_modal').modal();
            $('#address_modal').find('h4').html('新增地址');
            $('#address_modal input[name="address"]').val();
            $('#address_modal input[name="name"]').val();
            $('#address_modal input[name="tel"]').val();
            $('#address_modal .modal-footer button').attr('save_id',0);
        }
        function AddressDo(thi){
            //0新增1更新
           var save_id = $(thi).attr('save_id');
            if(addressCheck){
                var post = {
                    'address':$('#address_modal input[name="address"]').val(),
                    'name':$('#address_modal input[name="name"]').val(),
                    'tel':$('#address_modal input[name="tel"]').val(),
                }
                if(save_id == 0)
                    ajaxCommon('address',post,'post','ajaxReturn')
                else
                    ajaxCommon('address/'+save_id,post,'put','ajaxReturn')
            }
        }

        function editAddress(id,address,name,tel){
            $('#address_modal').modal();
            $('#address_modal').find('h4').html('修改地址');
            $('#address_modal input[name="address"]').val(address);
            $('#address_modal input[name="name"]').val(name);
            $('#address_modal input[name="tel"]').val(tel);
            $('#address_modal .modal-footer button').attr('save_id',id);
        }

        function ajaxReturn(){
            window.location.reload();
        }

        function delAddress(id){
            ajaxCommon('address/'+id,'','delete','ajaxReturn')
        }
    </script>
@include('common.footer')