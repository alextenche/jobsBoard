<?php echo $this->element('search'); ?>
<br>
<div id="category_block">
	<ul>
		<?php foreach($categories as $category) : ?>
			<li><?php echo $this->Html->link($category['Category']['name'], array('action' => 'browse', $category['Category']['id'])); ?></li>
		<?php endforeach; ?>
	</ul>
</div>


<h3> latest job listings </h3>

	<?php if($jobs) : ?>

		<ul id="listings">
			<?php foreach ($jobs as $job) : ?>
				<li class="first">
					<div class="type">
						<span style="background:<?php echo $job['Type']['color']?>"> <?php echo $job['Type']['name']; ?> </span>
					</div>
					<div class="description">
						<h5> <?php echo $job['Job']['title'] ;?> (<?php echo $job['Job']['city'] ;?>, <?php echo $job['Job']['state'] ;?>)</h5>
						<p><span id="list_date">
							<?php echo $this->Time->format('F jS h:i A', $job['Job']['created']); ?>
						</span></p>
						<?php echo $this->Text->truncate($job['Job']['description'], 250, array('ellipsis' => '...', 'exact' => 'false') ) ;?>
						<?php echo $this->Html->link('read more', array('controller'=>'jobs', 'action'=>'view', $job['Job']['id'])); ?>
						
					</div>
				</li>
			<?php endforeach; ?>
		</ul>

	<?php else : ?>

		<p> sorry, no jobs available </p>

	<?php endif; ?>