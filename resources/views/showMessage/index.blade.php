<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        </style>
</head>
<body>
    
    
    @extends('layouts.admin')
    
       @section('content')
        <table class="table-responsive">
           
            <tr>
              <th>Name</th>
              <th>Surname</th>
              <th>Phone</th>
              <th>Birthday</th>
              <th>Country and City <br>
                of Residence</th>
             <th>Country and <br>
              City of Birth</th> 
              <th>Address</th>
              <th>Email</th>
              <th>Educational Institution</th>
              <th>Social Media account</th>
              <th>Level Of English</th>
              <th>Citizenship</th>
            </tr>
            @foreach ($showMessages as $showMessage)
            <tr>
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
                {{$showMessage->country_city }}
              </td>
              <td>
                {{$showMessage->country_residence}}
              </td>
              <td>           
                {{ $showMessage->address }}
              </td>
              <td>           
                {{ $showMessage->email }}
              </td>
              <td>           
                {{ $showMessage->educational }}
              </td>
              <td>           
                {{ $showMessage->social_media_account }}
              </td>
              <td>           
                {{ $showMessage->english_level }}
              </td>
              <td>           
                {{ $showMessage->Citizenship }}
              </td>
            </tr>
            @endforeach
          </table>

         
    {{-- @endforeach --}}
</body>

@endsection
</html>