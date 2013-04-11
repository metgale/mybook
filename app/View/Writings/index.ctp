<div class="row-fluid">
    <div class="span9">
      

        <p>
            <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
        </p>
         		
        <div class="row-fluid">
            <?php foreach ($writings as $writing): ?>     
            <div class="span6">
                <h1><?php echo h($writing['Writing']['title']); ?></h1>
                <p><?php echo h($writing['Writing']['content']); ?></p>
                <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
            </div>
            <?php endforeach; ?>
        </div>

        <?php echo $this->Paginator->pagination(); ?>
    </div>
   