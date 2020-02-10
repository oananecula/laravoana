@extends ('layout')

@section ('content')
    <div id='wrapper'>
        <div id='page' class='container'>
            <h1>Edit article</h1>
           
            <form method='POST' action="/articles/{{ $article->id }}">
                @csrf
                @method('PUT')

                <div class='field'>
                    <label class='label' for="title">TITLE</label>

                    <div class='control'>
                        <input class='input' type="text" name='title' id='title' value='{{ $article->title }}'>
                    </div>
                </div>

                <div class='field'>
                    <label class='label' for="excerpt">EXCERPT</label>

                    <div class='control'>
                        <textarea class='textarea' name="excerpt" id="excerpt" cols="30" rows="10">{{ $article->excerpt }}</textarea>
                    </div>
                </div>

                <div class='field'>
                    <label class='label' for="body">BODY</label>

                    <div class='control'>
                        <textarea class='textarea' name="body" id="body" cols="30" rows="10">{{ $article->body }}</textarea>
                    </div>
                </div>

                <div class='field is-grouped'>
                    <div class='control'>
                        <button class='button is-link' type='submit'>SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection