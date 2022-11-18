<div class="row">
    <!-- メイン -->
    <div class="col-10 col-md-6 offset-1 offset-md-3">
        <form action={{ route('admin.movies.store') }} method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">映画タイトル:</label><br>
                <input type="text" id="title" name="title"><br>

                <label for="image_url">画像URL:</label><br>
                <input type="text" id="image_url" name="image_url"><br>

                <label for="published_year">公開年:</label>
                <input type="number" placeholder="YYYY" min="1999" max="2023" name="published_year"><br>

                <input type="checkbox" id="is_showing" name="is_showing" value=1>
                <label for="is_showing"> 公開中</label><br>           

                <label for="description">概要:</label><br>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>

                <div class="text-center mt-3">
                    <input class="btn btn-primary" type="submit" value="投稿する">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
            </div>
        </form>
    </div>
</div>