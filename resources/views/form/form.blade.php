@extends('layouts.site').

@section('content')
    <section class="form_blade">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <p style="text-align: center">YOUNG AMBASSADORS</p>
                    <p>Students and young graduates from all over the Uzbekistan can apply to take part in the program.
                    </p>
                    <p> The application for participation as a Young Ambassador is online only. The form should be
                        filled in
                        English.   There are no application or participation fees.
                    </p>
                  
                    
                    <p>All invited students will be informed and asked to confirm their participation.</p>
                    <p>By submitting your application, you consent to the processing of your personal information for
                        the
                        purposes of the Young Ambassadors Program.
                    </p>
                    <p>Note: Students will have the flights, accommodation (shared room), 
                    meals (breakfasts and lunches) covered. A daily stipend will be provided.
                    </p>
                    <div style="margin-top: 50px">
                        <?php echo Form::open([
                            'url' => route('form.store'),
                            'method' => 'post',
                            'id' => 'contact-form',
                            'class' => 'contact-form',
                        ]); ?>
                        <div class="input-text">
                            <?= Form::text('name', '', [
                                    'class' => 'form-control',
                                    'placeholder' => ' Name *',
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
                                    'placeholder' => ' Surname *',
                                ]) ?>
                            @if ($errors->has('surname'))
                                <span class="help-block">
                                    <small>{{ $errors->first('surname') }}</small>
                                </span>
                            @endif
                        </div>

                        <div class="">
                            <span class="mr-12"></span>
                            <?= Form::date('birthday', '', [
                                    'placeholder' => "Date of birth(18+) .  * (DD.MM.YYYY)",
                                    'class' => 'form-control',
                                ]) ?>

                            @if ($errors->has('birthday'))
                                <span class="help-block">
                                    <small>{{ $errors->first('birthday') }}</small>
                                </span>
                            @endif
                           
                        </div>
                    <br>





                        <div class="input-text">
                            <?= Form::text('country_city', '', [
                                    'class' => 'form-control',
                                    'placeholder' => " Country and City of Birth  *",
                                ]) ?>
                            @if ($errors->has('country_city'))
                                <span class="help-block">
                                    <small>{{ $errors->first('country_city') }}</small>
                                </span>
                            @endif
                        </div>

                        <div class="input-text">
                            <?= Form::text('country_residence', '', [
                                    'class' => 'form-control',
                                    'placeholder' => " Country and City of Residence *",
                                ]) ?>
                            @if ($errors->has('country_residence'))
                                <span class="help-block">
                                    <small>{{ $errors->first('country_residence') }}</small>
                                </span>
                            @endif
                        </div>

                        <div class="input-text">
                            <?= Form::text('Citizenship', '', [
                                    'class' => 'form-control datepicker',
                                    'placeholder' => ' Citizenship   *',
                                ]) ?>
                            @if ($errors->has('Citizenship'))
                                <span class="help-block">
                                    <small>{{ $errors->first('Citizenship') }}</small>
                                </span>
                            @endif
                        </div>


                        <div class="input-text">
                            <input type="text" name="address" id="address" class="form-control"
                                placeholder=" Address *">
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <small>{{ $errors->first('address') }}</small>
                                </span>
                            @endif

                        </div>
                        <div class="input-text">
                            <input type="text" name="phone" id="address" class="form-control" placeholder=" Phone *">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <small>{{ $errors->first('phone') }}</small>
                                </span>
                            @endif

                        </div>
                        <div class="input-text">
                            <?= Form::text('email', '', [
                                    'class' => 'form-control',
                                    'placeholder' => ' Email *',
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
                                    'placeholder' => " Social media account   *",
                                ]) ?>
                            @if ($errors->has('social_media_account'))
                                <span class="help-block">
                                    <small>{{ $errors->first('social_media_account') }}</small>
                                </span>
                            @endif
                        </div>


                        <div class="input-text">
                            <?= Form::text('educational', '', [
                                    'class' => 'form-control',
                                    'placeholder' => " Educational Institution  *",
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
                                    'placeholder' => " Field of studies *",
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
                                    'placeholder' => " Year of studies  *",
                                ]) ?>
                            @if ($errors->has('yearOfStudies'))
                                <span class="help-block">
                                    <small>{{ $errors->first('yearOfStudies') }}</small>
                                </span>
                            @endif
                        </div>



                        <div class="input-text">
                            <?= Form::text('expected_year_graduation', '', [
                                    'class' => 'form-control',
                                    'placeholder' => " Year of graduation *",
                                ]) ?>
                            @if ($errors->has('expected_year_graduation'))
                                <span class="help-block">
                                    <small>{{ $errors->first('expected_year_graduation') }}</small>
                                </span>
                            @endif
                        </div>

                        <div class="input-text" style="width:200px;">
                           
                            <select name="english_level" class="form-control">
                                <option value="">{{ __('main.english_level') }}: </option>
                                <option value="A1"> A1</option>
                                <option value="A2"> A2</option>
                                <option value="B1"> B1</option>
                                <option value="B2"> B2</option>
                                <option value="C1"> C1</option>
                                <option value="C2"> C2</option>
                            </select>
                            @if ($errors->has('english_level'))
                                <span class="help-block">
                                    <small>{{ $errors->first('english_level') }}</small>
                                </span>
                            @endif
                        </div>
                       
                        {{-- <br> --}}

                        <div class="input-text" style="width:200px;">
                            {{-- <span for="select-box" class="mr-4">{{__('main.level_of_italian')}}</span> --}}
                            <select name="level_of_italian" class="form-control">
                                <option value="">{{ __('main.level_of_italian') }}:</option>
                                <option value="A1">A1</option>
                                <option value="A1">A2</option>
                                <option value="B1">B1</option>
                                <option value="B2">B2</option>
                                <option value="C1">C1</option>
                                <option value="C2">C2</option>
                            </select>
                            @if ($errors->has('level_of_italian'))
                                <span class="help-block">
                                    <small>{{ $errors->first('level_of_italian') }}</small>
                                </span>
                            @endif
                        </div>
                        
                        {{-- <br> --}}







                        <div class="input-text">
                            <?= Form::text('other_languages', '', [
                                    'class' => 'form-control datepicker',
                                    'placeholder' => " Other language(s)",
                                ]) ?>
                            @if ($errors->has('other_languages'))
                                <span class="help-block">
                                    <small>{{ $errors->first('other_languages') }}</small>
                                </span>
                            @endif
                        </div>

                        <div class="py-4 form-control">
                            <span class="mr-4" for="radio_1">{{ __('main.can_you_be_fully') }} </span><br />
                            <div class="float-right">

                                <input class="mr-4" id="radio-1" type="radio" name="can_you_be_fully" value="yes"
                                    checked>
                                <label class="mr-6" for="radio-1">yes</label>
                                <input id="radio-2" type="radio" name="can_you_be_fully" value="no">
                                <label for="radio-2">no</label>
                            </div>
                        </div>

                        <div class="input-text">
                            <?= Form::textarea('about_you_eng', '', [
                                    'class' => 'form-control',
                                    'placeholder' => __('main.about_you_eng') . ' *',
                                ]) ?>
                            @if ($errors->has('about_you_eng'))
                                <span class="help-block">
                                    <small>{{ $errors->first('about_you_eng') }}</small>
                                </span>
                            @endif
                        </div>

                        <br>
                        <div class="submit-button">
                            {{ Form::submit(__('Send'), ['class' => 'btn-blue']) }}
                        </div>

                        <?php echo Form::close(); ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')

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
            padding-left: 30px;
            /* Add space for the custom radio button */
            cursor: pointer;
        }

        .english_level select {
            -moz-appearance: auto !important;

            /* -webkit-appearance: none; */
        }

        .level_of_italian {
            -moz-appearance: auto !important;
        }

        /* Style the custom radio button */
        label::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            /* Adjust the size as needed */
            height: 20px;
            /* Adjust the size as needed */
            border: 2px solid #007bff;
            /* Border color */
            background-color: #fff;
            /* Background color */
            border-radius: 50%;
            /* Make it round */
        }

        /* Style the custom radio button when it's checked */
        input[type="radio"]:checked+label::before {
            background-color: #007bff;
            /* Change background color when checked */
        }

        /* Style the label text (optional) */
        label {
            color: #333;
        }

        /* Style the label text when the radio button is checked (optional) */
        input[type="radio"]:checked+label {
            font-weight: bold;
            color: #007bff;

        }

        .main {
            justify-content: center;
            align-items: center;
            width: 50%;
        }

        .grid {
            justify-content: center;
            align-items: center;

        }

        @media (max-width: 1024px) {
            .form_blade {
                margin-top: 50px;
            }

        }

        /* WEWfrgthyjklp;tryuiop? */
    </style>
@endsection
