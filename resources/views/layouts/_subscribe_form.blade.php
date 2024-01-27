<div class="footer ">
    <div class="main-container">
        <div class="footer_newsletter">
            <div class="small-container">
                <?php echo Form::open([
                    'url'    => route('subscribers'),
                    'method' => 'post',
                    'id'     => 'mc-embedded-subscribe-form',
                    'name'   => 'mc-embedded-subscribe-form',
                    'class'  => 'validate'
                ]) ?>

                    <div class="newsletter-form">
                        <?= Form::email('email', '', [
                            'type'          => 'email',
                            'class'         => 'required email',
                            'placeholder'   => __('main.enter_email'),
                            'name'          => 'email',
                            'id'            => 'mce-EMAIL'
                        ]) ?>
                        {{ Form::submit(__('main.confirm_subscribe'), ['class' => 'btn-white', 'style' => 'margin: 0']) }}
                    </div>

                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>