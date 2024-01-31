<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>



</head>

<body>


    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="mb-4">
                    <th style="background-color: powderblue" class="mb-4">Id</th>
                    <th style="background-color: powderblue">Name</th>
                    <th style="background-color: powderblue">Surname</th>
                    <th style="background-color: powderblue">Phone</th>
                    <th style="background-color: powderblue">Birthday</th>
                    <th style="background-color: powderblue">Country and City
                        of Residence</th>
                    <th style="background-color: powderblue">Country and
                        City of Birth</th>
                    <th style="background-color: powderblue">Citizenship</th>
                    <th style="background-color: powderblue">Address</th>
                    <th style="background-color: powderblue">Email</th>
                    <th style="background-color: powderblue">Social Media account</th>
                    <th style="background-color: powderblue">Educational Institution</th>
                    <th style="background-color: powderblue">Field of studies</th>
                    <th style="background-color: powderblue">Year of studies</th>
                    <th style="background-color: powderblue">Year of graduation</th>
                    <th style="background-color: powderblue">Level Of English:</th>
                    <th style="background-color: powderblue">Level of Italian:</th>
                    <th style="background-color: powderblue">Other Language(s)</th>
                    <th style="background-color: powderblue">Can you be fully available from August
                        18th until October 1th, 2024?</th>
                    <th style="background-color: powderblue">About You (English)</th>
                </tr>
            </thead>
            @foreach ($showMessages as $showMessage)
                <tbody>
                    <tr>
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
                            {{ $showMessage->country_residence }}
                        </td>
                        <td>
                            {{ $showMessage->country_city }}
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




                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
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
