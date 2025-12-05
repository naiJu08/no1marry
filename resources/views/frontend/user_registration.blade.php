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
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #f5f7fa;
  overflow-x: hidden;
}

body::before,
body::after {
  content: "";
  position: fixed;
  inset: 0;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  opacity: 0;
  transition: opacity 0.8s ease-in-out;
  z-index: -1;
}

body::before {
  background-image: url('{{ asset('assets/img/reg-bg.png') }}');
  opacity: 1;
}

body::after {
  background-image: url('{{ asset('assets/img/bg-reg-small.png') }}');
}

body.reg-stage-2::before {
  opacity: 0;
}

body.reg-stage-2::after {
  opacity: 1;
}

.container {
  position: relative;
  max-width: 1100px;
  padding: 30px;
  margin: 0 15px;
}

.helpsupport {
  color: #097009;
  font-weight: 800;
}

.nb {
  color: #097009;
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

.card.glass-card {
  background-color: #fff;
  backdrop-filter: blur(10px);
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card.glass-card .card-body {
  padding: 20px;
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
border-top: 1px solid #097009;
border-bottom: 1px solid #097009;

}

.input-file {
  background: #097009;
  padding: 5px !important;
}

.container form .form {
  display: none;
  transition: 0.3s ease;
}

.container form .title {
  display: block;
  margin-bottom: 8px;
  font-size: 16px;
  font-weight: 700;
  margin: 6px 0;
  color: #097009;
}

/* Chips & Card selectors */
.chip-group { display: flex; flex-wrap: wrap; gap: 8px; margin: 8px 0; }
.chip { border: 1px solid #097009; color:#097009; background:#fff; padding:8px 12px; border-radius:20px; cursor:pointer; font-weight:600; transition: all .2s ease; }
.chip.active { background:#097009; color:#fff; }

.gender-cards { display:flex; gap:12px; }
.gender-card { flex:1; min-height:90px; border:2px solid #097009; border-radius:10px; padding:12px; display:flex; align-items:center; gap:12px; cursor:pointer; transition: transform .15s ease, border-color .15s ease, background .15s ease; background:#fff; }
.gender-card:hover { transform: translateY(-2px); }
.gender-card.active { border-color:#097009; background: rgba(231, 79, 122, 0.1); color:#097009; }
.gender-card svg { width:40px; height:40px; }
.gender-card .label { font-weight:700; color:#000; }
.gender-card.active .label {color:#097009;}

/* Progress message */
.progress-message { text-align:center; color:#5f0720; font-weight:700; letter-spacing:.3px; min-height:28px; margin-top:10px; }
.progress-message.fade { opacity:0; transition: opacity .25s ease; }

.form-hero { color:#2d3748; text-align:left; }
.form-hero__badge { display:inline-flex; align-items:center; gap:8px; padding:0.4rem 0.9rem; border-radius:999px; background:rgba(143, 101, 113, 0.12); color:#fff; font-size:0.85rem; font-weight:600; text-transform:uppercase; letter-spacing:1px; margin-bottom:1rem; }
.form-hero__badge i { font-size:1rem; }
.form-hero__title { font-size:2rem; font-weight:800; margin-bottom:0.5rem; background:linear-gradient(135deg, #1f251f 0%, #ff9cb6 100%); -webkit-background-clip:text; color:transparent; }
.form-hero__subtitle { font-size:1rem; color:#fff; margin-bottom:1.5rem; }
.form-hero__highlights { display:flex; flex-wrap:wrap; gap:0.75rem; }
.form-hero__highlight { display:inline-flex; align-items:center; gap:0.5rem; padding:0.6rem 1rem; border-radius:0.75rem; background:rgba(255,255,255,0.92); box-shadow:0 6px 16px rgba(231,79,122,0.12); color:#4a4f5c; font-weight:600; }
.form-hero__highlight i { color:#097009; font-size:1rem; }

/* Two-step stepper */
.stepper { display:flex; align-items:center; justify-content:flex-start; gap:18px; margin:10px 0 18px; width:100%; }
.step { display:flex; align-items:center; gap:10px; }
.step .bubble { width:34px; height:34px; border-radius:50%; border:2px solid #097009; display:flex; align-items:center; justify-content:center; color:#097009; font-weight:800; background:#fff; }
.step.active .bubble { background:#097009; color:#fff; border-color:#097009; }
.step .label { color:#097009; font-weight:700; font-size:14px; }
.step .bar { width:48px; height:2px; background:#097009; opacity:.4; }
.step.active + .bar { opacity:1; background:#097009; }

.container form .fields {
  display: flex;
  align-items: center; 
  justify-content: space-between;
  flex-wrap: wrap;
  margin-right: 20px;
}

.text-condition a{
    color: #097009;
}

form .fields .input-field {
  display: flex;
  width: 100%;
  flex-direction: column;
  margin: 8px 0;
}

.input-field label {
  position: relative;
  font-size: 13px;
  font-weight: 600;
  color:#000;
  letter-spacing: .4px;
  text-transform: uppercase;
}

.input-field label sup.required {
  color:#ff5a4f;
  font-size: 16px;
  top: -1px;
  left: 4px;
}

.input-field label .required-chip {
  display:inline-flex;
  align-items:center;
  gap:4px;
  margin-left:8px;
  padding:0.15rem 0.5rem;
  background:rgba(255,90,79,0.12);
  color:#ff5a4f;
  font-size:10px;
  border-radius:999px;
  font-weight:700;
  letter-spacing:.6px;
}

.input-field label sup.required {
  color:#ff5a4f !important;
  font-size:16px !important;
  font-weight:700;
  margin-left:6px;
  position:relative;
  top:-1px;
}

.input-field .error {
  display:none;
  margin-top:8px;
  padding:0.55rem 0.75rem 0.55rem 2.6rem;
  border-radius:0.75rem;
  background:rgba(255,90,79,0.12);
  color:#b42318 !important;
  font-size:0.85rem;
  font-weight:600;
  border:1px solid rgba(255,90,79,0.32);
  line-height:1.3;
  position:relative;
  box-shadow:0 4px 12px rgba(255,90,79,0.15);
}

.input-field .error::before {
  content:'!';
  position:absolute;
  left:1rem;
  top:50%;
  transform:translateY(-50%);
  width:1.2rem;
  height:1.2rem;
  border-radius:999px;
  background:#ff5a4f;
  color:#fff;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:0.75rem;
  font-weight:700;
}

.input-field.invalid input,
.input-field.invalid select,
.input-field.invalid .password-container input {
  border-color:#ff5a4f !important;
  box-shadow:0 0 0 3px rgba(255,90,79,0.18);
}

.input-field.invalid .gender-card {
  border-color:#ff5a4f;
}

.input-field.invalid .chip-group .chip:not(.active) {
  border-color:#ff5a4f;
  color:#ff5a4f;
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
  color: #097009;
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
  color: #097009;
}

.password-toggle-icon i {
  vertical-align: middle;
}

.container form button,
.backBtn {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 30px;
  max-width: 20px;
  width: 100%;
  border: none;
  outline: none;
  color: #fff;
  border-radius: 5px;
  background-color: #097009;
  transition: all 0.3s linear;
  cursor: pointer;
}

.container form .btnText {
  font-size: 14px;
  font-weight: 400;
}

.logn-bt {
  background-color: #097009 !important;
  border-color: #151515 !important;
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
  background-color: #097009;
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

/* Rolling ghost button: initial transparent with border, fill rolls on hover */
.btn-rolling {
  position: relative;
  background: transparent !important;
  color: #097009 !important;
  border: 2px solid #097009 !important;
  overflow: hidden;
}
.btn-rolling::before {
  content: "";
  position: absolute;
  inset: 0;
  background: #097009;
  transform: translateX(-100%);
  transition: transform 0.35s ease;
  z-index: 0;
}
.btn-rolling:hover::before {
  transform: translateX(0);
}
.btn-rolling > * { position: relative; z-index: 1; }
.btn-rolling:hover { color: #fff !important; }

form .buttons button,
.backBtn {
  margin-right: 14px;
}

/* Top back icon next to section title */
.backTopIcon {
  background: transparent;
  border: none;
  /* color: #097009; */
  font-size: 22px;
  line-height: 1;
  margin-right: 8px;
  cursor: pointer;
}
.details.personal .title {
  display: inline-block;
  vertical-align: middle;
}
.backTopIcon i { vertical-align: middle; }

/* Smooth inner scrolling on right column */
.col-lg-6[style*="overflow-y:auto"] {
  scroll-behavior: smooth;
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
  color: #097009;
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
    width: 100%;
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
    /* background: url('{{ asset('assets/img/bg-reg-small.png') }}') center center/cover fixed no-repeat; */
    background-color: #f5f7fa;
  }
}

@media (max-width: 400px) {
  form .fields .input-field {
    width: 100%;
  }

  body {
    /* background: url('{{ asset('assets/img/bg-reg-small.png') }}') center center/cover fixed no-repeat; */
    background-color: #f5f7fa;
  }

  .container {
    padding-top: 36%;
  }
}

@import url('https://fonts.googleapis.com/css2?family=Staatliches&display=swap');

.jt {
  position: relative;
  font-size: 20px;
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

/* Premium Input Styling */
.input-field {
  position: relative;
  margin-bottom: 1.8rem;
}

.input-field label {
  display: block;
  margin-bottom: 0.6rem;
  font-weight: 600;
  color: #000000;
  font-size: 0.95rem;
}

.input-field input,
.input-field select {
  width: 100%;
  /* padding: 0.85rem 1.15rem; */
  border: 1px solid #e2e8f0;
  border-radius: 0.75rem;
  background-color: #fff;
  font-size: 1rem;
  transition: all 0.3s ease;
  box-shadow: inset 0 1px 2px rgb(107 190 21 / 8%);
}

.input-field input:focus,
.input-field select:focus {
  border-color: #097009;
  box-shadow: inset 0 1px 2px rgb(107 190 21 / 8%);
  outline: none;
}

/* Floating Labels Effect */
.input-field.focused label {
  transform: translateY(-0.5rem);
  font-size: 0.85rem;
}

/* Elegant Select Arrow */
.input-field select {
  appearance: none;
  color: #2d3748;
  font-weight: 500;
  background-color: #ffffff;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%234fda4f' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 1rem center;
  background-size: 1rem;
  border: 1px solid rgb(74 217 75 / 25%);
  box-shadow: inset 0 1px 2px rgb(107 190 21 / 8%);
}

.input-field select:hover {
  border-color: inset 0 1px 2px rgb(107 190 21 / 8%);
  box-shadow: inset 0 1px 2px rgb(107 190 21 / 8%);
}

.input-field select option {
  color: #2d3748;
  background-color: #ffffff;
}

/* Enhanced Button */
.nextBtn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 1rem 2.5rem;
  background: linear-gradient(135deg, #097009 0%, #ff9cb6 100%);
  color: white;
  border: none;
  border-radius: 0.75rem;
  font-weight: 600;
  font-size: 1.05rem;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(231, 79, 122, 0.3);
  position: relative;
  overflow: hidden;
}

.nextBtn:before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
  transition: 0.5s;
}

.nextBtn:hover:before {
  left: 100%;
}

.nextBtn:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(231, 79, 122, 0.4);
}

.nextBtn:active {
  transform: translateY(0);
}

/* Premium Chip Styling */
.chip-group {
  display: flex;
  flex-wrap: wrap;
  gap: 0.75rem;
  margin-top: 0.5rem;
}

.chip {
  padding: 0.65rem 1.25rem;
  border-radius: 9999px;
  background-color: #fff;
  border: 1px solid #000;
  color: #000;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.2s ease;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.chip:hover {
  background-color: #fff5f7;
  transform: translateY(-2px);
}

.chip.active {
  background-color: #097009;
  color: white;
  box-shadow: 0 4px 8px rgba(231, 79, 122, 0.3);
  border-color: 1px solid #097009;
}

/* Premium Gender Cards */
.gender-cards {
  display: flex;
  gap: 1.2rem;
  margin-top: 0.5rem;
}

.gender-card {
  flex: 1;
  padding: 1.5rem 1rem;
  border-radius: 1rem;
  background-color: #fff;
  border: 1px solid #e2e8f0;
  cursor: pointer;
  transition: all 0.3s ease;
  text-align: center;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.03);
}

.gender-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.gender-card.active {
  border-color: #097009;
  background-color: #fff5f7;
  box-shadow: 0 8px 20px rgba(231, 79, 122, 0.2);
}

.gender-card svg {
  width: 48px;
  height: 48px;
  margin-bottom: 0.75rem;
}

.gender-card .label {
  font-weight: 600;
  font-size: 1.05rem;
}

/* Decorative Form Container */
.card {
  position: relative;
  border: none !important;
  overflow: hidden;
}

.card:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #097009, #ff9cb6);
}

/* Form Header Styling */
.card-body h3 {
  position: relative;
  display: inline-block;
  padding-bottom: 0.5rem;
  margin-bottom: 1.5rem;
}

.card-body h3:after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 50px;
  height: 3px;
  background: #097009;
  border-radius: 3px;
}

/* Step Visibility */
.form-stage {
  display: none;
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.5s ease, transform 0.5s ease;
}

.form-stage.active-stage {
  display: block;
  opacity: 1;
  transform: translateY(0);
}

/* Responsive adjustments */
@media (max-width: 991.98px) {
  .min-vh-100 {
    min-height: auto !important;
  }
  
  .row.g-0.min-vh-100 {
    min-height: auto !important;
  }
  
  .col-lg-6.d-flex {
    padding: 2rem 1rem;
  }
}

@media (max-width: 575.98px) {
  .stepper {
    flex-wrap: wrap;
    justify-content: center;
  }
  
  .step .bar {
    display: none;
  }
  
  .step {
    margin-bottom: 1rem;
  }

  .form-hero { text-align:center; }
  .form-hero__highlights { justify-content:center; }
}
</style>
</head>

<body class="d-flex flex-column min-vh-100">

  <div class="container-fluid flex-grow-1">
    <div class="row g-0 min-vh-100">
      <!-- Left Column - Image Section -->
      <div class="col-lg-6 d-none d-lg-block position-relative">
        <div class="h-100" >
          <div class="d-flex flex-column justify-content-center align-items-center h-100 text-white p-5" >
            <div class="text-center mb-5">
              <h1 class="display-4 fw-bold mb-4">Find Your Perfect Match</h1>
              <p class="lead">Join thousands of happy couples who found love through No1Marry</p>
              <div><button class="nextBtn" onclick="window.history.back()">Back To Login</button></div>
            </div>
            
            <div class="d-flex gap-5 text-center">
              <div>
                <!-- <div class="fs-1 fw-bold">Successful Matches</div> -->
                <div>Successful Matches</div>
              </div>
              <div>
                <!-- <div class="fs-1 fw-bold">Verified Profiles</div> -->
                <div>Verified Profiles</div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Right Column - Form Section -->
      <div class="col-lg-6 d-flex align-items-start justify-content-start p-4" style="background:linear-gradient(135deg, rgb(249 249 249 / 57%) 0%, rgb(234 196 144 / 70%) 100%); height:100vh; overflow-y:auto;">
        <div class="w-100">
          <div class="form-hero mb-4">
            <div class="form-hero__badge"><i class="fa-solid fa-heart"></i>Trusted by 10K+ couples</div>
            <h2 class="form-hero__title">Begin Your Forever Story</h2>
            <p class="form-hero__subtitle">Answer a few questions so we can curate the most compatible matches tailored to your dreams.</p>
            <div class="form-hero__highlights">
              <span class="form-hero__highlight"><i class="fa-solid fa-shield-heart"></i>Verified profiles</span>
              <span class="form-hero__highlight"><i class="fa-solid fa-sparkles"></i>Automatic matchmaking</span>
              <span class="form-hero__highlight"><i class="fa-solid fa-lock"></i>Private & secure data</span>
            </div>
          </div>
          
          <!-- Enhanced Stepper -->
          <div class="stepper">
            <div class="step step-1 active">
              <div class="bubble">1</div>
              <div class="label">Basic Info</div>
            </div>
            <div class="bar"></div>
            <div class="step step-2">
              <div class="bubble">2</div>
              <div class="label">More Details</div>
            </div>
          </div>
          
          <form action="{{url('members/register')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data" class="w-100">
            @csrf
                <!-- Step 1 Content -->
                <div class="form-stage stage-1 active-stage">
                  <div class="details personal">
                    <span class="title" style="color:rgb(255, 255, 255);">BASIC INFORMATION</span>
                    <div class="progress my-3">
                      <div id="progress_stage_1" class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" 
                      aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%; background:#097009 !important">
                      </div>
                    </div>
                    <div class="progress-message" data-stage="1"></div>
                    <div class="fields">
                      <div class="input-field">
                        <label>CREATE PROFILE FOR <span class="required-chip">Required</span></label>
                        <select required name="on_behalf" id="on_behalf">
                          <option disabled selected>Select one</option>
                          <option value="self">Self</option>
                          <option value="son">Son</option>
                          <option value="daughter">Daughter</option>
                          <option value="brother">Brother</option>
                          <option value="sister">Sister</option>
                          <option value="relative">Relative</option>
                          <option value="friend">Friend</option>
                          <option value="other">Other</option>
                        </select>
                        <span class="error">This field is required.</span>
                      </div>
                      <div class="input-field">
                        <label>FIRST NAME <sup class="required">*</sup><span class="required-chip">Required</span></label>
                        <input type="text" placeholder="Enter your first name" required name="first_name" id="first_name">
                        <span class="error">This field is required.</span>
                      </div>
                      <div class="input-field">
                        <label>EMAIL ID <sup class="required">*</sup><span class="required-chip">Required</span></label>
                        <input type="email" placeholder="Enter your email address" required name="email" id="email">
                        <span class="error">Please enter a valid email address.</span>
                      </div>
                      <div class="input-field">
                        <label>MOBILE NUMBER <sup class="required">*</sup><span class="required-chip">Required</span></label>
                        <input type="number" placeholder="Enter mobile number" required name="phone" id="phone" minlength="10" maxlength="10">
                      <span class="error">Please enter a valid 10-digit mobile number.</span>
                      </div>
                      <div class="input-field">
                        <label>DATE OF BIRTH <sup class="required">*</sup><span class="required-chip">Required</span></label>
                        <div class="d-flex" style="gap:8px;">
                          <select id="dob_day" required style="flex:1;">
                            <option disabled selected>Day</option>
                          </select>
                          <select id="dob_month" required style="flex:1;">
                            <option disabled selected>Month</option>
                          </select>
                          <select id="dob_year" required style="flex:1;">
                            <option disabled selected>Year</option>
                          </select>
                        </div>
                        <input type="hidden" name="birthday" id="birthday_hidden">
                        <span class="error">This field is required.</span>
                      </div>
                      <div class="input-field">
                        <label>GENDER <span class="required-chip">Required</span></label>
                        <input type="hidden" name="gender" id="gender" required>
                        <div class="gender-cards" id="genderCards">
                          <div class="gender-card" data-value="1">
                            <!-- <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <circle cx="12" cy="8" r="4" stroke="#097009" stroke-width="2"/>
                              <path d="M12 12v8M12 20l-3-3M12 20l3-3" stroke="#097009" stroke-width="2" stroke-linecap="round"/>
                            </svg> -->
                                                        <img src="{{ static_asset('assets/man_6997525.png') }}" alt="Male" style="width: 60px;">

                            <div class="label">Male</div>
                          </div>
                          <div class="gender-card" data-value="2">
                              <!-- <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="7.5" r="3.5" stroke="#097009" stroke-width="2"/>
                                <path d="M12 11v3M9 20h6M12 14v6" stroke="#097009" stroke-width="2" stroke-linecap="round"/>
                              </svg> -->
                           <img src="{{ static_asset('assets/girl_18663698.png') }}" alt="Male" style="width: 60px;">
                            <div class="label">Female</div>
                          </div>
                        </div>
                        <span class="error">This field is required.</span>
                      </div>
                    </div>
                    <div class="details address">
                      <label>
                        <h6 class="text-condition">
                          <a href="https://no1marry.com/terms_and_conditions" class="text-account">Terms & Conditions</a> and
                          <a href="https://no1marry.com/privacy_policy" class="text-account">Privacy Policy.</a>
                        </h6>
                      </label>
                    </div>
                    <div class="d-flex justify-content-center w-100 mb-3">
                      <button class="nextBtn btn-rolling" type="button">
                        <span class="btnText" style="font-weight:800; font-size: 23px;">REGISTER NOW</span>
                        <i class="uil uil-navigator" style="font-size: 23px; font-weight:800;"></i>
                      </button>
                    </div>
                  </div>
                </div>
                
                <!-- Step 2 Content -->
                <div class="form-stage stage-2">
                  <div class="details personal">
                    <div class="d-flex justify-content-start gap-10">

                      <button type="button" class="backBtn backTopIcon" aria-label="Back"><i class="uil uil-arrow-right"></i></button>
                                                                <span class="title text-center align-items-center vertical-align-middle h-100">MORE DETAILS</span>

                    </div>
                    <div class="progress my-3">
                      <div id="progress_stage_2" class="progress-bar progress-bar-success bg-warning progress-bar-striped" role="progressbar"
                      aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                      </div>
                    </div>
                    <div class="progress-message" data-stage="2"></div>
                    <div class="fields">
                      <div class="input-field">
                        <label>RELIGION <span class="required-chip">Required</span></label>
                        <select required name="religion_id" id="religion_id">
                          <option disabled selected>Select Religion</option>
                          <?php foreach ($religion as $rel) { ?>
                          <option value="<?php echo $rel->id ?>"><?php echo $rel->name ?></option>
                          <?php } ?>
                        </select>
                        <span class="error">This field is required.</span>
                      </div>
                      <div class="input-field">
                        <label>CASTE <span class="required-chip">Required</span></label>
                        <select required name="caste_id" id="caste_id">
                          <option disabled selected>Select Caste</option>
                        </select>
                        <span class="error">This field is required.</span>
                      </div>
                      <div class="input-field">
                        <label>MARITAL STATUS <span class="required-chip">Required</span></label>
                        <input type="hidden" name="marital_status_id" id="marital_status_id" required>
                        <div class="chip-group" id="maritalChips">
                          <?php foreach ($marital_statuses as $marital_statuse) { ?>
                            <span class="chip" data-value="<?php echo $marital_statuse->id ?>"><?php echo $marital_statuse->name ?></span>
                          <?php } ?>
                        </div>
                        <span class="error">This field is required.</span>
                      </div>
                      <div class="input-field">
                        <label>FAMILY VALUES </label>
                        <div class="chip-group" id="familyValueChips">
                          <?php if(isset($family_values)) { foreach ($family_values as $fv) { ?>
                            <span class="chip" data-value="<?php echo $fv->id ?>"><?php echo $fv->name ?></span>
                          <?php } } ?>
                        </div>
                        <input type="hidden" name="family_value_id" id="family_value_id">
                      </div>
                      <div class="input-field">
                        <label>JOB CAREER <span class="required-chip">Required</span></label>
                          <input required type="text" placeholder="Enter your job career" name="designation" id="designation">
                        <span class="error">This field is required.</span>
                      </div>
                      <div class="input-field">
                        <label>JOB SECTOR</label>
                        <div class="chip-group" id="sectorChips">
                          <span class="chip" data-value="Government Sector">Government Sector</span>
                          <span class="chip" data-value="Private Sector">Private Sector</span>
                          <span class="chip" data-value="Self Employed">Self Employed</span>
                        </div>
                        <input type="hidden" name="sector" id="sector">
                      </div>
                      <div class="input-field">
                        <input type="hidden" name="country_id" value="101">
                        <label>STATE <span class="required-chip">Required</span></label>
                        <select required name="state_id" id="state_id">
                          <option disabled selected>Select State</option>
                          <?php foreach ($states as $state) { ?>
                          <option value="<?php echo $state->id ?>"><?php echo $state->name ?></option>
                          <?php } ?>
                        </select>
                        <span class="error">This field is required.</span>
                      </div>
                      <div class="input-field">
                        <label>CITY <span class="required-chip">Required</span></label>
                        <select required name="city_id" id="city_id">
                          <option disabled selected>Select City</option>
                        </select>
                        <span class="error">This field is required.</span>
                      </div>
                      <div class="input-field">
                        <label>ANY DISABILITY</label>
                        <div class="chip-group" id="disabilityChips">
                          <span class="chip active" data-value="no">No</span>
                          <span class="chip" data-value="Physically Challenged">Physically Challenged</span>
                        </div>
                        <input type="hidden" name="disability" id="disability" value="no">
                      </div>
                      <div class="input-field">
                        <label>HEIGHT (cm)</label>
                        <input type="number" min="0" step="1" placeholder="e.g., 170" name="height" id="height">
                      </div>
                      <div class="input-field">
                        <label>WEIGHT (kg)</label>
                        <input type="number" min="0" step="0.1" placeholder="e.g., 65.5" name="weight" id="weight">
                      </div>
                      <div class="input-field">
                        <label>EDUCATIONAL QUALIFICATIONS <sup class="required">*</sup><span class="required-chip">Required</span></label>
                        <input required type="text" placeholder="Enter your educational qualification" name="degree" id="degree">
                        <span class="error">This field is required.</span>
                      </div>
                      <div class="input-field">
                        <label>PASSWORD <span class="required-chip">Required</span></label>
                        <div class="password-container">
                          <input type="password" id="password" placeholder="" name="password" required>
                          <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
                        </div>
                        <span class="error">This field is required.</span>
                      </div>
                    </div>
                    <div class="details address">
                      <label>
                        <h6 class="text-condition">
                          <a href="https://no1marry.com/terms_and_conditions" class="text-account">Terms & Conditions</a> and
                          <a href="https://no1marry.com/privacy_policy" class="text-account">Privacy Policy.</a>
                        </h6>
                      </label>
                    </div>
                    <div class="d-flex justify-content-center gap-3 w-100 mb-3">
                      <button type="submit" class="submit nextBtn btn-rolling" style="font-weight:800;">
                        <span class="btnText">Create Account</span>
                        <i class="uil uil-navigator"></i>
                      </button>
                    </div>
                  </div>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    var CSRF_TOKEN = '{{ csrf_token() }}';
    // Progress messages per stage (2-step)
    var stageMessages = {
      1: ["Let's get started!", "Tell us about you.", "Basic info first."],
      2: ["Great! A few more details.", "This helps find better matches.", "You're almost done."]
    };
    // Threshold-based fun messages
    var thresholdMessages = {
      1: {
        0: "Begin your journey ✨",
        30: "Nice start! Keep going 🚀",
        50: "Halfway there! 👍",
        70: "Looking good! Almost done 👏",
        90: "Just a bit more… 💪",
        100: "Basic info complete! ✅"
      },
      2: {
        0: "Let's fine-tune your profile ✨",
        30: "Great progress!",
        50: "Halfway through!",
        70: "So close to finishing!",
        90: "Wrap it up now!",
        100: "All set. Ready to register ✅"
      }
    };
    function updateProgressMessage(stageEl) {
      var $el = stageEl.find('.progress-message');
      if ($el.length === 0) return;
      var stageIdx = Object.keys(stageMessages).find(function(k){ return stageEl.hasClass('stage-' + k); });
      if (!stageIdx) return;
      var msgs = stageMessages[stageIdx];
      var msg = msgs[Math.floor(Math.random()*msgs.length)];
      $el.addClass('fade');
      setTimeout(function(){ $el.text(msg).removeClass('fade'); }, 180);
    }
    // Utility: compute stage percent based on filled fields
    function computeStagePercent($stage){
      var $fields = $stage.find('input, select').filter(function(){
        var $el = $(this);
        // Exclude buttons and non-data inputs
        if ($el.is(':button, :submit, :reset')) return false;
        // Consider selects and inputs that are required OR meaningful hidden like gender/disability
        if ($el.attr('type') === 'hidden'){
          // include if required or has a known id we track
          return $el.prop('required') || ['gender','marital_status_id','family_value_id','sector','disability'].includes($el.attr('id'));
        }
        return $el.prop('required') || $el.is('select');
      });

      var total = 0, done = 0;
      $fields.each(function(){
        var $el = $(this);
        total++;
        var val = ($el.is('select')) ? $el.val() : $.trim($el.val());
        if (val && val !== 'Day' && val !== 'Month' && val !== 'Year') done++;
      });
      if (total === 0) return 0;
      return Math.max(0, Math.min(100, Math.round((done/total)*100)));
    }

    function pickThresholdMessage(stageIdx, percent){
      var map = thresholdMessages[stageIdx] || {};
      var keys = Object.keys(map).map(function(k){return parseInt(k,10)}).sort(function(a,b){return a-b});
      var msg = map[0] || '';
      for (var i=0;i<keys.length;i++){ if (percent >= keys[i]) msg = map[keys[i]]; }
      return msg;
    }

    function updateStageProgress($stage){
      if (!$stage || $stage.length===0) return;
      // which stage?
      var stageIdx = $stage.hasClass('stage-2') ? 2 : 1;
      var percent = computeStagePercent($stage);
      var $bar = $stage.find('.progress-bar');
      $bar.stop(true,true).css('width', percent + '%').attr('aria-valuenow', percent);
      var $msg = $stage.find('.progress-message');
      if ($msg.length){ $msg.text(pickThresholdMessage(stageIdx, percent)); }
    }

    // Initialize first stage message and progress
    updateStageProgress($('.form-stage.stage-1'));

    // Stepper header toggle
    function setStepperActive(stepIdx){
      $('.stepper .step').removeClass('active');
      $('.stepper .step-'+stepIdx).addClass('active');
    }

    // Background stage helper for smooth image transition
    function setBackgroundStage(stageIdx){
      var $body = $('body');
      if (stageIdx === 2) {
        $body.addClass('reg-stage-2');
      } else {
        $body.removeClass('reg-stage-2');
      }
    }

    // Initial background corresponds to stage 1 (Basic Info)
    setBackgroundStage(1);

    // Initialize DOB dropdowns
    (function initDOB(){
      var $d = $('#dob_day'), $m = $('#dob_month'), $y = $('#dob_year');
      for (var i=1;i<=31;i++){ $d.append('<option value="'+String(i).padStart(2,'0')+'">'+i+'</option>'); }
      var months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
      for (var j=1;j<=12;j++){ $m.append('<option value="'+String(j).padStart(2,'0')+'">'+months[j-1]+'</option>'); }
      var currentYear = new Date().getFullYear();
      for (var y=currentYear; y>=1950; y--){ $('#dob_year').append('<option value="'+y+'">'+y+'</option>'); }
    })();

    function assembleBirthday(){
      var d=$('#dob_day').val(), m=$('#dob_month').val(), y=$('#dob_year').val();
      if(d && m && y){ $('#birthday_hidden').val(y+'-'+m+'-'+d); }
    }

    // Step navigation
    $(".nextBtn").on("click", function () {
      var currentForm = $(this).closest(".form-stage");
      assembleBirthday();
      if (validateForm(currentForm)) {
        currentForm.removeClass("active-stage");
        var nextForm = currentForm.next(".form-stage");
        if (nextForm.length > 0) {
          setTimeout(function() {
            nextForm.addClass("active-stage");
            var stageIdx = nextForm.hasClass('stage-2') ? 2 : 1;
            setStepperActive(stageIdx);
            setBackgroundStage(stageIdx);
            updateStageProgress(nextForm);
          }, 300);
        }
      }
    });

    $(".backBtn").on("click", function () {
      var currentForm = $(this).closest(".form-stage");
      currentForm.removeClass("active-stage");
      var prevForm = currentForm.prev(".form-stage");
      if (prevForm.length > 0) {
        setTimeout(function() {
          prevForm.addClass("active-stage");
          var stageIdx = prevForm.hasClass('stage-2') ? 2 : 1;
          setStepperActive(stageIdx);
          setBackgroundStage(stageIdx);
          updateStageProgress(prevForm);
        }, 300);
      }
    });

    // Recompute progress on any data change within stages
    $('form').on('input change', '.form-stage :input', function(){
      var $fieldWrapper = $(this).closest('.input-field');
      var val = $(this).val();
      if ($(this).is('select')) {
        if (val && val !== 'Day' && val !== 'Month' && val !== 'Year') {
          $fieldWrapper.removeClass('invalid');
          $fieldWrapper.find('.error').hide();
        }
      } else if ($(this).attr('type') !== 'hidden') {
        if ($.trim(val) !== '') {
          $fieldWrapper.removeClass('invalid');
          $fieldWrapper.find('.error').hide();
        }
      }
      updateStageProgress($(this).closest('.form-stage'));
    });

    // Dynamic dropdowns: caste by religion
    $('#religion_id').on('change', function(){
      var rid = $(this).val();
      if(!rid){ return; }
      $('#caste_id').html('<option disabled selected>Loading...</option>');
      $.ajax({
        method: 'POST',
        url: '{{ route('castes.get_caste_by_religion.noauth') }}',
        data: { _token: CSRF_TOKEN, religion_id: rid },
        success: function(resp){
          var options = '<option disabled selected>Select Caste</option>';
          if(Array.isArray(resp)){
            resp.forEach(function(c){ options += '<option value="'+c.id+'">'+c.name+'</option>'; });
          } else {
            for (var i in resp){ if(resp.hasOwnProperty(i) && resp[i].id){ options += '<option value="'+resp[i].id+'">'+resp[i].name+'</option>'; } }
          }
          $('#caste_id').html(options);
        },
        error: function(){ $('#caste_id').html('<option disabled selected>Failed to load</option>'); }
      });
    });

    // Dynamic dropdowns: cities by state
    $('#state_id').on('change', function(){
      var sid = $(this).val();
      if(!sid){ return; }
      $('#city_id').html('<option disabled selected>Loading...</option>');
      $.ajax({
        method: 'POST',
        url: '{{ route('extra.city') }}',
        data: { _token: CSRF_TOKEN, state_id: sid },
        success: function(resp){
          var options = '<option disabled selected>Select City</option>';
          if(Array.isArray(resp)){
            resp.forEach(function(c){ options += '<option value="'+c.id+'">'+c.name+'</option>'; });
          } else if (resp && resp.data && Array.isArray(resp.data)){
            resp.data.forEach(function(c){ options += '<option value="'+c.id+'">'+c.name+'</option>'; });
          } else {
            for (var i in resp){ if(resp.hasOwnProperty(i) && resp[i].id){ options += '<option value="'+resp[i].id+'">'+resp[i].name+'</option>'; } }
          }
          $('#city_id').html(options);
        },
        error: function(){ $('#city_id').html('<option disabled selected>Failed to load</option>'); }
      });
    });

    function animateProgress(stageEl){
      var $bar = stageEl.find('.progress-bar');
      if ($bar.length === 0) return;
      var targetWidth = $bar.attr('style'); // e.g., width:50%
      // reset to 0 then animate to target for visual effect
      $bar.stop(true, true).css('width','0%');
      var match = /width:\s*(\d+)%/.exec(targetWidth || '');
      var percent = match ? parseInt(match[1],10) : 0;
      setTimeout(function(){ $bar.animate({ width: percent + '%' }, 250); }, 20);
    }

    // Gender cards
    $('#genderCards').on('click', '.gender-card', function(){
      var val = $(this).data('value');
      $('#gender').val(val);
      $('#genderCards .gender-card').removeClass('active');
      $(this).addClass('active');
      // hide error under gender block
      var $wrapper = $(this).closest('.input-field');
      $wrapper.find('.error').hide();
      $wrapper.removeClass('invalid');
      updateStageProgress($(this).closest('.form-stage'));
    });

    // Single-select chips helpers
    function attachSingleChip(containerSelector, inputSelector) {
      $(containerSelector).on('click', '.chip', function(){
        var $cont = $(containerSelector);
        $cont.find('.chip').removeClass('active');
        $(this).addClass('active');
        $(inputSelector).val($(this).data('value'));
        // hide error if any under the same input-field
        var $wrap = $cont.closest('.input-field');
        $wrap.find('.error').hide();
        $wrap.removeClass('invalid');
        updateStageProgress($(this).closest('.form-stage'));
      });
    }
    attachSingleChip('#maritalChips', '#marital_status_id');
    attachSingleChip('#familyValueChips', '#family_value_id');
    attachSingleChip('#sectorChips', '#sector');
    attachSingleChip('#disabilityChips', '#disability');

    // Image preview click/select
    $('#imagePreview').on('click', function(){ $('#profile').trigger('click'); });
    $('#profile').on('change', function(e){
      const file = this.files && this.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = function(ev){
        $('#imagePreview .image-preview__image').attr('src', ev.target.result);
        $('#imagePreview .image-preview__default-text').hide();
      };
      reader.readAsDataURL(file);
      $(this).closest('.input-field').find('.error').hide();
    });

    // Assemble birthday on submit as well
    $('form').on('submit', function(){ assembleBirthday(); });

    function validateForm(form) {
      var isValid = true;

      // Validate required inputs/selects visible in this stage
      form.find('input, select').each(function () {
        var $el = $(this);
        var $wrapper = $el.closest('.input-field');
        if ($el.prop('required') && !$el.val()) {
          // For hidden required inputs, show error under the parent .input-field
          if ($el.attr('type') === 'hidden') {
            $wrapper.addClass('invalid');
            $wrapper.find('.error').show();
          } else {
            $wrapper.addClass('invalid');
            $wrapper.find('.error').show();
          }
          isValid = false;
        } else {
          if ($el.attr('type') === 'hidden') {
            $wrapper.removeClass('invalid');
            $wrapper.find('.error').hide();
          } else {
            $wrapper.removeClass('invalid');
            $wrapper.find('.error').hide();
          }
        }
      });

      // Phone number format
      var phoneInput = form.find('#phone');
      if (phoneInput.length > 0) {
        var phoneValue = phoneInput.val();
        if (phoneValue.length !== 10 || !/^\d+$/.test(phoneValue)) {
          var $phoneWrapper = phoneInput.closest('.input-field');
          $phoneWrapper.addClass('invalid');
          $phoneWrapper.find('.error').text('Please enter a valid 10-digit mobile number.').show();
          isValid = false;
        } else {
          phoneInput.closest('.input-field').removeClass('invalid').find('.error').hide();
        }
      }

      // DOB selects
      var d=$('#dob_day').val(), m=$('#dob_month').val(), y=$('#dob_year').val();
      var dobField = $('#dob_year').closest('.input-field');
      if (dobField.length){
        if (!d || !m || !y){
          dobField.addClass('invalid');
          dobField.find('.error').show();
          isValid=false;
        } else {
          dobField.removeClass('invalid');
          dobField.find('.error').hide();
        }
      }

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

  profileInput.addEventListener('change', function(e){
    const file = this.files && this.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(ev){
      $('#imagePreview .image-preview__image').attr('src', ev.target.result);
      $('#imagePreview .image-preview__default-text').hide();
    };
    reader.readAsDataURL(file);
    $(this).closest('.input-field').find('.error').hide();
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

  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    // AOS animations
    AOS.init({ once:true, duration:700, offset:80, easing:'ease-out-cubic' });

    // Header glass effect on scroll
    const nav = document.querySelector('.navbar');
    const toggleNavBg = () => {
      if(window.scrollY > 24){
        nav.classList.add('navbar-glass');
        nav.classList.remove('navbar-transparent');
      }else{
        nav.classList.add('navbar-transparent');
        nav.classList.remove('navbar-glass');
      }
    };
    toggleNavBg();
    window.addEventListener('scroll', toggleNavBg);
  </script>
</html>

<script>
  // Add subtle animations to form elements
  document.addEventListener('DOMContentLoaded', function() {
    // Animate form elements on page load
    const formElements = document.querySelectorAll('.input-field, .gender-cards, .chip-group');
    formElements.forEach((el, index) => {
      setTimeout(() => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        
        // Trigger reflow
        void el.offsetWidth;
        
        el.style.opacity = '1';
        el.style.transform = 'translateY(0)';
      }, 100 * index);
    });
    
    // Add hover effect to buttons
    const buttons = document.querySelectorAll('.nextBtn, .backBtn');
    buttons.forEach(button => {
      button.addEventListener('mouseenter', () => {
        button.style.transform = 'translateY(-3px)';
      });
      button.addEventListener('mouseleave', () => {
        button.style.transform = 'translateY(0)';
      });
    });
  });
</script>