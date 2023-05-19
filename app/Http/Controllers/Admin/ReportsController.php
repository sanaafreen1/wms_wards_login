<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubServiceDocumentMap;
use App\Models\CitizenServiceMst;
use App\Models\CitizenSubServiceMst;
use App\Models\DocumentMst;

class ReportsController extends Controller
{
    public function reports(Request $request)
    {
        $regData = $request->all();
        $ser_id = $regData['ser_id'] ?? '';
        $sub_id = $regData['sub_id'] ?? '';
        $doc_id = $regData['doc_id'] ?? '';
        // dd($doc_id);
        $service = CitizenServiceMst::where('status', '=', '0')->get();
        $subservice = CitizenSubServiceMst::where('status', '=', '0')->get();
        $document = DocumentMst::where('status', '=', '0')->get();
        $search = SubServiceDocumentMap::where('status','=','0')
        ->groupBy('service_id','sub_service_id')->get(['service_id','sub_service_id','document_id']);

        if($ser_id == null && $sub_id == null && $doc_id == null)
        {
            $search = SubServiceDocumentMap::where('status','=','0')
            ->groupBy('service_id','sub_service_id')->get(['service_id','sub_service_id']);
        }
        else
        {

          if(!empty($ser_id))
          {
            $search = $this->SearchService($ser_id,$search);
          }
          if(!empty($sub_id))
          {
            $search = $this->SearchSubService($sub_id,$search);
          }
          if(!empty($doc_id))
          {
            $search = $this->SearchDocument($doc_id,$search);
            // $search = $this->where('document_id',$doc_id);
          }

        }

        $link = $search;
        return view('admin.reports',get_defined_vars());
    }

    public function SearchService($ser_id,$search)
    {
        // dd($ser_id);
        $search=$search->where('service_id',$ser_id);
        return $search;
    }
    public function SearchSubService($sub_id,$search)
    {
        $search=$search->where('sub_service_id',$sub_id);
        return $search;
    }
    public function SearchDocument($doc_id,$search)
    {
        //  dd($search);
        $qq = SubServiceDocumentMap::where('status','=','0')->where('document_id',$doc_id)
            ->pluck('service_id');
            // dd($qq);
        $search=$search->whereIn('service_id',$qq);
        // dd($search);
        return $search;
    }
}
