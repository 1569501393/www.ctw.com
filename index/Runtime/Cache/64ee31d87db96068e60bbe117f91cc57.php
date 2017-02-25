<?php if (!defined('THINK_PATH')) exit();?><div class="tip_info">
	<img class="avatar" src="<?php echo getUserFace($user_info['id'],'z');?>" width="48" height="48"  alt="<?php echo ($user_info['name']); ?>">		
	<div class="info">
		<p>
			<a class="uname" href="<?php echo u('uc/index',array('uid'=>$user_info['id']));?>"><?php echo ($user_info['name']); ?></a>
		</p>
		<p>
			粉丝：
			<a href="<?php echo uc('uc/follow');?>" target="_blank">
				<span><?php echo ($user_info['fans_num']); ?></span>
			</a>
			<img src="__TMPL__public/images/tip_bao.png">
			分享宝贝：
			<a href="<?php echo uc('uc/share');?>" target="_blank">
				<span><?php echo ($user_info['share_num']); ?></span>
			</a>
		</p>
		
	</div>
	<div class="intro">
		<span> <?php if($user_info['info']=='' ): ?>这个人真懒，连自我介绍都不写。
				<?php else: ?>
					<?php echo ($user_info['info']); endif; ?>

  </span>
	</div>
	<div class="medal_a">
		<a href="<?php echo u('uc/index',array('uid'=>$user_info['id']));?>" target="_blank">
			<img height="20" width="20" src="__TMPL__/public/images/shequjumin.png" alt="" title="新人勋章">
		</a>
	</div>
</div>
<div class="tip_toolbar">
	<?php if($own == '1'): ?><span style="padding-left:5px;">这是您自己哦！连自己都不认识了~~~</span>
	<?php else: ?>
		<?php if($has_fan == '1'): ?><span class="fl icrad_add">已关注</span>
			<a class="follow_del" onclick="delete_follow(this,<?php echo ($user_info['id']); ?>);" href="javascript:;">取消</a>
		<?php else: ?>
			<a class="green_button" href="javascript:;" onclick="user_follow(this,<?php echo ($user_info['id']); ?>);" >+加关注</a><?php endif; endif; ?>
	<div class="blank3"></div>
</div>
<div class="tip_arrow" style="margin-left: 8px;"></div>