<?php
include "../includes/Auth.php";
include "../includes/MainClass.php";
include "header.php";

include "../includes/config.php";
?>

<section class="home-section" style = "height:110vh;">
    <div class="home-content" style = "background-color: #494949">
        <i class='bx bx-menu'></i>
        <span class="text" style = "color:#fff">Barangay 35, Zone 3, District 1, Tondo, Manila</span>
    </div>

  <style>
  .document-list {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .document-list h2 {
    margin-bottom: 20px;
  }

  .document-list ul {
    width: 600px;
  }

  .document-list ul .list-group-item:nth-child(even) {
    background-color: #494949;
  }



  
 .formBlotter input {
  border: none;
  outline: none;
  border-bottom: 1px solid black;
  width: 15em;
  font-size: 1em;
}

 .formBlotter input, body #printFormDialog .formBlotter label, body #printFormDialog .formBlotter p {
  padding: var(--padding);
}

 .formBlotter input {
  font-weight: bold;
}

 .formBlotter label {
  font-size: .9em;
}

 .formBlotter .header {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  margin-bottom: 2em;
}

 .formBlotter .header .logo img {
  height: 150px;
  width: 200px;
}

 .formBlotter .header .title {
  width: calc(100% - 300px);
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.formBlotter .header .title div {
  text-align: center;
}

 .formBlotter .header .title div p:first-child {
  font-weight: bold;
}

 .formBlotter .header .title div p:last-child {
  text-transform: uppercase;
  font-weight: bold;
}

 .formBlotter .first {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: end;
      -ms-flex-pack: end;
          justify-content: flex-end;
}

 .formBlotter .second {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: start;
      -ms-flex-pack: start;
          justify-content: flex-start;
}

  .formBlotter .formData {
  margin: 2em 0;
}

  .formBlotter .formData .title {
  text-align: center;
  font-weight: bold;
}

  .formBlotter .formData .paragraphs {
  margin-top: 1em;
}

 .formBlotter .formData .paragraphs p {
  text-indent: 1in;
  margin: .5em 0;
}

</style>

<div class="document-list"   >
  <h2 class="text-center">Issue Documents</h2>
  <ul class="list-group list-group-flush">
    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #343434">
      <span class="document-name" style='color:#fff;'>Indigent Certificate</span>
      <button type="button" class="action-button btn btn-primary" onclick="openPrintDialog1('indigent_certificate')" data-toggle="modal" data-target="#print-dialog1">
        <i class="bi bi-printer-fill"></i> Print
      </button>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center" >
      <span class="document-name" style='color:#fff;'>Indigent Certificate (Non-Voter)</span>
      <button type="button" class="action-button btn btn-primary" onclick="openPrintDialog2('indigent_Non_Voter_certificate')" data-toggle="modal" data-target="#print-dialog2">
        <i class="bi bi-printer-fill"></i> Print
      </button>
    </li>
    <!--Baranggay-->

    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #343434">
      <span class="document-name" style='color:#fff;'>Barangay Certificate</span>
      <button type="button" class="action-button btn btn-primary" onclick="openPrintDialog3('barangay_certificate')" data-toggle="modal" data-target="#print-dialog3">
        <i class="bi bi-printer-fill"></i> Print
      </button>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span class="document-name" style='color:#fff;'>Barangay Certificate (Solo Parent)</span>
      <button type="button" class="action-button btn btn-primary" onclick="openPrintDialog4('barangay_certificate_solo')" data-toggle="modal" data-target="#print-dialog4">
        <i class="bi bi-printer-fill"></i> Print
      </button>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #343434">
      <span class="document-name" style='color:#fff;'>Barangay Certificate (Senior Citezen)</span>
      <button type="button" class="action-button btn btn-primary" onclick="openPrintDialog5('barangay_certificate_senior')" data-toggle="modal" data-target="#print-dialog5">
        <i class="bi bi-printer-fill"></i> Print
      </button>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span class="document-name" style='color:#fff;'>Barangay Certificate (Residency)</span>
      <button type="button" class="action-button btn btn-primary" onclick="openPrintDialog6('barangay_certificate_residency')" data-toggle="modal" data-target="#print-dialog6">
        <i class="bi bi-printer-fill"></i> Print
      </button>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #343434">
      <span class="document-name" style='color:#fff;'>Barangay Certificate (Non-Voter)</span>
      <button type="button" class="action-button btn btn-primary" onclick="openPrintDialog7('barangay_certificate_non')" data-toggle="modal" data-target="#print-dialog7">
        <i class="bi bi-printer-fill"></i> Print
      </button>
    </li>
   
  

  </ul>
</div>


<style>
label,p,button{color:#494949;} 
</style>



<!---->
<div class="modal fade" id="print-dialog1" tabindex="-1" role="dialog" aria-labelledby="printDialogTitle1" style="color:#494949"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 1000px">
      <div class="modal-header">
        <h5 class="modal-title" id="printDialogTitle"></h5>
        <button type="button" class="close" style="color:#494949"  data-dismiss="modal" aria-label="Close" onclick="closePrintDialog()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  >
        <div class="indigency-form">
          <form id="indigency-form" onsubmit="printFormBlotter(event)">
            <div class="formBlotter">

            ( Ctrl # <input type="text" id="ctrl" name="ctrl" style="width:5em;"> )
             


              <div class="header">
                <div class="logo">
                  <img src="img/top.png" style="width: 500px;height:300px">
                </div>
            
              </div>
        <br>
              <div class="second" >
                <div>
                    <label for="complainant"> To Whom It May Concern:</label><br>
                  <label for="for">This is to certify that </label>
                 <br>
                  <label for="for">Mr./Ms.</label>
                  <input type="text" id="name" name="name">
                
                 </div>
              </div>
              <div class="formData">
               
                <div class="paragraphs">
                  <p>is an Indigent Family of the barangay with postal address at <input type="text" id="address" name="address" style="width:10em;"> .
	 He/she is known to me of good moral character.                   
	This certification is being issued upon the request of the above mention person for  <input type="text" name="mention"  style="width:10em;"> 
		          
Issued this  day of <input type="text" id="Day" name="Day"  style="width:7em;"> , 2023.
</p>
                   </div>
              </div>
              <div class="punongBaranggay">
                <div>
              
                  <img src="img/p2.png" style="width: 500px;">
           </div>
              </div>
            </div>
          </form>
          </div>        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closePrintDialog()">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="printForm1(event)">Print Form</button>
        </div>
      </div>
    </div>
  </div>

<!---->



<!---->

<div class="modal fade" id="print-dialog2" tabindex="-1" role="dialog" aria-labelledby="printDialogTitle2" style="color:#494949"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 1000px">
      <div class="modal-header">
        <h5 class="modal-title" id="printDialogTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" style="color:#494949"  aria-label="Close" onclick="closePrintDialog()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="clearance-form">
          <form id="clearance-form" onsubmit="printFormBlotter(event)">
            <div style="color:#494949"  class="formBlotter">

            ( Ctrl # <input type="text" id="ctrl" name="ctrl" style="width:5em;"> )
             


              <div class="header">
                <div class="logo">
                  <img src="img/top.png" style="width: 500px;height:300px">
                </div>
            
              </div>
        <br>
              <div class="second">
                <div>
            <br>
                  <label for="complainant"> To Whom It May Concern:</label><br>
                  <label for="for">This is to certify that </label>
                 <br>
                  <label for="for">Mr./Ms.</label>
                  <input type="text" id="name" name="name">
                
                 </div>
              </div>
              <div class="formData">
               
                <div class="paragraphs">
                  <p>with resident and postal address   <input type="text" id="address" name="address" style="width:10em;"> St.
                  Tondo, Manila.
	He/she has no adverse record whether criminal or jurisdictional case. 
	This is issued upon the request of the afore mention for 
 <input type="text" id="purpose" name="purpose" style="width:10em;">
   
 Given this  <input type="text" id="month" name="month" style="width:7em;"> Day of <input type="text" id="day" name="day" style="width:7em;"> , 2023.
</p>
                   </div>
              </div>
              <div class="punongBaranggay">
                <div>
              
                  <img src="img/p2.png" style="width: 500px;">
           </div>
              </div>
            </div>
          </form>
          </div>        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closePrintDialog()">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="printForm2(event)">Print Form</button>
        </div>
      </div>
    </div>
  </div>

<!---->




<!--Barangay-->



<!---->
<div class="modal fade" id="print-dialog3" tabindex="-1" role="dialog" style="color:#494949"  aria-labelledby="printDialogTitle3" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 1000px">
      <div class="modal-header">
        <h5 class="modal-title" id="printDialogTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" style="color:#494949"  aria-label="Close" onclick="closePrintDialog()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="barangay-form1">
          <form id="barangay-form1" onsubmit="printFormBlotter(event)">
            <div class="formBlotter">


            ( Ctrl # <input type="text" id="ctrl" name="ctrl" style="width:5em;"> )
             


              <div class="header">
                <div class="logo">
                  <img src="img/pic2.png" style="width: 500px;height:300px">
                </div>
            
              </div>
        <br>
              <div class="second">
                <div>
                    <label for="complainant"> To Whom It May Concern:</label><br>
                  <label for="for">This is to certify that </label>
                 <br>
                  <label for="for">Mr./Ms.</label>
                  <input type="text" id="name" name="name">
                
                 </div>
              </div>
              <div class="formData">
               
                <div class="paragraphs">
                  <p>is an Indigent Family of the barangay with postal address at <input type="text" id="address" name="address" style="width:10em;"> .
	 He/she is known to me of good moral character.                   
	This certification is being issued upon the request of the above mention person for <input type="text" id="purpose" name="purpose" style="width:10em;"> 
		          
Issued this  day of <input type="text" id="day" name = "day" style="width:7em;"> , 2023.
</p>
                   </div>
              </div>
              <div class="punongBaranggay">
                <div>
              
                  <img src="img/p2.png" style="width: 500px;">
           </div>
              </div>
            </div>
          </form>
          </div>        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closePrintDialog()">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="printForm3(event)">Print Form</button>
        </div>
      </div>
    </div>
  </div>

<!---->



<!---->

<div class="modal fade" id="print-dialog4" tabindex="-1" role="dialog" style="color:#494949"  aria-labelledby="printDialogTitle4" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 1000px">
      <div class="modal-header">
        <h5 class="modal-title" id="printDialogTitle"></h5>
        <button type="button" class="close"  style="color:#494949"  data-dismiss="modal" aria-label="Close" onclick="closePrintDialog()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="barangay-form2">
          <form id="barangay-form2" onsubmit="printFormBlotter(event)">
            <div class="formBlotter">


            ( Ctrl # <input type="text" id="ctrl" name="ctrl" style="width:5em;"> )
             


              <div class="header">

                <div class="logo">
                  <img src="img/pic2.png" style="width: 500px;height:300px">
                </div>
            
              </div>
        <br>  

              <div class="second">
                 <div>
            <br>
                  <label for="complainant"> To Whom It May Concern:</label><br>
                  <label for="for">This is to certify that </label>
                 <br>
                  <label for="for">Mr./Ms.</label>
                  <input type="text" id="name" name="name">
                
                 </div>
              </div>
              <div class="formData">
               
                <div class="paragraphs">
                  <p>with resident and postal address at  <input type="text" id="address" name="address" style="width:10em;"> 
                  Tondo, Manila, with Precinct No. 55-B and known to be Solo Parent since   <input type="text" id="since" name="since" style="width:7em;">
                  up to present.
	He/She is known to be of good moral character.
	This certification is being issued upon the request of the above mention person for 
   <input type="text" id="purpose" name="purpose" style="width:10em;"> 
Done this <input type="text" id="month" name="month" style="width:7em;"> day of <input type="text" id="day" name="day" style="width:7em;"> , 2023.
</p>
                   </div>
              </div>
              <div class="punongBaranggay">
                <div>
              
                  <img src="img/p2.png" style="width: 500px;">
           </div>
              </div>
            </div>
          </form>
          </div>        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closePrintDialog()">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="printForm4(event)">Print Form</button>
        </div>
      </div>
    </div>
  </div>

<!---->





<!---->

<div class="modal fade" id="print-dialog5" tabindex="-1" role="dialog" style="color:#494949"  aria-labelledby="printDialogTitle5" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 1000px">
      <div class="modal-header">
        <h5 class="modal-title" id="printDialogTitle"></h5>
        <button type="button" class="close" data-dismiss="modal"  style="color:#494949"  aria-label="Close" onclick="closePrintDialog()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="barangay-form3">
          <form id="barangay-form3" onsubmit="printFormBlotter(event)">
            <div class="formBlotter">

            ( Ctrl # <input type="text" id="ctrl" name="ctrl" style="width:5em;"> )
             


              <div class="header">
                <div class="logo">
                  <img src="img/pic2.png" style="width: 500px;height:300px">
                </div>
            
              </div>
        <br>
              <div class="second">
                <div>
            <br>
                  <label for="complainant"> To Whom It May Concern:</label><br>
                  <label for="for">This is to certify that </label>
                 <br>
                  <label for="for">Mr./Ms.</label>
                  <input type="text" id="name" name="name">
                
                 </div>
              </div>
              <div class="formData">
               
                <div class="paragraphs">
                  <p>with resident and postal address at  <input type="text" id="address" name="address" style="width:10em;"> 
                  Tondo, Manila, is a registered voter and included in our Senior Citizens Masterlist  (#  <input type="text" id="mention" name="mention" style="width:7em;"> )
                  He/She is known to be of good moral character.
	This certification is being issued upon the request of the above mention person for <input type="text" name="purpose" style="width:10em;"> 
Done this <input type="text" id="month" name="month" style="width:7em;"> day of <input type="text" id="day" name="day" style="width:7em;"> , 2023.
</p>
                   </div>
              </div>
              <div class="punongBaranggay">
                <div>
              
                  <img src="img/p2.png" style="width: 500px;">
           </div>
              </div>
            </div>
          </form>
          </div>        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closePrintDialog()">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="printForm5(event)">Print Form</button>
        </div>
      </div>
    </div>
  </div>

<!---->





<!---->

<div class="modal fade" id="print-dialog6" tabindex="-1" role="dialog" style="color:#494949"  aria-labelledby="printDialogTitle6" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 1000px">
      <div class="modal-header">
        <h5 class="modal-title" id="printDialogTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" style="color:#494949"  aria-label="Close" onclick="closePrintDialog()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="barangay-form4">
          <form id="barangay-form4" onsubmit="printFormBlotter(event)">
            <div class="formBlotter">

            ( Ctrl # <input type="text" id="ctrl" name="ctrl" style="width:5em;"> )
             


              <div class="header">
                <div class="logo">
                  <img src="img/pic2.png" style="width: 500px;height:300px">
                </div>
            
              </div>
        <br>
              <div class="second">
                <div>
            <br>
                  <label for="complainant"> To Whom It May Concern:</label><br>
                  <label for="for">This is to certify that </label>
                 <br>
                  <label for="for">Mr./Ms.</label>
                  <input type="text" id="name" name="name">
                
                 </div>
              </div>
              <div class="formData">
               
                <div class="paragraphs">
                  <p>with resident and postal address at  <input type="text" id="address" name="address" style="width:10em;"> 
                  Tondo, Manila, is presently residing in our barangay. 
         He/she has no adverse whether criminal and administrative.
          This certification is being issued upon the request of the above mention person for 
 <input type="text" name="mention" style="width:10em;"> 
Done this <input type="text" id="month" name="month" style="width:7em;"> day of <input type="text" id="day" name="day" style="width:7em;"> , 2023.
</p>
                   </div>
              </div>
              <div class="punongBaranggay">
                <div>
              
                  <img src="img/p2.png" style="width: 500px;">
           </div>
              </div>
            </div>
          </form>
          </div>        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closePrintDialog()">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="printForm6(event)">Print Form</button>
        </div>
      </div>
    </div>
  </div>

<!---->






<!---->

<div class="modal fade" id="print-dialog7" tabindex="-1" role="dialog" style="color:#494949" aria-labelledby="printDialogTitle7" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 1000px">
      <div class="modal-header">
        <h5 class="modal-title" id="printDialogTitle"></h5>
        <button type="button" class="close" data-dismiss="modal"  style="color:#494949"  aria-label="Close" onclick="closePrintDialog()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="barangay-form5">
          <form id="barangay-form5" onsubmit="printFormBlotter(event)">
            <div class="formBlotter">


            ( Ctrl # <input type="text" id="ctrl" name="ctrl" style="width:5em;"> )
             


              <div class="header">
                <div class="logo">
                  <img src="img/pic2.png" style="width: 500px;height:300px">
                </div>
            
              </div>
        <br>
              <div class="second">
                <div>
            <br>
                  <label for="complainant"> To Whom It May Concern:</label><br>
                  <label for="for">This is to certify that </label>
                 <br>
              
                  <input type="text" id="name" name="name">
                
                 </div>
              </div>
              <div class="formData">
               
                <div class="paragraphs">
                  <p>who is presently residing at   <input type="text" id="address" name="address" style="width:10em;"> 
                  ,Tondo, Manila, but a non-registered voter of our barangay.
	This certification is being issued upon the request of the above mention person for 
 <input type="text" name="mention" style="width:10em;"> 
Done this <input type="text" id="month" name="month" style="width:7em;"> day of <input type="text" id="day" name="day" style="width:7em;"> , 2023.
</p>
                   </div>
              </div>
              <div class="punongBaranggay">
                <div>
              
                  <img src="img/p2.png" style="width: 500px;">
           </div>
              </div>
            </div>
          </form>
          </div>        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closePrintDialog()">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="printForm7(event)">Print Form</button>
        </div>
      </div>
    </div>
  </div>

<!---->








  <script>
    function openPrintDialog1(documentType) {
      var printDialog = document.getElementById('print-dialog');
      var printFrame = document.getElementById('print-frame');
      var formTitle = document.getElementById('printDialogTitle1');

 
      printFrame.src = 'path/to/view.php?document_type=' + encodeURIComponent(documentType);


      formTitle.textContent = documentTypeToTitle(documentType);

      printDialog.style.display = 'block';
    }

    function openPrintDialog2(documentType) {
      var printDialog = document.getElementById('print-dialog');
      var printFrame = document.getElementById('print-frame');
      var formTitle = document.getElementById('printDialogTitle2');

 
      printFrame.src = 'path/to/view.php?document_type=' + encodeURIComponent(documentType);


      formTitle.textContent = documentTypeToTitle(documentType);

      printDialog.style.display = 'block';
    }


    //Baranggay Certi


    function openPrintDialog3(documentType) {
      var printDialog = document.getElementById('print-dialog');
      var printFrame = document.getElementById('print-frame');
      var formTitle = document.getElementById('printDialogTitle3');

 
      printFrame.src = 'path/to/view.php?document_type=' + encodeURIComponent(documentType);


      formTitle.textContent = documentTypeToTitle(documentType);

      printDialog.style.display = 'block';
    }




    function openPrintDialog4(documentType) {
      var printDialog = document.getElementById('print-dialog');
      var printFrame = document.getElementById('print-frame');
      var formTitle = document.getElementById('printDialogTitle4');

 
      printFrame.src = 'path/to/view.php?document_type=' + encodeURIComponent(documentType);


      formTitle.textContent = documentTypeToTitle(documentType);

      printDialog.style.display = 'block';
    }



    
    function openPrintDialog5(documentType) {
      var printDialog = document.getElementById('print-dialog');
      var printFrame = document.getElementById('print-frame');
      var formTitle = document.getElementById('printDialogTitle5');

 
      printFrame.src = 'path/to/view.php?document_type=' + encodeURIComponent(documentType);


      formTitle.textContent = documentTypeToTitle(documentType);

      printDialog.style.display = 'block';
    }

    
    function openPrintDialog6(documentType) {
      var printDialog = document.getElementById('print-dialog');
      var printFrame = document.getElementById('print-frame');
      var formTitle = document.getElementById('printDialogTitle6');

 
      printFrame.src = 'path/to/view.php?document_type=' + encodeURIComponent(documentType);


      formTitle.textContent = documentTypeToTitle(documentType);

      printDialog.style.display = 'block';
    }

    
    function openPrintDialog7(documentType) {
      var printDialog = document.getElementById('print-dialog');
      var printFrame = document.getElementById('print-frame');
      var formTitle = document.getElementById('printDialogTitle7');

 
      printFrame.src = 'path/to/view.php?document_type=' + encodeURIComponent(documentType);


      formTitle.textContent = documentTypeToTitle(documentType);

      printDialog.style.display = 'block';
    }

    





    //End

    function closePrintDialog() {
      var printDialog = document.getElementById('print-dialog');
      printDialog.style.display = 'none';
    }

    function printForm1(event) {
  event.preventDefault();

  var clearanceForm = document.getElementById('indigency-form');
  var formData = new FormData(clearanceForm);
  var name = formData.get('name');
   var address = formData.get('address');
   
  var crtl = formData.get('ctrl');
  var mention = formData.get('mention');
 var day = formData.get('Day');
  var documentType = clearanceForm.getAttribute('document-type');


  if (name === '' || address === '' || day === '') {
    alert('Please fill in all the required fields.');
    return;
  }

  var clearanceDocument = generateClearanceDocument1(crtl,name, address,mention, day, documentType);

  var printWindow = window.open('', '_blank');
  printWindow.document.open();
  printWindow.document.write(clearanceDocument);
  printWindow.document.close();

  printWindow.onafterprint = function() {
    printWindow.close();
    closePrintDialog();
  };

  printWindow.print();
}


function printForm2(event) {
  event.preventDefault();

  var clearanceForm = document.getElementById('clearance-form');
  var formData = new FormData(clearanceForm);
  var name = formData.get('name');
  var address = formData.get('address');
  
  var crtl = formData.get('ctrl');
  var mention = formData.get('purpose');
  var month = formData.get('month');
  var day = formData.get('day');
  var documentType = clearanceForm.getAttribute('document-type');


  if (name === '' || address === '' || day === ''
|| mention === '' || month === '') {
    alert('Please fill in all the required fields.');
    return;
  }
  var clearanceDocument = generateClearanceDocument2(crtl,name, address, mention,month,day ,documentType);

  var printWindow = window.open('', '_blank');
  printWindow.document.open();
  printWindow.document.write(clearanceDocument);
  printWindow.document.close();

  printWindow.onafterprint = function() {
    printWindow.close();
    closePrintDialog();
  };

  printWindow.print();
}






function printForm3(event) {
  event.preventDefault();

  var clearanceForm = document.getElementById('barangay-form1');
  var formData = new FormData(clearanceForm);
  var name = formData.get('name');
  var address = formData.get('address');
  
  var crtl = formData.get('ctrl');
  var mention = formData.get('purpose');
  var day = formData.get('day');
  var documentType = clearanceForm.getAttribute('document-type');

  if (name === '' || address === '' || day  === '' || month === '') {
    alert('Please fill in all the required fields.');
    return;
  }
  var clearanceDocument = generateClearanceDocument3(crtl,name, address, mention,day,documentType );

  var printWindow = window.open('', '_blank');
  printWindow.document.open();
  printWindow.document.write(clearanceDocument);
  printWindow.document.close();

  printWindow.onafterprint = function() {
    printWindow.close();
    closePrintDialog();
  };

  printWindow.print();
}






function printForm4(event) {
  event.preventDefault();

  var clearanceForm = document.getElementById('barangay-form2');
  var formData = new FormData(clearanceForm);
  var name = formData.get('name');
  var address = formData.get('address');
  var since = formData.get('since');
  
  var crtl = formData.get('ctrl');
  var purpose = formData.get('purpose');
  var month = formData.get('month');
  var day = formData.get('day');
  var documentType = clearanceForm.getAttribute('document-type');


  if (name === '' || address === '' || day === ''
|| since === '' || purpose === '' || month === '') {
    alert('Please fill in all the required fields.');
    return;
  }
  var clearanceDocument = generateClearanceDocument4(crtl,name, address, since,purpose,month,day ,documentType);

  var printWindow = window.open('', '_blank');
  printWindow.document.open();
  printWindow.document.write(clearanceDocument);
  printWindow.document.close();

  printWindow.onafterprint = function() {
    printWindow.close();
    closePrintDialog();
  };

  printWindow.print();
}




function printForm5(event) {
  event.preventDefault();

  var clearanceForm = document.getElementById('barangay-form3');
  var formData = new FormData(clearanceForm);
  var name = formData.get('name');
  var address = formData.get('address');
  var mention = formData.get('mention');
  var month = formData.get('month');
  
  var crtl = formData.get('ctrl');
  var purpose = formData.get('purpose');
  var day = formData.get('day');
  var documentType = clearanceForm.getAttribute('document-type');


  if (name === '' || address === '' || day === ''
|| mention === '' || purpose === '' || month === '') {
    alert('Please fill in all the required fields.');
    return;
  }
  var clearanceDocument = generateClearanceDocument5(crtl,name, address, mention,month,day,purpose ,documentType);

  var printWindow = window.open('', '_blank');
  printWindow.document.open();
  printWindow.document.write(clearanceDocument);
  printWindow.document.close();

  printWindow.onafterprint = function() {
    printWindow.close();
    closePrintDialog();
  };

  printWindow.print();
}





function printForm6(event) {
  event.preventDefault();

  var clearanceForm = document.getElementById('barangay-form4');
  var formData = new FormData(clearanceForm);
  var name = formData.get('name');
  var address = formData.get('address');
  
  var crtl = formData.get('ctrl');
  var mention = formData.get('mention');
  var month = formData.get('month');
  var day = formData.get('day');
  var documentType = clearanceForm.getAttribute('document-type');

  if (name === '' || address === '' || day === ''
|| mention === '' || purpose === '' || month === '') {
    alert('Please fill in all the required fields.');
    return;
  }

  var clearanceDocument = generateClearanceDocument6(crtl,name, address, mention,month,day ,documentType);

  var printWindow = window.open('', '_blank');
  printWindow.document.open();
  printWindow.document.write(clearanceDocument);
  printWindow.document.close();

  printWindow.onafterprint = function() {
    printWindow.close();
    closePrintDialog();
  };

  printWindow.print();
}




function printForm7(event) {
  event.preventDefault();

  var clearanceForm = document.getElementById('barangay-form5');
  var formData = new FormData(clearanceForm);
  var name = formData.get('name');
  var address = formData.get('address');
  var mention = formData.get('mention');
  
  var crtl = formData.get('ctrl');
  var month = formData.get('month');
  var day = formData.get('day');
  var documentType = clearanceForm.getAttribute('document-type');


  if (name === '' || address === '' || day === ''
|| mention === '' || purpose === '' || month === '') {
    alert('Please fill in all the required fields.');
    return;
  }
  
  var clearanceDocument = generateClearanceDocument7(crtl,name, address, mention,month,day ,documentType);

  var printWindow = window.open('', '_blank');
  printWindow.document.open();
  printWindow.document.write(clearanceDocument);
  printWindow.document.close();

  printWindow.onafterprint = function() {
    printWindow.close();
    closePrintDialog();
  };

  printWindow.print();
}




    function documentTypeToTitle(documentType) {
      switch (documentType) {
        case 'indigent_certificate':
          return 'Indigent Clearance';
        case 'indigent_Non_Voter_certificate':
          return 'Indigent Clearance (Non-Voter)';
        case 'barangay_certificate':
          return 'Barangay Certificate';
        case 'barangay_certificate_solo':
          return 'Barangay Certificate (Solo Parent)';
        case 'Barangay_certificate_senior':
          return 'Barangay Certificate (Senior)';
          case 'barangay_certificate_residency':
          return 'Barangay Certificate (Residency)';
          case 'barangay_certificate_non':
          return 'Barangay Certificate (Non Voter)';

          
        default:
          return '';
      }
    }

function  generateClearanceDocument1(crtl,name, address,mention, day, documentType) {
  var clearanceDocument = `
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="printDialogTitle">${documentTypeToTitle(documentType)}</h5>
            </div>
        <div class="modal-body">
          <div class="formBlotter">

          ( Ctrl #    <u style=" width: 50px;
      text-align: center;"> ${crtl} </u>  )       


            <div class="header">
            <div class="logo" style="display: flex; justify-content: center; align-items: center;">
  <img src="img/top.png" style="margin-bottom: 120px;width: 500px; height: 300px;">
</div>

            </div>
            <br>
            <div class="second"  >
              <div>
                   <label for="complainant">To Whom It May Concern:</label><br>
                <label for="for">This is to certify that </label><br>
                <label for="for">Mr./Ms.</label>
                <u style=" width: 150px;
      text-align: center;"> ${name} </u>
              </div>
            </div>
            <div class="formData" style=" margin-top: 20px;
      text-align: center;">
              <div class="paragraphs">
                <p>is an Indigent Family of the barangay with postal address at       <u style=" width: 150px;
      text-align: center;"> ${address} </u> .
                  He/she is known to me of good moral character.
                  This certification is being issued upon the request of the above-mentioned person for   <u style=" width: 150px;
      text-align: center;"> ${mention} </u> </p>
                <p>Issued this day of   <u style=" width: 150px;
      text-align: center;"> ${day} </u>, 2023.</p>
              </div>
            </div>
            <br><br><br>
            <div class="punongBaranggay" style="margin-top: 50px;display: flex; justify-content: center; align-items: center;">
              <div >
                <img src="img/p2.png" style="margin-top: 30px;width: 500px;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  `;
  
  return clearanceDocument;
}


function generateClearanceDocument2(crtl,name, address, mention,month,day ,documentType) {
  var clearanceDocument = `
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="printDialogTitle">${documentTypeToTitle(documentType)}</h5>
            </div>
        <div class="modal-body">
          <div class="formBlotter">

          ( Ctrl #    <u style=" width: 50px;
      text-align: center;"> ${crtl} </u>  )        


            <div class="header">
            <div class="logo" style="display: flex; justify-content: center; align-items: center;">
  <img src="img/top.png" style="margin-bottom: 120px;width: 500px; height: 300px;">
</div>

            </div>
            <br>
            <div class="second"  >
              <div>
              <label for="complainant"> To Whom It May Concern:</label><br>
                  <label for="for">This is to certify that </label>
                 <br>
                  <label for="for">Mr./Ms.</label>
                 <u style=" width: 150px;
      text-align: center;"> ${name} </u>
                 </div>
              </div>
              <div class="formData">
               
                <div class="paragraphs">
                  <p>is an Indigent Family who is presently residing in our barangay but a non-registered voter with postal address at  <u style=" width: 150px;
      text-align: center;"> ${address} </u> .
                  Tondo, Manila.
	He/she has no adverse record whether criminal or jurisdictional case. 
	This is issued upon the request of the afore mention for     <u style=" width: 150px;
      text-align: center;"> ${mention} </u>
   
Issued this  day :   <u style=" width: 150px;
      text-align: center;"> ${month} </u> Day <u style=" width: 150px;
      text-align: center;"> ${day} </u> , 2023.
</p>
                   </div>
              </div>
            <br><br><br>
            <div class="punongBaranggay" style="margin-top: 50px;display: flex; justify-content: center; align-items: center;">
              <div >
                <img src="img/p2.png" style="margin-top: 30px;width: 500px;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  `;
  
  return clearanceDocument;
}



///Barangay




function generateClearanceDocument3(crtl,name, address, mention,day,documentType) {
  var clearanceDocument = `
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="printDialogTitle">Barangay Certificate</h5>
            </div>


   <div class="modal-body">
        <div class="indigency-form">
          <form id="indigency-form" onsubmit="printFormBlotter(event)">
            <div class="formBlotter">

            ( Ctrl #    <u style=" width: 50px;
      text-align: center;"> ${crtl} </u>  )     

            <div class="header">
            <div class="logo" style="display: flex; justify-content: center; align-items: center;">
  <img src="img/pic2.png" style="margin-bottom: 120px;width: 500px; height: 300px;">
</div>
        <br>
              <div class="second">
                <div>
                    <label for="complainant"> To Whom It May Concern:</label><br>
                  <label for="for">This is to certify that </label>
                 <br>
                  <label for="for">Mr./Ms.</label>
                  <u style=" width: 150px;
      text-align: center;"> ${name} </u>
                
                 </div>
              </div>
              <div class="formData">
               
                <div class="paragraphs">
                  <p>is an Indigent Family of the barangay with postal address at  <u style=" width: 150px;
      text-align: center;"> ${address} </u> .
	 He/she is known to me of good moral character.                   
	This certification is being issued upon the request of the above mention person for   <u style=" width: 150px;
      text-align: center;"> ${mention} </u>
		          
Issued this  day of   <u style=" width: 150px;
      text-align: center;"> ${day} </u> , 2023.
</p>
                   </div>
              </div>
              <div class="punongBaranggay" style="margin-top: 50px;display: flex; justify-content: center; align-items: center;">
              <div >
                <img src="img/p2.png" style="margin-top: 30px;width: 500px;">
              </div>
            </div>
            </div>
          </form>
          </div>        </div>

 
      </div>
    </div>
  </div>

  `;
  
  return clearanceDocument;
}




function generateClearanceDocument4(crtl,name, address, since,purpose,month,day ,documentType){
  var clearanceDocument = `
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="printDialogTitle">${documentTypeToTitle(documentType)}</h5>
            </div>
            <div class="modal-body">
        <div class="clearance-form">
          <form id="clearance-form" onsubmit="printFormBlotter(event)">
            <div class="formBlotter">

            ( Ctrl #    <u style=" width: 50px;
      text-align: center;"> ${crtl} </u>  )
        
            <div class="header">

            <div class="logo" style="display: flex; justify-content: center; align-items: center;">
  <img src="img/pic2.png" style="margin-bottom: 120px;width: 500px; height: 300px;">
</div>
        <br>
              <div class="second">
                <div>
            <br>
       
                  <label for="complainant"> To Whom It May Concern:</label><br>
                  <label for="for">This is to certify that </label>
                 <br>
                  <label for="for">Mr./Ms.</label>
                  <u style=" width: 150px;
      text-align: center;"> ${name} </u>
                
                 </div>
              </div>
              <div class="formData">
               
                <div class="paragraphs">
                  <p>with resident and postal address at   <u style=" width: 150px;
      text-align: center;"> ${address} </u>
                  Tondo, Manila, with Precinct No. 55-B and known to be Solo Parent since  <u style=" width: 150px;
      text-align: center;"> ${since} </u>
                  up to present.
	He/She is known to be of good moral character.
	This certification is being issued upon the request of the above mention person for <u style=" width: 150px;
      text-align: center;"> ${purpose} </u>
Done this  <u style=" width: 150px;
      text-align: center;"> ${month} </u> day of  <u style=" width: 150px;
      text-align: center;"> ${day} </u> , 2023.
</p>
                   </div>
              </div>
              <div class="punongBaranggay" style="margin-top: 50px;display: flex; justify-content: center; align-items: center;">
              <div >
                <img src="img/p2.png" style="margin-top: 30px;width: 500px;">
              </div>
            </div>
            </div>
          </form>
          </div>        </div>


      
      </div>
    </div>
  </div>
  `;
  
  return clearanceDocument;
}





function generateClearanceDocument5(crtl,name, address, mention,month,day,purpose ,documentType) {
  var clearanceDocument = `
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="printDialogTitle">${documentTypeToTitle(documentType)}</h5>
            </div>
            <div class="modal-body">
        <div class="clearance-form">
          <form id="clearance-form" onsubmit="printFormBlotter(event)">
            <div class="formBlotter">
            <div class="header">
            <div class="logo" style="display: flex; justify-content: center; align-items: center;">
  <img src="img/pic2.png" style="margin-bottom: 120px;width: 500px; height: 300px;">
</div>
        <br>
        ( Ctrl #    <u style=" width: 50px;
      text-align: center;"> ${crtl} </u>  )
             
              <div class="second">
                <div>
            <br>
                  <label for="complainant"> To Whom It May Concern:</label><br>
                  <label for="for">This is to certify that </label>
                 <br>
                  <label for="for">Mr./Ms.</label>
                  <u style=" width: 150px;
      text-align: center;"> ${name} </u>
                 </div>
              </div>
              <div class="formData">
               
                <div class="paragraphs">
                  <p>with resident and postal address at  <u style=" width: 150px;
      text-align: center;"> ${address} </u>
                  Tondo, Manila, is a registered voter and included in our Senior Citizens Masterlist  (#      <u style=" width: 150px;
      text-align: center;"> ${mention} </u> )
                  He/She is known to be of good moral character.
	This certification is being issued upon the request of the above mention person for   <u style=" width: 150px;
      text-align: center;"> ${purpose} </u> 
Done this     <u style=" width: 150px;
      text-align: center;"> ${month} </u> day of <u style=" width: 150px;
      text-align: center;"> ${day} </u> , 2023.
</p>
                   </div>
              </div>
              <div class="punongBaranggay" style="margin-top: 50px;display: flex; justify-content: center; align-items: center;">
              <div >
                <img src="img/p2.png" style="margin-top: 30px;width: 500px;">
              </div>
            </div>
            </div>
          </form>
          </div>        </div>


   
      </div>
    </div>
  </div>

  `;
  
  return clearanceDocument;
}





function generateClearanceDocument6(crtl,name, address, mention,month,day ,documentType) {
  var clearanceDocument = `
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="printDialogTitle">${documentTypeToTitle(documentType)}</h5>
            </div>
            <div class="modal-body">
        <div class="clearance-form">
          <form id="clearance-form" onsubmit="printFormBlotter(event)">
            <div class="formBlotter">

            ( Ctrl #    <u style=" width: 50px;
      text-align: center;"> ${crtl} </u>  )
            <div class="header">
            <div class="logo" style="display: flex; justify-content: center; align-items: center;">
  <img src="img/pic2.png" style="margin-bottom: 120px;width: 500px; height: 300px;">
</div>
        <br>
              <div class="second">
                <div>
            <br>
                  <label for="complainant"> To Whom It May Concern:</label><br>
                  <label for="for">This is to certify that </label>
                 <br>
                  <label for="for">Mr./Ms.</label>
                  <u style=" width: 150px;
      text-align: center;"> ${name} </u>  
                 </div>
              </div>
              <div class="formData">
               
                <div class="paragraphs">
                  <p>with resident and postal address at  <u style=" width: 150px;
      text-align: center;"> ${address} </u>
                  Tondo, Manila, is presently residing in our barangay. 
         He/she has no adverse whether criminal and administrative.
          This certification is being issued upon the request of the above mention person for 
            <u style=" width: 150px;
      text-align: center;"> ${mention} </u> 
Done this <u style=" width: 150px;
      text-align: center;"> ${month} </u>  day of <u style=" width: 150px;
      text-align: center;"> ${day} </u> , 2023.
</p>
                   </div>
              </div>
              <div class="punongBaranggay" style="margin-top: 50px;display: flex; justify-content: center; align-items: center;">
              <div >
                <img src="img/p2.png" style="margin-top: 30px;width: 500px;">
              </div>
            </div>
            </div>
          </form>
          </div>        </div>


      
      </div>
    </div>
  </div>
  `;
  
  return clearanceDocument;
}





function generateClearanceDocument7(crtl,name, address, mention,month,day ,documentType){
  var clearanceDocument = `
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="printDialogTitle">${documentTypeToTitle(documentType)}</h5>
            </div>
            <div class="modal-body">
        <div class="clearance-form">
          <form id="clearance-form" onsubmit="printFormBlotter(event)">
            <div class="formBlotter">

            ( Ctrl #    <u style=" width: 50px;
      text-align: center;"> ${crtl} </u>  )

            <div class="header">
            <div class="logo" style="display: flex; justify-content: center; align-items: center;">
  <img src="img/pic2.png" style="margin-bottom: 120px;width: 500px; height: 300px;">
</div>
        <br>
              <div class="second">
                <div>
            <br>
                  <label for="complainant"> To Whom It May Concern:</label><br>
                  <label for="for">This is to certify that </label>
                 <br>
                 <u style=" width: 150px;
      text-align: center;"> ${name} </u> 
                 </div>
              </div>
              <div class="formData">
               
                <div class="paragraphs">
                  <p>who is presently residing at   <u style=" width: 150px;
      text-align: center;"> ${address} </u> 
                  ,Tondo, Manila, but a non-registered voter of our barangay.
	This certification is being issued upon the request of the above mention person for  
    <u style=" width: 150px;
      text-align: center;"> ${name} </u> mention
Done this     <u style=" width: 150px;
      text-align: center;"> ${month} </u>  day of <u style=" width: 150px;
      text-align: center;"> ${day} </u> , 2023.
</p>
                   </div>
              </div>
              <div class="punongBaranggay" style="margin-top: 50px;display: flex; justify-content: center; align-items: center;">
              <div >
                <img src="img/p2.png" style="margin-top: 30px;width: 500px;">
              </div>
            </div>
            </div>
          </form>
          </div>        </div>


     
      </div>
    </div>
  </div>
  `;
  
  return clearanceDocument;
}






  </script>

  <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;
        arrowParent.classList.toggle("showMenu");
      });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    });
  </script>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
