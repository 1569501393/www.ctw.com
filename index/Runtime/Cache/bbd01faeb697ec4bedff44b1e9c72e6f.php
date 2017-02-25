<?php if (!defined('THINK_PATH')) exit();?><div class="album_items_add_dialog box_content">
  

  <table cellpadding="10">
    <tr>
      <td rowspan="3" class="thumb" valign="top"></td>
      <td> 
      <div class="album_div">
        <div class="album_div_create_div">
         <span>专辑</span>
         	
         	<input type="hidden" class="pid" value="<?php echo ($list[0]["id"]); ?>"/>
            <?php if(($list[0][title]) == ""): ?><div class="showdiv">请先创建专辑</div>
            <input type="text" class="album_div_create_name" name="name" <?php if(empty($list)): ?>style="display:none;"<?php endif; ?> readonly="readonly" />
            <input style="display:none;" type="image" class="album_div_create_buootm" src="__TMPL__/public/images/album_bjxl.png"/>
            <?php else: ?>
        	<input type="text"  class="album_div_create_name" name="name" value="<?php echo ($list[0][title]); ?>" <?php if(empty($list)): ?>style="border-bottom:0px;"<?php endif; ?> readonly="readonly" />
			<input type="image" class="album_div_create_buootm" src="__TMPL__/public/images/album_bjxl.png"/><?php endif; ?>
 
			<br clear="all"/>
        </div>
        <div class="album_div_create_list"<?php if(empty($list)): ?>style="display:block;border-top:0px;border-bottom:0px;"<?php endif; ?> >
        	<?php if(empty($list)): ?><ul style="height:0px;margin:0;">
            <?php else: ?>
            <ul><?php endif; ?>
           
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="javascript:void(0)" pid="<?php echo ($val["id"]); ?>"><?php echo ($val["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <table cellpadding="10">
                <tr>
                  <td>
                    <input type="text" name="title" class="title" style="height:18px;width:75px;"/>
                    <select name="pcid" class="cid">
                      <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <input type="button" class="create_album" value="创建专辑" /></td>
                </tr>
             </table>
        </div>
       </div>
        </td>
    </tr>
    <tr>
      <td> 
      <span style="float:left;display:block;line-height:20px;margin:0px 5px;">备注</span>
        <textarea style="width:219px;"></textarea></td>
    </tr>
    <tr>
      <td><input type="submit" class="submit" value="确定"/></td>
    </tr>
  </table>

   
	<!--table cellpadding="10">
    <tr>
      <td rowspan="3" class="thumb" valign="top"></td>
      <td> 名称
        <input type="text" name="title" class="title" style="height:18px;width:75px;"/>
        <select name="cid" class="cid">
          <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <input type="button" class="create_album" value="创建专辑"/></td>
    </tr>
  </table-->
  
 
</div>