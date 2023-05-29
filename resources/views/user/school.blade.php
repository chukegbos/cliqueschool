@extends('layouts.mainuser')
@section('pageTitle', 'My School')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="align-items-center">
            <div class="page-header-title">
                <h2 class="m-b-10">My Schools <a href="{{ url('user/my-school/create') }}" class="btn btn-info btn-sm float-right">Create School</a></h2>
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
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schools as $chool)
                        <tr>
                            <td>
                                <div class="d-inline-block align-middle">
                                    <img src="assets/images/user/avatar-2.jpg" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                                    <div class="d-inline-block">
                                        <h6 class="m-b-0">Garrett Winters</h6>
                                        <p class="m-b-0">gw@domain.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td><span class="badge badge-light-danger">Disabled</span></td>
                            <td>
                                <div class="overlay-edit">
                                    <button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
                                    <button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection