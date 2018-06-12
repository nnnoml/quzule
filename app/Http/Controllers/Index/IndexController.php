<?php

namespace App\Http\Controllers\Index;

use App\Http\Model\ItemClass;
use App\Http\Model\ItemImg;
use App\Http\Model\ItemList;

use App\Http\Model\PageLists;
use Illuminate\Http\Request;

class IndexController extends IndexCommonController
{
    public function index(){
        $return_info = $this->return_info;
        $return_info['nav'] = 'home';
        $return_info['title'] = '首页';
        $return_info['product'] = ItemList::getItem(0,0,8);
        return view('index',$return_info);
    }

    public function page($id=0){
        $return_info = $this->return_info;
        $return_info['nav'] = 'page';
        $return_info['page'] = PageLists::find($id);
        $return_info['page_list'] = PageLists::getList();
        $return_info['title'] = $return_info['page']['page_name'];
        return view('page',$return_info);
    }
    public function product($list=0){
        $return_info = $this->return_info;
        $return_info['nav'] = 'product';

        if($list){
            $return_info['product_class_name'] = ItemClass::className($list);
            $return_info['title'] = $return_info['product_class_name'];
        }
        else{
            $return_info['product_class_name'] = '全部商品';
            $return_info['title'] = '全部商品';
        }
        $return_info['product'] = ItemList::getItem($list);
        return view('product_list',$return_info);
    }
    public function productDetail($list,$id){
        $return_info = $this->return_info;
        $return_info['nav'] = 'product';
        $return_info['product'] = ItemList::getItem($list,$id);
        $return_info['img_list'] = ItemImg::getImgList($id);
        if(!isset($return_info['product']))
            abort(404);
        else
            return view('product_detail',$return_info);
    }
    public function aaa(){
        $this->getDocTable();
    }

    /**
     * @param int $total_month //租期总月份
     * @param int $total_comp_num //租赁总台数
     * @param string $isNew //是否是全新设备
     * @param $dep_start //租赁开始时间
     * @param $dep_end //租赁结束时间
     * @param int $deposit //押金合计
     * @param int $dep_day //付租金日
     * @param int $dep_pay //需要付租金 多钱
     * @param string $address //地址
     * @param array $comp_list //电脑明细
     * @param int $month_total_dep_price //月租合计
     * @param int $total_dep_price //租金总额
     * @param string $user_name //用户名称
     * @param $created_at //签约时间
     */
    public function getDocTable($total_month=0,$total_comp_num=0,$isNew='是',$dep_start='',$dep_end='',$deposit=0,$dep_day=1,$dep_pay=0,$address='',$comp_list=[],$month_total_dep_price=0,$total_dep_price=0,$user_name='',$created_at=''){
        if($dep_start == '')
            $dep_start = time(); //租赁开始时间
        if($dep_end == '')
            $dep_end = time(); //租赁结束时间
        if($created_at == '')
            $created_at = time(); //签约时间

        $html = '<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <meta name="generator" content="Aspose.Words for .NET 15.1.0.0" />
  <title></title>
 </head>
 <body>
  <div style="max-width:550px;">
   <p style="margin:0pt; orphans:0; text-align:justify; widows:0"><span style="font-family:宋体; font-size:14pt; font-weight:bold">附件二 电脑设备租赁租金支付表</span></p>
   <p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:10.5pt">&nbsp;</span></p>
   <table cellspacing="0" cellpadding="0" style="border-collapse:collapse; margin-left:6.85pt; width:416.55pt;border: 6px #fff solid;">
    <tbody>
     <tr style="height:38.35pt">
      <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:67.15pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:15pt; font-weight:bold">租期及数量</span></p></td>
      <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:206.55pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:15pt">租期__'.$total_month.'__个月，总计__'.$total_comp_num.'__台</span></p></td>
      <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:69.55pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:16pt; font-weight:bold">是否是全新设备</span></p></td>
      <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:29.35pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:10.5pt">'.$isNew.'</span></p></td>
     </tr>
     <tr style="height:38.8pt">
      <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:67.15pt"><p style="margin:0pt; orphans:0; text-align:justify; widows:0"><span style="font-family:宋体; font-size:16pt; font-weight:bold">押金</span></p></td>
      <td colspan="6" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:327.05pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:14pt">合计: '.$deposit.' 元</span></p></td>
     </tr>
     <tr style="height:41.9pt">
      <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:67.15pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:16pt; font-weight:bold">租赁起止时间和付租金时间</span></p></td>
      <td colspan="6" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:327.05pt">
      <p style="margin:0pt; orphans:0; text-align:justify; widows:0"><span style="font-family:宋体; font-size:15pt">'.date('Y',$dep_start).'年'.date('m',$dep_start).'月'.date('d',$dep_start).'日&nbsp;
至&nbsp;'.date('Y',$dep_end).'年'.date('m',$dep_end).'月'.date('d',$dep_end).'日。</span></p>
      <p style="margin:0pt; orphans:0; text-align:justify; widows:0"><span style="font-family:宋体; font-size:15pt">每月&nbsp;'.$dep_day.'&nbsp; 日付租金</span><span style="font-family:宋体; font-size:15pt; text-decoration:underline">&nbsp;'.$dep_pay.'&nbsp;</span><span style="font-family:宋体; font-size:15pt">元。</span></p></td>
     </tr>
     <tr style="height:30.25pt">
      <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:67.15pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:15pt; font-weight:bold">设备使用地址</span></p></td>
      <td colspan="6" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:327.05pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:10.5pt">'.$address.'</span></p></td>
     </tr>
     <tr style="height:12.35pt">
      <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:67.15pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:15pt; font-weight:bold">设备类型</span></p></td>
      <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:95.55pt"><p style="margin:0pt; orphans:0; text-align:center; widows:0"><span style="font-family:宋体; font-size:15pt; font-weight:bold">配置详情</span></p></td>
      <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:64.75pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:15pt; font-weight:bold">数量</span><span style="font-family:宋体; font-size:15pt; font-weight:bold">(台)</span></p></td>
      <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:53pt"><p style="margin:0pt; orphans:0; text-align:justify; widows:0"><span style="font-family:宋体; font-size:14pt; font-weight:bold">月租/</span><span style="font-family:宋体; font-size:14pt; font-weight:bold">台</span></p></td>
      <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.35pt"><p style="margin:0pt; orphans:0; text-align:justify; widows:0"><span style="font-family:宋体; font-size:14pt; font-weight:bold">设备总价值</span></p></td>
     </tr>';
        foreach($comp_list as $key=>$vo){
             $html .= '
             <tr style="height:80.15pt">
              <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:67.15pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:15pt; font-weight:bold">台式电脑&nbsp;&nbsp;&nbsp; </span></p></td>
              <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:95.55pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:10.5pt"></span></p></td>
              <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:64.75pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:10.5pt">&nbsp;</span></p></td>
              <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:53pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:10.5pt">&nbsp;</span></p></td>
              <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.35pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:10.5pt">&nbsp;</span></p></td>
             </tr>';
        }
     $html .='
     <tr style="height:42.4pt">
      <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:67.15pt"><p style="margin:0pt; orphans:0; text-align:center; widows:0"><span style="font-family:宋体; font-size:15pt; font-weight:bold">月租合计（元）</span></p></td>
      <td colspan="6" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:327.05pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:10.5pt">'.$month_total_dep_price.'</span></p></td>
     </tr>
     <tr style="height:38.3pt">
      <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:67.15pt"><p style="margin:0pt; orphans:0; text-align:center; widows:0"><span style="font-family:宋体; font-size:15pt; font-weight:bold">租金总额（元）</span></p></td>
      <td colspan="6" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:327.05pt"><p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:10.5pt">'.$total_dep_price.'</span></p></td>
     </tr>
     <tr style="height:0pt">
      <td style="width:77.95pt; border:none"></td>
      <td style="width:106.35pt; border:none"></td>
      <td style="width:75.55pt; border:none"></td>
      <td style="width:35.45pt; border:none"></td>
      <td style="width:28.35pt; border:none"></td>
      <td style="width:52pt; border:none"></td>
      <td style="width:40.15pt; border:none"></td>
     </tr>
    </tbody>
   </table>
   <p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:10.5pt">&nbsp;</span></p>
   <p style="margin:0pt; orphans:0; widows:0"><span style="font-family:宋体; font-size:14pt">甲方：陕西趣租乐网络科技有限公司&nbsp;&nbsp; 乙方：'.$user_name.'</span></p>
   <p style="margin:0pt; orphans:0; widows:0;text-align:right"><span style="font-family:宋体; font-size:14pt">'.date('Y',$created_at).'年</span><span style="font-family:宋体; font-size:14pt">'.date('m',$created_at).'月</span><span style="font-family:宋体; font-size:14pt">'.date('d',$created_at).'日</span></p>
  </div>
 </body>
</html>';
        echo $html;
    }
}
