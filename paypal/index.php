<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
        <title>paypal在线支付演示下载PHP版</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <meta content="php paypal演示下载,paypal源码下载" name="keywords"/>
        <meta content="PHP payal在线演示源码下载,paypal信用卡支付,paypal银联支付" name="description"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="http://www.erdangjiade.com/jquery/css/common.css" />
    </head>
    <body>
        <div class="head">
            <div class="head_inner clearfix">
                <ul id="nav">
                    <li><a href="http://www.erdangjiade.com">首 页</a></li>
                    <li><a href="http://www.erdangjiade.com/templates">网站模板</a></li>
                    <li><a href="http://www.erdangjiade.com/js">网页特效</a></li>
                    <li><a href="http://www.erdangjiade.com/php">PHP</a></li>
                </ul>
                
            </div>
        </div>
        <div class="container">
            <div class="demo">
                <h2 class="title"><a href="http://www.erdangjiade.com/js/971.html">教程：paypal在线支付</a></h2>

                <div class="content">
                    <div class="table-responsive">
                        <table class="table_parameters" width="100%">
                            <thead>
                                <tr class="tr_head">
                                    <th>订单号</th>
                                    <th>交易号</th>
                                    <th>付款金额</th>
                                    <th>付款时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <foreach name="lists" item="row">
                                    <tr>
                                        <td align="left">{$row.order_no}</td>
                                        <td align="center">{$row.trade_no}</td>
                                        <td align="center">{$row.order_money} {$row.unit_name}</td>
                                        <td align="center"><if condition="$row.update_time gt 0">{$row.update_time|date="m-d H:i",###}</if></td>
                                        <td align="center">  <a class="green" href="__APP__/Paypal/get_token/order_no/{$row.order_no}" target="_blank">付款</a></td>
                                    </tr> 
                                </foreach>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="foot">
            Powered by erdangjiade.com  本站皆为作者原创，转载请注明原文链接：<a href="http://www.erdangjiade.com" target="_blank">www.erdangjiade.com</a>
        </div>

    </body>
</html>