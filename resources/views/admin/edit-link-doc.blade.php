@extends('admin.layouts.main')
@section('content')
    <style>
        input.largerCheckbox {
            width: 20px;
            height: 20px;
            display: inline
        }

        @media only screen and (max-width: 600px) {
            .s-doc-mobile li {
                width: 100%;
            }
        }
    </style>

    <div class="page-content">

        <div class="container-fluid">

            <div class="">


                <h4 class="fw-bold py-3 mb-4">
                    <span class=" fw-light"><strong> Link Documents to Services/సేవలకు పత్రాలను లింక్ చేయండి </strong>
                    </span>
                </h4>
                 <form action="" method="post" id="link_doc" name="link_doc">
                    @csrf
                <div class="row mb-5">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            Select Service / సేవను ఎంచుకోండి
                            <select class="form-select" name="service" id="service">
                                <option value="">Select Service / సేవను ఎంచుకోండి</option>
                                @foreach ($service as $services)
                                <option value="{{$services->service_id}}" {{$services->service_id == $ser_id ? 'selected': ''}} >{{$services->service_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            Select Sub Service/ఉప సేవను ఎంచుకోండి
                            <select class="form-select" name="sub_service" id="sub_service">
                                <option value="">Select Sub Service / సేవను ఎంచుకోండి</option>
                                @foreach ($sub_service as $val)
                                <option value="{{$val->sub_service_id}}" {{$val->sub_service_id == $sub_id ? 'selected': ''}}>{{$val->sub_service_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

            @foreach ($updateser as $update)
            <input type="hidden" id="map_id" name="map_id[]" value="{{$update->id}}"/>
            @php
            $all[]=$update->document_id;
            @endphp
            @endforeach

                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <small>Select Documents / పత్రాలను ఎంచుకోండి</small>
                            <ul class="m-0 p-0 s-doc-mobile">
                               @foreach ($document as $data)

                               @if(in_array($data->document_id,$all))
                                 @php
                                     $checked = 'checked';
                                 @endphp
                                @else
                                @php
                                     $checked = null;
                                 @endphp
                               @endif
                                <li class="align-items-start d-flex me-3 float-start">
                                    <span class="p-1"><input type="checkbox" class="largerCheckbox mt-1" name="documents[]" id="documents" value="{{$data->document_id}}"  {{$checked}}  /></span>
                                    <span class="p-1" >{{$data->document_name}}</span>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>



                    <div class="col-md-2 mb-3 ms-auto">
                        <div class="form-group text-end">
                            <small>&nbsp;</small>
                            <input type="submit" class="btn btn-primary" value="Update / సేవ్ చేయండి" />
                        </div>
                    </div>
                </div>
              </div>


        </div>
    </form>

    </div>
@endsection
@push('scripts')
<script>
    $('#service').on('change', function() {
          var id = this.value;
          // alert(company_id);
          $("#sub_service").html('');
          $.ajax({
          url:"{{route('getsubservice')}}",
          type: "POST",
          data: {
          id: id,
          _token: '{{csrf_token()}}'
          },
          dataType : 'json',
          success: function(result){
              //alert(result.model);
          $('#sub_service').html('<option value="">Select Sub Service / సేవను ఎంచుకోండి</option>');
          $.each(result.subservice,function(key,value){
          $("#sub_service").append('<option value="'+value.sub_service_id+'">'+value.sub_service_name+'</option>');
          //  alert(value.id);
          });
          }
          });
          });
</script>

<script>
    $(document).ready(function() {
      $('#link_doc').submit(function(e){
          e.preventDefault();
        //   alert('hi');
       var formData = new FormData($(this)[0]);
       $.ajax({

          url : ' {{ route('linkdocument.update') }} ',
          type : 'POST',
          data :formData,
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
          window.location.href = '{{ route('reports') }}';}, 3000);
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
