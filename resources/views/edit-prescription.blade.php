<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Speech Recognition</title>
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,500&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css"
    />
    <link rel="stylesheet" href="{{asset("assets/css/main.min.css")}}" />
  </head>
  <body>
    <section class="voiceRecogWrapper">
      <div class="sectionWrapper">
        <div class="voiceRecog  bgcolor-white">
          <div class="row justify-content-center align-items-center no-gutters">
            <div class="col-12 col-lg-5 order-1">
              <div class="detailsBlockMainWrap">
                <div class="detailsBlockWrap d-none d-lg-block">
                  <div class="detailsBlock bgcolor-white ">
                    <div class="row">
                      <div class="col-3"></div>
                      <div class="col-9">
                        <h4>Steps</h4>
                        <p>
                            <li>Click the microphone icon and start dictating the prescription.</li>
                            <li>Generate the formatted prescription by clicking submit.</li>
                            <li>Send the formatted prescription to the patient by clicking confirm. </li>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="detailsBlock bgcolor-white ">
                    <div class="row">
                      <div class="col-3"></div>
                      <div class="col-9">
                        <h4>Use The Following Keywords while Dictating</h4>
                        <p>
                            <li>Name</li>
                            <li>Age</li>
                            <li>Gender</li>
                            <li>Symptoms</li>
                            <li>Diagnosis</li>
                            <li>Medication</li>
                            <li>Advice</li>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="detailsBlock bgcolor-white ">
                    <div class="row">
                      <div class="col-3"></div>
                      <div class="col-9">
                        <h4>Note</h4>
                        <p>
                           The fields can also be edited by keyboard.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="d-flex d-flex-wrap justify-content-center align-items-center iconWrap"
                >
                  <a
                    href="javascript:void(0);"
                    title="Click to record"
                    class="miciconWrap"
                    id="mic"
                  >
                    <div class="mic bgcolor-white">
                      <img src="{{url("assets/images/mic.png")}}" class="" alt="" />
                      <img src="{{url("assets/images/wave.png")}}" class="d-none" alt="" />
                      <!-- add class d-none in first image and remove it from second -->
                    </div>
                  </a>
                  <a
                    href="javascript:void(0);"
                    title="Click to edit"
                    class="editiconWrap"
                    id="edit"
                  >
                    <div class="edit bgcolor-white">
                      <img src="{{url("assets/images/edit.png")}}" class="" alt="" />
                      <img
                        src="{{url("assets/images/writing.png")}}"
                        class="d-none"
                        alt=""
                      />
                      <!-- add class d-none in first image and remove it from second -->
                    </div>
                  </a>
                    <a
                        href="javascript:void(0);"
                        title="Click to edit"
                        class="editiconWrap"
                        id="edit"
                    >
                        <div class="submit bgcolor-white">
                            <img src="{{url("assets/images/password.png")}}" class="" alt="" />
                            <img
                                src="{{url("assets/images/password.png")}}"
                                class="d-none"
                                alt=""
                            />
                            <!-- add class d-none in first image and remove it from second -->
                        </div>
                    </a>
                  <a
                    href="dashboard.blade.php"
                    title="Dashboard"
                    class="usericonWrap"
                  >
                    <div class="user bgcolor-white">
                      <img
                        src="{{url("assets/images/userdashboard.png")}}"
                        class=""
                        alt=""
                      />
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-7 order-0">
              <div class="voiceRecogBlock d-block position-relative d-hidehtag">
                <h4>Click icon to Enter text .....</h4>
                <!-- add class d-hidehtag in voiceRecogBlock div to hide h4 -->
                <div class="contentBlock">
                  <!-- add class editActive in contentBlock div to make borders in input visible -->
                  <form action="{{__("/prescription-create")}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div
                      class="patientDetails d-flex align-items-center justify-content-center"
                    >
                      <input
                        type="text"
                        class=""
                        name="patientName"
                        value="{{\App\Patient::find($prescription->patients_id)->name}}"
                      />
                      <input
                        type="text"
                        class=""
                        value="Age"
                        name="{{\App\Patient::find($prescription->patients_id)->age}}"
                      />
                      <input
                        type="text"
                        class=""
                        value="Gender"
                        name="{{\App\Patient::find($prescription->patients_id)->gender}}"
                      />
                    </div>
                    <div class="row justify-content-center mt-4">
                      <div class="col-lg-4 borderRight">
                        <div class="symptomsDetails">
                          <textarea
                            name="symptoms"
                            id=""
                            rows="10"
                            value=""
                            name="patientSymptoms"
                            onkeyup="textAreaAdjust(this)"
                          >
{{$prescription->symptoms}}</textarea
                          >
                        </div>
                        <div class="diagnosisDetails">
                          <textarea
                            name="diagnosis"
                            id=""
                            rows="10"
                            value=""
                            name="patientDiagnosis"
                            onkeyup="textAreaAdjust(this)"
                          >
Diagnosis</textarea
                          >
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="medicineDetails">
                          <textarea
                            name="medicine"
                            id=""
                            rows="10"
                            value=""
                            name="patientMedicine"
                            onkeyup="textAreaAdjust(this)"
                          >
Medicine</textarea
                          >
                        </div>
                        <div class="adviceDetails">
                          <textarea
                            name="advice"
                            id=""
                            rows="10"
                            value=""
                            name="patientAdvice"
                            onkeyup="textAreaAdjust(this)"
                          >
Advice</textarea
                          >
                        </div>
                      </div>
                    </div>
                      <button type="submit">submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
    <script>
      $.fn.textWidth = function(_text, _font) {
        //get width of text with font.  usage: $("div").textWidth();
        var fakeEl = $("<span>")
            .hide()
            .appendTo(document.body)
            .text(_text || this.val() || this.text())
            .css("font", _font || this.css("font")),
          width = fakeEl.width();
        fakeEl.remove();
        return width;
      };

      $.fn.autoresize = function(options) {
        //resizes elements based on content size.  usage: $('input').autoresize({padding:10,minWidth:0,maxWidth:100});
        options = $.extend(
          { padding: 10, minWidth: 0, maxWidth: 10000 },
          options || {}
        );
        $(this)
          .on("input", function() {
            $(this).css(
              "width",
              Math.min(
                options.maxWidth,
                Math.max(
                  options.minWidth,
                  $(this).textWidth() + options.padding
                )
              )
            );
          })
          .trigger("input");
        return this;
      };

      $("input").autoresize({ padding: 10, minWidth: 25, maxWidth: 300 });
    </script>
    <script>
      function textAreaAdjust(o) {
        o.style.height = "1px";
        o.style.height = 25 + o.scrollHeight + "px";
      }
    </script>
  </body>
</html>
