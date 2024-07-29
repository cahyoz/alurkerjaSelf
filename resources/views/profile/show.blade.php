@extends('layouts.profil')




@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 col-xl-4">

                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="d-flex justify-content-center mt-3 mb-4">
                                <img src="{{ asset('storage/profile_pictures') }}
                                "
                                    class="rounded-circle img-fluid" style="width: 100px;">
                            </div>
                            <h4 class="mb-2">{{ $user->username }}</h4>
                            <form>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="userRole" value="{{ $user->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="userRole" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="userRole" value="{{ $user->email }}" >
                                </div>
                                <div class="mb-3">
                                    <label for="userWebsite" class="form-label">No Wa</label>
                                    <input type="text" class="form-control" id="userWebsite"
                                        value="{{ $user->whatsapp_number }}">
                                </div>


                                <button type="button" class="btn btn-warning form control">Save

                                </button>


                            </form>

                        </div>
                    </div>
                </div>
    </section>
@endsection
