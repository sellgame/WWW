<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
        <title>paypal����֧����ʾ����PHP��</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <meta content="php paypal��ʾ����,paypalԴ������" name="keywords"/>
        <meta content="PHP payal������ʾԴ������,paypal���ÿ�֧��,paypal����֧��" name="description"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="http://www.erdangjiade.com/jquery/css/common.css" />
    </head>
    <body>
        <div class="head">
            <div class="head_inner clearfix">
                <ul id="nav">
                    <li><a href="http://www.erdangjiade.com">�� ҳ</a></li>
                    <li><a href="http://www.erdangjiade.com/templates">��վģ��</a></li>
                    <li><a href="http://www.erdangjiade.com/js">��ҳ��Ч</a></li>
                    <li><a href="http://www.erdangjiade.com/php">PHP</a></li>
                </ul>
                
            </div>
        </div>
        <div class="container">
            <div class="demo">
                <h2 class="title"><a href="http://www.erdangjiade.com/js/971.html">�̳̣�paypal����֧��</a></h2>

                <div class="content">
                    <div class="table-responsive">
                        <table class="table_parameters" width="100%">
                            <thead>
                                <tr class="tr_head">
                                    <th>������</th>
                                    <th>���׺�</th>
                                    <th>������</th>
                                    <th>����ʱ��</th>
                                    <th>����</th>
                                </tr>
                            </thead>
                            <tbody>
                                <foreach name="lists" item="row">
                                    <tr>
                                        <td align="left">{$row.order_no}</td>
                                        <td align="center">{$row.trade_no}</td>
                                        <td align="center">{$row.order_money} {$row.unit_name}</td>
                                        <td align="center"><if condition="$row.update_time gt 0">{$row.update_time|date="m-d H:i",###}</if></td>
                                        <td align="center">  <a class="green" href="__APP__/Paypal/get_token/order_no/{$row.order_no}" target="_blank">����</a></td>
                                    </tr> 
                                </foreach>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="foot">
            Powered by erdangjiade.com  ��վ��Ϊ����ԭ����ת����ע��ԭ�����ӣ�<a href="http://www.erdangjiade.com" target="_blank">www.erdangjiade.com</a>
        </div>

    </body>
</html>