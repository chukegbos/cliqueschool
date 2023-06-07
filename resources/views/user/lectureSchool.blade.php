@extends('layouts.mainuser')
@section('pageTitle', 'Lecture Class')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="align-items-center">
            <div class="page-header-title">
                <h2 class="m-b-10 text-left">Lecture Class</h2>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-img-top">
                @if($data['lecture']->video)
                    <video style="width: 100%; height:auto;" autoplay controls="true" src="{{asset($data['lecture']->video)}}"></video>
                @endif
                @if($data['lecture']->pdf)
                    <a href="{{asset($data['lecture']->pdf)}}" target="_blank">
                        <img style="width: 100%; height:auto;" src="{{$data['lecture']->featured_image}}" alt="">
                    </a>
                @endif
            </div>
            <div class="card-body">
                <div class="card-title">
                    <h3>
                        {{$data['lecture']->title}} --- ({{$data['lecture']->lecture_code}})
                    </h3>
                    <p class="p-0">
                        <i>Created</i> <small>{{ \Carbon\Carbon::parse($data['lecture']->created_at)->diffForHumans()}}</small> <span class="px-3">|</span>      <i>Lecture type: <small>{{ (empty($data['lecture']->video) && !empty($data['lecture']->pdf) )? 'PDF' : 'Video' }} </small></i>
                        <span class="px-3">|</span>
                        <a href="{{asset($data['lecture']->pdf)}}" download class="badge badge-info"><i class="fas fa-download"></i> Download PDF</a>

                    </p>
                </div>
                <hr>
                <div class="card-text">
                    {!! $data['lecture']->description !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <ul class="list-group list-group-full">
                <li class="list-group-item">
                    <a class="text-muted"
                    data-toggle="collapse" href="#assignmentCollapse" role="button" aria-expanded="false" aria-controls="assignmentCollapse">
                        <i class="mdi mdi-file-document"></i> Assignments
                    </a> 
                </li>
                <div class="collapse multi-collapse" id="assignmentCollapse">
                    <div class="card card-body">
                        @if(!is_null($data['assignment']))
                           <p>
                                <i class="fas fa-file-pdf"></i>
                                <a href="{{$data['assignment']->pdf}}" target="_black">
                                    Assignment
                                </a>
                           </p>
                        @else
                            <span class=""><i class="fas fa-file-pdf fa-2x pr-3"></i> <strong>No assignment</strong> </span>
                        @endif
                    </div>
                </div>
                <li class="list-group-item">
                    <a href="javascript:void(0)?" data-toggle="modal" data-target="#submitAssignmentModal" class="text-muted"><i class="fa fa-file-alt"></i> Submit Assignment</a>
                </li>
                <li class="list-group-item bg-info">
                    <a href="javascript:void(0)?" data-toggle="modal" data-target="#solutionAssignmentModal"  class="text-white"><i class="fas fa-upload"></i> Upload assignment solutions</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="modal fade" id="submitAssignmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSchoolModalLabel">Submit Assignment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="#" id="submitAssignmentForm" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Assignment Document(PDF)</label>
                                    <input class="form-control" type="file" name="pdf">
                                </div>
                                
                                <div class="form-group">
                                    <label>Description <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                                    <textarea rows="2" id="assignmentDescription" name="description" class="form-control"></textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector( '#assignmentDescription' ) )
                                            .catch( error => {
                                                console.error( error );
                                            } );
                                    </script>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                    <button type="submit" class="btn btn-primary" form="submitAssignmentForm">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="solutionAssignmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSchoolModalLabel">Upload Assignment Solution</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="#" id="solutionAssignmentForm" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Assignment Solution Document(PDF)</label>
                                    <input class="form-control" type="file" name="pdf">
                                </div>
                                
                                <div class="form-group">
                                    <label>Description <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                                    <textarea rows="2" id="solutiontDescription" name="description" class="form-control"></textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector( '#solutiontDescription' ) )
                                            .catch( error => {
                                                console.error( error );
                                            } );
                                    </script>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                    <button type="submit" class="btn btn-primary" form="solutionAssignmentForm">Submit</button>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection