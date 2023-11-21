<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <style>
                    body{
                        font-size: 16px;
                        color: #6f6f6f;
                        font-weight: 400;
                        line-height: 28px;
                        letter-spacing: 0.8px;
                        margin-top:20px;
                    }
                    .font-size38 {
                        font-size: 38px;
                    }
                    .team-single-text .section-heading h4,
                    .section-heading h5 {
                        font-size: 36px
                    }

                    .team-single-text .section-heading.half {
                        margin-bottom: 20px
                    }

                    @media screen and (max-width: 1199px) {
                        .team-single-text .section-heading h4,
                        .section-heading h5 {
                            font-size: 32px
                        }
                        .team-single-text .section-heading.half {
                            margin-bottom: 15px
                        }
                    }

                    @media screen and (max-width: 991px) {
                        .team-single-text .section-heading h4,
                        .section-heading h5 {
                            font-size: 28px
                        }
                        .team-single-text .section-heading.half {
                            margin-bottom: 10px
                        }
                    }

                    @media screen and (max-width: 767px) {
                        .team-single-text .section-heading h4,
                        .section-heading h5 {
                            font-size: 24px
                        }
                    }


                    .team-single-icons ul li {
                        display: inline-block;
                        border: 1px solid #02c2c7;
                        border-radius: 50%;
                        color: #86bc42;
                        margin-right: 8px;
                        margin-bottom: 5px;
                        -webkit-transition-duration: .3s;
                        transition-duration: .3s
                    }

                    .team-single-icons ul li a {
                        color: #02c2c7;
                        display: block;
                        font-size: 14px;
                        height: 25px;
                        line-height: 26px;
                        text-align: center;
                        width: 25px
                    }

                    .team-single-icons ul li:hover {
                        background: #02c2c7;
                        border-color: #02c2c7
                    }

                    .team-single-icons ul li:hover a {
                        color: #fff
                    }

                    .team-social-icon li {
                        display: inline-block;
                        margin-right: 5px
                    }

                    .team-social-icon li:last-child {
                        margin-right: 0
                    }

                    .team-social-icon i {
                        width: 30px;
                        height: 30px;
                        line-height: 30px;
                        text-align: center;
                        font-size: 15px;
                        border-radius: 50px
                    }

                    .padding-30px-all {
                        padding: 30px;
                    }
                    .bg-light-gray {
                        background-color: #f7f7f7;
                    }
                    .text-center {
                        text-align: center!important;
                    }
                    img {
                        max-width: 100%;
                        height: auto;
                    }


                    .list-style9 {
                        list-style: none;
                        padding: 0
                    }

                    .list-style9 li {
                        position: relative;
                        padding: 0 0 15px 0;
                        margin: 0 0 15px 0;
                        border-bottom: 1px dashed rgba(0, 0, 0, 0.1)
                    }

                    .list-style9 li:last-child {
                        border-bottom: none;
                        padding-bottom: 0;
                        margin-bottom: 0
                    }


                    .text-sky {
                        color: #02c2c7
                    }

                    .text-orange {
                        color: #e95601
                    }

                    .text-green {
                        color: #5bbd2a
                    }

                    .text-yellow {
                        color: #f0d001
                    }

                    .text-pink {
                        color: #ff48a4
                    }

                    .text-purple {
                        color: #9d60ff
                    }

                    .text-lightred {
                        color: #ff5722
                    }

                    a.text-sky:hover {
                        opacity: 0.8;
                        color: #02c2c7
                    }

                    a.text-orange:hover {
                        opacity: 0.8;
                        color: #e95601
                    }

                    a.text-green:hover {
                        opacity: 0.8;
                        color: #5bbd2a
                    }

                    a.text-yellow:hover {
                        opacity: 0.8;
                        color: #f0d001
                    }

                    a.text-pink:hover {
                        opacity: 0.8;
                        color: #ff48a4
                    }

                    a.text-purple:hover {
                        opacity: 0.8;
                        color: #9d60ff
                    }

                    a.text-lightred:hover {
                        opacity: 0.8;
                        color: #ff5722
                    }

                    .custom-progress {
                        height: 10px;
                        border-radius: 50px;
                        box-shadow: none;
                        margin-bottom: 25px;
                    }
                    .progress {
                        display: -ms-flexbox;
                        display: flex;
                        height: 1rem;
                        overflow: hidden;
                        font-size: .75rem;
                        background-color: #e9ecef;
                        border-radius: .25rem;
                    }


                    .bg-sky {
                        background-color: #02c2c7
                    }

                    .bg-orange {
                        background-color: #e95601
                    }

                    .bg-green {
                        background-color: #5bbd2a
                    }

                    .bg-yellow {
                        background-color: #f0d001
                    }

                    .bg-pink {
                        background-color: #ff48a4
                    }

                    .bg-purple {
                        background-color: #9d60ff
                    }

                    .bg-lightred {
                        background-color: #ff5722
                    }
    </style>
</head>
<body>

<div class="container">
<div class="d-grid gap-2 d-md-block">
    <a href="/verification">
    
        <button class="btn btn-secondary mt-2 mb-2 border rounded-0" type="button"><i class="fas fa-arrow-left text-orange"></i>
    
                    <span class="mx-2">Go Back</span>
    </button>
    </a>
  
  
</div>
    <div class="team-single">


                @if(session()->has('success'))

                <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">
                    x
                </button>  

                {{session()->get('success')}}


                </div>

                @endif

        <div class="row mb-4">

        <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">

            <div class="w-75">
                    <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                        <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">Digital Photo</h4>
            
                    </div>
    
                    <div class="gallery team-single-img">
                        <a href="{{'http://localhost:8000'.$data['document']->Digitalphoto }}" data-lightbox="image-1" data-title="Image 1" target="_blank" >
                          <span><img src="{{'http://localhost:8000'.$data['document']->Digitalphoto }}" alt="Image 1" class="img-fluid " /></span>  
                        </a>
                    </div>
                
            </div>

            <div class="w-75">
                    <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                        <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">Fingerprint Photo</h4>
            
                    </div>
                    <div class="gallery team-single-img">
                        <a href="{{'http://localhost:8000'.$data['document']->Fingerprint }}" data-lightbox="image-1" data-title="Image 1" target="_blank" >
                           <span><img src="{{'http://localhost:8000'.$data['document']->Fingerprint }}" alt="Image 1" class="img-fluid " /></span> 
                        </a>
                    </div>

            </div>

            <div class="w-75">
                    <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                        <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">Medical Certificate</h4>
            
                    </div>
                    <div class="gallery team-single-img">
                        <a href="{{'http://localhost:8000'.$data['document']->Medical_certificate }}" data-lightbox="image-1" data-title="Image 1" target="_blank" >
                           <span><img src="{{'http://localhost:8000'.$data['document']->Medical_certificate }}" alt="Image 1" class="img-fluid " /></span> 
                        </a>
                    </div>

            </div>

            <div class="w-75">
                    <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                        <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">Birth Certificate</h4>
            
                    </div>
                    <div class="gallery team-single-img">
                        <a href="{{'http://localhost:8000'.$data['document']->birth_certificate }}" data-lightbox="image-1" data-title="Image 1" target="_blank" >
                          <span><img src="{{'http://localhost:8000'.$data['document']->birth_certificate }}" alt="Image 1" class="img-fluid " /></span>  
                        </a>
                    </div>

            </div>

        </div>
                    
        <!-- Second column -->

         <div class="border-start border-2 border-secondary  col-lg-8 col-md-7 lg- ">
                <div class="team-single-text padding-50px-left sm-no-padding-left ps-4">
                    <h4 class="font-size38 sm-font-size32 xs-font-size30">{{ $data['applicant']->first_name .' '.  $data['applicant']->last_name }}</h4>
                    <div class="contact-info-section margin-40px-tb">
        
                            {{-- Application Date --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">Date:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->application_date }}</p>
                                    </div>
                                </div>
                            </li>
                            {{-- Application Number --}}
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-info-circle text-green"></i>
                                            <strong class="margin-10px-left text-green">Application Number:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>{{ $data['application']->application_no }}</p>
                                        </div>
                                    </div>
                                </li>

                                {{-- Allocated Passport Number --}}
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-info-circle text-green"></i>
                                            <strong class="margin-10px-left text-green">Allocated Passport Number:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>{{ $data['application']->allocated_passport_number }}</p>
                                        </div>
                                    </div>
                                </li>
                            


                            {{-- Service Type --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">Service Type:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->service_type }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- Travel Document Type --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">Travel Document Type:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->traveldocument_type }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- Present Travel Document Number --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">Present Travel Document Number:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->present_traveldocument_no }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- NMRP Number --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">NMRP Number:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->nmrp_no }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- NIC Number --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">NIC Number:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->nic_no }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- District --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">District:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->district }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- Date of Birth --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">Date of Birth:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->dateofbirth }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- BC Number --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">BC Number:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->bc_number }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- BC District --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">BC District:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->bc_district }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- Birth Place --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">Birth Place:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->birth_place }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- Sex --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">Sex:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->sex }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- Occupation --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">Occupation:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->occupation }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- Dual Citizenship --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">Dual Citizenship:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ ($data['application']->dual_citizenship == 1) ? 'Yes' : 'No' }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- Dual Citizenship Number --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">Dual Citizenship Number:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->dual_citizenship_no }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- Applicant Signature --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">Applicant Signature:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->applicant_signature }}</p>
                                    </div>
                                </div>
                            </li>

                            {{-- Status --}}
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-info-circle text-green"></i>
                                        <strong class="margin-10px-left text-green">Status:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['application']->status }}</p>
                                    </div>
                                </div>
                            </li>



                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-mobile-alt text-purple"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-purple">Phone:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $data['applicant']->phone }}</p>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-envelope text-pink"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-pink">Email:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><a href="javascript:void(0)">{{ $data['applicant']->email }}</a></p>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div>
                            @if($data['application']->status == "pending" || true)
                            <form action="{{ route('update_application_status', ['id' => $data['application']->id]) }}" method="post">
                                @csrf
                                @method('POST')

                                <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-success" type="submit" name="action" value="approve">Accept</button>
                                        <button class="btn btn-danger" type="submit" name="action" value="reject">Reject</button>
                                </div>

                            </form>
                            @endif
                        </div>

                        <!-- Set Passport status -->
                        <div>
                            <!-- Select element name status -->
                            <!-- submit -->
                        </div>
                        <!-- Set Passport status -->
                    </div>

                </div>
            </div>



        <!-- End of second column -->
        </div>
    </div>
</div>

</body>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all img elements inside div with classes "gallery" and "team-single-img"
        var images = document.querySelectorAll('.gallery.team-single-img img');

        // Function to be executed when each image is loaded
        function handleImageLoad(image) {
            image.style = ''; // Set style to an empty string
        }

        // Attach the load event to each image
        images.forEach(function(image) {
            image.addEventListener('load', function() {
                handleImageLoad(image);
            });
        });
    });
</script>

</html>

