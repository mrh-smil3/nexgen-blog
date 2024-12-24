@extends('dashboard.layouts.main')
@section('main')
    <div class="row">
        <div class="col">
            <div class="card p-3">
                <div class="row">
                    <div class="col mb-2">
                        <a class="icon-link icon-link-hover" href="{{ route('dashboard.posts') }}">
                            <i class="bi bi-arrow-left me-1"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <h4 class="fw-bold">TAMBAH KONTEN</h4>
                <hr>
                <div class="mb-3">
                    <form action="{{ route('dashboard.posts.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title Artikel</label>
                                <input type="text" name="title" class="form-control  
                                "
                                    id="title" placeholder="insert title" value="">



                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug Artikel</label>
                                <input type="text" name="slug"
                                    class="form-control bg-secondary  
                                    
                                "
                                    readonly id="slug" placeholder="insert Slug" value=""
                                    style="cursor: not-allowed">



                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Categori Blog</label>
                                <div class="col-lg">
                                    <select class="form-select 
                                    "
                                        aria-label="Default select example" name="categories_id">
                                        <option value="">Open this select menu</option>
                                        @foreach ($categoryBlogs as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>



                                </div>
                            </div>
                            <div>
                                <label for="image" class="form-label d-block">Img Template</label>
                                <input type="file" name="image" class="form-control 
                                "
                                    id="image">



                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                <textarea name="body"
                                    class="form-control ckeditor 
                                    
                                " id="body"></textarea>

                            </div>
                            <div>
                                <button class="btn btn-primary ">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'), {
                ckfinder: {
                    uploadUrl: "{{ route('upload.image') }}?_token={{ csrf_token() }}"
                },
                image: {
                    toolbar: [
                        'imageStyle:block',
                        'imageStyle:side',
                        '|',
                        'resizeImage', // Menyertakan toolbar untuk resize
                        'imageTextAlternative'
                    ]
                },
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        var title = document.getElementById("title");
        var slug = document.getElementById("slug");

        if (title && slug) {
            title.addEventListener("change", function() {
                console.log("title changed");

                fetch("/dashboard/posts/checkSlug?title=" + title.value)
                    .then((response) => response.json())
                    .then((data) => (slug.value = data.slug));
            });
        }
    </script>
@endsection
