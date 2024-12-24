@extends('dashboard.layouts.main')
@section('main')
    <div class="row">
        <div class="col">
            <div class="card p-3">
                <div class="row">
                    <div class="col mb-2">
                        <a class="icon-link icon-link-hover py-1 px-2  text-white rounded-lg text-sm"
                            style="background-color: #FA4D71" href="{{ route('dashboard.posts') }}">
                            <i class="bi bi-arrow-left me-1"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <h4 class="fw-bold">Edit KONTEN</h4>
                <hr>
                <div class="mb-3">
                    <form action="{{ route('dashboard.posts.edit', ['post' => $blog->slug]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="mb-3">
                                <input type="hidden" name="oldImage" value="{{ $blog->image }}">
                                <label for="title" class="form-label">Title Artikel</label>
                                <input type="text" name="title"
                                    class="form-control  
                                
                                "
                                    id="title" placeholder="insert title" value="{{ $blog->title }}">



                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug Artikel</label>
                                <input type="text" name="slug"
                                    class="form-control bg-secondary  
                                    
                                "
                                    readonly id="slug" placeholder="insert Slug" value="{{ $blog->slug }}"
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
                                            <option value="{{ $item->id }}"
                                                {{ $blog->categories_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>



                                </div>
                            </div>

                            @if ($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" class="img-thumbnail mb-3 d-block"
                                    id="img-priview" width="400">
                            @else
                                <img src="" class="img-thumbnail mb-3" id="img-priview" alt=""
                                    width="400">
                            @endif
                            <div>
                                <label for="image" class="form-label d-block">Img Template</label>
                                <input type="file" name="image" onchange="priviewUpdateImagePost()"
                                    class="form-control  
                                " id="image">



                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                <textarea name="body"
                                    class="form-control ckeditor  
                                    
                                "
                                    id="body"> {{ $blog->body }} </textarea>



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
        var title = document.getElementById("title");
        var slug = document.getElementById("slug");

        if (title && slug) {
            title.addEventListener("change", function() {
                console.log("title changed");

                fetch("/dashboard/blog/checkSlug?title=" + title.value)
                    .then((response) => response.json())
                    .then((data) => (slug.value = data.slug));
            });
        }

        function priviewUpdateImagePost() {
            let image = document.getElementById("image");
            let imgImage = document.getElementById("img-priview");

            imgImage.style.display = "block";

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function(orEvent) {
                imgImage.src = orEvent.target.result;
            };
        }
    </script>
@endsection
