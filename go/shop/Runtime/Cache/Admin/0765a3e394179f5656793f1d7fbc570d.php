<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>角色Think列表</title>

        <link href="<?php echo (CSS_URL); ?>mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：角色管理-》角色列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="add">【添加角色】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div class="div_search">
            
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>角色ID</td>
                        <td>角色名称</td>
                        <td align="center">分配权限</td>
                    </tr>
                    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr id="role<?php echo ($v["role_id"]); ?>">
                        <td><?php echo ($v["role_id"]); ?></td>
                        <td><?php echo ($v["role_name"]); ?></td>
                        <td><a href="#">分配权限</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <div class="pagination">
                                <?php echo ($page); ?>
                            </div>
                        </td>
                    </tr>


                </tbody>
            </table>


        </div>
    </body>
</html>