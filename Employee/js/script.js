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

//CATEGORY CODE START
function categoryFunc() {
  //add fiels
  $(document).ready(function () {
    $(".category-add-btn").click(function () {
      let fields = `
        <input type="text" name="category" placeholder="Category Name" class="form-control category mb-3 shadow-none">
        <textarea name="details" class="form-control details mb-3 shadow-none" placeholder="Enter Details"></textarea>
      `;
      $(".dynamic-fields").append(fields);
    });
  });
  //create
  $(document).ready(function () {
    $(".category-create-btn").click(function (e) {
      e.preventDefault();
      let categoryEl = $(".category");
      let detailsEl = $(".details");
      let i;
      let category = [],
        details = [];
      for (i = 0; i < categoryEl.length; i++) {
        category[i] = categoryEl[i].value;
        details[i] = detailsEl[i].value;
      }
      //create a ajax request to send data to php page
      $.ajax({
        type: "POST",
        url: "php/create_category.php",
        data: {
          category: JSON.stringify(category),
          details: JSON.stringify(details),
        },
        beforeSend: function () {
          $(".create-category-loader").removeClass("d-none");
        },
        success: function (response) {
          if (response.trim() == "Your Data has been Inserted Successfully!") {
            setTimeout(function () {
              $(".create-category-loader").addClass("d-none");
              swal("Congratulations!", response, "success");
              getCategoryFunc();
            }, 2000);
          } else {
            setTimeout(function () {
              $(".create-category-loader").addClass("d-none");
              swal(response.trim(), response.trim(), "error");
            }, 2000);
          }
        },
      });
    });
  });
  //get Category list
  async function getCategoryFunc() {
    let response = await ajaxGetAllData("category", "show-category-loader");
    let all_category = JSON.parse(response.trim());
    $(".category-list").html("");
    all_category.forEach((data, index) => {
      let tr = `
        <tr index="${data.id}">
            <td>${index + 1}</td>
            <td>${data.category_name}</td>
            <td>${data.details}</td>
            <td>
              <button class="btn edit-btn btn-primary p-1 px-2"><i class="fa fa-edit"></i></button>
              <button class="btn d-none save-btn btn-primary p-1 px-2"><i class="fa fa-save"></i></button>
              <button class="btn btn-danger del-btn p-1 px-2"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        `;
      $(".category-list").append(tr);
    });
    updateCategory();
    delCategory();
  }
  getCategoryFunc();

  //EDIT BUTTON CODE START
  function updateCategory() {
    let allEditBtn = $(".category-list .edit-btn");
    $(allEditBtn).each(function () {
      $(this).click(function () {
        let parent = this.parentElement.parentElement;
        let saveBtn = parent.querySelector(".save-btn");
        let id = $(parent).attr("INDEX");
        let td = parent.querySelectorAll("TD");
        td[1].contentEditable = true;
        td[1].focus();
        td[2].contentEditable = true;
        td[2].style.border = "2px solid blue";
        $(this).addClass("d-none");
        $(saveBtn).removeClass("d-none");
        //save
        $(saveBtn).click(function () {
          let category = $(td[1]).html();
          let details = $(td[2]).html();

          $.ajax({
            type: "POST",
            url: "php/edit_category.php",
            data: {
              id: id,
              category: category,
              details: details,
            },
            cache: false,
            beforeSend: function () {
              $(".show-category-loader").removeClass("d-none");
            },
            success: function (response) {
              //set timeout
              setTimeout(function () {
                if (response == "success") {
                  $(".show-category-loader").addClass("d-none");
                  swal(
                    "Data Updated !",
                    "Your data has been Updated Successfully!",
                    "success"
                  );
                  td[1].contentEditable = false;
                  td[1].focus();
                  td[2].contentEditable = false;
                  td[2].style.border = "inherit";
                  $(saveBtn).addClass("d-none");
                  $(allEditBtn).removeClass("d-none");
                } else {
                  $(".show-category-loader").addClass("d-none");
                  swal(response.trim(), response.trim(), "error");
                }
              }, 1500);
              //set timeout
            },
          });
        });
      });
    });
  }
  //DELETE BUTTON CODE START
  function delCategory() {
    let allDelBtn = $(".category-list .del-btn");
    $(allDelBtn).each(function () {
      $(this).click(function () {
        let parent = this.parentElement.parentElement;
        let id = $(parent).attr("INDEX");
        //swal start
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then(async (willDelete) => {
          if (willDelete) {
            let response = await ajaxDeleteById(
              id,
              "category",
              "show-category-loader"
            );
            if (response.trim() == "success") {
              getCategoryFunc();
              swal("Category Deleted", response.trim(), "success");
            } else {
              swal(response.trim(), response.trim(), "warning");
            }
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
        //swal end
      });
    });
  }
  //DELETE BUTTON CODE END
}
//GET DATA FROM DATABASE DYNAMICALLY CODE START
function ajaxGetAllData(table, loader) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      type: "POST",
      url: "php/category_list.php",
      data: {
        table: table,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        resolve(response);
        $("." + loader).addClass("d-none");
      },
    });
  });
}
//GET DATA FROM DATABASE DYNAMICALLY CODE END

//DELETE DATA CODE DYNAMIC START
function ajaxDeleteById(id, table, loader) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      type: "POST",
      url: "php/delete_category.php",
      data: {
        id: id,
        table: table,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        setTimeout(function () {
          $("." + loader).addClass("d-none");
          resolve(response);
        }, 800);
      },
    });
  });
}
//DELETE DATA CODE DYNAMIC END
//GET COURSE DYNAMIC START
function ajaxGetAllCourse(table, category, loader) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      type: "POST",
      url: "php/get_all_course.php",
      data: {
        table: table,
        category: category,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        setTimeout(function () {
          $("." + loader).addClass("d-none");
          resolve(response);
        }, 800);
      },
    });
  });
}
//GET COURSE DYNAMIC END

// GET BATCH DYNAMIC START
function ajaxGetAllBatch(table, category, course, loader) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      type: "POST",
      url: "php/get_all_batch.php",
      data: {
        table: table,
        category: category,
        course: course,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        setTimeout(function () {
          $("." + loader).addClass("d-none");
          resolve(response);
        }, 600);
      },
    });
  });
}
// GET BATCH DYNAMIC END

// GET ALL COURSE FEES DYNAMIC CODE START
function ajaxGetAllCourseFee(table, category, course, loader) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      type: "POST",
      url: "php/get_all_course_fee.php",
      data: {
        table: table,
        category: category,
        course: course,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        setTimeout(function () {
          $("." + loader).addClass("d-none");
          resolve(response);
        }, 600);
      },
    });
  });
}
// GET ALL COURSE FEES DYNAMIC CODE END

// GET ALL STUDENTS DYNAMIC CODE START
function ajaxGetAllStudents(table, category, batch, loader) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      type: "POST",
      url: "php/get_all_student.php",
      data: {
        table: table,
        category: category,
        batch: batch,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        setTimeout(function () {
          $("." + loader).addClass("d-none");
          resolve(response);
        }, 600);
      },
    });
  });
}
// GET ALL STUDENTS DYNAMIC CODE END

// ENROLLMENT CHECK DYNAMIC CODE START
function ajaxGetColumnData(table, column, data, loader) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      type: "POST",
      url: "php/get_column_data.php",
      data: {
        table: table,
        column: column,
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
// ENROLLMENT CHECK DYNAMIC CODE END

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

//CATEGORY CODE END

// CREATE COURSE CODE START
function createCourseFunc() {
  $(".course-form").submit(function (e) {
    e.preventDefault();
    let courseActiveEl = document.querySelector("#course-active");
    let status = "";
    courseActiveEl.checked == true ? (status = "Active") : (status = "Pending");
    let formData = new FormData(this);
    formData.append("status", status);
    $.ajax({
      type: "POST",
      url: "php/create_course.php",
      data: formData,
      processData: false,
      contentType: false,
      cache: false,
      beforeSend: function () {
        $(".course-loader").removeClass("d-none");
      },
      success: function (response) {
        setTimeout(function () {
          if (response.trim() == "Success") {
            $(".course-loader").addClass("d-none");
            swal("Course Added!", "Course added Successfully!", "success");
          } else {
            swal(response.trim(), response.trim(), "error");
          }
        }, 700);
      },
    });
  });

  //SHOWING COURSE LIST BY CATEGORY CODE START
  function courseListFunc() {
    $(".course-category").on("change", function () {
      if (this.value != "choose-category") {
        //ajax request start
        $.ajax({
          type: "POST",
          url: "php/course_list.php",
          data: {
            category: this.value,
          },
          beforeSend: function () {
            $(".course-list-loader").removeClass("d-none");
          },
          success: function (response) {
            if (response.trim() != "There is No Course Found!") {
              $(".course-list-loader").addClass("d-none");
              let all_data = JSON.parse(response.trim());
              //date-time customize start
              let i;
              let all_time = [];
              let all_date = [];
              for (i = 0; i < all_data.length; i++) {
                let date = new Date(all_data[i].added_date);
                let dd = date.getDate();
                dd = dd < 10 ? "0" + dd : dd;
                let mm = date.getMonth() + 1;
                mm = mm < 10 ? "0" + mm : mm;
                let yy = date.getFullYear();
                let final_date = dd + "-" + mm + "-" + yy;
                let time = date.toLocaleTimeString();
                all_date.push(final_date);
                all_time.push(time);
              }
              //date-time customize end
              $(".course-list").html("");
              all_data.forEach((data, index) => {
                let tr = `
                <tr index="${data.id}"> 
                  <td class="text-nowrap">${index + 1}</td>
                  <td class="text-nowrap">${data.category}</td>
                  <td class="text-nowrap">${data.code}</td>
                  <td class="text-nowrap">${data.name}</td>
                  <td class="text-nowrap">${data.duration}</td>
                  <td class="text-nowrap">${data.course_time}</td>
                  <td class="text-nowrap">${data.fee}</td>
                  <td class="text-nowrap">${data.fee_time}</td>
                  <td class="text-nowra">${data.status}</td>
                  <td class="text-nowrap">${all_date[index]} ${
                  all_time[index]
                }</td>
                  <td class="text-nowrap">${data.added_by}</td>
                  <td class="text-nowrap">${data.detail}</td>
                  <td class="text-nowrap">
                    <button class="btn edit-btn btn-primary p-1 px-2"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger del-btn p-1 px-2"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                `;
                $(".course-list").append(tr);
              });
              deleteCourseFunc();
              updateCourseFunc();
            } else {
              $(".course-list").html("");
              swal(
                "Not Found any Course!",
                "There is No Course Found in this Category!",
                "error"
              );
            }
          },
        });
        //ajax request end
      } else {
        $(".course-list").html("");
        swal("Select Category!", "Please Select a Category!", "warning");
      }
    });
  }
  courseListFunc();
  //SHOWING COURSE LIST BY CATEGORY CODE END

  //DELETE COURSE CODE START
  function deleteCourseFunc() {
    let allDelBtn = $(".course-list .del-btn");
    $(allDelBtn).each(function () {
      $(this).click(function () {
        let parent = this.parentElement.parentElement;
        let id = $(parent).attr("INDEX");
        //swal start
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then(async (willDelete) => {
          if (willDelete) {
            try {
              let response = await ajaxDeleteById(
                id,
                "course",
                "course-list-loader"
              );
              if (response.trim() == "success") {
                parent.remove();
                swal(
                  "Deleted Successfully!",
                  "Course Deleted Successfully!",
                  "success"
                );
              } else {
                swal(response.trim(), response.trim(), "warning");
              }
            } catch (err) {
              console.log(err);
            }
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
        //swal end
      });
    });
  }
  //DELETE COURSE CODE END

  // EDIT $ UPDATE CODE START
  function updateCourseFunc() {
    let courseForm = document.querySelector(".course-form");
    let allCourseInput = courseForm.querySelectorAll("INPUT");
    let allSelectEl = courseForm.querySelectorAll("SELECT");
    let textareaEl = courseForm.querySelector("TEXTAREA");
    let allButton = courseForm.querySelectorAll("BUTTON");
    let addEditBtn = $(".course-list .edit-btn");
    $(addEditBtn).each(function () {
      $(this).click(function () {
        let parent = this.parentElement.parentElement;
        let id = $(parent).attr("INDEX");
        let allTd = parent.querySelectorAll("TD");
        let status = allTd[8].innerHTML; //status
        if (status == "Active") {
          allCourseInput[6].checked = true;
        } else {
          allCourseInput[6].checked = false;
        }
        allSelectEl[0].value = allTd[1].innerHTML; //choose category
        allCourseInput[0].value = allTd[2].innerHTML; //course-code
        allCourseInput[1].value = allTd[3].innerHTML; //course-name
        allCourseInput[2].value = allTd[4].innerHTML; //duration
        allSelectEl[1].value = allTd[5].innerHTML; //total-time
        allCourseInput[3].value = allTd[6].innerHTML; //fees
        allSelectEl[2].value = allTd[7].innerHTML; //fees-period
        allCourseInput[5].value = allTd[10].innerHTML; //added-by
        textareaEl.value = allTd[11].innerHTML; //course-details

        //button
        allButton[0].classList.add("d-none");
        allButton[1].classList.remove("d-none");

        //ajax request
        allButton[1].onclick = function () {
          allCourseInput[6].checked == true ? (status = "Active") : (status = "Pending");
          //formdata
          let formData = new FormData(courseForm);
          formData.append("status", status);
          formData.append("id", id);
          $.ajax({
            type: "POST",
            url: "php/update_course.php",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
              $(".course-loader").removeClass("d-none");
            },
            success: function (response) {
              $(".course-loader").addClass("d-none");
              if (response.trim() == "success") {
                courseForm.reset("");
                //button
                allButton[0].classList.remove("d-none");
                allButton[1].classList.add("d-none");
                swal(
                  "Course Updated!",
                  "Course has been Updated Successfully!",
                  "success"
                );
              } else {
                swal("Failed!", response.trim(), "error");
              }
            },
          });
        };
      });
    });
  }
  // EDIT $ UPDATE CODE END
}
// CREATE COURSE CODE END

// CREATE BATCH CODE START
function createBatchFunc() {
  $("#batch-category").on("change", async function () {
    let response = await ajaxGetAllCourse("course", this.value, "batch-loader");
    if (response.trim() != "There is No Course Found!") {
      let all_course = JSON.parse(response.trim());
      $("#batch-course").html(
        '<option value="choose-course">Choose Course</option>'
      ); //empty
      all_course.forEach((course) => {
        let option = `
        <option value="${course.name}">${course.name}</option>
        `;
        $("#batch-course").append(option);
      });
    } else {
      $("#batch-course").html(
        '<option value="choose-course">Choose Course</option>'
      );
      swal(
        "Not Found any Course!",
        "There is No Course Found in this Category!",
        "error"
      );
    }
  });
  //form submit/ add batch
  $(".batch-form").on("submit", function (e) {
    e.preventDefault();
    if ($("#batch-course").val() != "choose-course") {
      //form data
      let formData = new FormData(this);
      //active
      let activeEl = document.querySelector("#batch-active");
      let status = "";
      activeEl.checked == true ? (status = "Active") : (status = "Pending");
      formData.append("status", status);
      //ajax request
      $.ajax({
        type: "POST",
        url: "php/create_batch.php",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
          $(".batch-loader").removeClass("d-none");
        },
        success: function (response) {
          if (response.trim() == "success") {
            swal("Successfully Added!", "Your Batch Added Successfully!", "success");
            $(".batch-form")[0].reset();
          } else {
            swal(response.trim(), response.trim(), "error");
          }
        },
      });
    } else {
      swal("Select Course!", "Please select category & Course!", "warning");
    }
  });
  //batch list- get course
  $("#batch-list-category").on("change", async function () {
    let response = await ajaxGetAllCourse(
      "course",
      this.value,
      "batch-list-loader"
    );
    if (response.trim() != "There is No Course Found!") {
      let all_course = JSON.parse(response.trim());
      $("#batch-list-course").html(
        '<option value="choose-course">Choose Course</option>'
      ); //empty
      $(".batch-list").html("");
      all_course.forEach((course) => {
        let option = `
        <option value="${course.name}">${course.name}</option>
        `;
        $("#batch-list-course").append(option);
      });
    } else {
      $("#batch-list-course").html(
        '<option value="choose-course">Choose Course</option>'
      );
      // $(".batch-list").html("");
      swal(
        "Not Found any Course!",
        "There is No Course Found in this Category!",
        "error"
      );
    }
  });
  //get batch list
  $("#batch-list-course").on("change", async function () {
    try {
      let response = await ajaxGetAllBatch(
        "batch",
        $("#batch-list-category").val(),
        this.value,
        "batch-list-loader"
      );
      if (response.trim() != "There is No Batch Found!") {
        let all_data = JSON.parse(response.trim());
        //date-time customize start
        let i;
        let all_time = [];
        let all_date = [];
        for (i = 0; i < all_data.length; i++) {
          let date = new Date(all_data[i].added_date);
          let dd = date.getDate();
          dd = dd < 10 ? "0" + dd : dd;
          let mm = date.getMonth() + 1;
          mm = mm < 10 ? "0" + mm : mm;
          let yy = date.getFullYear();
          let final_date = dd + "-" + mm + "-" + yy;
          let time = date.toLocaleTimeString();
          all_date.push(final_date);
          all_time.push(time);
        }
        //date-time customize end
        $(".batch-list").html("");
        all_data.forEach((data, index) => {
          let tr = `
          <tr index="${data.id}">
             <td class="text-nowrap">${index + 1}</td>
             <td class="text-nowrap">${data.category}</td>
             <td class="text-nowrap">${data.course}</td>
             <td class="text-nowrap">${data.batch_code}</td>
             <td class="text-nowrap">${data.batch_name}</td>
             <td class="text-nowrap">${data.batch_from}</td>
             <td class="text-nowrap">${data.batch_to}</td>
             <td class="text-nowrap">${data.batch_from_date}</td>
             <td class="text-nowrap">${data.batch_to_date}</td>
             <td class="text-nowrap">${data.status}</td>
             <td class="text-nowrap">${data.batch_added_by}</td>
             <td class="text-nowrap">${data.detail}</td>
             <td class="text-nowrap">${all_date[index]} ${all_time[index]}</td>
             <td class="text-nowrap">
               <button class="btn edit-btn btn-primary px-2 p-1"><i class="fa fa-edit"></i></button>
               <button class="btn del-btn btn-danger px-2 p-1"><i class="fa fa-trash"></i></button>
             </td>
          </tr>
          `;
          $(".batch-list").append(tr);
        });
        deleteBatchFunc();
        updateBatchFunc();
      } else {
        $(".batch-list").html("");
        swal(response.trim(), response.trim(), "warning");
      }
    } catch (err) {
      console.log(err);
    }
  });
  //DELETE BATCH CODE START
  function deleteBatchFunc() {
    let allDelBtn = $(".batch-list .del-btn");
    $(allDelBtn).each(function () {
      $(this).click(async function () {
        let parent = this.parentElement.parentElement;
        let id = $(parent).attr("INDEX");
        //swal start
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then(async (willDelete) => {
          if (willDelete) {
            try {
              let response = await ajaxDeleteById(
                id,
                "batch",
                "batch-list-loader"
              );
              if (response.trim() == "success") {
                parent.remove();
                swal(
                  "Deleted Successfully!",
                  "Course Deleted Successfully!",
                  "success"
                );
              } else {
                swal(response.trim(), response.trim(), "warning");
              }
            } catch (err) {
              console.log(err);
            }
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
        //swal end
      });
    });
  }
  //DELETE BATCH CODE END

  // EDIT & UPDATE BATCH CODE START
  function updateBatchFunc() {
    let batchForm = document.querySelector(".batch-form");
    let allSelectEl = batchForm.querySelectorAll("SELECT");
    let course = allSelectEl[1].querySelector("OPTION");
    let allBatchInputEl = batchForm.querySelectorAll("INPUT");
    let textareaEl = batchForm.querySelector("TEXTAREA");
    let AllBtn = batchForm.querySelectorAll("BUTTON");
    let allEditBtn = $(".batch-list .edit-btn");
    $(allEditBtn).each(function () {
      $(this).on("click", function () {
        let parent = this.parentElement.parentElement;
        let id = $(parent).attr("index");
        let allTd = parent.querySelectorAll("TD");
        let status = allTd[9].innerHTML;
        //status check
        if (status == "Active") {
          allBatchInputEl[8].checked = true;
        } else {
          allBatchInputEl[8].checked = false;
        }

        //add value
        allSelectEl[0].value = allTd[1].innerHTML; //chhose course
        course.value = allTd[2].innerHTML;
        course.innerHTML = allTd[2].innerHTML; //course
        allBatchInputEl[0].value = allTd[3].innerHTML; //Batch code
        allBatchInputEl[1].value = allTd[4].innerHTML; //Batch Name
        allBatchInputEl[2].value = allTd[5].innerHTML; //Batch From time
        allBatchInputEl[3].value = allTd[6].innerHTML; //Batch to time
        allBatchInputEl[4].value = allTd[7].innerHTML; //Batch from date
        allBatchInputEl[5].value = allTd[8].innerHTML; //Batch to date
        allBatchInputEl[7].value = allTd[10].innerHTML; //Added by
        textareaEl.value = allTd[11].innerHTML; //details

        //button
        AllBtn[0].classList.add("d-none");
        AllBtn[1].classList.remove("d-none");

        //ajax request
        AllBtn[1].onclick = function () {
          status = allBatchInputEl[8].checked ? (status = "Active") : (status = "Pending");
          //formdata
          let formData = new FormData(batchForm);
          formData.append("status", status);
          formData.append("id", id);
          //check course
          if (allSelectEl[1].value != "choose-course") {
            $.ajax({
              type: "POST",
              url: "php/update_batch.php",
              data: formData,
              contentType: false,
              processData: false,
              cache: false,
              beforeSend: function () {
                $(".batch-loader").removeClass("d-none");
              },
              success: function (response) {
                if (response.trim() == "success") {
                  //loader
                  $(".batch-loader").addClass("d-none");
                  //form-reset
                  batchForm.reset("");
                  course.innerHTML = "Choose Course";
                  //btn hide
                  AllBtn[0].classList.remove("d-none");
                  AllBtn[1].classList.add("d-none");
                  swal("Batch Updated!", "Batch has been Updated Successfully!", "success");
                } else {
                  swal(response.trim(), response.trim(), "error");
                }
              },
            });
          } else {
            swal("Select Course", "Please Select a Course!", "warning");
          }
        };
      });
    });
  }
  // EDIT & UPDATE BATCH CODE END
}
// CREATE BATCH CODE END

// STUDENT REGISTRATION FROM CODE START
function createStudentFunc() {
  //get course
  $("#stu-category").on("change", async function () {
    let response = await ajaxGetAllCourse(
      "course",
      this.value,
      "student-loader"
    );
    if (response.trim() != "There is No Course Found!") {
      let all_course = JSON.parse(response.trim());

      $("#stu-course").html(
        '<option value="choose-course">Choose Course</option>'
      ); //empty
      all_course.forEach((course) => {
        let option = `
        <option value="${course.name}">${course.name}</option>
        `;
        $("#stu-course").append(option);
      });
    } else {
      $("#stu-course").html('<option value="choose-course">Choose Course</option>');
      $("#stu-batch").html('<option value="choose-batch">Choose Batch</option>');
      swal("Not Found any Course!","There is No Course Found in this Category!","error");
    }
  });

  //get batch
  $("#stu-course").on("change", async function () {
    let response = await ajaxGetAllBatch(
      "batch",
      $("#stu-category").val(),
      this.value,
      "student-loader"
    );
    if (response.trim() != "There is No Batch Found!") {
      let all_course = JSON.parse(response.trim());

      $("#stu-batch").html(
        '<option value="choose-course">Choose Batch</option>'
      ); //empty
      all_course.forEach((batch) => {
        let option = `
        <option value="${batch.batch_name} from ${batch.batch_from} to ${batch.batch_to}">
              ${batch.batch_name} from ${batch.batch_from} to ${batch.batch_to}
        </option>
        `;
        $("#stu-batch").append(option);
      });
    } else {
      $("#stu-batch").html(
        '<option value="choose-batch">Choose Batch</option>'
      );
      swal(
        "Not Found any Batch!",
        "There is No Batch Found in this Course!",
        "error"
      );
    }
  });

  //get course fees
  $("#stu-course").on("change", async function () {
    let response = await ajaxGetAllCourseFee(
      "course",
      $("#stu-category").val(),
      this.value,
      "student-loader"
    );
    if (response.trim() != "There is No Course Found!") {
      let data = JSON.parse(response.trim());
      $(".fee").val(data.fee);
      $(".fee-time").val(data.fee_time);
    } else {
      swal(
        "Not Found any Batch!",
        "There is No Batch Found in this Course!",
        "error"
      );
    }
  });

  //form submit/ add student
  $(".student-form").on("submit", function (e) {
    e.preventDefault();
    //batch
    if ($("#stu-batch").val() != "choose-batch") {
      //month
      if ($(".month").val() != "choose month") {
        //Gender
        if ($(".gender").val() != "choose gender") {
          //month, date and year together
          let dd = $(".dd").val();
          let mm = $(".month").val();
          let yy = $(".yy").val();
          let dob = dd + "_" + mm + "_" + yy;
          //Status
          let statusEl = document.querySelector("#stu-active");
          let status = "";
          status =
            statusEl.checked == true ? (status = "Active") : (status = "Pending");
          //FORM DATA
          let formData = new FormData(this);
          formData.append("status", status);
          formData.append("dob", dob);
          //ajax request
          $.ajax({
            type: "POST",
            url: "php/create_student.php",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
              $(".student-loader").removeClass("d-none");
            },
            success: function (response) {
              if (response.trim() == "success") {
                $(".student-loader").addClass("d-none");
                swal("Student Added!", "Student Added Successfully!", "success");
                $(".student-form")[0].reset();
              } else {
                swal(response.trim(), response.trim(), "warning");
              }
            },
          });
        } else {
          swal("Choose Gender!", "Please select a Gender!", "warning");
        }
      } else {
        swal("Choose Month!", "Please select a month!", "warning");
      }
    } else {
      swal("Choose Batch!", "Please select a Batch!", "warning");
    }
  });

  //student list - get course
  $("#stu-list-category").on("change", async function () {
    let response = await ajaxGetAllCourse("course",this.value,"student-list-loader");
    if (response.trim() != "There is No Course Found!") {
      let all_course = JSON.parse(response.trim());

      $("#stu-list-course").html(
        '<option value="choose-course">Choose Course</option>'
      ); //empty
      all_course.forEach((course) => {
        let option = `
        <option value="${course.name}">${course.name}</option>
        `;
        $("#stu-list-course").append(option);
      });
    } else {
      $(".student-list").html(''); //table empty
      $("#stu-list-course").html('<option value="choose-course">Choose Course</option>');
      $("#stu-list-batch").html('<option value="choose-batch">Choose Batch</option>');
      swal("Not Found any Course!","There is No Course Found in this Category!","error");
    }
  });

  //student-list - get batch
  $("#stu-list-course").on("change", async function () {
    let response = await ajaxGetAllBatch("batch",$("#stu-list-category").val(),this.value,"student-list-loader");
    if (response.trim() != "There is No Batch Found!") {
      let all_course = JSON.parse(response.trim());

      $("#stu-list-batch").html(
        '<option value="choose-course">Choose Batch</option>'
      ); //empty
      all_course.forEach((batch) => {
        let option = `
        <option value="${batch.batch_name} from ${batch.batch_from} to ${batch.batch_to}">
              ${batch.batch_name} from ${batch.batch_from} to ${batch.batch_to}
        </option>
        `;
        $("#stu-list-batch").append(option);
      });
    } else {
      $(".student-list").html(''); //table empty
      $("#stu-list-batch").html('<option value="choose-batch">Choose Batch</option>');
      swal("Not Found any Batch!","There is No Batch Found in this Course!","error");
    }
  });

  //Get Students List
  $("#stu-list-batch").on("change", async function () {
    let response = await ajaxGetAllStudents("students", $("#stu-list-category").val(), this.value,"student-list-loader");
    if (response.trim() != "There is No Student Found!") {
      let all_data = JSON.parse(response.trim());
      $(".student-list").html('');
      all_data.forEach((data, index) => {
        let tr = `
        <tr index="${data.id}">
             <td class="text-nowrap">${index+1}</td>
             <td class="text-nowrap">${data.category}</td>
             <td class="text-nowrap">${data.course}</td>
             <td class="text-nowrap">${data.batch}</td>
             <td class="text-nowrap">${data.enrollment}</td>
             <td class="text-nowrap">${data.student_name}</td>
             <td class="text-nowrap">${data.father}</td>
             <td class="text-nowrap">${data.mother}</td>
             <td class="text-nowrap">${data.dob}</td>
             <td class="text-nowrap">${data.gender}</td>
             <td class="text-nowrap">${data.email}</td>
             <td class="text-nowrap">${data.password}</td>
             <td class="text-nowrap">${data.mobile}</td>
             <td class="text-nowrap">${data.country}</td>
             <td class="text-nowrap">${data.state}</td>
             <td class="text-nowrap">${data.city}</td>
             <td class="text-nowrap">${data.pincode}</td>
             <td class="text-nowrap">${data.fee}</td>
             <td class="text-nowrap">${data.fee_time}</td>
             <td class="text-nowrap">${data.photo}</td>
             <td class="text-nowrap">${data.signature}</td>
             <td class="text-nowrap">${data.id_proof}</td>
             <td class="text-nowrap">${data.status}</td>
             <td class="text-nowrap">${data.added_by}</td>
             <td class="text-nowrap">${data.added_date}</td>
             <td class="text-nowrap">
               <button class="btn btn-primary px-2 p-1 edit-btn"><i class="fa fa-edit"></i></button>
               <button class="btn btn-danger px-2 p-1 del-btn"><i class="fa fa-trash"></i></button>
             </td>
        </tr>
        `;

        //append
        $(".student-list").append(tr);
      });
      //delete function call
      deleteStudentFunc();
      //updatr
      updateStudentFunc();
    } else {
      $(".student-list").html('');
      swal("Empty Batch!","There is No Students Found in this Batch!","error");
    }
  });
  //STUDENT LIST - DELETE CODING START
  function deleteStudentFunc(){
    let allDelBtn = $(".student-list .del-btn");
    $(allDelBtn).each(function () {
      $(this).click(async function () {
        let parent = this.parentElement.parentElement;
        let id = $(parent).attr("INDEX");
        //swal start
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then(async (willDelete) => {
          if (willDelete) {
            try {
              let response = await ajaxDeleteById(id, "students", "student-list-loader");
                    if(response.trim() == "success"){
                      parent.remove();
                    }else{
                      swal(response.trim(), response.trim(), "warning");
                    }
            } catch (err) {
              console.log(err);
            }
            swal("Poof! Student has been Deleted Successfully!!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
        //swal end
      });
    });
  }
  //STUDENT LIST - DELETE CODING END

  // STUDENT LIST - EDIT & UPDATE CODE START
  function updateStudentFunc(){
    let stuForm = document.querySelector(".student-form");
    let allInput = stuForm.querySelectorAll("INPUT");
    let allSelect = stuForm.querySelectorAll("SELECT");
    let course = allSelect[1].querySelector("OPTION");
    let batch = allSelect[2].querySelector("OPTION");
    let allBtn = stuForm.querySelectorAll("BUTTON");
    let allEditBtn = $(".student-list .edit-btn");
    $(allEditBtn).each(function () {
      $(this).click(function () {
        let parent = this.parentElement.parentElement;
        let id = $(parent).attr("INDEX");
        let allTd = parent.querySelectorAll("TD");
        let status = allTd[22].innerHTML;
        //status check
        if(status == "Active"){
          allInput[16].checked = true;
        }else{
          allInput[16].checked = false;
        }

        //add value
        allSelect[0].value = allTd[1].innerHTML; //choose course
        course.value = allTd[2].innerHTML;
        course.innerHTML =  allTd[2].innerHTML; //choose course
        batch.value = allTd[3].innerHTML;
        batch.innerHTML = allTd[3].innerHTML; //choose batch
        allInput[0].value = allTd[4].innerHTML; //enrollment
        allInput[1].value = allTd[5].innerHTML; //name
        allInput[4].value = allTd[6].innerHTML; //father
        allInput[5].value = allTd[7].innerHTML; //mother
        //dob
        let dob = allTd[8].innerHTML.split("_");
        allInput[2].value = dob[0];
        allSelect[3].value = dob[1];
        allInput[3].value = dob[2];
        //dob
        allSelect[4].value = allTd[9].innerHTML; //gender
        allInput[6].value = allTd[10].innerHTML; //email
        allInput[7].value = allTd[11].innerHTML; //password
        allInput[8].value = allTd[12].innerHTML; //mobile
        allInput[9].value = allTd[13].innerHTML; //country
        allInput[10].value = allTd[14].innerHTML; //state
        allInput[11].value = allTd[15].innerHTML; //city
        allInput[12].value = allTd[16].innerHTML; //pincode
        allInput[13].value = allTd[17].innerHTML; //fee
        allInput[14].value = allTd[18].innerHTML; //fee-time
        allInput[15].value = allTd[23].innerHTML; //added-by

        //button
        allBtn[0].classList.add("d-none");
        allBtn[1].classList.remove("d-none");

        //update btn
        allBtn[1].onclick = function(){
          let formData = new FormData(stuForm);
          status = allInput[16].checked == true ? (status = "Active") : (status = "Pending");
          let dd = allInput[2].value;
          let mm = allSelect[3].value;
          let yy = allInput[3].value;
          let dob = dd+"_"+mm+"_"+yy;
          formData.append("status", status);
          formData.append("id", id);
          formData.append("dob", dob);

          //ajax
          $.ajax({
            type : "POST",
            url : "php/update_student.php",
            data : formData,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
              $(".student-loader").removeClass("d-none");
            },
            success: function (response) {
              if(response.trim() == "success"){
                //loader
                $(".student-loader").addClass("d-none");
                //btn hide
                allBtn[0].classList.remove("d-none");
                allBtn[1].classList.add("d-none");
                //
                course.innerHTML = "";
                batch.innerHTML = "";
                swal("Updated!", "Student Updated Successfully!", "success");
                stuForm.reset("");
              }else{
                swal(response.trim(), response.trim(), "error");
              }
            },
          });
        }
      });
    });
  }
  // STUDENT LIST - EDIT & UPDATE CODE END

  // ENROLLMENT CHECK - UNIQUE ENROLLMENT CODE START
  $(".enrollment-el").on("input", async function () {
    try{
      let response = await ajaxGetColumnData("students", "enrollment", this.value, "student-loader");
      if(response.trim() == "Not Match!"){
        $(".stu-add-btn").removeClass("disabled");
        $(".enroll-msg").html('');
      }else{
        $(".enroll-msg").html("This Enrollment is "+response.trim());
        $(".stu-add-btn").addClass("disabled");
      }
    }catch(err){
      console.log(err);
    }
  });
  // ENROLLMENT CHECK - UNIQUE ENROLLMENT CODE END
}
// STUDENT REGISTRATION FROM CODE END


// UPLOAD STUDENT DOCUMENT - CODE START
function createDocumentFunc() {
  $("#stu-enrollment").on("input", async function () {
    try{
      let response = await ajaxGetColumnData("students", "enrollment", this.value, "document-loader");
      if(response.trim() != "Not Match!"){
        $(".doc-btn").removeClass("disabled");
        $(".enroll-doc-msg").html('');
      }else{
        $(".enroll-doc-msg").html("Enrollment not Found!");
        $(".doc-btn").addClass("disabled");
      }
    }catch(err){
      console.log(err);
    }
  });
  //upload document code
  $(".document-form").submit(function (e) {
    e.preventDefault();
    //ajax request
    $.ajax({
      type: "POST",
      url: "php/upload_document.php",
      data: new FormData(this),
      processData: false,
      contentType: false,
      cache: false,
      beforeSend: function () {
        $(".document-loader").removeClass("d-none");
      },
      success: function (response) {
        
        if(response.trim() == "success"){
          $(".document-loader").addClass("d-none");
          swal("Congrats!", "Your Document Uploaded Successfully", "success");
          $(".document-form")[0].reset();
        }else{
          swal(response.trim(), response.trim(), "error");
        }
      },
    });
  });
}
// UPLOAD STUDENT DOCUMENT - CODE END

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
    let date = new Date();
    let dd = date.getDate();
    let mm = date.getMonth()+1;
    let yy = date.getFullYear();
    dd = dd < 10 ? "0" + dd : dd;
    mm = mm < 10 ? "0"+mm : mm;
    let finalDate = dd+"-"+mm+"-"+yy;
    let formData = new FormData(this);
    formData.append("paid_fee", total);
    formData.append("pending", fee_pending);
    formData.append("date", finalDate);
    e.preventDefault();
    //ajax request
    $.ajax({
      type: "POST",
      url: "php/create_invoice.php",
      data: formData,
      processData: false,
      contentType: false,
      cache: false,
      beforeSend: function () {
        $(".invoice-loader").removeClass("d-none");
      },
      success: function (response) {
        $(".invoice-loader").addClass("d-none");
        if(response.trim() == "success"){
          swal("Invoice Created!", "Your Invoice Created Successully!", "success");

          window.location = "php/invoice.php?enrollment="+allInput[1].value+"&name="+allInput[2].value+"&category="+allInput[3].value+"&date="+finalDate+"&course="+allInput[4].value+"&batch="+allInput[5].value+"&fee-time="+allInput[6].value+"&paid-fee="+total+"&pending="+fee_pending+"&recent="+allInput[8].value;

          invoiceForm.reset();
          $(".invoice-btn").addClass("disabled");
        }else{
          swal(response.trim(), response.trim(), "error");
        }
      },
    });
  });
}
// CREATE INVOICE - CODE END

// BRANDING DETAILS - CODE START
function createBrandFunc(){
  let brandForm = document.querySelector(".brand-form");
  let allInput = brandForm.querySelectorAll("INPUT");
  let textarea = brandForm.querySelectorAll("TEXTAREA");
  let brandBtn = brandForm.querySelector("button");
  $(".brand-form").on("submit", function (e) {
    e.preventDefault();
    //ajax request
    $.ajax({
      type: "POST",
      url: "php/create_brand.php",
      data: new FormData(this),
      processData: false,
      contentType: false,
      cache: false,
      beforeSend: function () {
        $(".brand-loader").removeClass("d-none");
      },
      success: function (response) {

        if(response.trim() == "success"){
          $(".brand-loader").addClass("d-none");
          swal("Data Updated!", "Your Brand has been Updated Successfully!", "success");
          getBrandDataFunc();

        }else{
          swal(response.trim(), response.trim(), "error");
        }
      },
    });
  });
  function getBrandDataFunc() {
    $.ajax({
      type: "POST",
      url: "php/get_brand.php",
      cache: false,
      beforeSend: function () {
        $(".brand-loader").removeClass("d-none");
      },
      success: function (response) {
        $(".brand-loader").addClass("d-none");

        if(response.trim() != "There is No Data!"){

          let data = JSON.parse(response.trim());
          allInput[0].value = data.brand_name;
          allInput[2].value = data.brand_domain;
          allInput[3].value = data.brand_email;
          allInput[4].value = data.brand_twitter;
          allInput[5].value = data.brand_facebook;
          allInput[6].value = data.brand_instagram;
          allInput[7].value = data.brand_whatsapp;
          textarea[0].value = data.brand_address;
          allInput[8].value = data.brand_mobile;
          textarea[1].value = data.brand_about;
          textarea[2].value = data.brand_privacy;
          textarea[3].value = data.brand_cookie;
          textarea[4].value = data.brand_terms;

          //disabled
          let i;
          for(i=0; i<allInput.length; i++){
            allInput[i].disabled = true;
          }
          for(i=0; i<textarea.length; i++){
            textarea[i].disabled = true;
          }
          brandBtn.disabled = true;

          $(".brand-edit-btn").removeClass("d-none");

          
        }else{
          $(".brand-edit-btn").addClass("d-none");
          //enabled
          for(i=0; i<allInput.length; i++){
            allInput[i].disabled = false;
          }
          for(i=0; i<textarea.length; i++){
            textarea[i].disabled = false;
          }
          brandBtn.disabled = false;
        }
      },
    });
  }
  getBrandDataFunc();
  $(".brand-edit-btn").click(function () {
    $(".brand-edit-btn").addClass("d-none");
    for(i=0; i<allInput.length; i++){
      allInput[i].disabled = false;
    }
    for(i=0; i<textarea.length; i++){
      textarea[i].disabled = false;
    }
    brandBtn.disabled = false;
  });
}
// BRANDING DETAILS - CODE END

// STUDENT ATTENDANCE - CODE START
function createAttendanceFunc(){
  //get course
  $("#att-category").on("change", async function () {
    let response = await ajaxGetAllCourse("course", this.value, "att-loader");
    if (response.trim() != "There is No Course Found!") {
      let all_course = JSON.parse(response.trim());

      $("#att-course").html('<option value="choose-course">Choose Course</option>'); //empty
      all_course.forEach((course) => {
        let option = `
        <option value="${course.name}">${course.name}</option>
        `;
        $("#att-course").append(option);
      });
    } else {
      $(".att-list").html('');
      $("#att-course").html('<option value="choose-course">Choose Course</option>');
      $("#att-batch").html('<option value="choose-batch">Choose Batch</option>');
      swal("Not Found any Course!","There is No Course Found in this Category!","error");
    }
  });
  //get batch
  $("#att-course").on("change", async function () {
    let response = await ajaxGetAllBatch("batch", $("#att-category").val(), this.value,"att-loader");
    if (response.trim() != "There is No Batch Found!") {
      let all_course = JSON.parse(response.trim());

      $("#att-batch").html('<option value="choose-course">Choose Batch</option>'); //empty
      all_course.forEach((batch) => {
        let option = `
        <option value="${batch.batch_name} from ${batch.batch_from} to ${batch.batch_to}">
              ${batch.batch_name} from ${batch.batch_from} to ${batch.batch_to}
        </option>
        `;
        $("#att-batch").append(option);
      });
    } else {
      $(".att-list").html('');
      $("#att-batch").html('<option value="choose-batch">Choose Batch</option>');
      swal("Not Found any Batch!", "There is No Batch Found in this Course!", "error");
    }
  });
  //date
  let date = new Date();
  let dd = date.getDate();
  let mm = date.getMonth()+1;
  let yy = date.getFullYear();
  dd = dd<10 ? "0"+dd : dd;
  mm = mm<10 ? "0"+mm : mm;
  let maxDate = yy+"-"+mm+"-"+dd;
  $(".date").attr("max", maxDate);
  //Show students
  $("#att-batch").on("change", async function () {
    try{

      let response = await ajaxGetAllStudents("students", $("#att-category").val(), this.value, "att-loader");
      if(response.trim() != "There is No Student Found!"){

        $(".att-btn").removeClass("disabled");
        let students = JSON.parse(response.trim());
        $(".att-list").html('');
        students.forEach((student, index) => {
          let tr = `
          <tr>
            <td>${index+1}</td>
            <td class="enrollment">${student.enrollment}</td>
            <td class="name">${student.student_name}</td>
            <td class="batch">${student.batch}</td>
            <td class="d-flex justify-content-between attendance">
              <div>
                <input type="radio" name="absent-${index}" checked id="absent" value="absent" >
                <label for="absent">Absent</label>
              </div>
              <div>
                <input type="radio" name="absent-${index}" id="present" value="present" >
                <label for="present">Present</label>
              </div>
            </td>
          </tr>
          `;
          $(".att-list").append(tr);
        });

      }else{
        $(".att-btn").addClass("disabled");
        $(".att-list").html('');
      }

    }catch(err){
      console.log(err);
    }
  });
  //submit(add attendance)
  $(".att-btn").click(function (e) {
    e.preventDefault();
    let enrollment = [];
    let name = [];
    let batch = [];
    let attendance = [];

    //check date
    if($(".date").val() != ""){

      let enrollmentEl = document.querySelectorAll(".enrollment");
      let allNameEl = document.querySelectorAll(".name");
      let allBatchEl = document.querySelectorAll(".batch");
      let allAttEl = document.querySelector(".att-list");
      let allInput = allAttEl.querySelectorAll("INPUT");

      let i;
      for(i=0; i<enrollmentEl.length; i++){
        enrollment[i] = enrollmentEl[i].innerHTML;
        name[i] = allNameEl[i].innerHTML;
        batch[i] = allBatchEl[i].innerHTML;
      }
      for(i=0; i<allInput.length; i++){
        if(allInput[i].checked == true){
          attendance[i] = allInput[i].value;
        }
      }
      attendance = $.grep(attendance, n=> n == 0 || n); //extra space remover


      //ajax request
      $.ajax({
        type: "POST",
        url: "php/create_attendance.php",
        data: {
          name: JSON.stringify(name),
          enrollment: JSON.stringify(enrollment),
          batch: JSON.stringify(batch),
          attendance: JSON.stringify(attendance),
          date : $(".date").val(),
        },
        cache: false,
        beforeSend: function () {
          $(".att-loader").removeClass("d-none");
        },
        success: function (response) {
          if(response.trim() == "success"){
            $(".att-loader").addClass("d-none");
            $(".stu-att-form")[0].reset();
            $(".att-list").html('');
            swal("Successful!", "Attendance Added Successfully!", "success");
          }else{
            swal(response.trim(), response.trim(), "error");
          }
        },
      });
    }else{
      swal("Date!", "Please Select a Date!", "warning")
    }
  });
}
// STUDENT ATTENDANCE - CODE END

// GIVE ACCESS LINK - CODE START
function createAccessFunc() {
  $(".access-form").on("submit", function (e) {
    e.preventDefault();
    //ajax request
    $.ajax({
      type: "POST",
      url: "php/create_access.php",
      data: new FormData(this),
      processData: false,
      contentType: false,
      cache: false,
      beforeSend: function () {
        $(".access-loader").removeClass("d-none");
      },
      success: function (response) {
        $(".access-loader").addClass("d-none");
        if(response.trim() == "success"){
          swal("Successful!","Give Access Successfully!","success");
          $(".access-form")[0].reset();
          getAccessData();
        }else{
          swal(response.trim(), response.trim(), "error");
        }
      },
    });
  });
  //show accessed data
  async function getAccessData(){
    try{

      let response = await ajaxGetAllData("access", "access-loader");
      if(response.trim() != "There is no data in the table!"){
        let data = JSON.parse(response.trim());
        $(".access-list").html('');
        data.forEach((access, index) => {
          let tr = `
           <tr index="${access.id}">
             <td>${index+1}</td>
             <td>${access.email}</td>
             <td>${access.password}</td>
             <td>
               <button class="btn btn-danger del-btn px-2 p-1"><i class="fa fa-trash"></i></button>
             </td>
           </tr>
          `;
        $(".access-list").append(tr);
        });
        // Delete code
        let allDelBtn = $(".access-list .del-btn");
        $(allDelBtn).each(function () {
          $(this).click(async function () {
            let parent = this.parentElement.parentElement;
            let id = $(parent).attr("INDEX");
            
            let response = await ajaxDeleteById(id, "access", "access-loader");
            
            if(response.trim() == "success"){
              swal("Access Removed!","Access Removed Successfully!","success");
              parent.remove();

            }else{
              swal(response.trim(), response.trim(), "error");
            }
          });
        });
      }else{
        swal("There is no accessed data!", response.trim(), "error");
      }

    }catch(err){
      console.log(err);
    }
  }
  getAccessData();
}
// GIVE ACCESS LINK - CODE END

// HEADER SHOWCASE - CODE START
function createShowcaseFunc(){

  $(document).ready(function(){
      
    $(".target").each(function(){
      $(this).click(function(e){
        let element = e.target;
        let index_number = $(element).index();
        sessionStorage.setItem("color-index-number", index_number);

        let i;
        for(i=0; i<$(".target").length; i++){
          $(".target").css({
            border : "",
            boxShadow : "",
            padding : "",
            width : ""
          });
        }

        $(this).css({
          border : "4px solid red",
          boxShadow : "0px opx 3px grey",
          padding : "2px",
          width : "fit-content"
        });

        $(this).on("dblclick", function(){
          let i;
        for(i=0; i<$(".target").length; i++){
          $(".target").css({
            border : "",
            boxShadow : "",
            padding : "",
            width : ""
          });
        }
        });

        // Color Change
        $(".color-selector").on("input", function(){
          let color = this.value;
          let in_number = +sessionStorage.getItem("color-index-number");
          let element = document.getElementsByClassName("target")[in_number];
          element.style.color = color;
        });

        // Control Font size
        $(".font-size").on("input", function(){
          let size = this.value;
          let in_number = +sessionStorage.getItem("color-index-number");
          let element = document.getElementsByClassName("target")[in_number];
          element.style.fontSize = size+"%";
        });

      });
    });
  });
 
  // SHOW TITLE IMAGE CODE START
  $(document).ready(function(){
    $("#title-image").on("change", function(){
      let file = this.files[0];
      if(file.size < 200000)
      {
       
        let url = URL.createObjectURL(file);
        let image = new Image();
        image.src = url;
        image.onload = function(){
          let o_width = image.width;
          let o_height = image.height;

          if(o_width == 1920 && o_height == 978)
          {
            image.style.width = "100%";
            image.style.position = "absolute";
            image.style.top = "0";
            image.style.left = "0";
            $(".showcase-preview").append(image);
          }else
          {
            swal("Size not Matched!","Upload 1920*978 Size Image!", "error");
          }
        }
      }
      else
      {
        swal("Large Size!", "Please Upload Image Under 200kb!", "warning");
      }
    });
  });
   // SHOW TITLE IMAGE CODE END

  //  TITLE UNDER 40 LETTER CODE START
  $(document).ready(function () {
    $("#title-text").on("input", function(){
      let length = this.value.length;
      $(".showcase-title").html(this.value);
      $(".title-limit").html(" " + length);
    });
  });
  //  TITLE UNDER 40 LETTER CODE END


  //  SUB-TITLE UNDER 100 LETTER CODE START
  $(document).ready(function () {
    $("#subtitle-text").on("input", function(){
      let length = this.value.length;
      $(".showcase-subtitle").html(this.value);
      $(".subtitle-limit").html(" " + length);
    });
  });
  //  SUB-TITLE UNDER 100 LETTER CODE END

  // ADD SHOW CASE IN DATABASE - CODE START
  $(document).ready(function () {
    $(".header-showcase-form").on("submit", function (e) {
      e.preventDefault();

      let title = document.querySelector(".showcase-title");
      let subtitle = document.querySelector(".showcase-subtitle");
      let file = document.querySelector("#title-image").files[0]; //get file

      //getting title size and color
      let title_size = "";
      let title_color = "";
      if(title.style.fontSize == ""){
        title_size = "300%"; //default value
      }else{
        title_size = title.style.fontSize;
      }
      if(title.style.color == ""){
        title_color = "black"; //default value
      }else{
        title_color = title.style.color;
      }


      //getting sub-title size and color
      let subtitle_size = "";
      let subtitle_color = "";
      if(subtitle.style.fontSize == ""){
        subtitle_size = "300%"; //default value
      }else{
        subtitle_size = subtitle.style.fontSize;
      }
      if(subtitle.style.color == ""){
        subtitle_color = "black"; //default value
      }else{
        subtitle_color = subtitle.style.color;
      }

      // getting alignment
      let flex_box = document.querySelector(".showcase-preview");
      let h_align = "";
      let v_align = "";
      if(flex_box.style.justifyContent == ""){
        h_align = "flex-start";
      }else{
        h_align = flex_box.style.justifyContent;
      }
      if(flex_box.style.alignItems == ""){
        v_align = "flex-start";
      }else{
        v_align = flex_box.style.alignItems;
      }

      // Arrange all data
      let css_data = {
        title_size : title_size,
        title_color : title_color,
        subtitle_size : subtitle_size,
        subtitle_color : subtitle_color,
        h_align : h_align,
        v_align : v_align,
        title_text : title.innerHTML,
        subtitle_text : subtitle.innerHTML,
        buttons : $(".title-buttons").html().trim(),

        //Save Showcase
        option : $("#edit-title").val().trim()
      };

      let formData = new FormData(this);
      formData.append("css_data", JSON.stringify(css_data));
      formData.append("file_data", file);


      // ajax request
      $.ajax({
        type: "POST",
        url: "php/create_showcase.php",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function () {},
        success: function (response) {
          if(response == "success"){
            swal("Successfully!", "Showcase added successfully!", "success");
          }
          else if(response.trim() == "Showcase Updated")
          {
            swal("Successfully!", "Showcase added successfully!", "success");
          }
          else{
            swal(response.trim(), response.trim(), "error");
          }
        },
      });
    });
  });
  // ADD SHOW CASE IN DATABASE - CODE END

  // ADD BUTTON CODE START
  $(document).ready(function(){
    $(".add-btn").click(function(){
      let button = document.createElement("BUTTON");
      button.className = "btn mx-2 title-btn";
      let a = document.createElement("A");
      a.href = $(".btn-url").val();
      a.innerHTML = $(".btn-name").val();
      a.style.color = $(".btn-textcolor").val();
      a.style.fontSize = $(".font-size").val();
      a.style.textDecoration = "none";
      button.style.backgroundColor = $(".btn-bgcolor").val();
      button.append(a);
      
      let title_button = document.querySelector(".title-buttons");
      let title_child = title_button.getElementsByTagName("BUTTON");
      let button_length = title_child.length;

      if(button_length == 0 || button_length == 1){
        $(".title-buttons").append(button);
      }else{
        swal("Sorry!!", "Only Two Buttons Are Allowed!", "warning");
      }
    });
  });
  // ADD BUTTON CODE END

  // ALIGNMENT CODE START
  $(document).ready(function() {
    $(".alignment").each(function(){
      $(this).click(function(){
        let align_position = $(this).attr("align-position");
        let align_value = $(this).attr("align-value");
        if(align_position == "h")
        {
          $(".showcase-preview").css({
            justifyContent : align_value
          });
        }else if(align_position == "v"){
          $(".showcase-preview").css({
            alignItems : align_value
          });
        }
      });
    });
  });
  // ALIGNMENT CODE END

  // PREVIEW CODE START
  $(document).ready(function() {
    $(".preview-btn").click(function(){
      // let file = document.querySelector("#title-image").files[0];
      let formData = new FormData();

      // getting alignment
      let flex_box = document.querySelector(".showcase-preview");
      let h_align = "";
      let v_align = "";
      if(flex_box.style.justifyContent == ""){
        h_align = "flex-start";
      }else{
        h_align = flex_box.style.justifyContent;
      }
      if(flex_box.style.alignItems == ""){
        v_align = "flex-start";
      }else{
        v_align = flex_box.style.alignItems;
      }

      let array = [$(".title-box").html().trim(), h_align, v_align];
      formData.append("data", JSON.stringify(array));

      //ajax request
      $.ajax({
        type: "POST",
        url: "php/preview.php",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function () {},
        success: function (response) {
          let page = window.open("about:blank");
          page.document.open();
          page.document.write(response);
        },
      });
    });
  });
  // PREVIEW CODE END

  // ALL SHOWCASE EDIT CODE START
  $(document).ready(function(){
    let showcase_preview = $(".showcase-preview").html();
    $("#edit-title").on("change", function(){
      if($(this).val() != "choose title")
      {
       //ajax
       $.ajax({
        type : "POST",
        url : "php/edit_showcase.php",
        data : {
         id : $(this).val()
        },
        beforeSend : function(){},
        success : function(response){

          $("#title-image").removeAttr("required");

          // Delete Showcase code start
          $(".delete-title").removeClass("d-none");
          $(".delete-title").click(function(){
            $.ajax({
              type : "POST",
              url : "php/delete_showcase.php",
              data : {
                id : $("#edit-title").val()
              },
              cache : false,
              beforeSend : function(){},
              success : function(response){
                if(response.trim() == "success"){

                  swal("Deleted!", "Showcase Deleted Successfully!", "success");
                  
                  $(".add-showcase-btn").html("Add Showcase");
                  $(".add-showcase-btn").removeClass("btn-warning");
                  $(".add-showcase-btn").addClass("btn-primary");
                  $(".header-showcase-form").trigger('reset');
                  $(".showcase-preview").html(showcase_preview);
                  $(".delete-title").addClass("d-none");
                  
                }
                else
                {
                  swal(response.trim(), response.trim(), "error");
                }
              },
            });
          });
          // Delete Showcase code end

          //save btn code start
          $(".add-showcase-btn").html("Save Edit");
          $(".add-showcase-btn").removeClass("btn-primary");
          $(".add-showcase-btn").addClass("btn-warning");
          //save btn code end

          let all_data = JSON.parse(response.trim());
          let image = document.createElement("IMG");
          image.src = all_data[0];
          image.style.width = "100%";
          image.style.position = "absolute";
          image.style.left = "0";
          image.style.top = "0";
          $(".showcase-preview").append(image); //image
          $(".showcase-title").html(all_data[1]); //title text
          $(".showcase-subtitle").html(all_data[4]); //sub title text

          //color and font size
          $(".showcase-title").css({
            color : all_data[2],
            fontSize : all_data[3]
          });
          $(".showcase-subtitle").css({
            color : all_data[5],
            fontSize : all_data[6]
          });

          //Buttons
          $(".title-buttons").html(all_data[9]);

          //show data in input field
          $("#title-text").val(all_data[1]);
          $("#subtitle-text").val(all_data[4]);

          //edit buttons
          $(".title-btn").each(function(){
            $(this).click(function(){

              sessionStorage.setItem("btn_key", $(this).index());

              $(".delete-btn").removeClass("d-none");

              let url = $(this).children().attr("href");
              let name = $(this).children().html();
              $(".btn-url").val(url);
              $(".btn-name").val(name);
              let color = $(this).css("backgroundColor").replace("rgb(","").replace(")","");
              let rgb = color.split(",");
              let i;
              let color_code = "";
              for(i=0; i<rgb.length; i++)
              {
                let hex_code = Number(rgb[i]).toString(16);
                  color_code += hex_code.length == 1 ? "0"+hex_code : hex_code;
              }
              $(".btn-bgcolor").val("#"+color_code);
             

              let text_color = $(this).children().css("color").replace("rgb(","").replace(")","");
              let text_rgb = text_color.split(",");
              let text_color_code = "";
              for(i=0; i<text_rgb.length; i++)
              {
                let text_hex_code = Number(text_rgb[i]).toString(16);
                text_color_code += text_hex_code.length == 1 ? "0"+text_hex_code : text_hex_code;
              }
              $(".btn-textcolor").val("#"+text_color_code);

              //size of button
              let font_size = $(this).children().css("fontSize");
              for(i=0; i<$(".font-size").children().length; i++)
              {
                let option = $(".font-size").children();
                if(option[i].value == font_size)
                {
                  option[i].selected = "selected";
                }
              }

            });
          });

          //Update button name
            $(".btn-name").on("input", function(){
              let i_number = sessionStorage.getItem("btn_key");
              let selected_btn = document.getElementsByClassName("title-btn")[i_number];
              selected_btn.getElementsByTagName("A")[0].innerHTML = this.value;
            });

          //Update button background color
            $(".btn-bgcolor").on("input", function(){
              let i_number = sessionStorage.getItem("btn_key");
              let selected_btn = document.getElementsByClassName("title-btn")[i_number];
              selected_btn.style.backgroundColor = this.value;
            });

          //Update button text color
            $(".btn-textcolor").on("input", function(){
              let i_number = sessionStorage.getItem("btn_key");
              let selected_btn = document.getElementsByClassName("title-btn")[i_number];
              selected_btn.getElementsByTagName("A")[0].style.color = this.value;
            });
            
          //Update button size
            $(".font-size").on("change", function(){
              let i_number = sessionStorage.getItem("btn_key");
              let selected_btn = document.getElementsByClassName("title-btn")[i_number];
              selected_btn.getElementsByTagName("A")[0].style.fontSize = this.value;
            });


          //Delete button
            $(".delete-btn").on("click", function(){
              let i_number = sessionStorage.getItem("btn_key");
              let selected_btn = document.getElementsByClassName("title-btn")[i_number];
              selected_btn.remove();
              $(".delete-btn").addClass("d-none");
              $(".btn-url, .btn-name").val("");
              $(".btn-bgcolor, .btn-textcolor").val("#000000");
              let options = $(".font-size option");
              options[0].selected = "selected";
            });

        }
       }); 
      }
      else
      {
        $("#title-image").Attr("required", true);
        $(".add-showcase-btn").html("Add Showcase");
        $(".add-showcase-btn").removeClass("btn-warning");
        $(".add-showcase-btn").addClass("btn-primary");
        $(".header-showcase-form").trigger('reset');
        $(".showcase-preview").html(showcase_preview);
        $(".delete-title").addClass("d-none");

      }
    });
  });
  // ALL SHOWCASE EDIT CODE END
}
// HEADER SHOWCASE - CODE END