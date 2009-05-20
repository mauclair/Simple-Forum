<div class="forum_discussion_header clearfix">
	<h2><?=$discussion->title?></h2>
	<div class="forum_discussion_author">Started by: <?=$discussion->user->name?></div>
	<div class="forum_disucssion_date">On: <?=date('Y/m/d', $discussion->date_created)?></div>
</div>
<ul id="discussion_list">
	<?php foreach ($comments as $comment):?>
	<li>
		<div class="forum_comment_header clearfix">
			<div class="forum_comment_id" id="comment_<?=$comment->id?>"><a href="#comment_<?=$comment->id?>">Comment #<?=$comment->id?></a></div>
			<div class="forum_comment_author">By: <?=$comment->user->name?></div>
			<div class="forum_comment_date">Posted On: <?=date('Y/m/d', $comment->date)?></div>
		</div>
		<div class="forum_comment_content"><?=markdown($comment->content)?></div>
	</li>
	<?php endforeach;?>
</ul>
<h4>Add Comment</h4>
<?php if (Auth::instance()->logged_in()):?>
<?=form::open('forum/create_comment/'.$discussion->id)?>
<ul>
	<li><?=form::textarea('content')?></li>
	<li><?=form::submit('submit', 'Submit')?></li>
</ul>
<?=form::close()?>
<?php else:?>
<p>You must be <?=html::anchor('user/login', 'logged in')?> to post comments.</p>
<?php endif;?> 