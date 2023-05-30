@extends('layouts.mainuser')
@section('pageTitle', 'My School')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="align-items-center">
            <div class="page-header-title">
                <h2 class="m-b-10">My Schools <a href="{{ url('user/my-school/create') }}" class="btn btn-primary btn-sm float-right">Create School</a></h2>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="dt-responsive table-responsive">
            <table id="user-list-table" class="table nowrap">
                <thead>
                    <tr>
                        <th>School Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Date Created</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schools as $school)
                        <tr>
                        <td>
                            <a href="{{ url('user/my-school') }}/{{ $school->school_code }}" style="font-size:large; font-weight: 700px;" class="text-primary"><strong>{{$school->school_code}}</strong></a>
                        </td>
                            <td>
                                <div class="d-inline-block align-middle">
                                    <img src="{{ $school->featured_image }}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                                    <div class="d-inline-block">
                                        <h6 class="m-b-0">{{ $school->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $school->catigory->name }}</td>
                            <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($school->created_at))->toFormattedDateString() }}</td>
                            <!-- <td>{{ date('Y-m-d h:i A', strtotime($school->created_at))}}</td> -->
                            <td><span class="badge badge-light-{{$school->getStatusColor()}}">{{$school->getStatus()}}</span></td>
                            <td>
                                <div class="overlay-edit">
                                    @if($school->status == 1)
                                        <a href="{{ url('user/my-school') }}/{{ $school->school_code }}" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title="View School"><i class="feather icon-eye"></i></a>
                                        <button type="button" class="btn btn-icon btn-info" data-toggle="modal" data-target="#editSchoolModal{{$school->id}}" data-placement="top" title="Edit School"><i class="feather icon-edit"></i></button>
                                    @endif
                                    <a href="{{ url('user/my-school/status') }}/{{ $school->id }}" class="btn btn-icon btn-{{($school->status == 1)? 'danger' : 'success' }}">
                                        @if($school->status == 1)<i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Deactivate School"></i> @else <i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Activate School"></i> @endif
                                    </a>
                                    @if($school->status == 1)
                                        <button type="button" onclick="event.preventDefault(); document.getElementById('deleteSchool{{$school->id}}').submit();" class="btn btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Delete School"><i class="feather icon-trash-2"></i></button>
                                    @endif
                                </div>
                                <form action="" id="deleteSchool{{$school->id}}" method="post" style="display: none;">
                                    @csrf
                                </form>
                                <form action="" id="changeSatus{{$school->id}}" method="post" style="display: none;">
                                    @csrf
                                </form>
                            </td>

                            {{-- edit school modal --}}

                            <div class="modal fade" id="editSchoolModal{{$school->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editSchoolModalLabel">Edit School</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form method="POST" action="{{ url('user/my-school/create') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        
                                                        <div class="form-group">
                                                            <label>Name of School <span class="text text-danger"><small><i>(Compulsory)</i></small></span></label>
                                                            <input class="form-control" type="text" name="name" required="" placeholder="{{ $setting->sitename }}" value="{{$school->name}}" required>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Category <span class="text text-danger"><small><i>(Compulsory)</i></small></span></label>
                                                            <select class="form-control" required name="category">
                                                                <option value="{{$school->category}}">{{$school->catigory->name}}</option>
                                                                @foreach($categories as $category)
                                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    
                                                        <div class="form-group">
                                                            <label>Are you already teaching an online course? <span class="text text-danger"><small><i>(Compulsory)</i></small></span></label>
                                                            <select name="type_teaching" aria-invalid="false" class="form-control">
                                                                <option value="{{$school->getTeachingType()['id']}}">{{$school->getTeachingType()['name']}}</option>
                                                                <option value="1">Yes, I’m already teaching an online course</option>
                                                                <option value="2">I teach online (coaching, workshops, etc) but not through an online course </option>
                                                                <option value="3">I’m teaching (I have content), but not online</option>
                                                                <option value="4">I'm just getting started sharing my knowledge</option>
                                                            </select>
                                                        </div>
                                                            
                                                        <div class="form-group">
                                                            <label>What is the size of your audience? <span class="text text-danger"><small><i>(Compulsory)</i></small></span></label>
                                                            <select name="audience" required class="form-control">
                                                                <option id="{{$school->getAudience()['id']}}"> {{$school->getAudience()['name']}} </option>
                                                                <option value="1">No one yet</option>
                                                                <option value="2">1 - 100 people</option>
                                                                <option value="3">100 - 1,000 people</option>
                                                                <option value="4">1,000 - 5,000 people</option>
                                                                <option value="5">5,000 - 10,000 people</option>
                                                                <option value="6">10,000 - 50,000 people</option>
                                                                <option value="7">50,000+ people</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Featured Image <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                                                            <input class="form-control" type="file" name="featured_image" maxlength="64">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Featured Video <span class="text text-info"><small><i>(Optional - Must be Youtube Link)</i></small></span></label>
                                                            <input class="form-control" type="text" value="{{$school->featured_video}}" name="featured_video" placeholder="https://youtu.be/CMsU4rTjPs4">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Description of School <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                                                            <textarea rows="2" id="descriptionEdit" name="description" class="form-control">{{$school->description}}</textarea>
                                                        </div>
                                                        <script>
                                                            let editor;
                                                            ClassicEditor
                                                                .create(document.querySelector( '#descriptionEdit' ) )
                                                                .then( newEditor => {
                                                                editor = newEditor;
                                                                editor.setData("{!! $school->description !!}");
                                                            } )
                                                                .catch( error => {
                                                                    console.error( error );
                                                                } );
                                                        </script>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" >Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>School Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Date Created</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection