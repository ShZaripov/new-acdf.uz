



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
@endsection