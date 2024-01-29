<table class="table">
    {{-- {{ tableLength($model)['lengthPage'] }} --}}
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Phone</th>
        <th>Birthday</th>
        <th>Country and City
            of Residence</th>
        <th>Country and
            City of Birth</th>
        <th>Citizenship</th>
        <th>Address</th>
        <th>Email</th>
        <th>Social Media account</th>
        <th>Educational Institution</th>
        <th>Field of studies</th>
        <th>Level Of English:</th>
        <th>Level of Italian:</th>
        <th>Other Language(s)</th>
        <th>Can you be fully available from August
          18th until October 1th, 2024?</th>
        <th>About You (English)</th>
    </tr>
    @foreach ($showMessages as $showMessage)
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
            {{ $showMessage->english_level }}
        </td>
        <td>
            {{ $showMessage->level_of_italian }}
        </td>

       
        <td>
            {{ $showMessage->expected_year_graduation }}
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
</table>