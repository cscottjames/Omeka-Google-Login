<h2><?php echo __('Welcome to My Config Form'); ?></h2>
<div class="field">
    <div class="inputs">
        <p class="explain-client-id">
            <?php echo __('Enter your Client ID here. You can find this in your Google Developer Console. It should end with "apps.googleusercontent.com".'); ?>
        </p>
        <?php echo get_view()->formLabel('client-id', __('Client ID')); ?>
        <?php echo get_view()->formText('client-id', get_option('client-id')); ?>
    </div>
</div>