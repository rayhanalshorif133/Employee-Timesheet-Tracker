@extends('layouts.app')


@push('styles')
<style>
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card py-2">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Congratulations {{Auth::user()->name}}! 🎉</h5>
                <p class="mb-4">
                  Welcome to your dashboard, here you will find all the information you need to get started.
                </p>

                <a href="{{route('user.edit', Auth::user()->id)}}" class="btn btn-sm btn-outline-primary">Goto Profile</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                  src="{{asset('assets/img/illustrations/man-with-laptop-light.png')}}"
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-6 mb-2">
            <div class="card">
              <div class="card-body">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-success"><i class="bx bx-user"></i></span>
                </div>
                <span class="fw-semibold d-block my-2">Total User</span>
                <h3 class="card-title my-2">0</h3>
                <a href="{{route('user.index')}}" class="btn btn-sm btn-outline-success">
                  <i class="bx bx-right-arrow-alt"></i> Users
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-2">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-component"></i></span>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Projects</span>
                <h3 class="card-title mb-2">0</h3>
                <a href="{{route('project.index')}}" class="btn btn-sm btn-outline-primary">
                  <i class="bx bx-right-arrow-alt"></i> Projects
                </a>
              </div>
            </div>
          </div>
                    
        </div>
      </div>
    </div>
  </div>
@endsection
