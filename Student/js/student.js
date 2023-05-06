//INSTITUTE UPDATE COLLAPSEBLE CODE START
$(document).ready(function () {
    $(".institute-update-btn").click(function () {
      $(".institute-menu").collapse("toggle");
    });
    $(".homepage-update-btn").click(function () {
      $(".homepage-menu").collapse("toggle");
    });
  });
  //INSTITUTE UPDATE COLLAPSEBLE CODE END
  
  //DYNAMIC REQUEST(CREATE CATEGORY) CODE START
  $(document).ready(function () {
    //for showing in first page(create category)
    let active_link = $(".active").attr("access-link");
    dynamic_request(active_link);
    $(".collapse-item").each(function () {
      $(this).click(function () {
        let access_link = $(this).attr("access-link");
        //create a function
        dynamic_request(access_link);
      });
    });
  });
  
  //function call
  function dynamic_request(access_link) {
    $.ajax({
      type: "POST",
      url: "dynamic_pages/" + access_link,
      //for progress bar loading code start
      xhr: function () {
        let request = new XMLHttpRequest();
        request.onprogress = function (e) {
          let percentage = Math.floor((e.loaded * 100) / e.total);
          let progress = `<div class="progress" role="progressbar" aria-label="Success striped example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                 <div class="progress-bar progress-bar-striped bg-success" style="width: ${percentage}%"></div>
                        </div>`;
          $(".page").html(progress);
        };
        return request;
      },
      //for progress bar loading code end
      beforeSend: function () {
        let progress = `<div class="progress" role="progressbar" aria-label="Success striped example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                 <div class="progress-bar progress-bar-striped bg-success" style="width: 25%"></div>
                        </div>`;
        $(".page").html(progress);
      },
      success: function (response) {
        $(".page").html(response);
        if (access_link == "category_design.php") {
          categoryFunc();
        } else if (access_link == "course_design.php") {
          createCourseFunc();
        } else if (access_link == "batch_design.php") {
          createBatchFunc();
        } else if (access_link == "student_design.php") {
          createStudentFunc();
        }else if (access_link == "document_design.php") {
          createDocumentFunc();
        }else if (access_link == "invoice_design.php") {
          createInvoiceFunc();
        }else if (access_link == "branding_design.php") {
          createBrandFunc();
        }else if (access_link == "attendance_design.php") {
          createAttendanceFunc();
        }else if (access_link == "access_design.php") {
          createAccessFunc();
        }else if(access_link == "showcase_design.php"){
          createShowcaseFunc();
        }
      },
    });
  }
  //DYNAMIC REQUEST(CREATE CATEGORY) CODE END
  
  //ACTIVE TAB
  $(document).ready(function () {
    $(".collapse-item").each(function () {
      $(this).click(function () {
        $(".collapse-item").each(function () {
          $(this).removeClass("active");
        });
        $(this).addClass("active");
      });
    });
  });
  //ACTIVE TAB END

// CREATE INVOICE - CODE START
function createInvoiceFunc(){
    let invoiceForm = document.querySelector(".invoice-form");
    let allInput = invoiceForm.querySelectorAll("INPUT");
    let allSpan = invoiceForm.querySelectorAll(".invoice-fee");


  //show data by oninput
  let total = 0;
  let fee_pending = 0;
  $("#invoice-enrollment").on("input", async function () {
    let response = await ajaxGetEnrollmentData("students", this.value, "invoice-loader");
    if (response.trim() != "Not Match!") {
      $(".invoice-btn").removeClass("disabled");
      $(".invoice-msg").html("");

      const data = JSON.parse(response.trim());
      //Table input
      allInput[1].value = data.enrollment;
      allInput[2].value = data.student_name;
      allInput[3].value = data.category;
      allInput[4].value = data.course;
      allInput[5].value = data.batch;

      //span input
      allSpan[0].innerHTML = data.fee;
      allSpan[1].innerHTML = data.paid_fee;

      //fee time & pending-fee
      allInput[6].value = data.fee_time;
      let pending_amount = data.fee - data.paid_fee;
      allInput[7].value = pending_amount;

      //fee payable
      let pending = Number(allInput[7].value);
      $(".recent-paid").on("input", function () {
        let paid = Number(allSpan[1].innerHTML);
        let recent = Number(this.value);
        total = paid + recent;

        //fee pending
        fee_pending = pending - recent;
        allInput[7].value = fee_pending;
      });
    } else {
      $(".invoice-msg").html("Enrollment not Found!");
      $(".invoice-btn").addClass("disabled");

      //DATA EMPTY
      allInput[1].value = "";
      allInput[2].value = "";
      allInput[3].value = "";
      allInput[4].value = "";
      allInput[5].value = "";

      //span input
      allSpan[0].innerHTML = "";
      allSpan[1].innerHTML = "";

      //fee time & pending-fee
      allInput[6].value = "";
      allInput[7].value = "";
    }
  });

  //add invoice
  $(invoiceForm).submit(function (e) {
    e.preventDefault();
    let date = new Date();
    let dd = date.getDate();
    let mm = date.getMonth()+1;
    let yy = date.getFullYear();
    dd = dd < 10 ? "0" + dd : dd;
    mm = mm < 10 ? "0"+mm : mm;
    let finalDate = dd+"-"+mm+"-"+yy;

    // formData.append("paid_fee", total);
    // formData.append("pending", fee_pending);
    // formData.append("date", finalDate);
    
    let enrollment = $(".inv-enroll").val();
    let name = $(".inv-name").val();
    let category = $(".inv-category").val();
    let course = $(".inv-course").val();
    let batch = $(".inv-batch").val();
    let fee_time = $(".inv-time").val();
    let recent = $(".inv-recent").val();

    window.location = "../pay/pay.php?enrollment="+enrollment+"&name";
    //ajax request
    // $.ajax({
    //   type: "POST",
    //   url: "php/create_invoice.php",
    //   data: formData,
    //   processData: false,
    //   contentType: false,
    //   cache: false,
    //   beforeSend: function () {
    //     $(".invoice-loader").removeClass("d-none");
    //   },
    //   success: function (response) {
    //     $(".invoice-loader").addClass("d-none");
    //     if(response.trim() == "success"){
    //       swal("Invoice Created!", "Your Invoice Created Successully!", "success");

    //       window.location = "php/invoice.php?enrollment="+allInput[1].value+"&name="+allInput[2].value+"&category="+allInput[3].value+"&date="+finalDate+"&course="+allInput[4].value+"&batch="+allInput[5].value+"&fee-time="+allInput[6].value+"&paid-fee="+total+"&pending="+fee_pending+"&recent="+allInput[8].value;

    //       invoiceForm.reset();
    //       $(".invoice-btn").addClass("disabled");
    //     }else{
    //       swal(response.trim(), response.trim(), "error");
    //     }
    //   },
    // });
  });
}
// CREATE INVOICE - CODE END

// GET ENROLLMENT DATA DYNAMICALLY CODE START
function ajaxGetEnrollmentData(table, data, loader) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      type: "POST",
      url: "php/get_enrollment_data.php",
      data: {
        table: table,
        user_data: data,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        $("." + loader).addClass("d-none");
          resolve(response);
      },
    });
  });
}
// GET ENROLLMENT DATA DYNAMICALLY CODE END