<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('frontend.layouts.head')

</head>

<body>

    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center"><img src="{{ asset('frontend/assets/imgs/template/loading.gif') }}" alt="joblist"></div>
            </div>
        </div>
    </div> --}}

    @include('frontend.layouts.header')

    <main class="main">

        @yield('content')

    </main>

    <section class="section-box subscription_box">
        <div class="container">
            <div class="box-newsletter">
                <div class="newsletter_textarea">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="text-md-newsletter">Subscribe our newsletter</h2>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-form-newsletter">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" value=""
                                        placeholder="Enter your email here">
                                    <button class="btn btn-default font-heading">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.layouts.footer')

    @include('frontend.layouts.script')

    @stack('scripts')

    <script>
        tinymce.init({
            selector: '.editor',
            min_width: 500,
            height: 500,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
                'table', 'emoticons', 'template', 'codesample'
            ],
            toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons',
            menu: {
                favs: {
                    title: 'Menu',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table',
            content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}',
            images_upload_url: "{{ route('upload') }}",
            images_upload_credentials: true,
            images_reuse_filename: true,
            images_upload_handler: function(blobInfo, progress) {
                return new Promise((resolve, reject) => {
                    var xhr, formData;
                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', '{{ route('upload') }}');

                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));

                    xhr.upload.onprogress = function(e) {
                        progress(e.loaded / e.total * 100);
                    };

                    xhr.onload = function() {
                        var json;
                        if (xhr.status !== 200) {
                            reject('HTTP Error: ' + xhr.status);
                            return;
                        }
                        json = JSON.parse(xhr.responseText);
                        if (!json || typeof json.location != 'string') {
                            reject('Invalid JSON: ' + xhr.responseText);
                            return;
                        }
                        resolve(json.location);
                    };

                    xhr.onerror = function() {
                        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr
                            .status);
                    };

                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());

                    xhr.send(formData);
                });
            }
        });
    </script>

</body>

</html>
