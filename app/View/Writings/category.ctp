<div class="row-fluid">
    <div class="span9">
        <h2>Category <?php echo $category['Category']['category']; ?></h2>

        <p>
            <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
        </p>
        
        
        <div class="row-fluid">
            <?php foreach ($writings as $writing): ?>     
            <div class="span6">
                <h1><?php echo h($writing['Writing']['title']); ?></h1>
                <p><?php echo h($writing['Writing']['content']); ?></p>
                <p><a class="btn" href="#">View details &raquo;</a></p>
            </div>
            <?php endforeach; ?>
        </div>

        <?php echo $this->Paginator->pagination(); ?>
    </div>
    <div class="span3">
        <div class="well" style="padding: 8px 0; margin-top:8px;">
            <ul class="nav nav-list">
                <li class="nav-header"><?php echo __('Actions'); ?></li>
                <li><?php echo $this->Html->link(__('New %s', __('Writing')), array('action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('List %s', __('Categories')), array('controller' => 'categories', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New %s', __('Category')), array('controller' => 'categories', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('List %s', __('Users')), array('controller' => 'users', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New %s', __('User')), array('controller' => 'users', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('List %s', __('Comments')), array('controller' => 'comments', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New %s', __('Comment')), array('controller' => 'comments', 'action' => 'add')); ?> </li>
            </ul>
        </div>
    </div>
</div>