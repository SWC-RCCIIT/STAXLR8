window.SpeechRecognition = window.webkitSpeechRecognition || window.SpeechRecognition;

const recognition = new window.SpeechRecognition();

recognition.continuous = true;


recognition.onspeechend = function() {
    console.log('Speech has stopped being detected');
  };

recognition.onsoundstart = function(){
  console.log("Listening");
};

recognition.onspeechstart = function(){
  console.log("Speech Start");
};

recognition.onnomatch = function(){
  console.log("Not found")
};  


$(document).ready(function(){
    const button = $("#mic").click(function(){
      if( $("#mic").hasClass("mic-active") ){
          recognition.start();
        $("#recordStart").addClass("d-none");
        $("#recordStop").removeClass("d-none");

        $("#mic").removeClass("mic-active")
      }else{
          recognition.stop();
          $("#recordStart").removeClass("d-none");
          $("#recordStop").addClass("d-none");

          $("#mic").addClass("mic-active")
      }
      
    });


    let finalTranscript = "";
      recognition.onresult = (event) => {
        console.log(event);
          let interimTranscript = '';
          for (let i = event.resultIndex, len = event.results.length; i < len; i++) {
            let transcript = event.results[i][0].transcript;
            if (event.results[i].isFinal) {
              finalTranscript += transcript;
            } else {
              interimTranscript += transcript;
            }
            var string = `<div class="input-group mb-3">
            <textarea type="text" class="form-control" aria-describedby="button-addon2">${transcript}</textarea>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
            </div>
          </div>`;
          $(".contentBlock").append(string);
            
            console.log(transcript);   
            // process(transcript);  
      }
    };
});

function process(transcript){
  
  var string = `<div class="input-group mb-3">
  <input type="text" class="form-control" value=${transcript} placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
  </div>
</div>`;
  
  
  // '<input class="form-control d-block mb-2" value="'+transcript+'"></input>'
  $(".contentBlock").append(string);
}
