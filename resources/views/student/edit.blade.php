<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<style>
    .divider-text {
        position: relative;
        text-align: center;
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .divider-text span {
        padding: 7px;
        font-size: 12px;
        position: relative;
        z-index: 2;
    }

    .divider-text:after {
        content: "";
        position: absolute;
        width: 100%;
        border-bottom: 1px solid #ddd;
        top: 55%;
        left: 0;
        z-index: 1;
    }

    .btn-facebook {
        background-color: #405D9D;
        color: #fff;
    }

    .btn-twitter {
        background-color: #42AEEC;
        color: #fff;
    }

    .card-body {
        margin: 0 60px;
    }

    .col-md-6 {
        padding: 0;
    }

    .right {
        float: right;
        height: auto;
        box-sizing: border-box;
    }

    .card {
        width: 40%;
        box-sizing: border-box;
        height: auto;
        margin: auto;
        border: 1px solid #ddd;
        margin-top: 70px;

    }

    .card-title {
        padding-bottom: 25px;
    }

    .container {
        margin-top: 50px;
    }

    .radio-inline {
        padding: 0 25px;

    }

    label {
        margin-bottom: 0;
    }
</style>

<body>
    <div class="card bg-light">
        <article class="card-body " style="max-width: 1000px;">
            <h4 class="card-title mt-2 mb-3 text-center"> UPDATE DETAILS</h4>
            <form action="{{ route('student.update', $student->id) }}" method="POST" id="studentdata"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- First Name -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="fname" id="fname" value="{{ old('fname', $student->fname) }}" class="form-control"
                        placeholder="First name" type="text">
                </div>
                @error('fname')
                    <span style="color: red;">{{ $message }}</span>
                @enderror

                <!-- Email -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" id="email" value="{{ old('email', $student->email) }}" class="form-control"
                        placeholder="Email address" type="text">
                </div>
                @error('email')
                    <span style="color: red;">{{ $message }}</span>
                @enderror

                <!-- Phone Number -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <input name="contact" id="contact" value="{{ old('contact', $student->contact) }}"
                        class="form-control" placeholder="Phone number" type="text">
                </div>
                @error('contact')
                    <span style="color: red;">{{ $message }}</span>
                @enderror

                <!-- Course -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                    </div>
                    <select class="form-control" id="course" name="course">
                        <option value="">Select the course</option>
                        <option value="BCA" {{ old('course', $student->course) == 'BCA' ? 'selected' : '' }}>BCA</option>
                        <option value="BCOM" {{ old('course', $student->course) == 'BCOM' ? 'selected' : '' }}>BCOM
                        </option>
                        <option value="BBA" {{ old('course', $student->course) == 'BBA' ? 'selected' : '' }}>BBA</option>
                    </select>
                </div>
                @error('course')
                    <span style="color: red;">{{ $message }}</span>
                @enderror

                <!-- Gender -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-venus-mars"></i> </span>
                    </div>
                    <div class="form-control">
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="male" {{ old('gender', $student->gender) == 'male' ? 'checked' : '' }}> Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="female" {{ old('gender', $student->gender) == 'female' ? 'checked' : '' }}> Female
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="other" {{ old('gender', $student->gender) == 'other' ? 'checked' : '' }}> Other
                        </label>
                    </div>
                </div>
                @error('gender')
                    <span style="color: red;">{{ $message }}</span>
                @enderror

                <!-- Address -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-home"></i> </span>
                    </div>
                    <textarea id="address" name="address" class="form-control" rows="3"
                        placeholder="Enter your current address..">{{ old('address', $student->address) }}</textarea>
                </div>
                @error('address')
                    <span style="color: red;">{{ $message }}</span>
                @enderror

                <!-- Hobbies -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-book"></i> </span>
                    </div>
                    <div class="form-control">
                        @php
                            // Exploding hobbies from the student model
                            $hobbies = explode(', ', $student->hobbies ?? '');
                        @endphp
                        <label class="checkbox-inline">
                            <input type="checkbox" name="hobbies[]" value="Reading" {{ in_array('Reading', old('hobbies', $hobbies)) ? 'checked' : '' }}> Reading
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="hobbies[]" value="Learning" {{ in_array('Learning', old('hobbies', $hobbies)) ? 'checked' : '' }}> Learning
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="hobbies[]" value="Writing" {{ in_array('Writing', old('hobbies', $hobbies)) ? 'checked' : '' }}> Writing
                        </label>
                    </div>

                </div>
                @error('hobbies')
                    <span style="color: red;">{{ $message }}</span>
                @enderror




                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">UPDATE</button>
                </div>
            </form>

            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <p>
                <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-google"></i>   Login via Google</a>
                <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via
                    Facebook</a>
            </p>
        </article>
    </div>
</body>
<!-- validation -->
<!-- <script>
    $(document).ready(function () {
        $("#demo1").hide();
        $("#demo2").hide();
        $("#demo3").hide();
        $("#demo4").hide();
        $("#demo5").hide();
        $("#demo6").hide();
        $("#demo7").hide();
        $("#demo8").hide();
        $("#demo9").hide();

        $("#studentdata").submit(function (e) {
            var isValid = true;

            function showError(elementId, inputGroup) {
                $(elementId).show();
                $(inputGroup).parent().css("margin-bottom", "0");
                isValid = false;
            }

            function hideError(elementId, inputGroup) {
                $(elementId).hide();
                $(inputGroup).parent().css("margin-bottom", "1rem");
            }

            // First Name Validation
            var fname = $("#fname").val().trim();
            if (fname === "") {
                showError("#demo1", "#fname");
            } else {
                hideError("#demo1", "#fname");
            }
            //image Validation
            // var image = $("#image").val();
            // var validExtensions =/(\.jpg|\.jpeg|\.png|\.gif|\.webp|\.jfif)$/i;
            // if (image === "") {
            //     showError("#demo2", "#image");
            // } else if (!validExtensions.exec(image)) {
            //     showError("#demo2", "#image");
            //     alert("Please upload an image in one of the following formats: .jpg, .jpeg, .webp, .jfif");
            // } else {
            //     hideError("#demo2", "#image");
            // }
            // Email Validation
            var email = $("#email").val().trim();
            var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!emailPattern.test(email)) {
                showError("#demo3", "#email");
            } else {
                hideError("#demo3", "#email");
            }

            // Contact Validation (10-digit phone number)
            var contact = $("#contact").val().trim();
            if (contact === "" || contact.length !== 10 || isNaN(contact)) {
                showError("#demo4", "#contact");
            } else {
                hideError("#demo4", "#contact");
            }

            // Course Selection Validation
            var course = $("#course").val();
            if (course === "") {
                showError("#demo5", "#course");
            } else {
                hideError("#demo5", "#course");
            }

            // Gender Validation
            var gender = $("input[name='gender']:checked").val();
            if (!gender) {
                showError("#demo6", "input[name='gender']");
            } else {
                hideError("#demo6", "input[name='gender']");
            }

            // Password Validation
            var password = $("#password").val().trim();
            if (password === "") {
                showError("#demo9", "#password");
            } else if (password.length < 6) {
                $("#demo7").text("Password must be at least 6 characters.");
                showError("#demo9", "#password");
            } else {
                hideError("#demo9", "#password");
            }
            // address Validation
            var address = $("#address").val().trim();
            if (address === "") {
                showError("#demo7", "#address");
            } else {
                hideError("#demo7", "#address");
            }
            // hobbies Validation
            var hobbiesSelected = $("input[name='hobbie[]']:checked").length;
            if (hobbiesSelected === 0) {
                showError("#demo8", "#hobbies");
            } else {
                hideError("#demo8", "#hobbies");
            }

            // Prevent form submission if any field is invalid
            if (!isValid) {
                e.preventDefault();
            }
        });
    });
</script> -->

</html>