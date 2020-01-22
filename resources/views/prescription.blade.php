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
                                <div class="row justify-content-between align-items-top">
                                    <div class="col-2">
                                        <img src="{{url("assets/images/steps.png")}}" alt="" />
                                    </div>
                                    <div class="col-10">
                                        <h4>Steps</h4>
                                        <ul class="list-none">
                                            <li>
                                                Click the microphone icon and start speaking.
                                            </li>
                                            <li>
                                                Generate the prescription by clicking submit.
                                            </li>
                                            <li>
                                                Visit Dashboard to view and print prescription
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="detailsBlock bgcolor-white ">
                                <div class="row justify-content-between align-items-top">
                                    <div class="col-2">
                                        <img src="{{url("assets/images/microphone.png")}}" alt="" />
                                    </div>
                                    <div class="col-10">
                                        <h4>Use These Keywords while Dictating</h4>
                                        <p>
                                            Name, Age, Gender, Symptoms, Diagnosis, Medicine,
                                            Advice
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="detailsBlock bgcolor-white ">
                                <div class="row justify-content-between align-items-top">
                                    <div class="col-2">
                                        <img src="{{url("assets/images/note.png")}}" alt="" />
                                    </div>
                                    <div class="col-10">
                                        <h4>Important Note</h4>
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
                                <div class="mic bgcolor-white" id="voice-toggle">
                                    <img src="{{url("assets/images/mic.png")}}" class="" alt="" id="voice-toggle-notactive" />
                                    <img src="{{url("assets/images/wave.png")}}" class="d-none" alt="" id="voice-toggle-active" />
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
                                href="{{__("/doctor-dashboard")}}"
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
                            <p id="interimResult" class="text-danger"></p>
                            <form action="#">
                                <div
                                    class="patientDetails d-flex align-items-center justify-content-center"
                                >
                                    <input
                                        type="text"
                                        class=""
                                        id="name"
                                        name="patientName"
                                        value="Name"
                                    />
                                    <input
                                        type="text"
                                        class=""
                                        id="age"
                                        value="Age"
                                        name="patientAge"
                                    />
                                    <input
                                        type="text"
                                        class=""
                                        id="gender"
                                        value="Gender"
                                        name="patientGender"
                                    />
                                </div>
                                <div class="row justify-content-center mt-4">
                                    <div class="col-lg-12">
                                        <div class="symptomsDetails">
                                            <div class="row justify-content-center">
                                                <div class="col-4 col-md-3">
                                                    <label for="patientSymptoms">Symptoms : </label>
                                                </div>
                                                <div class="col-8 col-md-9">
                              <textarea
                                  name=""
                                  id="symptoms"
                                  rows="8"
                                  value=""
                                  name="patientSymptoms"
                                  onkeyup="textAreaAdjust(this)"
                              ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="diagnosisDetails">
                                            <div class="row justify-content-center">
                                                <div class="col-4 col-md-3">
                                                    <label for="patientDiagnosis">Diagnosis : </label>
                                                </div>
                                                <div class="col-8 col-md-9">
                              <textarea
                                  name=""
                                  id="diagnosis"
                                  rows="8"
                                  value=""
                                  name="patientDiagnosis"
                                  onkeyup="textAreaAdjust(this)"
                              >
                              </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="medicineDetails">
                                            <div class="row justify-content-center">
                                                <div class="col-4 col-md-3">
                                                    <label for="patientMedicine">Prescription : </label>
                                                </div>
                                                <div class="col-8 col-md-9">
                              <textarea
                                  name=""
                                  id="medicine"
                                  rows="8"
                                  value=""
                                  name="patientMedicine"
                                  onkeyup="textAreaAdjust(this)"
                              ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="adviceDetails">
                                            <div class="row justify-content-center">
                                                <div class="col-4 col-md-3">
                                                    <label for="patientAdvice">Advice : </label>
                                                </div>
                                                <div class="col-8 col-md-9">
                              <textarea
                                  name=""
                                  id="advice"
                                  rows="8"
                                  value=""
                                  name="patientAdvice"
                                  onkeyup="textAreaAdjust(this)"
                              ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="voiceBtn">
                                    <input
                                        type="submit"
                                        value="Submit"
                                        class="submitBtn text-uppercase"
                                    />
                                </div>
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
{{--    Speech Detection--}}
<script>

    window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    const recognition = new SpeechRecognition();
    recognition.interimResults = true;


    let finalTranscript = "";

    recognition.onresult=(event) => {
        const transcript = Array.from(event.results)
            .map(result => result[0]).map(result => result.transcript).join("");
        document.getElementById('interimResult').innerText = "Recognizing";
        if(event.results[0].isFinal){
            findKeyword(transcript);
        }


        finalTranscript = transcript;

        console.log(transcript);
    }




    recognition.onsoundstart = function(){
        document.getElementById('interimResult').innerText = "Listening";
        console.log("Listening");
    };


    $(document).ready(function(){
        var permit;
        $("#voice-toggle").click(function(){
            if(! $("#voice-toggle").hasClass("listening")){
                $("#voice-toggle-notactive").addClass('d-none');
                $("#voice-toggle-active").removeClass('d-none');

                $("#voice-toggle").addClass("listening");
                permit = true;
                recognition.start();
                if(permit) {
                    recognition.onend = () => {
                        console.log(permit);
                        recognition.start();
                    };
                }


            }else{
                $("#voice-toggle-notactive").removeClass('d-none');
                $("#voice-toggle-active").addClass('d-none');

                $("#voice-toggle").removeClass("listening");


                recognition.stop();
                permit = false;
            }

        })
    });

    function findKeyword(ts){
        const firstWord = ts.split(" ");
        keyWord = firstWord[0].toLowerCase();
        keyIndex = keyWord.length;
        console.log("key"+keyWord);
        if(keyWord == 'neem' || keyWord == 'name'){
            buildName(ts.substring(keyIndex));
        }
        if(keyWord == 'age' || keyWord == "h" || keyWord == "edge"){
            buildAge(ts.substring(keyIndex));
        }
        if(keyWord == 'diagnosis' || keyWord== 'digonosis   '){
            buildDiagnosis(ts.substring(keyIndex));
        }
        if(keyWord == 'gender'){
            buildGender(ts.substring(keyIndex));
        }
        if(keyWord == 'symptom' || keyWord == 'symptoms'){
            buildSymptoms(ts.substring(keyIndex));
        }
        if(keyWord == 'prescription' || keyWord == 'prescriptions'){
            buildPrescription(ts.substring(keyIndex));
        }
        if(keyWord == 'advice' || keyWord == 'advise' || keyWord == 'vice' || keyWord == 'adwise'){
            console.log(ts);
            // console.log("key"+keyWord);
            buildAdvice(ts.substring(keyIndex));
        }

    };

    function buildName(string){
        document.getElementById('name').value = string;
    }

    function buildAge(string){
        document.getElementById('age').value = string;
    }

    function buildGender(string){
        document.getElementById('gender').value = string;
    }

    function buildDiagnosis(string){
        document.getElementById('diagnosis').innerText = string;
    }

    function buildSymptoms(string){
        document.getElementById('symptoms').innerText = string;
    }

    function buildPrescription(string){
        document.getElementById('medicine').innerText = string;
    }

    function buildAdvice(string){
        document.getElementById('advice').innerText = string;
    }

</script>
</body>
</html>
