@php
    use App\Models\SubServiceDocumentMap;
@endphp
@extends('admin.layouts.main')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="page-content">

    <div class="container-fluid">


            <!-- Content -->

                    <div class=" ">


                        <h4 class="fw-bold py-3 mb-4">
                            <span class="  fw-light"> <strong>   Reports / నివేదికలు   </strong> </span>
                        </h4>

                        <div class="row">
                         <form action="" method="post">
                            @csrf
                            <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    Service Name / సేవ పేరు
                                    <select class="form-select" id="ser_id" name="ser_id">
                                        <option value="">Select Service / సేవను ఎంచుకోండి</option>
                                        @foreach ($service as $val)
                                        <option value="{{$val->service_id}}">{{$val->service_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                     Sub Service Name/ఉప సేవ పేరు
                                    <select class="form-select" id="sub_id" name="sub_id">
                                        <option value="">Select sub Service / సేవను ఎంచుకోండి</option>
                                        @foreach ($subservice as $val)
                                        <option value="{{$val->sub_service_id}}">{{$val->sub_service_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                     Select Document /  పత్రాలను ఎంచుకోండి
                                    <select class="form-select" name="doc_id" id="doc_id">
                                        <option value="">Select Document /  పత్రాలను ఎంచుకోండి</option>
                                        @foreach ($document as $val)
                                        <option value="{{$val->document_id}}">{{$val->document_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <small>&nbsp;</small>
                                    <button type="submit" style="color:#fff ;width: 100%" class="btn btn-primary" ><i class="menu-icon tf-icons bx bx-search"></i> Search</button>
                                </div>
                            </div>
                            </div>
                        </form>

<!--
                            <div class="col-md-2 dropdown ms-auto mb-3 text-end">
                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Filters
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#"><input type="text" class="form-control" /></a></li>
                                    <li><a class="dropdown-item" href="#">Service Name/సేవ పేరు</a></li>
                                    <li><a class="dropdown-item" href="#">Sub Service Name/ఉప సేవ పేరు</a></li>
                                    <li><a class="dropdown-item" href="#">Documents Name/పత్రాల పేరు</a></li>
                                </ul>
                            </div>
-->

                            <div class="col-md-12 mb-3 table-responsive">

                                <table class="table table-bordered">
                                    <thead style="background-color: rgba(105,108,255,.16) !important">
                                        <tr>
                                            <th width="5%">Sl. No. / క్రమసంఖ్య </th>
                                            <th width="20%">Service Name / సేవ పేరు</th>
                                            <th width="30%">Sub Service Name / ఉప సేవ పేరు</th>
                                            <th width="25%">Mapped Documents / మ్యాప్ చేయబడిన పత్రాలు</th>
                                            <th width="30%">Edit / సవరించు</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($link as $val)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$val->service->service_name}}</td>
                                            <td>{{$val->subservice->sub_service_name}}</td>
                                            <td>
                                                @php
                                                    $map = SubServiceDocumentMap::where('service_id', $val->service_id)
                                                    ->where('sub_service_id', $val->sub_service_id)->where('status','=','0')->get();
                                                @endphp
                                                @foreach ($map as $ks)
                                                    {{$ks->document->document_name}},
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{route('linkdocument.edit',['ser_id' => $val->service_id,'sub_id' =>$val->sub_service_id])}}" style="color:#fff !important;" class="btn btn-sm btn-primary mb-2"><i class="menu-icon tf-icons bx bx-edit"></i> Edit</a>
                                                <a onclick="delete_user({{$val->service_id}},{{$val->sub_service_id}})" style="color:#fff !important;" class="btn btn-sm btn-danger mb-2"><i class="menu-icon tf-icons bx bx-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

    </div>

</div>

@endsection
@push('scripts')
<script>
function delete_user(ser_id,sub_id) {
    var del = confirm("Are you sure you want to delete this record?");
    if (del == true) {
       // alert("record deleted")
        $.ajax({
            url: '{{ route('linkdocument.delete') }}',
            type: 'POST',
            data: {
                ser_id : ser_id,
                sub_id : sub_id,
                _token: '{{csrf_token()}}'
            },
            success: function(data, textStatus, xhr) {
                if (xhr.status == 201) {
                   toastr.success(data.msg);
                }
                setTimeout(function(){
                    window.location.href = '{{ route('reports') }}';}, 3000);

            },
             error: function(xhr, textStatus, errorThrown) {
        if (xhr.status == 422) {
            console.log(xhr);
        var errors = xhr.responseJSON.error;
        var error_msg = 'this Record have some Dependancy can`t Delete..!';
             toastr.error(error_msg);

        } else {
        toastr.error('An error occurred while deleting the record.');
        }
    }
        });
    } else {
        alert("Record Not Deleted");
    }

}

 </script>
@endpush
