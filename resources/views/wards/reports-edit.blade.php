@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h4 class="fw-bold  mb-4"  style="    padding-top: 4rem !important;">
                            <span class="text-muted fw-light">39 వ వార్డు కుటుంబ సభ్యుల జాబితా</span>
                        </h4>

                        <div class="row ">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('wards_add_member')}}"><i class="bx bx-user me-1"></i> Basic Details</a>
                                        </li>

                                </ul>

                                <div class="card mb-4">

                                    <div class="card-body">
                                        <form  id="addmemberform" method="POST" name="addmemberform">
                                            @csrf
                                            <div class="row align-items-end">
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1">House No / ఇంటి నెం</small>
                                                        <input type="text" class="form-control" id="housenumber" placeholder="" name="housenumber"  value="{{ $basic->housenumber}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"  > House Details / ఇంటి వివరాలు </small>
                                                        <div class="d-flex align-items-center ">
                                                            <div class="radio-btnn p-2">
                                                                <input type="radio" id=" " name="housedetails" value="owned">
                                                                <label for="owned" class="ms-1">Owned/స్వంతం</label>
                                                            </div>
                                                            <div class="radio-btnn p-2">
                                                                <input type="radio" id=" " name="housedetails" value="rent">
                                                                <label for="rent" class="ms-1">Rented/అద్దె</label>
                                                            </div>
                                                        </div>
                                                        <span id="housedetails"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Type of the House / ఇంటి రకం </small>
                                                        <select class="form-select" name="housetypes" id="housetypes"  value="">
                                                            <option value="">-- Select --</option>


                                                            <option value="">-- Select --</option>
                                                            <option value="Slab">Slab / స్లాబ్ </option>
                                                            <option value="Gunapenka"> Gunapenka / గూనపెంక </option>
                                                            <option value="Flakes">Flakes / రేకులు </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Religion / మతం </small>
                                                        <select class="form-select" name="religion" id="religion"  value="{{old('religion')}}">
                                                            <option value="">-- Select --</option>
                                                            <option value="Hindu"> Hindu / హిందూ </option>
                                                            <option value="Muslim"> Muslim / ముస్లిం</option>
                                                            <option value="Christianity"> Christianity / క్రైస్తవ </option>
                                                            <option value="Sikhism">Sikhism / సిక్కు</option>
                                                            <option value="Jainism"> Jainism / జైన </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Caste / కులము </small>
                                                        <select class="form-select" name="caste" id="caste"  value="{{old('caste')}}">
                                                            <option value="">-- Select --</option>
                                                            <option value="BC"> BC / బీసీ</option>
                                                            <option value="OC"> OC / ఓసీ</option>
                                                            <option value="SC"> SC / ఎస్సీ </option>
                                                            <option value="ST"> ST/ఎస్సీ </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1">Annual Income / సంవత్సర ఆదాయం</small>
                                                        <input type="text" class="form-control" id="income" placeholder="" name="income"  value="{{old('income')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1" > Ration card / రేషన్ కార్డు</small>
                                                        <div class="d-flex align-items-center ">
                                                            <div class="radio-btnn p-2">
                                                                <input type="radio" id=" " name="rationcard" value="Yes">
                                                                <label for="Yes" class="ms-1">Yes</label>
                                                            </div>
                                                            <div class="radio-btnn p-2">
                                                                <input type="radio" id=" " name="rationcard" value="no">
                                                                <label for="no" class="ms-1">No</label>
                                                            </div>
                                                        </div>
                                                        <span id="rationcard"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Type of Ration card / రేషన్ కార్డు రకం </small>
                                                        <select class="form-select" name="typeofrationcard" id="typeofrationcard"  value="{{old('typeofrationcard')}}">
                                                            <option value="">-- Select --</option>
                                                            <option value="Pink"> Pink / గులాబి</option>
                                                            <option value="White"> White / తెలుపు</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-4 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Enter Ration Card Number/రేషన్ కార్డ్ నంబర్&zwnj;ను నమోదు చేయండి </small>
                                                        <input type="text" name="rationcardnumber" class="form-control" id="rationcardnumber" placeholder=""  value="{{old('rationcardnumber')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2 input-felds">
                                                    <div class="form-group">
                                                        <small class="mb-1"> Address/Street /అడ్రస్ / వీధి </small>
                                                        <textarea rows="5" name="address" id="address" class="form-control">{{old('address')}}</textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2 mb-2">Save changes</button>
                                                <a href="{{route('wards_house_owner')}}" class="btn btn-outline-secondary mb-2">Add House Owner Details / ఇంటి యజమాని వివరాలను జోడించండి</a>
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
      $('#addmemberform').submit(function(e){
          e.preventDefault();
          // alert('hi');
       var formData = new FormData($(this)[0]);
       $.ajax({
          url : ' {{ route('wards_add_member.create') }} ',
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
          window.location.href = '{{ route('wards_house_owner') }}';}, 3000);
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

