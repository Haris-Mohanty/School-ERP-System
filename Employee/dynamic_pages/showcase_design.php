<?php

echo '
    <div class="container-fluid">
          <div class="row p-3">
            <div class="col-md-4 p-4 bg-white rounded-lg shadow-lg">
              <form class="header-showcase-form">
                <div class="form-group mb-3">
                  <label for="title-image" class="fw-bold">Title Image </label> <span> 200kb (1920*978)</span>
                  <input type="file" required name="title-image" id="title-image" class="form-control">
                </div>

                <div class="form-group mb-3">
                  <label for="title-text" class="fw-bold">Title Text </label><span class="title-limit"> 0</span><span>/40</span>
                  <textarea name="title-text" required id="title-text" maxlength="40" class="form-control" rows="2"></textarea>
                </div>

                <div class="form-group mb-3">
                  <label for="subtitle-text" class="fw-bold">Sub-Title Text</label><span class="subtitle-limit"> 0</span><span>/100</span>
                  <textarea name="subtitle-text" id="subtitle-text" maxlength="100" class="form-control" rows="3.5"></textarea>
                </div>

                <div class="form-group my-3">
                  <label for="create-button">Create Buttons</label>
                  <i class="fa fa-trash float-end d-none delete-btn text-danger" style="cursor: pointer;"></i>
                  <div class="input-group">
                    <input type="url" name="btn-url" placeholder="Enter the Url" class="form-control btn-url">
                    <input type="text" name="btn-name" placeholder="Button 1" class="form-control btn-name">
                  </div>
                </div>

                <div class="input-group my-3">
                  <div class="input-group">
                    <span class="input-group-text">BG COLOR</span>
                    <input type="color" name="btn-bgcolor" class="form-control btn-bgcolor p-1">
                    <span class="input-group-text">COLOR</span>
                    <input type="color" name="btn-textcolor" class="form-control btn-textcolor p-1">
                  </div>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text">Size</span>
                  <select name="font-size" id="" class="font-size form-select">
                    <option value="16px">Small</option>
                    <option value="20px">Medium</option>
                    <option value="24px">Large</option>
                  </select>
                  <span class="add-btn btn btn-danger">Add</span>
                </div>

                <div class="form-group mb-3">
                  <button class="btn btn-primary add-showcase-btn py-2">Add Showcase</button>
                  <button type="button" class="btn btn-success float-end preview-btn w-50 py-2">Preview</button>
                </div>

                <div class="form-group">
                  <label for="edit-title">Edit Showcase</label>
                  <i class="fa fa-trash float-end text-danger d-none delete-title" style="cursor: pointer;"></i>
                  <select id="edit-title" class="form-select">
                    <option value="choose title">Choose Title</option>
                    <?php
                      $get_data = "SELECT * FROM header_showcase";

                      $response = $db -> query($get_data);
                      $count = 0;


                      if($response)
                      {
                        while($data = $response -> fetch_assoc())
                        {
                          $count += 1;
                          echo '
                            <option value='.$data['id'].'>'.$count.'</option>
                          ';
                        }
                      }
                    ?>
                  </select>
                </div>

              </form>
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-7 d-flex p-4 bg-white rounded-lg shadow-lg position-relative showcase-preview">
              <div class="title-box">
                <h1 class="showcase-title target fw-bold">TITLE</h1>
                <h4 class="showcase-subtitle target fw-bold">SUB TITLE</h4>
                <!-- add button -->
                <div class="title-buttons">

                </div>
              </div>
              <div class="showcase-formatting d-flex justify-content-around align-items-center">
                
                <!-- Color -->
                <div class="btn-group">
                  <button class="btn btn-light">Color</button>
                  <button class="btn btn-light">
                    <input type="color" name="color-selector" id="" class="color-selector">
                  </button>
                </div>

                <!-- Font Size -->
                <div class="btn-group">
                  <button class="btn btn-light">Font Size</button>
                  <button class="btn btn-light">
                    <input type="range" min="100" max="500" name="font-size" id="" class="font-size form-control">
                  </button>
                </div>

                <!-- Align -->
                <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">Alignment
                  <div class="dropdown-menu">
                    <span class="dropdown-item alignment" align-position="h" align-value="flex-start">Left</span>
                    <span class="dropdown-item alignment" align-position="h" align-value="center">Center</span>
                    <span class="dropdown-item alignment" align-position="h" align-value="flex-end">Right</span>
                    <span class="dropdown-item alignment" align-position="v" align-value="flex-start">Top</span>
                    <span class="dropdown-item alignment" align-position="v" align-value="center">V-Center</span>
                    <span class="dropdown-item alignment" align-position="v" align-value="flex-end">Buttom</span>
                  </div>
                </button>
                
                
              </div>
            </div>
          </div>
    </div>
';

?>