<!DOCTYPE html>
<html lang="en">

<head>
  <title>No1 Marry.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="icon" type="image/x-icon" href="{{ static_asset('assets/assets/img/favicon.png') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="{{ static_asset('assets/assets/css/bootstrap.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="// https://codepen.io/sandstedt/pen/GRZeywP?editors=1000"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!--<link href="{{ static_asset('assets/assets/css/select2.min.css') }}" rel="stylesheet" />-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://db.onlinewebfonts.com/c/3bea650d056f5bb2dcafcb462b8a0745?family=Larsseit-Medium" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!--<link rel="stylesheet" href="{{ static_asset('assets/assets/css/stylemedia.css') }}" rel="stylesheet">-->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-image: url("/public/assets/img/Blue and Gold Traditional Indian Wedding Thank You Card (37).png");
  background-size: cover;
  /*background: linear-gradient(-20deg, #d558c8 0%, #24d292 100%);*/
}

.container {
  position: relative;
  max-width: 1100px;
  padding: 30px;
  margin: 0 15px;
}

.helpsupport {
  color: #fff;
  font-weight: 800;
}

.nb {
  color: #FFE31A;
  font-weight: 700;
  font-size: 18px;
}

.container header {
  position: relative;
  font-size: 20px;
  font-weight: 600;
  color: #333;
}

.container header::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: -2px;
  height: 3px;
  width: 27px;
  border-radius: 8px;
}

.container form {
  position: relative;
  min-height: 200px;
  overflow: hidden;
  border-radius: 6px;
  padding: 10px;
  margin-top: 30px;
  /*background-color: #caa6a670;*/
background: rgba(255, 255, 255, 0.2);

}

.input-file {
  background: #fff;
  padding: 5px !important;
}

.container form .form {
  display: none;
  transition: 0.3s ease;
}

.container form .form.active-stage {
  display: block;
}

.container form .title {
  display: block;
  margin-bottom: 8px;
  font-size: 16px;
  font-weight: 700;
  margin: 6px 0;
  color: #000;
}

.container form .fields {
  display: flex;
  align-items: center; 
  justify-content: space-between;
  flex-wrap: wrap;
  margin-right: 20px;
}

.text-condition a{
    color: #fff;
}

form .fields .input-field {
  display: flex;
  width: calc(100% / 2 - 15px);
  flex-direction: column;
  margin: 4px 0;
}

.input-field label {
  font-size: 13px;
  font-weight: 600;
  color: #000;
}

.input-field input,
select {
  outline: none;
  font-size: 14px;
  font-weight: 500;
  border-radius: 5px;
  border: 1px solid #aaa;
  padding: 0 15px;
  height: 42px;
  margin: 8px 0;
}

.input-field input:focus,
.input-field select:focus {
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
}

.input-field select,
.input-field input[type="date"] {
  color: #000;
  font-weight: 500;
  background-color: #fff;
}

.input-field input[type="date"]:valid {
  color: #333;
}

.password-container {
  position: relative;
  display: flex;
  align-items: center;
}

#password {
  width: 100%;
  padding-right: 30px;
}

.password-toggle-icon {
  position: absolute;
  right: 10px;
  cursor: pointer;
  font-size: 18px;
  color: #000;
}

.password-toggle-icon i {
  vertical-align: middle;
}

.container form button,
.backBtn {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 45px;
  max-width: 200px;
  width: 100%;
  border: none;
  outline: none;
  color: #fff;
  border-radius: 5px;
  background-color: #28a745;
  transition: all 0.3s linear;
  cursor: pointer;
}

.container form .btnText {
  font-size: 14px;
  font-weight: 400;
}

.logn-bt {
  background-color: #000 !important;
  color: #fff;
  padding: 10px;
  border-radius: 5px;
  cursor:pointer;
}

.logn-a {
  color: #fff;
}

.logn-a:hover {
  color: #fff;
  text-decoration: none;
  font-weight: 800;
}

form button:hover {
  background-color: #265df2;
}

form button i,
form .backBtn i {
  margin: 0 6px;
}

form .backBtn i {
  transform: rotate(180deg);
}

form .buttons {
  display: flex;
  align-items: center;
}

form .buttons button,
.backBtn {
  margin-right: 14px;
}

.input-file {
  display: none;
}

.image-preview {
  width: 100%;
  height: 300px;
  border: 2px solid #dddddd;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 10px;
  position: relative;
  overflow: hidden;
  cursor: pointer;
}

.image-preview__image {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.image-preview__default-text {
  color: #000;
  font-size: 20px;
  position: absolute;
  font-weight: 700;
}

@media (max-width: 750px) {
  .container {
    padding: 50px 0px;
  }

  .container form {
    overflow-y: scroll;
  }

  .container form::-webkit-scrollbar {
    display: none;
  }

  form .fields .input-field {
    width: calc(100% / 2 - 15px);
  }
}

@media (max-width: 550px) {
  form .fields .input-field {
    width: 100%;
  }

  .container form {
    overflow-y: scroll;
    min-height: 300px;
  }

  .container {
    padding: 100px 0px;
  }

  body {
    background-image: url("/public/assets/img/Blue and Gold Traditional Indian Wedding Thank You Card (39).png");
      /*background: linear-gradient(-20deg, #d558c8 0%, #24d292 100%);*/

  }
}

@media (max-width: 400px) {
  form .fields .input-field {
    width: 100%;
  }

  body {
    background-image: url("/public/assets/img/Blue and Gold Traditional Indian Wedding Thank You Card (39).png");
      /*background: linear-gradient(-20deg, #d558c8 0%, #24d292 100%);*/

  }

  .container {
    padding-top: 36%;
  }
}

@import url('https://fonts.googleapis.com/css2?family=Staatliches&display=swap');

.jt {
  position: relative;
  font-size: 50px;
  font-family: 'Staatliches', sans-serif;
  text-transform: uppercase;
  font-display: swap;
  text-shadow: 0 0 5px #f03f34;
  color: #e2efe9;
}

.jt__row {
  display: block;
}

.jt__row:nth-child(1) {
  clip-path: polygon(-10% 75%, 110% 75%, 110% 110%, -10% 110%);
}

.jt__row:nth-child(2) {
  clip-path: polygon(-10% 50%, 110% 50%, 110% 75.3%, -10% 75.3%);
}

.jt__row:nth-child(3) {
  clip-path: polygon(-10% 25%, 110% 25%, 110% 50.3%, -10% 50.3%);
}

.jt__row:nth-child(4) {
  clip-path: polygon(-10% 0%, 110% 0%, 110% 25.3%, -10% 25.3%);
}

.jt__row.jt__row--sibling {
  position: absolute;
  top: 0;
  left: 0;
  user-select: none;
  witdh: 800px;
}

.jt__text {
  display: block;
  transform-origin: bottom left;
  animation: moveIn 2s 0s cubic-bezier(.36, 0, .06, 1) alternate infinite;
}

.jt__row:nth-child(1) .jt__text {
  transform: translateY(-0.1em);
}

.jt__row:nth-child(2) .jt__text {
  transform: translateY(-0.3em) scaleY(1.1);
}

.jt__row:nth-child(3) .jt__text {
  transform: translateY(-0.5em) scaleY(1.2);
}

.jt__row:nth-child(4) .jt__text {
  transform: translateY(-0.7em) scaleY(1.3);
}

.jt__row:nth-child(5) .jt__text {
  transform: translateY(-0.9em) scaleY(1.4);
}

.jt__row:nth-child(6) .jt__text {
  transform: translateY(-1.1em) scaleY(1.5);
}

@keyframes moveIn {
  50%,
  100% {
    transform: translateY(0em);
  }

  0% {
    opacity: 0;
    filter: blur(10px);
  }

  100% {
    opacity: 1;
    filter: blur(0px);
  }
}

.debug .jt__row:nth-child(even) {
  color: black;
  background: white;
}

.debug .jt__row:nth-child(odd) {
  color: white;
  background: black;
}
</style>
</head>

<body>


  <div class="container">
        <!--<img src="/public/assets/img/Blue_and_Gold_Traditional_Indian_Wedding_Thank_You_Card__36_-removebg-preview.png" height="150px">-->

    <div class="d-flex justify-content-center pt-4">
        

        
      <h1 class="jt --debug">
        <span class="jt__row">
          <span class="jt__text">SITE UNDER MAINTENANCES</span>
        </span>
        <span class="jt__row jt__row--sibling" aria-hidden="true">
          <span class="jt__text">SITE UNDER MAINTENANCES</span>
        </span>
        <span class="jt__row jt__row--sibling" aria-hidden="true">
          <span class="jt__text">SITE UNDER MAINTENANCSE</span>
        </span>
        <span class="jt__row jt__row--sibling" aria-hidden="true">
          <span class="jt__text">SITE UNDER MAINTENANSCE</span>
        </span>
      </h1>
    </div>
    <div class="d-flex justify-content-center form">
          <span class="logn-bt">Will Be Back In 7 Daysssss</span>
</div>

  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".nextBtn").on("click", function () {
                var currentForm = $(this).closest(".form");
                if (validateForm(currentForm)) {
                    var nextForm = currentForm.next(".form");
                    if (nextForm.length > 0) {
                        currentForm.removeClass("active-stage");
                        nextForm.addClass("active-stage");
                    }
                }
            });

            $(".backBtn").on("click", function () {
                var currentForm = $(this).closest(".form");
                var prevForm = currentForm.prev(".form");
                if (prevForm.length > 0) {
                    currentForm.removeClass("active-stage");
                    prevForm.addClass("active-stage");
                }
            });

            function validateForm(form) {
                var isValid = true;
                form.find('input, select').each(function () {
                    if ($(this).prop('required') && !$(this).val()) {
                        $(this).next('.error').show();
                        isValid = false;
                    } else {
                        $(this).next('.error').hide();
                    }
                });
                return isValid;
            }
        });
    </script>



  <script>
    const passwordField = document.getElementById("password");
    const togglePassword = document.querySelector(".password-toggle-icon i");

    togglePassword.addEventListener("click", function () {
      if (passwordField.type === "password") {
        passwordField.type = "text";
        togglePassword.classList.remove("fa-eye");
        togglePassword.classList.add("fa-eye-slash");
      } else {
        passwordField.type = "password";
        togglePassword.classList.remove("fa-eye-slash");
        togglePassword.classList.add("fa-eye");
      }
    });
  </script>


  <script>
    document.onkeydown = function (e) {
      if (event.keyCode == 123) {
        return false;
      }
      if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
        return false;
      }
      if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
        return false;
      }
      if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
        return false;
      }
    }
  </script>

<!--<script>-->
<!--  const form = document.querySelector("form"),-->
<!--        nextBtn = form.querySelector(".nextBtn"),-->
<!--        backBtn = form.querySelector(".backBtn"),-->
<!--        submitBtn = form.querySelector(".submit"),-->
<!--        firstInputs = form.querySelectorAll(".first input, .first select"),-->
<!--        secondInputs = form.querySelectorAll(".second input:not([type='file']), .second select");-->

<!--  nextBtn.addEventListener("click", () => {-->
<!--    let valid = true;-->
<!--    firstInputs.forEach(input => {-->
<!--      if (input.tagName === "SELECT" && input.selectedIndex === 0) {-->
<!--        valid = false;-->
<!--      } else if (input.tagName !== "SELECT" && !input.value) {-->
<!--        valid = false;-->
<!--      }-->
<!--    });-->
<!--    if (valid) {-->
<!--      form.classList.add('secActive');-->
<!--    } else {-->
<!--      alert('Please fill out all fields in the first section.');-->
<!--    }-->
<!--  });-->

<!--  backBtn.addEventListener("click", () => form.classList.remove('secActive'));-->

<!--  submitBtn.addEventListener("click", (e) => {-->
    <!--e.preventDefault(); // Prevent the default form submission-->
<!--    let valid = true;-->
<!--    secondInputs.forEach(input => {-->
<!--      if (input.tagName === "SELECT" && input.selectedIndex === 0) {-->
<!--        valid = false;-->
<!--      } else if (input.tagName !== "SELECT" && !input.value) {-->
<!--        valid = false;-->
<!--      }-->
<!--    });-->
<!--    if (valid) {-->
      <!--form.submit(); -->
<!--    } else {-->
<!--      alert('Please fill out all fields in the second section.');-->
<!--    }-->
<!--  });-->
<!--</script>-->


<!--imagecurrent -->
<!--<script>-->
<!--const profileInput = document.getElementById('profile');-->
<!--const imagePreviewContainer = document.getElementById('imagePreview');-->
<!--const defaultText = imagePreviewContainer.querySelector('.image-preview__default-text');-->
<!--const imagePreview = imagePreviewContainer.querySelector('.image-preview__image');-->

<!--imagePreviewContainer.addEventListener('click', function() {-->
<!--  profileInput.click();-->
<!--});-->

<!--profileInput.addEventListener('change', function() {-->
<!--  const file = this.files[0];-->

<!--  if (file) {-->
<!--    const reader = new FileReader();-->

<!--    defaultText.style.display = "none";-->
<!--    imagePreview.style.display = "block";-->

<!--    reader.addEventListener('load', function() {-->
<!--      imagePreview.setAttribute('src', this.result);-->
<!--    });-->

<!--    reader.readAsDataURL(file);-->
<!--  } else {-->
<!--    defaultText.style.display = "block";-->
<!--    imagePreview.style.display = "none";-->
<!--    imagePreview.setAttribute('src', '');-->
<!--  }-->
<!--});-->
<!--</script>-->

<!--img new-->
<script>
  const profileInput = document.getElementById('profile');
  const imagePreviewContainer = document.getElementById('imagePreview');
  const defaultText = imagePreviewContainer.querySelector('.image-preview__default-text');
  const imagePreview = imagePreviewContainer.querySelector('.image-preview__image');

  imagePreviewContainer.addEventListener('click', function() {
    profileInput.click();
  });

  profileInput.addEventListener('change', function() {
    const file = this.files[0];

    if (file) {
      const reader = new FileReader();

      defaultText.style.display = "none";
      imagePreview.style.display = "block";

      reader.addEventListener('load', function() {
        imagePreview.setAttribute('src', this.result);
        
        // Compress the image after loading
        compressImage(file, 0.7); // Compress image to 70% quality
      });

      reader.readAsDataURL(file);
    } else {
      defaultText.style.display = "block";
      imagePreview.style.display = "none";
      imagePreview.setAttribute('src', '');
    }
  });

  function compressImage(imageFile, quality) {
    const reader = new FileReader();
    reader.readAsDataURL(imageFile);

    reader.onload = function(event) {
      const img = new Image();
      img.src = event.target.result;

      img.onload = function() {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        
        // Set the desired width and height for compression
        const MAX_WIDTH = 600; // e.g., 600px max width
        const scaleSize = MAX_WIDTH / img.width;

        canvas.width = MAX_WIDTH;
        canvas.height = img.height * scaleSize;

        // Draw image onto canvas
        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

        // Convert canvas data to a blob with specified quality
        canvas.toBlob(function(blob) {
          const compressedFile = new File([blob], imageFile.name, {type: imageFile.type});
          
          // Replace the original file with the compressed one
          const dataTransfer = new DataTransfer();
          dataTransfer.items.add(compressedFile);
          profileInput.files = dataTransfer.files;

          // Proceed with form submission or further processing
        }, imageFile.type, quality);
      };
    };
  }
</script>


  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Include moment.js -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <!-- Include daterangepicker JS -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('input[name="birthday"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
          format: 'YYYY-MM-DD'
        }
      });
    });
  </script>
  
  
</body>

</html>

<script>
  function get_caste_by_religion(){
            var religion_id = $('#religion_id').val();
            $('#caste_id').html('')
            $.post('{{ route('castes.get_caste_by_religion.noauth') }}',{_token:'{{ csrf_token() }}', religion_id:religion_id}, function(data){

              $('#caste_id').append($('<option>', {
                        value: "",
                        text: "Select"
                    }));
              for (var i = 0; i < data.length; i++) {
                  console.log(data[i])
                  
                    $('#caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                
                
            });

        }


        function get_city_by_state(){
            var state_id = $('#state_id').val();
            $('#city_id').html('')
            $.post('{{ route('extra.city') }}',{_token:'{{ csrf_token() }}', state_id:state_id}, function(data){
              $('#city_id').append($('<option>', {
                        value: "",
                        text: "Select"
                    }));
              for (var i = 0; i < data.length; i++) {
                  console.log(data[i])
                  
                    $('#city_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                
                
            });

        }



  $('#religion_id').on('change', function () {
    get_caste_by_religion();
  });

  $('#state_id').on('change', function () {
    get_city_by_state();
  });
  
  $('#phone').on('change', function () {
    var phone =$(this).val();
    if (phone.length!=10)
    {
        $('#phone_validation').text("Invalid phone number");
    }
    else{
        $('#phone_validation').text("");
    }
  });
  
   $('#email').on('change', function () {
    var email =$(this).val();
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!emailPattern.test(email)) {
                $('#email_validation').text("Invalid E-mail ID");
            } else {
                $('#email_validation').text("");
            }
  });
  
  
</script>