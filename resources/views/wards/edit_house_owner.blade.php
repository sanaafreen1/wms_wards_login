
@extends('admin.layouts.main')
@section('content')

 <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h4 class="fw-bold  mb-4"  style="    padding-top: 4rem !important;">
                            <span class="text-muted fw-light">39 వ వార్డు కుటుంబ సభ్యుల జాబితా</span>
                        </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">

                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('wards_house_owner')}}"><i class="bx bx-home me-1"></i> House Owner Details</a>
                                        </li>


                                <div class="card mb-4">


                                    <div class="card-body">
                                        <form  id="housedetails" name="housedetails" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <input type="hidden" name="id" id="id" value="{{$house->id}}">
                                            <input type="hidden" name="basic_details_id" id="basic_details_id" value="session()->($item)" >
                                            <div class="row">
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Family owner name / కుటుంబ యజమాని పేరు </small>
                                                        <input type="text" class="form-control"   placeholder="" name="owner_name" id="owner_name" value="{{$house->owner_name}}">
                                                    </div>

                                                </div>



                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Date of Birth / పుట్టిన తేది </small>
                                                        <input type="date" class="form-control" id="date_of_birth" placeholder="" name="date_of_birth" value="{{$house->date_of_birth}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Mobile Number/మొబైల్ నంబర్ </small>
                                                        <input type="text" class="form-control" id="mobilenumber" placeholder="" name="mobilenumber" value="{{$house->mobilenumber}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Education / చదువు </small>
                                                        <select class="form-select" name="education"  id="education">
                                                            <option value="">-- Select --</option>
                                                           @foreach ($education as $item)
                                                           <option value="{{$item->id}}" {{$house->education==$item->id ? "selected" :""}}>{{$item->education}}\{{$item->telugu}}</option>
                                                           @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Education Details / విద్య వివరాలు </small>
                                                        <select class="form-select" name="education_details" id="education_details">
                                                            <option value="">-- Select --</option>
                                                           @foreach ($details as $item)
                                                           <option value="{{$item->id}}" {{$house->education_details==$item->id ? "selected" :""}}>{{$item->edu_details}}</option>
                                                           @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-4 pt-2">


                                                        <input type="checkbox" class="form-check-input"   name="staying_town" value="1" @if($house->staying_of_the_town == 1) checked @endif>
                                                        <small class="form-check-small" for="exampleCheck1"> Staying out of Town/టౌన్ వెలుపల ఉంటున్నారు </small>

                                                    </div>
                                                    <span id="staying_town"></span>
                                                </div>

                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Location of the Person / వ్యక్తి యొక్క స్థానం </small>
                                                        <select class="form-select" name="location_of_person" id="location_of_person"
                                                            <option value="">-- Select --</option>

                                                            <option value="Staying in the state" {{ old('location_of_person') == 'Staying in the state' ? 'selected' : '' }}>Staying in the state / రాష్ట్రంలోనే ఉంటున్నారు</option>
                                                            <option value="Staying out of the state" {{ old('location_of_person') == 'Staying out of the state' ? 'selected' : '' }}>Staying out of the state / రాష్ట్రం వెలుపల ఉంటున్నారు</option>
                                                            <option value="Staying out of the country" {{ old('location_of_person') == 'Staying out of the country' ? 'selected' : '' }}>Staying out of the country / దేశం వెలుపల ఉంటున్నారు</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Enter the Details / వివరాలను నమోదు చేయండి </small>
                                                        <input type="text" class="form-control"   placeholder=""  name="details" id="details" value="{{$house->details}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Occupation/వృత్తి </small>
                                                        <select class="form-select"  name="occupation" id="occupation">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($occupation as $item)
                                                            <option value="{{$item->id}}" {{$house->occupation==$item->id ? "selected" :""}}>{{$item->occupation}}/{{$item->telugu}}</option>

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Gender/లింగం </small>
                                                        <select class="form-select"  name="gender" id="gender">
                                  <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male / పురుషుడు</option>
                                  <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female / స్త్రీ</option>
                                  <option value="Others" {{ old('gender') == 'Others' ? 'selected' : '' }}>Others / ఇతరులు</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Blood Group / రక్తపు గ్రూపు </small>
                                                        <select class="form-select"  name="blood_group" id="blood_group">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($blood as $item)
                                                            <option value="{{$item->id}}"{{$house->blood_group==$item->id ? "selected" :""}}>{{$item->blood_group}}</option>

                                                            @endforeach


                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-4 pt-2">
                                                        <input type="checkbox" class="form-check-input" name="bp" value="1"{{ $house->bp ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="exampleCheck2"> B.P / బి.పి </label>
                                                    </div>
                                                    <span id="bp" ></span>
                                                </div>

                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-2 pt-2">
                                                        <input type="checkbox" class="form-check-input" name="sugar" value="1"{{ $house->sugar ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="exampleCheck3"> Sugar / షుగర్ </label>
                                                    </div>
                                                    <span  id="sugar" ></span>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-2 pt-2">
                                                        <input type="checkbox" class="form-check-input"name="covidvaccine" value="1"{{  $house->covid_vaccine ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="exampleCheck4"> Covid Vaccine / కోవిడ్‌కి టీకా </label>

                                                    </div>
                                                    <span  id="covidvaccine" ></span>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-2 pt-2">
                                                        <input type="checkbox" class="form-check-input"  name="pension" value="1"{{ $house->pension ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="exampleCheck5"> Pension / పెన్షన్ </label>

                                                    </div>
                                                    <span  id="pension"></span>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Type of Pension/పెన్షన్ రకం </small>
                                                        <select class="form-select"  name="type_pension" id="type_pension">
                                                            @foreach ($typ_of_pension as $datas)
                                                            <option value="{{$datas->id}}">{{$datas->type_of_pension}}/{{$datas->telugu}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Upload Photo / ఫోటోను అప్‌లోడ్ చేయండి్ </small>
                                                        <input type="file" class="form-control"  placeholder=""  name="upload_photo" id="upload_photo" value="{{$house->upload_photo}}">
                                                        <img src="{{asset('/images/' . $house->upload_photo)}}" class="img-thumbnail" height="50px" width="50px" >
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2 mb-2"  >Update / అప్డేట్ చేయండి</button>
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
      $('#housedetails').submit(function(e){
          e.preventDefault();
          // alert('hi');

       var formData = new FormData($(this)[0]);
       $.ajax({
          url : ' {{ route('wards_house.update') }} ',
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
            location.reload()
            }, 3000);
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
