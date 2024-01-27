

<section>
    <div class="main-container">
        <div class="grid">
            <div class="col-6_sm-12">
                <?php $inquiries = textBlock('inquiries'); ?>
                <?php if ($inquiries && isset($inquiries->title) && !empty($inquiries->title)): ?>
                <h2 class="txt-0">
                    <?= $inquiries->title ?>
                </h2>
                <div class="text-editor mt-8">
                    <?= $inquiries->content ?>
                </div>
                <?php endif;?>
            </div>
            <div class="col-6_sm-12">
                <?php echo Form::open([
                    'url' => route('site.contact.submit'),
                    'method' => 'post',
                    'id' => 'contact-form',
                    'class' => 'contact-form',
                ]); ?>
                <div class="input-text">
                    <?= Form::text('name', '', [
                        'class' => 'form-control',
                        'placeholder' => __('main.name') . ' *',
                    ]) ?>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <small>{{ $errors->first('name') }}</small>
                        </span>
                    @endif
                </div>
             
                <div class="input-text">
                    <input type="text" name="phone" id="address" class="form-control"
                        placeholder="Phone *">
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <small>{{ $errors->first('phone') }}</small>
                        </span>
                    @endif
                </div>

                <div class="input-text">
                    <?= Form::textarea('message', '', [
                        'class' => 'form-control',
                        'placeholder' => __('main.message') . ' *',
                    ]) ?>
                    @if ($errors->has('message'))
                        <span class="help-block">
                            <small>{{ $errors->first('message') }}</small>
                        </span>
                    @endif
                </div>
        

               <div>
                    <label class="input-checkbox">
                        <input type="checkbox" name="privacy" required="true">
                        <div class="checkbox"></div>
                        Я прочитал и согласен с политикой конфиденциальности сайта
                    </label>
                </div> 
                <div class="submit-captcha mt-4">
                    <div class="captcha">
                        {!! Form::captcha([]) !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <label class="help-block">
                                <small>{{ $errors->first('g-recaptcha-response') }}</small>
                            </label>
                        @endif
                    </div>
                    <div class="submit-button">
                        {{ Form::submit(__('main.submit'), ['class' => 'btn-blue']) }}
                    </div>   

                </div>
                

                <?php echo Form::close(); ?>
            </div>
        </div>
    </div>
</section>

