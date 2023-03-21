//INSTITUTE UPDATE COLLAPSEBLE CODE START
$(document).ready(function () {
  $(".institute-update-btn").click(function () {
    $(".institute-menu").collapse("toggle");
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
          allCourseInput[6].checked == true
            ? (status = "Active")
            : (status = "Pending");
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
  //form submit
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
            swal(
              "Successfully Added!",
              "Your Batch Added Successfully!",
              "success"
            );
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
      if (response.trim() == "There is No Course Found!") {
        let all_data = JSON.parse(response.trim());
        all_data.forEach((data, index) => {
          let tr = `
          <tr>
             <td class="text-nowrap">Haris</td>
             <td class="text-nowrap">Haris</td>
             <td class="text-nowrap">Haris</td>
             <td class="text-nowrap">Haris</td>
             <td class="text-nowrap">Haris</td>
             <td class="text-nowrap">Haris</td>
             <td class="text-nowrap">Haris</td>
             <td class="text-nowrap">Haris</td>
             <td class="text-nowrap">Haris</td>
             <td class="text-nowrap">Haris</td>
             <td class="text-nowrap">Haris</td>
             <td class="text-nowrap">Haris</td>
             <td class="text-nowrap">Haris</td>
             <td class="text-nowrap">
               <button class="btn btn-primary px-2 p-1"><i class="fa fa-edit"></i></button>
               <button class="btn btn-danger px-2 p-1"><i class="fa fa-trash"></i></button>
             </td>
          </tr>
          `;
          $(".batch-list").append(tr);
        });
      } else {
        swal(response.trim(), response.trim(), "warning");
      }
    } catch (err) {
      console.log(err);
    }
  });
}
// CREATE BATCH CODE END
