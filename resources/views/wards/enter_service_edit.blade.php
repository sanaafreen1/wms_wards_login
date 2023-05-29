
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
                                        <a class="nav-link active" href="{{route('wards_enter_service')}}"><i class="bx bx-file me-1"></i> Enter Service Details</a>
                                        </li>
                                </ul>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row mb-5">
                            <div class="col-md-6 mb-3">
                                <form action="" id="service_details" name="service_details" method="POST">
                              @csrf
                              <input type="hidden" name="id" id="id"value="">
                                    <div class="form-group">
                                    <small>Select Service / సేవను ఎంచుకోండి</small>
                                    <select class="form-select" name="service" id="service">
                                        <option value="">Select Service / సేవను ఎంచుకోండి</option>
                                        @foreach ($service as $store )
                                        <option value="{{$store->service_id}}" {{$update->service_id==$store->service_id ? "selected" :""}}>{{$store->service_name}}</option>
                                        {{-- <option value="{{$store->id}}" @if($store->id==$update->service_id) selected @endif>{{$store->service_name}}</option> --}}
                                        </option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <small>Select Sub Service/ఉప సేవను ఎంచుకోండి</small>
                                    <select class="form-select" name="subservice" id="subservice">
                                        <option value="">Select Sub Service / సేవను ఎంచుకోండి</option>
                                        @foreach ($subservice as $sub)
                                        <option value="{{$sub->sub_service_id}}" {{ $sub->sub_service_id == $update->sub_service_id ? 'selected' : '' }}>{{$sub->sub_service_name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <small>Select Documents / పత్రాలను ఎంచుకోండి</small>
                                    <ul class="m-0 p-0 s-doc-mobile">

                                        @foreach ($document as $val)
                                        <li class="align-items-start d-flex me-3 float-start">
                                            <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" name="document[]" id="document" value="{{$val->document_id}}"{{  $update->document ? 'checked' : '' }}></span>
                                            <span class="p-1">{{$val->document_name}}</span>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <small>Status /  పరిస్థితి </small>
                                    <select class="form-select">
                                        <option value="">Select Status / పరిస్థితి ఎంచుకోండి</option>
                                        <option value=""> </option>
                                        <option value=""> </option>
                                        <option value=""> </option>
                                        <option value=""> </option>
                                    </select>
                            </div>


                            <div class="col-md-2 mb-3 ms-auto">
                                <div class="form-group text-end">
                                    <small>&nbsp;</small>
                                    <input type="submit" class="btn btn-primary" value="Update / అప్డేట్ చేయండి">
                                </div>
                            </div>
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
    $('#service').on(5674);
</script>

<script>
    $(document).ready(function() {
      $('#service_details').submit(function(e){
          e.preventDefault();
          // alert('hi');
       var formData = new FormData($(this)[0]);
       $.ajax({
          url : ' {{ route('wards_enter_service.create') }} ',
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
          window.location.href = '{{ route('wards_enter_service') }}';}, 3000);
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
