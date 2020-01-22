<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Doctor Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css"
    />
    <link rel="stylesheet" href="{{asset("assets/css/main.min.css")}}" />
  </head>
  <body>
    <section class="dashboardMainWrapper">
      <div class="sectionWrapper">
        <div class="dashboardWrapper bg-white">
          <div class="doctorDataWrap bgcolor-gradient">
            <div class="doctorPic">
              <div class="doctorIcon">
                <img src="{{url("assets/images/doctor.jpeg")}}" alt="" />
              </div>
            </div>
            <div class="doctorDetailsWrap">
              <div class="doctorDetailBlock bg-white">
                <div class="icon">
                  <img src="{{url("assets/images/doctor.png")}}" alt="" />
                </div>
                <div class="content">{{$doctor->name}}</div>
              </div>
              <div class="doctorDetailBlock bg-white">
                <div class="icon">
                  <img src="{{url("assets/images/call.png")}}" alt="" />
                </div>
                <div class="content">{{$doctor->phone_number}}</div>
              </div>
              <div class="doctorDetailBlock bg-white">
                <div class="icon">
                  <img src="{{url("assets/images/email_doctor.png")}}" alt="" />
                </div>
                <div class="content">{{$doctor->email}}</div>
              </div>
              <div class="doctorDetailBlock bg-white">
                <div class="icon">
                  <img src="{{url("assets/images/register.png")}}" alt="" />
                </div>
                <div class="content">#{{$doctor->registration}}</div>
              </div>
              <div class="doctorDetailBlock bg-white">
                <div class="icon">
                  <img src="{{url("assets/images/specilized.png")}}" alt="" />
                </div>
                <div class="content">{{$doctor->specialization}}</div>
              </div>
            </div>
          </div>
          <div class="prescriptionWrap">
            <h2>
              <span>Dashboard /</span>
              Prescriptions
            </h2>
            <div class="prescriptionBlock">
              <div class="row justify-content-between">
                  @forelse($prescriptions as $prescription)
                <div class="col-12 col-lg-4">
                  <div class="prescription">
                    <img src="{{url("assets/images/prescription.jpg")}}" alt="" />
                  </div>
                  <div class="patientName">
                    <p>{{\App\Patient::find($prescription->id)->name}}</p>
                  </div>
                </div>
                  @empty
                      <p>No Prescription</p>
                  @endforelse
                {{--Prescription Ended--}}
                <div class="col-12 col-lg-4">
                  <div class="prescription isEmpty">
                    <img src="{{url("assets/images/add.png")}}" alt="" />
                  </div>
                  <div class="patientName">
                      <a href="{{__("/prescription")}}"><p>Add New</p></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
  </body>
</html>
