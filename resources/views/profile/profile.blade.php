@extends('layouts.main')
@section('header.title')
Profile - {{ auth()->user()->name }}
@endsection

@section('main')

<!-- Cover area -->
<div class="profile-cover">
    <div id="overlay">
        <div class="cv-spinner">
            <span class="loader"></span>
        </div>
    </div>
    @php
        // dd($profile->cover_image);
        if($profile->cover_image == null )
        {
            $img = 'bg-login.jpg';
        }else{
            $img =  'storage/profile/cover_images/'.$profile->cover_image;
        }
    @endphp
    <div class="profile-cover-img" style="background-image: url({{ asset("$img")}})"></div>
    <div class="media align-items-center text-center text-md-left flex-column flex-md-row m-0">
        <div class="mr-md-3 mb-2 mb-md-0">
            <a href="#" class="profile-thumb">
                <img src="{{ asset('storage/profile/images/' . auth()->user()->image) }}" class="border-white " width="48" height="48" alt="">
            </a>
        </div>

        <div class="media-body text-white">
            <h1 class="mb-0">{{ auth()->user()->name ?? 'No Name' }}</h1>
            <span class="d-block">{{ $profile->designation ?? '' }}</span>
        </div>

        <div class="ml-md-3 mt-2 mt-md-0">
            <ul class="list-inline list-inline-condensed mb-0">
                <li class="list-inline-item">
                    <input type="file" id="myFile">
                    <label for="myFile" class="file-label">
                        <i class="icon-file-picture"></i> Change Cover
                    </label>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /cover area -->

<!-- Profile navigation -->
<div class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-second">
            <i class="icon-menu7 mr-2"></i>
            Profile navigation
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-second">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a href="#activity" class="navbar-nav-link active" data-toggle="tab">
                    <i class="icon-menu7 mr-2"></i>
                    About
                </a>
            </li>
            <li class="nav-item">
                <a href="#schedule" class="navbar-nav-link" data-toggle="tab">
                    <i class="icon-calendar3 mr-2"></i>
                    Schedule
                </a>
            </li>
            <li class="nav-item">
                <a href="#settings" class="navbar-nav-link" data-toggle="tab">
                    <i class="icon-cog3 mr-2"></i>
                    Settings
                </a>
            </li>
        </ul>

    </div>
</div>
<!-- /profile navigation -->



@endsection


@section('css')
    <style>
        #myFile {
            display: none;
        }
        .file-label {
            display: inline-block;
            padding: 10px 20px;
            color: #333;
            background-color: #f8f9fa;
            border: 1px solid transparent;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }
        .file-label:hover {
            background-color: #e2e6ea;
        }
        .file-label i {
            margin-right: 8px;
        }
        .content {
            padding:0;
        }
        

        /* loader css */
        #overlay {
            position: absolute;
            top: 0;
            z-index: 1000;
            width: 100%;
            height: 100%;
            display: none;
            background: rgba(58, 58, 58, 0.6);
        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .profile-cover {
            position: relative;
        }

        .loader {
        width: 65px;
        height: 117px;
        position: relative;
        }
        .loader:before,
        .loader:after {
        content: "";
        position: absolute;
        inset: 0;
        background: #ff8001;    
        box-shadow: 0 0 0 50px;
        clip-path: polygon(100% 0, 23% 46%, 46% 44%, 15% 69%, 38% 67%, 0 100%, 76% 57%, 53% 58%, 88% 33%, 60% 37%);;
        }
        .loader:after {
        animation: l8 1s infinite;
        transform: perspective(300px) translateZ(0px)
        }
        @keyframes l8 {
        to {transform:perspective(300px) translateZ(180px);opacity:0}
        }
        
    </style>
    
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('.sidebar-control').click();
			$(document).on('change','#myFile', changeCover);
		});
        function changeCover()
        {
            var fileInput = document.getElementById('myFile');
            var formData = new FormData();
            formData.append('cover', fileInput.files[0]);
            $("#overlay").fadeIn(300);
            $.ajax({
                url      : `/api/profile/change-cover`,
                method   : "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType : "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success     : function (data)
                {
                    var coverImageUrl = `/storage/profile/cover_images/${data.cover_image}`;
                    $('.profile-cover-img').css('background-image', `url(${coverImageUrl})`);
                    // $('.sidebar-user-material-body').css('background-image', `url(${coverImageUrl})`);
                    new PNotify(
					{
						title: "<i class='far fa-grin-alt'></i> Successfull",
						text: "Cover Photo Updated Successfully",
						addclass: "stack-bottom-right bg-success border-success",
						stack: $('html').attr('dir') == 'rtl' ? stack_bottom_right_rtl : stack_bottom_right
					}
                    );
                    $("#overlay").fadeOut(300);
                },
                error(err){
                    console.log('error')
                }
            }); 
        }
    </script>
@endsection
