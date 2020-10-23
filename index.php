<!DOCTYPE html>
<html>

<head>
  <title>Mail Customizer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/gijgo.min.css" />
  <link rel="stylesheet" href="./css/fontawesome/all.min.css" />
  <link rel="stylesheet" href="./css/mail-customizer.css" />
</head>

<body class="vh-100 text-center">
  <div class="container-fluid h-100">
    <div class="row h-100">
      <div class="col-9 col-md-4 col-lg-3 px-0 d-flex flex-column h-100 overflow-hidden options">
        <div class="col d-flex flex-column flex-grow-1 flex-shrink-1 flex-basis-0 overflow-auto">
          <h2>Options</h2>
          <form class="text-left">
            <div class="form-row mb-3">
              <div class="col">
                <label for="template">Template</label>
                <select class="custom-select" name="template" id="template">
                  <option value="1" selected>1</option>
                  <option value="2">2</option>
                </select>
              </div>
            </div>
            <div class="form-row mb-3">
              <div class="col">
                <label for="logo-image">Dealer Logo Image</label>
                <ul class="nav nav-tabs nav-justified mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link rounded-0 active" id="pills-url-tab" data-toggle="pill" href="#pills-url"
                      role="tab" aria-controls="pills-url" aria-selected="true">URL</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link rounded-0" id="pills-file-tab" data-toggle="pill" href="#pills-file" role="tab"
                      aria-controls="pills-file" aria-selected="false">File</a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-url" role="tabpanel" aria-labelledby="pills-url-tab">
                    <input type="url" class="form-control" id="logo-image" name="logo-image"
                      aria-describedby="urlHelp" />
                    <small id="urlHelp" class="form-text text-muted">Provide url for dealer logo image.</small>
                  </div>
                  <div class="tab-pane fade" id="pills-file" role="tabpanel" aria-labelledby="pills-file-tab">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="logo-file"
                        accept="image/png, image/jpeg, image/svg+xml" aria-describedby="fileHelp" />
                      <label class="custom-file-label" for="logo-file">Choose file</label>
                    </div>
                    <small id="fileHelp" class="form-text text-muted">Choose file for dealer logo image.</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row mb-3">
              <div class="col">
                <label for="city-name">City</label>
                <input type="text" class="form-control" id="city-name" name="city-name" aria-describedby="cityName" />
                <small id="cityName" class="form-text text-muted">Enter City Name.</small>
              </div>
            </div>
            <div class="form-row mb-3">
              <div class="col">
                <label for="phone-no">Phone No.</label>
                <input type="tel" class="form-control" id="phone-no" name="phone-no" aria-describedby="phoneNo" />
                <small id="phoneNo" class="form-text text-muted">Provide Phone No for Call to Action.</small>
              </div>
            </div>
            <div class="form-row mb-3">
              <div class="col">
                <label for="store-address">Store Address</label>
                <input type="text" class="form-control" id="store-address" name="store-address"
                  aria-describedby="storeAddress" />
                <small id="storeAddress" class="form-text text-muted">Enter Store Address.</small>
              </div>
            </div>
            <div class="form-row mt-5">
              <div class="col-xl mb-3">
                <button type="button" class="btn btn-primary btn-block" data-toggle="tooltip" data-placement="top"
                  id="download-image" title="Download Image"><i class="fa fa-image"></i></button>
              </div>
              <div class="col-xl mb-3">
                <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" data-placement="top"
                  id="download" title="Download Package"><i class="fa fa-download"></i></button>
              </div>
              <div class="col-xl mb-3">
                <button type="button" class="btn btn-info btn-block" data-toggle="tooltip" data-placement="top"
                  id="preview" title="Preview New Tab"><i class="fa fa-eye"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-12 col-md-8 col-lg-9 h-100 px-0 mail-preview">
        <button type="button" class="toggle-options btn btn-light d-md-none">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <div class="overlay"></div>
        <div class="d-flex flex-column min-vh-100">
          <main class="d-flex flex-column flex-grow-1 flex-shrink-1 flex-basis-0 overflow-auto style-scroll">
            <div class="d-none vh-100 justify-content-center align-items-center" id="loader">
              <div class="spinner-border text-success" role="status" style="width: 5rem; height: 5rem;">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
            <iframe class="w-100 vh-100 d-none" id="mail-preview" frameBorder="0"></iframe>
          </main>
        </div>
      </div>
    </div>
  </div>
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="./js/html2canvas.min.js"></script>
  <script>
  (function($) {
    $('[data-toggle="tooltip"]').tooltip();
    $(document).ready(($) => {
      const toggleOptions = $('.toggle-options');
      const overlay = $('.overlay');
      const logoImage = $('#logo-image');
      const cityName = $('#city-name');
      const phoneNo = $('#phone-no');
      const storeAddress = $('#store-address');
      const logoFile = $('#logo-file');
      const mailPreview = $('#mail-preview');
      const template = $('#template');
      const loader = $('#loader');
      const downloadImage = $('#download-image');
      const download = $('#download');
      const preview = $('#preview');
      let base64Logo = '';
      let exportElement = null;
      const isFile = (str) => {
        return str.split('/').pop().indexOf('.') > -1;
      }
      const downloadFile = (fileName, path) => {
        // Create an invisible A element
        const a = document.createElement("a");
        a.style.display = "none";
        document.body.appendChild(a);

        // Set the HREF to a Blob representation of the data to be downloaded
        a.href = path;

        // Use download attribute to set set desired file name
        a.setAttribute("download", fileName);

        // Trigger the download by simulating click
        a.click();

        // Cleanup
        document.body.removeChild(a);
      }
      const loadPreview = () => {
        let param = [];
        let paramPath = ``;
        loader.removeClass('d-none').addClass('d-flex');
        mailPreview.addClass('d-none');
        if (logoImage.val() !== '') {
          param.push(`logo=${logoImage.val()}`);
        }
        if (cityName.val() !== '') {
          param.push(`city_name=${cityName.val()}`);
        }
        if (phoneNo.val() !== '') {
          param.push(`phone_no=${phoneNo.val()}`);
        }
        if (storeAddress.val() !== '') {
          param.push(`store_address=${storeAddress.val()}`);
        }
        if (param.length) {
          paramPath = `?${param.join('&')}`;
        }
        mailPreview.attr('src', encodeURI(`${window.location.href}templates/smb/${template.val()}/${paramPath}`));
        overlay.trigger('click');
        // setTimeout(() => {}, 2000);
      }
      const toBase64 = file => new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = error => reject(error);
      });
      const readFile = async (file, fileName) => {
        base64Logo = await toBase64(file);
        $.ajax({
            url: `${window.location.href}upload/`,
            type: 'POST',
            data: {
              fileName: fileName,
              logo: base64Logo
            },
          })
          .done(function(response) {
            if (response.status) {
              logoImage.val(response.fileURL).trigger('change');
            } else {
              console.log(response.message);
            }
          })
          .fail(function() {
            console.log("Error Generating File");
          });
      };
      cityName.on('change', (event) => {
        loadPreview();
      });
      phoneNo.on('change', (event) => {
        loadPreview();
      });
      storeAddress.on('change', (event) => {
        loadPreview();
      });
      logoImage.on('change', (event) => {
        if (isFile($(event.target).val())) {
          $(event.target).removeClass('is-invalid');
          loadPreview();
        } else {
          $(event.target).addClass('is-invalid');
        }
      });
      logoFile.on('change', (e) => {
        var thisElement = $(e.target);
        var files = thisElement.prop('files');
        var file = files[0];
        var fileName = file.name;
        thisElement.next('label').text(fileName);
        readFile(file, fileName);
      });
      template.on('change', (event) => {
        loadPreview();
      });
      toggleOptions.on('click', (event) => {
        $('body').toggleClass('show-options');
      });
      overlay.on('click', (event) => {
        $('body').removeClass('show-options');
      });
      download.on('click', (event) => {
        $.ajax({
            url: `${window.location.href}export/`,
            type: 'POST',
            data: {
              mail: mailPreview.attr('src')
            },
          })
          .done(function(response) {
            if (response.status) {
              downloadFile(response.fileName, `${window.location.href}export/${response.fileName}`);
            }
          })
          .fail(function() {
            console.log("Error Generating File");
          });
      });
      preview.on('click', (event) => {
        window.open(mailPreview.attr('src'), '_blank')
      });
      downloadImage.on('click', (event) => {
        mailPreview.contents().find('html').css({
          overflow: '-moz-hidden-unscrollable',
          overflow: 'hidden'
        });
        html2canvas(exportElement, {
            useCORS: true,
            width: 600,
          })
          .then(function(canvas) {
            downloadFile(`${Date.now()}.jpg`, canvas.toDataURL("image/jpeg"));
            mailPreview.contents().find('html').removeAttr('style');
          });
      });
      loadPreview();
      mailPreview.on("load", function() {
        loader.addClass('d-none').removeClass('d-flex');
        mailPreview.removeClass('d-none');
        exportElement = mailPreview.contents().find('body center .email-container').get(0);
      });
    });
  })(jQuery);
  </script>
</body>

</html>