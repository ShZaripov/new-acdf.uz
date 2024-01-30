<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style> --}}
</head>

<body>


    @extends('layouts.admin')

    @section('content')
        <div class="row">
            <div class="col-lg-12">
                {{-- <div class="object-link pull-right">
                <strong>Перейти:</strong>
                <a href="{{ route('site.activities') }}" target="_blank">{{ route('site.activities') }}</a>
            </div> --}}
                <h1 class="page-header">Information</h1>
            </div>
        </div>
        <div class="clearfix">
            <a href="{{ route('exportExcel') }}" class="btn btn-primary pull-right">скачать excell </a>
        </div>
        <br>

        <div class="table-reponsive">
            <table class="table">
                {{ tableLength($showMessages)['lengthPage'] }}
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Phone</th>
                        <th>Birthday</th>
                        <th>Country and
                            City of Birth</th>
                        <th>Country and City
                            of Residence</th>
                        <th>Citizenship</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Social Media account</th>
                        <th>Educational Institution</th>
                        <th>Field of studies</th>
                        <th>Year of studies</th>
                        <th>Year of graduation</th>
                        <th>Level Of English:</th>
                        <th>Level of Italian:</th>

                        <th>Other Language(s)</th>
                        <th>Can you be fully available</th>
                        <th>About You (English)</th>
                        {{-- <th>show</th>
                        <th>edit</th>
                        <th>delete</th> --}}
                    </tr>
                </thead>
                <?php if ($showMessages): ?> 
                <tbody>
                    <?php $i = tableLength($showMessages)['startPage']; foreach ($showMessages as $showMessage): ?>
                    {{-- @foreach ($showMessages as $showMessage) --}}
                

                    <tr>
                        <td>{{ $i }}</td>
                        <td>
                            {{ $showMessage->id }}
                        </td>
                        <td>
                            {{ $showMessage->name }}
                        </td>
                        <td>
                            {{ $showMessage->surname }}
                        </td>
                        <td>
                            {{ $showMessage->phone }}
                        </td>
                        <td>
                            {{ $showMessage->birthday }}
                        </td>
                        <td>
                            {{ $showMessage->country_city }}
                        </td>
                        <td>
                            {{ $showMessage->country_residence }}
                        </td>
                        <td>
                            {{ $showMessage->Citizenship }}
                        </td>
                        <td>
                            {{ $showMessage->address }}
                        </td>
                        <td>
                            {{ $showMessage->email }}
                        </td>
                        <td>
                            {{ $showMessage->social_media_account }}
                        </td>
                        <td>
                            {{ $showMessage->educational }}
                        </td>
                        <td>
                            {{ $showMessage->failOf_studies }}
                        </td>
                        <td>
                            {{ $showMessage->yearOfStudies }}
                        </td>
                        <td>
                            {{ $showMessage->expected_year_graduation }}
                        </td>
                        <td>
                            {{ $showMessage->english_level }}
                        </td>
                        <td>
                            {{ $showMessage->level_of_italian }}
                        </td>

                        <td>
                            {{ $showMessage->other_languages }}
                        </td>
                        <td>
                            {{ $showMessage->can_you_be_fully }}
                        </td>
                        <td>
                            {{ $showMessage->about_you_eng }}
                        </td>

                        {{--  --}}
                    </tr>
                    <?php $i++; endforeach ?>
                </tbody>
            <?php endif ?>

                {{-- @endforeach --}}
            </table>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                {{ $showMessages->links() }}
            </div>
        </div>

        {{-- @endforeach --}}
    
@endsection

        @section('css')
            <style>
                #loader {
                    position: absolute;
                    right: 18px;
                    top: 30px;
                    width: 20px;
                }
            </style>
        @endsection
    </body>
</html>
