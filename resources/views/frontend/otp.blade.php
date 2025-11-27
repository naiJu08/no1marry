<!DOCTYPE html>
<html lang="en">
<head>
  <title>No1 Marry.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" type="image/x-icon" href="{{ static_asset('assets/assets/img/favicon.png') }}">
  <link rel="stylesheet" href="{{ static_asset('assets/assets/css/bootstrap.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="{{ static_asset('assets/assets/css/select2.min.css') }}" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
  <link rel="stylesheet" href="{{ static_asset('assets/assets/css/stylemedia.css') }}">
  <style>
      .btn-red
      {
          width:118% !important;
      }
      .preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

.loader {
  border: 8px solid #f3f3f3;
  border-radius: 50%;
  border-top: 8px solid #3498db;
  width: 50px;
  height: 50px;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.content {
  display: none;
}

  </style>
</head>
<body>
    <div class="preloader">
    <div class="loader"></div>
  </div>
    <header>
        <div class="container-fluid">
              <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        
                           <img src="{{ static_asset('assets/assets_1/img/logo.jpg') }}" alt="no.1marry" id="nav-brand">
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        
                      <ul id="nav-lang">
                         <li>
                          <a href="#">
                            <span class="floatright" id="floatright">
                                   <span id="progress-text">You Have completed </span>
                              <div class="progressbar" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="" style="--value:100"></div>
                           </span>
                                 
                             </span>
    
                         </a>
                        </li>
                        
                      
                         
                      </ul>
                      
                 </div>
              </div>
        </div>
    </header>

<section class="mt-5">
      <div class="container-fluid">
             <div class="row justifycontent">
                   <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                         <!--  -->
                         <form action="{{ route('verify.otp') }}" name="otp_form" id="otp_form" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                               <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                                   <input type="text" placeholder="Enter Your OTP" name="otp_number" id="otp_number" autocomplete="off" spellcheck="false"
                                   autocorrect="off" class="form-control">
                               </div>
                            </div>
                            <input type="text" name="user_id" id="user_id"
                    value="{{$user->id}}" autocomplete="off" spellcheck="false"
                    autocorrect="off" hidden>
                    <input type="text" name="phone" id="phone"
                    value="{{$user->phone}}" autocomplete="off" spellcheck="false"
                    autocorrect="off" hidden>
                           
                           
                            <div class="row mt-4">
                                 <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                   <button type="submit" class="btn btn-primary" id="Register-btn">Submit</button>
                                     
                                   
                                 </div>
                            </div>
                                
                          </div>
                          <!--  -->
                          <div class="row mt-3 ">
                            <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                

                              <a class="btn btn-red" href="{{ route('resent.otp', $user->id) }}">Resend OTP</a>
                            </div>
                         </div>
                          <!--  -->
                        </form>
                        
                         <!--  -->

             </div>
             </div>
      </div>
</section>

<script>
 
    class Dial {
    constructor(container) {
      this.container = container;
      this.size = this.container.dataset.size;
      this.strokeWidth = this.size / 8;
      this.radius = this.size / 2 - this.strokeWidth / 2;
      this.value = this.container.dataset.value;
      this.direction = this.container.dataset.arrow;
      this.svg;
      this.defs;
      this.slice;
      this.overlay;
      this.text;
      this.arrow;
      this.create();
    }
  
    create() {
      this.createSvg();
      this.createDefs();
      this.createSlice();
      this.createOverlay();
      this.createText();
      this.createArrow();
      this.container.appendChild(this.svg);
    }
  
    createSvg() {
      let svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
      svg.setAttribute("width", `${this.size}px`);
      svg.setAttribute("height", `${this.size}px`);
      this.svg = svg;
    }
  
    createDefs() {
      var defs = document.createElementNS("http://www.w3.org/2000/svg", "defs"),
        linearGradient = document.createElementNS(
          "http://www.w3.org/2000/svg",
          "linearGradient"
        ),
        stop1 = document.createElementNS("http://www.w3.org/2000/svg", "stop"),
        stop2 = document.createElementNS("http://www.w3.org/2000/svg", "stop"),
        linearGradientBackground = document.createElementNS(
          "http://www.w3.org/2000/svg",
          "background"
        );
      linearGradient.setAttribute("id", "gradient");
      stop1.setAttribute("stop-color", "#ffa000");
      stop1.setAttribute("offset", "0%");
      linearGradient.appendChild(stop1);
      stop2.setAttribute("stop-color", "#f25767");
      stop2.setAttribute("offset", "100%");
      linearGradient.appendChild(stop2);
      linearGradientBackground.setAttribute("id", "gradient-background");
      var stop1 = document.createElementNS("http://www.w3.org/2000/svg", "stop");
      stop1.setAttribute("stop-color", "black");
      stop1.setAttribute("offset", "0%");
      linearGradientBackground.appendChild(stop1);
      var stop2 = document.createElementNS("http://www.w3.org/2000/svg", "stop");
      stop2.setAttribute("stop-color", "black");
      stop2.setAttribute("offset", "1000%");
      linearGradientBackground.appendChild(stop2);
      defs.appendChild(linearGradient);
      defs.appendChild(linearGradientBackground);
      this.svg.appendChild(defs);
      this.defs = defs;
    }
  
    createSlice() {
      let slice = document.createElementNS("http://www.w3.org/2000/svg", "path");
      slice.setAttribute("fill", "none");
      slice.setAttribute("stroke", "url(#gradient)");
      slice.setAttribute("stroke-width", this.strokeWidth);
      slice.setAttribute(
        "transform",
        `translate(${this.strokeWidth / 2},${this.strokeWidth / 2})`
      );
      slice.setAttribute("class", "animate-draw");
      this.svg.appendChild(slice);
      this.slice = slice;
    }
  
    createOverlay() {
      const r = this.size - this.size / 2 - this.strokeWidth / 2;
      const circle = document.createElementNS(
        "http://www.w3.org/2000/svg",
        "circle"
      );
      circle.setAttribute("cx", this.size / 2);
      circle.setAttribute("cy", this.size / 2);
      circle.setAttribute("r", r);
      circle.setAttribute("fill", "url(#gradient-background)");
      circle.setAttribute("class", "animate-draw");
      this.svg.appendChild(circle);
      this.overlay = circle;
    }
  
    createText() {
      const fontSize = this.size / 3.5;
      let text = document.createElementNS("http://www.w3.org/2000/svg", "text");
      text.setAttribute("x", this.size / 2 + fontSize / 6.5);
      text.setAttribute("y", this.size / 2 + fontSize / 2);
      text.setAttribute("font-family", "Montserrat");
      text.setAttribute("font-size", fontSize);
      text.setAttribute("fill", "red");
      text.setAttribute("text-anchor", "middle");
      const tspanSize = fontSize / 3;
      text.innerHTML = `${0}% `;
      this.svg.appendChild(text);
      this.text = text;
    }
  
    createArrow() {
      var arrowSize = this.size / 8;
      var mapDir = {
        up: [(arrowYOffset = arrowSize / 2), (m = -1)],
        down: [(arrowYOffset = 0), (m = 1)]
      };
      function getDirection(i) {
        return mapDir[i];
      }
      var [arrowYOffset, m] = getDirection(this.direction);
  
      let arrowPosX = this.size / 2 - arrowSize / 2,
        arrowPosY = this.size - this.size / 3 + arrowYOffset,
        arrowDOffset = m * (arrowSize / 1.5),
        arrow = document.createElementNS("http://www.w3.org/2000/svg", "path");
      arrow.setAttribute(
        "d",
        `M 0 0 ${arrowSize} 0 ${arrowSize / 2} ${arrowDOffset} 0 0 Z`
      );
      arrow.setAttribute("fill", "none");
      arrow.setAttribute("opacity", "0.6");
      arrow.setAttribute("transform", `translate(${arrowPosX},${arrowPosY})`);
      this.svg.appendChild(arrow);
      this.arrow = arrow;
    }
  
    animateStart() {
      let v = 0;
      const intervalOne = setInterval(() => {
        const p = +(v / this.value).toFixed(2);
        const a = p < 0.95 ? 2 - 2 * p : 0.05;
        v += a;
        if (v >= +this.value) {
          v = this.value;
          clearInterval(intervalOne);
        }
        this.setValue(v);
      }, 10);
    }
  
    polarToCartesian(centerX, centerY, radius, angleInDegrees) {
      const angleInRadians = ((angleInDegrees - 180) * Math.PI) / 180.0;
      return {
        x: centerX + radius * Math.cos(angleInRadians),
        y: centerY + radius * Math.sin(angleInRadians)
      };
    }
  
    describeArc(x, y, radius, startAngle, endAngle) {
      const start = this.polarToCartesian(x, y, radius, endAngle);
      const end = this.polarToCartesian(x, y, radius, startAngle);
      const largeArcFlag = endAngle - startAngle <= 180 ? "0" : "1";
      const d = [
        "M",
        start.x,
        start.y,
        "A",
        radius,
        radius,
        0,
        largeArcFlag,
        0,
        end.x,
        end.y
      ].join(" ");
      return d;
    }
  
    setValue(value) {
      let c = (value / 100) * 360;
      if (c === 360) c = 359.99;
      const xy = this.size / 2 - this.strokeWidth / 2;
      const d = this.describeArc(xy, xy, xy, 180, 180 + c);
      this.slice.setAttribute("d", d);
      const tspanSize = this.size / 3.5 / 3;
      this.text.innerHTML = `${Math.floor(value)}% `;
    }
  
    animateReset() {
      this.setValue(0);
    }
  }
  
  const containers = document.getElementsByClassName("chart");
  const dial = new Dial(containers[0]);
  dial.animateStart();
  
  </script>
 <script>
     document.addEventListener("DOMContentLoaded", function() {
  // Simulate a delay to demonstrate the preloader
  setTimeout(function() {
    // Hide the preloader
    document.querySelector('.preloader').style.display = 'none';
    // Show the content
    document.querySelector('.content').style.display = 'block';
  }, 2000); // Adjust the time according to your needs
});

 </script>

</body>
</html>


