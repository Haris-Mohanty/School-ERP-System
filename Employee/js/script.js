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
      if (access_link == "category_design.php") {
        categoryFunc();
      }
      $(".page").html(response);
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
  function getCategoryFunc() {
    $.ajax({
      type: "POST",
      url: "php/category_list.php",
      beforeSend: function () {},
      success: function (response) {
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
      },
    });
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
        let td = parent.querySelectorAll("td");
        console.log(td)
      });
    });
  }
  //DELETE BUTTON CODE END
}

//CATEGORY CODE END
