<h2>Forums!</h2>
<ul>
	<?php foreach ($categories as $category):?>
	<li>
		<div class="forum_category_title"><?=html::anchor('forum/category/'.$category->id, $category->name)?></div>
		<div class="forum_category_details clearfix">
			<div class="forum_category_total_discussions"><?=count($category->find_related('forum_discussions'))?> discussions</div>
			<div class="forum_category_date">Last Comment: <?=date('Y/m/d', $category->find_newest_discussion()->date)?></div>
			<div class="forum_category_author">By: <?=$category->find_newest_discussion()->user->name?></div>
		</div>
	</li>
	<?php endforeach;?> 
</ul>

<?php if (Auth::instance()->logged_in('admin')):?><p><?=html::anchor('admin/forum/create_category', 'Create New Category')?></p><?php endif;?> 