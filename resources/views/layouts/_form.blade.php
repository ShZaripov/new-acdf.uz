

<section>
    <div class="main-container ">
        <div class="grid">
            <div class="col-6_sm-12 ">
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
                    <?= Form::text('surname', '', [
                        'class' => 'form-control',
                        'placeholder' => __('main.surname') . ' *',
                    ]) ?>
                    @if ($errors->has('surname'))
                        <span class="help-block">
                            <small>{{ $errors->first('surname') }}</small>
                        </span>
                    @endif
                </div>

                <div class="">
                    <span class="mr-4">{{ __('main.birthday') }}</span>
                    <?= Form::date('birthday', '', [
                        'placeholder' => __('main.birthday') . ' *',
                        'class' => 'form-control',
                    ]) ?>

                    @if ($errors->has('birthday'))
                        <span class="help-block">
                            <small>{{ $errors->first('birthday') }}</small>
                        </span>
                    @endif
                    <hr>
                </div>
                <br>

                <div class="input-text">
                    <?= Form::text('country', '', [
                        'class' => 'form-control',
                        'placeholder' => __('main.country_city') . ' *',
                    ]) ?>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <small>{{ $errors->first('country') }}</small>
                        </span>
                    @endif
                </div>


                <div class="input-text">
                    <input type="text" name="address" id="address" class="form-control datepicker"
                        placeholder="{{ __('main.address') }} *">
                    @if ($errors->has('address'))
                        <span class="help-block">
                            <small>{{ $errors->first('address') }}</small>
                        </span>
                    @endif
                    <hr>
                </div>

                <div class="input-text">
                    <input type="txt" name="tel_num" id="tel_num" class="form-control"
                        placeholder="{{ __('main.tel_num') }}" min="3" max="16">
                    @if ($errors->has('tel_num'))
                        <span class="help-block">
                            <small>{{ $errors->first('tel_num') }}</small>
                        </span>
                    @endif
                    <hr color="black">
                </div>
                {{-- 
                <label for="phone">Enter your phone number:</label>

                <input type="tel" id="phone" name="phone" pattern="[0-9]{9}" required />
                
                <small>Format: 123-456-7890</small> --}}


                <div class="input-text">
                    <?= Form::text('educational', '', [
                        'class' => 'form-control datepicker',
                        'placeholder' => __('main.educational') . ' *',
                    ]) ?>
                    @if ($errors->has('educational'))
                        <span class="help-block">
                            <small>{{ $errors->first('educational') }}</small>
                        </span>
                    @endif
                </div>

                <div class="input-text">
                    <?= Form::text('failOf_studies', '', [
                        'class' => 'form-control',
                        'placeholder' => __('main.failOf_studies') . ' *',
                    ]) ?>
                    @if ($errors->has('failOf_studies'))
                        <span class="help-block">
                            <small>{{ $errors->first('failOf_studies') }}</small>
                        </span>
                    @endif
                </div>

                <div class="input-text">
                    <?= Form::text('yearOfStudies', '', [
                        'class' => 'form-control datepicker',
                        'placeholder' => __('main.yearOfStudies') . ' *',
                    ]) ?>
                    @if ($errors->has('yearOfStudies'))
                        <span class="help-block">
                            <small>{{ $errors->first('yearOfStudies') }}</small>
                        </span>
                    @endif
                </div>

                <div class="input-text">
                    <?= Form::text('email', '', [
                        'class' => 'form-control',
                        'placeholder' => 'Email*',
                    ]) ?>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <small>{{ $errors->first('email') }}</small>
                        </span>
                    @endif
                </div>

                <div class="input-text">

                    <?= Form::text('social_media_account', '', [
                        'class' => 'form-control ',
                        'placeholder' => __('main.social_media_account') . ' *',
                    ]) ?>
                    @if ($errors->has('social_media_account'))
                        <span class="help-block">
                            <small>{{ $errors->first('social_media_account') }}</small>
                        </span>
                    @endif
                </div>


                <div class="input-text">
                    <?= Form::text('expected_year_graduation', '', [
                        'class' => 'form-control',
                        'placeholder' => 'expected year graduation*',
                    ]) ?>
                    @if ($errors->has('expected_year_graduation'))
                        <span class="help-block">
                            <small>{{ $errors->first('expected_year_graduation') }}</small>
                        </span>
                    @endif
                </div>

                <div>
                    <span class="mr-4">{{ __('main.english_level') }}</span>
                    <select id="select-box" name="english_level" width=100% class="form-control">
                        <option value="A1">{{ __('main.english_level') }} A1</option>
                        <option value="A2">{{ __('main.english_level') }} A2</option>
                        <option value="B1" selected>{{ __('main.english_level') }} B1</option>
                        <option value="B2">{{ __('main.english_level') }} B2</option>
                        <option value="C1">{{ __('main.english_level') }} C1</option>
                        <option value="C2">{{ __('main.english_level') }} C2</option>
                    </select>
                    @if ($errors->has('english_level'))
                        <span class="help-block">
                            <small>{{ $errors->first('english_level') }}</small>
                        </span>
                    @endif
                </div>
                <hr>
                <br>

                <div>
                    <span for="select-box" class="mr-4">Level of Italian</span>
                    <select id="select-box" name="select" class="form-control">
                        <option value="A1">A1</option>
                        <option value="A1">A2</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                    </select>
                </div>
                <hr>
                <br>


                <div class="input-text">
                    <?= Form::text('other_languages', '', [
                            'class' => 'form-control datepicker',
                            'placeholder' => __('main.other_languages') . ' *',
                        ]) ?>
                    @if ($errors->has('other_languages'))
                        <span class="help-block">
                            <small>{{ $errors->first('other_languages') }}</small>
                        </span>
                    @endif
                </div>



                        {{-- ssadcf'z,fl;sdmlfcmdlmfcsdlkcmlfdnsjkfnkjsdnfksdnf --}}


                        
              <div class="form-control">
                        <span  class="mr-4"  for="radio_1">{{ __('main.can_you_be_fully') }} </span><br />
                         <div class="float-right">
                   
                        <input class="mr-4" id="radio-1" type="radio" name="can_you_be_fully" value="yes" checked>
                        <label for="radio-1">Yes</label>
                 
                        <input   id="radio-2" type="radio" name="can_you_be_fully" value="no">
                        <label for="radio-2">No</label>
                        </div>
             </div> 
            <hr>
            <div class="form-control">
                <span  class="mr-4"  for="radio_3">{{ __('main.will_you_still') }} </span><br />
                 <div class="float-right">
           
                <input class="mr-4" id="radio-3" type="radio" name="will_you_still" value="yes" checked>
                <label for="radio-3">yes</label>
         
                <input   id="radio-4" type="radio" name="will_you_still" value="no">
                <label for="radio-4">no</label>
                </div>
            </div> 
             
            <hr color="black">

                {{-- <div class="form_radio">
                  
                    <input type="radio" class="form-control" id="radio_1" name="main.can_you_be_fully" />
                    <input type="radio" class="form-control" id="radio_2" name="main.can_you_be_fully" />
                </div>
                    --}}

                {{-- <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled"
                        disabled>
                    <label class="form-check-label" for="flexRadioDisabled">
                        Disabled radio
                    </label>
                </div> --}}

              
               
                <br>


                <div class="input-text">
                 
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
<style>
    @media(max-width:1000px){
        .form_blade .grid{
            display: inline !important;
        }
    }
</style>
{{-- @section('css')
    <style>
     /* Style the radio container (optional) */
.radio-container {
  margin: 10px 0;
}

/* Style the radio button itself */
input[type="radio"] {
  /* Hide the default radio button */
  display: none;
}

/* Style the label to create a custom radio button */
label {
  position: relative;
  padding-left: 30px; /* Add space for the custom radio button */
  cursor: pointer;
}

/* Style the custom radio button */
label::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  width: 20px; /* Adjust the size as needed */
  height: 20px; /* Adjust the size as needed */
  border: 2px solid #007bff; /* Border color */
  background-color: #fff; /* Background color */
  border-radius: 50%; /* Make it round */
}

/* Style the custom radio button when it's checked */
input[type="radio"]:checked + label::before {
  background-color: #007bff; /* Change background color when checked */
}

/* Style the label text (optional) */
label {
  color: #333;
}

/* Style the label text when the radio button is checked (optional) */
input[type="radio"]:checked + label {
  font-weight: bold;
  color: #007bff;
}

    </style>



<style>
    /* appearance: auto;
    width: 50px;
    height: 50px;
}
input[type="radio"]:checked {
    background-color: #2196F3;
} */
</style>
@endsection --}}