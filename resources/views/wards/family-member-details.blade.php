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
                                        <a class="nav-link" href="{{route('wards_add_member')}}"><i class="bx bx-user me-1"></i> Basic Detials</a>
                                        </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('wards_house_owner')}}"><i class="bx bx-home me-1"></i> House Owner Details</a>
                                        </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('wards_family_member')}}"><i class="bx bx-group me-1"></i> Family Members Details</a>
                                        </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('wards_enter_service')}}"><i class="bx bx-file me-1"></i> Enter Service Details</a>
                                        </li>
                                </ul>
                                <div class="card mb-4">

                                    <div class="card-body">
                                            <form  method="post"  id="wardsForm" name="wardsForm">

                                       @csrf
                                            <div class="row">
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Relation with House Owner / ఇంటి యజమానితో సంబంధం </small>
                                                        <select class="form-select" name="relation_with_houseowner">
                                                            <option value="">-- Select --</option>
                                                            <option value="Wife"> Wife/భార్య </option>
                                                            <option value="Father"> Father/తండ్రి </option>
                                                            <option value="Mother"> Mother/తల్లి </option>
                                                            <option value="Daughter"> Daughter/కూతురు </option>
                                                            <option value="Son"> Son/కొడుకు</option>
                                                            <option value="Brother"> Brother/సోదరుడు</option>
                                                            <option value="Sister"> Sister/సోదరి</option>
                                                            <option value="Son-In-Law"> Son-In-Law/అల్లుడు</option>
                                                            <option value="Daughter"> Daughter-In-Law/కోడలు</option>
                                                            <option value="Mother-In-Law"> Mother-In-Law/అత్తగారు</option>
                                                            <option value="Father-In-Law"> Father-In-Law/మామగారు</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Member Name / సభ్యుని పేరు </small>
                                                        <input type="text" name="member_name" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Date of Birth / పుట్టిన తేది </small>
                                                        <input type="date" name="date_of_birth" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Mobile Number/మొబైల్ నంబర్ </small>
                                                        <input type="text" name="mobile" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Education / చదువు </small>
                                                        <select class="form-select" name="education">
                                                            <option value="">-- Select --</option>
                                                            <option value="Illiterate"> Illiterate/నిరక్షరాస్యుడు </option>
                                                            <option value="Pursuing School"> Pursuing School / పాఠశాలను కొనసాగిస్తోంది </option>
                                                            <option value="Completed Schooling"> Completed Schooling / పాఠశాల విద్య పూర్తి చేశారు</option>
                                                            <option value="Pursuing Degree"> Pursuing Degree / డిగ్రీని అభ్యసిస్తున్నారు</option>
                                                            <option value=" Completed Degree"> Completed Degree / డిగ్రీ పూర్తి చేశారు </option>
                                                            <option value="Pursuing PG"> Pursuing PG / పీజీ చదువుతున్నారు </option>
                                                            <option value="Completed PG"> Completed PG / పీజీ పూర్తి చేశారు </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Education Details / విద్య వివరాలు </small>
                                                        <select class="form-select" name="education_details">
                                                            <option value="">-- Select --</option>
                                                            <option value="BBA"> BBA </option>
                                                            <option value="Bcom"> Bcom </option>
                                                            <option value="Btech"> Btech </option>
                                                            <option value="BSC"> BSC </option>
                                                            <option value="BZC"> BZC </option>
                                                            <option value="MSC"> MSC </option>
                                                            <option value="MBA"> MBA </option>
                                                            <option value="MCA">MCA</option>
                                                            <option value="Mtech">Mtech</option>
                                                            <option value="Mcom">Mcom</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-3 pt-2">
                                                        <input type="checkbox" class="form-check-input" name="staying_out_oftown" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1"> Staying out of Town/టౌన్ వెలుపల ఉంటున్నారు </label>

                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Location of the Person / వ్యక్తి యొక్క స్థానం </small>
                                                        <select class="form-select" name="location_ofthe_person">
                                                            <option>-- Select --</option>
                                                            <option value="Staying in the state"> Staying in the state / రాష్ట్రంలోనే ఉంటున్నారు </option>
                                                            <option value="Staying out of the state"> Staying out of the state / రాష్ట్రం వెలుపల ఉంటున్నారు </option>
                                                            <option value="Staying out of the country"> Staying out of the country / దేశం వెలుపల ఉంటున్నారు </option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group ">
                                                        <small class="mb-1"> Enter the Details / వివరాలను నమోదు చేయండి </small>
                                                        <input type="text" class="form-control" name="enter_the_details" id="" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Occupation/వృత్తి </small>
                                                        <select class="form-select" name="occupation">
                                                            <option value="">-- Select --</option>
                                                            <option value="Lawyer"> Lawyer / న్యాయవాది </option>
                                                            <option value="Docter"> Docter / వైద్యుడు </option>
                                                            <option value="Engineer"> Engineer/ ఇంజనీర్ </option>
                                                            <option value="Private Employee"> Private Employee / ప్రైవేట్ ఉద్యోగి </option>
                                                            <option value="Bank Employee"> Bank Employee / బ్యాంకు ఉద్యోగి</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Gender/లింగం </small>
                                                        <select class="form-select" name="gender">
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
                                                        <select class="form-select" name="blood_group">
                                                            <option value="">-- Select --</option>
                                                            <option value="A++"> A+</option>
                                                            <option value="A"> A- </option>
                                                            <option value="B+"> B+</option>
                                                            <option value="B-"> B- </option>
                                                            <option value="O+"> O+ </option>
                                                            <option value="O-="> O- </option>
                                                            <option value="AB+"> AB+ </option>
                                                            <option value="AB-"> AB- </option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-4">
                                                        <input type="checkbox" class="form-check-input" name="b_p" id="exampleCheck2">
                                                        <label class="form-check-label" for="exampleCheck2"> B.P / బి.పి </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-4">
                                                        <input type="checkbox" class="form-check-input" name="sugar"id="exampleCheck3">
                                                        <label class="form-check-label" for="exampleCheck3"> Sugar / షుగర్ </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-4">
                                                        <input type="checkbox" class="form-check-input" name="covid_vaccine" id="exampleCheck4">
                                                        <label class="form-check-label" for="exampleCheck4"> Covid Vaccine / కోవిడ్‌కి టీకా </label>

                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-check mt-4">
                                                        <input type="checkbox" class="form-check-input" name="pension"id="exampleCheck5">
                                                        <label class="form-check-label" for="exampleCheck5"> Pension / పెన్షన్ </label>

                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Type of Pension/పెన్షన్ రకం </small>
                                                        <select class="form-select" name="type_of_pension">
                                                            <option value="">-- Select --</option>
                                                            <option value="Old Age Pension"> Old Age Pension/వృద్ధాప్య పెన్షన్</option>
                                                            <option value="Widow Pension"> Widow Pension/వితంతు పింఛను </option>
                                                            <option value="Disabled Pension">Disabled Pension/వికలాంగుల పెన్షన్</option>
                                                            <option value="Beedi Workers Pension"> Beedi Workers Pension/బీడీ కార్మికుల పెన్షన్ </option>
                                                            <option value="Single Women Pension"> Single Women Pension/ఒంటరి మహిళల పెన్షన్ </option>
                                                            <option value="Persons with HIV-AIDS Pension/HIV-AIDS"> Persons with HIV-AIDS Pension/HIV-AIDS పెన్షన్ ఉన్న వ్యక్తులు</option>
                                                            <option value="Weavers Pension"> Weavers Pension/నేత కార్మికుల పెన్షన్ </option>
                                                            <option value="Filaria Patient Pension"> Filaria Patient Pension/ఫైలేరియా పేషెంట్ పెన్షన్ </option>
                                                            <option value="Toddy Tappers Pension"> Toddy Tappers Pension/టాడీ ట్యాపర్స్ పెన్షన్ </option>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Upload Photo / ఫోటోను అప్‌లోడ్ చేయండి్ </small>
                                                        <input type="file" class="form-control" name="upload_photo" id="" placeholder="">
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
                                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                                                <a href="enter-service-details.html" class="btn btn-outline-secondary">Add Service Details / సేవ వివరాలను జోడించండి </a>
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
      $('#wardsForm').submit(function(e){
          e.preventDefault();
          // alert('hi');
       var formData = new FormData($(this)[0]);
       $.ajax({
          url : ' {{ route('wards_family_member.create') }} ',
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
              toastr.success('Data inserted successfully!');
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
