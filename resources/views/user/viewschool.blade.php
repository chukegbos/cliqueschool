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
                <li class="list-group-item"><a href="javascript:void(0)?" onclick="hideDiv('skills')" class="text-muted"><i class="mdi mdi-file-document"></i> Lectures</a></li>
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
                    <div class="col-lg-6 col-md-9 f-18 font-weight-bold text-uppercase">Profile</div>
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
                        @if(auth()->user()->image)
                            <img src="{{ auth()->user()->image }}" class="img-fluid">
                        @else
                            <img src="https://e7.pngegg.com/pngimages/84/165/png-clipart-united-states-avatar-organization-information-user-avatar-service-computer-wallpaper-thumbnail.png" class="img-fluid" alt="User-Profile-Image">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h2 class="f-24 font-medium">{{ auth()->user()->lastname }} {{ auth()->user()->firstname }} {{ auth()->user()->middlename }}</h2>
                        <p class="m-b-20">Online</p>
                        <!-- <div class="row mb-2">
                            <div class="col-3 font-weight-bold text-dark">Position</div>
                            <div class="col">content manager</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3 font-weight-bold text-dark">Age</div>
                            <div class="col">25 years</div>
                        </div> -->
                        <!-- <div class="row mb-2">
                            <div class="col-3 font-weight-bold text-dark">Address</div>
                            <div class="col">New York, Lancer St. 15/10, USA</div>
                        </div> -->
                        <div class="row mb-2">
                            <div class="col-3 font-weight-bold text-dark">Phone</div>
                            <div class="col"><a href="tel:{{ auth()->user()->phone }}">{{ auth()->user()->phone }}</a></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3 font-weight-bold text-dark">Email</div>
                            <div class="col"><a href="mailto:{{ auth()->user()->email }}" class="text-inverse">{{ auth()->user()->lastname }}</a></div>
                        </div>
                        <!-- <div class="row mb-2">
                            <div class="col-3 font-weight-bold text-dark">Web site</div>
                            <div class="col"><a href="#" class="text-inverse">joedonovan.com</a></div>
                        </div> -->
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
        <div class="card" id="education" style="display:none">
            <div class="card-body  card2 pt-5 pb-2">
                <div class="row">
                    <div class="col-lg-12 col-md-12 f-18 font-weight-bold text-uppercase">Education</div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6 f-14 font-weight-bold m-b-20"><span class="fa fa-circle text-danger circle-tab mr-3"></span> April 2014 - November 2016</div>
                    <div class="col-lg-4 col-md-6">
                        <span class="font-bold text-dark">Computer engineering</span>
                        <div class="clearfix"></div>
                        <span class="mt-2 d-block">Master</span>
                    </div>
                    <div class="col-lg-4 col-md-6 font-weight-bold m-b-20">London School of Economics and Political Science</div>
                </div>
                <div class="boder-li"></div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 f-14 font-weight-bold m-b-20"><span class="fa fa-circle text-danger circle-tab mr-3"></span>September 2012 - April 2014</div>
                    <div class="col-lg-4 col-md-6 ">
                        <span class="font-bold text-dark">Google corporation </span>
                        <div class="clearfix"></div>
                        <span class="mt-2 d-block">Bachelor</span>
                    </div>
                    <div class="col-lg-4 col-md-6  font-weight-bold">Imperial College London</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function hideDiv(e) {
        var profile = document.getElementById("profile");
        var learner = document.getElementById("learner");
        var skills = document.getElementById("skills");
        var experience = document.getElementById("experience");
        var education = document.getElementById("education");

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
        else if (e=='education') {
            profile.style.display = 'none';
            learner.style.display = 'none';
            skills.style.display = 'none';
            experience.style.display = 'none';
            education.style.display = 'block';
        }
    } 
</script>
@endsection