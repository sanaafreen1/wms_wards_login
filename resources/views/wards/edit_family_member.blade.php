@extends('admin.layouts.main')
@section('content')

  <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h4 class="fw-bold mb-4"  style="    padding-top: 4rem !important;">
                            <span class="text-muted fw-light">39 వ వార్డు కుటుంబ సభ్యుల జాబితా</span>
                        </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">


                                    <li class="nav-item">
                                        <a class="nav-link active" href=""><i class="bx bx-group me-1"></i> Family Members Details</a>
                                        </li>

                                </ul>
                                <div class="card mb-4">

                                    <div class="card-body">
                                    <form  method="post"  id="familyForm" name="familyForm" enctype="multipart/form-data">
                                       @csrf
                                       <input type="hidden" name="id" id="id" value="{{$family->id}}">
                                            <div class="row">
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Relation with House Owner / ఇంటి యజమానితో సంబంధం </small>
                                                        <select class="form-select" id="relation_with_houseowner" name="relation_with_houseowner">
                                                            <option value="">-- Select --</option>
                                                            @if ($family->relation_with_houseowner==1)
                                                            <option value="1" selected>owner/యజమాని</option>
                                                            @else
                                                            @foreach ($relation as $relations)
                                                            <option value="{{$relations->id}}" {{$family->relation_with_houseowner==$relations->id ? "selected" :""}}> {{$relations->relation_name}}\{{$relations->telugu}}</option>
                                                            @endforeach
                                                            @endif



                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Member Name / సభ్యుని పేరు </small>
                                                        <input type="text" id="member_name" name="member_name" class="form-control" id="" placeholder="" value="{{$family->member_name}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Date of Birth / పుట్టిన తేది </small>
                                                        <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" id="" placeholder="" value="{{$family->date_of_birth}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Mobile Number/మొబైల్ నంబర్ </small>
                                                        <input type="number" id="mobile" name="mobile" class="form-control" id="" placeholder="" value="{{$family->mobile}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Education / చదువు </small>
                                                        <select class="form-select" id="education" name="education">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($education as $edu)
                                                            <option value="{{$edu->id}}" {{$family->education==$edu->id ? "selected" :""}}> {{$edu->education}}\{{$edu->telugu}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Education Details / విద్య వివరాలు </small>
                                                        <select class="form-select" id="education_details" name="education_details">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($education_details as $details)
                                                            <option value="{{$details->id}}"  {{$family->education_details==$details->id ? "selected" :""}}> {{$details->edu_details}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-3 pt-2">
                                                        <input type="checkbox" class="form-check-input" name="staying_out_oftown"  value="yes" {{ $family->staying_out_oftown=="yes"? 'checked':'' }} >
                                                        <label class="form-check-label" for="exampleCheck1"> Staying out of Town/టౌన్ వెలుపల ఉంటున్నారు </label>

                                                    </div>
                                                    <span id="staying_out_oftown"></span>

                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Location of the Person / వ్యక్తి యొక్క స్థానం </small>
                                                        <select class="form-select"  name="location_ofthe_person"  id="location_ofthe_person" value="{{$family->location_ofthe_person}}">
                                                            <option value="">-- Select --</option>
                                                            <option value="Staying in the state" {{ old('location_ofthe_person') == 'Staying in the state' ? 'selected' : '' }}>Staying in the state / రాష్ట్రంలోనే ఉంటున్నారు</option>
                                                            <option value="Staying out of the state" {{ old('location_ofthe_person') == 'Staying out of the state' ? 'selected' : '' }}>Staying out of the state / రాష్ట్రం వెలుపల ఉంటున్నారు</option>
                                                            <option value="Staying out of the country" {{ old('location_ofthe_person') == 'Staying out of the country' ? 'selected' : '' }}>Staying out of the country / దేశం వెలుపల ఉంటున్నారు</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group ">
                                                        <small class="mb-1"> Enter the Details / వివరాలను నమోదు చేయండి </small>
                                                        <input type="text" class="form-control" id="enter_the_details" name="enter_the_details" id="" placeholder="" value="{{$family->enter_the_details}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Occupation/వృత్తి </small>
                                                        <select class="form-select" id="occupation" name="occupation">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($occupation as $occupations)
                                                            <option value="{{$occupations->id}}" {{$family->occupation==$occupations->id ? "selected" :""}}>{{$occupations->occupation}}/{{$occupations->telugu}}</option>

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Gender/లింగం </small>
                                                        <select class="form-select" id="gender" name="gender"  >
                                                            <option value="">-- Select --</option>
                                                            <option value="Male"> Male / పురుషుడు</option>
                                                            <option value="Female"> Female / స్త్రీ </option>
                                                            <option value="Others"> Others / ఇతరులు</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Blood Group / రక్తపు గ్రూపు </small>
                                                        <select class="form-select" id="blood_group" name="blood_group">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($blood_group as $blood)
                                                            <option value="{{$blood->id}}"  {{$family->occupation==$blood->id ? "selected" :""}}>{{$blood->blood_group}}</option>

                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">

                                                    <div class="form-check mt-4">
                                                        <input type="checkbox" class="form-check-input" name="b_p" value="yes"  {{ $family->b_p=="yes"? 'checked':'' }}   >
                                                        <label class="form-check-label" for="exampleCheck2"> B.P / బి.పి </label>
                                                        <span id="b_p"></span>
                                                    </div>

                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-2 pt-2">
                                                        <input type="checkbox" class="form-check-input" name="sugar" value="yes"  {{ $family->sugar=="yes"? 'checked':'' }} >
                                                        <label class="form-check-label" for="exampleCheck3"> Sugar / షుగర్ </label>
                                                    </div>
                                                    <span  id="sugar" ></span>
                                                </div>

                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-4">
                                                        <input type="checkbox" class="form-check-input" name="covid_vaccine" value="yes"  {{ $family->covid_vaccine=="yes"? 'checked':'' }}>
                                                        <label class="form-check-label" for="exampleCheck4"> Covid Vaccine / కోవిడ్‌కి టీకా </label>

                                                    </div>
                                                    <span id="covid_vaccine"></span>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-4">
                                                        <input type="checkbox" class="form-check-input" name="pension" value="yes" {{ $family->pension=="yes"? 'checked':'' }}>
                                                        <label class="form-check-label" for="exampleCheck5"> Pension / పెన్షన్ </label>

                                                    </div>
                                                    <span id="pension"></span>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Type of Pension/పెన్షన్ రకం </small>
                                                        <select class="form-select" id="type_of_pension" name="type_of_pension">
                                                            <option value="">-- Select --</option>
                                                           @foreach ($typ_of_pension as $pension)
                                                           <option value="{{$pension->id}}"  {{$family->occupation==$pension->id ? "selected" :""}}>{{$pension->type_of_pension}}/{{$pension->telugu}}</option>

                                                           @endforeach


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Upload Photo / ఫోటోను అప్‌లోడ్ చేయండి్ </small>
                                                        <input type="file" class="form-control" id="upload_photo" name="upload_photo" id="" placeholder="" value="">
                                                    </div>
                                                </div>

<!--
                                                <div class="col-md-12 col-12 m-auto text-center">
                                                    <button class="btn btn-primary ">
                                                        <i class="fa-solid fa-plus fa-beat-fade" style="color: #fff; margin-right:5px;"></i> Add Pending Problems Details / పెండింగ్‌లో ఉన్న సమస్యల వివరాలను జోడించండి </button>
                                                </div>
-->
                                            </div>

                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2">Update Changes</button>
                                                <a href="{{route('wards_enter_service')}}" class="btn btn-outline-secondary">Add Service Details / సేవ వివరాలను జోడించండి </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>

                            </div>

                        </div>



                    </div>
                    <!-- / Content -->




                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                © 2023 ALl Rights Reserved by Ward Details.
                            </div>

                        </div>
                    </footer>
                    <!-- / Footer -->


                    <div class="content-backdrop fade"></div>
                </div>

@endsection
@push('scripts')
<script>
 $(document).ready(function() {
      $('#familyForm').submit(function(e){
          e.preventDefault();
          // alert('hi');
       var formData = new FormData($(this)[0]);
       $.ajax({
          url : ' {{ route('wards_family_member.update') }} ',
          type : 'POST',
          data : formData,
          cache : false,
          async : false,
          processData : false,
          contentType : false,
          success: function(response) {
          // Check if operation was successful
          if (response.status === 'success') {
              // Show toastr message
              toastr.success('Data updated successfully!');
           setTimeout(function(){
          window.location.href = '{{ route('wards_family_member') }}';}, 3000);
          } else {
              toastr.error('Error inserting data!');
          }

      },
      error: function(jqXHR, textStatus, errorThrown) {
    $('.input-error').remove();
    $('input').removeClass('is-invalid');

    if (jqXHR.status == 422) {
        for (const [key, value] of Object.entries(jqXHR.responseJSON.errors)) {

          toastr.error(value);

            $('#'+key).addClass('is-invalid');
            $('#'+key).after(
                '<span class="text-danger input-error" role="alert">' + value +
                '</span>');
        }
    } else {
        alert('something went wrong! please try again..');
     }
  }
       });
      });
  });




</script>

@endpush
