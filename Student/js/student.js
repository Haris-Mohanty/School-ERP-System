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