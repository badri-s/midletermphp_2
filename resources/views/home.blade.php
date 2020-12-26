@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @if($errors->any())
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
              <ul>
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div>
        </div>
        @endif

        <div class="col-md-6">
            <h2>სიახლის დამატება</h2>
            <form action="/admin/news/create" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="title" placeholder="სიახლის სახელი">
                </div>
                <div class="mb-3">
                    <textarea type="text" class="form-control" name="text" placeholder="სიახლის კონტენტი"></textarea>
                </div>
                <div class="mb-3">
                    <select name="cat_id" class="form-control">
                        @foreach($cats as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="img" placeholder="სიახლის ფოტოსურათის ლინკი">
                </div>
                <div class="mb-3">
                    <button name="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <h2>კატეგორიის დამატება</h2>
            <form action="/admin/category/create" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="კატეგორიის სახელი" name="title">
                </div>
                <div class="mb-3 mt-3">
                    <button name="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>



        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <tr>
                    <td>id</td>
                    <td>სათაური</td>
                    <td></td>
                </tr>
                @foreach($all_news as $news)

                    <tr>
                        <td>{{ $news->id }}</td>
                        <td>{{ $news->title }}</td>
                        <td class="news_item_publish_{{ $news->id }}">
                            @if ($news->is_published)
                                გამოქვეყნებული
                            @else
                                <a href="/" onclick="publishNews({{ $news->id }}); return false;">გამოქვეყნება</a>
                            @endif
                        </td>
                    </tr>

                @endforeach
            </table>
            {{ $all_news->links() }}
        </div>

        
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    function publishNews(newsId) {
        $.ajax({
            method: "get",
            url: "/admin/news/publish/" + newsId,
            success: function(data) {
                if (data.res === true)
                    $(`.news_item_publish_${newsId}`).html("გამოქვეყნებული")
            },
            error: function(error) {
                alert("გამოქვეყნების დროს წარმოიშვა პრობლემა, სცადეთ მოგვიანებით")
            }
        })
    }
</script>


@endsection
