@extends('layouts.mainuser')
@section('pageTitle', $data['school']->name)
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="align-items-center">
            <div class="page-header-title">
                <h2 class="m-b-10">{{ $data['school']->name }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-3 mail-list">
        <div class="card">
            <ul class="list-group list-group-full">
                <li class="list-group-item"><a href="javascript:void(0)?" onclick="hideDiv('profile')" class="text-muted"><i class="mdi mdi-file-document"></i> Stat</a> </li>
                <li class="list-group-item"><a href="javascript:void(0)?" onclick="hideDiv('learner')" class="text-muted"><i class="fa fa-user"></i> Learners</a> </li>
                <li class="list-group-item"><a href="javascript:void(0)?" onclick="hideDiv('lectures')" class="text-muted"><i class="mdi mdi-file-document"></i> Lectures</a></li>
                <li class="list-group-item"><a href="javascript:void(0)?" onclick="hideDiv('experience')" class="text-muted"><i class="fa fa-tv"></i> Live Class</a></li>
                <li class="list-group-item"><a href="javascript:void(0)?" onclick="hideDiv('education')" class="text-muted"><i class="mdi mdi-school"></i> Assignments</a> </li>
                <li class="list-group-item"><a href="javascript:void(0)?" onclick="hideDiv('education')"  class="text-muted"><i class="fa fa-th"></i> Quizzes</a></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-9 col-md-9">
        <div class="card" id="profile">
            <div class="card-body  card2 pt-3">
                <div class="row">
                    <div class="col-lg-6 col-md-9 f-18 font-weight-bold text-uppercase">School Details</div>
                    <div class="col-lg-6 col-md-9 text-right f-16 font-weight-bold text-uppercase profile-social">
                        <ul>
                            <li><a href="{{ auth()->user()->facebook}}" class="icoFacebook" title="Facebook"><i class="mdi mdi-facebook"></i></a></li>
                            <li><a href="{{ auth()->user()->twitter }}" class="icoTwitter" title="Twitter"><i class="mdi mdi-twitter"></i> </a></li>
                            <li><a href="{{ auth()->user()->linkedin }}" class="icoLinkedin" title="Linkedin"><i class="mdi mdi-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 m-b-20 text-center">
                        @if($data['school']->featured_image)
                            <img style="width: 160px; height: 160px;" src="{{ $data['school']->featured_image }}" class="img-fluid rounded-circle">
                        @else
                            <img src="https://e7.pngegg.com/pngimages/84/165/png-clipart-united-states-avatar-organization-information-user-avatar-service-computer-wallpaper-thumbnail.png" class="img-fluid" alt="User-Profile-Image">
                        @endif
                        <div class="mt-3">
                            <ul class="list-group text-left">
                                <li class="list-group-item"><strong class="pr-3">Name:</strong> {{ $data['school']->name }}</li>
                                <li class="list-group-item"><strong class="pr-3">Category:</strong> {{ $data['school']->catigory->name }}</li>
                                <li class="list-group-item"><strong class="pr-3">Status:</strong>
                                <span class="badge badge-light-{{$data['school']->getStatusColor()}}">{{ $data['school']->getStatus() }}</span></li>
                                <li class="list-group-item"><strong class="pr-3">Capacity:</strong> {{ $data['school']->getAudience()['name'] }}</li>
                                <li class="list-group-item"><strong class="pr-3">Experience:</strong> {{ $data['school']->getTeachingType()['name'] }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h2 class="f-24 font-medium text-center">{{ $data['school']->name }}</h2>
                       <br>
                       <div class="card" id="stat">
                            <div class="card-body  card2 pt-5">
                                <div class="row">
                                    <!-- <div class="col-lg-12 col-md-12 f-18 font-weight-bold text-uppercase text-center">School Statistics</div> -->
                                </div>
                            </div>
                            <div class="card-body pb-5 px-5">
                                <div class="row justify-content-between">
                                    <div class="card" style="width: 120px; height: 110px;">
                                        <div class="text-center">
                                            <p class="mt-2">
                                                <i class="text-primary fas fa-users fa-3x"></i>
                                            </p>
                                            <p><span>50</span> Learners</p>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 120px; height: 110px;">
                                        <div class="text-center">
                                            <p class="mt-2">
                                                <i class="text-info fas fa-book fa-3x"></i>
                                            </p>
                                            <p><span>10</span> Lectures</p>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 120px; height: 110px;">
                                        <div class="text-center">
                                            <p class="mt-2">
                                                <i style="color: green" class="fas fa-users fa-3x"></i>
                                            </p>
                                            <p><span>20</span> Assignments</p>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" id="learner" style="display:none">
            <div class="card-body  card2 pt-5">
                <div class="row">
                    <div class="col-lg-12 col-md-12 f-18 font-weight-bold text-uppercase">learner</div>
                </div>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="user-list-table" class="table nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['learners'] as $learner)
                                <tr>
                                    <td>{{ $learner->learner()->lastname }} {{ $learner->learner()->firstname }}</td>
                                    <td>{{ $learner->learner()->email }}</td>
                                    <td>{{ $learner->learner()->phone }}</td>
                                    <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($learner->created_at))->toFormattedDateString() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card" id="skills" style="display:none">
            <div class="card-body  card2 pt-5">
                <div class="row">
                    <div class="col-lg-12 col-md-12 f-18 font-weight-bold text-uppercase">SKILL</div>
                </div>
            </div>
            <div class="card-body pb-5">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h5 class="f-14 text-inverse">Photoshop<span class="pull-right">55%</span></h5>
                        <div class="progress" style="height:6px;">
                            <div class="progress-bar" style="width:55%;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                        </div>
                        <h5 class="f-14 m-t-20 text-inverse">Illustrator<span class="pull-right">64%</span></h5>
                        <div class="progress" style="height:6px;">
                            <div class="progress-bar" style="width:64%;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                        </div>
                        <h5 class="f-14 m-t-20 text-inverse">InDesign<span class="pull-right">35%</span></h5>
                        <div class="progress" style="height:6px;">
                            <div class="progress-bar" style="width: 35%;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                        </div>
                        <h5 class="f-14 m-t-20 text-inverse">Powerpoint<span class="pull-right">95%</span></h5>
                        <div class="progress m-b-20" style="height:6px;">
                            <div class="progress-bar" style="width: 95%;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h5 class="f-14 text-inverse">Wordpress<span class="pull-right">55%</span></h5>
                        <div class="progress" style="height:6px;">
                            <div class="progress-bar" style="width:55%;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                        </div>
                        <h5 class="f-14 m-t-30 text-inverse">Drupal<span class="pull-right">64%</span></h5>
                        <div class="progress" style="height:6px;">
                            <div class="progress-bar" style="width: 64%;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                        </div>
                        <h5 class="f-14 m-t-30 text-inverse">English<span class="pull-right">95%</span></h5>
                        <div class="progress" style="height:6px;">
                            <div class="progress-bar" style="width: 95%;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" id="experience" style="display:none">
            <div class="card-body  card2 pt-5">
                <div class="row">
                    <div class="col-lg-12 col-md-12 f-18 font-weight-bold text-uppercase">Experience</div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6 f-14 font-weight-bold m-b-20"><span class="fa fa-circle text-danger circle-tab mr-3"></span> September 2015 - Now </div>
                    <div class="col-lg-4 col-md-6 m-b-20">
                        <span class="font-bold">Web agency Styler</span>
                        <div class="clearfix"></div>
                        <span class="mt-2 d-block m-b-10">content manager</span>
                    </div>
                    <div class="col-lg-4 col-md-6 font-weight-bold m-b-20"> Working with CMS Wordpress. </div>
                </div>
                <div class="boder-li"></div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 f-14 font-weight-bold m-b-20"><span class="fa fa-circle text-danger circle-tab mr-3"></span> May 2013 - September 2015 </div>
                    <div class="col-lg-4 col-md-6"> <span class="font-bold text-dark">Google corporation </span> <span class="mt-2 d-block">copywriter</span> </div>
                    <div class="col-lg-4 col-md-6 font-weight-bold m-b-20">Learned the basics of programming and made many different projects.</div>
                </div>
                <div class="boder-li"></div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 f-14 font-weight-bold m-b-20"><span class="fa fa-circle text-danger circle-tab mr-3"></span> March 2012 - May 2013</div>
                    <div class="col-lg-4 col-md-6 "> <span class="font-bold text-dark">London web studio</span><br>
                        <span class="mt-2 d-block">client manager</span>
                    </div>
                    <div class="col-lg-4 col-md-6 font-weight-bold m-b-20">Worked with different teams and clients. Improved my communication skills.</div>
                </div>
            </div>
        </div>
        <div class="card" id="lectures" style="display:none">
            <div class="card-body  card2 pt-5 pb-2">
                <div class="row justify-content-between align-items-center">
                    <div class="f-18 font-weight-bold text-uppercase">Lectures</div>
                    <div class="f-18 font-weight-bold pr-5">
                        <a class="btn btn-sm btn-primary" href="{{route('createLecturePage', ['id' => $data['school']->id])}}">Add Lecture</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-between">
                    @foreach( $data['lectures'] as $lecture ) 
                        <div class="col-md-4">
                            <div class="card" style="width: 280px; height: 319px;">
                                <img class="card-img-top" style="height: 20vh;" src="{{$lecture->featured_image}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title my-0">Lecture Title</h5>
                                    <small class="text-muted">Author name</small>
                                    <p class="my-0">
                                        <i style="color: #E59819" class="fas fa-star"></i>
                                        <i style="color: #E59819" class="fas fa-star"></i>
                                        <i style="color: #E59819" class="fas fa-star"></i>
                                        <i style="color: #E59819" class="fas fa-star"></i>
                                        <i style="color: #E59819" class="fas fa-star"></i>
                                    </p>
                                    <p class="card-text my-0">
                                        Brief description
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="View Lecture"> <i class="fas fa-eye"></i> </button>
                                    <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Lecture"> <i class="fas fa-trash"></i> </button>
                                    <button class="btn btn-sm btn-info" data-placement="top" title="Edit Lecture" data-toggle="modal" data-target="#lectureModal{{$lecture->id}}"> <i class="fas fa-edit"></i> </button>
                                </div>
                            </div>
                        </div>                        
                        <div class="modal fade" id="lectureModal{{$lecture->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSchoolModalLabel">Edit Lecture</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('storeLecture') }}" enctype="multipart/form-data">
                                                    @csrf
                                                
                                                    <input type="hidden" name="school_id" value="{{request()->id}}">
                                                    
                                                    <div class="form-group">
                                                        <label>Lecture Title<span class="text text-danger"><small><i>(Compulsory)</i></small></span></label>
                                                        <input class="form-control" type="text" name="title" required="" placeholder="Introduction to AI" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Featured Image <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                                                        <input class="form-control" type="file" name="featured_image">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Featured Video (video link only) <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                                                        <input class="form-control" type="text" name="featured_video" placeholder="https://youtube.com/channel">
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Lecture Document(PDF) <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                                                        <input class="form-control" type="file" name="pdf">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Lecture Video <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                                                        <input class="form-control" type="file" name="video">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Brief Description <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                                                        <textarea rows="2" id="description" name="description" class="form-control"></textarea>
                                                    </div>

                                                    <button class="btn btn-grey btn-block" type="submit">Proceed</button>
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
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function hideDiv(e) {
        var profile = document.getElementById("profile");
        var learner = document.getElementById("learner");
        var skills = document.getElementById("stat");
        var experience = document.getElementById("experience");
        var education = document.getElementById("lectures");

        if (e=='profile') {
            profile.style.display = 'block';
            learner.style.display = 'none';
            skills.style.display = 'none';
            experience.style.display = 'none';
            education.style.display = 'none';
        }
        else if (e=='learner') {
            profile.style.display = 'none';
            learner.style.display = 'block';
            skills.style.display = 'none';
            experience.style.display = 'none';
            education.style.display = 'none';
        }
        else if (e=='skills') {
            profile.style.display = 'none';
            learner.style.display = 'none';
            skills.style.display = 'block';
            experience.style.display = 'none';
            education.style.display = 'none';
        }
        else if (e=='experience') {
            profile.style.display = 'none';
            learner.style.display = 'none';
            skills.style.display = 'none';
            experience.style.display = 'block';
            education.style.display = 'none';
        }
        else if (e=='lectures') {
            profile.style.display = 'none';
            learner.style.display = 'none';
            skills.style.display = 'none';
            experience.style.display = 'none';
            education.style.display = 'block';
        }
    } 
</script>
@endsection