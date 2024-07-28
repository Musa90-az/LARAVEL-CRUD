<h2>
    <?php echo e($job->title); ?>

</h2>

<p>Congrats! Your job is now live on our website.</p>
<p>
    <a href="<?php echo e(url('/jobs/' . $job->id)); ?>">View Your Job Listing</a>

</p><?php /**PATH C:\xampp\htdocs\firstproject\resources\views/mail/job-posted.blade.php ENDPATH**/ ?>