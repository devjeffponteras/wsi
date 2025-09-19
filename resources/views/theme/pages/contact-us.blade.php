@extends('theme.main')

@section('pagecss')
    <style>
        
        #contact-us-left-card {
            transform: translate(-180px, 0px);
            transition: all .5s ease-in-out;
            opacity: 0;
        }

        #contact-us-right-card {
            transform: translate(180px, 0px);
            transition: all .5s ease-in-out;
            opacity: 0;
        }
    </style>
@endsection

@section('content')
<div class="container topmargin-md bottommargin-lg pt-4 contact-us-page">
    <div class="row"> 

        <div class="col-lg-5" id="contact-us-left-card">
            <div class="card p-4 shadow pb-0">
                <h3>Leave Us a Message</h3>
                @if(session()->has('success'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> {{ session()->get('success') }}</div>
                        {{-- <button type="button" class="btn-close btn-sm" data-dismiss="alert" aria-hidden="true">&times;</button> --}}
                    </div>
                @endif
                
                @if(session()->has('error'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> {{ session()->get('error') }}</div>
                        {{-- <button type="button" class="btn-close btn-sm" data-dismiss="alert" aria-hidden="true">&times;</button> --}}
                    </div>
                @endif
                <p><strong>Note:</strong> Please do not leave required fields (<span class="text-danger">*</span>) empty.</p>
                <div class="form-style fs-sm">
                    <form id="contactUsForm" action="{{ route('contact-us') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="fullName" class="fs-6 fw-semibold text-initial nols">Full Name <span class="text-danger">*</span></label>
                            <input type="text" id="fullName" class="form-control form-input" name="name" placeholder="First and Last Name" />
                        </div>

                        <div class="form-group">
                            <label for="emailAddress" class="fs-6 fw-semibold text-initial nols">E-mail Address <span class="text-danger">*</span></label>
                            <input type="email" id="emailAddress" class="form-control form-input" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="hello@email.com" />
                        </div>
                        <div class="form-group">
                            <label for="contactNumber" class="fs-6 fw-semibold text-initial nols">Contact Number <span class="text-danger">*</span></label>
                            <input type="number" id="contactNumber" class="form-control form-input" name="contact" placeholder="Landline or Mobile" />
                        </div>
                        <div class="form-group">
                            <label for="message" class="fs-6 fw-semibold text-initial nols">Message <span class="text-danger">*</span></label>
                            <textarea name="message" id="message" class="form-control form-input textarea" rows="5"></textarea>
                        </div>

                        <div class="row g-2">
                            <div class="col-md-6">
                                <!-- <a class="button button-circle border-bottom ms-0 text-initial nols fw-normal button-large d-block text-center" href="javascript:void(0)" onclick="document.getElementById('contactUsForm').submit()">Submit</a> -->
                                <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d m-0" href="javascript:void(0)" onclick="document.getElementById('contactUsForm').submit()" style="background-color: #2b56d3;">
                                    <i class="bi-send" style="margin-right: 5px;"></i> Submit
                                </button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <!-- <a href="javascript:void(0)" class="button button-circle button-dark border-bottom ms-0 text-initial nols fw-normal button-large d-block text-center" onclick="resetForm();">Reset</a> -->
                                <button name="reset" type="reset" id="reset-button" tabindex="5" class="button button-3d m-0 reset-button" href="javascript:void(0)" onclick="resetForm();">
                                    <i class="bi-arrow-counterclockwise" style="margin-right: 5px;"></i>Reset
                                </button>
                            </div>
                        </div>
                        
                        {{-- hidden inputs --}}
                        <div class="form-group" style="display:none;">
                            <input type="text" id="services" class="form-control form-input" name="services" placeholder="Enter Subject" value="Design" required/>
                            <input type="text" id="subject" class="form-control form-input" name="subject" placeholder="Enter Subject" value="Design" required/>
                        </div>

                    </form>
                    {{-- captcha script --}}
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                </div>
            </div>
        </div>

        <div class="col-lg-7 mb-5" id="contact-us-right-card">
            {!! $page->contents !!}
        </div>

    </div>
    
</div>
@endsection

@section('pagejs')
<script>

    /** form validations **/
    $(document).ready(function () {
        //called when key is pressed in textbox
        $("#contact").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            var charCode = (e.which) ? e.which : event.keyCode
            if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;

        });
    });

    // $('#contactUsForm').submit(function (evt) {
    //     let recaptcha = $("#g-recaptcha-response").val();
    //     if (recaptcha === "") {
    //         evt.preventDefault();
    //         $('#catpchaError').show();
    //         return false;
    //     }
    // });
    
    function resetForm() {
        document.getElementById("contactUsForm").reset();
    }

    window.onload = function() {
      document.getElementById("contact-us-right-card").style.transform = "translate(0px, 0px)";
      document.getElementById("contact-us-right-card").style.opacity = "1";
      document.getElementById("contact-us-left-card").style.transform = "translate(0px, 0px)";
      document.getElementById("contact-us-left-card").style.opacity = "1";
    };

</script>
@endsection
